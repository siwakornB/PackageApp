@extends('page_layout')
@section('title',$id)
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@elseif(Session::has('failed'))
    <div class="alert alert-warning">
        <p>{{ Session::get('failed')}}</p>
    </div>
@endif
<div id="edit_page" class="container col-12" style="font-family:Prompt">
    <br>
    <h1>รายละเอียดข้อมูลสินทรัพย์</h1>
    <br>
        <div class="row">
            <div class="media col-6">
                @isset($path)
                    @foreach($path as $p => $e)
                    <img src="{{ asset($e->path)}}" class="img-thumbnail img-fluid col-6" data-toggle="modal" href="#myModal" id="img{{ $e->id }}" >
                    @endforeach
                @else
                    <h4>No image found</h4>
                @endif
            </div>

        <div class="col">
            <div class="form-group">
                <p>หน่วยงาน</p>
                <h4>{{$value[0]->หน่วยงาน}}</h4>
                <br>
            </div>
            <div class="form-group">
                <p>ประเภท</p>
                <h4>{{$value[0]->ประเภท}}</h4>
                <br>
            </div> 
            <div class="form-group">
                <p>รหัสสินทรัพย์</p>
                <h4>{{$value[0]->รหัส}}</h4>
                <br>
            </div> 
            <div class="form-group">
                <p>ชื่อรายการ</p>
                <h4>{{$value[0]->ชื่อรายการ}}</h4>
                <br>
            </div> 
            <div class="form-group">
                <p>ยี่ห้อ</p>
                <h4>{{$value[0]->ยี่ห้อ}}</h4>
                <br>
            </div> 
            <div class="form-group">
                <p>ชื่อผู้ขาย</p>
                <h4>{{$value[0]->ชื่อผู้ขาย}}</h4>
                <br>
            </div> 
            <div class="form-group">
                <p>ที่อยู่ผู้ขาย</p>
                <h4>{{$value[0]->ที่อยู่ผู้ขาย}}</h4>
                <br>
            </div> 
            <div class="form-group">
                <p>เบอร์ผู้ขาย</p>
                <h4>{{$value[0]->เบอร์ผู้ขาย}}</h4>
                <br>
            </div>
            <div class="form-group">
                <p>วันที่ได้มา</p>
                <h4>{{$value[0]->วันเดือนปี}}</h4>
                <br>
            </div>
            <div class="form-group">
                <p>เอกสารเลขที่</p>
                <h4>{{$value[0]->เอกสารเลขที่}}</h4>
                <br>
            </div>
            <div class="form-group">
                <p>ราคาต่อหน่วย</p>
                <h4>{{$value[0]->ราคาต่อหน่วย}}</h4>
                <br>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <p>สินทรัพย์ได้มาโดย</p>
                <h4>{{$value[0]->ประเภทเงิน}}</h4>
                <br>
                <p>วิธีการได้มา</p>
                <h4>{{$value[0]->วิธีการได้มา}}</h4>
                <br>
            </div> 
        </div>
    </div>
    
    
</div>
@stop
