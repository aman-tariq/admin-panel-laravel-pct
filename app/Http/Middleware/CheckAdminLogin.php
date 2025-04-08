<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        \Log::info('Admin login session: ' . $request->session()->get('isAdminLoggedIn'));

        if ($request->session()->get('isAdminLoggedIn') !== 'logged_in') {
            return redirect('admin/login');
        }

        return $next($request);
    }
}