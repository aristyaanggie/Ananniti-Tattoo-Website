<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Booking;
use App\Repositories\Contracts\BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
    public function __construct(
        protected Booking $model,
    ) {}

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $booking = $this->model->find($id);
        if ($booking) {
            $booking->update($data);
        }
        return $booking;
    }

    public function delete(int $id)
    {
        $booking = $this->model->find($id);
        if ($booking) {
            $booking->delete();
        }
        return $booking;
    }

    public function getByStatus(string $status)
    {
        return $this->model->where('status', $status)->get();
    }

    public function getByDate(string $date)
    {
        return $this->model->where('booking_date', $date)->get();
    }

    public function getByUser(int $userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }
}
