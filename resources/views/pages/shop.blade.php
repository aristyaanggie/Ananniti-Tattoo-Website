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

{{-- ═══════════════ MACHINES — Editorial Image Left ═══════════════ --}}
<section class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24 lg:py-32">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-center">

      {{-- Image --}}
      <div class="md:col-span-5">
        <div class="aspect-[4/5] overflow-hidden rounded-2xl">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Tattoo Machine" class="w-full h-full object-cover" />
        </div>
      </div>

      {{-- Content + Products --}}
      <div class="md:col-span-7">
        <p class="text-[11px] uppercase tracking-[0.3em] text-text-muted mb-4">Machines</p>
        <h2 class="text-3xl md:text-4xl font-bold text-text-primary mb-3 leading-[1.1]" style="font-family: var(--font-heading);">Tattoo Machines</h2>
        <p class="text-[15px] text-text-secondary leading-relaxed mb-10 max-w-md">Precision-engineered rotary, coil, and pen machines for every tattooing style.</p>

        <div class="grid grid-cols-2 gap-5 md:gap-6">
          <a href="/shop/product/tattoo-machine-x1" class="group cursor-pointer">
            <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
              <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Tattoo Machine X1" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
            </div>
            <p class="text-[12px] uppercase tracking-[0.15em] text-text-muted mb-1">Tattoo Machine</p>
            <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Tattoo Machine X1</h3>
            <p class="text-[13px] font-semibold text-text-primary">$320.00</p>
          </a>
          <a href="/shop/product/rotary-cartridge-machine" class="group cursor-pointer">
            <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
              <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Rotary Cartridge Machine" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
            </div>
            <p class="text-[12px] uppercase tracking-[0.15em] text-text-muted mb-1">Tattoo Machine</p>
            <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Rotary Cartridge Machine</h3>
            <p class="text-[13px] font-semibold text-text-primary">$285.00</p>
          </a>
        </div>

        <a href="#machines" class="inline-flex items-center gap-2 mt-8 text-[13px] font-semibold text-text-primary hover:text-text-secondary transition-colors duration-200">
          View All Machines
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════ INK — Editorial Horizontal Showcase ═══════════════ --}}
<section class="bg-[#f5f5f0]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24 lg:py-32">

    <div class="flex items-end justify-between mb-10 md:mb-14">
      <div>
        <p class="text-[11px] uppercase tracking-[0.3em] text-text-muted mb-4">Ink</p>
        <h2 class="text-3xl md:text-4xl font-bold text-text-primary leading-tight" style="font-family: var(--font-heading);">Tattoo Ink</h2>
      </div>
      <a href="#ink" class="text-[13px] font-semibold text-text-primary hover:text-text-secondary transition-colors duration-200 hidden md:inline-flex items-center gap-2">
        View All
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
      </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6">
      <a href="/shop/product/premium-black-ink" class="group cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-white">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Premium Black Ink" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
        </div>
        <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">Tattoo Ink</p>
        <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Premium Black Ink</h3>
        <p class="text-[13px] font-semibold text-text-primary">$45.00</p>
      </a>
      <a href="/shop/product/gradient-ink-set" class="group cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-white">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Gradient Ink Set" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
        </div>
        <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">Tattoo Ink</p>
        <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Gradient Ink Set</h3>
        <p class="text-[13px] font-semibold text-text-primary">$78.00</p>
      </a>
      <a href="/shop/product/white-ink" class="group cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-white">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="White Ink" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
        </div>
        <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">Tattoo Ink</p>
        <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">White Ink</h3>
        <p class="text-[13px] font-semibold text-text-primary">$35.00</p>
      </a>
      <a href="/shop/product/color-set" class="group cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-white">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Color Set" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
        </div>
        <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">Tattoo Ink</p>
        <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Color Set</h3>
        <p class="text-[13px] font-semibold text-text-primary">$125.00</p>
      </a>
    </div>

  </div>
</section>

{{-- ═══════════════ NEEDLES — Editorial Image Right ═══════════════ --}}
<section class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24 lg:py-32">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-center">

      {{-- Content + Products --}}
      <div class="md:col-span-7 order-2 md:order-1">
        <p class="text-[11px] uppercase tracking-[0.3em] text-text-muted mb-4">Needles</p>
        <h2 class="text-3xl md:text-4xl font-bold text-text-primary mb-3 leading-[1.1]" style="font-family: var(--font-heading);">Needles &amp; Cartridges</h2>
        <p class="text-[15px] text-text-secondary leading-relaxed mb-10 max-w-md">Sterile, professional-grade needles for precision work and consistent results.</p>

        <div class="grid grid-cols-2 gap-5 md:gap-6">
          <a href="/shop/product/cartridge-needles" class="group cursor-pointer">
            <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
              <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Cartridge Needles" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
            </div>
            <p class="text-[12px] uppercase tracking-[0.15em] text-text-muted mb-1">Needle</p>
            <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Cartridge Needles</h3>
            <p class="text-[13px] font-semibold text-text-primary">$32.00</p>
          </a>
          <a href="/shop/product/magnum-needles" class="group cursor-pointer">
            <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
              <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Magnum Needles" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
            </div>
            <p class="text-[12px] uppercase tracking-[0.15em] text-text-muted mb-1">Needle</p>
            <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Magnum Needles</h3>
            <p class="text-[13px] font-semibold text-text-primary">$38.00</p>
          </a>
        </div>

        <a href="#needles" class="inline-flex items-center gap-2 mt-8 text-[13px] font-semibold text-text-primary hover:text-text-secondary transition-colors duration-200">
          View All Needles
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
      </div>

      {{-- Image --}}
      <div class="md:col-span-5 order-1 md:order-2">
        <div class="aspect-[4/5] overflow-hidden rounded-2xl">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Needle Collection" class="w-full h-full object-cover" />
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════ FURNITURE — Featured Product ═══════════════ --}}
<section class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24 lg:py-32">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">

      {{-- Featured Product --}}
      <div>
        <div class="aspect-[4/5] overflow-hidden rounded-2xl">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Professional Tattoo Chair" class="w-full h-full object-cover" />
        </div>
      </div>

      {{-- Info --}}
      <div class="flex flex-col justify-center">
        <p class="text-[11px] uppercase tracking-[0.3em] text-white/50 mb-4">Furniture</p>
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 leading-[1.1]" style="font-family: var(--font-heading);">Studio Furniture</h2>
        <p class="text-[15px] text-white/60 leading-relaxed mb-8 max-w-md">Professional chairs, tables, and workspace essentials designed for comfort during long tattoo sessions.</p>

        <a href="/shop/product/tattoo-chair" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-black text-sm font-semibold rounded-lg transition-all duration-200 hover:bg-white/90 hover:-translate-y-0.5 hover:shadow-lg w-fit">
          View Product
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════ OTHERS — Minimal Grid ═══════════════ --}}
<section class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-16 md:py-24 lg:py-32">

    <div class="text-center mb-12 md:mb-16">
      <p class="text-[11px] uppercase tracking-[0.3em] text-text-muted mb-4">Essentials</p>
      <h2 class="text-3xl md:text-4xl font-bold text-text-primary leading-tight" style="font-family: var(--font-heading);">Studio Essentials</h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-8">
      <a href="/shop/product/power-supply" class="group cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Power Supply" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
        </div>
        <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">Others</p>
        <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Power Supply</h3>
        <p class="text-[13px] font-semibold text-text-primary">$85.00</p>
      </a>
      <a href="/shop/product/grip-set" class="group cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Grip Set" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
        </div>
        <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">Others</p>
        <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Grip Set</h3>
        <p class="text-[13px] font-semibold text-text-primary">$65.00</p>
      </a>
      <a href="/shop/product/stencil-paper" class="group cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Stencil Paper" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
        </div>
        <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">Others</p>
        <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">Stencil Paper</h3>
        <p class="text-[13px] font-semibold text-text-primary">$18.00</p>
      </a>
      <a href="/shop/product/led-ring-light" class="group cursor-pointer">
        <div class="aspect-[4/5] overflow-hidden rounded-xl mb-3 bg-[#f5f5f0]">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="LED Ring Light" class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.02]" />
        </div>
        <p class="text-[11px] uppercase tracking-[0.15em] text-text-muted mb-1">Others</p>
        <h3 class="text-[14px] font-bold text-text-primary mb-1" style="font-family: var(--font-heading);">LED Ring Light</h3>
        <p class="text-[13px] font-semibold text-text-primary">$65.00</p>
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
