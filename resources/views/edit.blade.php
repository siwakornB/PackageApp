@extends('page_layout')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@endif
<div class="container col-10">
    <form method="post" action="{{ action('HomeController@update',$id) }}" id="form" enctype='multipart/form-data'>
        {{csrf_field()}}
        <div class="form-group">
        @foreach($value as $key => $row)
            @foreach($columns as $col)
            <p>{{ $col }}</p>
            <input type="text" name="{{ $col }}" class="form-control" placeholder="{{$row->$col}}" value="{{$row->$col}}"/>
            <br>
            @endforeach
        @endforeach
        </div> 
        <div class="media">
            @isset($path)
                @foreach($path as $p => $e)
                <img src="{{ asset($e->path)}}" class="img-thumbnail img-fluid">
                @endforeach
            @else
                <h1>No image found</h1>
            @endif
        </div>
        <div class="form-group">
                <input id="file-1" type="file" name="file[]" multiple>
        </div>
            <button type="submit" class="btn btn-primary">
            {{ __('submit') }}
            </button>
        
    </form>
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