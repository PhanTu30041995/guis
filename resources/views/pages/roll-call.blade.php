
@extends('layouts/contentLayoutMaster')

@section('title', 'Roll call')

@section('content')
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="mb-2">
      <label>Year</label>
      <select name="year" onchange="Timecard.redirect(this)">
        @foreach ($years as $item_year)
        <option value="{{ $item_year }}" {{ $year == $item_year ? 'selected' : ''}}>{{ $item_year }}</option>
        @endforeach
      </select>
      <label>Month</label>
      <select name="month" onchange="Timecard.redirect(this)">
        @foreach ($months as $item_month)
        <option value="{{ $item_month }}" {{ $month == $item_month ? 'selected' : ''}}>{{ $item_month }}</option>
        @endforeach
      </select>
    </div>
    <div class="card">
        <div class="card-content">
          <div class="table-responsive">
              <table class="table mb-0 text-center" id="data-table">
                <thead>
                  <tr>
                      <th width="10%">Date</th>
                      <th width="10%">Begin</th>
                      <th width="10%">End</th>
                      <th width="10%">Work time</th>
                      <th width="10%">Over time</th>
                      <th>Note</th>
                      <th width="50px">Edit</th>
                      @role('admin')
                      <th width="50px">Delete</th>
                      @endrole
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roll as $item)
                  @if (Auth::user()->id == $item->user_id)
                  <tr>
                    <td>{{ date('m/d', strtotime($item->date)) }}</td>
                    <td>{{ date('G:i', strtotime($item->begin)) }}</td>
                    <td>
                      @if($item->end == "")
                      <form method="POST" action="{{ route('roll-call-edit-end', ['id' => $item->id]) }}">
                        @csrf
                        <textarea name="end" class="roll-call-time setHeight"></textarea>
                        <button class="btn btn-primary btn-inline btn-submit">{{ __('End') }}</button>
                      </form>
                      @endif

                      @if($item->end != "")
                        {{ date('G:i', strtotime($item->end)) }}
                        @else
                        {{$item->end}}
                      @endif
                    </td>
                    <td>
                      @if(date('G', strtotime($item->end)) < date('G', strtotime($item->begin)) && date('G', strtotime($item->end)) != 0)
                      <span class="text-danger">time error</span>
                      @endif

                      @if($item->worktime == NULL)
                        {{$item->worktime}}
                      @else
                        {{date('G:i', strtotime($item->worktime))}}
                      @endif
                    </td>
                    <td>
                      @if($item->overtime == NULL)
                        {{$item->overtime}}
                      @else
                        {{date('G:i', strtotime($item->overtime))}}
                      @endif
                    </td>
                    <td>
                      {!! $item->note !!}
                    </td>
                    <td>
                      <a href="{{ route('roll-call-edit', ['id' => $item->id]) }}" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>
                    </td>
                    @role('admin')
                    <td>
                      <form action="{{ route('roll-call-delete', ['id' => $item->id]) }}" class="delete_form">
                        <button type="button" class='btn btn-xs btn-danger btnDelete'><i class="feather icon-trash"></i></button>
                      </form>
                    </td>
                    @endrole
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
              <table class="table mb-0 text-center bg-success text-white">
                <tr>
                    <td width="10%"><b>Total hours:</b></td>
                    <td width="10%"></td>
                    <td width="10%"></td>
                    <td width="10%"><b>@if($worktime > 0) {{ $worktime }} @endif</b></td>
                    <td width="10%"><b>{{ $overtime }}</b></td>
                    <td></td>
                    <td width="50px"></td>
                </tr>
              </table>
          </div>
          {{-- <div class="text-center">
            {{ $roll->links() }}
          </div> --}}
        </div>
    </div>
  </div>
</div>
@endsection

@section('page-script')
<script src="{{ asset('js/timecard.js') }}"></script>
@endsection
