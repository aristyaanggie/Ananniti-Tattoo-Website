<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Contracts\BookingRepositoryInterface;

class BookingService
{
    public function __construct(
        protected BookingRepositoryInterface $bookingRepository,
    ) {}

    public function getAllBookings()
    {
        return $this->bookingRepository->all();
    }

    public function getBookingById(int $id)
    {
        return $this->bookingRepository->find($id);
    }

    public function createBooking(array $data)
    {
        $data['status'] = $data['status'] ?? 'pending';
        return $this->bookingRepository->create($data);
    }

    public function updateBooking(int $id, array $data)
    {
        return $this->bookingRepository->update($id, $data);
    }

    public function cancelBooking(int $id)
    {
        return $this->bookingRepository->update($id, ['status' => 'cancelled']);
    }

    public function confirmBooking(int $id)
    {
        return $this->bookingRepository->update($id, ['status' => 'confirmed']);
    }

    public function completeBooking(int $id)
    {
        return $this->bookingRepository->update($id, ['status' => 'completed']);
    }

    public function getBookingsByStatus(string $status)
    {
        return $this->bookingRepository->getByStatus($status);
    }

    public function getBookingsByDate(string $date)
    {
        return $this->bookingRepository->getByDate($date);
    }

    public function getBookingsByUser(int $userId)
    {
        return $this->bookingRepository->getByUser($userId);
    }
}
