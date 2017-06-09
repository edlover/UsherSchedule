@extends('layouts.master')

@section('content')
    <h1>Register</h1>
    <form method="POST" id='register' action="{{ route('register') }}">
        {{ csrf_field() }}
        <p>* Required fields</p>
        <label for="name">* Name</label>
        <label for="email">* E-Mail Address</label>
        <label for="password">* Password (min: 6)</label>
        <label for="password-confirm">* Confirm Password</label>
        <br>
    </form>
@endsection