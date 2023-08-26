<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SubmisionCommunityController extends Controller
{
    public function index()
    {
        $users_count = DB::table('users')
            ->where('submision', true)
            ->orWhere('domme', true)
            ->orWhere('master', true)
            ->count();

        $user = Auth::user();

        $users_submision = User::where('submision', true)
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('last_activity', 'asc')
            ->paginate(12);

        $users_submision_new = User::where('submision', true)
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $users_domme_master = User::where(function ($query) {
            $query->where('domme', true)
                ->orWhere('master', true);
        })
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('last_activity', 'asc')
            ->paginate(12);

        $users_domme_master_new = User::where(function ($query) {
            $query->where('domme', true)
                ->orWhere('master', true);
        })
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return Inertia::render('Communities/Submsion', [
            'user' => $user,
            'users_submision' => $users_submision,
            'users_submision_new' => $users_submision_new,
            'users_domme_master' => $users_domme_master,
            'users_domme_master_new' => $users_domme_master_new,
            'users_count' => $users_count
        ]);
    }

    public function subscribre(Request $request)
    {
        $user = Auth::user();
        $community = filter_var($request->submision, FILTER_VALIDATE_BOOLEAN);
        $user->submision = $community;
        $user->save();

        return Redirect::route('comunidades.submision');
    }
}
