@extends('page_layout')
@section('title','ค้นหา')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success')}}</p>
    </div>
@endif
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else 
                            
                        @endguest
                        

<div id="dataPackageTable">
            <table id="dtpackage" class="display  table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>รหัสทรัพย์สิน</th>
                <th>ชื่อทรัพย์สิน</th>
                <th>ชื่อรายการ</th>
                <th>วันที่ทรัพย์สิน</th>
                <th>ราคา/หน่วย</th>
                <th>Acions</th>
            </thead>
            <tbody>
            @foreach($value as $key => $row)
                <tr>
                @foreach($columns as $col)
                    @if($col != 'id')
                    <td>{{$row->$col}}</td>
                    @endif
                @endforeach
                    <td><a href="{{ action('HomeController@show',$row->id) }}" class="btn btn-primary">รายละเอียด</a>
                    
                        @can('package-edit')
                        <a href="{{ action('HomeController@edit',$row->id) }}" class="btn btn-warning">แก้ไข</a>

                        <form method="post" class="delete_form" action="{{action('HomeController@destroy',$row->id)}}">
                        {{csrf_field()}}

                        @method('delete')
                        <button type="submit" class="btn btn-danger">ลบ</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
</div>
@stop
@push('scripts')
            <script type="text/javascript">
            

            $(document).ready( function () {
                $('#dtpackage').DataTable(
                    {
                        @can('package-edit')
                        "columnDefs": [
                            { "orderable": false, "targets": [5] },
                        ]
                        @endcan
                }
                );
            });
        
            </script>


@endpush