<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

        // Check the role of the authenticated user
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Redirect to admin-dashboard if the role is 'admin'
            return redirect()->route('admin-dashboard');
            // Redirect to dashboard or any intended route
            return redirect()->intended('/');
        }

        // Redirect to dashboard or any intended route for non-admin users
        return redirect()->intended('/dashboard');
    }

    // Handle failed login attempt
    throw ValidationException::withMessages([
        'email' => __('Usuario o contraseña incorrectos'),
    ]);
    }
    
    public function loginAuthApi(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Obtener el usuario autenticado
            $user = Auth::user();
            
            $token = $request->user()->createToken('MiToken');
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'photo' => $user->photo,
                'role' => $user->role,
                'token' => $token->plainTextToken,
                'status' => "success"
            ]);
        }
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
