<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PendaftaranMiddleware
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
        $notification = array(
            'message' => 'Tidak Ada Hak Akses ',
            'alert-type' => 'error'
        );

        // if (auth()->user()->hak_akses == 1 || auth()->user()->hak_akses == 2) {
            if (auth()->user()->hak_akses == 4 ) {
            return $next($request);
        }
        return redirect()->back()->with($notification);
    }
}
