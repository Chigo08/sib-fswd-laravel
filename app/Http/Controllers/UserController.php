<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->with('role')->first();
        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'));
    }

    public function update($id, Request $request)
    {
        User::where('id', $id)->update([
            'role_id' => $request->role,
            'name' => $request->name,
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('user.index');
    }
}
