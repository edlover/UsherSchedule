@extends('layouts.master')

@section('title')
    Worship Services
@endsection

@section('content')
    <main id='part1'>
        <div class='container-fluid'>
            <h1>Usher Team assignments for upcoming Worship Services</h1>

            <div id='tablefilter'>
                Currently showing:
                <select id='teamlist' name='teamlist'>
                    <option value='all'>All teams</option>
                    <option value='Team 1'>Team 1 only</option>
                    <option value='Team 2'>Team 2 only</option>
                    <option value='Team 3'>Team 3 only</option>
                    <option value='Team 4'>Team 4 only</option>
                    <option value='Team 5'>Team 5 only</option>
                </select>
            </div>

            <table id='servicesTable' class='table table-striped table-hover'>
                <thead>
                    <th class='columnhide'>ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Service Name</th>
                    <th>Usher Team</th>
                    <th>Ushers</th>
                    @if(Auth::check())
                        <th>Modify</th>
                    @endif
                </thead>
                @foreach($services as $service)
                    <!-- Only show services with dates in the future -->
                    @if($service['date'] >= Carbon\Carbon::now())
                        <tr>
                            <td class='columnhide'>{{ $service['id'] }}</td>
                            <td><strong>{{ Carbon\Carbon::parse($service['date'])->format('D F j, Y') }}</strong></td>
                            <td>{{ $service['time'] }}</td>
                            <td>{{ $service['name'] }}</td>
                            <td>
                                @if(!($service['team_id'] == 6))
                                    Team {{ $service['team_id'] }}</td>
                                @else
                                    Unassigned
                                @endif
                            <td>
                                @foreach($teams as $team)
                                    @if ($team->id == $service['team_id'])
                                        <ul>
                                            @foreach($team->ushers as $usher)
                                                <li>
                                                    {{ $usher->first_name }} {{$usher->last_name }}
                                                    @if ($usher->capitan == 1)
                                                        <!-- denotes usher as capitan -->
                                                        (c)
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </td>
                            @if(Auth::check())
                                <td><a href='/service/edit/{{ $service['id'] }}'>edit/delete</a></td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </main>
@endsection
