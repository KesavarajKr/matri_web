<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\register;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class shareAuth
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
        $varanid = session('LoggedUser');
        $data = DB::table('registers')
        ->select('*')
        ->where('varan_id','=',$varanid)
        ->first();


            // dd($data);
            View::share('data',$data);

        return $next($request);
    }
}
