<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AuditLog;
use App\Models\Contact;

class ContactManagementService
{
    public function getStats(): array
    {
        return [
            'total' => Contact::count(),
            'unread' => Contact::where('status', 'unread')->count(),
            'read' => Contact::where('status', 'read')->count(),
            'replied' => Contact::where('status', 'replied')->count(),
        ];
    }

    public function getAllContacts()
    {
        return Contact::orderByDesc('created_at')->get();
    }

    public function getContactById(int $id)
    {
        return Contact::find($id);
    }

    public function markAsRead(int $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return null;
        }

        $contact->update(['status' => 'read']);

        $this->logAudit('marked_read', $contact);

        return $contact;
    }

    public function markAsReplied(int $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return null;
        }

        $contact->update(['status' => 'replied']);

        $this->logAudit('marked_replied', $contact);

        return $contact;
    }

    public function deleteContact(int $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $this->logAudit('deleted', $contact);
            $contact->delete();
        }
        return $contact;
    }

    protected function logAudit(string $action, $model): void
    {
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'old_values' => $action === 'updated' ? $model->getOriginal() : null,
            'new_values' => $action !== 'deleted' ? $model->toArray() : null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
