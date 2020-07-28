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
                        


            <table id="dtpackage" class="table table-striped" cellspacing="0" width="100%">
            <thead>
                <th>รหัสทรัพย์สิน</th>
                <th>ชื่อทรัพย์สิน</th>
                <th>ชื่อรายการ</th>
                <th>วันที่ทรัพย์สิน</th>
                <th>ราคา/หน่วย</th>
                @can('package-edit')
                <th>Acions</th>
                @endcan
            </thead>
            <tbody>
            @foreach($value as $key => $row)
                <tr>
                @foreach($columns as $col)
                    @if($col != 'Id')
                    <td>{{$row->$col}}</td>
                    @endif
                @endforeach
                @can('package-edit')
                    <td><a href="{{ action('HomeController@edit',$row->Id) }}" class="btn btn-warning">Edit</a>
                        <form method="post" class="delete_form" action="{{action('HomeController@destroy',$row->Id)}}">
                        {{csrf_field()}}

                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                @endcan
                </tr>
            @endforeach
            </tbody>
            </table>
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