<?php

namespace App\Http\Middleware;
use Closure;

class CheckLoginUser{
    
    public function handle($request, Closure $next){
        
        if(!get_data_user('web')){
            return redirect()->route('login');
        }
        return $next($request);
}   
}