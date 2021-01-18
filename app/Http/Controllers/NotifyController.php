<?php

namespace App\Http\Controllers;

use App\Notify;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
  public function getIndex() {
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['name'=>"Notify List"]
    ];
    $notify = Notify::orderBy('id','DESC')->orderBy('updated_at','DESC')->paginate(3);
    $totalNotify = Notify::count();
    return view('pages.notify-list', ['notify' => $notify, 'breadcrumbs' => $breadcrumbs]);
  }

  public function getDetail($id) {
    $pageConfigs = [
      'pageHeader' => false
    ];
    $notify = Notify::find($id);
    return view('pages.notify-detail',['pageConfigs' => $pageConfigs,'notify' => $notify]);
  }

  public function getAdd() {
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['link'=>"notify-list",'name'=>"Notify"], ['name'=>"Add Notify"]
    ];
    return view('pages.notify-add',['breadcrumbs' => $breadcrumbs]);
  }

  public function postAdd(Request $request) {
    $notify = new Notify();
    $notify->title = $request->input('title');
    $notify->description = $request->input('description');
    $notify->save();
    return redirect()->route('notify-list');
  }

  public function getEdit($id) {
    $notify = Notify::find($id);
    $notify_title = Notify::where('id', $id)->value('title');
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['link'=>"notify-list",'name'=>"Notify"], ['name'=>$notify_title]
    ];
    return view('pages.notify-edit',['breadcrumbs' => $breadcrumbs, 'notify' => $notify]);
  }

  public function postEdit(Request $request, $id) {
    $notify = Notify::find($id);
    $notify->title = $request->input('title');
    $notify->description = $request->input('description');

    if($notify->save()) {
      $request->session()->flash('success', $notify->title . ' has been updated');
    } else {
      $request->session()->flash('error', 'There was an error updating the notify');
    }

    return redirect()->route('notify-list');
  }

  public function getDelete($id) {
    $notify = Notify::find($id);
    $notify->delete($id);
    return redirect()->route('notify-list');
  }
}
