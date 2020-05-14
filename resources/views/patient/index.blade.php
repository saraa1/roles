@extends('layouts.patient')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div><h1 class="text-warning"><center><b>Welcome to IIDAC</b></center></h1></div>
            <div class="card-body">
                <h4 class="text-white mt-5">If you want to know about which intellactual disability your child is suffering from, then you come to the right place.
                    Following are the intellactual disabilities that we are dealing with. We conduct a test according to the disability selected by you and then from the result, we offer you some remedies which guarentees 100% result. </h4></div>

            <div class="row">


                    <div class="col-xl-5 col-lg-13">
                        <a href="{{url('patient_questionaire')}}">

                        <div class="card card-chart" >
                            <div class="card-header card-header-success">
                               Questionaire
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">You will find questions related to the intellactual disability you are suffering from. After that
                                    you can take test and you will be suggested remedies according to test results. To view questionaires,
                                </h4>

                            </div>
                            <div class="card-footer text-white">
                                <div>
                                 <h4> Click Here!</h4>
                                </div>
                            </div>


                        </div>
                        </a>


                    </div>
                <div class="col-xl-5 col-lg-14">
                    <a href="{{url('/patient',Auth::user()->id)}}">

                    <div class="card card-chart" >
                        <div class="card-header card-header-danger">
                            User Profile
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">You can view your profile here as well as edit/update your profile. To view
                            user profile</h4>
                        </div>
                        <br><br><br>
                        <div class="card-footer text-white mt-5 pt-1">
                            <div>
                                <h4>Click Here!</h4>
                            </div>
                        </div>
                    </div>
                    </a>


                </div>


            </div>
        </div>
    </div>
    @stop
