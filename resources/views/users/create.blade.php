@extends('layouts.app')

@section('title', 'Tambah Pengguna — Envy Studio')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-semibold">Tambah Pengguna Baru</h1>
    <a href="{{ route('users.index') }}" class="px-4 py-2 rounded-full glass-pill text-xs text-white/80 hover:text-white">← Kembali</a>
  </div>

  <form method="POST" action="{{ route('users.store') }}" class="glass-card rounded-3xl p-6 sm:p-8 border border-white/15 space-y-6">
    @csrf
    @include('users._form')
    <div class="flex justify-end gap-3 pt-2">
      <a href="{{ route('users.index') }}" class="px-5 py-2.5 rounded-full glass-pill text-xs font-medium text-white/80">Batal</a>
      <button type="submit" class="px-6 py-2.5 rounded-full bg-[#1d8ff2] hover:bg-[#167bd4] text-white text-xs sm:text-sm font-semibold transition">Simpan Pengguna</button>
    </div>
  </form>
</div>
@endsection
