<?php

namespace App\Http\Middleware;

use Closure;
use App\Logger as LoggerModel;

class Logger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        LoggerModel::create(['data' => file_get_contents('php://input')]);

        return $next($request);
    }
}
