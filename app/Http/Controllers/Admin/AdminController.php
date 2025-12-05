<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index()
    {
        return view('dashboard.admin.index');
    }

    function profile()
    {
        $admin = Auth()->guard('admin')->user();
        return view('dashboard.admin.profile.index', compact('admin'));
    }

    function editProfile()
    {
        $admin = Auth()->guard('admin')->user();
        return view('dashboard.admin.profile.edit', compact('admin'));
    }

    function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email,' . $admin->id],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $data = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile updated successfully!');
    }
}
