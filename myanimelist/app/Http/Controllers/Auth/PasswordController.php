<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use app\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Validation rules for the new password
        $rules = [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];

        // Check if the current password in the database is null or empty
        if (empty($user->password)) {
            // Remove the current password validation when it's empty in the database
            unset($rules['current_password']);
        } else {
            // If the password exists, require the current password for validation
            $rules['current_password'] = ['required', 'current_password'];
        }

        $validated = $request->validateWithBag('updatePassword', $rules);

        // Update the password
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

}

// $request->user()->update([
//     'password' => Hash::make($validated['password']),
// ]);

// return back()->with('status', 'password-updated');
