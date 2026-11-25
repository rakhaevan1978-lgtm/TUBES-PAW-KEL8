@extends('layouts.app')

@section('title', 'Revisi Klien (Owner) — Envy Studio')

@section('content')
<div class="space-y-6">
  <div>
    <span class="inline-block px-3 py-1 rounded-full glass-pill text-[11px] text-sky-300 mb-2">Wadah Peran 5 · Toha (/owner/revisi)</span>
    <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Revisi Klien — Panel Owner</h1>
    <p class="text-sm text-white/65 mt-1">Wadah pemantauan seluruh permintaan revisi klien oleh Owner.</p>
  </div>

  <div class="glass-card rounded-3xl p-6 sm:p-8 border border-white/15 space-y-4">
    <div class="text-xs uppercase tracking-[0.18em] text-sky-300 font-semibold">Instruksi Penanggung Jawab Modul</div>
    <ul class="space-y-2.5 text-sm text-white/80 list-disc list-inside leading-relaxed">
      <li>Tampilkan daftar revisi masuk dari seluruh order agar Owner dapat memantau progres tindak lanjut desainer (KF-13).</li>
      <li>Sediakan filter status revisi (Menunggu, Diproses, Selesai) serta tautan ke detail order terkait.</li>
    </ul>
    <div class="pt-4 border-t border-white/10 text-xs text-white/50 font-mono">
      Wadah siap diisi oleh penanggung jawab modul.
    </div>
  </div>
</div>
@endsection
