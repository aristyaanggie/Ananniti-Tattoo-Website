<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Services\BookingManagementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminBookingController extends Controller
{
    public function __construct(
        protected BookingManagementService $bookingService,
    ) {}

    public function index(): View
    {
        $stats = $this->bookingService->getStats();
        $bookings = $this->bookingService->getLatestBookings();

        return view('admin.bookings.index', [
            'pageTitle' => 'Bookings',
            'bookings' => $bookings,
            'stats' => $stats,
        ]);
    }

    public function show(Booking $booking): View
    {
        $booking->load(['artist', 'services', 'user']);

        return view('admin.bookings.show', [
            'pageTitle' => 'Booking #' . str_pad($booking->id, 5, '0', STR_PAD_LEFT),
            'booking' => $booking,
        ]);
    }

    public function update(UpdateBookingRequest $request, Booking $booking): RedirectResponse
    {
        $data = $request->validated();
        $this->bookingService->updateBooking($booking->id, $data);

        return redirect()->route('admin.bookings.show', $booking)
            ->with('success', 'Booking updated successfully.');
    }
}
