
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Roles')

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
                                      <label for="first-name-vertical">Name</label>
                                      <input type="text" id="first-name-vertical" class="form-control" name="name" placeholder="Name" value="{{ old('name', isset($role) ? $role->name : null ) }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" value="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
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
