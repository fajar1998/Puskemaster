<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FarmasiMiddleware
{
   
    public function handle(Request $request, Closure $next)
    {
        $notification = array(
            'message' => 'Tidak Ada Hak Akses ',
            'alert-type' => 'error'
        );
        if (auth()->user()->hak_akses == 6)  {
            return $next($request);
        }
        return redirect()->back()->with($notification);
    }
}
