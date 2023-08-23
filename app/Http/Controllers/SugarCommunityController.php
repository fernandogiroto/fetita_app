<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SugarCommunityController extends Controller
{
    public function index()
    {
        $users_count = DB::table('users')->count();
        $user = Auth::user();
        $users = User::where('sugar_daddy', true)
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('last_activity', 'asc')
            ->paginate(12);

        $users_highlights = User::where('sugar_daddy', true)
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('highlight', 'desc')
            ->paginate(12);

        return Inertia::render('Communities/Sugar', [
            'users' => $users,
            'user' => $user,
            'users_count' => $users_count,
            'users_highlights' => $users_highlights
        ]);
    }

    public function subscribre(Request $request)
    {
        $user = Auth::user();
        $user->cm_sugar = $request->subscribe;
        $user->save();
    }
}
