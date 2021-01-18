<?php
use App\Http\Controllers\LanguageController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
  $run = Artisan::call('config:clear');
  $run = Artisan::call('cache:clear');
  $run = Artisan::call('config:cache');
  return 'FINISHED';
});


// Document
Route::get('upload_file','DocumentController@upload_file');
Route::get('upload_image','DocumentController@upload_image');
Route::get('upload_video','DocumentController@upload_video');

Route::get('list_document','DocumentController@list_document');
Route::get('create_document','DocumentController@create_document');
Route::get('create_folder','DocumentController@create_folder');
Route::get('rename_folder','DocumentController@rename_folder');
Route::get('delete_folder','DocumentController@delete_folder');



// Route url
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

  Route::get('/document','DocumentController@read_data')->name('document');
  Route::get('/document-delete-{path}','DocumentController@getDelete')->name('document-delete');
  Route::get('/document-download-{path}/{name}','DocumentController@getDownload')->name('document-download');

  // Route Dashboards
  Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

  // Route roll-call
  Route::get('/roll-call-add', 'RollcallController@getAdd')->name('roll-call-add');
  Route::post('/roll-call-add-{user_id}', 'RollcallController@postAdd')->name('roll-call-add');

  Route::get('/roll-call-edit-end', 'RollcallController@getAddEnd')->name('roll-call-edit-end');
  Route::post('/roll-call-edit-end-{id}', 'RollcallController@postAddEnd')->name('roll-call-edit-end');

  Route::get('/roll-call-edit-{id}', 'RollcallController@getEdit')->name('roll-call-edit');
  Route::post('/roll-call-edit-{id}', 'RollcallController@postEdit')->name('roll-call-edit');

  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/roll-call-delete-{id}', 'RollcallController@getDelete')->name('roll-call-delete');
  });

  Route::get('/roll-call', 'RollcallController@getIndex')->name('roll-call');
  Route::get('/roll-call-{year}-{month}', 'RollcallController@getIndexByYear');

  // Route Notify
  Route::get('/notify-list', 'NotifyController@getIndex')->name('notify-list');
  Route::get('/notify-detail-{id}', 'NotifyController@getDetail')->name('pages.notify.detail');
  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/notify-add', 'NotifyController@getAdd')->name('notify-add');
    Route::post('/notify-add', 'NotifyController@postAdd')->name('notify-add');
    Route::get('/notify-edit-{id}', 'NotifyController@getEdit')->name('notify-edit');
    Route::post('/notify-edit-{id}', 'NotifyController@postEdit')->name('notify-edit');
    Route::get('/notify-delete-{id}', 'NotifyController@getDelete')->name('notify-delete');
  });

  // Users Pages
  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/app-user-list', 'UserPagesController@user_list')->name("app-user-list");
    Route::get('/app-user-edit-{id}', 'UserPagesController@user_edit')->name("app-user-edit");
    Route::post('/app-user-edit-{id}', 'UserPagesController@post_user_edit')->name("app-user-edit");
    Route::get('/app-user-delete-{id}', 'UserPagesController@user_delete')->name("app-user-delete");
  });

  // Permissions
  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/permissions-list', 'PermissionsController@getList')->name("permissions-list");
    Route::get('/permissions-add', 'PermissionsController@getAdd')->name("permissions-add");
    Route::post('/permissions-add', 'PermissionsController@postAdd')->name("permissions-add");
    Route::get('/permissions-edit-{id}', 'PermissionsController@getEdit')->name("permissions-edit");
    Route::post('/permissions-edit-{id}', 'PermissionsController@postEdit')->name("permissions-edit");
    Route::get('/permissions-delete-{id}', 'PermissionsController@getDelete')->name("permissions-delete");
  });

  // Roles
  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/roles-list', 'RolesController@getList')->name("roles-list");
    Route::get('/roles-add', 'RolesController@getAdd')->name("roles-add");
    Route::post('/roles-add', 'RolesController@postAdd')->name("roles-add");
    Route::get('/roles-edit-{id}', 'RolesController@getEdit')->name("roles-edit");
    Route::post('/roles-edit-{id}', 'RolesController@postEdit')->name("roles-edit");
    Route::get('/roles-delete-{id}', 'RolesController@getDelete')->name("roles-delete");
  });

  // locale Route
  Route::get('lang/{locale}',[LanguageController::class,'swap']);

  //File Manager
  // Route::get('/document','DocumentController@read_data')->name('document');
  // Route::get('/document-delete-{path}','DocumentController@getDelete')->name('document-delete');
  // Route::get('/document-download-{path}/{name}','DocumentController@getDownload')->name('document-download');

  Route::get('/file-manager', 'FileManagerController@getList')->name("file-manager");
  Route::get('/file-manager-delete-{path}', 'FileManagerController@getDelete')->name("file-manager-delete");
  Route::get('/file-manager-download-{path}/{name}', 'FileManagerController@getDownload')->name("file-manager-download");
  Route::post('/file-manager-upload', 'FileManagerController@postUpload')->name("file-manager-upload");
});
