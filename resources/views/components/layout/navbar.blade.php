@php
  $navWhatsappNumber = \App\Models\Setting::where('key', 'whatsapp')->value('value') ?? '6281234567890';
  $navWhatsappNumber = preg_replace('/[^0-9]/', '', $navWhatsappNumber);
  if (str_starts_with($navWhatsappNumber, '08')) {
      $navWhatsappNumber = '62' . substr($navWhatsappNumber, 1);
  }
  if (!str_starts_with($navWhatsappNumber, '62')) {
      $navWhatsappNumber = '62' . $navWhatsappNumber;
  }
@endphp

<nav 
  x-data="navbarData()" 
  @scroll.window="handleScroll()"
  class="fixed top-0 left-0 right-0 z-50 transition-all duration-200"
  style="background-color: var(--color-navbar-bg); border-bottom: 1px solid rgba(245, 245, 240, 0.08);"
>
  <div class="max-w-[1400px] mx-auto px-6 md:px-8 lg:px-12 h-16 md:h-20 flex items-center">

    {{-- Logo & Brand (Left) --}}
    <div class="flex items-center gap-3 flex-shrink-0">
      <div class="w-9 h-9 md:w-10 md:h-10 rounded flex items-center justify-center" style="background-color: rgba(245, 245, 240, 0.1);">
        <span class="text-[11px] md:text-xs font-bold tracking-wider" style="color: var(--color-navbar-text);">AT</span>
      </div>
      <a href="{{ route('home') }}" class="hidden sm:block font-bold text-base md:text-lg tracking-tight" style="color: var(--color-navbar-text); font-family: var(--font-heading);">
        Ananniti Tattoo
      </a>
    </div>

    {{-- Desktop Navigation (Center) --}}
    <div class="hidden md:flex items-center justify-center flex-1 mx-8">
      <div class="flex items-center gap-8">
        <a href="{{ route('home') }}" class="nav-link text-[13px]">Home</a>
        <a href="{{ route('home') }}#services" class="nav-link text-[13px]">Services</a>
        <a href="{{ route('shop') }}" class="nav-link text-[13px]">Shop</a>
        <a href="{{ route('gallery.index') }}" class="nav-link text-[13px]">Gallery</a>
        <a href="{{ route('home') }}#artists" class="nav-link text-[13px]">Artist</a>
      </div>
    </div>

    {{-- Desktop CTA (Right) --}}
    <div class="hidden md:flex items-center flex-shrink-0">
      <a 
        href="https://wa.me/{{ $navWhatsappNumber }}" 
        target="_blank" 
        rel="noopener noreferrer"
        class="inline-flex items-center gap-2 px-5 py-2.5 text-[13px] font-semibold rounded transition-all duration-200 hover:scale-[1.02] active:scale-[0.98]"
        style="background-color: var(--color-navbar-text); color: var(--color-navbar-bg);"
      >
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
        Consult via WhatsApp
      </a>
    </div>

    {{-- Mobile Menu Button --}}
    <button 
      @click="menuOpen = !menuOpen"
      class="md:hidden p-2 ml-auto transition-colors duration-200"
      :style="`color: var(--color-navbar-text)`"
      aria-label="Toggle menu"
      :aria-expanded="menuOpen"
    >
      <template x-if="!menuOpen">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </template>
      <template x-if="menuOpen">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </template>
    </button>
  </div>

  {{-- Mobile Navigation Menu --}}
  <div 
    x-show="menuOpen"
    @click.outside="menuOpen = false"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="md:hidden absolute top-full left-0 right-0"
    style="background-color: var(--color-navbar-bg); border-bottom: 1px solid rgba(245, 245, 240, 0.08);"
  >
    <div class="px-6 py-6 space-y-1">
      <a href="{{ route('home') }}" class="block nav-link-mobile" @click="menuOpen = false">Home</a>
      <a href="{{ route('home') }}#services" class="block nav-link-mobile" @click="menuOpen = false">Services</a>
      <a href="{{ route('shop') }}" class="block nav-link-mobile" @click="menuOpen = false">Shop</a>
      <a href="{{ route('gallery.index') }}" class="block nav-link-mobile" @click="menuOpen = false">Gallery</a>
      <a href="{{ route('home') }}#artists" class="block nav-link-mobile" @click="menuOpen = false">Artist</a>
      <div class="pt-4 mt-4" style="border-top: 1px solid rgba(245, 245, 240, 0.08);">
        <a 
          href="https://wa.me/{{ $navWhatsappNumber }}" 
          target="_blank" 
          rel="noopener noreferrer"
          class="flex items-center justify-center gap-2 w-full py-3 text-sm font-semibold rounded transition-all duration-200"
          style="background-color: var(--color-navbar-text); color: var(--color-navbar-bg);"
          @click="menuOpen = false"
        >
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
          </svg>
          Consult via WhatsApp
        </a>
      </div>
    </div>
  </div>
</nav>

@pushOnce('scripts')
<script>
function navbarData() {
  return {
    menuOpen: false,
    isScrolled: false,
    init() {
      window.addEventListener('scroll', () => { this.handleScroll(); });
    },
    handleScroll() {
      this.isScrolled = window.scrollY > 50;
    }
  };
}
</script>
@endPushOnce

<style scoped>
.nav-link {
  @apply font-medium transition-all duration-200 ease-out relative;
  color: var(--color-navbar-text);
  
  &::after {
    content: '';
    @apply absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-px transition-all duration-200 ease-out;
    background-color: rgba(245, 245, 240, 0.4);
  }
  
  &:hover {
    opacity: 0.7;
    &::after { @apply w-full; }
  }
}

.nav-link-mobile {
  @apply block py-3 text-sm font-medium transition-colors duration-200 ease-out;
  color: var(--color-navbar-text);
  
  &:hover { opacity: 0.7; }
}
</style>
