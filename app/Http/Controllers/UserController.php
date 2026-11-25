<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $role = (string) $request->query('role', 'all');
        $status = (string) $request->query('status', 'all');

        $query = User::query()->orderByRaw("CASE WHEN role = 'owner' THEN 0 ELSE 1 END")->orderBy('name');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('style_specializations', 'like', "%{$search}%");
            });
        }

        if (in_array($role, [User::ROLE_OWNER, User::ROLE_DESAINER], true)) {
            $query->where('role', $role);
        }

        if ($status === 'aktif') {
            $query->where('is_active', true);
        } elseif ($status === 'nonaktif') {
            $query->where('is_active', false);
        }

        $users = $query->get();

        // Pemantauan jumlah order per desainer (otomatis aktif saat tabel orders dari Peran 2/3 sudah ada)
        $hasOrdersTable = Schema::hasTable('orders') && Schema::hasColumn('orders', 'designer_id');
        $orderCounts = collect();

        if ($hasOrdersTable) {
            $orderCounts = DB::table('orders')
                ->selectRaw("designer_id,
                    SUM(CASE WHEN status IN ('antrian', 'dikerjakan', 'revisi') THEN 1 ELSE 0 END) as active_count,
                    SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as done_count")
                ->whereNotNull('designer_id')
                ->groupBy('designer_id')
                ->get()
                ->keyBy('designer_id');
        }

        $users->each(function (User $u) use ($orderCounts) {
            $row = $orderCounts->get($u->id);
            $u->active_orders_count = $row ? (int) $row->active_count : 0;
            $u->completed_orders_count = $row ? (int) $row->done_count : 0;
        });

        $stats = [
            'total' => User::count(),
            'desainer_aktif' => User::where('role', User::ROLE_DESAINER)->where('is_active', true)->count(),
            'owner' => User::where('role', User::ROLE_OWNER)->count(),
            'nonaktif' => User::where('is_active', false)->count(),
        ];

        return view('users.index', compact('users', 'stats', 'search', 'role', 'status', 'hasOrdersTable'));
    }

    public function create(): View
    {
        return view('users.create', [
            'styleOptions' => User::STYLE_OPTIONS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', Rule::in([User::ROLE_OWNER, User::ROLE_DESAINER])],
            'style_specializations' => ['nullable', 'array'],
            'style_specializations.*' => ['string', 'max:60'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah digunakan oleh pengguna lain.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
            'role.required' => 'Role pengguna wajib dipilih.',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'style_specializations' => array_values($validated['style_specializations'] ?? []),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Pengguna ' . $validated['name'] . ' berhasil ditambahkan.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user,
            'styleOptions' => User::STYLE_OPTIONS,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6'],
            'role' => ['required', Rule::in([User::ROLE_OWNER, User::ROLE_DESAINER])],
            'style_specializations' => ['nullable', 'array'],
            'style_specializations.*' => ['string', 'max:60'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah digunakan oleh pengguna lain.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
        ]);

        if ($user->id === $request->user()->id && ! $request->boolean('is_active')) {
            return back()->withInput()->with('error', 'Anda tidak dapat menonaktifkan akun sendiri.');
        }

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'style_specializations' => array_values($validated['style_specializations'] ?? []),
            'is_active' => $request->boolean('is_active'),
        ];

        if (! empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'Data pengguna ' . $user->name . ' berhasil diperbarui.');
    }

    public function toggleStatus(Request $request, User $user): RedirectResponse
    {
        if ($user->id === $request->user()->id) {
            return back()->with('error', 'Anda tidak dapat menonaktifkan akun sendiri.');
        }

        $user->update(['is_active' => ! $user->is_active]);

        $label = $user->is_active ? 'Aktif' : 'Nonaktif';

        return back()->with('success', "Status {$user->name} diubah menjadi {$label}.");
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($user->id === $request->user()->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun yang sedang digunakan.');
        }

        $name = $user->name;
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', "Akun {$name} berhasil dihapus.");
    }
}
