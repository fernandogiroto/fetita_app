<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::query()
            ->with('country')
            ->when(request()->all(), function ($query) {
                if (request()->has('search')) {
                    $search = request()->input('search');
                    $query->where('name', 'like', "%{$search}%");
                }
                if (request()->has('country')) {
                    $countryName = request()->input('country');
                    $country = Country::where('name', $countryName)->first();
                    if ($country) {
                        $query->where('country_id', $country->id);
                    }
                }
                if (request()->has('sugarDaddy')) {
                    $sugarDaddy = filter_var(request()->input('sugarDaddy'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('sugar_daddy', 'like', "%{$sugarDaddy}%");
                }
                if (request()->has('sugarMommy')) {
                    $sugar_mommy = filter_var(request()->input('sugarMommy'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('sugar_mommy', 'like', "%{$sugar_mommy}%");
                }
                if (request()->has('sugarBaby')) {
                    $sugar_baby = filter_var(request()->input('sugarBaby'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('sugar_baby', 'like', "%{$sugar_baby}%");
                }
                if (request()->has('submissive')) {
                    $submissive = filter_var(request()->input('submissive'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('submissive', 'like', "%{$submissive}%");
                }
                if (request()->has('domme')) {
                    $domme = filter_var(request()->input('domme'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('domme', 'like', "%{$domme}%");
                }
                if (request()->has('master')) {
                    $master = filter_var(request()->input('master'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('master', 'like', "%{$master}%");
                }
                if (request()->has('bondage')) {
                    $bondage = filter_var(request()->input('bondage'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('bondage', 'like', "%{$bondage}%");
                }
                if (request()->has('cuckold')) {
                    $cuckold = filter_var(request()->input('cuckold'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('cuckold', 'like', "%{$cuckold}%");
                }
                if (request()->has('podolatry')) {
                    $podolatry = filter_var(request()->input('podolatry'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('podolatry', 'like', "%{$podolatry}%");
                }
                if (request()->has('thresome')) {
                    $thresome = filter_var(request()->input('thresome'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('thresome', 'like', "%{$thresome}%");
                }
                if (request()->has('active')) {
                    $active = filter_var(request()->input('active'), FILTER_VALIDATE_BOOLEAN);
                    $query->where('active', 'like', "%{$active}%");
                }
            })
            ->where('id', '!=', $user->id)
            ->orderBy('last_activity', 'asc')
            ->paginate(16);

        $users->appends(request()->all());
        $countryIds = Country::all();

        return Inertia::render('Users/Users', [
            'users' => $users,
            'countrys' => null,
            'countries_id' =>  $countryIds,
            'filters' => request()->all()
        ],);
    }

    public function user(Request $request)
    {
        // $user = User::where('nickname', $request->nickname)->first();


        $user = User::where('nickname', $request->nickname)
            ->with('country')
            ->first();

        return Inertia::render('Users/User', [
            'user' => $user
        ]);
    }
}
