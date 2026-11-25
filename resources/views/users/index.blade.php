@extends('layouts.app')

@section('title', 'Kelola Pengguna & Desainer — Envy Studio')

@section('content')
<div class="space-y-6">
  <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
    <div>
      <span class="inline-block px-3 py-1 rounded-full glass-pill text-[11px] text-sky-300 mb-2">Peran 1 · Evan (KF-15 · Aktif)</span>
      <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Kelola Pengguna &amp; Desainer</h1>
      <p class="text-sm text-white/65 mt-1">Kelola akun Owner dan Desainer beserta spesialisasi gaya desain dan status keaktifan.</p>
    </div>
    <a href="{{ route('users.create') }}" class="px-5 py-2.5 rounded-full bg-[#1d8ff2] hover:bg-[#167bd4] text-white text-xs sm:text-sm font-semibold transition shadow-lg shadow-blue-500/20 self-start">
      + Tambah Pengguna
    </a>
  </div>

  <!-- Search & Filter Bar -->
  <form method="GET" action="{{ route('users.index') }}" class="glass-card rounded-2xl p-4 border border-white/10 grid grid-cols-1 sm:grid-cols-4 gap-3">
    <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama, email, atau spesialisasi..."
      class="sm:col-span-2 rounded-xl bg-white/5 border border-white/15 px-3.5 py-2 text-xs sm:text-sm text-white placeholder-white/40 focus:outline-none focus:border-sky-400" />
    <select name="role" class="rounded-xl bg-[#0a1328] border border-white/15 px-3 py-2 text-xs sm:text-sm text-white focus:outline-none focus:border-sky-400">
      <option value="all" @selected($role === 'all')>Semua Role</option>
      <option value="owner" @selected($role === 'owner')>Owner</option>
      <option value="desainer" @selected($role === 'desainer')>Desainer</option>
    </select>
    <div class="flex gap-2">
      <select name="status" class="flex-1 rounded-xl bg-[#0a1328] border border-white/15 px-3 py-2 text-xs sm:text-sm text-white focus:outline-none focus:border-sky-400">
        <option value="all" @selected($status === 'all')>Semua Status</option>
        <option value="aktif" @selected($status === 'aktif')>Aktif</option>
        <option value="nonaktif" @selected($status === 'nonaktif')>Nonaktif</option>
      </select>
      <button type="submit" class="px-4 py-2 rounded-xl bg-white/15 hover:bg-white/25 text-xs font-semibold text-white transition">Filter</button>
    </div>
  </form>

  <!-- Users Table -->
  <div class="glass-card rounded-3xl border border-white/10 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs sm:text-sm">
        <thead class="bg-white/5 border-b border-white/10 text-[11px] uppercase tracking-wider text-white/60">
          <tr>
            <th class="px-5 py-3.5">Pengguna</th>
            <th class="px-5 py-3.5">Role</th>
            <th class="px-5 py-3.5">Spesialisasi Desain</th>
            <th class="px-5 py-3.5">Pemantauan Order</th>
            <th class="px-5 py-3.5">Status</th>
            <th class="px-5 py-3.5 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10">
          @forelse($users as $u)
            <tr class="hover:bg-white/[0.03] transition">
              <td class="px-5 py-4">
                <div class="font-semibold text-white">{{ $u->name }}</div>
                <div class="text-xs text-white/55">{{ $u->email }}</div>
              </td>
              <td class="px-5 py-4">
                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold uppercase {{ $u->isOwner() ? 'bg-blue-500/20 text-sky-200 border border-blue-400/35' : 'bg-indigo-500/20 text-indigo-200 border border-indigo-400/35' }}">
                  {{ $u->role }}
                </span>
              </td>
              <td class="px-5 py-4 text-xs text-white/75">
                {{ is_array($u->style_specializations) ? (count($u->style_specializations) ? implode(', ', $u->style_specializations) : '—') : ($u->style_specializations ?: '—') }}
              </td>
              <td class="px-5 py-4 text-xs">
                @if($u->isOwner())
                  <span class="text-white/45">Koordinator Studio</span>
                @elseif(!$hasOrdersTable)
                  <span class="text-white/45 italic">Menunggu tabel orders (Peran 2/3)</span>
                @else
                  <span class="text-sky-300 font-medium">{{ $u->active_orders_count ?? 0 }} aktif</span>
                  <span class="text-white/35 mx-1">·</span>
                  <span class="text-emerald-300">{{ $u->completed_orders_count ?? 0 }} selesai</span>
                @endif
              </td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-medium {{ $u->is_active ? 'bg-emerald-500/15 text-emerald-300 border border-emerald-400/30' : 'bg-rose-500/15 text-rose-300 border border-rose-400/30' }}">
                  <span class="w-1.5 h-1.5 rounded-full {{ $u->is_active ? 'bg-emerald-400' : 'bg-rose-400' }}"></span>
                  {{ $u->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
              </td>
              <td class="px-5 py-4 text-right whitespace-nowrap space-x-1.5">
                <a href="{{ route('users.edit', $u) }}" class="inline-block px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-xs text-white transition">Edit</a>
                @if(auth()->id() !== $u->id)
                  <form method="POST" action="{{ route('users.toggle-status', $u) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-amber-500/15 hover:bg-amber-500/25 border border-amber-400/30 text-xs text-amber-200 transition">
                      {{ $u->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                    </button>
                  </form>
                  <form method="POST" action="{{ route('users.destroy', $u) }}" class="inline" onsubmit="return confirm('Hapus akun {{ $u->name }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/15 hover:bg-rose-500/25 border border-rose-400/30 text-xs text-rose-200 transition">Hapus</button>
                  </form>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-5 py-10 text-center text-white/55">Belum ada pengguna yang cocok dengan filter.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
