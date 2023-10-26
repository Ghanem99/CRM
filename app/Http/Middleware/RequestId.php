<?php 

namespace App\Http\Middleware;
use Closure;
use Ramsey\Uuid\Uuid;

class RequestId
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        $request->headers->set('X-Request-ID', Uuid::uuid4()->toString());
        return $next($request);
    }
}