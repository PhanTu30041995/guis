@extends('layouts/contentLayoutMaster')

@section('title', '')

@section('content')
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <div class="title mb-2">
                      <h1>{{ $notify->title }}</h1>
                      <p>Last updated on {{ $notify->updated_at }}</p>
                  </div>
                  {!! $notify->description !!}
              </div>
          </div>
      </div>
  </div>
@endsection
