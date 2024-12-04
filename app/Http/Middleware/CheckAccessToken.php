<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class CheckAccessToken
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        /*
        $token = $request->query('token');

        if ($token) {
            // Guardar el token en la sesión o configurarlo globalmente
            session(['access_token' => $token]);
        }

        // Configurar el encabezado Authorization para el guard API
        if (session('access_token')) {
            $request->headers->set('Authorization', 'Bearer ' . session('access_token'));
        }
        // Verifica la existencia y expiración del access_token en la sesión
        if (!auth('api')->check()) {
            //dd('no valido');
        //if (!Session::has('access_token') || $this->isTokenExpired()) {
            $ssoUrl = config('sigep.login_url');
            $redirectUrl = $ssoUrl . '/login?redirect=' . urlencode(url()->current());
            return Redirect::away($redirectUrl);
        }
        dd('pasamos');
        */
        return $next($request);
    }

    /**
     * Check if the token has expired.
     */
    private function isTokenExpired()
    {
        $expiresAt = Session::get('token_expires_at');
        return now()->greaterThan($expiresAt);
    }
}
