@extends('layouts.public')

@section('title', 'Layanan & Form Order — Envy Studio')

@section('content')
<main class="flex-1 w-full max-w-5xl mx-auto px-5 sm:px-10 py-10 space-y-6">
  <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
    <div>
      <span class="inline-block px-3 py-1 rounded-full glass-pill text-[11px] text-sky-300 mb-2">Wadah Peran 2 · Raditya (/order)</span>
      <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight">Layanan &amp; Form Order</h1>
      <p class="text-sm text-white/70 mt-1">Halaman publik tanpa login untuk memilih layanan desain dan mengirimkan brief order.</p>
    </div>
    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full glass-pill text-xs font-medium hover:bg-white/15 self-start">← Kembali ke Home</a>
  </div>

  <div class="glass-card rounded-3xl p-6 sm:p-8 border border-white/15 space-y-4">
    <h2 class="text-lg font-semibold text-white">Instruksi Integrasi Modul — Peran 2 (Raditya)</h2>
    <ul class="space-y-2 text-sm text-white/75 list-disc list-inside">
      <li>Tambahkan katalog layanan dinamis dari tabel <code class="text-sky-300">services</code> (KF-03).</li>
      <li>Implementasikan form input order &amp; brief klien tanpa login beserta pembuatan Order ID otomatis (KF-04).</li>
      <li>Hubungkan ke route POST <code class="text-sky-300">/order</code> melalui <code class="text-sky-300">OrderController</code>.</li>
    </ul>
  </div>
</main>
@endsection
