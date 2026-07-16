@extends('layouts.admin')

@section('content')
<div class="space-y-6" x-data="{ searchQuery: '', statusFilter: 'all', serviceFilter: 'all' }">

    {{-- Header --}}
    <div>
        <h2 class="text-xl font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">Bookings</h2>
        <p class="text-[13px] text-[#999999] mt-1">Manage all studio bookings and consultations.</p>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#1a1a1a]">{{ $stats['total'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Total</p>
        </div>
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#f59e0b]">{{ $stats['pending'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Pending</p>
        </div>
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#10b981]">{{ $stats['confirmed'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Confirmed</p>
        </div>
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#1a1a1a]">{{ $stats['completed'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Completed</p>
        </div>
        <div class="stat-card">
            <p class="text-2xl font-bold text-[#ef4444]">{{ $stats['cancelled'] }}</p>
            <p class="text-[13px] text-[#999999] mt-1">Cancelled</p>
        </div>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col md:flex-row gap-4">
        {{-- Search --}}
        <div class="flex-1 relative">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-[#999999]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" x-model="searchQuery" placeholder="Search by name or phone..."
                class="w-full pl-11 pr-4 py-3 bg-white border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#999999] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200" />
        </div>

        {{-- Status Filter --}}
        <div class="relative">
            <select x-model="statusFilter"
                class="w-full md:w-44 px-4 py-3 bg-white border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 appearance-none cursor-pointer">
                <option value="all">All Status</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-[#999999] pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"></path></svg>
        </div>

        {{-- Service Filter --}}
        <div class="relative">
            <select x-model="serviceFilter"
                class="w-full md:w-44 px-4 py-3 bg-white border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 appearance-none cursor-pointer">
                <option value="all">All Services</option>
                <option value="studio">Studio</option>
                <option value="home_service">Home Service</option>
                <option value="consultation">Consultation</option>
            </select>
            <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-[#999999] pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"></path></svg>
        </div>
    </div>

    {{-- Bookings Table --}}
    @if($bookings->isEmpty())
        <div class="bg-white border border-[#e5e5e5] rounded-xl py-16 text-center">
            <svg class="w-12 h-12 mx-auto text-[#e5e5e5] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path></svg>
            <p class="text-[15px] font-semibold text-[#1a1a1a] mb-1">No bookings yet.</p>
            <p class="text-[13px] text-[#999999]">Bookings from the website will appear here.</p>
        </div>
    @else
        {{-- Desktop Table --}}
        <div class="hidden md:block bg-white border border-[#e5e5e5] rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-[#e5e5e5]">
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">ID</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Customer</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Service</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Artist</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Date</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Status</th>
                            <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">WhatsApp</th>
                            <th class="text-right px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr class="border-b border-[#e5e5e5] last:border-0 hover:bg-[#fafafa] transition-colors duration-150">
                                <td class="px-6 py-4 text-[13px] text-[#999999] font-mono">#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-6 py-4">
                                    <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->name }}</p>
                                    <p class="text-[12px] text-[#999999]">{{ $booking->phone }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full bg-[#f5f5f0] text-[#666666] capitalize">{{ str_replace('_', ' ', $booking->service_type) }}</span>
                                </td>
                                <td class="px-6 py-4 text-[14px] text-[#666666]">{{ $booking->artist->name ?? '—' }}</td>
                                <td class="px-6 py-4 text-[14px] text-[#666666]">{{ $booking->booking_date->format('d M Y') }}</td>
                                <td class="px-6 py-4">
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
                                </td>
                                <td class="px-6 py-4">
                                    @if($booking->whatsapp_sent_at)
                                        <span class="inline-flex items-center gap-1 text-[12px] text-[#10b981]">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                                            Sent
                                        </span>
                                    @else
                                        <span class="text-[12px] text-[#999999]">—</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.dashboard') }}" class="p-2 text-[#999999] hover:text-[#1a1a1a] rounded-lg hover:bg-[#f5f5f0] transition-colors duration-150" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Mobile Cards --}}
        <div class="md:hidden space-y-3">
            @foreach($bookings as $booking)
                @php
                    $statusConfig = [
                        'pending' => ['bg' => 'bg-[#f59e0b]', 'text' => 'text-white'],
                        'confirmed' => ['bg' => 'bg-[#10b981]', 'text' => 'text-white'],
                        'completed' => ['bg' => 'bg-[#1a1a1a]', 'text' => 'text-white'],
                        'cancelled' => ['bg' => 'bg-[#ef4444]', 'text' => 'text-white'],
                    ];
                    $config = $statusConfig[$booking->status] ?? ['bg' => 'bg-[#e5e5e5]', 'text' => 'text-[#666666]'];
                @endphp
                <div class="bg-white border border-[#e5e5e5] rounded-xl p-4">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $booking->name }}</p>
                            <p class="text-[12px] text-[#999999]">{{ $booking->phone }}</p>
                        </div>
                        <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full {{ $config['bg'] }} {{ $config['text'] }}">{{ ucfirst($booking->status) }}</span>
                    </div>
                    <div class="flex items-center gap-4 text-[12px] text-[#999999] mt-2">
                        <span class="capitalize">{{ str_replace('_', ' ', $booking->service_type) }}</span>
                        <span>{{ $booking->booking_date->format('d M Y') }}</span>
                        <span>{{ $booking->artist->name ?? '—' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
