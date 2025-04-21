<?php
namespace App\Http\Controllers\admin;

use App\Models\Career;
use Illuminate\Http\Request;

class AdminCareerController extends AdminBaseController
{
    public function index(Request $request)
    {
        $redirect = $this->checkAdminLogin($request);
        if ($redirect) {
            return $redirect;
        }
        $careers = Career::all();
        return view('admin.careers.index', compact('careers'));
    }

    public function destroy(Request $request, $id)
    {
        $redirect = $this->checkAdminLogin($request);
        if ($redirect) {
            return $redirect;
        }
        $career = Career::findOrFail($id);
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Application deleted!');
    }
}