@if($errors->any())
  <div class="rounded-2xl bg-rose-500/15 border border-rose-400/35 px-4 py-3 text-xs text-rose-200 space-y-1">
    @foreach($errors->all() as $err)
      <div>• {{ $err }}</div>
    @endforeach
  </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
  <div>
    <label for="name" class="block text-xs font-medium text-white/80 mb-1.5">Nama Lengkap</label>
    <input id="name" name="name" type="text" value="{{ old('name', $user->name ?? '') }}" required
      class="w-full rounded-xl bg-white/5 border border-white/15 px-4 py-2.5 text-sm text-white focus:outline-none focus:border-sky-400" />
  </div>

  <div>
    <label for="email" class="block text-xs font-medium text-white/80 mb-1.5">Email</label>
    <input id="email" name="email" type="email" value="{{ old('email', $user->email ?? '') }}" required
      class="w-full rounded-xl bg-white/5 border border-white/15 px-4 py-2.5 text-sm text-white focus:outline-none focus:border-sky-400" />
  </div>

  <div>
    <label for="role" class="block text-xs font-medium text-white/80 mb-1.5">Role</label>
    <select id="role" name="role" class="w-full rounded-xl bg-[#0a1328] border border-white/15 px-4 py-2.5 text-sm text-white focus:outline-none focus:border-sky-400">
      <option value="desainer" @selected(old('role', $user->role ?? 'desainer') === 'desainer')>Desainer</option>
      <option value="owner" @selected(old('role', $user->role ?? '') === 'owner')>Owner</option>
    </select>
  </div>

  <div>
    <label for="password" class="block text-xs font-medium text-white/80 mb-1.5">
      Password {{ isset($user) ? '(kosongkan jika tidak diubah)' : '' }}
    </label>
    <input id="password" name="password" type="password" {{ isset($user) ? '' : 'required' }}
      class="w-full rounded-xl bg-white/5 border border-white/15 px-4 py-2.5 text-sm text-white focus:outline-none focus:border-sky-400" />
  </div>

  <div class="sm:col-span-2">
    <label class="block text-xs font-medium text-white/80 mb-2">Spesialisasi Gaya Desain</label>
    @php
      $selectedStyles = old('style_specializations', isset($user) && is_array($user->style_specializations) ? $user->style_specializations : []);
    @endphp
    <div class="flex flex-wrap gap-2">
      @foreach(($styleOptions ?? \App\Models\User::STYLE_OPTIONS) as $opt)
        <label class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white/5 border border-white/15 text-xs text-white/85 cursor-pointer hover:bg-white/10">
          <input type="checkbox" name="style_specializations[]" value="{{ $opt }}" @checked(in_array($opt, $selectedStyles, true)) class="rounded bg-white/10 border-white/25 text-blue-500" />
          <span>{{ $opt }}</span>
        </label>
      @endforeach
    </div>
  </div>

  <div class="sm:col-span-2">
    <label class="inline-flex items-center gap-2 text-xs text-white/80">
      <input type="hidden" name="is_active" value="0" />
      <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $user->is_active ?? true))
        class="rounded bg-white/10 border-white/25 text-blue-500" />
      <span>Akun Aktif (dapat login ke workspace)</span>
    </label>
  </div>
</div>
