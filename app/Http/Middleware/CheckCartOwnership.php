<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCartOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $cartId = $request->route('id');
        $userCart = auth()->user()->cart;

        if (!$userCart || $userCart->id != $cartId) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}