@extends('layouts.app')

@section('content')
<x-layout.navbar />

{{-- Breadcrumb --}}
<section class="bg-white border-b border-[#e5e5e5]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-4">
    <nav class="flex items-center gap-2 text-[13px]" aria-label="Breadcrumb">
      <a href="{{ route('home') }}" class="text-[#999999] hover:text-[#1a1a1a] transition-colors duration-200">Home</a>
      <span class="text-[#cccccc]">/</span>
      <a href="{{ route('gallery.index') }}" class="text-[#999999] hover:text-[#1a1a1a] transition-colors duration-200">Gallery</a>
      <span class="text-[#cccccc]">/</span>
      <span class="text-[#1a1a1a] font-medium">{{ $artist->name }}</span>
    </nav>
  </div>
</section>

{{-- Artist Hero --}}
<section class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24 lg:py-32">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">

      {{-- Photo --}}
      <div>
        @if($artist->photo)
          <div class="aspect-[3/4] overflow-hidden rounded-2xl">
            <img src="{{ asset('storage/' . $artist->photo) }}" alt="{{ $artist->name }}" class="w-full h-full object-cover" loading="eager" />
          </div>
        @else
          <div class="aspect-[3/4] overflow-hidden rounded-2xl bg-[#1a1a1a] flex items-center justify-center">
            <span class="text-[80px] font-bold text-white/20" style="font-family: var(--font-heading);">{{ strtoupper(substr($artist->name, 0, 1)) }}</span>
          </div>
        @endif
      </div>

      {{-- Info --}}
      <div class="flex flex-col justify-center">
        <p class="text-[11px] uppercase tracking-[0.3em] text-white/50 mb-4">Artist</p>
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-[1.1] mb-5" style="font-family: var(--font-heading);">{{ $artist->name }}</h1>

        @if($artist->specialization)
          <p class="text-[13px] uppercase tracking-[0.15em] text-white/60 mb-6">{{ $artist->specialization }}</p>
        @endif

        @if($artist->experience_years)
          <p class="text-[14px] text-white/60 mb-6">{{ $artist->experience_years }} years of professional experience</p>
        @endif

        @if($artist->biography)
          <p class="text-[15px] text-white/70 leading-relaxed mb-8 max-w-md">{{ $artist->biography }}</p>
        @endif

        <div class="flex flex-col sm:flex-row gap-3">
          <a href="{{ route('booking.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white text-black text-sm font-medium rounded-lg transition-colors duration-200 hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-black">
            Book Consultation
          </a>
          @if($artist->instagram)
            <a href="https://instagram.com/{{ ltrim($artist->instagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 border border-white/30 text-white text-sm font-medium rounded-lg transition-colors duration-200 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-black">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
              Instagram
            </a>
          @endif
        </div>
      </div>

    </div>
  </div>
</section>

{{-- Portfolio --}}
@if($portfolioItems->count() > 0)
<section class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24">
    <div class="mb-10 md:mb-14">
      <p class="text-[11px] uppercase tracking-[0.25em] text-[#999999] mb-4">Portfolio</p>
      <h2 class="text-3xl md:text-4xl font-bold text-[#1a1a1a] leading-tight" style="font-family: var(--font-heading);">Works by {{ $artist->name }}</h2>
    </div>

    <div class="columns-2 md:columns-3 lg:columns-4 gap-4 md:gap-6 space-y-4 md:space-y-6">
      @foreach($portfolioItems as $item)
        <div class="break-inside-avoid">
          <a href="{{ route('gallery.show', $item->slug) }}" class="group block">
            <div class="relative overflow-hidden rounded-2xl bg-[#f5f5f0]">
              @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" loading="lazy" />
              @else
                <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="{{ $item->title }}" class="w-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" loading="lazy" />
              @endif
              <div class="absolute inset-0 bg-black/0 transition-all duration-300 group-hover:bg-black/20"></div>
              <div class="absolute inset-0 flex items-end p-5">
                <div class="opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                  <p class="text-[10px] uppercase tracking-[0.15em] text-white/80 mb-1">{{ $item->tattoo_style ?? 'Custom' }}</p>
                  <h3 class="text-[14px] font-bold text-white" style="font-family: var(--font-heading);">{{ $item->title }}</h3>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<x-layout.footer />

@endsection
