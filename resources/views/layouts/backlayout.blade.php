<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Homi - Homi Admin </title>
    <!-- Favicons -->
    <link href="{{asset('img/logo.jpg')}}" rel="icon">
    <link href="{{asset('Dashio/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('Dashio/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('Dashio/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('Dashio/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Dashio/lib/gritter/css/jquery.gritter.css')}}" />
    <!-- Custom styles for this template -->
    <link href="{{asset('Dashio/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('Dashio/css/style-responsive.css')}}" rel="stylesheet">

    <link href="{{asset('/select2/css/select2.min.css')}}" rel="stylesheet" />
    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->


    <!-- Fonts -->

    <!-- CSRF Token -->


</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header site-heading black-bg ">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="{{ url('/task/'. Auth::user()->id.'/index_user') }}" class="logo"><b>Ho<span>Mi</span></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            @if(Auth::user()->tasked->isEmpty()==false) <span class="badge bg-warning">!</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            @if(Auth::user()->tasked->isEmpty()==false) <div class="notify-arrow notify-arrow-orange">
                            </div>
                            @foreach (Auth::user()->tasked as $task)
                            <li text-align="center">

                                <p>You have a new task</p>
                            </li>
                            <li></li>
                            @if($task->user_id==Auth::user()->id)
                            <li>

                                <p>You have been appointed as leader </p>
                            </li>
                            @endif
                            <li>

                                <a href="{{url('/task/'.$task->id.'/profil')}}"> See Task </a>
                            </li>
                            @endforeach
                            @else

                            <li>

                                <p class="green">You have no tasks </p>
                            </li>
                            <li></li>

                            <li>
                                <a href="{{url('/task/'.Auth::user()->id.'/index_user')}}">See All Tasks </a>
                            </li>

                            @endif
                        </ul>
                    </li>



                    @if(Auth::user()->role=='0')
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-bell-o"></i>
                            @if(Auth::user()->unapointed_tasks()->isEmpty()==false) <span
                                class="badge bg-theme04">!</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>

                            <li>
                                <p class="green">
                                    Threre are {{Auth::user()->unapointed_tasks()->count()}} Unappointed tasks
                                </p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc"> Completed Tasks
                                        </div>
                                        <div class="percent">
                                            {{$finish=round(Auth::user()->all_finished_tasks()->count()/Auth::user()->all_tasks()->count()*100)}}
                                            %
                                        </div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                            aria-valuenow="{{Auth::user()->all_finished_tasks()}}" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{$finish}}%">
                                            <span class="sr-only"> {{$finish}}%
                                                Complete (success) </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc"> Appointed </div>
                                        <div class="percent">
                                            {{$apointed=round(Auth::user()->all_tasked()->count()/Auth::user()->all_tasks()->count()*100)}}
                                            %</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar"
                                            aria-valuenow="{{$apointed}}" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{$apointed}}%">
                                            <span class="sr-only">{{$apointed}}% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc"> Unappointed Tasks</div>
                                        <div class="percent">
                                            {{$unapointed=round(Auth::user()->unapointed_tasks()->count()/Auth::user()->all_tasks()->count()*100)}}
                                            %</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                            aria-valuenow="{{$unapointed}}" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{$unapointed}}%">
                                            <span class="sr-only">{{$unapointed}}% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="{{url('/task/index')}}">See All Tasks</a>
                            </li>
                        </ul>
                    </li>

                    @endif
                    <!-- settings end -->
                    <!-- inbox dropdown start-->

                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->

                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li>
                        <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            {{ __('Logout') }}
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                    @endguest
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="{{url('user/'.Auth::user()->id)}}"><img
                                src="{{asset(Auth::user()->image) }}" class="img-circle" width="80"></a></p>
                    <h5 class="centered"> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} </h5>
                    @if(Auth::user()->role=="0")

                    <li class="mt">
                        <a href="{{ url('/user/create') }}">
                            <i class="fa fa-user"></i>
                            <span> Create Members</span>
                        </a>
                    </li>
                    @endif

                    <li class="mt">
                        <a href="{{ url('/user') }}">
                            <i class="fa fa-users"></i>
                            <span> Members</span>
                        </a>
                    </li>
                    <li class="mt">
                        <a href="{{ url('/task/index') }}">
                            <i class="fa fa-tasks"></i>
                            <span>Tasks</span>
                        </a>

                    </li>
                    <li class="mt">
                        <a href="{{ url('/task/'. Auth::user()->id.'/index_user') }}">
                            <i class="fa fa-list"></i>
                            <span> Your Tasks</span>
                        </a>

                    </li>

                    <li class="mt">
                        <a href="{{ url('/welcome') }}">
                            <i class="fa fa-desktop"></i>
                            <span> To Front Page</span>
                        </a>

                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->

        <section id="main-content">

            <section class="wrapper">
                <div class="row" style="padding:20px;">


                    @yield('content')
                </div>
            </section>

            <!--main content end-->
        </section>










        <!--footer start-->
        <footer class=" site-footer">
            <div class="text-center">


                <p>
                    &copy; Copyrights <strong>Homi</strong>. All Rights Reserved
                </p>
                <div class="credits">



                    Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
                </div>
                <a href="index.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->


    </section>





    <!--script for this page-->





    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('Dashio/lib/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('Dashio/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('Dashio/lib/jquery.dcjqaccordion.2.7.js')}}">
    </script>
    <script src="{{asset('Dashio/lib/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('Dashio/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('Dashio/lib/jquery.sparkline.js')}}"></script>
    <!--common script for all pages-->
    <script type="text/javascript" src="{{asset('Dashio/lib/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{asset('Dashio/lib/gritter-conf.js')}}"></script>
    <!--script for this page-->
    <script src="{{asset('Dashio/lib/sparkline-chart.js')}}"></script>
    <script src="{{asset('Dashio/lib/zabuto_calendar.js')}}"></script>
    <script src="{{asset('select2/js/select2.min.js')}}"></script>

    <script src="{{asset('Dashio/lib/jquery.dcjqaccordion.2.7.js')}}" class="include" type="text/javascript">
    </script>
    <script src="{{asset('Dashio/lib/jquery.scrollTo.min.js')}}">
    </script>
    <script src="{{asset('Dashio/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>



    <script src="{{asset('Dashio/lib/common-scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('Dashio/lib/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{asset('Dashio/lib/gritter-conf.js')}}"></script>
    <!---->
    <script type="text/javascript">
    $(document).ready(function() {

        $('.js-example-basic-single').select2();
        $('.js-example-basic-multiple').select2({
            closeOnSelect: false
        });


        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function() {
                return myDateFunction(this.id, false);
            },
            action_nav: function() {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [{
                    type: "text",
                    label: "Special event",
                    badge: "00"
                },
                {
                    type: "block",
                    label: "Regular event",
                }
            ]
        });

    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
    </script>


</body>







</html>
