@extends('page_layout')
@section('title','ค้นหา')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@endif
<div id="role_management" style="font-family:Prompt">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>สร้าง Role ใหม่</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('roles.index') }}">กลับ</a>
</div>
</div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<br>
<strong>ชื่อ :</strong>
{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>การเข้าถึง :</strong>
<br/>
@foreach($permission as $value)
<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
{{ $value->name }}</label>
<br/>
@endforeach
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
@stop