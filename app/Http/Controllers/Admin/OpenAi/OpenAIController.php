<?php

namespace App\Http\Controllers\Admin\OpenAi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use OpenAI as OpenAIClient;
use App\Http\Controllers\Controller;

class OpenAIController extends Controller
{


    public function ask(Request $request)
    {
        $validated = $request->validate([
            'prompt' => ['required', 'string', 'max:4000'],
        ]);

        $answer = null;
        $errorMessage = null;

        try {
            $apiKey = GlobalSetting::where('key','openai_api_key')->first()->value ?: (config('services.openai.key') ?: env('OPENAI_API_KEY'));
            $organization = GlobalSetting::where('key','openai_organization')->first()->value ?: (config('services.openai.organization') ?: env('OPENAI_ORGANIZATION'));

            $factory = OpenAIClient::factory()->withApiKey($apiKey);
            if (!empty($organization)) {
                $factory = $factory->withOrganization($organization);
            }
            $client = $factory->make();
            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant. Answer concisely.'],
                    ['role' => 'user', 'content' => $validated['prompt']],

                ],
            ]);

            $answer = trim($response->choices[0]->message->content ?? '');
        } catch (\Throwable $e) {
            Log::error('OpenAI chat error', ['message' => $e->getMessage()]);
            $errorMessage = 'Failed to get a response. Please check API key/configuration. (' . $e->getMessage() . ')';
        }

        if ($request->wantsJson() || $request->ajax()) {
            if ($errorMessage) {
                return response()->json(['ok' => false, 'message' => $errorMessage], 500);
            }
            return response()->json(['ok' => true, 'answer' => $answer]);
        }

        return view('openai.index', [
            'prompt' => $validated['prompt'],
            'answer' => $answer,
            'errorMessage' => $errorMessage,
        ]);
    }
}


