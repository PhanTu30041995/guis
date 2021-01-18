@if(session('success'))
<div class="alert alert-success" role="alert">
  <p class="mb-0">
    {{ session('success') }}
  </p>
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning" role="alert">
  <p class="mb-0">
    {{ session('warning') }}
  </p>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">
  <p class="mb-0">
    {{ session('error') }}
  </p>
</div>
@endif
