
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
                                        <label for="first-name-vertical">Title</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="title" placeholder="Title" value="{{ old('title', isset($notify) ? $notify->title : null ) }}">
                                      </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                      <label for="first-name-vertical">Description</label>
                                      <fieldset class="form-group">
                                          <textarea name="description" class="form-control tinymce-editor" id="basicTextarea">
                                            {{ old('description', isset($notify) ? $notify->description : null ) }}
                                          </textarea>
                                      </fieldset>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" value="submit" class="btn btn-primary mr-1 mb-1">Save Changes</button>
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
