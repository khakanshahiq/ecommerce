<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;


class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user=User::find(session('role')->role);
        // $user=session()->has('role')=='user';
        // $user=session()->has('role');
        // dd($user);
        if(!session()->has('id') ) {
            return redirect()->route('login')->with('error','login in to see');
         

}
 if(!session()->has('role') || session('role') != 'admin'){

    return redirect()->back();


 }



     return $next($request);
    }
}
