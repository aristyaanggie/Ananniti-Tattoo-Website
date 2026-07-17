@extends('layouts.admin')

@section('content')
<div class="max-w-[900px] mx-auto">

    {{-- Header --}}
    <div class="mb-8">
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-1.5 text-[13px] text-[#999999] hover:text-[#1a1a1a] transition-colors duration-200 mb-4">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
            Back to Contacts
        </a>
        <h2 class="text-xl font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">{{ $pageTitle }}</h2>
        <p class="text-[13px] text-[#999999] mt-1">View and manage this contact message.</p>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-[#f0fdf4] border border-[#bbf7d0] rounded-xl text-[14px] text-[#166534]">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">

        {{-- Contact Info Card --}}
        <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
            <div class="flex items-start justify-between gap-4 mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#f5f5f0] flex items-center justify-center flex-shrink-0">
                        <span class="text-[16px] font-bold text-[#1a1a1a]">{{ strtoupper(substr($contact->name, 0, 1)) }}</span>
                    </div>
                    <div>
                        <h3 class="text-[16px] font-bold text-[#1a1a1a]">{{ $contact->name }}</h3>
                        <p class="text-[13px] text-[#999999]">{{ $contact->email }}</p>
                    </div>
                </div>
                @if($contact->status === 'unread')
                    <span class="flex-shrink-0 px-2.5 py-1 text-[11px] font-semibold rounded-full bg-[#1a1a1a] text-white">Unread</span>
                @elseif($contact->status === 'read')
                    <span class="flex-shrink-0 px-2.5 py-1 text-[11px] font-semibold rounded-full bg-[#f5f5f0] text-[#666666]">Read</span>
                @else
                    <span class="flex-shrink-0 px-2.5 py-1 text-[11px] font-semibold rounded-full bg-[#f0fdf4] text-[#166534]">Replied</span>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-[12px] text-[#999999] uppercase tracking-wider mb-1">Email</p>
                    <p class="text-[14px] text-[#1a1a1a]">{{ $contact->email }}</p>
                </div>
                <div>
                    <p class="text-[12px] text-[#999999] uppercase tracking-wider mb-1">Phone</p>
                    <p class="text-[14px] text-[#1a1a1a]">{{ $contact->phone ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-[12px] text-[#999999] uppercase tracking-wider mb-1">Subject</p>
                    <p class="text-[14px] text-[#1a1a1a]">{{ $contact->subject ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-[12px] text-[#999999] uppercase tracking-wider mb-1">Received At</p>
                    <p class="text-[14px] text-[#1a1a1a]">{{ $contact->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>

        {{-- Message Card --}}
        <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
            <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-4" style="font-family: var(--font-heading);">Message</h3>
            <div class="bg-[#fafafa] border border-[#e5e5e5] rounded-xl p-5">
                <p class="text-[14px] text-[#1a1a1a] leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</p>
            </div>
        </div>

        {{-- Actions --}}
        <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
            <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-4" style="font-family: var(--font-heading);">Actions</h3>
            <div class="flex flex-wrap gap-3">
                @if($contact->status !== 'read')
                    <form method="POST" action="{{ route('admin.contacts.mark-read', $contact) }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#1a1a1a] text-white text-[13px] font-semibold rounded-lg hover:bg-[#333333] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path></svg>
                            Mark as Read
                        </button>
                    </form>
                @endif

                @if($contact->status !== 'replied')
                    <form method="POST" action="{{ route('admin.contacts.mark-replied', $contact) }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-[#e5e5e5] text-[#1a1a1a] text-[13px] font-semibold rounded-lg hover:border-[#1a1a1a] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Mark as Replied
                        </button>
                    </form>
                @endif

                <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Are you sure you want to delete this message? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-[#e5e5e5] text-[#ef4444] text-[13px] font-semibold rounded-lg hover:border-[#ef4444] hover:bg-[#fef2f2] transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
