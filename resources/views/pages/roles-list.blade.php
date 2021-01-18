
@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('page-style')
<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
@endsection

@section('content')
  <div class="row" id="table-hover-animation">
    <div class="col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              @role('admin')
                <a href="{{ route("roles-add") }}" class="btn btn-outline-primary mb-1 text-primary float-right">Add New</a>
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
                    @foreach ($role as $item)
                      <tr>
                        <th scope="row" class="text-center">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        @role('admin')
                        <td class="text-center">
                          <a href="{{ route('roles-edit', ['id' => $item->id]) }}" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>
                        </td>
                        @endrole
                        @role('admin')
                        <td class="text-center">
                          <form action="{{ route('roles-delete', ['id' => $item->id]) }}" class="delete_form">
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

@section('page-script')
<script src="{{ asset('js/scripts/sweetalert.min.js') }}"></script>
<script type="text/javascript">

  // BUTTON DELETE
  $(document).on('click', 'button.btnDelete', function (e) {
      e.preventDefault();
      var self = $(this);
      swal({
          title             : "Are you sure?",
          text              : "You will not be able to recover this Album!",
          type              : "warning",
          showCancelButton  : true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText : "Yes, delete it!",
          cancelButtonText  : "No, Cancel delete!",
          closeOnConfirm    : false,
          closeOnCancel     : true
      },
      function(isConfirm){
          if(isConfirm){
              swal("Deleted!","your product has been deleted", "success");
              setTimeout(function() {
                  self.parents(".delete_form").submit();
              }, 2000);
          }
      });
  });

  $(document).ready(function(){
      $(document).ready(function() {
          $('#datatable').DataTable({
              responsive: true,
              "order": [ 1, "asc" ]
          });
      });
  });
</script>
@endsection
