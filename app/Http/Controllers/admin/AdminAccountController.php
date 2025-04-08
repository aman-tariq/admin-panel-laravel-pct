<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\AdminAccountModel;

class AdminAccountController extends AdminBaseController
{
    public function showAdminLoginView(Request $request)
    {
        return view('admin.login');
    }

    public function doAdminLogin(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');
    $check_admin_login = AdminAccountModel::where([
        ['email', '=', $email],
        ['password', '=', $password]
    ])->first();

    if ($check_admin_login) {
        $request->session()->put('isAdminLoggedIn', 'logged_in');
        $request->session()->put('last_activity', now());
        $request->session()->save(); 
        return redirect(url('admin/dashboard'));
    } else {
        $request->session()->flash('admin_login_err_msg', 'Incorrect username or password');
        return redirect('admin/login');
    }
}
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin/login');
    }
}