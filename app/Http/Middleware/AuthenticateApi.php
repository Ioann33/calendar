<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateApi extends Middleware
{
    /**
     * authenticate request by bearer token
     * @param \Illuminate\Http\Request $request
     * @param array $guards
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate($request, array $guards)
    {
        $token = $request->bearerToken();

        if ($token === config('apitokens')[0]) return;
        $this->unauthenticated($request, $guards);
    }
}
