<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\CommunitiesUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' =>  Auth::user()->load('country'),
            'countrys' => Country::all(),
            'tab' => 'my-account'
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $request->user()->fill($request->validated());
        $request->user()->visible = filter_var(request()->input('visible'), FILTER_VALIDATE_BOOLEAN);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->visible) {
            $visible = filter_var(request()->input('visible'), FILTER_VALIDATE_BOOLEAN);
            $request->user()->visible = $visible;
        }

        $country = Country::where('name', $request->country)->first();
        $request->user()->country_id = $country->id;
        $request->user()->save();

        return Redirect::route('profile.edit');
    }


    /**
     * Update the user's profile information.
     */
    public function updateCommunities(CommunitiesUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());



        $sugar_daddy = filter_var(request()->input('sugar_daddy'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->sugar_daddy = $sugar_daddy;


        $sugar_mommy = filter_var(request()->input('sugar_mommy'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->sugar_mommy = $sugar_mommy;


        $sugar_baby = filter_var(request()->input('sugar_baby'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->sugar_baby = $sugar_baby;


        $bondage = filter_var(request()->input('bondage'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->bondage = $bondage;


        $cuckold = filter_var(request()->input('cuckold'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->cuckold = $cuckold;


        $podolatry = filter_var(request()->input('podolatry'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->podolatry = $podolatry;


        $submissive = filter_var(request()->input('submissive'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->submissive = $submissive;


        $domme = filter_var(request()->input('domme'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->domme = $domme;


        $master = filter_var(request()->input('master'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->master = $master;


        $thresome = filter_var(request()->input('thresome'), FILTER_VALIDATE_BOOLEAN);
        $request->user()->thresome = $thresome;

        $request->user()->save();
        return Redirect::route('profile.edit');
    }


    /**
     * Update the user's profile information.
     */
    public function updateAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $image_path = '';
        $user_folder = $request->user()->id . '/avatar';

        if ($request->hasFile('avatar')) {
            $actualAvatar = Storage::files('public/images/user/' . $user_folder);
            foreach ($actualAvatar as $avatar) {
                Storage::delete($avatar);
            }
            $image_path = $request->file('avatar')->store('images/user/' . $user_folder, 'public', 'avatar');
        }

        $request->user()->avatar = '/storage/' . $image_path;
        $request->user()->save();
        return Redirect::route('profile.edit');
    }


    public function deleteAvatar(Request $request): RedirectResponse
    {
        $user_folder = $request->user()->id . '/avatar';

        if (Storage::exists('public/images/user/' . $user_folder)) {
            $actualAvatar = Storage::files('public/images/user/' . $user_folder);
            foreach ($actualAvatar as $avatar) {
                Storage::delete($avatar);
            }
            $request->user()->avatar = null;
            $request->user()->save();
            return Redirect::route('profile.edit');
        }
    }


    /**
     * Update the user's profile information.
     */
    public function updateGallery(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $user_folder_gallery = $request->user()->id . '/gallery';

        if (!Storage::exists($user_folder_gallery)) {
            Storage::makeDirectory($user_folder_gallery, 0755, true);
        }

        $image_path = null;
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('images/user/' . $user_folder_gallery, 'public');
        }

        $existing_gallery = $request->user()->gallery;
        $gallery_data = $existing_gallery ? json_decode($existing_gallery, true) : [];

        if ($image_path) {
            $gallery_data[] = '/storage/' . $image_path;
        }

        $request->user()->gallery = json_encode($gallery_data);
        $request->user()->save();

        return Redirect::route('profile.edit', [], 303, ['preserveScroll' => true]);
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
