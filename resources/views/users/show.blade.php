@extends('page_layout')
@section('title','ค้นหา')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@endif
<div id="user_management" style="font-family:Prompt">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>แสดงรายละเอียดผู้ใช้</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('users.index') }}"> กลับ</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<br>
<div style="font-size:20px">
<strong>ชื่อ :</strong>
{{ $user->name }}
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<div style="font-size:20px">
<strong>อีเมล :</strong>
{{ $user->email }}
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<div style="font-size:20px">
<strong>บทบาท :</strong>
@if(!empty($user->getRoleNames()))
@foreach($user->getRoleNames() as $v)
<label class="badge badge-success">{{ $v }}</label>
@endforeach
@endif
</div>
</div>
</div>
</div>
</div>
@stop