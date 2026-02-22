<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\PermissionRegistrar;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.sign-in');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => 'Email atau password salah.',
            ]);
        }

        $request->session()->regenerate();

        // clear cached permissions biar RBAC selalu update
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // redirect berbasis permission (biar ga 403)
        $user = $request->user();
        foreach ([
            ['p' => 'dashboard.view', 'r' => 'dashboard'],
            ['p' => 'surat_masuk.view', 'r' => 'incoming.index'],
            ['p' => 'surat_keluar.view', 'r' => 'outgoing.index'],
            ['p' => 'sk.view', 'r' => 'sk.index'],
        ] as $t) {
            if ($user->can($t['p']) && \Route::has($t['r'])) {
                return redirect()->route($t['r']);
            }
        }

        return redirect()->intended('/dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
