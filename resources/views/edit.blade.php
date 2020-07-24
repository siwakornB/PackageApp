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
    if(path != ''){
        foreach
    }

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

            initialPreview: [url1, url2],
            initialPreviewAsData: true,
            initialPreviewConfig: [
            {caption: "Moon.jpg", downloadUrl: url1, size: 930321, width: "120px", key: 1},
            {caption: "Earth.jpg", downloadUrl: url2, size: 1218822, width: "120px", key: 2}
        ],
        });
</script>
@endpush