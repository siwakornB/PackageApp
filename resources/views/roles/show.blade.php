@extends('page_layout')
@section('title','ค้นหา')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <strong>{{ Session::get('success')}}</strong>
    </div>
@endif
<div id="role_management" style="font-family:Prompt">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>แสดงรายละเอียด Role</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('roles.index') }}">กลับ</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<br>
<div style="font-size:20px">
<strong>ชื่อ :</strong>
{{ $role->name }}
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">

<div style="font-size:20px">
<strong>การเข้าถึง :</strong>
@if(!empty($rolePermissions))
@foreach($rolePermissions as $v)
<label class="label label-success">{{ $v->name }},</label>
@endforeach
@endif
</div>
</div>
</div>
</div>
</div>
@stop