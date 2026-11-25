@extends('layouts.public')

@section('title', 'Envy Studio — Creative Esports & Gaming Design Agency')

@section('content')
<main id="view-home" class="flex-1 w-full">

      <!-- Hero Stage -->
      <section class="relative w-full max-w-[1380px] mx-auto px-5 sm:px-10 min-h-[calc(100vh-88px)] flex items-center py-6 lg:py-0 overflow-hidden">
      <!-- Right-Side Owner Studio Portrait (Yafa aufa) -->
      <div class="hidden lg:block absolute right-0 bottom-0 top-0 w-[52%] pointer-events-none select-none overflow-hidden">
        <img src="{{ asset('images/yafa-owner.jpg') }}"
          alt="Yafa aufa - Owner envy std"
          class="hero-portrait-mask w-full h-full object-cover object-top opacity-95" />
        <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-[#050811]/90 via-[#050811]/35 to-transparent"></div>
        <!-- Owner Identity Tag (matching uploaded reference) -->
        <div class="absolute bottom-8 left-16 z-20 flex items-stretch gap-3">
          <span class="w-1 rounded-full bg-gradient-to-b from-sky-300 via-blue-400 to-indigo-400 shadow-[0_0_12px_rgba(96,165,250,0.85)]"></span>
          <div class="leading-tight">
            <div class="text-2xl font-normal tracking-tight text-white drop-shadow">Yafa aufa</div>
            <div class="text-base font-bold tracking-tight text-white/95 drop-shadow">Owner envy studio</div>
          </div>
        </div>
      </div>

      <!-- Left & Center Editorial Composition -->
      <div class="relative z-10 w-full max-w-2xl py-6 lg:py-10 space-y-8">
        <!-- Headline Block with Dashed Ring -->
        <div class="relative pt-6">
          <!-- Dashed Circle Accent behind "We are" -->
          <div class="relative inline-flex items-center ml-[44%] sm:ml-[46%] mb-1">
            <span class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border border-dashed border-white/55 absolute -top-8 left-4 pointer-events-none"></span>
            <span class="relative z-10 text-xl sm:text-2xl font-medium tracking-tight text-white">We are</span>
          </div>

          <h1 class="hero-headline-fade text-5xl sm:text-7xl lg:text-[84px] font-semibold tracking-[-0.04em] leading-[0.98] whitespace-nowrap">
            Envy Studio
          </h1>

          <p class="mt-6 text-lg sm:text-2xl font-light text-white/85 leading-snug max-w-md tracking-tight">
            Desain Visual Esports &amp; Gaming<br />
            Dengan Alur Order Terpadu
          </p>
        </div>

        <!-- CTA Pill + Team/Client Proof Row -->
        <div class="flex flex-wrap items-center gap-5">
          <button id="hero-cta-order" type="button"
            class="inline-flex items-center gap-4 pl-6 pr-2 py-2 rounded-full bg-envyAccent hover:bg-envyBright text-white text-sm font-medium shadow-xl shadow-blue-600/40 transition group">
            <span>Buat Order</span>
            <span class="w-9 h-9 rounded-full bg-white text-envyAccent flex items-center justify-center group-hover:translate-x-0.5 transition">
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </span>
          </button>

          <div class="flex items-center gap-3">
            <div class="flex -space-x-2.5">
              <span class="w-9 h-9 rounded-full bg-blue-600 border-2 border-slate-950 flex items-center justify-center text-xs font-bold">Y</span>
              <span class="w-9 h-9 rounded-full bg-sky-500 border-2 border-slate-950 flex items-center justify-center text-xs font-bold">A</span>
              <span class="w-9 h-9 rounded-full bg-indigo-600 border-2 border-slate-950 flex items-center justify-center text-xs font-bold">F</span>
            </div>
            <div class="text-xs leading-tight text-white/80">
              <div class="font-semibold text-white">40+ Order / Bulan</div>
              <div class="text-white/60">Logo, Jersey &amp; Overlay</div>
            </div>
          </div>
        </div>

        <!-- Bottom-Left Bento Cards (2 Square Glass Cards) -->
        <div class="grid grid-cols-2 gap-4 max-w-[430px] pt-2">
          <!-- Card 1: Visual Thumbnail Card -->
          <button id="bento-showcase-btn" type="button"
            class="group relative h-44 sm:h-48 rounded-3xl overflow-hidden border border-white/20 shadow-2xl text-left">
            <img src="{{ asset('images/yafa-owner.jpg') }}"
              alt="Yafa aufa - Owner envy std"
              class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <span class="absolute bottom-3 left-3.5 text-[11px] font-medium text-white/90">Lihat 6 Layanan →</span>
          </button>

          <!-- Card 2: Frosted Metric Card -->
          <div class="glass-card h-44 sm:h-48 rounded-3xl p-4 sm:p-5 flex flex-col justify-between shadow-2xl">
            <div class="inline-flex items-center gap-1.5 self-start px-3 py-1 rounded-full bg-white/10 border border-white/15 text-[11px] text-white/90">
              <i data-lucide="trending-up" class="w-3.5 h-3.5 text-sky-300"></i>
              <span>Studio Aktif</span>
            </div>

            <div>
              <div class="text-3xl sm:text-4xl font-semibold tracking-tight text-white">Rp35K+</div>
              <div class="text-xs text-white/65 mt-0.5">Mulai per proyek desain</div>
            </div>

            <button id="bento-workspace-btn" type="button" aria-label="Buka Workspace Tim"
              class="w-9 h-9 rounded-full bg-white text-slate-950 hover:bg-blue-50 flex items-center justify-center transition shadow-md">
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
          </div>
        </div>

      </div>
          </section>

      <!-- Scrollable Portfolio Section (Matching Reference Filter Pills) -->
      <section id="portfolio-section" class="relative w-full border-t border-white/10 bg-[#050811]/80 backdrop-blur-md">
        <div class="max-w-[1380px] mx-auto px-5 sm:px-10 py-16 sm:py-20 space-y-10">
          <!-- Section Header -->
          <div class="text-center max-w-2xl mx-auto space-y-3">
            <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full glass-pill text-[11px] font-medium tracking-[0.16em] uppercase text-sky-300">
              Selected Works · Envy Studio
            </span>
            <h2 class="text-3xl sm:text-5xl font-semibold tracking-[-0.03em] text-white">
              Portofolio Karya Kami
            </h2>
            <p class="text-xs sm:text-sm text-white/65">
              Pilih kategori di bawah untuk melihat hasil desain asli dari tim kreatif Envy Studio. Klik gambar untuk pratinjau penuh.
            </p>
          </div>

          <!-- Category Filter Pills (Exact Reference Style) -->
          <div id="portfolio-filter-bar" class="flex flex-wrap items-center justify-center gap-2.5"></div>

          <!-- Precision 3-Column Portfolio Grid -->
          <div id="portfolio-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5"></div>
        </div>
      </section>
      <!-- Scrollable About Us Section (Matching Reference Copy & Grid Style) -->
      <section id="about-section" class="relative w-full border-t border-white/10 bg-[#050811]/92 backdrop-blur-md" style="background-image: linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px); background-size: 48px 48px;">
        <div class="max-w-[1380px] mx-auto px-5 sm:px-10 py-20 sm:py-24">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <!-- Left Editorial Copy (Exact Reference) -->
            <div class="lg:col-span-7 space-y-7">
              <div class="inline-flex items-center gap-3">
                <span class="inline-block w-8 h-[1.5px] bg-[#1d8ff2]"></span>
                <span class="text-[11px] font-semibold tracking-[0.22em] uppercase text-[#38bdf8]">ABOUT US</span>
              </div>

              <h2 class="text-4xl sm:text-6xl lg:text-[64px] font-bold tracking-[-0.03em] leading-[1.03] text-white">
                The Team<br />
                Behind Your<br />
                <span class="italic text-[#1d8ff2]">Vision</span>
              </h2>

              <div class="space-y-4 max-w-2xl text-sm sm:text-[15px] leading-relaxed text-white/70">
                <p>
                  Envy Studio adalah creative design agency yang lahir di era pandemi 2020 dengan satu misi: memberikan identitas visual yang powerful untuk dunia esports dan gaming Indonesia.
                </p>
                <p>
                  Kami adalah tim desainer muda Gen Z yang paham industri esports dari dalam. Bukan sekadar desain — kami membangun legacy visual untuk tim dan creator yang ingin diingat.
                </p>
              </div>

              <div class="flex flex-wrap items-center gap-3 pt-2">
                <a href="{{ route('public.order') }}"   class="nav-jump px-6 py-3 rounded-full bg-[#1d8ff2] hover:bg-[#167bd4] text-white text-xs sm:text-sm font-semibold tracking-wide transition shadow-lg shadow-blue-500/20">
                  Mulai Order Desain →
                </a>
                <a href="https://wa.me/6281528535041" target="_blank" rel="noopener noreferrer" class="px-6 py-3 rounded-full glass-pill text-white/90 hover:bg-white/15 text-xs sm:text-sm font-medium transition">
                  Konsultasi via WhatsApp
                </a>
              </div>
            </div>

            <!-- Right Studio Pillars Card -->
            <div class="lg:col-span-5">
              <div class="glass-card rounded-3xl p-6 sm:p-8 border border-white/10 space-y-6 bg-[#090f1f]/75">
                <div class="flex items-center justify-between border-b border-white/10 pb-4">
                  <div>
                    <div class="text-[11px] uppercase tracking-[0.18em] text-[#38bdf8] font-semibold">Envy Studio</div>
                    <div class="text-lg font-semibold text-white mt-0.5">Esports &amp; Gaming Creative DNA</div>
                  </div>
                  <span class="px-3 py-1 rounded-full bg-[#1d8ff2]/15 border border-[#1d8ff2]/35 text-[11px] font-semibold text-[#60b5ff]">
                    EST. 2020
                  </span>
                </div>

                <div class="space-y-4">
                  <div class="rounded-2xl bg-white/[0.03] border border-white/[0.07] p-4">
                    <div class="text-xs font-semibold text-white">Lahir untuk Ekosistem Esports</div>
                    <p class="text-xs text-white/65 mt-1 leading-relaxed">
                      Fokus membangun karakter visual tim kompetitif, turnamen, store gaming, hingga content creator Indonesia.
                    </p>
                  </div>
                  <div class="rounded-2xl bg-white/[0.03] border border-white/[0.07] p-4">
                    <div class="text-xs font-semibold text-white">Tim Kreatif Gen Z In-House</div>
                    <p class="text-xs text-white/65 mt-1 leading-relaxed">
                      Dikerjakan langsung oleh graphic designer dan logo illustrator muda yang mengikuti tren visual kompetitif masa kini.
                    </p>
                  </div>
                  <div class="rounded-2xl bg-white/[0.03] border border-white/[0.07] p-4">
                    <div class="text-xs font-semibold text-white">7 Kategori Layanan Lengkap</div>
                    <p class="text-xs text-white/65 mt-1 leading-relaxed">
                      Poster, Banner Web, Bumper, Jersey, Mascot Emote, Monogram Logo, hingga Overlay dengan alur order &amp; tracking transparan.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- Scrollable Client Testimonials Section (Adapted to Envy Studio Cobalt-Blue Fluted Aesthetic) -->
      <section id="testimonials-section" class="relative w-full border-t border-white/10 bg-[#03060f]/95 backdrop-blur-md">
        <div class="max-w-[1380px] mx-auto px-5 sm:px-10 py-20 sm:py-24 space-y-12">
          <!-- Top Header Row -->
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
            <h2 class="text-4xl sm:text-5xl lg:text-[54px] font-normal tracking-[-0.03em] leading-[1.08] text-white">
              What Our<br />
              <span class="text-white/55">Clients Say</span>
            </h2>

            <div class="max-w-xs space-y-3">
              <div id="testi-avatars" class="flex items-center -space-x-2.5"></div>
              <p class="text-xs sm:text-[13px] leading-relaxed text-white/60">
                Kami merancang identitas visual yang membantu tim esports, store gaming, dan creator tampil menonjol.
              </p>
            </div>
          </div>

          <!-- Horizontal Sliding Testimonial Cards -->
          <div class="relative overflow-hidden -mx-1 px-1">
            <div id="testi-track" class="flex gap-5 sm:gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-2"></div>
          </div>

          <!-- Bottom Navigation Controls (Prev/Next + Pill Pagination) -->
          <div class="flex items-center justify-between pt-2">
            <div class="flex items-center gap-3">
              <button id="testi-prev" type="button" aria-label="Testimoni sebelumnya"
                class="w-11 h-11 rounded-full bg-[#1d8ff2]/15 border border-[#1d8ff2]/35 text-[#60b5ff] hover:bg-[#1d8ff2] hover:text-white transition flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
              </button>
              <button id="testi-next" type="button" aria-label="Testimoni berikutnya"
                class="w-11 h-11 rounded-full bg-[#1d8ff2]/15 border border-[#1d8ff2]/35 text-[#60b5ff] hover:bg-[#1d8ff2] hover:text-white transition flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
              </button>
            </div>

            <div id="testi-dots" class="flex items-center gap-2"></div>
          </div>

          <!-- Clean Bottom Studio Footer -->
          <div class="mt-10 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/45">
            <div>© 2026 Envy Studio · Creative Design Agency for Esports &amp; Gaming Indonesia</div>
            <div class="flex items-center gap-5">
              <a href="#portfolio-section" class="hover:text-white transition">Portofolio</a>
              <a href="#about-section" class="hover:text-white transition">About Us</a>
              <a href="#testimonials-section" class="hover:text-white transition">Testimoni</a>
              <a href="{{ route('public.order') }}"   class="nav-jump hover:text-white transition">Layanan</a>
              <a href="{{ route('public.track') }}"   class="nav-jump hover:text-white transition">Track Order</a>
            </div>
          </div>
        </div>
      </section>
    
</main>

<!-- Portfolio Lightbox Modal -->
<div id="portfolio-lightbox" class="hidden fixed inset-0 z-50 bg-black/85 backdrop-blur-md flex items-center justify-center p-4 sm:p-8">
  <div class="relative w-full max-w-4xl glass-card rounded-3xl border border-white/15 overflow-hidden bg-[#060b18]">
    <div class="flex items-center justify-between px-6 py-4 border-b border-white/10">
      <div>
        <div id="lb-tag" class="text-[11px] uppercase tracking-[0.18em] text-sky-300 font-semibold"></div>
        <h3 id="lb-title" class="text-base sm:text-lg font-semibold text-white mt-0.5"></h3>
      </div>
      <div class="flex items-center gap-2.5">
        <a href="{{ route('public.order') }}" class="px-4 py-2 rounded-full bg-[#1d8ff2] hover:bg-[#167bd4] text-white text-xs font-semibold transition">
          Pesan Gaya Ini →
        </a>
        <button id="lb-close" type="button" class="w-9 h-9 rounded-full glass-pill text-white/80 hover:text-white flex items-center justify-center">
          <i data-lucide="x" class="w-4 h-4"></i>
        </button>
      </div>
    </div>
    <div class="p-4 sm:p-6 bg-[#03060f] flex items-center justify-center max-h-[75vh]">
      <img id="lb-img" src="" alt="" class="max-h-[68vh] w-auto object-contain rounded-xl" />
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  const $ = (id) => document.getElementById(id);

  const PORTFOLIO_CATEGORIES = [
    { id: 'poster', label: 'POSTER', aspect: 'aspect-[4/5]' },
    { id: 'banner', label: 'BANNER WEB', aspect: 'aspect-[16/9]' },
    { id: 'bumper', label: 'BUMPER', aspect: 'aspect-[16/9]' },
    { id: 'jersey', label: 'JERSEY', aspect: 'aspect-[4/3]' },
    { id: 'mascot', label: 'MASCOT EMOTE', aspect: 'aspect-square' },
    { id: 'logo', label: 'MONOGRAM LOGO', aspect: 'aspect-square' },
    { id: 'overlay', label: 'OVERLAY', aspect: 'aspect-[16/9]' }
  ];

  const PORTFOLIO_ITEMS = [
    // POSTER (3 items)
    { id: 'p1', cat: 'poster', title: 'Offline Stage Antiban', tag: 'Poster', img: "{{ asset('images/portfolio/poster_1.jpg') }}" },
    { id: 'p2', cat: 'poster', title: 'Magical 2-1 Matchday', tag: 'Poster', img: "{{ asset('images/portfolio/poster_4.jpg') }}" },
    { id: 'p3', cat: 'poster', title: 'Promo Imlek Store', tag: 'Poster', img: "{{ asset('images/portfolio/poster_2.jpg') }}" },
    // BANNER WEB (3 items)
    { id: 'b1', cat: 'banner', title: 'Pergam Cruel Shop Banner', tag: 'Banner Web', img: "{{ asset('images/portfolio/banner_1.jpg') }}" },
    { id: 'b2', cat: 'banner', title: 'Joki & Top Up Promo', tag: 'Banner Web', img: "{{ asset('images/portfolio/banner_2.jpg') }}" },
    { id: 'b3', cat: 'banner', title: 'Store Campaign Banner', tag: 'Banner Web', img: "{{ asset('images/portfolio/banner_3.jpg') }}" },
    // BUMPER (3 items)
    { id: 'bm1', cat: 'bumper', title: 'Starting Soon Intro Scene', tag: 'Bumper', img: "{{ asset('images/portfolio/bumper_1.jpg') }}" },
    { id: 'bm2', cat: 'bumper', title: 'Motion Transition Frame', tag: 'Bumper', img: "{{ asset('images/portfolio/bumper_2.jpg') }}" },
    { id: 'bm3', cat: 'bumper', title: 'Esports Bumper Title', tag: 'Bumper', img: "{{ asset('images/portfolio/bumper_3.jpg') }}" },
    // JERSEY (3 items)
    { id: 'j1', cat: 'jersey', title: 'Pro Team Jersey Kit 01', tag: 'Jersey', img: "{{ asset('images/portfolio/jersey_1.jpg') }}" },
    { id: 'j2', cat: 'jersey', title: 'Esports Division Jersey 02', tag: 'Jersey', img: "{{ asset('images/portfolio/jersey_2.jpg') }}" },
    { id: 'j3', cat: 'jersey', title: 'Custom Tournament Jersey 03', tag: 'Jersey', img: "{{ asset('images/portfolio/jersey_3.jpg') }}" },
    // MASCOT EMOTE (3 items)
    { id: 'm1', cat: 'mascot', title: 'Custom Mascot Character 01', tag: 'Mascot Emote', img: "{{ asset('images/portfolio/mascot_1.jpg') }}" },
    { id: 'm2', cat: 'mascot', title: 'Streamer Emote Pack 02', tag: 'Mascot Emote', img: "{{ asset('images/portfolio/mascot_2.jpg') }}" },
    { id: 'm3', cat: 'mascot', title: 'Gaming Mascot Badge 03', tag: 'Mascot Emote', img: "{{ asset('images/portfolio/mascot_3.jpg') }}" },
    // MONOGRAM LOGO (3 items)
    { id: 'l1', cat: 'logo', title: 'Esports Monogram Mark 01', tag: 'Monogram Logo', img: "{{ asset('images/portfolio/logo_1.jpg') }}" },
    { id: 'l2', cat: 'logo', title: 'Squad Monogram Emblem 02', tag: 'Monogram Logo', img: "{{ asset('images/portfolio/logo_2.jpg') }}" },
    { id: 'l3', cat: 'logo', title: 'Minimalist Gaming Mark 03', tag: 'Monogram Logo', img: "{{ asset('images/portfolio/logo_3.jpg') }}" },
    // OVERLAY (3 items)
    { id: 'o1', cat: 'overlay', title: 'Tournament Broadcast HUD', tag: 'Overlay', img: "{{ asset('images/portfolio/overlay_1.jpg') }}" },
    { id: 'o2', cat: 'overlay', title: 'Live Stream Frame Pack 02', tag: 'Overlay', img: "{{ asset('images/portfolio/overlay_2.jpg') }}" },
    { id: 'o3', cat: 'overlay', title: 'Esports Stream Overlay 03', tag: 'Overlay', img: "{{ asset('images/portfolio/overlay_3.jpg') }}" }
  ];

  let activeCat = 'poster';

  function renderPortfolio() {
    const bar = $('portfolio-filter-bar');
    const grid = $('portfolio-grid');
    if (!bar || !grid) return;

    bar.innerHTML = PORTFOLIO_CATEGORIES.map((c) => {
      const active = c.id === activeCat;
      return `
        <button type="button" data-pf-cat="${c.id}"
          class="px-5 py-2.5 rounded-full text-[11px] sm:text-xs font-semibold uppercase tracking-[0.14em] transition ${
            active
              ? 'bg-[#1266E3] text-white shadow-[0_0_24px_rgba(18,102,227,0.55)] border border-blue-400/60'
              : 'bg-[#080B14]/80 text-white/55 border border-white/15 hover:text-white hover:border-white/35'
          }">
          ${c.label}
        </button>
      `;
    }).join('');

    const activeCatObj = PORTFOLIO_CATEGORIES.find((c) => c.id === activeCat) || PORTFOLIO_CATEGORIES[0];
    const items = PORTFOLIO_ITEMS.filter((it) => it.cat === activeCat);

    grid.innerHTML = items.map((it) => `
      <button type="button" data-pf-open="${it.id}"
        class="group glass-card rounded-3xl overflow-hidden text-left transition hover:border-blue-400/50 hover:-translate-y-1 flex flex-col">
        <div class="w-full ${activeCatObj.aspect} bg-[#060913] overflow-hidden flex items-center justify-center p-2">
          <img src="${it.img}" alt="${it.title}" loading="lazy" class="w-full h-full object-contain rounded-2xl transition duration-500 group-hover:scale-[1.03]" />
        </div>
        <div class="px-5 py-4 flex items-center justify-between gap-3 border-t border-white/10">
          <div>
            <div class="text-sm font-semibold text-white">${it.title}</div>
            <div class="text-[11px] text-sky-300/80 mt-0.5">${it.tag}</div>
          </div>
          <span class="w-8 h-8 rounded-full bg-white/10 group-hover:bg-[#1266E3] text-white flex items-center justify-center transition shrink-0">
            <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
          </span>
        </div>
      </button>
    `).join('');

    if (window.lucide) lucide.createIcons();
  }

  $('portfolio-filter-bar')?.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-pf-cat]');
    if (!btn) return;
    activeCat = btn.dataset.pfCat;
    renderPortfolio();
  });

  $('portfolio-grid')?.addEventListener('click', (e) => {
    const card = e.target.closest('[data-pf-open]');
    if (!card) return;
    const item = PORTFOLIO_ITEMS.find((x) => x.id === card.dataset.pfOpen);
    if (!item) return;
    $('lb-img').src = item.img;
    $('lb-img').alt = item.title;
    $('lb-title').textContent = item.title;
    $('lb-tag').textContent = item.tag;
    $('portfolio-lightbox').classList.remove('hidden');
  });

  $('lb-close')?.addEventListener('click', () => $('portfolio-lightbox').classList.add('hidden'));
  $('portfolio-lightbox')?.addEventListener('click', (e) => {
    if (e.target.id === 'portfolio-lightbox') $('portfolio-lightbox').classList.add('hidden');
  });

  // Hero buttons navigation
  document.getElementById('hero-cta-order')?.addEventListener('click', () => {
    window.location.href = "{{ route('public.order') }}";
  });
  document.getElementById('bento-showcase-btn')?.addEventListener('click', () => {
    document.getElementById('portfolio-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
  document.getElementById('bento-workspace-btn')?.addEventListener('click', () => {
    window.location.href = "{{ auth()->check() ? (auth()->user()->isOwner() ? route('dashboard.owner') : route('dashboard.desainer')) : route('login') }}";
  });

  // General Client Testimonials Slider
  const TESTIMONIALS = [
    {
      initials: "LH",
      quote: "Punya identitas visual yang unik sekarang jadi lebih mudah berkat tim Envy Studio. Recommended banget buat yang mau serius di esports!",
      client: "LETDA HYPER",
      role: "ESPORTS TEAM · INDONESIA",
      rating: "5.0",
      accent: "from-[#1d8ff2] to-[#0b3ea8]"
    },
    {
      initials: "SB",
      quote: "Sebagai komunitas guild yang pernah menggunakan jasa Envy Studio, kami merasa feed sosial media kami menjadi naik kelas. Jadi udah kayak standar tim esports di luar sana.",
      client: "SABEEQ",
      role: "GUILD COMMUNITY · GAMING",
      rating: "4.9",
      accent: "from-[#38bdf8] to-[#1256d6]"
    },
    {
      initials: "AL",
      quote: "Desain dari Envy Studio beneran level up banget. Proses komunikasi lancar, hasil memuaskan, dan timnya sigap. Bakal balik lagi buat project berikutnya!",
      client: "ALDITV",
      role: "CONTENT CREATOR · STREAMING",
      rating: "5.0",
      accent: "from-[#2563eb] to-[#0ea5e9]"
    }
  ];

  let activeTestiIdx = 0;

  function renderTestimonials() {
    const avatarsEl = $('testi-avatars');
    const trackEl = $('testi-track');
    if (!avatarsEl || !trackEl) return;

    avatarsEl.innerHTML = TESTIMONIALS.map((t) => `
      <div class="w-9 h-9 rounded-full border-2 border-[#03060f] bg-gradient-to-br ${t.accent} shadow-md flex items-center justify-center text-[11px] font-bold tracking-wider text-white">
        ${t.initials}
      </div>
    `).join('');

    trackEl.innerHTML = TESTIMONIALS.map((t, idx) => `
      <article data-testi-idx="${idx}" class="testi-card snap-start shrink-0 w-[88%] sm:w-[490px] lg:w-[540px] rounded-[24px] p-6 sm:p-7 flex flex-col justify-between gap-7">
        <div class="flex flex-col sm:flex-row items-start gap-5 sm:gap-6">
          <div class="relative w-28 h-28 sm:w-36 sm:h-36 rounded-2xl overflow-hidden shrink-0 border border-white/15 bg-gradient-to-br ${t.accent} flex items-center justify-center shadow-inner">
            <div class="absolute inset-0 bg-[#04091a]/35"></div>
            <span class="relative z-10 text-3xl sm:text-4xl font-bold tracking-[-0.04em] text-white drop-shadow-[0_4px_18px_rgba(0,0,0,0.45)]">${t.initials}</span>
            <div class="testi-fluted-half absolute inset-y-0 right-0 w-1/2 pointer-events-none border-l border-white/20"></div>
          </div>
          <p class="text-sm sm:text-[15px] leading-relaxed text-white/85 pt-1">&ldquo;${t.quote}&rdquo;</p>
        </div>
        <div class="flex items-end justify-between gap-4 pt-1">
          <div>
            <div class="text-sm sm:text-base font-semibold text-white tracking-wide">${t.client}</div>
            <div class="text-[10px] sm:text-[11px] uppercase tracking-[0.14em] text-white/75 mt-0.5">${t.role}</div>
          </div>
          <span class="inline-flex items-center gap-1 px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md border border-white/25 text-xs font-semibold text-white">
            ${t.rating}<span class="text-[11px]">★</span>
          </span>
        </div>
      </article>
    `).join('');

    updateTestiDots();
  }

  function updateTestiDots() {
    const dotsEl = $('testi-dots');
    if (!dotsEl) return;
    dotsEl.innerHTML = TESTIMONIALS.map((_, idx) => `
      <button type="button" data-testi-dot="${idx}" aria-label="Slide ${idx + 1}"
        class="h-2 rounded-full transition-all duration-300 ${idx === activeTestiIdx ? 'w-7 bg-[#1d8ff2]' : 'w-2 bg-white/25 hover:bg-white/45'}"></button>
    `).join('');
  }

  function scrollToTesti(idx) {
    const trackEl = $('testi-track');
    if (!trackEl) return;
    activeTestiIdx = (idx + TESTIMONIALS.length) % TESTIMONIALS.length;
    const card = trackEl.querySelector(`[data-testi-idx="${activeTestiIdx}"]`);
    if (card) trackEl.scrollTo({ left: card.offsetLeft - trackEl.offsetLeft, behavior: 'smooth' });
    updateTestiDots();
  }

  $('testi-prev')?.addEventListener('click', () => scrollToTesti(activeTestiIdx - 1));
  $('testi-next')?.addEventListener('click', () => scrollToTesti(activeTestiIdx + 1));
  $('testi-dots')?.addEventListener('click', (e) => {
    const dot = e.target.closest('[data-testi-dot]');
    if (dot) scrollToTesti(Number(dot.dataset.testiDot));
  });

  renderPortfolio();
  renderTestimonials();
</script>
@endpush
