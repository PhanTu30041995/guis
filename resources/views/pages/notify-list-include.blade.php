
<div class="card">
  <div class="card-content">
    <div class="card-body">
      <div class="table-responsive">
        @role('admin')
          <a href="{{ route("notify-add") }}" class="btn btn-outline-primary mb-1 text-primary float-right">Add New</a>
        @endrole
        <table class="table mb-0 text-center">
          <thead>
              <tr>
                <th scope="col" style="width: 5%;" class="center">ID</th>
                <th scope="col" class="text-left">Title</th>
                @role('admin')
                <th scope="col" style="width: 50px;">Edit</th>
                @endrole
                @role('admin')
                <th scope="col" style="width: 50px;">Delete</th>
                @endrole
              </tr>
            </thead>
            <tbody>
              @foreach ($notify as $item)
                <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td class="text-left"><a href="{{ route('pages.notify.detail',['id' => $item->id]) }}">{{ $item->title }}</a></td>
                  @role('admin')
                  <td class="text-center">
                    <a href="{{ route('notify-edit', ['id' => $item->id]) }}" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>
                  </td>
                  @endrole
                  @role('admin')
                  <td class="text-center">
                    <form action="{{ route('notify-delete', ['id' => $item->id]) }}" class="delete_form">
                      <button type="button" class='btn btn-xs btn-danger btnDelete'><i class="feather icon-trash"></i></button>
                    </form>
                  </td>
                  @endrole
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="text-center">
        {{ $notify->links() }}
      </div>
    </div>
  </div>
</div>
