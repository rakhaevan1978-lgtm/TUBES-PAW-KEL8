@extends('layouts.public')

@section('title', 'Track Order — Envy Studio')

@section('content')
<main class="flex-1 w-full max-w-4xl mx-auto px-5 sm:px-10 py-10 space-y-6">
  <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
    <div>
      <span class="inline-block px-3 py-1 rounded-full glass-pill text-[11px] text-sky-300 mb-2">Wadah Peran 5 · Toha (/track)</span>
      <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight">Track Order &amp; Revisi Klien</h1>
      <p class="text-sm text-white/70 mt-1">Klien dapat memantau progres desain tanpa login menggunakan Order ID dan nomor WhatsApp.</p>
    </div>
    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full glass-pill text-xs font-medium hover:bg-white/15 self-start">← Kembali ke Home</a>
  </div>

  <div class="glass-card rounded-3xl p-6 sm:p-8 border border-white/15 space-y-4">
    <h2 class="text-lg font-semibold text-white">Instruksi Integrasi Modul — Peran 5 (Toha)</h2>
    <ul class="space-y-2 text-sm text-white/75 list-disc list-inside">
      <li>Implementasikan pencarian status order berbasis <code class="text-sky-300">order_code</code> dan nomor WhatsApp klien (KF-12).</li>
      <li>Tampilkan timeline tahapan pengerjaan serta form pengajuan catatan revisi klien (KF-13).</li>
    </ul>
  </div>
</main>
@endsection
