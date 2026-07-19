@php
  $catWhatsappNumber = \App\Models\Setting::where('key', 'whatsapp')->value('value') ?? '6281234567890';
  $catWhatsappNumber = preg_replace('/[^0-9]/', '', $catWhatsappNumber);
  if (str_starts_with($catWhatsappNumber, '08')) {
      $catWhatsappNumber = '62' . substr($catWhatsappNumber, 1);
  }
  if (!str_starts_with($catWhatsappNumber, '62')) {
      $catWhatsappNumber = '62' . $catWhatsappNumber;
  }
@endphp

@extends('layouts.app')

@section('content')
<x-layout.navbar />

{{-- ═══════════════ EDITORIAL HERO ═══════════════ --}}
<section class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 pt-24 md:pt-28 pb-10 md:pb-14">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-10 items-center">

      {{-- LEFT: Content --}}
      <div class="md:col-span-5 order-2 md:order-1">
        <a href="{{ route('shop') }}" class="inline-flex items-center gap-1.5 text-[12px] text-text-muted hover:text-text-primary transition-colors duration-200 mb-6">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
          Shop
        </a>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text-primary mb-5 leading-[1.05]" style="font-family: var(--font-heading);">Tattoo<br>Machines</h1>
        <p class="text-[15px] md:text-base text-text-secondary leading-relaxed mb-6 max-w-md">Professional rotary, coil, and pen machines crafted for artists who demand precision, reliability, and exceptional performance in every session.</p>
        <p class="text-[13px] text-text-muted">12 Products</p>
      </div>

      {{-- RIGHT: Image --}}
      <div class="md:col-span-7 order-1 md:order-2">
        <div class="aspect-[4/5] md:aspect-[3/4] overflow-hidden rounded-2xl">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Tattoo Machine Collection" class="w-full h-full object-cover" />
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════ PRODUCTS ═══════════════ --}}
<section class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-12 md:py-16 lg:py-20">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-10">

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Tattoo Machine X1"
          category="Tattoo Machine"
          price="320.00"
          badge="NEW"
          href="/shop/product/tattoo-machine-x1"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Rotary Cartridge Machine"
          category="Tattoo Machine"
          price="285.00"
          href="/shop/product/rotary-cartridge-machine"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Tattoo Machine X2"
          category="Tattoo Machine"
          price="385.00"
          href="/shop/product/tattoo-machine-x2"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Pen Style Machine"
          category="Tattoo Machine"
          price="295.00"
          badge="BEST SELLER"
          href="/shop/product/pen-style-machine"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Wireless Machine Pro"
          category="Tattoo Machine"
          price="420.00"
          href="/shop/product/wireless-machine-pro"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Coil Machine Classic"
          category="Tattoo Machine"
          price="245.00"
          href="/shop/product/coil-machine-classic"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Mini Machine"
          category="Tattoo Machine"
          price="185.00"
          badge="NEW"
          href="/shop/product/mini-machine"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Power Supply Unit"
          category="Tattoo Machine"
          price="85.00"
          href="/shop/product/power-supply-unit"
      />

    </div>

    <div class="text-center mt-16 md:mt-20">
      <a href="#" class="inline-flex items-center justify-center px-10 py-4 bg-black text-white text-sm font-semibold rounded-lg transition-all duration-200 hover:bg-[#1a1a1a] hover:-translate-y-0.5 hover:shadow-lg active:scale-[0.98]">
        Load More
      </a>
    </div>

  </div>
</section>

{{-- ═══════════════ CHAPTER TRANSITION: WHITE → DARK ═══════════════ --}}
<div class="relative h-16 md:h-24 bg-white overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-white via-white/70 to-[#0a0a0a]/70"></div>
</div>

{{-- ═══════════════ CTA SECTION ═══════════════ --}}
<section class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="max-w-2xl mx-auto text-center">
      <p class="text-[11px] uppercase tracking-[0.3em] text-white/50 mb-6">Need Help Choosing?</p>
      <h2 class="text-3xl md:text-4xl lg:text-[2.75rem] font-bold text-white leading-[1.1] mb-5" style="font-family: var(--font-heading);">Not Sure What<br> You Need?</h2>
      <p class="text-base text-white/60 leading-relaxed max-w-md mx-auto mb-10">Our team can help you find the perfect equipment for your studio setup and artistic style.</p>
      <a href="https://wa.me/{{ $catWhatsappNumber }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2.5 px-8 py-4 bg-white text-black text-sm font-semibold rounded transition-all duration-200 hover:bg-white/90 hover:scale-[1.02] active:scale-[0.98]">
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        Consult via WhatsApp
      </a>
    </div>
  </div>
</section>

{{-- ═══════════════ FOOTER ═══════════════ --}}
<x-layout.footer />

@endsection
