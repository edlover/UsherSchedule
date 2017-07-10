<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title', 'Usher Scheduler')
        </title>

        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='/css/ushers.css' type='text/css'>
        <script src='/js/usher.js'></script>
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

        @stack('head')

    </head>
    <body>
        <div class='container-fluid'>

            @if(Session::get('warning_msg') != null)
                <div class='warning_msg'>{{ Session::get('warning_msg') }}</div>
            @endif
            @if(Session::get('good_msg') != null)
                <div class='good_msg'>{{ Session::get('good_msg') }}</div>
            @endif


            <header>

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

                <nav class="navbar navbar-default row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#COTMNavbar" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src='/images/COTMMobileHeader.png' class='img-responsive' alt='Church of the Messiah'></a>
                    </div>
                    <div class="collapse navbar-collapse" id="COTMNavbar">
                        <ul class="nav navbar-nav">
                            @if(Auth::check())
                                <li role='presentation' id='navpart1' ><a href="/">Worship Services</a></li>
                                <li role='presentation' id='navpart2' ><a href="/service/new">Create New Service</a></li>
                                <li role='presentation' id='navpart3' ><a href='/teams'>Usher Teams</a></li>
                                <li role='presentation' id='navpart4' ><a href='/usher/new'>Create New Usher</a></li>
                            @else
                                <li role='presentation' id='navpart1' ><a href="/">Worship Services</a></li>
                            @endif
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::check())
                                <form method='POST' id='logout' class='login-out' action='/logout'>
                                    {{csrf_field()}}
                                        <li><span id='username'>{{ $user->name }}</span></li>
                                        <li><a href='#'>Logout</a></li>
                                </form>
                            @else
                                <ul class='login-out'>
                                    <li><a href='/login'>Login</a></li>
                                </ul>
                            @endif
                        </ul>

                </nav>

            </header>

            <section>
                @yield('content')
            </section>

            <footer class='row'>
                &copy; copyright {{ date('Y') }}. <a href='https://www.messiahgwynedd.org/' target='_blank'>Church of the Messiah</a>. All Rights Reserved.
            </footer>

            @stack('body')
        </div>
    </body>
</html>
