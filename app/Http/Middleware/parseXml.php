<?php

namespace App\Http\Middleware;

use Closure;

class parseXml
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
        $xmlStr = trim($request->getContent());
        $xml = new \SimpleXMLElement($xmlStr);
        $request->attributes->set('responseObj', $xml);
        return $next($request);
    }
}