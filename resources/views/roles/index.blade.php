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
                <br>
                <h2>Role Management</h2>
                <br>
            </div>
        <div class="pull-right">
        @can('role-create')
        <a class="btn btn-success" href="{{ route('roles.create') }}">สร้าง Role ใหม่</a>
        @endcan
        </div>
    </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
<table class="display  table-bordered" cellspacing="0" width="100%">
    <tr>
    <th>No</th>
    <th>Name</th>
    <th width="280px">Action</th>
    </tr>
    @foreach ($roles as $key => $role)
    <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $role->name }}</td>
    <td>
    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">แสดง</a>
    @can('role-edit')
    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">แก้ไข</a>
    @endcan
    @can('role-delete')
    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
    {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    @endcan
    </td>
    </tr>
    @endforeach
</table>
<br>
</div>
@stop