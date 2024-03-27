<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->expectsJson()) {
            $url = $request->url();
            $split = explode('/', $url);
            $baseUrl = $split[0] . '//' . $split[2];
            if (!isset($split[3])) {
                return redirect('home');
            }
            $withoutProtocol = str_replace($baseUrl, '', $url);
            $params = $request->query();
            if (count($params) > 0) {
                $withoutProtocol = $withoutProtocol . '?' . http_build_query($params);
            }
            return redirect('home', ['redirect' => $withoutProtocol]);
        }
        return $next($request);
    }
}
