@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <h2 class="text-xl font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">Content Management</h2>
        <p class="text-[13px] text-[#999999] mt-1">Manage your landing page sections and content.</p>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="px-4 py-3 bg-[#f0fdf4] border border-[#bbf7d0] rounded-xl text-[14px] text-[#166534]">
            {{ session('success') }}
        </div>
    @endif

    {{-- Sections List --}}
    <div class="bg-white border border-[#e5e5e5] rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-[#e5e5e5]">
                        <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Section</th>
                        <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Last Updated</th>
                        <th class="text-left px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-3 text-[12px] font-medium text-[#999999] uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $section)
                        <tr class="border-b border-[#e5e5e5] last:border-0 hover:bg-[#fafafa] transition-colors duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center flex-shrink-0">
                                        @if($section->image)
                                            <img src="{{ asset($section->image) }}" alt="{{ $section->title }}" class="w-full h-full object-cover rounded-lg" />
                                        @else
                                            <svg class="w-5 h-5 text-[#cccccc]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"></path></svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $section->title }}</p>
                                        <p class="text-[12px] text-[#999999]">{{ $section->slug }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[13px] text-[#999999]">{{ $section->updated_at->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4">
                                @if($section->is_visible)
                                    <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full bg-[#1a1a1a] text-white">Visible</span>
                                @else
                                    <span class="inline-block px-2.5 py-1 text-[11px] font-semibold rounded-full border border-[#e5e5e5] text-[#666666]">Hidden</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.content.edit', $section) }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-[13px] font-medium text-[#1a1a1a] border border-[#e5e5e5] rounded-lg hover:bg-[#fafafa] transition-colors duration-150">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path></svg>
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
