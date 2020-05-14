@extends('layouts.adminn')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div><h1 class="text-danger"><center><b>Welcome to IIDAC Psychiatrist Panel</b></center></h1></div>
            <div class="card-body">
                <h4 class="text-white mt-5">
                    Welcome, {{Auth::user()->name}} !!
                </h4></div>

            <div class="row">


                <div class="col-xl-5 col-lg-13">
                    <a href="{{route('admin.patient.index')}}">

                        <div class="card card-chart" >
                            <div class="card-header card-header-success">
                              Patient Record
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    You can view all the records of patients as well as add new records for patients.
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
                <div class="col-xl-5 col-lg-13">
                    <a href="{{url('admin/category')}}">

                        <div class="card card-chart" >
                            <div class="card-header card-header-warning">
                                Disabilities
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    You can add intellactuall disabilities or view the existing disabilities.
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
                <div class="col-xl-5 col-lg-13">
                    <a href="{{url('admin/questionaire')}}">

                        <div class="card card-chart" >
                            <div class="card-header card-header-info">
                                Questionaire
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">You can add questions related to the intellactual disability.
                                    you can conduct test for patients and you will be suggested remedies according to test results. To view questionaires,
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
                <div class="col-xl-5 col-lg-13">
                    <a href="{{url('admin/questionaire')}}">

                        <div class="card card-chart" >
                            <div class="card-header card-header-danger">
                                Remedies
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Here are the remedies for every disability. to view them click on it. Even
                                    you can add more remedies
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
                    <a href="{{url('/psychiatrist',Auth::user()->id)}}">

                        <div class="card card-chart" >
                            <div class="card-header card-header-primary">
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
