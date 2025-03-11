<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    // Ադմինի Profile էջը ցույց տալու ֆունկցիա
    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

    // Ադմինի տվյալները թարմացնելու ֆունկցիա
    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        // Վալիդացիա
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Նոր տվյալներ պահել
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
    }
}
