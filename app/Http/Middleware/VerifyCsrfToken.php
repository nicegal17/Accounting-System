<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{


    public function handle($request, Closure $next){
    	if(strpos($request->getRequestUri(),'api') >= 0){
    		return $next($request);
    	}
    	return $parent::handle($request,$next);
    }
}
