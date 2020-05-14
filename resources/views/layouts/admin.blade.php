<!doctype html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    {{-- for datetime picker--}}



    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
</head>
<body>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5">
{{--            <a href="#" class="img logo rounded-circle mb-5" style="background-image: url({{asset('/images/logo.jpg')}});"></a>--}}
            <img height=100  class="img logo rounded-circle mb-5" src="{{Auth::user()->photo ? Auth::user()->photo->path: 'https://placehold.it/400x400'}}"  >
           <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Patient</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{route('admin.patient.index')}}">All Patients</a>
                        </li>
                        <li>
                            <a href="{{route('admin.patient.create')}}">Add Patient</a>
                        </li>

                    </ul>
                </li>
               <li class="active">
                   <a href="#psSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Psychiatrist</a>
                   <ul class="collapse list-unstyled" id="psSubmenu">
                       <li>
                           <a href="{{route('admin.psychiatrist.index')}}">All Psychiatrists</a>
                       </li>
                       <li>
                           <a href="{{route('admin.psychiatrist.create')}}">Add Psychiatrist</a>
                       </li>

                   </ul>
               </li>
               <li class="active">
                   <a href="#catSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categories</a>
                   <ul class="collapse list-unstyled" id="catSubmenu">
                       <li>
                           <a href="{{route('admin.category.index')}}">All Categories</a>
                       </li>
                       <li>
                           <a href="{{route('admin.category.create')}}">Add Categories</a>
                       </li>



                   </ul>
               </li>
               <li class="active">
                   <a href="#quesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Questionaire</a>
                   <ul class="collapse list-unstyled" id="quesSubmenu">
                       <li>
                           <a href="{{route('admin.questionaire.index')}}">All Questionaire</a>
                       </li>
                       <li>
                           <a href="{{route('admin.questionaire.create')}}">Add Questionaire</a>
                       </li>


                   </ul>
               </li>
{{--               <li class="active">--}}
{{--                   <a href="#remSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Remedies</a>--}}
{{--                   <ul class="collapse list-unstyled" id="remSubmenu">--}}

{{--                       <li>--}}
{{--                           <a href="{{route('remedy.create')}}">Add Remedies</a>--}}
{{--                       </li>--}}


{{--                   </ul>--}}
{{--               </li>--}}



                           <li>
                               <a href="{{route('person.edit',Auth::id())}}">Profile Information</a>
                           </li>
            </ul>

            <div class="footer">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav navbar-right  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>

                        @if(Auth::check())
                        <li class="dropdown nav-item">
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

       @yield('content')
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main1.js')}}"></script>



</body>
</html>