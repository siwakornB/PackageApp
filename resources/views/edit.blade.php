@extends('page_layout')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@endif
    <form method="POST" action="{{ route('add.update') }}">
        {{csrf_field()}}
        @foreach($value as $key => $row)
            @foreach($columns as $col)
        <div class="form-group">
            <input type="text" name="{{ $col }}" class="form-control" placeholder="{{$row->$col}}" />
        </div>
            @endforeach
        @endforeach
        <div class="form-group">
            <input type="text" name="pass" class="form-control" placeholder="2" />
        </div>
        <div class="form-group">
            <input type='file' name='file' >
            <button type="submit" class="btn btn-primary">
            {{ __('submit') }}
            </button>
        </div>
    </form>