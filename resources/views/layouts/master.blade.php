<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title', 'Usher Scheduler')
        </title>

        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel='stylesheet' href='/css/ushers.css' type='text/css'>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src='/js/usher.js'></script>
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

        @stack('head')

    </head>
    <body>
        @if(Session::get('warning_msg') != null)
            <div class='warning_msg'>{{ Session::get('warning_msg') }}</div>
        @endif
        @if(Session::get('good_msg') != null)
            <div class='good_msg'>{{ Session::get('good_msg') }}</div>
        @endif


        <header>
            <div class='container-fluid'>
                <div class='row page-header'>
                    <div class='col-xs-1 text-right'>
                        <img src='/images/COTMSymbol.png' id='COTMSymbol' alt='COTM Symbol'>
                    </div>
                    <div class='col-xs-7'>
                        <h1>Church of the Messiah</h1>
                        <h5>The Episcopal Church in Gwynedd Pennsylvania</h5>
                    </div>
                    <div class='col-xs-1 text-right'>
                        <img src='/images/people.png' alt='people icon' id='people_icon'>
                    </div>
                    <div class='col-xs-3'>

                        <h2>Usher Schedule</h2>
                    </div>
                </div>
                <div class='row nav-border'>
                    <div class='col-xs-8'>
                        <ul class='nav nav-tabs'>
                            @if(Auth::check())
                                <li role='presentation' id='navpart1' ><a href="/">Worship Services</a></li>
                                <li role='presentation' id='navpart2' ><a href="/service/new">Create New Service</a></li>
                                <li role='presentation' id='navpart3' ><a href='/teams'>Usher Teams</a></li>
                                <li role='presentation' id='navpart4' ><a href='/usher/new'>Create New Usher</a></li>
                            @else
                                <li role='presentation' id='navpart1' ><a href="/">Worship Services</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class='col-xs-4'>
                        @if(Auth::check())
                            <form method='POST' id='logout' class='login-out' action='/logout'>
                                {{csrf_field()}}
                                <ul>
                                    <li><span id='username'>{{ $user->name }}</span></li>
                                    <li><a href='#'>Logout</a></li>
                                </ul>
                            </form>
                        @else
                            <ul class='login-out'>
                                <li><a href='/login'>Login</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <section>
            @yield('content')
        </section>

        <footer>
            &copy; copyright {{ date('Y') }}. <a href='https://www.messiahgwynedd.org/' target='_blank'>Church of the Messiah</a>. All Rights Reserved.
        </footer>

        @stack('body')

    </body>
</html>
