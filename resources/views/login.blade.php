@extends('page_layout')
@section('content')
    <div class="login-form" >
        <div class="col-lg-12">
            <h3 align="center">ลงทะเบียน</h3>
            <form method="POST" action="{{ url('/login') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="user" class="form-control" placeholder="user" />
                </div>
                <div class="form-group">
                    <input type="text" name="pass" class="form-control" placeholder="password" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop