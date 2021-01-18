<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function getList() {
      $permission = Permission::all();
      return view('pages.permissions-list', ['permission' => $permission]);
    }

    public function getAdd() {
      return view('pages.permissions-add');
    }

    public function postAdd(Request $request) {
      $permission = Permission::create(['name' => $request->input('name')]);
      $permission->save();
      return redirect()->route('permissions-list');
    }

    public function getEdit($id) {
      $permission = Permission::find($id);
      return view('pages.permissions-edit', ['permission' => $permission]);
    }

    public function postEdit(Request $request,$id) {
      $permission = Permission::find($id);
      $permission->name = $request->input('name');
      $permission->save();
      return redirect()->route('permissions-list');
    }

    public function getDelete($id){
    	$permission = Permission::find($id);
    	$permission->delete($id);
    	return redirect()->route('permissions-list');
    }
}
