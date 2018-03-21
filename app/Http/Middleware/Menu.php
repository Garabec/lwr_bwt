<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Events\Dispatcher;


class Menu {

    public function handle($request, Closure $next)
    {
        
            resolve('App\Service\Menu')->boot(); 
            return $next($request);
        

    }

}