<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Carbon\Carbon;
use Nette\Utils\Random;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $dt = Carbon::now();
        $before = $dt->subYears(18)->format('Y-m-d');

        $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'country_id' => 'required',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', Rules\Password::defaults()],
            'birthdate' => 'required|date|before:' . $before
        ]);


        $nickname = $request->name . '_' . $request->surname . '_' . Str::random(6);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'surname' => $request->surname,
            'nickname' => $nickname,
            'country_id' => $request->country_id,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
            'last_activity' => Carbon::now(),
            'gender' => $request->gender,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
