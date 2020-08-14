<?php

namespace App\Http\Middleware;

use App\Http\Controllers\BaseApiController;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiTokenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()) {
            throw new HttpResponseException(
                (new BaseApiController())->forbidden());
        }
        return $next($request);
    }
}
