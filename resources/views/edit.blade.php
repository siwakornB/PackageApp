@extends('page_layout')
@section('title',$id)
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@endif
<div class="container col-12">
    
        <form method="post" action="{{ action('HomeController@update',$id) }}" id="form" enctype='multipart/form-data'>
            {{csrf_field()}}
            @method('put')
        <div class="row">

        <div class="col">
            <div class="form-group">
                <p>หน่วยงาน</p>
                <input type="text" name="หน่วยงาน" class="form-control" placeholder="{{$value[0]->หน่วยงาน}}" value="{{$value[0]->หน่วยงาน}}"/>
                <br>
            </div>
            <div class="form-group">
                <p>ประเภท</p>
                <input type="text" name="ประเภท" class="form-control" placeholder="{{$value[0]->ประเภท}}" value="{{$value[0]->ประเภท}}"/>
                <br>
            </div> 
            <div class="form-group">
                <p>รหัสสินทรัพย์</p>
                <input type="text" name="รหัส" class="form-control" placeholder="{{$value[0]->รหัส}}" value="{{$value[0]->รหัส}}"/>
                <br>
            </div> 
            <div class="form-group">
                <p>ชื่อรายการ</p>
                <input type="text" name="ชื่อรายการ" class="form-control" placeholder="{{$value[0]->ชื่อรายการ}}" value="{{$value[0]->ชื่อรายการ}}"/>
                <br>
            </div> 
            <div class="form-group">
                <p>ยี่ห้อ</p>
                <input type="text" name="ยี่ห้อ" class="form-control" placeholder="{{$value[0]->ยี่ห้อ}}" value="{{$value[0]->ยี่ห้อ}}"/>
                <br>
            </div> 
            <div class="form-group">
                <p>ชื่อผู้ขาย</p>
                <input type="text" name="ชื่อผู้ขาย" class="form-control" placeholder="{{$value[0]->ชื่อผู้ขาย}}" value="{{$value[0]->ชื่อผู้ขาย}}"/>
                <br>
            </div> 
            <div class="form-group">
                <p>ที่อยู่ผู้ขาย</p>
                <input type="text" name="ที่อยู่ผู้ขาย" class="form-control" placeholder="{{$value[0]->ที่อยู่ผู้ขาย}}" value="{{$value[0]->ที่อยู่ผู้ขาย}}"/>
                <br>
            </div> 
            <div class="form-group">
                <p>เบอร์ผู้ขาย</p>
                <input type="text" name="เบอร์ผู้ขาย" class="form-control" placeholder="{{$value[0]->เบอร์ผู้ขาย}}" value="{{$value[0]->เบอร์ผู้ขาย}}"/>
                <br>
            </div>
            <div class="form-group">
                <p>วันที่ได้มา</p>
                <input type="text" name="วันเดือนปี" class="form-control" placeholder="{{$value[0]->วันเดือนปี}}" value="{{$value[0]->วันเดือนปี}}"/>
                <br>
            </div>
            <div class="form-group">
                <p>เอกสารเลขที่</p>
                <input type="text" name="เอกสารเลขที่" class="form-control" placeholder="{{$value[0]->เอกสารเลขที่}}" value="{{$value[0]->เอกสารเลขที่}}"/>
                <br>
            </div>
            <div class="form-group">
                <p>ราคาต่อหน่วย</p>
                <input type="text" name="ราคาต่อหน่วย" class="form-control" placeholder="{{$value[0]->ราคาต่อหน่วย}}" value="{{$value[0]->ราคาต่อหน่วย}}"/>
                <br>
            </div>
        </div>
        
        <div class="col">
            <div class="form-group">
                <p>สินทรัพย์ได้มาโดย</p>
                <input type="text" name="ประเภทเงิน" class="form-control" placeholder="{{$value[0]->ประเภทเงิน}}" value="{{$value[0]->ประเภทเงิน}}"/>
                <br>
                <p>วิธีการได้มา</p>
                <input type="text" name="วิธีการได้มา" class="form-control" placeholder="{{$value[0]->วิธีการได้มา}}" value="{{$value[0]->วิธีการได้มา}}"/>
                <br>
            <div class="form-group">
                <input id="file-1" type="file" name="file[]" multiple>
            </div>
            
            </div> 
        </div>
    </div>
            <button type="submit" class="btn btn-primary">
            {{ __('submit') }}
            </button>
    </form>
    
    <div class="media">
            @isset($path)
                @foreach($path as $p => $e)
                <img src="{{ asset($e->path)}}" class="img-thumbnail img-fluid" data-toggle="modal" href="#myModal" id="img{{ $e->Id }}" 
                    onclick="showImage(this,img{{ $e->Id }}">
                <form method="post" action="{{ action('HomeController@delimg',$e->Id) }}" id="del-form">
                {{csrf_field()}}
                @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endforeach
            @else
                <h1>No image found</h1>
            @endif
    </div>
</div>

<!-- <a data-toggle="modal" href="#myModal" class="btn btn-primary">Launch modal</a>-->

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title">A</h4>

            </div>
            <div class="container"></div>
            <div class="modal-body">Content for the dialog / modal goes here.
                <br>
                <br>
                <br>
                <img class="modal-content" id="img">
                <br>
                <br>
                <br>

            </div>
            <div class="modal-footer">	
                <a href="#" data-dismiss="modal" class="btn">Close</a>
                <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>


            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script type="text/javascript">
    $("#file-1").fileinput({
            theme: "fas",
            uploadAsync: true,
            allowedFileExtensions: ['jpg', 'png', 'jpeg'],
            overwriteInitial: false,
            maxFileSize:12000,
            maxFileCount: 5,
            showUpload: false,
            
            fileActionSettings :{
                showUpload:false,
            },
            uploadIcon : "<i class='fas fa-upload'></i>",
            removeIcon : "<i class='fas fa-trash-alt'></i>",
            browseIcon : "<i class='fas fa-search-plus'></i>",

            defaultPreviewContent: '',
            initialPreviewAsData: false, // allows you to set a raw markup
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            
            
        });
</script>
@endpush