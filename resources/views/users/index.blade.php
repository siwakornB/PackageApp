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
<br>
<h2>จัดการบัญชีผู้ใช้</h2>
<br>
</div>
<div class="pull-right">
<a class="btn btn-success" href="{{ route('users.create') }}">สร้างบัญชีผู้ใช้ใหม่</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>No</th>
<th>Name</th>
<th>Email</th>
<th>Roles</th>
<th width="280px">Action</th>
</tr>
@foreach ($data as $key => $user)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>
@if(!empty($user->getRoleNames()))
@foreach($user->getRoleNames() as $v)
<label class="badge badge-success">{{ $v }}</label>
@endforeach
@endif
</td>
<td>
<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">แสดง</a>
<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">แก้ไข</a>
{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
{!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
</td>
</tr>
@endforeach
</table>
</div>
@stop