@section('content-sidebar')
<div class="sidebar-file-manager" id="sidebar-file-manager-toggle">
  <div class="sidebar-inner">
      <!-- close icon  -->
          <div class="sidebar-close-icon d-block d-xl-none">
              <i class="feather icon-x"></i>
          </div>
      <!-- close icon ends -->

      <!-- sidebar menu links starts -->
      <div class="sidebar-menu-list">

          <!-- add file button -->
          <div class="form-group text-center px-2 mt-3">
              <form action="{{ route('file-manager-upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="uplodedfile" id="uplodedfile">
                <button type="submit" class="btn btn-xs btn-primary mt-2" id="btnUpload" style="display: none;"><i class="feather icon-plus"></i>Add File</button>
              </form>
          </div>
          <!-- add file button ends -->

          <!-- side bar list items starts  -->
          <div class="list">
              <!-- links for file manager sidebar -->

              {{-- <div class="list-group mt-2">
                  <div class="px-2 border-0 font-weight-bold text-muted">LABELS</div>
                  <a href="" class="list-group-item px-2 list-group-item-action border-0">
                      <i class="feather icon-file-text mr-50 font-medium-3"></i> Documents</a>
                  <a href="{{ route('file-manager-by-type',['type' => 'image']) }}" class="list-group-item px-2 list-group-item-action border-0">
                      <i class="feather icon-image mr-50 font-medium-3"></i> Images</a>
                  <a href="route('file-manager-by-type',['type' => 'mp4'])" class="list-group-item px-2 list-group-item-action border-0">
                      <i class="feather icon-film mr-50 font-medium-3"></i> Videos</a>
                  <a href="javascript:void(0)" class="list-group-item px-2 list-group-item-action border-0">
                      <i class="feather icon-music mr-50 font-medium-3"></i> Audio</a>
                  <a href="javascript:void(0)" class="list-group-item px-2 list-group-item-action border-0 rounded-0">
                      <i class="feather icon-folder mr-50 font-medium-3"></i> Zip Files</a>
              </div> --}}
              <!-- links for file manager sidebar ends -->

              <!-- storage status of file manager starts-->
              {{-- <div class="storage-status mt-2 px-2">
                  <label class="mb-75 font-medium-2 text-muted font-weight-bold">Storage Status</label>
                  <div class="d-flex">
                      <i class="feather icon-save font-large-1"></i>
                      <div class="file-manager-progress ml-1">
                          <span class="text-muted">19.5GB used of 25GB</span>
                          <div class="progress progress-bar-primary progress-sm mb-50 mt-50">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="80" aria-valuemax="100" style="width:80%;"></div>
                          </div>
                      </div>
                  </div>
              </div> --}}
              <!-- storage status of file manager ends-->

          </div>
          <!-- side bar list items ends  -->

      </div>
      <!-- sidebar menu links ends -->
  </div>
</div>
@endsection

@section('page-script')
<script src="{{asset('js/scripts/pages/app-file-manager.js')}}"></script>
<script>
  $(function() {
    $("#uplodedfile").change(function() {
      if($(this).val() != "") $("#btnUpload").show();
    });
  });
</script>
@endsection
