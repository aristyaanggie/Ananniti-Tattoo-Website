<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Services\ContactManagementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminContactController extends Controller
{
    public function __construct(
        protected ContactManagementService $contactService,
    ) {}

    public function index(): View
    {
        $contacts = $this->contactService->getAllContacts();

        $stats = $this->contactService->getStats();

        return view('admin.contacts.index', [
            'pageTitle' => 'Contacts',
            'contacts' => $contacts,
            'stats' => $stats,
        ]);
    }

    public function show(Contact $contact): View
    {
        if ($contact->isUnread()) {
            $this->contactService->markAsRead($contact->id);
        }

        return view('admin.contacts.show', [
            'pageTitle' => 'Contact Detail',
            'contact' => $contact->fresh(),
        ]);
    }

    public function markRead(Contact $contact): RedirectResponse
    {
        $this->contactService->markAsRead($contact->id);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact marked as read.');
    }

    public function markReplied(Contact $contact): RedirectResponse
    {
        $this->contactService->markAsReplied($contact->id);

        return redirect()->route('admin.contacts.show', $contact)
            ->with('success', 'Contact marked as replied.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $this->contactService->deleteContact($contact->id);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact deleted.');
    }
}
