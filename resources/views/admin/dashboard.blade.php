@extends('layouts.admin')

@section('content')
<div class="space-y-8">

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
        @php
            $statItems = [
                ['label' => 'Products', 'count' => $stats['products'], 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />'],
                ['label' => 'Categories', 'count' => $stats['categories'], 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a1.807 1.807 0 000-2.764L13.11 3.757a1.807 1.807 0 00-2.607.33L8.958 5.623M3 9.75v4.5A2.25 2.25 0 005.25 16.5h4.5" />'],
                ['label' => 'Portfolio', 'count' => $stats['portfolio'], 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5a1.5 1.5 0 001.5-1.5V5.25a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v14.25a1.5 1.5 0 001.5 1.5z" />'],
                ['label' => 'Artists', 'count' => $stats['artists'], 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />'],
                ['label' => 'Bookings', 'count' => $stats['bookings'], 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />'],
                ['label' => 'Reviews', 'count' => $stats['reviews'], 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />'],
            ];
        @endphp

        @foreach($statItems as $stat)
            <div class="stat-card">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#1a1a1a]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">{!! $stat['icon'] !!}</svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-[#1a1a1a]">{{ $stat['count'] }}</p>
                <p class="text-[13px] text-[#999999] mt-1">{{ $stat['label'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Recent Bookings --}}
    <div class="bg-white border border-[#e5e5e5] rounded-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-[#e5e5e5]">
            <h2 class="text-[15px] font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">Recent Bookings</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-[#e5e5e5]">
                        <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Customer</th>
                        <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Service</th>
                        <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Status</th>
                        <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentBookings as $booking)
                        <tr class="border-b border-[#e5e5e5] last:border-0">
                            <td class="px-6 py-4 text-[14px] text-[#1a1a1a] font-medium">{{ $booking['name'] }}</td>
                            <td class="px-6 py-4 text-[14px] text-[#666666] capitalize">{{ str_replace('_', ' ', $booking['service_type']) }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-[#f59e0b] text-white',
                                        'confirmed' => 'bg-[#10b981] text-white',
                                        'completed' => 'bg-[#1a1a1a] text-white',
                                        'cancelled' => 'bg-[#ef4444] text-white',
                                    ];
                                @endphp
                                <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full {{ $statusColors[$booking['status']] ?? 'bg-[#e5e5e5] text-[#666666]' }}">
                                    {{ ucfirst($booking['status']) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-[14px] text-[#666666]">{{ \Carbon\Carbon::parse($booking['booking_date'])->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-[14px] text-[#999999]">No bookings yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div>
        <h2 class="text-[15px] font-bold text-[#1a1a1a] mb-4" style="font-family: var(--font-heading);">Quick Actions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4 p-5 bg-white border border-[#e5e5e5] rounded-xl hover:border-[#1a1a1a] transition-all duration-200">
                <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center group-hover:bg-[#1a1a1a] transition-colors duration-200">
                    <svg class="w-5 h-5 text-[#1a1a1a] group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path></svg>
                </div>
                <div>
                    <p class="text-[14px] font-semibold text-[#1a1a1a]">Add Product</p>
                    <p class="text-[12px] text-[#999999]">Create new product</p>
                </div>
            </a>
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4 p-5 bg-white border border-[#e5e5e5] rounded-xl hover:border-[#1a1a1a] transition-all duration-200">
                <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center group-hover:bg-[#1a1a1a] transition-colors duration-200">
                    <svg class="w-5 h-5 text-[#1a1a1a] group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5a1.5 1.5 0 001.5-1.5V5.25a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v14.25a1.5 1.5 0 001.5 1.5z"></path></svg>
                </div>
                <div>
                    <p class="text-[14px] font-semibold text-[#1a1a1a]">Add Portfolio</p>
                    <p class="text-[12px] text-[#999999]">Upload artwork</p>
                </div>
            </a>
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4 p-5 bg-white border border-[#e5e5e5] rounded-xl hover:border-[#1a1a1a] transition-all duration-200">
                <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center group-hover:bg-[#1a1a1a] transition-colors duration-200">
                    <svg class="w-5 h-5 text-[#1a1a1a] group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                </div>
                <div>
                    <p class="text-[14px] font-semibold text-[#1a1a1a]">Edit Landing Page</p>
                    <p class="text-[12px] text-[#999999]">Update content</p>
                </div>
            </a>
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4 p-5 bg-white border border-[#e5e5e5] rounded-xl hover:border-[#1a1a1a] transition-all duration-200">
                <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center group-hover:bg-[#1a1a1a] transition-colors duration-200">
                    <svg class="w-5 h-5 text-[#1a1a1a] group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.21-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.728c-.293.21-.438.59-.438.924v.08c0 .333.146.713.438.924l1.003.728c.473.34.572.987.26 1.431l-1.296 2.247a1.125 1.125 0 01-1.37.49l-1.21-.456c-.355-.133-.751-.072-1.075.124a7.028 7.028 0 01-.22.127c-.331.183-.581.495-.645.87l-.213 1.28c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.063-.374-.313-.686-.645-.87a7.042 7.042 0 01-.22-.127c-.324-.196-.72-.257-1.075-.124l-1.21.456a1.125 1.125 0 01-1.37-.49l-1.296-2.247a1.728 1.528 0 01.26-1.431l1.003-.728c.293-.21.438-.59.438-.924v-.08c0-.333-.146-.713-.438-.924l-1.003-.728c-.473-.34-.572-.987-.26-1.431l1.296-2.247a1.125 1.125 0 011.37-.49l1.21.456c.355.133.751.072 1.075-.124.074-.04.147-.083.22-.127.331-.183.581-.495.645-.87l.213-1.281z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <div>
                    <p class="text-[14px] font-semibold text-[#1a1a1a]">Business Settings</p>
                    <p class="text-[12px] text-[#999999]">Configure store</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
