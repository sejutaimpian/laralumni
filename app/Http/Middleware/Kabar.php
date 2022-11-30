<?php

namespace App\Http\Middleware;

use App\Models\KabarModel;
use Closure;
use Illuminate\Http\Request;

class Kabar
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
        // Handle Bukan admin
        if (auth()->user()->role != 'admin') {
            // Handle selain tambah kabar 
            if ($request->id) {
                $kabar = KabarModel::select('idakun')->where('id', $request->id)->first();
                // Handle jika bukan kabar miliknya
                if (auth()->user()->id != $kabar->idakun) {
                    abort(403);
                }
            }
        }
        return $next($request);
    }
}
