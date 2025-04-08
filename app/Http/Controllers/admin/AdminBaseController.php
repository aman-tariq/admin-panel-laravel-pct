<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBaseController extends Controller
{
    protected function checkAdminLogin(Request $request)
    {
        if (!$request->session()->has('isAdminLoggedIn')) {
            $request->session()->flash('login_required', 'You need to login first.');
            return redirect('admin/login');
        }

        if ($this->isSessionExpired($request)) {
            $request->session()->flash('session_expired', 'Your session has expired due to inactivity.');
            $request->session()->flush();
            return redirect('admin/login');
        }

        $request->session()->put('last_activity', now());
        $request->session()->save();
        return null;
    }

    private function isSessionExpired(Request $request)
    {
        $lastActivity = $request->session()->get('last_activity');
        if (!$lastActivity) {
            return true;
        }
        $sessionLifetime = 60;  
        $timeDifference = now()->diffInSeconds($lastActivity);
        return $timeDifference > $sessionLifetime;
    }
}