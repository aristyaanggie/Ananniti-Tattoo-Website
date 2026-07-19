@php
  $footerWhatsappNumber = \App\Models\Setting::where('key', 'whatsapp')->value('value') ?? '6281234567890';
  $footerWhatsappNumber = preg_replace('/[^0-9]/', '', $footerWhatsappNumber);
  if (str_starts_with($footerWhatsappNumber, '08')) {
      $footerWhatsappNumber = '62' . substr($footerWhatsappNumber, 1);
  }
  if (!str_starts_with($footerWhatsappNumber, '62')) {
      $footerWhatsappNumber = '62' . $footerWhatsappNumber;
  }
@endphp

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
          <a href="{{ route('home') }}" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Home</a>
          <a href="{{ route('home') }}#services" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Services</a>
          <a href="{{ route('shop') }}" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Shop</a>
          <a href="{{ route('home') }}#gallery" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Gallery</a>
          <a href="{{ route('home') }}#artists" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Artist</a>
          <a href="{{ route('booking.create') }}" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">Book Consultation</a>
        </nav>
      </div>
      <div>
        <h4 class="text-[11px] uppercase tracking-[0.2em] text-white/90 font-semibold mb-5">Studio</h4>
        <div class="space-y-3">
          <a href="https://maps.google.com/?q=Ananniti+Tattoo+Bali+Seminyak" target="_blank" rel="noopener noreferrer" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200 leading-relaxed">Jl. Raya Seminyak No. 12<br>Seminyak, Bali 80361</a>
          <p class="text-[13px] text-white/70 leading-relaxed">Open Daily &bull; 10:00 — 22:00 WITA</p>
          <a href="tel:+{{ $footerWhatsappNumber }}" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">+{{ substr($footerWhatsappNumber, 0, 2) . ' ' . substr($footerWhatsappNumber, 2, 3) . ' ' . substr($footerWhatsappNumber, 5, 3) . ' ' . substr($footerWhatsappNumber, 8) }}</a>
          <a href="mailto:hello@anannititattoo.com" class="block text-[13px] text-white/70 hover:text-white transition-colors duration-200">hello@anannititattoo.com</a>
        </div>
      </div>
      <div>
        <h4 class="text-[11px] uppercase tracking-[0.2em] text-white/90 font-semibold mb-5">Connect</h4>
        <div class="space-y-3">
          <a href="https://instagram.com/anannititattoo" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-[13px] text-white/70 hover:text-white transition-colors duration-200"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</a>
          <a href="https://wa.me/{{ $footerWhatsappNumber }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-[13px] text-white/70 hover:text-white transition-colors duration-200"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>WhatsApp</a>
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
