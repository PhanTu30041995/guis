@extends('layouts/contentLayoutMaster')

@section('title', 'Edit User')

@section('content')
<!-- users edit start -->
<section class="users-edit">
  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->
            <div class="mt-1 mb-2">
              <h4 class="media-heading">{{ $user->name }}'s Profile</h4>
            </div>
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            <form method="POST" enctype="multipart/form-data">
              @csrf
              <div class="media mb-2">
                <a class="mr-2 my-25" href="#">
                  <img src="{{ asset("") }}uploads/avatars/{{ $user->avatar }}" alt="users avatar"
                    class="users-avatar-shadow rounded-circle" height="90" width="90">
                </a>
                <div class="mt-2">
                  <p>Update Profile Image</p>
                  <input type="file" name="avatar">
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Name</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="controls">
                      <label>E-mail</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="controls">
                      <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}" name="password" required autocomplete="new-password">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="table-responsive border rounded px-1 ">
                    <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i
                        class="feather icon-lock mr-50 "></i>Roles</h6>
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th width="10%">Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($roles as $role)
                        <tr>
                          <td>{{ $role->name }}</td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="{{ $role->id }}" name="roles[]" value="{{ $role->id }}" class="custom-control-input"
                              @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                              <label class="custom-control-label" for="{{ $role->id }}"></label>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{-- <div class="col-12">
                  <div class="table-responsive border rounded px-1 ">
                    <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i
                        class="feather icon-lock mr-50 "></i>Permission</h6>
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th>Module</th>
                          <th>Read</th>
                          <th>Write</th>
                          <th>Create</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Users</td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox1"
                                class="custom-control-input" checked>
                              <label class="custom-control-label" for="users-checkbox1"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox2"
                                class="custom-control-input"><label class="custom-control-label"
                                for="users-checkbox2"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox3"
                                class="custom-control-input"><label class="custom-control-label"
                                for="users-checkbox3"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox4"
                                class="custom-control-input" checked>
                              <label class="custom-control-label" for="users-checkbox4"></label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Articles</td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox5"
                                class="custom-control-input"><label class="custom-control-label"
                                for="users-checkbox5"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox6"
                                class="custom-control-input" checked>
                              <label class="custom-control-label" for="users-checkbox6"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox7"
                                class="custom-control-input"><label class="custom-control-label"
                                for="users-checkbox7"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox8"
                                class="custom-control-input" checked>
                              <label class="custom-control-label" for="users-checkbox8"></label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Staff</td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox9"
                                class="custom-control-input" checked>
                              <label class="custom-control-label" for="users-checkbox9"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox10"
                                class="custom-control-input" checked>
                              <label class="custom-control-label" for="users-checkbox10"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox11"
                                class="custom-control-input"><label class="custom-control-label"
                                for="users-checkbox11"></label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox12"
                                class="custom-control-input"><label class="custom-control-label"
                                for="users-checkbox12"></label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> --}}
                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                  <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                    Changes</button>
                </div>
              </div>
            </form>
            <!-- users edit account form ends -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

