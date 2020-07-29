@extends('page_layout')
@section('title','ลงทะเบียนคุรุภัณฑ์')
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
    <h1>ลงทะเบียนสินทรัพย์</h1>
    <br>
        <form method="post" action="{{ action('HomeController@store') }}" id="form" enctype='multipart/form-data'>
            {{csrf_field()}}
        <div class="row">

        <div class="col">
            <div class="form-group">
                <p>หน่วยงาน</p>
                <input type="text" name="หน่วยงาน" class="form-control" placeholder="หน่วยงาน"/>
                <br>
            </div>
            <div class="form-group">
                <p>ประเภท</p>
                <input type="text" name="ประเภท" class="form-control" placeholder="ประเภท"/>
                <br>
            </div> 
            <div class="form-group">
                <p>รหัสสินทรัพย์</p>
                <input type="text" name="รหัส" class="form-control" placeholder="รหัสสินทรัพย์"/>
                <br>
            </div> 
            <div class="form-group">
                <p>ชื่อรายการ</p>
                <input type="text" name="ชื่อรายการ" class="form-control" placeholder="ชื่อรายการ"/>
                <br>
            </div> 
            <div class="form-group">
                <p>ยี่ห้อ</p>
                <input type="text" name="ยี่ห้อ" class="form-control" placeholder="ยี่ห้อ"/>
                <br>
            </div> 
            <div class="form-group">
                <p>ชื่อผู้ขาย</p>
                <input type="text" name="ชื่อผู้ขาย" class="form-control" placeholder="ชื่อผู้ขาย"/>
                <br>
            </div> 
            <div class="form-group">
                <p>ที่อยู่ผู้ขาย</p>
                <input type="text" name="ที่อยู่ผู้ขาย" class="form-control" placeholder="ที่อยู่ผู้ขาย"/>
                <br>
            </div> 
            <div class="form-group">
                <p>เบอร์ผู้ขาย</p>
                <input type="text" name="เบอร์ผู้ขาย" class="form-control" placeholder="เบอร์ผู้ขาย"/>
                <br>
            </div>
            <div class="form-group">
                <p>วันที่ได้มา</p>
                <input type="text" name="วันเดือนปี" class="form-control" placeholder="วันที่ได้มา"/>
                <br>
            </div>
            <div class="form-group">
                <p>เอกสารเลขที่</p>
                <input type="text" name="เอกสารเลขที่" class="form-control" placeholder="เอกสารเลขที่"/>
                <br>
            </div>
            <div class="form-group">
                <p>ราคาต่อหน่วย</p>
                <input type="text" name="ราคาต่อหน่วย" class="form-control" placeholder="ราคาต่อหน่วย"/>
                <br>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <p>สินทรัพย์ได้มาโดย</p>
                <input type="text" name="ประเภทเงิน" class="form-control" placeholder="สินทรัพย์ได้มาโดย"/>
                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item">Action</a>
                    <a class="dropdown-item">Another action</a>
                    <a class="dropdown-item">Something else here</a>
                </div>
                </div>
            </div>
            <div class="form-group">
                <p>วิธีการได้มา</p>
                <input type="text" name="วิธีการได้มา" class="form-control" placeholder="วิธีการได้มา"/>
                <br>
            </div>
            <div class="form-group">
                <input id="file-1" type="file" name="file[]" multiple>
            </div>
            
            </div> 
        </div>
    
            <button type="submit" class="btn btn-primary">
            {{ __('submit') }}
            </button>
    </form>
    
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