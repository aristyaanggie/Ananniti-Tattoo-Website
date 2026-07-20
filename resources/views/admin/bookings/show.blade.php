@extends('layouts.admin')

@section('content')
<div class="max-w-[1100px] mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center gap-1.5 text-[13px] text-[#999999] hover:text-[#1a1a1a] transition-colors duration-200 mb-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
                Back to Bookings
            </a>
            <div class="flex items-center gap-3">
                <h1 class="text-xl font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">Booking #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</h1>
                @php
                    $statusConfig = [
                        'pending' => ['bg' => 'bg-[#f59e0b]', 'text' => 'text-white'],
                        'confirmed' => ['bg' => 'bg-[#10b981]', 'text' => 'text-white'],
                        'completed' => ['bg' => 'bg-[#1a1a1a]', 'text' => 'text-white'],
                        'cancelled' => ['bg' => 'bg-[#ef4444]', 'text' => 'text-white'],
                    ];
                    $config = $statusConfig[$booking->status] ?? ['bg' => 'bg-[#e5e5e5]', 'text' => 'text-[#666666]'];
                @endphp
                <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full {{ $config['bg'] }} {{ $config['text'] }}">{{ ucfirst($booking->status) }}</span>
            </div>
            <p class="text-[12px] text-[#999999] mt-1">Created {{ $booking->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="px-4 py-3 bg-[#f0fdf4] border border-[#bbf7d0] rounded-xl text-[14px] text-[#166534]">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Left Column: Details --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Client Information --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-5" style="font-family: var(--font-heading);">Client Information</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Name</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->name }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Phone</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->phone }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Email</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->email ?? '—' }}</p>
                    </div>
                </div>
            </div>

            {{-- Booking Information --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-5" style="font-family: var(--font-heading);">Booking Information</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Service</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a] capitalize">{{ str_replace('_', ' ', $booking->service_type) }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Artist</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->artist->name ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Preferred Date</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->booking_date->format('l, d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Preferred Time</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->booking_time ? $booking->booking_time->format('H:i') : '—' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Placement</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->placement ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-1">Size</p>
                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->size ?? '—' }}</p>
                    </div>
                </div>
                @if($booking->design_description)
                    <div class="mt-5 pt-5 border-t border-[#e5e5e5]">
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-2">Design Description</p>
                        <p class="text-[14px] text-[#666666] leading-relaxed">{{ $booking->design_description }}</p>
                    </div>
                @endif
                @if($booking->notes)
                    <div class="mt-5 pt-5 border-t border-[#e5e5e5]">
                        <p class="text-[11px] uppercase tracking-[0.15em] text-[#999999] mb-2">Client Notes</p>
                        <p class="text-[14px] text-[#666666] leading-relaxed">{{ $booking->notes }}</p>
                    </div>
                @endif
            </div>

            {{-- Internal Note --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-5" style="font-family: var(--font-heading);">Internal Note</h3>
                <form method="POST" action="{{ route('admin.bookings.update', $booking) }}">
                    @csrf
                    @method('PUT')
                    <textarea name="notes" rows="4" class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#777777] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 resize-none mb-4" placeholder="Add internal notes for this booking...">{{ $booking->notes }}</textarea>
                    <input type="hidden" name="status" value="{{ $booking->status }}" />
                    <button type="submit" class="px-5 py-2 bg-[#1a1a1a] text-white text-[13px] font-semibold rounded-lg hover:bg-[#333333] transition-colors duration-200">Save Note</button>
                </form>
            </div>

        </div>

        {{-- Right Column: Actions --}}
        <div class="space-y-6">

            {{-- Status Update --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-5" style="font-family: var(--font-heading);">Update Status</h3>
                <form method="POST" action="{{ route('admin.bookings.update', $booking) }}">
                    @csrf
                    @method('PUT')
                    <select name="status" class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 appearance-none cursor-pointer mb-4">
                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <input type="hidden" name="notes" value="{{ $booking->notes }}" />
                    <button type="submit" class="w-full px-4 py-2.5 bg-[#1a1a1a] text-white text-[13px] font-semibold rounded-lg hover:bg-[#333333] transition-colors duration-200">Update Status</button>
                </form>
            </div>

            {{-- WhatsApp Actions --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-5" style="font-family: var(--font-heading);">WhatsApp</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[13px] text-[#666666]">Status</span>
                        @if($booking->whatsapp_sent_at)
                            <span class="inline-flex items-center gap-1 text-[13px] font-medium text-[#10b981]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                                Sent {{ $booking->whatsapp_sent_at->format('d M Y') }}
                            </span>
                        @else
                            <span class="text-[13px] text-[#999999]">Not Sent</span>
                        @endif
                    </div>
                    <a href="https://wa.me/{{ ltrim($booking->phone, '+') }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-[#25D366] text-white text-[13px] font-semibold rounded-lg hover:bg-[#128C7E] transition-colors duration-200">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.36-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.984-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.985 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.89-11.893 0-3.189-1.256-6.217-3.564-8.456z"></svg>
                        Open WhatsApp
                    </a>
                    <button onclick="navigator.clipboard.writeText('Halo {{ $booking->name }}, ini dari Ananniti Tattoo Bali. Terima kasih sudah melakukan booking. Status booking Anda: {{ ucfirst($booking->status) }}. Terima kasih.')" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 border border-[#e5e5e5] text-[#666666] text-[13px] font-medium rounded-lg hover:bg-[#fafafa] transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9.75a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184"></path></svg>
                        Copy Template
                    </button>
                    <form method="POST" action="{{ route('admin.bookings.update', $booking) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{ $booking->status }}" />
                        <input type="hidden" name="whatsapp_sent" value="1" />
                        <button type="submit" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 border border-[#10b981] text-[#10b981] text-[13px] font-medium rounded-lg hover:bg-[#10b981]/10 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            Mark as WhatsApp Sent
                        </button>
                    </form>
                </div>
            </div>

            {{-- Timeline --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-5" style="font-family: var(--font-heading);">Timeline</h3>
                <div class="space-y-0">
                    {{-- Created --}}
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 rounded-full bg-[#1a1a1a] flex-shrink-0"></div>
                            <div class="w-px h-full bg-[#e5e5e5]"></div>
                        </div>
                        <div class="pb-6">
                            <p class="text-[13px] font-semibold text-[#1a1a1a]">Created</p>
                            <p class="text-[12px] text-[#999999]">{{ $booking->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    {{-- Confirmed --}}
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 rounded-full {{ in_array($booking->status, ['confirmed', 'completed']) ? 'bg-[#1a1a1a]' : 'bg-[#e5e5e5]' }} flex-shrink-0"></div>
                            <div class="w-px h-full bg-[#e5e5e5]"></div>
                        </div>
                        <div class="pb-6">
                            <p class="text-[13px] font-semibold {{ in_array($booking->status, ['confirmed', 'completed']) ? 'text-[#1a1a1a]' : 'text-[#999999]' }}">Confirmed</p>
                            <p class="text-[12px] text-[#999999]">{{ in_array($booking->status, ['confirmed', 'completed']) ? 'Booking confirmed' : 'Awaiting confirmation' }}</p>
                        </div>
                    </div>
                    {{-- WhatsApp Sent --}}
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 rounded-full {{ $booking->whatsapp_sent_at ? 'bg-[#1a1a1a]' : 'bg-[#e5e5e5]' }} flex-shrink-0"></div>
                            <div class="w-px h-full bg-[#e5e5e5]"></div>
                        </div>
                        <div class="pb-6">
                            <p class="text-[13px] font-semibold {{ $booking->whatsapp_sent_at ? 'text-[#1a1a1a]' : 'text-[#999999]' }}">WhatsApp Sent</p>
                            <p class="text-[12px] text-[#999999]">{{ $booking->whatsapp_sent_at ? $booking->whatsapp_sent_at->format('d M Y, H:i') : 'Not yet sent' }}</p>
                        </div>
                    </div>
                    {{-- Completed --}}
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 rounded-full {{ $booking->status === 'completed' ? 'bg-[#1a1a1a]' : 'bg-[#e5e5e5]' }} flex-shrink-0"></div>
                        </div>
                        <div>
                            <p class="text-[13px] font-semibold {{ $booking->status === 'completed' ? 'text-[#1a1a1a]' : 'text-[#999999]' }}">Completed</p>
                            <p class="text-[12px] text-[#999999]">{{ $booking->status === 'completed' ? 'Booking completed' : 'Awaiting completion' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
