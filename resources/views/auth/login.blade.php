@extends('layouts.public')

@section('title', 'Login Tim — Envy Studio')

@section('content')
<main class="flex-1 w-full max-w-md mx-auto px-5 py-12 flex items-center">
  <div class="w-full glass-card rounded-3xl p-7 sm:p-8 border border-white/15 space-y-6">
    <div class="text-center space-y-2">
      <span class="inline-block px-3 py-1 rounded-full glass-pill text-[11px] text-sky-300 uppercase tracking-widest">Workspace Internal · KF-01</span>
      <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Masuk ke Envy Studio</h1>
      <p class="text-xs text-white/65">Khusus Owner dan Desainer. Klien tidak perlu login untuk order atau tracking.</p>
    </div>

    @if($errors->any())
      <div class="rounded-2xl bg-rose-500/15 border border-rose-400/35 px-4 py-3 text-xs text-rose-200">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}" class="space-y-4">
      @csrf
      <div>
        <label for="email" class="block text-xs font-medium text-white/80 mb-1.5">Email Akun</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
          class="w-full rounded-xl bg-white/5 border border-white/15 px-4 py-2.5 text-sm text-white placeholder-white/35 focus:outline-none focus:border-sky-400"
          placeholder="nama@envystudio.id" />
      </div>

      <div>
        <label for="password" class="block text-xs font-medium text-white/80 mb-1.5">Password</label>
        <input id="password" name="password" type="password" required
          class="w-full rounded-xl bg-white/5 border border-white/15 px-4 py-2.5 text-sm text-white placeholder-white/35 focus:outline-none focus:border-sky-400"
          placeholder="••••••••" />
      </div>

      <label class="flex items-center gap-2 text-xs text-white/70">
        <input type="checkbox" name="remember" class="rounded bg-white/10 border-white/20 text-blue-500" />
        <span>Ingat sesi saya</span>
      </label>

      <button type="submit" class="w-full py-2.5 rounded-full bg-[#1d8ff2] hover:bg-[#167bd4] text-white text-sm font-semibold transition shadow-lg shadow-blue-500/25">
        Masuk ke Workspace →
      </button>
    </form>
  </div>
</main>
@endsection
