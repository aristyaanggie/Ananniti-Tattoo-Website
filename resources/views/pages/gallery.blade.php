@extends('layouts.app')

@section('content')
<x-layout.navbar />

{{-- ═══════════════ HERO ═══════════════ --}}
<section class="bg-[#0a0a0a]">
  <div class="relative h-[60vh] md:h-[70vh] overflow-hidden">
    <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Ananniti Tattoo Gallery" class="absolute inset-0 w-full h-full object-cover object-center" loading="eager" />
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="absolute inset-0 flex items-end">
      <div class="max-w-[1400px] mx-auto w-full px-6 md:px-8 lg:px-12 pb-12 md:pb-16 lg:pb-20">
        <p class="text-[11px] uppercase tracking-[0.3em] text-white/60 mb-4">Portfolio</p>
        <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold text-white leading-[1.05] max-w-3xl" style="font-family: var(--font-heading);">Our Artwork<br>Gallery</h1>
        <p class="text-base text-white/70 mt-4 max-w-lg">Every tattoo tells a story. Browse our collection of custom designs crafted with precision and passion.</p>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════ FILTER + SEARCH ═══════════════ --}}
<section class="bg-white border-b border-[#e5e5e5] sticky top-16 z-20" x-data="{ activeFilter: 'all', searchQuery: '' }">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-4">
    <div class="flex flex-col md:flex-row md:items-center gap-4">
      {{-- Filter --}}
      <div class="flex gap-2 overflow-x-auto pb-1 scrollbar-hide flex-shrink-0">
        <button @click="activeFilter = 'all'" :class="activeFilter === 'all' ? 'bg-[#1a1a1a] text-white' : 'bg-[#f5f5f0] text-[#666666] hover:bg-[#e5e5e5]'" class="px-4 py-2 text-[12px] font-medium rounded-full whitespace-nowrap transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#1a1a1a] focus:ring-offset-2">All</button>
        @foreach($styles as $style)
          <button @click="activeFilter = '{{ Str::lower($style) }}'" :class="activeFilter === '{{ Str::lower($style) }}' ? 'bg-[#1a1a1a] text-white' : 'bg-[#f5f5f0] text-[#666666] hover:bg-[#e5e5e5]'" class="px-4 py-2 text-[12px] font-medium rounded-full whitespace-nowrap transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#1a1a1a] focus:ring-offset-2">{{ $style }}</button>
        @endforeach
      </div>
      {{-- Search --}}
      <div class="relative flex-1 md:max-w-xs">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#999999]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        <input type="text" x-model="searchQuery" placeholder="Search..."
          class="w-full pl-10 pr-4 py-2 bg-[#f5f5f0] border border-[#e5e5e5] rounded-full text-[13px] text-[#1a1a1a] placeholder:text-[#999999] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200" />
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════ GALLERY GRID ═══════════════ --}}
<section class="bg-white" x-data="{ activeFilter: 'all', searchQuery: '' }">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-12 md:py-16 lg:py-20">

    @if($portfolioItems->isEmpty())
      <div class="text-center py-20">
        <p class="text-[15px] text-[#666666]">No artwork available yet.</p>
      </div>
    @else
      <div class="columns-2 md:columns-3 lg:columns-4 gap-4 md:gap-6 space-y-4 md:space-y-6">
        @foreach($portfolioItems as $item)
          @php
              $style = strtolower($item->tattoo_style ?? '');
              $artistName = strtolower($item->artist->name ?? '');
              $title = strtolower($item->title);
          @endphp
          <div class="break-inside-avoid"
               x-show="(activeFilter === 'all' || '{{ $style }}'.includes(activeFilter)) && (searchQuery === '' || '{{ $title }}'.includes(searchQuery.toLowerCase()) || '{{ $style }}'.includes(searchQuery.toLowerCase()) || '{{ $artistName }}'.includes(searchQuery.toLowerCase()))"
               x-transition>
            <a href="{{ route('gallery.show', $item->slug) }}" class="group block">
              <div class="relative overflow-hidden rounded-2xl bg-[#f5f5f0]">
                @if($item->image)
                  <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" loading="lazy" />
                @else
                  <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="{{ $item->title }}" class="w-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" loading="lazy" />
                @endif
                <div class="absolute inset-0 bg-black/0 transition-all duration-300 group-hover:bg-black/20"></div>
                <div class="absolute inset-0 flex items-end p-5 md:p-6">
                  <div class="opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                    <p class="text-[10px] uppercase tracking-[0.15em] text-white/80 mb-1">{{ $item->tattoo_style ?? 'Custom' }}</p>
                    <h3 class="text-[14px] font-bold text-white" style="font-family: var(--font-heading);">{{ $item->title }}</h3>
                    @if($item->artist)
                      <p class="text-[12px] text-white/70 mt-1">by {{ $item->artist->name }}</p>
                    @endif
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</section>

{{-- CTA --}}
<section class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="max-w-2xl mx-auto text-center">
      <p class="text-[11px] uppercase tracking-[0.3em] text-white/50 mb-6">Inspired?</p>
      <h2 class="text-3xl md:text-4xl lg:text-[2.75rem] font-bold text-white leading-[1.1] mb-5" style="font-family: var(--font-heading);">Ready to Start<br>Your Tattoo Journey?</h2>
      <p class="text-base text-white/60 leading-relaxed max-w-md mx-auto mb-10">Let us help you design something meaningful. Every tattoo begins with a conversation.</p>
      <a href="{{ route('booking.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-black text-sm font-medium rounded-lg transition-colors duration-200 hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-black">
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        Book Consultation
      </a>
    </div>
  </div>
</section>

<x-layout.footer />

@endsection
