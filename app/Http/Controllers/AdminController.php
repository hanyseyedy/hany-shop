<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin'); // اطمینان از اینکه فقط ادمین‌ها دسترسی دارند
    }

    public function index()
    {
        return view('admin.dashboard'); // این صفحه داشبورد ادمین رو نمایش میده
    }

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

