<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageUsers()
    {
        $users = User::where('role', '!=', 'super_admin')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function toggleRole(User $user)
    {
        if ($user->role === 'admin') {
            $user->role = 'user';
        } else {
            $user->role = 'admin';
        }
        $user->save();

        return back()->with('success', 'نقش کاربر تغییر کرد.');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return back()->with('success', 'کاربر حذف شد.');
    }
}
