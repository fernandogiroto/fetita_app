<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::with('country')->where('id', '!=', $user->id)->where('active', true)->orderBy('last_activity', 'desc')->paginate(12);
        return Inertia::render('Dashboard', ['users' => $users, 'user' => $user]);
    }
}
