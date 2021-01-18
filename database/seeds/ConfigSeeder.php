<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('config')->insert([
        'config_key' => 'openhour',
        'config_value' => '7',
      ]);
      DB::table('config')->insert([
      'config_key' => 'openminute',
      'config_value' => '30',
    ]);
    DB::table('config')->insert([
      'config_key' => 'closehour',
      'config_value' => '17',
    ]);
    DB::table('config')->insert([
      'config_key' => 'closeminute',
      'config_value' => '00',
    ]);
    DB::table('config')->insert([
      'config_key' => 'timeround',
      'config_value' => '0',
    ]);
    DB::table('config')->insert([
      'config_key' => 'lunchopenhour',
      'config_value' => '11',
    ]);
    DB::table('config')->insert([
      'config_key' => 'lunchopenminute',
      'config_value' => '30',
    ]);
    DB::table('config')->insert([
      'config_key' => 'lunchclosehour',
      'config_value' => '13',
    ]);
    DB::table('config')->insert([
      'config_key' => 'lunchcloseminute',
      'config_value' => '0',
    ]);
    DB::table('config')->insert([
      'config_key' => 'intervalround',
      'config_value' => '0',
    ]);
    }
}
