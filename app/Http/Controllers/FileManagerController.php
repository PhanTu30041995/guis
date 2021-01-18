<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;

class FileManagerController extends Controller
{
    public function getList()
    {
      $pageConfigs = [
          'pageHeader' => false,
          'contentLayout' => "content-left-sidebar",
          'bodyClass' => 'file-manager-application',
          'sidebarCollapsed' => true

      ];

      $dir = '/';
      $recursive = false;
      $contents = collect(Storage::cloud()->listContents($dir, $recursive))->where('type', '!=' ,'dir');
      // dd($contents);
      return view('pages.file-manager', ['pageConfigs' => $pageConfigs, 'contents' => $contents]);
    }

    public function postUpload(Request $request) {
      $file = $request->file('uplodedfile');
      $filename = $file->getClientOriginalName();
      // $filename = time().'.'.$filename;
      $filedata = File::get($request->file('uplodedfile'));
      Storage::cloud()->put($filename, $filedata);
      return redirect()->back();
    }

    public function getDownload($path, $name) {
      $contents = collect(Storage::cloud()->listContents('/', false))->where('type', 'file')->where('path', $path)->first();
      $filename_download = $name;

      $rowData = Storage::cloud()->get($path);
      return response($rowData, 200)
      ->header('Content-Type', $contents['mimetype'])
      ->header('Content-Disposition', "attachment; filename=$filename_download");
      return redirect()->back();
    }

    public function getDelete($path) {
      $folderinfo = collect(Storage::cloud()->listContents('/', false))->where('type', 'file')->where('path', $path)->first();
      Storage::cloud()->delete($folderinfo['path']);
      return redirect()->route('file-manager');
    }
}
