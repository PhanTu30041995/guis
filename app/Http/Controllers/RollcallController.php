<?php

namespace App\Http\Controllers;

use App\Roll_call;
use App\Config;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Auth;

class RollcallController extends Controller
{
  public function getIndex() {
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['name'=>"Roll call"]
    ];
    $dt = Carbon::now('Asia/Ho_Chi_Minh');
    $time = $dt->toTimeString();
    $year =  $dt->year;
    $month =  $dt->month;
    $roll = Roll_call::where('user_id', Auth::user()->id)->whereYear('date', '=', $year)->whereMonth('date', '=', $month)->get();
    $total_time = Roll_call::where('user_id', Auth::user()->id)->whereYear('date', '=', $year)->whereMonth('date', '=', $month)->sum(Roll_call::raw("TIME_TO_SEC(worktime)"));
    $hours = floor($total_time / 3600);
    $mins = floor($total_time / 60 % 60);
    $worktime = sprintf('%02d:%02d', $hours, $mins);

    $total_time_overtime = Roll_call::where('user_id', Auth::user()->id)->whereYear('date', '=', $year)->whereMonth('date', '=', $month)->sum(Roll_call::raw("TIME_TO_SEC(overtime)"));
    $hours_overtime = floor($total_time_overtime / 3600);
    $mins_overtime = floor($total_time_overtime / 60 % 60);
    $overtime = sprintf('%02d:%02d', $hours_overtime, $mins_overtime);

    $year_array = [];
    for($i = 2020; $i<=2050; $i++)
    $year_array[$i] = $i;

    $month_array = [];
    for($j = 1; $j<=12; $j++)
    $month_array[$j] = $j;

    // $m = 1;
    // $y = 2021;
    // // Start of m
    // $start = new DateTime("{$y}-{$m}-01");
    // $m = $start->format('F');

    // // Prepare results array
    // $results = [];

    // // While same m
    // while($start->format('F') == $m){
    //   // Add to array
    //   $day              = $start->format('l');
    //   $date             = $start->format('j');
    //   $results[$date]   = $day;

    //   // Next Day
    //   $start->add(new DateInterval("P1D"));
    // }

    return view('pages.roll-call',[
      'breadcrumbs' => $breadcrumbs,
      'roll' => $roll,
      'time' => $time,
      'year' => $year,
      'month' => $month,
      'worktime' => $worktime,
      'overtime' => $overtime,
      'years' => $year_array,
      'months' => $month_array,
      // 'results' => $results,
      // 'm' => $m,
      // 'y' => $y
    ]);
  }

  public function getIndexByYear($year, $month) {
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['name'=>"Roll call"]
    ];
    $roll = Roll_call::where('user_id', Auth::user()->id)->whereYear('date', '=', $year)->whereMonth('date', '=', $month)->get();
    $dt = Carbon::now('Asia/Ho_Chi_Minh');
    $time = $dt->toTimeString();
    $total_time = Roll_call::where('user_id', Auth::user()->id)->whereYear('date', '=', $year)->whereMonth('date', '=', $month)->sum(Roll_call::raw("TIME_TO_SEC(worktime)"));
    $hours = floor($total_time / 3600);
    $mins = floor($total_time / 60 % 60);
    $worktime = sprintf('%02d:%02d', $hours, $mins);

    $total_time_overtime = Roll_call::where('user_id', Auth::user()->id)->whereYear('date', '=', $year)->whereMonth('date', '=', $month)->sum(Roll_call::raw("TIME_TO_SEC(overtime)"));
    $hours_overtime = floor($total_time_overtime / 3600);
    $mins_overtime = floor($total_time_overtime / 60 % 60);
    $overtime = sprintf('%02d:%02d', $hours_overtime, $mins_overtime);

    $year_array = [];
    for($i=2020; $i<=2050; $i++)
    $year_array[$i] = $i;

    $month_array = [];
    for($j = 1; $j<=12; $j++)
    $month_array[$j] = $j;

    return view('pages.roll-call',[
      'breadcrumbs' => $breadcrumbs,
      'roll' => $roll,
      'time' => $time,
      'year' => $year,
      'month' => $month,
      'worktime' => $worktime,
      'overtime' => $overtime,
      'years' => $year_array,
      'months' => $month_array
    ]);
  }

  public function postAdd(Request $request, $user_id) {
    $roll = new Roll_call;
    $roll->date = $request->input('date');
    $roll->begin = $request->input('begin');
    $roll->user_id = $request->input('user_id');
    $roll->save();
    return redirect()->route('roll-call',['user_id' => $user_id]);
  }

  public function postAddEnd(Request $request,$id) {
    $roll = Roll_call::find($id);

    $dt = Carbon::now('Asia/Ho_Chi_Minh');
    $time = $dt->toTimeString();
    $year =  $dt->year;
    $month =  $dt->month;
    $total_time = Roll_call::where('user_id', Auth::user()->id)->whereYear('date', '=', $year)->whereMonth('date', '=', $month)->sum(Roll_call::raw("TIME_TO_SEC(worktime)"));
    $hours = floor($total_time / 3600);
    $mins = floor($total_time / 60 % 60);
    $worktime = sprintf('%02d:%02d', $hours, $mins);

    $total_time_overtime = Roll_call::where('user_id', Auth::user()->id)->whereYear('date', '=', $year)->whereMonth('date', '=', $month)->sum(Roll_call::raw("TIME_TO_SEC(overtime)"));
    $hours_overtime = floor($total_time_overtime / 3600);
    $mins_overtime = floor($total_time_overtime / 60 % 60);
    $overtime = sprintf('%02d:%02d', $hours_overtime, $mins_overtime);

    // begin
    $roll->begin = Roll_call::where('id', $id)->value('begin');
    $begin_parsed = date_parse($roll->begin);
    $open = $begin_parsed['hour'] * 60 + $begin_parsed['minute'];

    // end
    $roll->end = $request->input('end');
    $end_parsed = date_parse($roll->end);
    $close = $end_parsed['hour'] * 60 + $end_parsed['minute'];
    $close2 = $close;

    // worktime
    $openhour = Config::where('config_key', 'openhour')->value('config_value');
    $openminute = Config::where('config_key', 'openminute')->value('config_value');

    $status['open'] = intval($openhour) * 60 + intval($openminute);
    if ($open < $status['open']) {
			$open = $status['open'];
    }

    $closehour = Config::where('config_key', 'closehour')->value('config_value');
    $closeminute = Config::where('config_key', 'closeminute')->value('config_value');

    $status['close'] = intval($closehour) * 60 + intval($closeminute);
    if ($status['close'] > 0 && $close > $status['close']) {

			// /*定時間外計算*/
			if($status['close'] < $open){
				$over = $close - $open;
			} else{
				$over = $close - $status['close'];
			}
			// /*定時：終了時間設定*/
			$close = $status['close'];
    } else if($close == $status['close']) {
      $over = $close - $status['close'];
      $close = $status['close'];
    } else {
      $over = '0';
    }

    $lunchopenhour = Config::where('config_key', 'lunchopenhour')->value('config_value');
    $lunchclosehour = Config::where('config_key', 'lunchopenminute')->value('config_value');

    $status['lunchopen'] = intval($lunchopenhour) * 60 + intval($lunchclosehour);

    $lunchclosehour = Config::where('config_key', 'lunchclosehour')->value('config_value');
    $lunchcloseminute = Config::where('config_key', 'lunchcloseminute')->value('config_value');

    $status['lunchclose'] = intval($lunchclosehour) * 60 + intval($lunchcloseminute);

    $intervalsum = 0;
		if ( $open < $status['lunchclose'] && $open > $status['lunchopen'] ){
			if ($status['lunchopen'] < $status['lunchclose']) {
				$intervalsum = $status['lunchclose'] - $open;
			}
		}else if(($open < $status['lunchclose'] && $close > $status['lunchclose']) || ($close2 >= 0 && $close2 <  $status['open'])){
			$intervalsum = $status['lunchclose'] - $status['lunchopen'];
    }


    if($close2 >= 0 && $close2 <  $status['open']){
        $total = (24 * 60) - $open + $close2 ;
        $sum = ($status['close'] - $status['open']) - $intervalsum;
        $over  = $total - ($status['close'] - $status['open']);
    }
    else{
        $sum = $close - $open - $intervalsum;
    }

    if ($sum < 0) {
      $sum = 0;
    }

    $roll->worktime = sprintf('%d:%02d', (($sum - ($sum % 60)) / 60), ($sum % 60));
    $roll->overtime = sprintf('%d:%02d', (($over - ($over % 60)) / 60), ($over % 60));
    $roll->save();
    return redirect()->route('roll-call',[
      'time' => $time,
      'year' => $year,
      'month' => $month,
      'worktime' => $worktime,
      'overtime' => $overtime
    ]);
  }

  public function getDelete($id) {
    $roll = Roll_call::find($id);
    $roll->delete($id);
    return redirect()->route('roll-call');
  }

  public function getEdit($id) {
    $roll = Roll_call::find($id);
    $date = Roll_call::where('id', $id)->value('date');
    $breadcrumbs = [
      ['link'=>"dashboard",'name'=>"Home"], ['link'=>"roll-call",'name'=>"Roll call"], ['name'=>"Edit working time: ".$date]
    ];

    $hour_array = [];
    for($i=0; $i<=23; $i++)
    $hour_array[$i] = $i;

    $monute_array = [];
    for($j=0; $j<=59; $j++)
    $monute_array[$j] = $j;

    return view('pages.roll-call-edit', [
      'breadcrumbs' => $breadcrumbs,
      'roll' => $roll,
      'hours' => $hour_array,
      'minutes' => $monute_array
      ]);
  }

  public function postEdit(Request $request, $id) {
    $roll = Roll_call::find($id);

    if($request->input('note')) {
      $roll->note = $request->input('note');
    }

    // Begin
    $time_hours_begin = $request->input('hours_begin');
    $time_minute_begin = $request->input('minute_begin');
    $roll->begin = $time_hours_begin.':'.$time_minute_begin;
    $open = intval($time_hours_begin) * 60 + intval($time_minute_begin);

    // End
    $time_hours_end = $request->input('hours_end');
    $time_minute_end = $request->input('minute_end');
    $roll->end = $time_hours_end.':'.$time_minute_end;

    $parsed_end = date_parse($roll->end);
    $close = $parsed_end['hour'] * 60 + $parsed_end['minute'];
    $close2 = $close;

    // worktime
    $openhour = Config::where('config_key', 'openhour')->value('config_value');
    $openminute = Config::where('config_key', 'openminute')->value('config_value');

    $status['open'] = intval($openhour) * 60 + intval($openminute);
    if ($open < $status['open']) {
			$open = $status['open'];
    }

    $closehour = Config::where('config_key', 'closehour')->value('config_value');
    $closeminute = Config::where('config_key', 'closeminute')->value('config_value');

    $status['close'] = intval($closehour) * 60 + intval($closeminute);
    if ($status['close'] > 0 && $close > $status['close']) {

			// /*定時間外計算*/
			if($status['close'] < $open){
				$over = $close - $open;
			} else{
				$over = $close - $status['close'];
			}
			// /*定時：終了時間設定*/
			$close = $status['close'];
    } else if($close == $status['close']) {
      $over = $close - $status['close'];
      $close = $status['close'];
    } else {
      $over = '0';
    }

    $lunchopenhour = Config::where('config_key', 'lunchopenhour')->value('config_value');
    $lunchclosehour = Config::where('config_key', 'lunchopenminute')->value('config_value');

    $status['lunchopen'] = intval($lunchopenhour) * 60 + intval($lunchclosehour);

    $lunchclosehour = Config::where('config_key', 'lunchclosehour')->value('config_value');
    $lunchcloseminute = Config::where('config_key', 'lunchcloseminute')->value('config_value');

    $status['lunchclose'] = intval($lunchclosehour) * 60 + intval($lunchcloseminute);

    $intervalsum = 0;
		if ( $open < $status['lunchclose'] && $open > $status['lunchopen'] ){
			if ($status['lunchopen'] < $status['lunchclose']) {
				$intervalsum = $status['lunchclose'] - $open;
			}
		}else if(($open < $status['lunchclose'] && $close > $status['lunchclose']) || ($close2 >= 0 && $close2 <  $status['open'])){
			$intervalsum = $status['lunchclose'] - $status['lunchopen'];
    }

		if($close2 >= 0 && $close2 <  $status['open']){
			$total = (24 * 60) - $open + $close2 ;
			$sum = ($status['close'] - $status['open']) - $intervalsum;
			$over  = $total - ($status['close'] - $status['open']);
		}
		else{
			$sum = $close - $open - $intervalsum;
    }

    if ($sum < 0) {
      $sum = 0;
    }

    $roll->worktime = sprintf('%d:%02d', (($sum - ($sum % 60)) / 60), ($sum % 60));
    $roll->overtime = sprintf('%d:%02d', (($over - ($over % 60)) / 60), ($over % 60));

    $roll->save();
    return redirect()->route('roll-call');
  }
}
