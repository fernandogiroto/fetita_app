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

    public function index()
    {
        return Inertia::render('Website');
    }

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

        $messages = [
            'name.required' => 'O nome é obrigatório',
            'name.surname' => 'O sobrenome é obrigatório',
            'country_id.required' => 'O país é obrigatório',
            'birthdate.required' => 'O nascimento é obrigatório',
            'gender.required' => 'O gênero é obrigatório',
            'name.min' => 'O nome precisa ter no mínimo 3 letras.',
            'surname.min' => 'O sobrenome precisa ter no mínimo 3 letras.',
            'email'    => 'The :attribute must be a valid email address.',
            'birthdate.before' => 'É preciso ter mais de 18 anos para entrar.'
        ];

        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'surname' => 'required|string|max:50',
            'country_id' => 'required',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', Rules\Password::defaults()],
            'birthdate' => 'required|date|before:' . $before
        ], $messages);


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
            'avatar' => 'http://127.0.0.1:8000/storage/images/avatar-default.jpeg'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
