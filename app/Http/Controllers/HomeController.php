<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $reviews = Review::where('is_visible', true)
            ->orderByDesc('is_featured')
            ->orderBy('display_order')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $averageRating = Review::where('is_visible', true)->avg('rating');
        $averageRating = $averageRating ? round($averageRating, 1) : 0;

        return view('pages.home', [
            'title' => 'Home',
            'description' => 'Ananniti Tattoo Bali - Premium custom tattoo design studio',
            'reviews' => $reviews,
            'averageRating' => $averageRating,
        ]);
    }
}
