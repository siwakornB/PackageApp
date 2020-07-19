@extends('page_layout')
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
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        


            <table id="dtpackage" class="table table-striped" cellspacing="0" width="100%">
            <thead>
                <th>รหัสทรัพย์สิน</th>
                <th>ชื่อทรัพย์สิน</th>
                <th>วันที่ทรัพย์สิน</th>
                <th>ราคา/หน่วย</th>
                <th>หน่วยงาน</th>
                <th>Acions</th>
            </thead>
            <tbody>
            @foreach($value as $key => $row)
                <tr>
                @foreach($columns as $col)
                    <td>{{$row->$col}}</td>
                @endforeach
                    <td><a href="{{ action('HomeController@edit',$row->รหัส) }}" class="btn btn-warning">Edit</a>
                        <form method="post" class="delete_form" action="{{action('HomeController@destroy',$row->รหัส)}}">
                        {{csrf_field()}}

                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
@stop
@push('scripts')
            <script type="text/javascript">
            

            $(document).ready( function () {
                $('#dtpackage').DataTable();
            } );
        
            </script>


@endpush