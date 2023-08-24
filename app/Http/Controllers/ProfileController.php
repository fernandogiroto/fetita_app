<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
            'user' => Auth::user()
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        dd('entrei');
        // $request->user()->fill($request->validated());
        // $request->user()->visible = filter_var(request()->input('visible'), FILTER_VALIDATE_BOOLEAN);

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('profile.edit');
    }


    /**
     * Update the user's profile information.
     */
    public function updateAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image_path = '';
        $user_folder = $request->user()->id . '/avatar';

        if ($request->hasFile('avatar')) {
            $actualAvatar = Storage::files('public/images/user/' . $user_folder);
            foreach ($actualAvatar as $avatar) {
                Storage::delete($avatar);
            }
            $image_path = $request->file('avatar')->store('images/user/' . $user_folder, 'public');
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
