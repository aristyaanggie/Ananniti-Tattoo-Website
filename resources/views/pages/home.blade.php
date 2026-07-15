@extends('layouts.app')

@section('content')
<x-layout.navbar />

{{-- ═══════════════ HERO ═══════════════ --}}
<section id="hero" class="min-h-[100svh] relative overflow-hidden">
  <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Premium custom tattoo artwork showcase" class="absolute inset-0 w-full h-full object-cover object-center" loading="eager" />
  <div class="absolute inset-0 bg-black/40"></div>

  <div class="relative z-10 min-h-[100svh] flex items-center pt-16 md:pt-20">
    <div class="max-w-[1400px] mx-auto w-full px-6 md:px-8 lg:px-12">
      <div class="max-w-2xl">
        <p class="text-[11px] uppercase tracking-[0.3em] text-white/60 mb-5 animate-fadeInUp">Est. MMXII &mdash; Bali, Indonesia</p>
        <p class="text-xs uppercase tracking-[0.2em] text-white/80 mb-5 animate-fadeInUp delay-100">Premium Tattoo Studio</p>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-[1.1] animate-fadeInUp delay-200">Bring Your Tattoo<br class="hidden md:block"> Vision to Life</h1>
        <p class="text-base md:text-lg leading-relaxed text-white/85 mb-10 max-w-lg animate-fadeInUp delay-300">Every design is a collaboration. Every tattoo, a masterpiece crafted with precision and care.</p>
        <div class="flex flex-col sm:flex-row gap-4 mb-14 animate-fadeInUp delay-400">
          <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-black text-sm font-semibold rounded transition-all duration-200 hover:bg-white/90 hover:scale-[1.02] active:scale-[0.98]">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            Discuss Your Tattoo Idea
          </a>
          <a href="#gallery" class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white/15 text-white text-sm font-semibold rounded border border-white/30 transition-all duration-200 hover:bg-white/25 hover:border-white/50">
            View Our Works
          </a>
        </div>
        <div class="flex items-center gap-4 text-[13px] text-white/60 animate-fadeInUp delay-500">
          <span class="flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            4.9 Google Reviews
          </span>
          <span class="w-px h-3 bg-white/20"></span>
          <span>Professional Artists</span>
          <span class="w-px h-3 bg-white/20"></span>
          <span>Custom Design</span>
        </div>
      </div>
    </div>
  </div>
  <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-b from-transparent to-white z-10"></div>
</section>

{{-- ═══════════════ ABOUT ═══════════════ --}}
<section id="about" class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 lg:gap-20 items-center">
      <div class="md:order-1 order-2">
        <div class="aspect-[4/5] overflow-hidden rounded">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Ananniti Tattoo Studio" class="w-full h-full object-cover" />
        </div>
      </div>
      <div class="md:order-2 order-1">
        <p class="text-[11px] uppercase tracking-[0.25em] text-text-muted mb-5">About Ananniti</p>
        <h2 class="text-3xl md:text-4xl lg:text-[2.75rem] font-bold text-text-primary mb-6 leading-[1.15]">Crafted with Precision,<br> Built on Trust</h2>
        <p class="text-base md:text-lg leading-relaxed text-text-secondary mb-10">We believe every tattoo is a story waiting to be told. With over a decade of combined experience, our team brings your vision to life using premium techniques and the highest safety standards.</p>
        <div class="grid grid-cols-2 gap-x-8 gap-y-6">
          <div><p class="text-sm font-semibold text-text-primary mb-1">Professional Artists</p><p class="text-[13px] text-text-muted">Experienced & certified</p></div>
          <div><p class="text-sm font-semibold text-text-primary mb-1">Sterile Equipment</p><p class="text-[13px] text-text-muted">Safety guaranteed</p></div>
          <div><p class="text-sm font-semibold text-text-primary mb-1">Custom Design</p><p class="text-[13px] text-text-muted">Your vision, our art</p></div>
          <div><p class="text-sm font-semibold text-text-primary mb-1">Premium Experience</p><p class="text-[13px] text-text-muted">Comfort & luxury</p></div>
        </div>
      </div>
    </div>
  </div>
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#e5e5e5] to-transparent"></div></div>
</section>

{{-- ═══════════════ SERVICES ═══════════════ --}}
<section id="services" class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="text-center mb-16 md:mb-20">
      <p class="text-[11px] uppercase tracking-[0.25em] text-text-muted mb-5">How We Serve You</p>
      <h2 class="text-3xl md:text-4xl font-bold text-text-primary leading-tight">Choose Your Experience</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
      {{-- Studio Service --}}
      <div x-data="{ open: false }" class="group relative">
        <div class="border border-[#e5e5e5] rounded-lg p-8 md:p-10 transition-all duration-200 hover:border-[#ccc] bg-[#fafafa] shadow-[0_1px_3px_rgba(0,0,0,0.04)]">
          <div class="absolute top-0 left-6 right-6 h-px bg-[#e5e5e5]/50"></div>
          <div class="mb-5 text-text-muted transition-colors duration-200 group-hover:text-text-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015A3.001 3.001 0 0 0 21 9.349M6.75 21h10.5" /></svg>
          </div>
          <h3 class="text-xl md:text-2xl font-bold text-text-primary mb-3">Studio Service</h3>
          <p class="text-[15px] text-text-secondary leading-relaxed mb-6">Professional tattoo experience in our fully equipped studio with a comfortable and sterile environment.</p>
          <div class="overflow-hidden transition-all duration-200 ease-out" :class="open ? 'max-h-80 opacity-100' : 'max-h-0 opacity-0'">
            <div class="border-t border-[#e5e5e5] pt-6 mb-6">
              <div class="grid grid-cols-2 gap-3">
                @foreach(['Private Tattoo Studio', 'Sterile Equipment', 'Professional Artists', 'Custom Design Session', 'Comfortable Workspace', 'Free Consultation'] as $item)
                  <div class="flex items-start gap-2"><span class="w-1 h-1 rounded-full bg-text-muted mt-2 flex-shrink-0"></span><span class="text-[14px] text-text-secondary">{{ $item }}</span></div>
                @endforeach
              </div>
            </div>
          </div>
          <button @click="open = !open" :aria-expanded="open" class="inline-flex items-center gap-2 text-[14px] font-semibold text-text-primary hover:text-text-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary rounded">
            <span x-text="open ? 'Show Less' : 'Learn More'" />
            <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
          </button>
        </div>
      </div>
      {{-- Home Service --}}
      <div x-data="{ open: false }" class="group relative">
        <div class="border border-[#e5e5e5] rounded-lg p-8 md:p-10 transition-all duration-200 hover:border-[#ccc] bg-[#fafafa] shadow-[0_1px_3px_rgba(0,0,0,0.04)]">
          <div class="absolute top-0 left-6 right-6 h-px bg-[#e5e5e5]/50"></div>
          <div class="mb-5 text-text-muted transition-colors duration-200 group-hover:text-text-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2.25 12l8.954-8.955a1.126 1.126 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21" /></svg>
          </div>
          <h3 class="text-xl md:text-2xl font-bold text-text-primary mb-3">Home Service</h3>
          <p class="text-[15px] text-text-secondary leading-relaxed mb-6">Professional tattoo session at your preferred location with complete sterile equipment.</p>
          <div class="overflow-hidden transition-all duration-200 ease-out" :class="open ? 'max-h-80 opacity-100' : 'max-h-0 opacity-0'">
            <div class="border-t border-[#e5e5e5] pt-6 mb-6">
              <div class="grid grid-cols-2 gap-3">
                @foreach(['Tattoo at Your Location', 'Sterile Portable Equipment', 'Appointment Required', 'Bali Area Coverage', 'Professional Preparation', 'Consultation Before Visit'] as $item)
                  <div class="flex items-start gap-2"><span class="w-1 h-1 rounded-full bg-text-muted mt-2 flex-shrink-0"></span><span class="text-[14px] text-text-secondary">{{ $item }}</span></div>
                @endforeach
              </div>
            </div>
          </div>
          <button @click="open = !open" :aria-expanded="open" class="inline-flex items-center gap-2 text-[14px] font-semibold text-text-primary hover:text-text-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary rounded">
            <span x-text="open ? 'Show Less' : 'Learn More'" />
            <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#e5e5e5] to-transparent"></div></div>
</section>

{{-- ═══════════════ SHOP ═══════════════ --}}
<section id="shop" class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="text-center mb-16 md:mb-20">
      <p class="text-[11px] uppercase tracking-[0.25em] text-text-muted mb-5">Tattoo Supply</p>
      <h2 class="text-3xl md:text-4xl font-bold text-text-primary leading-tight">Professional Equipment</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-5">
      {{-- Large Card --}}
      <a href="/shop?category=machine" class="group relative md:row-span-2 overflow-hidden rounded-xl shadow-[0_2px_8px_rgba(0,0,0,0.06)] cursor-pointer">
        <div class="aspect-[3/4] md:h-full overflow-hidden">
          <img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Tattoo Machine" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
          <p class="text-[11px] uppercase tracking-[0.2em] text-white/70 mb-2">Featured</p>
          <h3 class="text-xl md:text-2xl font-bold text-white mb-1">Tattoo Machine</h3>
          <p class="text-[13px] text-white/70">Precision instruments for every style</p>
        </div>
      </a>
      <div class="flex flex-col gap-4 md:gap-5">
        <a href="/shop?category=ink" class="group relative overflow-hidden rounded-xl shadow-[0_2px_8px_rgba(0,0,0,0.06)] cursor-pointer">
          <div class="aspect-[16/9] overflow-hidden"><img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Tattoo Ink" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" /></div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-5"><h3 class="text-lg font-bold text-white">Tattoo Ink</h3><p class="text-[13px] text-white/70">Rich pigmentation, lasting results</p></div>
        </a>
        <a href="/shop?category=needles" class="group relative overflow-hidden rounded-xl shadow-[0_2px_8px_rgba(0,0,0,0.06)] cursor-pointer">
          <div class="aspect-[16/9] overflow-hidden"><img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Tattoo Needle" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" /></div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-5"><h3 class="text-lg font-bold text-white">Tattoo Needle</h3><p class="text-[13px] text-white/70">Sterile, professional grade</p></div>
        </a>
      </div>
      <a href="/shop?category=kitset" class="group relative overflow-hidden rounded-xl shadow-[0_2px_8px_rgba(0,0,0,0.06)] cursor-pointer">
        <div class="aspect-[4/3] overflow-hidden"><img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Tattoo Kit Set" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" /></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-5"><h3 class="text-lg font-bold text-white">Kit Set</h3><p class="text-[13px] text-white/70">Complete starter kits</p></div>
      </a>
      <a href="/shop?category=furniture" class="group relative overflow-hidden rounded-xl shadow-[0_2px_8px_rgba(0,0,0,0.06)] cursor-pointer">
        <div class="aspect-[4/3] overflow-hidden"><img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Tattoo Furniture" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" /></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-5"><h3 class="text-lg font-bold text-white">Furniture</h3><p class="text-[13px] text-white/70">Studio essentials</p></div>
      </a>
      <a href="/shop" class="group relative overflow-hidden rounded-xl shadow-[0_2px_8px_rgba(0,0,0,0.06)] cursor-pointer">
        <div class="aspect-[4/3] overflow-hidden"><img src="{{ asset('images/hero-placeholder2.jpeg') }}" alt="Other Categories" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" /></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-5"><h3 class="text-lg font-bold text-white">View All</h3><p class="text-[13px] text-white/70">Explore everything</p></div>
      </a>
    </div>
    <div class="text-center mt-16 md:mt-20">
      <a href="/shop" class="inline-flex items-center justify-center gap-2.5 px-10 py-4 bg-black text-white text-[15px] font-semibold tracking-wide rounded-xl transition-all duration-200 hover:bg-neutral-800 hover:-translate-y-0.5 hover:shadow-lg active:scale-[0.98]">
        Explore Shop
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
      </a>
    </div>
  </div>
</section>

{{-- ═══════════════ CHAPTER TRANSITION: WHITE → DARK ═══════════════ --}}
<div class="relative h-16 md:h-24 bg-white overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-white via-white/70 to-[#0a0a0a]/70"></div>
</div>

{{-- ═══════════════ GALLERY ═══════════════ --}}
<section id="gallery" class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12 md:mb-16">
      <div>
        <p class="text-[11px] uppercase tracking-[0.25em] text-white/50 mb-4">Portfolio</p>
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">Selected Works</h2>
      </div>
      <a href="/gallery" class="mt-4 md:mt-0 inline-flex items-center gap-2 text-sm font-semibold text-white hover:text-white/70 transition-colors duration-200">
        View All
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
      </a>
    </div>

    {{-- Editorial Asymmetric Gallery --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-8 max-w-[1100px] mx-auto">

      {{-- Left Column: 1 Large Portrait + 1 Small --}}
      <div class="md:col-span-5 flex flex-col gap-6 md:gap-8">
        <a href="/gallery" class="group relative overflow-hidden rounded-3xl cursor-pointer flex-[3]">
          <div class="overflow-hidden h-full"><img src="{{ asset('images/gallery/gallery-1.svg') }}" alt="Balinese Tattoo" class="w-full h-full min-h-[260px] md:min-h-[340px] object-cover transition-transform duration-250 group-hover:scale-[1.02]" /></div>
          <div class="absolute inset-0 bg-black/0 transition-all duration-250 group-hover:bg-black/15"></div>
          <div class="absolute inset-0 flex items-end p-6 md:p-8"><span class="text-[10px] uppercase tracking-[0.2em] text-white font-medium opacity-0 translate-y-2 transition-all duration-250 group-hover:opacity-100 group-hover:translate-y-0">Balinese</span></div>
        </a>
        <a href="/gallery" class="group relative overflow-hidden rounded-3xl cursor-pointer flex-1">
          <div class="overflow-hidden h-full"><img src="{{ asset('images/gallery/gallery-5.svg') }}" alt="Fine Line Tattoo" class="w-full h-full min-h-[140px] md:min-h-[180px] object-cover transition-transform duration-250 group-hover:scale-[1.02]" /></div>
          <div class="absolute inset-0 bg-black/0 transition-all duration-250 group-hover:bg-black/15"></div>
          <div class="absolute inset-0 flex items-end p-6"><span class="text-[10px] uppercase tracking-[0.2em] text-white font-medium opacity-0 translate-y-2 transition-all duration-250 group-hover:opacity-100 group-hover:translate-y-0">Fine Line</span></div>
        </a>
      </div>

      {{-- Right Column: 2 Landscape + 1 Square --}}
      <div class="md:col-span-7 flex flex-col gap-6 md:gap-8">
        <a href="/gallery" class="group relative overflow-hidden rounded-3xl cursor-pointer flex-[3]">
          <div class="overflow-hidden h-full"><img src="{{ asset('images/gallery/gallery-3.svg') }}" alt="Realism Tattoo" class="w-full h-full min-h-[210px] md:min-h-[250px] object-cover transition-transform duration-250 group-hover:scale-[1.02]" /></div>
          <div class="absolute inset-0 bg-black/0 transition-all duration-250 group-hover:bg-black/15"></div>
          <div class="absolute inset-0 flex items-end p-6 md:p-8"><span class="text-[10px] uppercase tracking-[0.2em] text-white font-medium opacity-0 translate-y-2 transition-all duration-250 group-hover:opacity-100 group-hover:translate-y-0">Realism</span></div>
        </a>
        <div class="grid grid-cols-2 gap-6 md:gap-8 flex-[2]">
          <a href="/gallery" class="group relative overflow-hidden rounded-3xl cursor-pointer">
            <div class="overflow-hidden h-full"><img src="{{ asset('images/gallery/gallery-2.svg') }}" alt="Oriental Tattoo" class="w-full h-full min-h-[140px] md:min-h-[180px] object-cover transition-transform duration-250 group-hover:scale-[1.02]" /></div>
            <div class="absolute inset-0 bg-black/0 transition-all duration-250 group-hover:bg-black/15"></div>
            <div class="absolute inset-0 flex items-end p-5"><span class="text-[10px] uppercase tracking-[0.2em] text-white font-medium opacity-0 translate-y-2 transition-all duration-250 group-hover:opacity-100 group-hover:translate-y-0">Oriental</span></div>
          </a>
          <a href="/gallery" class="group relative overflow-hidden rounded-3xl cursor-pointer">
            <div class="overflow-hidden h-full"><img src="{{ asset('images/gallery/gallery-4.svg') }}" alt="Blackwork Tattoo" class="w-full h-full min-h-[140px] md:min-h-[180px] object-cover transition-transform duration-250 group-hover:scale-[1.02]" /></div>
            <div class="absolute inset-0 bg-black/0 transition-all duration-250 group-hover:bg-black/15"></div>
            <div class="absolute inset-0 flex items-end p-5"><span class="text-[10px] uppercase tracking-[0.2em] text-white font-medium opacity-0 translate-y-2 transition-all duration-250 group-hover:opacity-100 group-hover:translate-y-0">Blackwork</span></div>
          </a>
        </div>
        <a href="/gallery" class="group relative overflow-hidden rounded-3xl cursor-pointer flex-1">
          <div class="overflow-hidden h-full"><img src="{{ asset('images/gallery/gallery-6.svg') }}" alt="Custom Design" class="w-full h-full min-h-[120px] md:min-h-[150px] object-cover transition-transform duration-250 group-hover:scale-[1.02]" /></div>
          <div class="absolute inset-0 bg-black/0 transition-all duration-250 group-hover:bg-black/15"></div>
          <div class="absolute inset-0 flex items-end p-6"><span class="text-[10px] uppercase tracking-[0.2em] text-white font-medium opacity-0 translate-y-2 transition-all duration-250 group-hover:opacity-100 group-hover:translate-y-0">Custom Design</span></div>
        </a>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════ ARTISTS ═══════════════ --}}
<section id="artists" class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="flex flex-col md:flex-row md:items-start md:justify-between mb-16 md:mb-20 lg:mb-24 gap-6 md:gap-8">
      <div class="max-w-xl">
        <p class="text-[11px] uppercase tracking-[0.25em] text-white/50 mb-5">Featured Artist</p>
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">Meet the Artist</h2>
        <p class="mt-5 text-base md:text-lg text-white/70 leading-relaxed max-w-lg">Dedicated to creating timeless artwork with precision and passion.</p>
      </div>
      <div class="md:text-right"><span class="text-[11px] uppercase tracking-[0.2em] text-white/40">01 / Featured</span></div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-[45%_1fr] gap-10 md:gap-16 lg:gap-20 items-center">
      <div class="group cursor-pointer">
        <div class="aspect-[3/4] overflow-hidden rounded">
          <img src="{{ asset('images/artists/featured-artist.svg') }}" alt="Featured Tattoo Artist" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.03]" />
        </div>
      </div>
      <div class="flex flex-col justify-center">
        <span class="text-[11px] uppercase tracking-[0.2em] text-white/40 mb-5">Blackwork &bull; Realism</span>
        <h3 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-[1.05]" style="font-family: var(--font-heading);">Ananniti<br>Artist</h3>
        <div class="max-w-lg mb-10">
          <p class="text-base md:text-lg text-white/70 leading-relaxed mb-4">With over a decade of experience, our featured artist brings a unique blend of technical precision and creative vision to every piece.</p>
          <p class="text-base md:text-lg text-white/70 leading-relaxed">Each design is carefully crafted to tell a personal story while maintaining the highest standards of quality and safety.</p>
        </div>
        <a href="/gallery" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-black text-sm font-semibold rounded transition-all duration-200 hover:bg-white/90 hover:scale-[1.02] active:scale-[0.98]">
          View Portfolio
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════ CHAPTER TRANSITION: DARK → WHITE ═══════════════ --}}
<div class="relative h-16 md:h-24 bg-[#0a0a0a] overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-[#0a0a0a] via-[#0a0a0a]/70 to-white/70"></div>
</div>

{{-- ═══════════════ TRUST ═══════════════ --}}
<section id="reviews" class="bg-white">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">

    {{-- Rating Header --}}
    <div class="text-center mb-16 md:mb-20">
      <p class="text-[11px] uppercase tracking-[0.25em] text-text-muted mb-6">Trusted By Clients</p>
      <div class="flex items-center justify-center gap-3 mb-4">
        <span class="text-5xl md:text-6xl font-bold text-text-primary" style="font-family: var(--font-heading);">4.9</span>
        <div class="flex gap-1">
          @for($i = 0; $i < 5; $i++)
            <svg class="w-5 h-5" fill="#D4AF37" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          @endfor
        </div>
      </div>
      <p class="text-[13px] text-text-muted">based on verified international clients</p>
    </div>

    {{-- Section Title --}}
    <div class="max-w-2xl mb-12 md:mb-16">
      <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-text-primary leading-tight mb-5">Trusted by People Who Wear Our Art</h2>
      <p class="text-[15px] text-text-secondary leading-relaxed">Every review comes from a real experience. These are the stories of people who trusted us with something permanent.</p>
    </div>

    {{-- Social Proof Tags --}}
    <div class="mb-12 md:mb-16">
      <p class="text-[13px] text-text-muted tracking-wide">Google Reviews &middot; International Client &middot; Fine Line &middot; Blackwork &middot; Realism &middot; Returning Client</p>
    </div>

    {{-- 2 Featured Reviews --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-6 md:mb-8">
      <div class="border border-[#e5e5e5] rounded-2xl p-8 md:p-10 bg-[#fafafa] transition-shadow duration-200 hover:shadow-sm">
        <div class="flex gap-1 mb-6">
          @for($i = 0; $i < 5; $i++)
            <svg class="w-4 h-4" fill="#D4AF37" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          @endfor
        </div>
        <p class="text-base md:text-lg text-text-primary leading-relaxed italic mb-6">"The experience exceeded my expectations. The attention to detail and professionalism made me feel comfortable from start to finish."</p>
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 rounded-full overflow-hidden bg-[#e5e5e5] flex-shrink-0"><img src="{{ asset('images/reviews/review-1.svg') }}" alt="Michael R." class="w-full h-full object-cover" /></div>
          <div><p class="text-sm font-semibold text-text-primary">Michael R.</p><p class="text-[11px] uppercase tracking-[0.15em] text-text-muted">Australia &bull; Fine Line</p></div>
        </div>
      </div>
      <div class="border border-[#e5e5e5] rounded-2xl p-8 md:p-10 bg-[#fafafa] transition-shadow duration-200 hover:shadow-sm">
        <div class="flex gap-1 mb-6">
          @for($i = 0; $i < 5; $i++)
            <svg class="w-4 h-4" fill="#D4AF37" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          @endfor
        </div>
        <p class="text-base md:text-lg text-text-primary leading-relaxed italic mb-6">"I came to Bali for vacation and left with a tattoo I'll cherish forever. The entire process felt personal and professional."</p>
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 rounded-full overflow-hidden bg-[#e5e5e5] flex-shrink-0"><img src="{{ asset('images/reviews/review-2.svg') }}" alt="Sarah L." class="w-full h-full object-cover" /></div>
          <div><p class="text-sm font-semibold text-text-primary">Sarah L.</p><p class="text-[11px] uppercase tracking-[0.15em] text-text-muted">Germany &bull; Realism</p></div>
        </div>
      </div>
    </div>

    {{-- 3 Smaller Reviews --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6">
      <div class="border border-[#e5e5e5] rounded-xl p-5 md:p-6 bg-[#fafafa] transition-shadow duration-200 hover:shadow-sm">
        <div class="flex gap-0.5 mb-4">
          @for($i = 0; $i < 5; $i++)
            <svg class="w-3 h-3" fill="#D4AF37" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          @endfor
        </div>
        <p class="text-[14px] text-text-secondary leading-relaxed italic mb-4">"From consultation to the final session, everything was handled with care. I couldn't be happier with the result."</p>
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full overflow-hidden bg-[#e5e5e5] flex-shrink-0"><img src="{{ asset('images/reviews/review-3.svg') }}" alt="Kevin T." class="w-full h-full object-cover" /></div>
          <div><p class="text-[13px] font-semibold text-text-primary">Kevin T.</p><p class="text-[10px] uppercase tracking-[0.15em] text-text-muted">Indonesia &bull; Session: 8hrs</p></div>
        </div>
      </div>
      <div class="border border-[#e5e5e5] rounded-xl p-5 md:p-6 bg-[#fafafa] transition-shadow duration-200 hover:shadow-sm">
        <div class="flex gap-0.5 mb-4">
          @for($i = 0; $i < 5; $i++)
            <svg class="w-3 h-3" fill="#D4AF37" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          @endfor
        </div>
        <p class="text-[14px] text-text-secondary leading-relaxed italic mb-4">"Professional from start to finish. The studio is clean, the artists are skilled, and the result speaks for itself."</p>
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full overflow-hidden bg-[#e5e5e5] flex-shrink-0"><img src="{{ asset('images/reviews/review-4.svg') }}" alt="James W." class="w-full h-full object-cover" /></div>
          <div><p class="text-[13px] font-semibold text-text-primary">James W.</p><p class="text-[10px] uppercase tracking-[0.15em] text-text-muted">United States &bull; Bali Visit</p></div>
        </div>
      </div>
      <div class="border border-[#e5e5e5] rounded-xl p-5 md:p-6 bg-[#fafafa] transition-shadow duration-200 hover:shadow-sm">
        <div class="flex gap-0.5 mb-4">
          @for($i = 0; $i < 5; $i++)
            <svg class="w-3 h-3" fill="#D4AF37" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          @endfor
        </div>
        <p class="text-[14px] text-text-secondary leading-relaxed italic mb-4">"I've had tattoos done in several countries, and this was by far the best experience. Truly world-class artistry."</p>
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full overflow-hidden bg-[#e5e5e5] flex-shrink-0"><img src="{{ asset('images/reviews/review-5.svg') }}" alt="Anna K." class="w-full h-full object-cover" /></div>
          <div><p class="text-[13px] font-semibold text-text-primary">Anna K.</p><p class="text-[10px] uppercase tracking-[0.15em] text-text-muted">Japan &bull; Returning Client</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════ CHAPTER TRANSITION: WHITE → DARK ═══════════════ --}}
<div class="relative h-16 md:h-24 bg-white overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-white via-white/70 to-[#0a0a0a]/70"></div>
</div>

{{-- ═══════════════ CONSULTATION ═══════════════ --}}
<section id="cta" class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 py-24 md:py-32 lg:py-40">
    <div class="max-w-2xl mx-auto">
      <div class="bg-white rounded-3xl p-10 md:p-14 lg:p-16 shadow-[0_8px_60px_rgba(0,0,0,0.12)]">
        <div class="text-center mb-8">
          <div class="inline-flex items-center gap-2.5 mb-8">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-black">
              <span class="text-[10px] font-bold text-white tracking-wider">AT</span>
            </div>
            <span class="font-bold text-base text-black" style="font-family: var(--font-heading);">Ananniti Tattoo</span>
          </div>
          <h2 class="text-3xl md:text-4xl lg:text-[2.75rem] font-bold text-black leading-[1.1] mb-5" style="font-family: var(--font-heading);">Let's Create Something<br> Meaningful Together</h2>
          <p class="text-base text-black/60 leading-relaxed max-w-md mx-auto">Whether it's your first tattoo or your next masterpiece, we're here to help you shape every detail.</p>
        </div>
        <div class="text-center mb-10">
          <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2.5 px-8 py-4 bg-black text-white text-sm font-semibold rounded transition-all duration-200 hover:bg-[#1a1a1a] hover:scale-[1.02] active:scale-[0.98]">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            Discuss Your Tattoo Idea
          </a>
        </div>
        <div class="text-center">
          <p class="text-[13px] text-black/40">Free consultation &bull; No obligation &bull; Fast response</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════ FOOTER ═══════════════ --}}
<footer class="bg-[#0a0a0a]">
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 pt-12 md:pt-16 pb-16 md:pb-20 lg:pb-24">
    <div class="border-t border-white/10 pt-10 md:pt-12 mb-12 md:mb-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 md:gap-8 lg:gap-12">
      <div class="sm:col-span-2 md:col-span-1">
        <div class="flex items-center gap-2.5 mb-5">
          <div class="w-8 h-8 rounded flex items-center justify-center bg-white/10"><span class="text-[10px] font-bold tracking-wider text-white">AT</span></div>
          <span class="font-bold text-base text-white" style="font-family: var(--font-heading);">Ananniti Tattoo</span>
        </div>
        <p class="text-[13px] text-white/70 leading-relaxed max-w-[260px]">Crafting meaningful tattoos through precision, artistry, and personal connection in Bali.</p>
      </div>
      <div>
        <h4 class="text-[11px] uppercase tracking-[0.2em] text-white/90 font-semibold mb-5">Quick Links</h4>
        <nav class="space-y-3">
          <a href="#" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Home</a>
          <a href="#services" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Services</a>
          <a href="#shop" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Shop</a>
          <a href="#gallery" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Gallery</a>
          <a href="#artists" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Artist</a>
          <a href="#cta" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Consultation</a>
        </nav>
      </div>
      <div>
        <h4 class="text-[11px] uppercase tracking-[0.2em] text-white/90 font-semibold mb-5">Studio</h4>
        <div class="space-y-3">
          <a href="https://maps.google.com/?q=Ananniti+Tattoo+Bali+Seminyak" target="_blank" rel="noopener noreferrer" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200 leading-relaxed">Jl. Raya Seminyak No. 12<br>Seminyak, Bali 80361</a>
          <p class="text-[13px] text-white/70 leading-relaxed">Open Daily &bull; 10:00 — 22:00 WITA</p>
          <a href="tel:+6281234567890" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">+62 812 3456 7890</a>
          <a href="mailto:hello@anannititattoo.com" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">hello@anannititattoo.com</a>
        </div>
      </div>
      <div>
        <h4 class="text-[11px] uppercase tracking-[0.2em] text-white/90 font-semibold mb-5">Connect</h4>
        <div class="space-y-3">
          <a href="https://instagram.com/anannititattoo" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-[13px] text-white/70 hover:text-white transition-colors duration-200"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</a>
          <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-[13px] text-white/70 hover:text-white transition-colors duration-200"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>WhatsApp</a>
          <a href="https://tiktok.com/@anannititattoo" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-[13px] text-white/70 hover:text-white transition-colors duration-200"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>TikTok</a>
          <a href="https://facebook.com/anannititattoo" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-[13px] text-white/70 hover:text-white transition-colors duration-200"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</a>
        </div>
      </div>
    </div>
    <div class="border-t border-white/10 pt-6 md:pt-8 flex flex-col md:flex-row items-center justify-between gap-3">
      <p class="text-[11px] text-white/40">&copy; 2026 Ananniti Tattoo Bali. All Rights Reserved.</p>
      <p class="text-[11px] text-white/40">Made with passion in Bali.</p>
    </div>
  </div>
</footer>

@endsection
