<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class FrontEndManagementController extends Controller
{
    public function index()
    {
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);
        ksort($sections);

        $theme_wise_sections = [
            [
                'theme' => 'theme_one',
                'dispaly_name' => 'digital_marketing',
                'sections' => ['template_1_hero', 'template_1_about_company', 'template_1_fun_fact', 'template_1_working_process', 'template_1_testimonial', 'template_1_cta']
            ],
            [
                'theme' => 'theme_two',
                'dispaly_name' => 'seo_agency',
                'sections' => ['theme_two_hero', 'theme_two_tools', 'explore_services', 'case_studies', 'our_testimonials', 'faqs', 'contact_us']
            ],

            [
                'theme' => 'theme_three',
                'dispaly_name' => 'creative_agency',
                'sections' => ['themplate_3_hero_section', 'template_3_about_company', 'template_3_pricing_section', 'template_3_cta_section', 'template_3_testimonial_section']
            ],

            [
                'theme' => 'theme_four',
                'dispaly_name' => 'ai_software',
                'sections' => ['theme_four_hero', 'ur_cool_features', 'what_we_do', 'theme_four_faqs', 'theme_4_moving_image', 'theme_4_pricing_section', 'theme_4_testimonials', 'home_4_cta_section']
            ],

            [
                'theme' => 'theme_five',
                'dispaly_name' => 'business_consulting',
                'sections' => ['template_5_about_us_section', 'template_5_we_provide_section', 'theme_5_counter_section', 'theme_5_testimonial_section', 'theme_5_cta_section', 'home_5_hero_section']
            ],

            [
                'theme' => 'theme_seven',
                'dispaly_name' => 'it_business',
                'sections' => ['theme_seven_hero', 'theme_seven_partner', 'theme_seven_about_company', 'theme_seven_explore_services', 'theme_seven_working_process', 'theme_seven_case_story', 'theme_seven_business_benefits', 'theme_seven_testimonial', 'theme_seven_faqs', 'theme_seven_get_consultations']
            ],
            [
                'theme' => 'theme_eight',
                'dispaly_name' => 'saas',
                'sections' => ['theme_eight_hero', 'theme_eight_partner', 'theme_eight_why_use_us', 'theme_eight_core_features', 'theme_eight_core_features_two', 'theme_eight_why_use_us_two', 'theme_eight_customer_say_about_us', 'theme_eight_automating_design_system', 'theme_eight_faqs', 'theme_eight_testimonials']
            ],

        ];

        $selected_theme = GlobalSetting::where('key', 'selected_theme')->first();



        return view('admin.frontend-management.index', compact('sections', 'selected_theme', 'theme_wise_sections'));
    }

    public function section($key)
    {
        $lang_code = request('lang_code', 'en');
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);

        if (!isset($sections[$key])) {
            abort(404, "Section not found for key: $key");
        }

        $section = $sections[$key];
        $contentType = isset($section['content']) ? 'content' : (isset($section['element']) ? 'element' : null);

        if (!$contentType) {
            abort(404, "Content or Element not found for section: $key");
        }

        $dataKeys = $key . '.' . $contentType;
        $content = $section[$contentType];
        $frontend = Frontend::where('data_keys', $dataKeys)->first();

        // Initialize data values
        $dataValues = $frontend ? $frontend->data_values : [];

        // Handle translations for non-English languages
        if ($lang_code !== 'en' && $frontend) {
            $translations = json_decode($frontend->data_translations, true) ?? [];
            $translation = collect($translations)->firstWhere('language_code', $lang_code);

            if ($translation) {
                $dataValues = array_merge($frontend->data_values, $translation['values'] ?? []);
            } else {
                // Add new translation structure if not found
                $translations[] = [
                    'language_code' => $lang_code,
                    'values' => array_diff_key($frontend->data_values, ['images' => '']),
                ];
                $frontend->data_translations = json_encode($translations);
                $frontend->save();
            }
        }

        $imageCount = isset($content['images']) ? count($content['images']) : 0;
        $pageTitle = $section['name'] ?? trans('Frontend Management');

        return view('admin.frontend-management.edit', compact('pageTitle', 'key', 'content', 'dataValues', 'frontend', 'contentType', 'imageCount', 'lang_code'));
    }

    public function store(Request $request, $key, $id = null)
    {
        $lang_code = $request->get('lang_code');

        if (!$lang_code) {
            return back()->with('error', 'Language code is required');
        }

        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);

        if (!isset($sections[$key])) {
            abort(404, "Section not found for key: $key");
        }

        $section = $sections[$key];
        $contentType = isset($section['content']) ? 'content' : (isset($section['element']) ? 'element' : null);

        if (!$contentType) {
            abort(404, "Content or Element not found for section: $key");
        }

        $dataKeys = $key . '.' . $contentType;
        $frontend = $id ? Frontend::findOrFail($id) : new Frontend();

        // Process form data including nested structures
        $formData = $this->processFormData($request->except(['_token', '_method', 'type', 'lang_code']));

        // Handle image uploads
        $imageData = $this->handleImageUploads($request, $section[$contentType]['images'] ?? [], $frontend->data_values['images'] ?? []);

        $translations = json_decode($frontend->data_translations, true) ?? [];

        if ($lang_code === 'en') {
            // Handle English content
            $finalData = $formData;
            if (!empty($imageData)) {
                $finalData['images'] = $imageData;
            } elseif (isset($frontend->data_values['images'])) {
                $finalData['images'] = $frontend->data_values['images'];
            }

            $frontend->data_values = $finalData;
            $this->updateTranslation($translations, 'en', $formData);
        } else {
            // Handle non-English content
            $this->updateTranslation($translations, $lang_code, $formData);

            if (empty($frontend->data_values)) {
                $frontend->data_values = ['images' => $imageData];
                if (!$this->hasLanguageTranslation($translations, 'en')) {
                    $translations[] = ['language_code' => 'en', 'values' => []];
                }
            }
        }

        if (!$frontend->data_keys) {
            $frontend->data_keys = $dataKeys;
        }

        $frontend->data_translations = json_encode($translations);
        $frontend->save();

        $notify_message = trans('Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    private function processFormData($data)
    {
        $processed = [];
        foreach ($data as $key => $value) {
            if (preg_match('/^([^[]+)(?:\[([^\]]+)\])+/', $key, $matches)) {
                $keys = [];
                $keys[] = $matches[1];
                preg_match_all('/\[([^\]]+)\]/', $key, $nestedKeys);
                $keys = array_merge($keys, $nestedKeys[1]);

                $current = &$processed;
                foreach ($keys as $k) {
                    if (!isset($current[$k])) {
                        $current[$k] = [];
                    }
                    $current = &$current[$k];
                }
                $current = $value;
            } else {
                $processed[$key] = $value;
            }
        }
        return $processed;
    }

    private function handleImageUploads($request, $configuredImages, $existingImages)
    {
        $imageData = [];

        if (empty($configuredImages)) {
            return $existingImages ?? [];
        }

        foreach ($configuredImages as $imageKey => $imageDetails) {
            if ($request->hasFile($imageKey)) {
                $image = $request->file($imageKey);
                $imageName = time() . '_' . $imageKey . '.' . $image->getClientOriginalExtension();

                $oldFile = $existingImages[$imageKey] ?? null;
                if ($oldFile && File::exists(public_path($oldFile))) {
                    unlink(public_path($oldFile));
                }

                $image->move(public_path('uploads/website-images'), $imageName);
                $imageData[$imageKey] = 'uploads/website-images/' . $imageName;
            } elseif (isset($existingImages[$imageKey])) {
                $imageData[$imageKey] = $existingImages[$imageKey];
            }
        }

        return $imageData;
    }

    private function updateTranslation(&$translations, $langCode, $values)
    {
        $exists = false;
        foreach ($translations as &$translation) {
            if ($translation['language_code'] === $langCode) {
                $translation['values'] = $values;
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $translations[] = [
                'language_code' => $langCode,
                'values' => $values
            ];
        }
    }

    private function hasLanguageTranslation($translations, $langCode)
    {
        foreach ($translations as $translation) {
            if ($translation['language_code'] === $langCode) {
                return true;
            }
        }
        return false;
    }
}
