<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PetugasAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next, ...$allowedIdLevels): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (in_array($user->idlevel, $allowedIdLevels)) {
                return $next($request);
            }
        }
        return redirect('/')->withErrors('Unauthorized access');
    }


    // public function handle(Request $request, Closure $next, $idlevel): Response
    // {

    //     // if(auth()->user()->idlevel == $idlevel){
    //     //     return $next($request);
    //     // }
    //     // return response()->json(['Anda tidak diperbolehkan mengakses halaman ini']);
        
    // }
}
