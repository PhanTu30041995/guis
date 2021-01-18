
@extends('layouts/contentLayoutMaster')

@section('title', 'Permissions')

@section('content')
  <div class="row" id="table-hover-animation">
    <div class="col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              @role('admin')
                <a href="{{ route("permissions-add") }}" class="btn btn-outline-primary mb-1 text-primary float-right">Add New</a>
              @endrole
              <table class="table mb-0">
                <thead>
                    <tr>
                      <th scope="col" width="5%" class="text-center">ID</th>
                      <th scope="col">Name</th>
                      @role('admin')
                      <th scope="col" style="width: 50px;" class="text-center">Edit</th>
                      @endrole
                      @role('admin')
                      <th scope="col" style="width: 50px;" class="text-center">Delete</th>
                      @endrole
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($permission as $item)
                      <tr>
                        <th scope="row" class="text-center">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        @role('admin')
                        <td class="text-center">
                          <a href="{{ route('permissions-edit', ['id' => $item->id]) }}" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>
                        </td>
                        @endrole
                        @role('admin')
                        <td class="text-center">
                          <form action="{{ route('permissions-delete', ['id' => $item->id]) }}" class="delete_form">
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
