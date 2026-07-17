<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Services\ProductService;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function __construct(
        protected ProductService $productService,
    ) {}

    public function index(): View
    {
        $categories = Category::where('type', 'product')
            ->where('is_visible', true)
            ->orderBy('display_order')
            ->get();

        $productsByCategory = [];

        foreach ($categories as $category) {
            $productsByCategory[$category->id] = Product::with(['badge'])
                ->where('category_id', $category->id)
                ->where('is_visible', true)
                ->orderByDesc('display_order')
                ->orderByDesc('created_at')
                ->get();
        }

        return view('pages.shop', [
            'title' => 'Shop',
            'description' => 'Discover professional tattoo equipment, premium supplies, and studio essentials carefully selected by Ananniti Tattoo.',
            'categories' => $categories,
            'productsByCategory' => $productsByCategory,
        ]);
    }

    public function category(string $category): View
    {
        $categoryModel = Category::where('slug', $category)->where('type', 'product')->firstOrFail();

        $products = Product::with(['category', 'badge'])
            ->where('category_id', $categoryModel->id)
            ->where('is_visible', true)
            ->orderByDesc('display_order')
            ->orderByDesc('created_at')
            ->get();

        return view('pages.shop-category', [
            'title' => $categoryModel->name,
            'description' => 'Professional ' . $categoryModel->name . ' equipment carefully selected by Ananniti Tattoo.',
            'category' => $categoryModel,
            'products' => $products,
        ]);
    }

    public function show(string $slug): View
    {
        $product = Product::with(['category', 'badge', 'galleries'])
            ->where('slug', $slug)
            ->where('is_visible', true)
            ->firstOrFail();

        $relatedProducts = Product::with(['category', 'badge'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_visible', true)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $whatsappNumber = Setting::where('key', 'whatsapp')->value('value') ?? '6281234567890';
        $whatsappNumber = $this->formatWhatsAppNumber($whatsappNumber);

        return view('pages.shop-detail', [
            'title' => $product->meta_title ?: $product->name,
            'description' => $product->meta_description ?: $product->short_description ?: Str::limit(strip_tags($product->description), 160),
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'whatsappNumber' => $whatsappNumber,
        ]);
    }

    protected function formatWhatsAppNumber(string $number): string
    {
        $number = preg_replace('/[^0-9]/', '', $number);

        if (str_starts_with($number, '08')) {
            $number = '62' . substr($number, 1);
        }

        if (str_starts_with($number, '628')) {
            return $number;
        }

        if (str_starts_with($number, '62')) {
            return $number;
        }

        return '62' . $number;
    }
}
