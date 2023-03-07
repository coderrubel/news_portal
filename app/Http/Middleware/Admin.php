<?php

namespace App\Http\Middleware;
use Closure;
use DB;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $auth = Auth::user()->id;
        $rolls = DB::table('users')->select('users.type','users.id')->where('users.id', $auth)->first();
        if(!$rolls->type == 'admin'){
            return redirect('login');
        }
        return $next($request);
    }
}
