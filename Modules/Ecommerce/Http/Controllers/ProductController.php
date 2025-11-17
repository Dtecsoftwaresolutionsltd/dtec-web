<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Ecommerce\Entities\Product;
use Modules\Ecommerce\Entities\ProductReview;
use Modules\SeoSetting\App\Models\SeoSetting;

class ProductController extends Controller
{
    public function shop(Request $request)
    {
        try {
            $query = Product::with('translate')->active();

            // Only apply price filter if values are explicitly set in request
            if ($request->filled('min_price')) {
                $query->where('price', '>=', $request->min_price);
            }
            if ($request->filled('max_price')) {
                $query->where('price', '<=', $request->max_price);
            }

            $products = $query->latest()->paginate(9);

            // Get price range from all products, not filtered ones
            $productMaxPrice = Product::active()->max('price') ?? 1000;
            $productMinPrice = Product::active()->min('price') ?? 0;


            // Get brands with translation
            $brands = Brand::with('products','translate')->get();

            // Get categories with translation and product count
            $categories = Category::with('translate')
                ->withCount(['products' => function($query) {
                    $query->active();
                }])
                ->get();

            // Ensure we have some range even if min equals max
            if ($productMaxPrice <= $productMinPrice) {
                $productMaxPrice = $productMinPrice + 100;
            }

            $seo_setting = SeoSetting::where('id', 12)->first();
            return view('frontend.shop.index', compact(
                'products',
                'productMinPrice',
                'productMaxPrice',
                'brands',
                'categories',
                'seo_setting'
            ));

        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while loading the shop page.');
        }
    }

    public function search(Request $request)
    {
        $pageTitle = trans('Search Results');

        // 1. Get min/max prices before any filtering
        $productMinPrice = Product::min('price');
        $productMaxPrice = Product::max('price');

        // 2. Get filter parameters
        $query = $request->input('query');
        $brand = $request->input('brand');
        $categories = $request->input('categories','');
        $minPrice = $request->input('min_price', $productMinPrice);
        $maxPrice = $request->input('max_price', $productMaxPrice);
        $paginet= $request->input('item_quantity', 12);

        // 3. Build the query
        $products = Product::with('translate')
            ->when($query, function($q) use ($query) {
                $q->whereHas('translate', function($sq) use ($query) {
                    $sq->where('name', 'LIKE', "%{$query}%");
                });
            })
            ->when($brand, function($q) use ($brand) {
                $q->where('brand_id', $brand);
            })
            ->when($categories, function($q) use ($categories) {
                $q->where('category_id', $categories);
            })
            ->when($request->filled('min_price'), function($q) use ($minPrice) {
                $q->where('price', '>=', $minPrice);
            })
            ->when($request->filled('max_price'), function($q) use ($maxPrice) {
                $q->where('price', '<=', $maxPrice);
            })
            ->when($request->filled('sort_by'), function($q) use ($request) {
                switch ($request->sort_by) {
                    case 'oldest':
                        $q->orderBy('id', 'asc');
                        break;

                    case 'newest':
                        $q->orderBy('id', 'desc');
                        break;

                    case 'price(a-z)':
                        $q->orderBy('price', 'asc');
                        break;

                    case 'price(z-a)':
                        $q->orderBy('price', 'desc');
                        break;

                    default:
                        $q->orderBy('created_at', 'desc');
                        break;
                }
            }, function ($q) {
                $q->latest();
            })
            ->active()
            ->paginate($paginet)
            ->withQueryString();


        // 4. Get brands and categories for filters
        $brands = Brand::with('translate')->get();
        $categories = Category::with('translate')
            ->withCount(['products' => function($query) {
                $query->active();
            }])
            ->get();

            $seo_setting = SeoSetting::where('id', 12)->first();

        // 5. Return view with all necessary data
        return view('frontend.shop.index', compact(
            'products',
            'brands',
            'categories',
            'query',
            'productMinPrice',
            'productMaxPrice',
            'minPrice',
            'maxPrice',
            'pageTitle',
            'seo_setting'
        ));
    }

    public function product($slug)
    {
        $seo_setting = SeoSetting::first();

        $product = Product::where('slug', $slug)
            ->with(['translate', 'galleries', 'reviews','category', 'brand'])
            ->firstOrFail();

        $pageTitle = $product->translate?->name;

        $relatedProducts = Product::latest()
                ->where('id', '!=', $product->id)
                ->limit(8)
                ->get();

        $reviews = ProductReview::with('user')
            ->where('product_id', $product->id)
            ->latest()
            ->get();

        return view('ecommerce::frontend.single_product', compact(
            'product',
            'pageTitle',
            'seo_setting',
            'relatedProducts',
            'reviews'
        ));
    }


}
