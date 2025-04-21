<?php
namespace App\Http\Controllers\admin;
use App\Models\Menu;
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

        // if ($this->isSessionExpired($request)) {
        //     $request->session()->flash('session_expired', 'Your session has expired due to inactivity.');
        //     $request->session()->flush();
        //     return redirect('admin/login');
        // }

        // $request->session()->put('last_activity', now());
        // $request->session()->save();
        // return null;
    }

    // private function isSessionExpired(Request $request)
    // {
    //     $lastActivity = $request->session()->get('last_activity');
    //     if (!$lastActivity) {
    //         return true;
    //     }

    //     $sessionLifetime = 900;
    //     $timeDifference = now()->diffInSeconds($lastActivity);

    //     return $timeDifference > $sessionLifetime;
    // }

    public function getAdminMenu()
    {
        $topLevelMenus = Menu::where('type', 'admin')->whereNull('parent_id')->orderBy('order', 'asc')->get();
        foreach ($topLevelMenus as $menu) {
            $menu->submenus = Menu::where('parent_id', $menu->id)->orderBy('order', 'asc')->get();
        }
        return $topLevelMenus;
    }

    // admin menu crud
    // Show menu management page
    public function manageMenus(Request $request)
    {
        if ($redirect = $this->checkAdminLogin($request)) {
            return $redirect;
        }
        $menus = Menu::orderBy('type')->orderBy('order', 'asc')->get();
        return view('admin.menus.manage', compact('menus'));
    }

    // Store new menu item
    public function storeMenu(Request $request)
    {
        if ($redirect = $this->checkAdminLogin($request)) {
            return $redirect;
        }
        $request->validate([
            'title' => 'required|string|max:20',
            'url' => 'required|string|max:30',
            'order' => 'required|integer',
            'type' => 'required|in:admin,user',
        ]);

        Menu::create([
            'title' => $request->title,
            'url' => $request->url,
            'order' => $request->order,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.menus.manage')->with('success', 'Menu item added!');
    }

    // Delete menu item
    public function deleteMenu(Request $request, $id)
    {
        if ($redirect = $this->checkAdminLogin($request)) {
            return $redirect;
        }
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.menus.manage')->with('success', 'Menu item deleted!');
    }
}

