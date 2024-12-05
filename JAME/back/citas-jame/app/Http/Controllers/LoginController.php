<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario
        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/'); // Redirige a la página de inicio o login
    }
}
