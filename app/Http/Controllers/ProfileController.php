<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;
use App\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display the users interface page.
     */
    public function index() {

        $users = User::with('roles')->paginate(10);
        return view('profile.index', compact('users'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $roles = Role::all();
        return view('profile.edit', [
            'user' => $request->user(),
            'roles' => $roles,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Synchroniser les rôles si un ID de rôle est fourni
        if ($request->has('role_id')) {
            $user->roles()->sync([$request->input('role_id')]);
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Assign a role to a user.
     */
    public function assignRole(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        // Ajouter un rôle sans supprimer les rôles existants
        $user->roles()->attach($request->input('role_id'));

        return Redirect::route('profile.index')->with('success', 'Role assigned successfully.');
    }

    /**
     * Remove a role from a user.
     */
    public function removeRole(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        // Retirer un rôle
        $user->roles()->detach($request->input('role_id'));

        return Redirect::route('profile.index')->with('success', 'Role removed successfully.');
    }
}
