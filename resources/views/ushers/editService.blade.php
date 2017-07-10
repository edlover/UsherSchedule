@extends('layouts.master')

@section('title')
    Edit service
@endsection

@section('content')
    <div class='row'>
        <div class='col-xs-12 form-title'>
            <h1>Edit service</h1>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-12'>
            <form method='POST' class='form-horizontal' action='/service/edit'>
                {{ csrf_field() }}
                <div class='row'>
                    <div class='col-xs-2'></div>
                    <div class='col-xs-10'>
                        <p>* Required fields</p>
                    </div>
                </div>
                <input type='hidden' name='id' value='{{ $service->id }}'>

                <div class='form-group'>
                    <label for='date' class='col-xs-2 control-label'>Date *</label>
                    <div class='col-xs-10'>
                        <input type='text' class='form-control' name='date' id='date' size='50' value='{{ old('date', $service->date) }}' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='time' class='col-xs-2 control-label'>Time *</label>
                    <div class='col-xs-10'>
                        <select name='time' class='form-control' id='time'>
                            <option value='12:00 AM' {{ ($service->time == '12:00 AM') ? 'selected' : '' }} >12:00 AM</option>
                            <option value='12:30 AM' {{ ($service->time == '12:30 AM') ? 'selected' : '' }} >12:30 AM</option>
                            <option value='1:00 AM' {{ ($service->time == '1:00 AM') ? 'selected' : '' }} >1:00 AM</option>
                            <option value='1:30 AM' {{ ($service->time == '1:30 AM') ? 'selected' : '' }} >1:30 AM</option>
                            <option value='2:00 AM' {{ ($service->time == '2:00 AM') ? 'selected' : '' }} >2:00 AM</option>
                            <option value='2:30 AM' {{ ($service->time == '2:30 AM') ? 'selected' : '' }} >2:30 AM</option>
                            <option value='3:00 AM' {{ ($service->time == '3:00 AM') ? 'selected' : '' }} >3:00 AM</option>
                            <option value='3:30 AM' {{ ($service->time == '3:30 AM') ? 'selected' : '' }} >3:30 AM</option>
                            <option value='4:00 AM' {{ ($service->time == '4:00 AM') ? 'selected' : '' }} >4:00 AM</option>
                            <option value='4:30 AM' {{ ($service->time == '4:30 AM') ? 'selected' : '' }} >4:30 AM</option>
                            <option value='5:00 AM' {{ ($service->time == '5:00 AM') ? 'selected' : '' }} >5:00 AM</option>
                            <option value='5:30 AM' {{ ($service->time == '5:30 AM') ? 'selected' : '' }} >5:30 AM</option>
                            <option value='6:00 AM' {{ ($service->time == '6:00 AM') ? 'selected' : '' }} >6:00 AM</option>
                            <option value='6:30 AM' {{ ($service->time == '6:30 AM') ? 'selected' : '' }} >6:30 AM</option>
                            <option value='7:00 AM' {{ ($service->time == '7:00 AM') ? 'selected' : '' }} >7:00 AM</option>
                            <option value='7:30 AM' {{ ($service->time == '7:30 AM') ? 'selected' : '' }} >7:30 AM</option>
                            <option value='8:00 AM' {{ ($service->time == '8:00 AM') ? 'selected' : '' }} >8:00 AM</option>
                            <option value='8:30 AM' {{ ($service->time == '8:30 AM') ? 'selected' : '' }} >8:30 AM</option>
                            <option value='9:00 AM' {{ ($service->time == '9:00 AM') ? 'selected' : '' }} >9:00 AM</option>
                            <option value='9:30 AM' {{ ($service->time == '9:30 AM') ? 'selected' : '' }} >9:30 AM</option>
                            <option value='10:00 AM' {{ ($service->time == '10:00 AM') ? 'selected' : '' }} >10:00 AM</option>
                            <option value='10:30 AM' {{ ($service->time == '10:30 AM') ? 'selected' : '' }} >10:30 AM</option>
                            <option value='11:00 AM' {{ ($service->time == '11:00 AM') ? 'selected' : '' }} >11:00 AM</option>
                            <option value='11:30 AM' {{ ($service->time == '11:30 AM') ? 'selected' : '' }} >11:30 AM</option>
                            <option value='12:00 PM' {{ ($service->time == '12:00 PM') ? 'selected' : '' }} >12:00 PM</option>
                            <option value='12:30 PM' {{ ($service->time == '12:30 PM') ? 'selected' : '' }} >12:30 PM</option>
                            <option value='1:00 PM' {{ ($service->time == '1:00 PM') ? 'selected' : '' }} >1:00 PM</option>
                            <option value='1:30 PM' {{ ($service->time == '1:30 PM') ? 'selected' : '' }} >1:30 PM</option>
                            <option value='2:00 PM' {{ ($service->time == '2:00 PM') ? 'selected' : '' }} >2:00 PM</option>
                            <option value='2:30 PM' {{ ($service->time == '2:30 PM') ? 'selected' : '' }} >2:30 PM</option>
                            <option value='3:00 PM' {{ ($service->time == '3:00 PM') ? 'selected' : '' }} >3:00 PM</option>
                            <option value='3:30 PM' {{ ($service->time == '3:30 PM') ? 'selected' : '' }} >3:30 PM</option>
                            <option value='4:00 PM' {{ ($service->time == '4:00 PM') ? 'selected' : '' }} >4:00 PM</option>
                            <option value='4:30 PM' {{ ($service->time == '4:30 PM') ? 'selected' : '' }} >4:30 PM</option>
                            <option value='5:00 PM' {{ ($service->time == '5:00 PM') ? 'selected' : '' }} >5:00 PM</option>
                            <option value='5:30 PM' {{ ($service->time == '5:30 PM') ? 'selected' : '' }} >5:30 PM</option>
                            <option value='6:00 PM' {{ ($service->time == '6:00 PM') ? 'selected' : '' }} >6:00 PM</option>
                            <option value='6:30 PM' {{ ($service->time == '6:30 PM') ? 'selected' : '' }} >6:30 PM</option>
                            <option value='7:00 PM' {{ ($service->time == '7:00 PM') ? 'selected' : '' }} >7:00 PM</option>
                            <option value='7:30 PM' {{ ($service->time == '7:30 PM') ? 'selected' : '' }} >7:30 PM</option>
                            <option value='8:00 PM' {{ ($service->time == '8:00 PM') ? 'selected' : '' }} >8:00 PM</option>
                            <option value='8:30 PM' {{ ($service->time == '8:30 PM') ? 'selected' : '' }} >8:30 PM</option>
                            <option value='9:00 PM' {{ ($service->time == '9:00 PM') ? 'selected' : '' }} >9:00 PM</option>
                            <option value='9:30 PM' {{ ($service->time == '9:30 PM') ? 'selected' : '' }} >9:30 PM</option>
                            <option value='10:00 PM' {{ ($service->time == '10:00 PM') ? 'selected' : '' }} >10:00 PM</option>
                            <option value='10:30 PM' {{ ($service->time == '10:30 PM') ? 'selected' : '' }} >10:30 PM</option>
                            <option value='11:00 PM' {{ ($service->time == '11:00 PM') ? 'selected' : '' }} >11:00 PM</option>
                            <option value='11:30 PM' {{ ($service->time == '11:30 PM') ? 'selected' : '' }} >11:30 PM</option>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='name' class='col-xs-2 control-label' value='{{ old('name', $service->name) }}'>Service name</label>
                    <div class='col-xs-10'>
                        <input type='text' class='form-control' name='name' id='name' size='50' value='{{ old('name', $service->name) }}'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='team' class='col-xs-2 control-label'>Usher Team *</label>
                    <div class='col-xs-10'>
                        <select name='team' class='form-control' id='team'>
                            <option value='1' {{ ($service->team_id == '1') ? 'selected' : '' }}>Team 1</option>
                            <option value='2' {{ ($service->team_id == '2') ? 'selected' : '' }}>Team 2</option>
                            <option value='3' {{ ($service->team_id == '3') ? 'selected' : '' }}>Team 3</option>
                            <option value='4' {{ ($service->team_id == '4') ? 'selected' : '' }}>Team 4</option>
                            <option value='5' {{ ($service->team_id == '5') ? 'selected' : '' }}>Team 5</option>
                            <option value='6' {{ ($service->team_id == '6') ? 'selected' : '' }}>unassigned</option>
                        </select>
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
                        <input type='submit' class='btn btn-danger delete_button' name='delete_button'value='Delete service'>
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

@endsection
