<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
  public function getList() {
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['name'=>"Roles"]
    ];
    $role = Role::all();
    return view('pages.roles-list', ['breadcrumbs' => $breadcrumbs, 'role' => $role]);
  }

  public function getAdd() {
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['link'=>"roles-list",'name'=>"Roles"], ['name'=>"Add Roles"]
    ];
    return view('pages.roles-add', ['breadcrumbs' => $breadcrumbs]);
  }

  public function postAdd(Request $request) {
    $role = Role::create(['name' => $request->input('name')]);
    $role->save();
    return redirect()->route('roles-list');
  }

  public function getEdit($id) {
    $role = Role::find($id);
    $role_name = Role::where('id', $id)->value('name');
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['link'=>"roles-list",'name'=>"Roles"], ['name'=>$role_name]
    ];
    return view('pages.roles-edit', ['breadcrumbs' => $breadcrumbs,'role' => $role]);
  }

  public function postEdit(Request $request,$id) {
    $role = Role::find($id);
    $role->name = $request->input('name');

    if($role->save()) {
      $request->session()->flash('success', $role->name . ' has been updated');
    } else {
      $request->session()->flash('error', 'There was an error updating the role');
    }

    return redirect()->route('roles-list');
  }

  public function getDelete($id){
    $role = Role::find($id);
    $role->delete($id);
    return redirect()->route('roles-list');
  }
}
