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
      @if($portfolio->category)
        <span class="text-[#cccccc]">/</span>
        <span class="text-[#1a1a1a] font-medium">{{ $portfolio->category->name }}</span>
      @endif
    </nav>
  </div>
</section>

{{-- Hero Image --}}
<section class="bg-[#0a0a0a]">
  <div class="relative h-[60vh] md:h-[80vh] overflow-hidden">
    @if($portfolio->image)
      <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="absolute inset-0 w-full h-full object-cover object-center" loading="eager" />
    @else
      <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="{{ $portfolio->title }}" class="absolute inset-0 w-full h-full object-cover object-center" loading="eager" />
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
    <div class="absolute inset-0 flex items-end">
      <div class="max-w-[1400px] mx-auto w-full px-6 md:px-8 lg:px-12 pb-12 md:pb-16 lg:pb-20">
        @if($portfolio->category)
          <p class="text-[11px] uppercase tracking-[0.3em] text-white/60 mb-4">{{ $portfolio->category->name }}</p>
        @endif
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-[1.1] max-w-3xl" style="font-family: var(--font-heading);">{{ $portfolio->title }}</h1>
      </div>
    </div>
  </div>
</section>

{{-- Detail Info --}}
<section class="bg-white">
  <div class="max-w-[1100px] mx-auto px-6 md:px-8 lg:px-12 py-12 md:py-16 lg:py-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-16">

      {{-- Main Content --}}
      <div class="md:col-span-2">
        @if($portfolio->description)
          <div class="prose prose-lg max-w-none">
            <p class="text-[15px] text-[#666666] leading-relaxed">{{ $portfolio->description }}</p>
          </div>
        @endif

        {{-- Details --}}
        <div class="mt-10 grid grid-cols-2 sm:grid-cols-4 gap-6">
          @if($portfolio->tattoo_style)
            <div>
              <p class="text-[11px] uppercase tracking-[0.2em] text-[#999999] mb-1">Style</p>
              <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $portfolio->tattoo_style }}</p>
            </div>
          @endif
          @if($portfolio->placement)
            <div>
              <p class="text-[11px] uppercase tracking-[0.2em] text-[#999999] mb-1">Placement</p>
              <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $portfolio->placement }}</p>
            </div>
          @endif
          @if($portfolio->session_hours)
            <div>
              <p class="text-[11px] uppercase tracking-[0.2em] text-[#999999] mb-1">Session</p>
              <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $portfolio->session_hours }}h</p>
            </div>
          @endif
          @if($portfolio->category)
            <div>
              <p class="text-[11px] uppercase tracking-[0.2em] text-[#999999] mb-1">Category</p>
              <p class="text-[14px] font-medium text-[#1a1a1a]">{{ $portfolio->category->name }}</p>
            </div>
          @endif
        </div>
      </div>

      {{-- Artist Card --}}
      @if($portfolio->artist)
      <div>
        <div class="bg-[#f5f5f0] rounded-2xl p-6">
          <p class="text-[11px] uppercase tracking-[0.2em] text-[#999999] mb-4">Artist</p>
          <div class="flex items-center gap-4 mb-4">
            @if($portfolio->artist->photo)
              <img src="{{ asset('storage/' . $portfolio->artist->photo) }}" alt="{{ $portfolio->artist->name }}" class="w-14 h-14 rounded-full object-cover" loading="lazy" />
            @else
              <div class="w-14 h-14 rounded-full bg-[#e5e5e5] flex items-center justify-center">
                <span class="text-[18px] font-bold text-[#999999]">{{ strtoupper(substr($portfolio->artist->name, 0, 1)) }}</span>
              </div>
            @endif
            <div>
              <h3 class="text-[15px] font-bold text-[#1a1a1a]">{{ $portfolio->artist->name }}</h3>
              @if($portfolio->artist->specialization)
                <p class="text-[12px] text-[#999999]">{{ $portfolio->artist->specialization }}</p>
              @endif
            </div>
          </div>
          @if($portfolio->artist->experience_years)
            <p class="text-[13px] text-[#666666] mb-3">{{ $portfolio->artist->experience_years }} years experience</p>
          @endif
          <a href="{{ route('gallery.artist', $portfolio->artist->slug) }}" class="inline-flex items-center gap-1.5 text-[13px] font-medium text-[#1a1a1a] hover:text-[#666666] transition-colors duration-200">
            View Portfolio
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
          </a>
        </div>

        {{-- CTA --}}
        <div class="mt-6 space-y-3">
          <a href="{{ route('booking.create') }}" class="block w-full text-center px-5 py-2.5 bg-[#1a1a1a] text-white text-sm font-medium rounded-lg hover:bg-[#333333] transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#1a1a1a] focus:ring-offset-2">
            Book Consultation
          </a>
          <a href="https://wa.me/{{ $whatsappNumber }}?text={{ rawurlencode('Hi, I\'m interested in a tattoo similar to: ' . $portfolio->title) }}" target="_blank" rel="noopener noreferrer" class="block w-full text-center px-5 py-2.5 border border-[#e5e5e5] text-[#1a1a1a] text-sm font-medium rounded-lg hover:border-[#1a1a1a] transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#1a1a1a] focus:ring-offset-2">
            Ask via WhatsApp
          </a>
        </div>
      </div>
      @endif

    </div>
  </div>
</section>

{{-- Related Works --}}
@if($relatedWorks->count() > 0)
<section class="bg-white border-t border-[#e5e5e5]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12 md:mb-16">
      <div>
        <p class="text-[11px] uppercase tracking-[0.25em] text-[#999999] mb-4">More from {{ $portfolio->category->name ?? 'Gallery' }}</p>
        <h2 class="text-3xl md:text-4xl font-bold text-[#1a1a1a] leading-tight" style="font-family: var(--font-heading);">Related Works</h2>
      </div>
      <a href="{{ route('gallery.index') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 text-sm font-semibold text-[#1a1a1a] hover:text-[#666666] transition-colors duration-200">
        View All
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
      </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
      @foreach($relatedWorks as $related)
        <a href="{{ route('gallery.show', $related->slug) }}" class="group block">
          <div class="relative aspect-[4/5] overflow-hidden rounded-xl bg-[#f5f5f0]">
            @if($related->image)
              <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" loading="lazy" />
            @else
              <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="{{ $related->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" loading="lazy" />
            @endif
          </div>
          <p class="text-[13px] font-medium text-[#1a1a1a] mt-3">{{ $related->title }}</p>
          @if($related->artist)
            <p class="text-[12px] text-[#999999]">by {{ $related->artist->name }}</p>
          @endif
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

<x-layout.footer />

@endsection
