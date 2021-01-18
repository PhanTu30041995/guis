@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','File Manager')
@section('vendor-styleFile ManagerFile Manager')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-file-manager.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-list-view.css')}}">
@endsection

{{-- sidebar included --}}
@include('pages.app-file-manager-sidebar')

@section('content')
<!-- overlay container -->
<div class="file-manager-content-overlay"></div>

<!-- file manager app content starts -->
  <div class="file-manager-main-content">
      <!-- bottom content starts -->
      <div class="bottom-content p-2">
        <!-- files area starts here -->
        <div class="files">
          <div class="row">
            <div class="col-12">
              <div class="d-flex justify-content-between mb-75">
                <span class="font-medium-3"> Files </span>
              </div>
            </div>
          </div>
          <div class="row">
            @foreach ($contents as $item)
              <div class="col-md-6 col-lg-3">
                <div class="card files-info">
                  <div class="card-content">
                    <div class="content-logo d-flex align-items-center justify-content-center position-relative">
                      <div class="sidebar-top-icon">
                        <span class="feather icon-more-vertical text-muted" id="dropdownMenuLinkfile2" data-toggle="dropdown" role="button" aria-expanded="false">
                        </span>
                        <div class="dropdown-menu dropdown-menu-right" style="padding: 10px" aria-labelledby="dropdownMenuLinkfile2">
                          <form action="{{ route('file-manager-delete',['path' => $item['path']]) }}" class="delete_form">
                            <button type="button" class="btn btn-xs btn-danger btnDelete" style="width: 100%; margin-bottom: 10px;"><i class="feather icon-trash"></i> Delete</button>
                          </form>
                          <a href="{{ route('file-manager-download', ['path' => $item['path'], 'name' => $item['name']]) }}" class="btn btn-xs btn-success"><i class="feather icon-download"></i> Download</a>
                        </div>
                      </div>
                      <div class="logo">

                        <iframe src="https://drive.google.com/file/d/{{ $item['path'] }}/preview" height="150"></iframe>
                      </div>
                    </div>
                    <div class="card-body py-75">
                      <div class="app-file-name small font-weight-bold">{{ $item['name'] }}</div>
                      <div class="app-file-size small text-muted mb-25">
                        @php
                          echo ($item["size"] >= 1024) ?  floor($item["size"] / 1024)." KB" : $item["size"]." byte";
                        @endphp
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <!-- files area starts ends -->

        <!-- folders area starts here -->
        {{-- <div class="folders-cards">
          <div class="row">
            <div class="col-12">
              <div class="d-flex justify-content-between mb-75">
                <span class="font-medium-3"> Folders </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-content py-50 px-1 folder-info">
                  <div class="d-flex justify-content-between align-items-center">
                    <span><i class="feather icon-folder font-medium-5"></i></span>
                    <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Trina Lynes" class="avatar pull-up">
                        <img class="media-object rounded-circle" src="{{asset('images/portrait/small/avatar-s-1.jpg')}}" alt="Avatar" height="30" width="30">
                      </li>
                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Lilian Nenez" class="avatar pull-up">
                        <img class="media-object rounded-circle" src="{{asset('images/portrait/small/avatar-s-2.jpg')}}" alt="Avatar" height="30" width="30">
                      </li>
                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Alberto Glotzbach" class="avatar pull-up">
                        <img class="media-object rounded-circle" src="{{asset('images/portrait/small/avatar-s-3.jpg')}}" alt="Avatar" height="30" width="30">
                      </li>
                    </ul>
                  </div>
                    <h6 class="font-medium-2 mb-0">Analytics</h6>
                  <div class="text-small-3 text-muted">15 files</div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- folders area  ends here -->




      </div>
        <!-- right side bar ends here -->
    </div>
      <!-- bottom content ends -->
</div>
<!-- file manager app content ends -->
@endsection
{{-- @section('vendor-script')
<script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
@endsection --}}
{{-- page styles --}}
@section('page-script')
{{-- <script src="{{asset('js/scripts/pages/app-file-manager.js')}}"></script> --}}
@endsection
