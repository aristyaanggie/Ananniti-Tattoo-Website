<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AuditLog;
use App\Models\Booking;

class BookingManagementService
{
    public function getStats(): array
    {
        return [
            'total' => Booking::count(),
            'pending' => Booking::where('status', 'pending')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
        ];
    }

    public function getLatestBookings(int $limit = 50)
    {
        return Booking::with(['artist', 'services'])
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();
    }

    public function getBookingById(int $id)
    {
        return Booking::with(['artist', 'services', 'user'])->find($id);
    }

    public function updateBooking(int $id, array $data)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return null;
        }

        $oldStatus = $booking->status;
        $booking->update($data);

        if (isset($data['status']) && $data['status'] !== $oldStatus) {
            $this->logAudit('status_changed', $booking, [
                'old_status' => $oldStatus,
                'new_status' => $data['status'],
            ]);
        }

        return $booking;
    }

    public function markWhatsAppSent(int $id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->update(['whatsapp_sent_at' => now()]);
            $this->logAudit('whatsapp_sent', $booking);
        }
        return $booking;
    }

    protected function logAudit(string $action, $model, array $extra = []): void
    {
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'old_values' => $extra['old_values'] ?? null,
            'new_values' => array_merge($model->toArray(), $extra),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
