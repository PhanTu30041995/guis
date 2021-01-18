
@extends('layouts/contentLayoutMaster')

@section('title', 'Document')

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
                      <th width="5%">Name</th>
                      <th>Type</th>
                      <th>Filename</th>
                      <th>Mimetype</th>
                      <th>Size</th>
                      <th></th>
                      <th>Download</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($contents as $item)
                      <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['type'] }}</td>
                        <td>{{ $item['filename'] }}</td>
                        <td>{{ $item['mimetype'] }}</td>
                        <td>{{ $item['size'] }}</td>
                        <td><iframe src="https://drive.google.com/file/d/{{ $item['path'] }}/preview" width="300" height="150"></iframe></td>
                        <td>
                          <a href="https://drive.google.com/file/d/{{ $item['path'] }}/view" target="_blank">Download file v1</a><br>
                          <a href="{{ route('document-download', ['path' => $item['path'], 'name' => $item['name']]) }}">Download file v2</a>
                        </td>
                        <td>
                          <form action="{{ route('document-delete',['path' => $item['path']]) }}" class="delete_form">
                            <button type="button" class='btn btn-xs btn-danger btnDelete'><i class="feather icon-trash"></i></button>
                          </form>
                        </td>
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
