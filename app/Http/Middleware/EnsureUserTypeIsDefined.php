<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserTypeIsDefined
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Se não estiver logado, deixa o fluxo padrão do Breeze cuidar
        if (!$user) {
            return $next($request);
        }

        // Rotas que NÃO devem ser bloqueadas
        if ($request->routeIs(
        'onboarding.tipo',
        'onboarding.tipo.store',
        'logout',
        'account.*'
        )) {
            return $next($request);
            }

        // Regra principal: usuário sem tipo definido
        if (is_null($user->user_type)) {
            return redirect()->route('onboarding.tipo');
        }

        return $next($request);
    }
}