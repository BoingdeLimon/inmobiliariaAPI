<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
        // Validate the request data
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to dashboard or any intended route
            return redirect()->intended('/dashboard');
        }

        // Handle failed login attempt
        throw ValidationException::withMessages([
            'email' => __('Usuario o contraseña incorrectos'),
        ]);
    }

    /**
     * Handle logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
