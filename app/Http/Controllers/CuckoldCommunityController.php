<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CuckoldCommunityController extends Controller
{
    public function index()
    {
        $users_count = DB::table('users')->where('cuckold', true)->count();

        $user = Auth::user();

        $users = User::where('cuckold', true)
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('last_activity', 'asc')
            ->paginate(12);

        $users_new = User::where('cuckold', true)
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return Inertia::render('Communities/Cuckold', [
            'user' => $user,
            'users' => $users,
            'users_new' => $users_new,
            'users_count' => $users_count
        ]);
    }

    public function subscribre(Request $request)
    {
        $user = Auth::user();
        $community = filter_var($request->cuckold, FILTER_VALIDATE_BOOLEAN);
        $user->cuckold = $community;
        $user->save();

        return Redirect::route('comunidades.cuckold');
    }
}
