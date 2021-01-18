
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Analytics')


@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset('css/pages/dashboard-analytics.css') }}">
  @endsection

  @section('content')
    {{-- Dashboard Analytics Start --}}
    <section id="dashboard-analytics">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card bg-analytics text-white">
            <div class="card-content">
              <div class="card-body text-center">
                <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left" alt="card-img-left">
                <img src="{{ asset('images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">
                <div class="avatar avatar-xl bg-primary shadow mt-0">
                  <a href="{{ route('roll-call') }}">
                    <div class="avatar-content">
                        <i class="feather icon-award white font-large-1"></i>
                    </div>
                  </a>
                </div>
                <div class="text-center">
                  <h1 class="mb-2"><a href="{{ route('roll-call') }}" class="text-white">Working time today</a></h1>
                  <div class="clock">
                    <div id="Date"></div>
                    <ul>
                      <li id="hours"></li>
                      <li id="point">:</li>
                      <li id="min"></li>
                      <li id="point">:</li>
                      <li id="sec"></li>
                    </ul>
                  </div>

                    @if ($date_now != $dt_date)
                    <form method="POST" action="{{ route('roll-call-add', ['user_id' => $user_id]) }}">
                      @csrf
                      <textarea name="date" id="roll-call-date" class="setHeight"></textarea>
                      <textarea name="begin" class="roll-call-time setHeight"></textarea>
                      <input type="hidden" name="user_id" value="{{ $user_id }}">
                      <button type="submit" class="btn btn-primary btn-inline btn-lg">
                        {{ __('Begin') }}
                      </button>
                    </form>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div id="calendar"></div>

            <h3 class="card-title">Notifies</h3>
            @include('pages.notify-list-include')
        </div>
      </div>
    </section>
  <!-- Dashboard Analytics end -->
  @endsection

@section('page-script')

@endsection
