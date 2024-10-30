<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // $request->session()->regenerate();            
            $user = Auth::user();
            if ($request->expectsJson()) {
                $token = $request->user()->createToken('MiToken');
                return response()->json([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'photo' => $user->photo,
                    'token' => $token->plainTextToken,
                    'status' => "success"
                ]);
            } else {
                return redirect()->intended('/dashboard');
            }
        }
        
        throw ValidationException::withMessages([
            'email' => __('Usuario o contraseña incorrectos'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
