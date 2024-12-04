<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Cache;

class CheckAuth extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $token = $request->cookie('user');
        $value = Cache::pull('user');
dd('come', $value);
        if (!$token) {
            // Redirigir al login en auth si no hay token
            return redirect(config('sigep.login') . "/  login?redirect_to=" . urlencode(url()->current()));
        }
    
        // Verifica si el token está en caché
        $cacheKey = 'user_token_' . $token;
        $user = Cache::get($cacheKey);
    
        if (!$user) {
            // Si no hay caché, valida el token con auth
            $response = Http::withToken($token)->get('https://auth.com/api/user');
            
            if ($response->status() !== 200) {
                // Token inválido, redirige a login en auth
                return redirect("https://auth.com/login?redirect_to=" . urlencode(url()->current()));
            }
    
            $user = $response->json();
            // Almacena el usuario en caché durante 10 minutos
            Cache::put($cacheKey, $user, now()->addMinutes(10));
        }
    
        // Añade el usuario al request para el resto de la aplicación
        $request->merge(['user' => $user]);
        return $next($request);   
    }
}