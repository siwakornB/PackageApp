@extends('page_layout')
@section('title',$id)
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@endif
<div class="container col-10">
    <form method="post" action="{{ action('HomeController@update',$id) }}" id="form" enctype='multipart/form-data'>
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
                <input id="file-1" type="file" name="file[]" multiple>
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

        $(document).ready(function () {

        $('#openBtn').click(function () {
            $('#myModal').modal({
                show: true
            })
        });

        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            console.log($(this).closest("img"));
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });

        
        
        });

        

</script>
@endpush