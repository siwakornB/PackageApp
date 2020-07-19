@extends('page_layout')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@endif
    <form method="post" action="{{ action('HomeController@update',$id) }}">
        {{csrf_field()}}
        @method('patch')
        <div class="form-group">
        @foreach($value as $key => $row)
            @foreach($columns as $col)
            <p>{{ $col }}</p>
            <input type="text" name="{{ $col }}" class="form-control" placeholder="{{$row->$col}}" value="{{$row->$col}}"/>
            <br>
            @endforeach
        @endforeach
        </div>
        <div class="form-group">
            <input type='file' name='file' >
            <button type="submit" class="btn btn-primary">
            {{ __('submit') }}
            </button>
        </div>
    </form>
@stop