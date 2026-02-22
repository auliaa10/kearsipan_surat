<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->paginate(10);

        return view('dashboard.master.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('dashboard.master.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,name'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('master')->with('success', 'User berhasil dibuat.');
    }
}
