@extends('layouts.app')

@section('content')
<x-layout.navbar />

{{-- ═══════════════ SECTION 1: EDITORIAL PRODUCT HERO ═══════════════ --}}
<section class="bg-white" x-data="{ activeImage: 0 }">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 pt-28 md:pt-32 pb-16 md:py-24 lg:py-32">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 lg:gap-20 items-start">

      {{-- LEFT: Product Image + Thumbnails --}}
      <div>
        {{-- Main Image --}}
        <div class="aspect-[4/5] overflow-hidden rounded-2xl bg-[#f5f5f0] mb-4">
          <img :src="activeImage === 0 ? '{{ asset('images/hero-placeholder2.jpeg') }}' : activeImage === 1 ? '{{ asset('images/hero-placeholder2.jpeg') }}' : activeImage === 2 ? '{{ asset('images/hero-placeholder2.jpeg') }}' : '{{ asset('images/hero-placeholder2.jpeg') }}'" alt="Tattoo Machine X1" class="w-full h-full object-cover transition-opacity duration-200" />
        </div>

        {{-- Thumbnails --}}
        <div class="flex gap-3 overflow-x-auto pb-2 snap-x snap-mandatory scrollbar-hide">
          <button @click="activeImage = 0" :class="activeImage === 0 ? 'border-black' : 'border-[#e5e5e5] hover:border-[#ccc]'" class="flex-shrink-0 snap-start w-20 h-20 md:w-24 md:h-24 overflow-hidden rounded-xl border-2 transition-all duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-black focus-visible:ring-offset-2">
            <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Product view 1" class="w-full h-full object-cover" />
          </button>
          <button @click="activeImage = 1" :class="activeImage === 1 ? 'border-black' : 'border-[#e5e5e5] hover:border-[#ccc]'" class="flex-shrink-0 snap-start w-20 h-20 md:w-24 md:h-24 overflow-hidden rounded-xl border-2 transition-all duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-black focus-visible:ring-offset-2">
            <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Product view 2" class="w-full h-full object-cover" />
          </button>
          <button @click="activeImage = 2" :class="activeImage === 2 ? 'border-black' : 'border-[#e5e5e5] hover:border-[#ccc]'" class="flex-shrink-0 snap-start w-20 h-20 md:w-24 md:h-24 overflow-hidden rounded-xl border-2 transition-all duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-black focus-visible:ring-offset-2">
            <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Product view 3" class="w-full h-full object-cover" />
          </button>
          <button @click="activeImage = 3" :class="activeImage === 3 ? 'border-black' : 'border-[#e5e5e5] hover:border-[#ccc]'" class="flex-shrink-0 snap-start w-20 h-20 md:w-24 md:h-24 overflow-hidden rounded-xl border-2 transition-all duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-black focus-visible:ring-offset-2">
            <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Product view 4" class="w-full h-full object-cover" />
          </button>
        </div>
      </div>

      {{-- RIGHT: Product Info --}}
      <div class="flex flex-col justify-center md:py-8">
        <p class="text-[11px] uppercase tracking-[0.3em] text-text-muted mb-5">Tattoo Machine</p>
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-text-primary mb-5 leading-[1.1]" style="font-family: var(--font-heading);">Tattoo Machine X1</h1>
        <p class="text-base md:text-lg text-text-secondary leading-relaxed mb-8 max-w-md">Precision-engineered wireless tattoo machine designed for professional artists who demand exceptional performance and reliability in every session.</p>

        <div class="mb-8">
          <p class="text-2xl md:text-3xl font-bold text-text-primary mb-2">$320.00</p>
          <p class="text-[13px] text-success font-medium">In Stock</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 mb-8">
          <a href="https://wa.me/6281234567890?text=Hi%2C%20I'm%20interested%20in%20Tattoo%20Machine%20X1" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-black text-white text-sm font-semibold rounded-lg transition-all duration-200 hover:bg-[#1a1a1a] hover:-translate-y-0.5 hover:shadow-lg active:scale-[0.98]">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            Contact via WhatsApp
          </a>
          <a href="{{ route('shop') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 border border-black text-black text-sm font-semibold rounded-lg transition-all duration-200 hover:bg-black hover:text-white">
            Back to Shop
          </a>
        </div>

        {{-- Product Highlights --}}
        <div class="border-t border-[#e5e5e5] pt-6 space-y-3">
          <div class="flex items-center gap-3">
            <svg class="w-4 h-4 text-text-muted flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5" /></svg>
            <span class="text-[13px] text-text-secondary">Professional Artist Grade</span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-4 h-4 text-text-muted flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
            <span class="text-[13px] text-text-secondary">Sterilized Packaging</span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-4 h-4 text-text-muted flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" /></svg>
            <span class="text-[13px] text-text-secondary">Worldwide Standard</span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-4 h-4 text-text-muted flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" /></svg>
            <span class="text-[13px] text-text-secondary">Ready Stock</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════ SECTION 2: PRODUCT INFORMATION ═══════════════ --}}
<section class="bg-white border-t border-[#e5e5e5]">
  <div class="max-w-[1100px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 lg:gap-20">

      {{-- LEFT: Description --}}
      <div>
        <p class="text-[11px] uppercase tracking-[0.25em] text-text-muted mb-5">Description</p>
        <div class="space-y-5 text-[15px] text-text-secondary leading-relaxed">
          <p>The Tattoo Machine X1 represents the pinnacle of modern tattoo engineering. Crafted from aerospace-grade aluminum, it delivers consistent power while maintaining an exceptionally lightweight feel in the hand.</p>
          <p>Its wireless design eliminates the constraints of traditional corded machines, giving you complete freedom of movement during sessions. The rechargeable battery provides up to 8 hours of continuous operation.</p>
          <p>Whether you specialize in fine line work, portrait realism, or bold traditional pieces, the X1 adapts to your style with adjustable voltage settings and a precision-tuned motor.</p>
        </div>
      </div>

      {{-- RIGHT: Specifications --}}
      <div>
        <p class="text-[11px] uppercase tracking-[0.25em] text-text-muted mb-5">Specifications</p>
        <div class="space-y-4">
          <div class="flex justify-between py-3 border-b border-[#e5e5e5]">
            <span class="text-[14px] text-text-muted">Weight</span>
            <span class="text-[14px] font-medium text-text-primary">180g</span>
          </div>
          <div class="flex justify-between py-3 border-b border-[#e5e5e5]">
            <span class="text-[14px] text-text-muted">Material</span>
            <span class="text-[14px] font-medium text-text-primary">Aerospace Aluminum</span>
          </div>
          <div class="flex justify-between py-3 border-b border-[#e5e5e5]">
            <span class="text-[14px] text-text-muted">Battery Life</span>
            <span class="text-[14px] font-medium text-text-primary">Up to 8 Hours</span>
          </div>
          <div class="flex justify-between py-3 border-b border-[#e5e5e5]">
            <span class="text-[14px] text-text-muted">Voltage</span>
            <span class="text-[14px] font-medium text-text-primary">4V — 12V</span>
          </div>
          <div class="flex justify-between py-3 border-b border-[#e5e5e5]">
            <span class="text-[14px] text-text-muted">Stroke Length</span>
            <span class="text-[14px] font-medium text-text-primary">3.5mm</span>
          </div>
          <div class="flex justify-between py-3 border-b border-[#e5e5e5]">
            <span class="text-[14px] text-text-muted">Connectivity</span>
            <span class="text-[14px] font-medium text-text-primary">USB-C Charging</span>
          </div>
          <div class="flex justify-between py-3">
            <span class="text-[14px] text-text-muted">Warranty</span>
            <span class="text-[14px] font-medium text-text-primary">2 Years</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════ SECTION 3: WHY ARTISTS CHOOSE THIS ═══════════════ --}}
<section class="bg-white border-t border-[#e5e5e5]">
  <div class="max-w-[1100px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24">

    <div class="text-center mb-12 md:mb-16">
      <p class="text-[11px] uppercase tracking-[0.3em] text-text-muted mb-5">Why Artists Choose This</p>
      <h2 class="text-3xl md:text-4xl font-bold text-text-primary leading-tight">Built for Professionals</h2>
    </div>

    <div class="space-y-8 md:space-y-0 md:grid md:grid-cols-1 md:gap-0 md:divide-y md:divide-[#e5e5e5]">

      {{-- Item 1 --}}
      <div class="flex items-start gap-5 md:gap-6 md:py-8 first:md:pt-0">
        <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center flex-shrink-0 mt-0.5">
          <svg class="w-5 h-5 text-text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5" /></svg>
        </div>
        <div>
          <h3 class="text-[15px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Precision</h3>
          <p class="text-[14px] text-text-secondary leading-relaxed">Engineered to deliver consistent, accurate needle movement for flawless results in every session.</p>
        </div>
      </div>

      {{-- Item 2 --}}
      <div class="flex items-start gap-5 md:gap-6 md:py-8">
        <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center flex-shrink-0 mt-0.5">
          <svg class="w-5 h-5 text-text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11.42 15.17l-5.384 5.384a2.025 2.025 0 01-2.864-2.864l5.384-5.384m2.864 2.864L19.5 6.75m-8.08 8.42l-2.121 2.121m8.08-8.42l2.121-2.121m-8.08 8.42L8.25 12m5.67-5.67l2.121-2.121" /></svg>
        </div>
        <div>
          <h3 class="text-[15px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Professional Grade</h3>
          <p class="text-[14px] text-text-secondary leading-relaxed">Built with aerospace-grade materials that withstand the demands of daily professional use.</p>
        </div>
      </div>

      {{-- Item 3 --}}
      <div class="flex items-start gap-5 md:gap-6 md:py-8 last:md:pb-0">
        <div class="w-10 h-10 rounded-lg bg-[#f5f5f0] flex items-center justify-center flex-shrink-0 mt-0.5">
          <svg class="w-5 h-5 text-text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
        </div>
        <div>
          <h3 class="text-[15px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Trusted Quality</h3>
          <p class="text-[14px] text-text-secondary leading-relaxed">Backed by a 2-year warranty and used by thousands of professional artists worldwide.</p>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════ SECTION 4: RELATED PRODUCTS ═══════════════ --}}
<section class="bg-white border-t border-[#e5e5e5]">
  <div class="max-w-[1100px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24">

    <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12 md:mb-16">
      <div>
        <p class="text-[11px] uppercase tracking-[0.25em] text-text-muted mb-4">You May Also Like</p>
        <h2 class="text-3xl md:text-4xl font-bold text-text-primary leading-tight">Related Products</h2>
      </div>
      <a href="{{ route('shop') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 text-sm font-semibold text-text-primary hover:text-text-secondary transition-colors duration-200">
        View All
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Rotary Cartridge Machine"
          category="Tattoo Machine"
          price="285.00"
          href="/shop/product/rotary-cartridge-machine"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Premium Black Ink"
          category="Tattoo Ink"
          price="45.00"
          badge="BEST SELLER"
          href="/shop/product/premium-black-ink"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Professional Cartridge Needle"
          category="Needle"
          price="32.00"
          href="/shop/product/professional-cartridge-needle"
      />

      <x.shop.product-card
          image="images/hero-placeholder2.jpeg"
          title="Power Supply"
          category="Others"
          price="85.00"
          href="/shop/product/power-supply"
      />

    </div>
  </div>
</section>

{{-- ═══════════════ CHAPTER TRANSITION: WHITE → DARK ═══════════════ --}}
<div class="relative h-16 md:h-24 bg-white overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-white via-white/70 to-[#0a0a0a]/70"></div>
</div>

{{-- ═══════════════ CTA ═══════════════ --}}
<section class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="max-w-2xl mx-auto text-center">
      <p class="text-[11px] uppercase tracking-[0.3em] text-white/50 mb-6">Need Help Choosing?</p>
      <h2 class="text-3xl md:text-4xl lg:text-[2.75rem] font-bold text-white leading-[1.1] mb-5" style="font-family: var(--font-heading);">Not Sure What<br> You Need?</h2>
      <p class="text-base text-white/60 leading-relaxed max-w-md mx-auto mb-10">Our team can help you find the perfect equipment for your studio setup and artistic style.</p>
      <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2.5 px-8 py-4 bg-white text-black text-sm font-semibold rounded transition-all duration-200 hover:bg-white/90 hover:scale-[1.02] active:scale-[0.98]">
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        Consult via WhatsApp
      </a>
    </div>
  </div>
</section>

{{-- ═══════════════ FOOTER ═══════════════ --}}
<x-layout.footer />

@endsection
