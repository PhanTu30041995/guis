
@extends('layouts/contentLayoutMaster')

@section('title', 'Add User')

@section('vendor-style')
        <!-- vendor css files -->
        <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('content')

<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
      <div class="col-md-12 col-12">
          <div class="card">
              <div class="card-content">
                  <div class="card-body">
                      <form id="myform" class="form form-vertical" method="POST">
                        @csrf
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="first-name-icon">Name</label>
                                          <div class="position-relative has-icon-left">
                                              <input type="text" id="first-name-icon" class="form-control" name="name" placeholder="Name" required>
                                              <div class="form-control-position">
                                              <i class="feather icon-user"></i>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="email-id-icon">Email</label>
                                          <div class="position-relative has-icon-left">
                                              <input type="email" id="email-id-icon" class="form-control" name="email" placeholder="Email" required>
                                              <div class="form-control-position">
                                              <i class="feather icon-mail"></i>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="password-icon">Password</label>
                                          <div class="position-relative has-icon-left">
                                              <input type="password" id="password-icon" class="form-control" name="password" placeholder="Password" required>
                                              <div class="form-control-position">
                                              <i class="feather icon-lock"></i>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  {{-- <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-icon">Role</label>
                                        <div class="position-relative">
                                            <select class="select2 form-control" multiple="multiple" name="roles">
                                              @foreach ($role as $item)
                                                <option>{{ $item->name }}</option>
                                              @endforeach
                                            </select>
                                            <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div> --}}
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

@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset('js/scripts/forms/select/form-select2.js') }}"></script>
@endsection

