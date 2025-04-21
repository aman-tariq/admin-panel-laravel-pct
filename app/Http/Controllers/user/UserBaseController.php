<?php

namespace App\Http\Controllers\user;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserBaseController extends Controller
{
    protected function getUserMenu()
    {
        return Menu::where('type', 'user')->orderBy('order', 'asc')->get();
    }
    
}
