<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Workspace — Envy Studio')</title>
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
<body class="fluted-stage text-white antialiased min-h-screen flex flex-col">
  <div class="fluted-ribs" aria-hidden="true"></div>
  <div class="relative z-10 flex-1 flex flex-col">
    @php
      $user = auth()->user();
      $isOwner = $user && $user->isOwner();
    @endphp

    <!-- Workspace Top Bar -->
    <header class="w-full max-w-[1380px] mx-auto px-5 sm:px-10 pt-6 pb-4 flex flex-col lg:flex-row items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <a href="{{ route('home') }}" class="flex items-center gap-2 group" title="Kembali ke Beranda Publik">
          <img src="{{ asset('images/envy-logo-full.png') }}" alt="Envy Studio" class="h-7 w-auto object-contain" />
        </a>
        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold uppercase tracking-wider {{ $isOwner ? 'bg-blue-500/25 text-sky-200 border border-blue-400/40' : 'bg-emerald-500/20 text-emerald-200 border border-emerald-400/35' }}">
          {{ $isOwner ? 'Owner' : 'Desainer' }}
        </span>
      </div>

      <!-- Role-Aware Workspace Nav Pills -->
      <nav class="glass-pill rounded-full p-1 flex flex-wrap items-center justify-center gap-0.5 text-xs sm:text-[13px]">
        @if($isOwner)
          <a href="{{ route('dashboard.owner') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('dashboard.owner') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Dashboard</a>
          <a href="{{ route('orders.index') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('orders.*') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Data Order</a>
          <a href="{{ route('assignments.index') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('assignments.*') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Penugasan</a>
          <a href="{{ route('payments.index') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('payments.*') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Pembayaran</a>
          <a href="{{ route('owner.revisions') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('owner.revisions') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Revisi Klien</a>
          <a href="{{ route('reports.index') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('reports.*') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Laporan</a>
          <a href="{{ route('users.index') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('users.*') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Pengguna</a>
        @else
          <a href="{{ route('dashboard.desainer') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('dashboard.desainer') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Dashboard</a>
          <a href="{{ route('desainer.tasks') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('desainer.tasks') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Tugas Saya</a>
          <a href="{{ route('desainer.revisions') }}" class="px-3 py-1.5 rounded-full transition {{ request()->routeIs('desainer.revisions') ? 'bg-white/15 text-white font-medium' : 'text-white/75 hover:text-white' }}">Revisi Klien</a>
        @endif
      </nav>

      <!-- User Info & Logout -->
      <div class="flex items-center gap-2.5 text-xs">
        <a href="{{ route('home') }}" class="px-3 py-1.5 rounded-full glass-pill text-white/80 hover:text-white transition">Beranda</a>
        <div class="hidden sm:block text-right">
          <div class="font-medium text-white leading-tight">{{ $user->name }}</div>
          <div class="text-[11px] text-white/55">{{ $user->email }}</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="px-3.5 py-1.5 rounded-full bg-rose-500/20 border border-rose-400/40 text-rose-200 hover:bg-rose-500/35 transition font-medium">
            Logout
          </button>
        </form>
      </div>
    </header>

    <main class="flex-1 w-full max-w-[1380px] mx-auto px-5 sm:px-10 py-6 space-y-6">
      @if(session('success'))
        <div class="rounded-2xl bg-emerald-500/15 border border-emerald-400/35 px-4 py-3 text-sm text-emerald-200 flex items-center gap-2.5">
          <i data-lucide="check-circle-2" class="w-4 h-4 shrink-0"></i>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      @if(session('error'))
        <div class="rounded-2xl bg-rose-500/15 border border-rose-400/35 px-4 py-3 text-sm text-rose-200 flex items-center gap-2.5">
          <i data-lucide="alert-circle" class="w-4 h-4 shrink-0"></i>
          <span>{{ session('error') }}</span>
        </div>
      @endif

      @yield('content')
    </main>
  </div>

  <script>
    if (window.lucide) lucide.createIcons();
  </script>
  @stack('scripts')
</body>
</html>
