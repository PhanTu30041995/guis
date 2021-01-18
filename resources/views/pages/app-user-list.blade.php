
@extends('layouts/contentLayoutMaster')

@section('title', 'User')

@section('content')
  <div class="row" id="table-hover-animation">
    <div class="col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              @role('admin')
                <a href="{{ route('register') }}" class="btn btn-outline-primary mb-1 text-primary float-right ml-2">Add New User</a>
                {{-- <a href="{{ route('roles-add') }}" class="btn btn-outline-primary mb-1 text-primary float-right">Add New Role</a> --}}
              @endrole
              <table class="table mb-0 text-center">
                <thead>
                    <tr>
                      <th scope="col" width="5%">ID</th>
                      <th scope="col" width="10%">Name</th>
                      <th scope="col" width="20%" class="text-left">Email</th>
                      <th scope="col" width="10%" class="text-left">Roles</th>
                      <th scope="col" class="text-left">Avatar</th>
                      @role('admin')
                      <th scope="col" style="width: 50px;">Edit</th>
                      @endrole
                      @role('admin')
                      <th scope="col" style="width: 50px;">Delete</th>
                      @endrole
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $item)
                      <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->name }}</a></td>
                        <td class="text-left">{{ $item->email }}</a></td>
                        <td class="text-left">{{ implode(', ', $item->roles()->get()->pluck('name')->toArray()) }}</a></td>
                        <td class="text-left"><img src="{{ asset("") }}uploads/avatars/{{ $item->avatar }}" alt="users avatar"
                          class="users-avatar-shadow rounded-circle" height="50" width="50"></td>
                        @role('admin')
                        <td>
                          <a href="{{ route('app-user-edit', ['id' => $item->id]) }}" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>
                        </td>
                        @endrole
                        @role('admin')
                        <td>
                          <form action="{{ route('app-user-delete', ['id' => $item->id]) }}" class="delete_form">
                            <button type="button" class='btn btn-xs btn-danger btnDelete'><i class="feather icon-trash"></i></button>
                          </form>
                        </td>
                        @endrole
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
