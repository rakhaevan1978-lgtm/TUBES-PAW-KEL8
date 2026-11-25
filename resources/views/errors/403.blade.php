@extends('layouts.public')

@section('title', '403 — Akses Ditolak | Envy Studio')

@section('content')
<main class="flex-1 w-full max-w-lg mx-auto px-5 py-20 flex items-center">
  <div class="w-full glass-card rounded-3xl p-8 border border-white/15 text-center space-y-5">
    <div class="text-5xl font-bold text-[#1d8ff2]">403</div>
    <h1 class="text-2xl font-semibold">Akses Ditolak</h1>
    <p class="text-sm text-white/70">Role akun kamu tidak memiliki izin untuk membuka halaman ini.</p>
    <div class="flex justify-center gap-3 pt-2">
      <a href="{{ route('home') }}" class="px-5 py-2.5 rounded-full glass-pill text-xs font-medium hover:bg-white/15">Ke Beranda</a>
      @auth
        <a href="{{ auth()->user()->isOwner() ? route('dashboard.owner') : route('dashboard.desainer') }}" class="px-5 py-2.5 rounded-full bg-[#1d8ff2] hover:bg-[#167bd4] text-xs font-semibold">Ke Workspace Saya</a>
      @endauth
    </div>
  </div>
</main>
@endsection
