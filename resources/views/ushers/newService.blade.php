@extends('layouts.master')

@section('title')
    New service
@endsection

@section('content')
    <main id='part2'>
        <div class='row'>
            <div class='col-xs-12 form-title'>
                <h1>New Worship Service</h1>
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12'>
                <form method='POST' class='form-horizontal' action='/service/new'>
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-xs-2'></div>
                        <div class='col-xs-10'>
                            <p>* Required fields</p>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='date' class='col-xs-2 control-label'>Date *</label>
                        <div class='col-xs-10'>
                            <input type='text' class='form-control' name='date' id='date' size='50' value='{{ date_format($newServiceDate,'Y-m-d') }}' required >
                            <div class='note'>
                                (Suggested next Worship Service date)
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='time' class='col-xs-2 control-label'>Time *</label>
                        <div class='col-xs-10'>
                            <select name='time' class='form-control' id='time'>
                                <option value='12:00 AM' >12:00 AM</option>
                                <option value='12:30 AM' >12:30 AM</option>
                                <option value='1:00 AM' >1:00 AM</option>
                                <option value='1:30 AM' >1:30 AM</option>
                                <option value='2:00 AM' >2:00 AM</option>
                                <option value='2:30 AM' >2:30 AM</option>
                                <option value='3:00 AM' >3:00 AM</option>
                                <option value='3:30 AM' >3:30 AM</option>
                                <option value='4:00 AM' >4:00 AM</option>
                                <option value='4:30 AM' >4:30 AM</option>
                                <option value='5:00 AM' >5:00 AM</option>
                                <option value='5:30 AM' >5:30 AM</option>
                                <option value='6:00 AM' >6:00 AM</option>
                                <option value='6:30 AM' >6:30 AM</option>
                                <option value='7:00 AM' >7:00 AM</option>
                                <option value='7:30 AM' >7:30 AM</option>
                                <option value='8:00 AM' >8:00 AM</option>
                                <option value='8:30 AM' >8:30 AM</option>
                                <option value='9:00 AM' >9:00 AM</option>
                                <option value='9:30 AM' selected >9:30 AM</option>
                                <option value='10:00 AM' >10:00 AM</option>
                                <option value='10:30 AM' >10:30 AM</option>
                                <option value='11:00 AM' >11:00 AM</option>
                                <option value='11:30 AM' >11:30 AM</option>
                                <option value='12:00 PM' >12:00 PM</option>
                                <option value='12:30 PM' >12:30 PM</option>
                                <option value='1:00 PM' >1:00 PM</option>
                                <option value='1:30 PM' >1:30 PM</option>
                                <option value='2:00 PM' >2:00 PM</option>
                                <option value='2:30 PM' >2:30 PM</option>
                                <option value='3:00 PM' >3:00 PM</option>
                                <option value='3:30 PM' >3:30 PM</option>
                                <option value='4:00 PM' >4:00 PM</option>
                                <option value='4:30 PM' >4:30 PM</option>
                                <option value='5:00 PM' >5:00 PM</option>
                                <option value='5:30 PM' >5:30 PM</option>
                                <option value='6:00 PM' >6:00 PM</option>
                                <option value='6:30 PM' >6:30 PM</option>
                                <option value='7:00 PM' >7:00 PM</option>
                                <option value='7:30 PM' >7:30 PM</option>
                                <option value='8:00 PM' >8:00 PM</option>
                                <option value='8:30 PM' >8:30 PM</option>
                                <option value='9:00 PM' >9:00 PM</option>
                                <option value='9:30 PM' >9:30 PM</option>
                                <option value='10:00 PM' >10:00 PM</option>
                                <option value='10:30 PM' >10:30 PM</option>
                                <option value='11:00 PM' >11:00 PM</option>
                                <option value='11:30 PM' >11:30 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='name' class='col-xs-2 control-label' value='{{ old('name') }}'>Service name</label>
                        <div class='col-xs-10'>
                            <input type='text' class='form-control' name='name' id='name' size='50' value='{{ old('name') }}'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='team' class='col-xs-2 control-label'>Usher Team *</label>
                        <div class='col-xs-10'>
                            <select name='team' class='form-control' id='team'>
                                <option value='1' {{ ($nextTeam == '1') ? 'selected' : '' }}>Team 1</option>
                                <option value='2' {{ ($nextTeam == '2') ? 'selected' : '' }}>Team 2</option>
                                <option value='3' {{ ($nextTeam == '3') ? 'selected' : '' }}>Team 3</option>
                                <option value='4' {{ ($nextTeam == '4') ? 'selected' : '' }}>Team 4</option>
                                <option value='5' {{ ($nextTeam == '5') ? 'selected' : '' }}>Team 5</option>
                                <option value='6' >unassigned</option>
                            </select>
                            <div class='note'>
                                (Suggested next usher team on rotation)
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-6 text-center'>
                            <input type='submit' class='btn btn-primary' name='save_button' value='Save changes'>
                            <input type='submit' class='btn btn-default' name='cancel_button' value='Cancel'>
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
    </main>
@endsection
