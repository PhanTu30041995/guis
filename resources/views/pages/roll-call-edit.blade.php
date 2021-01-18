
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Notify')

@section('content')

<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
      <div class="col-md-12 col-12">
          <div class="card">
              <div class="card-content">
                  <div class="card-body">
                      <form id="myform" class="form form-vertical" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                        <table class="table">
                                          <tr>
                                            <td width="50px" class="p-0 border-top-0"><label for="first-name-vertical">Begin: </label></td>
                                            <td width="50px" class="p-0 border-top-0">
                                              <select name="hours_begin">
                                                @foreach ($hours as $item_hour)
                                                <option value="{{ $item_hour }}" {{ date('G', strtotime($roll->begin)) == $item_hour ? 'selected' : '' }}>{{ $item_hour }}</option>
                                                @endforeach
                                              </select>
                                            </td>
                                            <td width="50px" class="p-0 border-top-0"><label for="">hours</label></td>
                                            <td width="50px" class="p-0 border-top-0">
                                              <select name="minute_begin">
                                                @foreach ($minutes as $item_minute)
                                                <option value="{{ $item_minute }}" {{ date('i', strtotime($roll->begin)) == $item_minute ? 'selected' : '' }}>{{ $item_minute }}</option>
                                                @endforeach
                                              </select>
                                            </td>
                                            <td class="p-0 border-top-0"><label for="">minute</label></td>
                                          </tr>
                                        </table>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                      <table class="table">
                                        <tr>
                                          <td width="50px" class="p-0 border-top-0"><label for="first-name-vertical">End: </label></td>
                                          <td width="50px" class="p-0 border-top-0">
                                            <select name="hours_end" id="">
                                              @foreach ($hours as $item_hour)
                                              <option value="{{ $item_hour }}" {{ date('G', strtotime($roll->end)) == $item_hour ? 'selected' : '' }}>{{ $item_hour }}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td width="50px" class="p-0 border-top-0"><label for="">hours</label></td>
                                          <td width="50px" class="p-0 border-top-0">
                                            <select name="minute_end" id="">
                                              @foreach ($minutes as $item_minute)
                                              <option value="{{ $item_minute }}" {{ date('i', strtotime($roll->end)) == $item_minute ? 'selected' : '' }}>{{ $item_minute }}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td class="p-0 border-top-0"><label for="">minute</label></td>
                                        </tr>
                                      </table>
                                    </div>
                                </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                      <label for="first-name-vertical">Note</label>
                                      <fieldset class="form-group">
                                          <textarea name="note" class="form-control" id="basicTextarea">
                                            {{ old('note', isset($roll) ? $roll->note : null ) }}
                                          </textarea>
                                      </fieldset>
                                    </div>
                                </div>
                                <div class="col-12"><input type="hidden" name="worktime" value="{{$roll->worktime}}"></div>
                                <div class="col-12">
                                    <button type="submit" value="submit" class="btn btn-primary mr-1 mb-1">Save Changes</button>
                                    <a href="{{ route('roll-call') }}" type="submit" class="btn btn-primary mr-1 mb-1 text-white">Cancel</a>
                                </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- // Basic Vertical form layout section end -->
@endsection

@section('page-script')
<script type="text/javascript">
  tinymce.init({
      selector: 'textarea#basicTextarea',
      height: 200,
      menubar: false,
      plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
      ],
      toolbar: false,
      content_css: '//www.tiny.cloud/css/codepen.min.css'
  });
</script>
@endsection
