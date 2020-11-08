<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Homi</title>

    <link href="{{asset('img/logo.jpg')}}" rel="icon">


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('Dashio/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
        type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>


    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <!-- Page Header -->
        <header class="masthead sticky-top" style="position: fixed;
    width: 100%; top:0; ">
            <!--     <div>
                <div class="row">


                    <img src="{{url('img/header-bg.png')}}" class="center"
                        style="  display: block;margin: auto; height: fit-content;  max-height: 50%;  width: 100%;  max-width: 100%;"
                        alt="">
                    <p></p>


                </div>
            </div> -->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <b>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{url('img/logo.jpg')}}" width="40"></img> Homi
                        </a>
                    </b>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <h5><b>
                                    <li class="nav-item">

                                        <a class="nav-link" href="{{url('/contactus')}}">
                                            <i class="fa fa-file-text"></i> complaints </a>
                                    </li>
                                </b>
                            </h5>

                            @guest
                            <h5><b>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="fa fa-sign-in"></i>
                                            {{ __('Login') }}</a>
                                    </li>
                                </b>
                            </h5>

                            @else
                            <h5><b>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/task/'. Auth::user()->id.'/index_user') }}">
                                            <i class="fa fa-desktop"></i> Admin </a>
                                    </li>
                                </b>
                            </h5>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa-sign-out"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <h5><b>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <td>
                                                <img src="{{asset(Auth::user()->image) }}" class="img-circle"
                                                    width="30">
                                            </td>
                                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span
                                                class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class=" fa fa-sign-out"></i> {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>

                                </b>
                            </h5>

                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>


        </header>

    </div>






    <br>
    <section id="main-content">
        <div class="container">
            <br>


            @yield('content')
        </div>
    </section>
    <!-- Bootstrap core JavaScript -->

    <footer position:absolute; bottom:0; height: 100px; width: 100%;" class=" site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <p class="copyright text-muted">Copyright &copy; HOMI</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>





</body>






</html>