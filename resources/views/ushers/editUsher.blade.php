@extends('layouts.master')

@section('title')
    Edit usher: {{ $usher->first_name }} {{ $usher->last_name }}
@endsection

@section('content')
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-xs-12 form-title'>
                <h1>Edit usher: <span id='usher'>{{ $usher->first_name }} {{ $usher->last_name }}</span></h1>
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12'>
                <form method='POST' class='form-horizontal' action='/usher/edit'>
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-xs-2'></div>
                        <div class='col-xs-10'>
                            <p>* Required fields</p>
                        </div>
                    </div>
                    <input type='hidden' name='id' value='{{ $usher->id }}'>

                    <div class='form-group'>
                        <label for='first_name' class='col-xs-2 control-label'>First name *</label>
                        <div class='col-xs-10'>
                            <input type='text' class='form-control' name='first_name' id='first_name' size='50' value='{{ old('first_name', $usher->first_name) }}' required >
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='last_name' class='col-xs-2 control-label'>Last Name *</label>
                        <div class='col-xs-10'>
                            <input type='text' class='form-control' name='last_name' id='last_name' size='50' value='{{ old('last_name', $usher->last_name) }}' required >
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-xs-2 control-label'>Usher assigned to: *</label>
                        <div class='col-xs-10'>
                            <ul>
                                @foreach($teamsForCheckboxes as $id => $team_name)
                                    <li><input
                                        type='checkbox'
                                        value='{{ ($team_name == 'unassigned') ? '6' : str_ireplace('Team', '', $team_name) }}'
                                        id='team_{{ str_ireplace('Team ', '', $team_name) }}'
                                        name='teams[]'
                                        class='{{ ($team_name == 'unassigned') ? 'blah' : 'checkboxchecker' }}'
                                        {{ (in_array($team_name, $teamsForThisUsher)) ? 'CHECKED' : '' }}
                                    >&nbsp;
                                    <label>{{ $team_name }}</label></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='capitan' class='col-xs-2 text-right'>Team Capitan</label>
                        <div class='col-xs-10'>
                            <input type='checkbox' name='capitan' id='capitan' {{ ($usher->capitan === 1) ? 'CHECKED' : '' }}> yes
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='email' class='col-xs-2 control-label'>Email *</label>
                        <div class='col-xs-10'>
                            <input type='email' class='form-control' name='email' id='email' value='{{ old('email', $usher->email) }}' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-6 text-center'>
                            <input type='submit' class='btn btn-primary' name='update_button' value='Save changes'>
                            <input type='submit' class='btn btn-default' name='cancel_button' value='Cancel'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-6 text-center'>
                            <input type='submit' class='btn btn-danger delete_button' name='delete_button' value='Delete usher'>
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
