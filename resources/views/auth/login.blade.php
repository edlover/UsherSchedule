@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-xs-12 form-title'>
                <h1>Login</h1>
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12'>
                <form id='login' method="POST" class='form-horizontal' action="/login">
                    {{ csrf_field() }}

                    <div class='form-group'>
                        <label for='email' class='col-xs-2 control-label'>E-Mail Address</label>
                        <div class='col-xs-10'>
                            <input id='email' class='form-control' type='email' name='email' value='{{ old('email') }}' required autofocus>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='password' class='col-xs-2 control-label'>Password</label>
                        <div class='col-xs-10'>
                            <input id='password' class='form-control' type='password' name='password' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-5 text-center'>
                            <button type='submit' class='btn btn-primary'>Login</button>
                        </div>
                    </div>
                </form>
                @if(count($errors) > 0)
                    <div class="row">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-3 alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
