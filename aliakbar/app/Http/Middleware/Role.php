<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Toastr;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,... $roles)
    {
        foreach($roles as $role) {
            $r = roleMiddle($role);
            if(Auth::user()->level == $r) 
            { 
                return $next($request); 
            } 
        } 
        Toastr::warning('Mohon maaf anda tidak mempunyai hak untuk mengakses halaman tersebut!', 'Peringatan!', ["positionClass" => "toast-bottom-left"]);
        return redirect('/dashboard'); 
    }
}
