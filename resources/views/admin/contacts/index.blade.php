@extends('layouts.admin')

@section('content')
<div class="space-y-6" x-data="{ searchQuery: '', statusFilter: 'all' }">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">Contacts</h2>
            <p class="text-[13px] text-[#999999] mt-1">Manage incoming messages from the contact form.</p>
        </div>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="px-4 py-3 bg-[#f0fdf4] border border-[#bbf7d0] rounded-xl text-[14px] text-[#166534]">
            {{ session('success') }}
        </div>
    @endif

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#1a1a1a]">{{ $stats['total'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Total Messages</p>
        </div>
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#1a1a1a]">{{ $stats['unread'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Unread</p>
        </div>
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#1a1a1a]">{{ $stats['read'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Read</p>
        </div>
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#1a1a1a]">{{ $stats['replied'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Replied</p>
        </div>
    </div>

    {{-- Toolbar: Search + Filter --}}
    <div class="flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-[#999999]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" x-model="searchQuery" placeholder="Search by name, email, or subject..."
                class="w-full pl-11 pr-4 py-3 bg-white border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#777777] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200" />
        </div>
        <select x-model="statusFilter"
            class="px-4 py-3 bg-white border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 appearance-none cursor-pointer">
            <option value="all">All Status</option>
            <option value="unread">Unread</option>
            <option value="read">Read</option>
            <option value="replied">Replied</option>
        </select>
    </div>

    {{-- Contacts Table --}}
    @if($contacts->isEmpty())
        <div class="bg-white border border-[#e5e5e5] rounded-xl py-16 text-center">
            <svg class="w-12 h-12 mx-auto text-[#e5e5e5] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path></svg>
            <p class="text-[15px] font-semibold text-[#1a1a1a] mb-1">No messages yet.</p>
            <p class="text-[13px] text-[#999999]">Messages from the contact form will appear here.</p>
        </div>
    @else
        {{-- Desktop Table --}}
        <div class="hidden md:block bg-white border border-[#e5e5e5] rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-[#e5e5e5]">
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Customer</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Email</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Subject</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Status</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Received</th>
                            <th class="text-right px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr class="border-b border-[#e5e5e5] last:border-0 hover:bg-[#fafafa] transition-colors duration-150 {{ $contact->isUnread() ? 'bg-[#fafafa]' : '' }}"
                                x-show="(statusFilter === 'all') || (statusFilter === '{{ $contact->status }}')"
                                x-transition>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-[#f5f5f0] flex items-center justify-center flex-shrink-0">
                                            <span class="text-[12px] font-bold text-[{{ $contact->isUnread() ? '#1a1a1a' : '#999999' }}]">{{ strtoupper(substr($contact->name, 0, 1)) }}</span>
                                        </div>
                                        <div>
                                            <p class="text-[14px] font-medium text-[#1a1a1a] {{ $contact->isUnread() ? 'font-bold' : '' }}">{{ $contact->name }}</p>
                                            @if($contact->phone)
                                                <p class="text-[12px] text-[#999999]">{{ $contact->phone }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-[14px] text-[#666666]">{{ $contact->email }}</td>
                                <td class="px-6 py-4 text-[14px] text-[#666666]">{{ $contact->subject ?? '—' }}</td>
                                <td class="px-6 py-4">
                                    @if($contact->status === 'unread')
                                        <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full bg-[#1a1a1a] text-white">Unread</span>
                                    @elseif($contact->status === 'read')
                                        <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full bg-[#f5f5f0] text-[#666666]">Read</span>
                                    @else
                                        <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full bg-[#f0fdf4] text-[#166534]">Replied</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-[13px] text-[#999999]">{{ $contact->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="p-2 text-[#999999] hover:text-[#1a1a1a] rounded-lg hover:bg-[#f5f5f0] transition-colors duration-150" title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        </a>
                                        <button @click="$dispatch('open-delete-modal', { action: '{{ route('admin.contacts.destroy', $contact) }}' })" class="p-2 text-[#999999] hover:text-[#ef4444] rounded-lg hover:bg-[#fef2f2] transition-colors duration-150" title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                                            </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Mobile Cards --}}
        <div class="md:hidden space-y-3">
            @foreach($contacts as $contact)
                <div class="bg-white border border-[#e5e5e5] rounded-xl p-4 {{ $contact->isUnread() ? 'border-l-2 border-l-[#1a1a1a]' : '' }}"
                    x-show="(statusFilter === 'all') || (statusFilter === '{{ $contact->status }}')"
                    x-transition>
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-[#f5f5f0] flex items-center justify-center flex-shrink-0">
                                <span class="text-[12px] font-bold text-[#999999]">{{ strtoupper(substr($contact->name, 0, 1)) }}</span>
                            </div>
                            <div>
                                <p class="text-[14px] font-medium text-[#1a1a1a] {{ $contact->isUnread() ? 'font-bold' : '' }}">{{ $contact->name }}</p>
                                <p class="text-[12px] text-[#999999]">{{ $contact->email }}</p>
                            </div>
                        </div>
                        @if($contact->status === 'unread')
                            <span class="flex-shrink-0 px-2 py-0.5 text-[10px] font-semibold rounded-full bg-[#1a1a1a] text-white">Unread</span>
                        @elseif($contact->status === 'replied')
                            <span class="flex-shrink-0 px-2 py-0.5 text-[10px] font-semibold rounded-full bg-[#f0fdf4] text-[#166534]">Replied</span>
                        @endif
                    </div>
                    @if($contact->subject)
                        <p class="text-[13px] text-[#1a1a1a] font-medium mt-2">{{ $contact->subject }}</p>
                    @endif
                    <p class="text-[13px] text-[#666666] mt-1 line-clamp-2">{{ $contact->message }}</p>
                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-[#e5e5e5]">
                        <span class="text-[12px] text-[#999999]">{{ $contact->created_at->format('d M Y') }}</span>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="p-2 text-[#999999] hover:text-[#1a1a1a] rounded-lg hover:bg-[#f5f5f0] transition-colors duration-150">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </a>
                            <button @click="$dispatch('open-delete-modal', { action: '{{ route('admin.contacts.destroy', $contact) }}' })" class="p-2 text-[#999999] hover:text-[#ef4444] rounded-lg hover:bg-[#fef2f2] transition-colors duration-150">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                                </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Delete Modal --}}
    <x-ui.delete-modal title="Delete Message?" message="This contact message will be permanently deleted. This action cannot be undone." />

</div>
@endsection
