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
            ->where('submissive', true)
            ->orWhere('domme', true)
            ->orWhere('master', true)
            ->count();


        $user = Auth::user();

        $users_submissive = User::where('submissive', true)
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('last_activity', 'asc')
            ->paginate(12);

        $users_submissive_new = User::where('submissive', true)
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

        $userBelongsToComunity = false;
        if ($user->submissive || $user->domme || $user->master) {
            $userBelongsToComunity = true;
        }

        return Inertia::render('Communities/Submsion', [
            'user' => $user,
            'users_submision' => $users_submissive,
            'users_submision_new' => $users_submissive_new,
            'users_domme_master' => $users_domme_master,
            'users_domme_master_new' => $users_domme_master_new,
            'users_count' => $users_count,
            'userBelongsToComunity' => $userBelongsToComunity
        ]);
    }

    public function subscribre(Request $request)
    {
        $user = Auth::user();
        $submsive_choice = $request->submsive_selected;

        if ($submsive_choice  === 'Domme') {
            $user->domme = !$user->domme;
        } else if ($submsive_choice  == 'Mestre') {
            $user->master = !$user->master;
        } else if ($submsive_choice  == 'Submisso') {
            $user->submissive = !$user->submissive;
        }

        $user->save();
        return Redirect::route('comunidades.submision');
    }



    public function unsubscribre(Request $request)
    {
        $user = Auth::user();
        $user->domme = false;
        $user->master = false;
        $user->submissive = false;
        $user->save();

        return Redirect::route('comunidades.sugar');
    }
}
