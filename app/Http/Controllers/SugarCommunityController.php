<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SugarCommunityController extends Controller
{
    public function index()
    {
        $users_count = DB::table('users')
            ->where('sugar_daddy', true)
            ->orWhere('sugar_mommy', true)
            ->orWhere('sugar_baby', true)
            ->count();

        $user = Auth::user();

        $users = User::where('sugar_daddy', true)
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('last_activity', 'asc')
            ->paginate(12);

        $users_new = User::where('sugar_daddy', true)
            ->with('country')
            ->where('id', '!=', $user->id)
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $userBelongsToComunity = false;
        if ($user->sugar_daddy || $user->sugar_mommy || $user->sugar_baby) {
            $userBelongsToComunity = true;
        }

        return Inertia::render('Communities/Sugar', [
            'user' => $user,
            'users' => $users,
            'users_new' => $users_new,
            'users_count' => $users_count,
            'userBelongsToComunity' => $userBelongsToComunity
        ]);
    }

    public function subscribre(Request $request)
    {
        $user = Auth::user();
        $sugar_choice = $request->sugar_selected;

        if ($sugar_choice  === 'Sugar Daddy') {
            $user->sugar_daddy = !$user->sugar_daddy;
        } else if ($sugar_choice  == 'Sugar Mommy') {
            $user->sugar_mommy = !$user->sugar_mommy;
        } else if ($sugar_choice  == 'Sugar Baby') {
            $user->sugar_baby = !$user->sugar_baby;
        }
        $user->save();

        return Redirect::route('comunidades.sugar');
    }


    public function unsubscribre(Request $request)
    {
        $user = Auth::user();
        $user->sugar_daddy = false;
        $user->sugar_mommy = false;
        $user->sugar_baby = false;
        $user->save();

        return Redirect::route('comunidades.sugar');
    }
}
