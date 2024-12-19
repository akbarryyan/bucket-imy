<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $users = User::where('role', 'user')->get();
            return view('admin.users.index', compact('users'));
        }
        
        return redirect('/admin/login')->with('error', 'You do not have admin access.');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'role' => 'required|in:admin,user',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        }

        return redirect('/admin/login')->with('error', 'You do not have admin access.');
    }

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $user = User::findOrFail($id);
            return view('admin.users.edit', compact('user'));
        }

        return redirect('/admin/login')->with('error', 'You do not have admin access.');
    }

    public function update(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'role' => 'required|in:admin,user',
            ]);

            $user = User::findOrFail($id);
            $user->update($request->only(['name', 'email', 'role']));
    
            if ($request->filled('password')) {
                $user->update(['password' => bcrypt($request->password)]);
            }
    
            return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
        }

        return redirect('/admin/login')->with('error', 'You do not have admin access.');
    }

    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            User::findOrFail($id)->delete();
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        }

        return redirect('/admin/login')->with('error', 'You do not have admin access.');
    }
}
