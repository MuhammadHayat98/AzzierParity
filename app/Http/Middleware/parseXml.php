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
        $xmlStr = trim(file_get_contents($request->getContent()));
        $xml = new \SimpleXMLElement($xmlStr);
        $WorkorderObj = $xml->{'WorkOrder'};
        $request->attributes->set('WorkOrder', $WorkorderObj);
        return $next($request);
    }
}