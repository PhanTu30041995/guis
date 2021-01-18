<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;

class DocumentController extends Controller
{
    public function create_document() {
      Storage::cloud()->put('test.txt', 'Storage 3');
      dd('created');
    }

    public function upload_file() {
      $filename = 'SampleXLSFile';
      $filepath = public_path('uploads/document/SampleXLSFile_38kb.xls');
      $filedata = File::get($filepath);
      Storage::cloud()->put($filename, $filedata);
      return 'File Uploaded';
    }

    public function upload_image() {
      $filename = 'Ms Hoa';
      $filepath = public_path('uploads/avatars/1608693937.jpg');
      $filedata = File::get($filepath);
      Storage::cloud()->put($filename, $filedata);
      return 'Image Uploaded';
    }

    public function upload_video() {
      $filename = 'Big Buck Bunny';
      $filepath = public_path('uploads/videos/big_buck_bunny.mp4');
      $filedata = File::get($filepath);
      Storage::cloud()->put($filename, $filedata);
      return 'Video Uploaded';
    }

    public function list_document() {
      $dir = '/';
      $recursive = false;
      $contents = collect(Storage::cloud()->listContents($dir, $recursive));
      dd($contents);
    }

    public function create_folder() {
      Storage::cloud()->makeDirectory('Storage 3');
      dd('created folder');
    }

    public function rename_folder() {
      $folderinfo = collect(Storage::cloud()->listContents('/', false))->where('type', 'dir')->where('name', 'document_new')->first();
      Storage::cloud()->move($folderinfo['path'], 'document');
      dd('renamed folder');
    }

    public function delete_folder() {
      $folderinfo = collect(Storage::cloud()->listContents('/', false))->where('type', 'dir')->where('name', 'document')->first();
      Storage::cloud()->delete($folderinfo['path']);
      dd('deleted folder');
    }

    public function read_data() {
      $dir = '/';
      $recursive = false;
      $contents = collect(Storage::cloud()->listContents($dir, $recursive))->where('type', '!=' ,'dir');
      return view('pages.document', ['contents' => $contents]);
    }

    public function getDelete($path) {
      $folderinfo = collect(Storage::cloud()->listContents('/', false))->where('type', 'file')->where('path', $path)->first();
      Storage::cloud()->delete($folderinfo['path']);
      return redirect()->route('document');
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
}
