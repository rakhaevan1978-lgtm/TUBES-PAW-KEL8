@extends('layouts.app')

@section('title', 'Dashboard Desainer — Envy Studio')

@section('content')
<div class="space-y-6">
  <div>
    <span class="inline-block px-3 py-1 rounded-full glass-pill text-[11px] text-sky-300 mb-2">Wadah Peran 6 · Farrel (/desainer/dashboard)</span>
    <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Dashboard Desainer</h1>
    <p class="text-sm text-white/65 mt-1">Wadah ringkasan progres tugas dan tenggat desain untuk Desainer yang sedang login.</p>
  </div>

  <div class="glass-card rounded-3xl p-6 sm:p-8 border border-white/15 space-y-4">
    <div class="text-xs uppercase tracking-[0.18em] text-sky-300 font-semibold">Instruksi Penanggung Jawab Modul</div>
    <ul class="space-y-2.5 text-sm text-white/80 list-disc list-inside leading-relaxed">
      <li>Tampilkan ringkasan jumlah tugas aktif, antrian revisi, dan pekerjaan selesai milik desainer aktif.</li>
      <li>Ambil data dinamis berdasarkan auth()->id() setelah tabel orders dan revisions tersedia.</li>
    </ul>
    <div class="pt-4 border-t border-white/10 text-xs text-white/50 font-mono">
      Wadah siap diisi oleh penanggung jawab modul.
    </div>
  </div>
</div>
@endsection
