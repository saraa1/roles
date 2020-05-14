
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Psychiatrist Panel
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="dark-edition">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset('img/sidebar-3.jpg')}}">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo text-info simple-text logo-normal"><a href="" class="simple-text logo-normal">
                IIDAC
            </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <div class="card card-profile mt-5 pt-2">
                    <div class="card-avatar">

                        <img class="img" src="{{asset(Auth::user()->photo ? Auth::user()->photo->path : 'https://placehold.it/400x400')}}" />

                    </div>

                </div>

                @if(Auth::user()->role->name=='psychiatrist')
                <li class="nav-item active  ">
                    <a class="nav-link" href="{{route('psychiatrist.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role->name=='admin')
                <li class="nav-item active  ">
                    <a class="nav-link" href="{{url('/admin')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif
                <li class=" nav-item ">
                    <a  href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="material-icons">person</i>Patient</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li >
                            <a class="nav-link ml-5" href="{{route('admin.patient.index')}}">All Patients</a>
                        </li>
                        <li >
                            <a class="nav-link ml-5" href="{{route('admin.patient.create')}}">Add Patient</a>
                        </li>

                    </ul>
                </li>
                @if(Auth::user()->role->name=='admin')
                <li class=" nav-item ">
                    <a  href="#psySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="material-icons">person</i>Psychiatrist</a>
                    <ul class="collapse list-unstyled" id="psySubmenu">
                        <li >
                            <a class="nav-link ml-5" href="{{route('admin.psychiatrist.index')}}">All Psychiatrist</a>
                        </li>
                        <li >
                            <a class="nav-link ml-5" href="{{route('admin.psychiatrist.create')}}">Add Psychiatrist</a>
                        </li>

                    </ul>
                </li>
                @endif


                <li class="nav-item">
                    <a href="#catSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link " >
                        <i class="material-icons">content_paste</i>Disabilities</a>
                    <ul class="collapse list-unstyled" id="catSubmenu">
                        <li>
                            <a class="nav-link ml-5" href="{{route('admin.category.index')}}">All Disabilities</a>
                        </li>
                        <li>
                            <a class="nav-link ml-5" href="{{route('admin.category.create')}}">Add Disability</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="#quesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="material-icons">library_books</i>Questionaire</a>
                    <ul class="collapse list-unstyled" id="quesSubmenu">
                        <li>
                            <a  class="nav-link ml-5" href="{{route('admin.questionaire.index')}}">All Questionaire</a>
                        </li>
                        <li>
                            <a  class="nav-link ml-5" href="{{route('admin.questionaire.create')}}">Add Questionaire</a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.questionaire.index')}}">
                        <i class="material-icons">bubble_chart</i>
                        <p>Remedies</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/psychiatrist',Auth::user()->id)}}">
                        <i class="material-icons">person</i>
                        <p>Profile Information</p>
                    </a>
                </li>
                {{--

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/patient_questionaire')}}">
                                        <i class="material-icons">library_books</i>
                                        <p>Questionnaire</p>
                                    </a>
                                </li>

                                {{--                <li class="nav-item ">--}}
                {{--                    <a class="nav-link" href="">--}}
                {{--                        <i class="material-icons">content_paste</i>--}}
                {{--                        <p>Table List</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--              --}}
                {{--                <li class="nav-item ">--}}
                {{--                    <a class="nav-link" href="./icons.html">--}}
                {{--                        <i class="material-icons">bubble_chart</i>--}}
                {{--                        <p>Icons</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item ">--}}
                {{--                    <a class="nav-link" href="./map.html">--}}
                {{--                        <i class="material-icons">location_ons</i>--}}
                {{--                        <p>Maps</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/logout')}}">
                        <i class="material-icons">Logout</i>
                        <p>Logout</p>
                    </a>
                </li>
                <!-- <li class="nav-item active-pro ">
                      <a class="nav-link" href="./upgrade.html">
                          <i class="material-icons">unarchive</i>
                          <p>Upgrade to PRO</p>
                      </a>
                  </li> -->
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">

                <div class="collapse navbar-collapse justify-content-end">

                    <ul class="navbar-nav">

                        @if(Auth::check())
                            <li class="nav-item dropdown mr-5">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out" style="padding-left: 1rem"></i>Logout</a></li>
                                </ul>

                            </li>
                        @endif


                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        @yield('content')



    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Filters</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="badge-colors ml-auto mr-auto">
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-warning" data-color="orange"></span>
                        <span class="badge filter badge-danger" data-color="danger"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Images</li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('img/sidebar-1.jpg')}}" alt="">
                </a>
            </li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('img/sidebar-2.jpg')}}" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('img/sidebar-3.jpg')}}" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('img/sidebar-4.jpg')}}" alt="">
                </a>
            </li>

        </ul>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
<script src="https://unpkg.com/default-passive-events"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="{{asset('js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-dashboard.js?v=2.1.0')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('demo/demo.js')}}"></script>
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

    });
</script>
</body>

</html>