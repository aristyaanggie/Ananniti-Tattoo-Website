<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\ArtistProfile;
use App\Models\Booking;
use App\Models\Category;
use App\Models\PortfolioItem;
use App\Models\Product;
use App\Models\Review;

class DashboardService
{
    public function getStats(): array
    {
        return [
            'products' => Product::count(),
            'categories' => Category::count(),
            'portfolio' => PortfolioItem::count(),
            'artists' => ArtistProfile::count(),
            'bookings' => Booking::count(),
            'reviews' => Review::count(),
        ];
    }

    public function getRecentBookings(int $limit = 5): array
    {
        return Booking::with([])
            ->select('id', 'name', 'service_type', 'status', 'booking_date')
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get()
            ->toArray();
    }
}
