<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class UserPagesController extends Controller
{
    // User List Page
    public function user_list(){
      $breadcrumbs = [
          ['link'=>"dashboard",'name'=>"Home"], ['name'=>"User"]
      ];
      $users = User::all();
      // $encodedUsers = json_encode($users);
      // file_put_contents(base_path('public/data/users-list.json'), stripslashes($encodedUsers));
      return view('pages.app-user-list', ['breadcrumbs' => $breadcrumbs, 'users' => $users]);
    }

    // User Edit Page
    public function user_edit($id){
      $user = User::find($id);
      $user_name = User::where('id', $id)->value('name');
      $breadcrumbs = [
        ['link'=>"dashboard",'name'=>"Home"], ['link'=>"app-user-list",'name'=>"User"], ['name'=>$user_name]
      ];
      $roles = Role::all();
      return view('pages.app-user-edit', ['breadcrumbs' => $breadcrumbs, 'user' => $user, 'roles' => $roles]);
    }

    public function post_user_edit(Request $request,$id) {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8'],
      ]);

      $user = User::find($id);
      $user->roles()->sync($request->roles);
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = Hash::make($request->input('password'));

      if($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(90, 90)->save(public_path('/uploads/avatars/'.$filename));
        $user->avatar = $filename;
      }

      if($user->save()) {
        $request->session()->flash('success', $user->name . ' has been updated');
      } else {
        $request->session()->flash('error', 'There was an error updating the user');
      }

      return redirect()->route('app-user-list');
    }

    public function user_delete($id) {
      $user = User::find($id);
      $user->roles()->detach();
      $user->delete($id);
      return redirect()->route('app-user-list');
    }
}
