<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>IIS: @yield('title')</title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">IIS: Anonymní alkoholici</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/meetings') }}">Meetings</a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin') }}">Users</a>
                </li>
                @endif
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <h1>IIS: @yield('title')</h1>

        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">
            {{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </p>
        @endif
        @endforeach

        @yield('content')

    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
