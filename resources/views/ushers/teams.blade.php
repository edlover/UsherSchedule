@extends('layouts.master')

@section('title')
    Ushering Teams
@endsection

@section('content')
    <main id='part3'>
        <h1>Ushering Teams</h1>
        @foreach($teams as $team)
            <h3 class='teamName'>{{ $team->team_name }}</h3>
            <div class="table-responsive">
                <table class='table table-striped table-hover'>
                    <tr>
                        <th class='columnhide'>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Team Capitan?</th>
                        <th>Email</th>
                        <th>Modify</th>
                    </tr>
                        @foreach($team->ushers as $usher)
                            <tr>
                                <td class='columnhide'>{{ $usher['id'] }}</td>
                                <td>{{ $usher['first_name'] }}</td>
                                <td>{{ $usher['last_name'] }}</td>
                                <td>
                                    @if($usher['capitan'] === 1)
                                        yes
                                    @else
                                        no
                                    @endif
                                </td>
                                <td>{{ $usher['email'] }}</td>
                                <td><a href='/ushers/edit/{{ $usher['id'] }}'>edit/delete</a></td>
                            </tr>
                        @endforeach
                </table>
            </div>
        @endforeach
    </main>
@endsection
