<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestSnakeCaseMiddleware extends ResponseCaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->replace(
            $this->convertKeysToCase(
                self::CASE_SNAKE,
                $request->all()
            )
        );

        return $next($request);
    }
}
