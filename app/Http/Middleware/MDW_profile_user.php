<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MDW_profile_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('web')->check()){
            return $next($request);
        }
        return redirect('/login_user')->with('msg','Bạn chưa đăng nhập, vui lòng đăng nhập để có thể xem thông tin tài khoản');
   
    }
}
