@extends('layouts.app')

@section('content')
<x-layout.navbar />

{{-- ═══════════════ EDITORIAL HERO ═══════════════ --}}
<section class="bg-[#0a0a0a]">
  <div class="relative h-[70vh] md:h-[80vh] overflow-hidden">
    <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Ananniti Tattoo Studio Shop" class="absolute inset-0 w-full h-full object-cover object-center" />
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="absolute inset-0 flex items-end">
      <div class="max-w-[1400px] mx-auto w-full px-6 md:px-8 lg:px-12 pb-12 md:pb-16 lg:pb-20">
        <p class="text-[11px] uppercase tracking-[0.3em] text-white/60 mb-4">The Studio Shop</p>
        <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold text-white leading-[1.05] max-w-3xl" style="font-family: var(--font-heading);">Curated for<br>the Artist</h1>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════ CATEGORY NAVIGATION CHIPS ═══════════════ --}}
<section class="bg-white border-b border-[#e5e5e5] sticky top-16 z-20" x-data="{ activeCategory: new URLSearchParams(window.location.search).get('category') || '' }" x-init="$nextTick(() => { if (activeCategory) { const el = document.getElementById('cat-' + activeCategory); if (el) { setTimeout(() => el.scrollIntoView({ behavior: 'smooth', block: 'start' }), 300); } } })">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-4">
    <div class="flex gap-2 overflow-x-auto pb-1 scrollbar-hide flex-shrink-0">
      @foreach($categories as $cat)
        <a href="#cat-{{ $cat->slug }}"
           @click.prevent="activeCategory = '{{ $cat->slug }}'; document.getElementById('cat-{{ $cat->slug }}')?.scrollIntoView({ behavior: 'smooth', block: 'start' })"
           :class="activeCategory === '{{ $cat->slug }}' ? 'bg-[#1a1a1a] text-white' : 'bg-[#f5f5f0] text-[#666666] hover:bg-[#e5e5e5]'"
           class="px-4 py-2 text-[12px] font-medium rounded-full whitespace-nowrap transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#1a1a1a] focus:ring-offset-2">
          {{ $cat->name }}
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════ ALL CATEGORIES ═══════════════ --}}
@foreach($categories as $category)
@php $categoryProducts = $productsByCategory[$category->id] ?? collect(); @endphp
<section id="cat-{{ $category->slug }}" class="{{ $loop->even ? 'bg-[#f5f5f0]' : 'bg-white' }}">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24 lg:py-32">

    <div class="flex items-end justify-between mb-10 md:mb-14">
      <div>
        <p class="text-[11px] uppercase tracking-[0.3em] text-text-muted mb-4">{{ $category->name }}</p>
        <h2 class="text-3xl md:text-4xl font-bold text-text-primary leading-tight" style="font-family: var(--font-heading);">{{ $category->name }}</h2>
      </div>
    </div>

    @if($categoryProducts->isEmpty())
      {{-- Empty State --}}
      <div class="text-center py-12 md:py-16 border border-dashed border-[#e5e5e5] rounded-2xl">
        <svg class="w-12 h-12 mx-auto text-[#cccccc] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"></path></svg>
        <p class="text-[15px] font-semibold text-text-primary mb-2">Products Coming Soon</p>
        <p class="text-[13px] text-text-secondary mb-6">We are curating the best {{ strtolower($category->name) }} for your studio.</p>
        <a href="{{ route('booking.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#1a1a1a] text-white text-sm font-medium rounded-lg hover:bg-[#333333] transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#1a1a1a] focus:ring-offset-2">
          Contact Us
        </a>
      </div>
    @else
      {{-- Products Grid --}}
      <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6">
        @foreach($categoryProducts->take(8) as $product)
          <a href="{{ route('shop.product', $product->slug) }}" class="group cursor-pointer">
            <div class="relative aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
              @if($product->thumbnail)
                <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" loading="lazy" />
              @else
                <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" loading="lazy" />
              @endif
              @if($product->badge)
                <span class="absolute top-3 left-3 px-2.5 py-1 text-[9px] font-semibold uppercase tracking-[0.12em] bg-black text-white">{{ $product->badge->name }}</span>
              @endif
            </div>
            <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">{{ $category->name }}</p>
            <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">{{ $product->name }}</h3>
            <p class="text-[13px] font-semibold text-text-primary">{{ config('ananniti.payment.currency_symbol', 'Rp') }}{{ number_format($product->price, 0, ',', '.') }}</p>
          </a>
        @endforeach
      </div>
    @endif

  </div>
</section>
@endforeach

{{-- ═══════════════ CTA SECTION ═══════════════ --}}
<section class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="max-w-2xl mx-auto text-center">
      <p class="text-[11px] uppercase tracking-[0.3em] text-white/50 mb-6">Need Help Choosing?</p>
      <h2 class="text-3xl md:text-4xl lg:text-[2.75rem] font-bold text-white leading-[1.1] mb-5" style="font-family: var(--font-heading);">Not Sure What<br> You Need?</h2>
      <p class="text-base text-white/60 leading-relaxed max-w-md mx-auto mb-10">Our team can help you find the perfect equipment for your studio setup and artistic style.</p>
      <a href="{{ route('booking.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-black text-sm font-medium rounded-lg transition-colors duration-200 hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-black">
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        Consult via WhatsApp
      </a>
    </div>
  </div>
</section>

<x-layout.footer />

@endsection
