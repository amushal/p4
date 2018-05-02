<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="My Contacts">
    <meta name="author" content="Ala Mushal">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/dist/css/bootstrap-admin.css" rel="stylesheet">

    <link href="/css/styles.css" rel="stylesheet">

    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    @yield('header-scripts')

</head>

<body id="wrapper">

<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'MyContacts') }}
        </a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> @if (Auth::check()) {{ Auth::user()->name }} @endif
                <i class="fa fa-caret-down"></i>

            </a>
            <ul class="dropdown-menu dropdown-user">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <form method="GET" action="{{ route('contacts.search') }}">

                            <div class="input-group">
                                <input id="search"
                                       type="text"
                                       class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}"
                                       placeholder='Search...'
                                       name="search"
                                       value="{{ old('Search') }}"
                                       required>

                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                            </div>
                        </form>
                    </div>
                </li>
                <li>
                    <a href="{{url('/')}}"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                </li>
                <li>
                    <a href="{{route('contacts.index')}}"><i class="fa fa-th-list fa-fw"></i> Contacts</a>
                </li>
                @if (Auth::check())
                    <li>
                        <a><i class="fa fa-th-list ffa fa-tags"></i> Tags</a>
                            <ul>
                                <li class='tags'>
                                    @foreach($tags as $tag)

                                    <div>
                                        <a href="/contacts/tags/{{ $tag }}"><i class="fa fa-tag"></i> {{ $tag }}</a>
                                    </div>

                                    @endforeach

                                </li>
                            </ul>
                        {{--<ul>--}}
                        {{--<li class='tags'>                       --}}
                        {{--<a href="{{route('contacts.index')}}"><i class="fa fa-tag"></i>--}}
                        {{--Male</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">@yield('page-header')</h3>
        </div>
    </div>

    @yield('page-content')

</div>

<script src="{{ URL::asset('jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/bootstrap/dist/js/bootstrap.min.js"></script>

@yield('footer-scripts')


</body>
</html>