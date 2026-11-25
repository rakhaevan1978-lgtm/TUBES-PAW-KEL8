@extends('layouts.app')

@section('title', 'Laporan Bulanan — Envy Studio')

@section('content')
<div class="space-y-6">
  <div>
    <span class="inline-block px-3 py-1 rounded-full glass-pill text-[11px] text-sky-300 mb-2">Wadah Peran 6 · Farrel (/owner/laporan)</span>
    <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Laporan Operasional & Keuangan</h1>
    <p class="text-sm text-white/65 mt-1">Wadah rekap laporan bulanan Envy Studio.</p>
  </div>

  <div class="glass-card rounded-3xl p-6 sm:p-8 border border-white/15 space-y-4">
    <div class="text-xs uppercase tracking-[0.18em] text-sky-300 font-semibold">Instruksi Penanggung Jawab Modul</div>
    <ul class="space-y-2.5 text-sm text-white/80 list-disc list-inside leading-relaxed">
      <li>Implementasikan filter periode bulanan untuk rekap total order, pendapatan, dan performa desainer (KF-14).</li>
      <li>Tambahkan tombol ekspor laporan (PDF/CSV) sesuai kebutuhan evaluasi studio.</li>
    </ul>
    <div class="pt-4 border-t border-white/10 text-xs text-white/50 font-mono">
      Wadah siap diisi oleh penanggung jawab modul.
    </div>
  </div>
</div>
@endsection
