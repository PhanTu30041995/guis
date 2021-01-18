<?php

namespace App\Http\Controllers;

use App\Notify;
use App\Roll_call;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  // Dashboard
  public function dashboard(){
    $pageConfigs = [
        'pageHeader' => false
    ];
    $user_id = Auth::user()->id;
    $notify = Notify::orderBy('id','DESC')->orderBy('updated_at','DESC')->paginate(3);
    $dt = Carbon::now('Asia/Ho_Chi_Minh');
    $dt_date = $dt->toDateString();
    $date_now = Roll_call::where('user_id', $user_id)->whereDate('date', $dt_date)->value('date');

    return view('pages.dashboard', [
        'pageConfigs' => $pageConfigs,
        'notify' => $notify,
        'dt' => $dt,
        'user_id' => $user_id,
        'dt_date' => $dt_date,
        'date_now' => $date_now
    ]);
  }
}

