<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Memastikan pengguna sudah login, berstatus aktif, dan memiliki role yang diizinkan.
     * Pemakaian di route: ->middleware('role:owner') atau ->middleware('role:owner,desainer')
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login')
                ->with('error', 'Silakan masuk terlebih dahulu.');
        }

        if (! $user->is_active) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->with('error', 'Akun Anda berstatus nonaktif. Hubungi Owner untuk mengaktifkan kembali.');
        }

        if (! empty($roles) && ! in_array($user->role, $roles, true)) {
            abort(403, 'Akses ditolak. Halaman ini tidak tersedia untuk role Anda.');
        }

        return $next($request);
    }
}
