<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

class AdminDashboardController extends AdminBaseController
{
    public function showAdminDashboardView(Request $request)
    {
        if ($redirect = $this->checkAdminLogin($request)) {
            return $redirect;
        }
        return view('admin.dashboard');
    }
}