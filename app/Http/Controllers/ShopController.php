<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        return view('pages.shop', [
            'title' => 'Shop',
            'description' => 'Discover professional tattoo equipment, premium supplies, and studio essentials carefully selected by Ananniti Tattoo.',
        ]);
    }

    public function category(string $category): View
    {
        return view('pages.shop-category', [
            'title' => ucfirst($category),
            'description' => 'Professional ' . $category . ' equipment carefully selected by Ananniti Tattoo.',
            'category' => $category,
        ]);
    }

    public function show(string $slug): View
    {
        return view('pages.shop-detail', [
            'title' => 'Product Detail',
            'description' => 'Professional tattoo equipment selected for artists who value precision, durability, and craftsmanship.',
            'slug' => $slug,
        ]);
    }
}
