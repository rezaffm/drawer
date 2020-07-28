<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <div
            class="wrapper"
            :class="{ 'is--mobile': mobile }"
            id="app"
        >

            <div
                id="app-overlay"
                class="overlay"
                :class="{
                    'overlay--active': toggle
                }"
            >
            </div><!--.overlay-->

            <nav
                class="navigation-drawer"
                :class="{
                    'drawer--triggered': toggle,
                }"
            >
                    <perfect-scrollbar>
                    <div>
                        <div class="sidebar--header">
                            <h3><a class="text-light text-decoration-none" href="#">Dashboard</a></h3>
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 4</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 5</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 6</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 7</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 8</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 9</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 10</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light " href="#">Link 11</a>
                            </li>
                        </ul>
                    </div>
                <perfect-scrollbar>
            </nav><!-- navigation-drawer-->

            <nav
                class="tool-bar navbar navbar-light"
                :class="{ 'shift--content': toggle && !mobile}"
            >
              <button
                type="button"
                @click="toggle = !toggle"
                class="btn btn-primary navigation-drawer--toggle"
              >
                Toggle Drawer
              </button>

              <ul class="nav text-primary from-inline">
                <li class="nav-item">
                  <a class="nav-link btn btn-primary" href="#">Home</a>
                </li>
              </ul>
            </nav><!--.tool-bar-->

            <main
              class="content"
              :class="{ 'shift--content': toggle && !mobile }"
            >
              <div class="container-fluid">
               {{-- toggle @{{ toggle }} and mobile @{{ mobile }} --}}
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
               @yield('content')
              </div>
            </main><!--.main-->
        </div><!--.wrapper-->
</body>
</html>
