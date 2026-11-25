<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Envy Studio — Creative Esports & Gaming Design Agency')</title>
  <link rel="icon" type="image/png" href="{{ asset('images/envy-logo.png') }}" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            envyAccent: '#1266E3',
            envyBright: '#2B83FF',
          }
        }
      }
    };
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
body { font-family: 'Inter', system-ui, sans-serif; }

    /* Vertical Fluted Glass Background (exact ribbed glass effect from reference, tuned to Envy Studio Cobalt Blue) */
    .fluted-stage {
      position: relative;
      background-color: #050811;
      background-image:
        radial-gradient(ellipse 75% 90% at 82% 48%, rgba(0, 102, 255, 0.92) 0%, rgba(0, 62, 210, 0.72) 38%, rgba(4, 18, 68, 0.52) 68%, rgba(5, 8, 17, 0.98) 100%),
        radial-gradient(ellipse 50% 60% at 62% 20%, rgba(56, 152, 255, 0.55) 0%, transparent 70%);
    }
    .fluted-ribs {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 1;
      background-image: repeating-linear-gradient(
        90deg,
        rgba(255, 255, 255, 0.08) 0px,
        rgba(255, 255, 255, 0.02) 6px,
        rgba(0, 0, 0, 0.34) 18px,
        rgba(0, 0, 0, 0.42) 24px,
        rgba(255, 255, 255, 0.05) 30px
      );
      mix-blend-mode: overlay;
    }
    .hero-headline-fade {
      background: linear-gradient(90deg, #FFFFFF 0%, #FFFFFF 76%, rgba(255, 255, 255, 0.25) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .hero-portrait-mask {
      -webkit-mask-image:
        linear-gradient(90deg, transparent 0%, rgba(0,0,0,0.75) 24%, #000 48%, #000 100%),
        linear-gradient(180deg, transparent 0%, #000 14%, #000 84%, transparent 100%);
      -webkit-mask-composite: source-in;
      mask-image:
        linear-gradient(90deg, transparent 0%, rgba(0,0,0,0.75) 24%, #000 48%, #000 100%),
        linear-gradient(180deg, transparent 0%, #000 14%, #000 84%, transparent 100%);
      mask-composite: intersect;
    }
    .glass-pill {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.18);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
    }
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.16);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
    }
    .pill-chk input:checked + span {
      background-color: #0055FF;
      color: #FFFFFF;
      border-color: #2979FF;
    }

    .testi-card {
      background:
        radial-gradient(circle at 86% 96%, rgba(29, 143, 242, 0.90) 0%, rgba(18, 92, 224, 0.48) 38%, rgba(6, 12, 30, 0.96) 76%),
        #050914;
      border: 1px solid rgba(96, 165, 250, 0.18);
      box-shadow: 0 22px 48px rgba(2, 6, 23, 0.55);
    }
    .testi-fluted-half {
      background-image: repeating-linear-gradient(
        90deg,
        rgba(255, 255, 255, 0.16) 0px,
        rgba(255, 255, 255, 0.04) 2px,
        rgba(3, 8, 22, 0.34) 4px,
        rgba(56, 189, 248, 0.12) 6px
      );
      backdrop-filter: blur(2.5px);
      -webkit-backdrop-filter: blur(2.5px);
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="fluted-stage text-white antialiased min-h-screen flex flex-col selection:bg-blue-500/40 selection:text-white">
  <div class="fluted-ribs" aria-hidden="true"></div>
  <div class="relative z-10 flex-1 flex flex-col">
    @php
      $workspaceUrl = auth()->check()
        ? (auth()->user()->isOwner() ? route('dashboard.owner') : route('dashboard.desainer'))
        : route('login');
      $isHome = request()->routeIs('home');
    @endphp

    <!-- Floating Top Navigation -->
    <header class="w-full max-w-[1380px] mx-auto px-5 sm:px-10 pt-6 pb-4 flex flex-col xl:flex-row items-center justify-between gap-4">
      <!-- Left: Glass Pill Nav -->
      <nav class="glass-pill rounded-full p-1 flex flex-wrap xl:flex-nowrap items-center justify-center gap-0.5 text-xs sm:text-[13px] font-normal order-2 xl:order-1">
        <a href="{{ route('home') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition {{ $isHome ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Home</a>
        <a href="{{ route('home') }}#portfolio-section" class="px-3 py-1.5 rounded-full whitespace-nowrap text-white/75 hover:text-white transition">Portofolio</a>
        <a href="{{ route('home') }}#about-section" class="px-3 py-1.5 rounded-full whitespace-nowrap text-white/75 hover:text-white transition">About Us</a>
        <a href="{{ route('home') }}#testimonials-section" class="px-3 py-1.5 rounded-full whitespace-nowrap text-white/75 hover:text-white transition">Testimoni</a>
        <a href="{{ route('public.order') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition {{ request()->routeIs('public.order') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Layanan</a>
        <a href="{{ route('public.track') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition {{ request()->routeIs('public.track') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Track Order</a>
        <a href="{{ $workspaceUrl }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition {{ request()->routeIs('login') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Workspace</a>
      </nav>

      <!-- Center: Envy Studio Full Wordmark Logo (LOGO 4.png) -->
      <a href="{{ route('home') }}" class="flex items-center justify-center order-1 xl:order-2 shrink-0 group" aria-label="Envy Studio Home">
        <img src="{{ asset('images/envy-logo-full.png') }}" alt="Envy Studio" class="h-7 sm:h-8 w-auto object-contain drop-shadow-[0_4px_14px_rgba(0,85,255,0.45)] group-hover:scale-[1.03] transition" />
      </a>

      <!-- Right: Direct Contact Icons (WhatsApp, Instagram) & Login -->
      <div class="flex items-center gap-2 order-3 shrink-0">
        <a href="https://wa.me/6281528535041?text=Halo%20Envy%20Studio,%20saya%20ingin%20tanya%20mengenai%20order%20desain." target="_blank" rel="noopener noreferrer"
          title="WhatsApp Envy Studio (+62 815-2853-5041)" aria-label="WhatsApp Envy Studio"
          class="w-9 h-9 rounded-full bg-white text-slate-950 hover:bg-emerald-400 hover:text-slate-950 flex items-center justify-center transition shadow-md">
          <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current" aria-hidden="true"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm5.82 14.08c-.24.68-1.42 1.3-1.97 1.38-.51.08-1.15.11-1.86-.12-.43-.14-.99-.32-1.7-.63-2.99-1.29-4.94-4.31-5.09-4.51-.15-.2-1.21-1.61-1.21-3.07s.77-2.18 1.04-2.48c.27-.3.59-.37.79-.37.2 0 .4 0 .57.01.18.01.43-.07.67.51.24.59.84 2.04.91 2.19.07.15.12.32.02.52-.1.2-.15.32-.3.5-.15.17-.31.39-.45.52-.15.15-.3.31-.13.61.17.3.77 1.27 1.66 2.06 1.14 1.01 2.1 1.33 2.4 1.48.3.15.47.12.65-.07.17-.2.74-.86.94-1.16.2-.3.4-.25.67-.15.27.1 1.73.82 2.03.97.3.15.5.22.57.35.07.12.07.72-.17 1.4z"/></svg>
        </a>
        <a href="https://www.instagram.com/envy.std/" target="_blank" rel="noopener noreferrer"
          title="Instagram @envy.std" aria-label="Instagram Envy Studio"
          class="w-9 h-9 rounded-full glass-pill text-white hover:bg-white/20 flex items-center justify-center transition">
          <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
        </a>
        <a href="{{ $workspaceUrl }}" title="{{ auth()->check() ? 'Buka Workspace' : 'Login Owner / Desainer' }}" aria-label="Login Tim"
          class="w-9 h-9 rounded-full glass-pill text-white hover:bg-white/20 flex items-center justify-center transition">
          <i data-lucide="user" class="w-4 h-4"></i>
        </a>
      </div>
    </header>

    @yield('content')
  </div>

  <script>
    if (window.lucide) lucide.createIcons();
  </script>
  @stack('scripts')
</body>
</html>
