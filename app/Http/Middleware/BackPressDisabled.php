<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BackPressDisabled
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

        // if(Auth::Check()){
        //     return $next($request);
        // }else{
        //     return redirect('/login');
        // }
        if(Auth::guard('')->guest()){
            
            if($request->ajax() || $request -> wantsJson()){
                return response('Unauthorized.',401);
            }
        
            else{
                return redirect()->guest('/login')->with('flash_message_error','Please login to access');
            }
        }
        $response = $next($request);

        return $response->header('Cache-Control','no-cache, 
           no-store, max-age=0, must-revalidate')
           ->header('Pragma','no-cache')
           ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT'); 
    }
}
