@extends('layouts.patient')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Profile</h4>
                            <p class="card-category">Complete your profile</p>
                        </div>
                        <div class="card-body">

                            {!! Form::model($user,['method'=>'PATCH','action'=>['PatientController@update',Auth()->user()->id],'files'=>true]) !!}




{{--                                <div class="row">--}}
{{--                                    <div class="col-md-5">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Company (disabled)</label>--}}
{{--                                            <input type="text" class="form-control" disabled>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Username</label>--}}
{{--                                            <input type="text" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Email address</label>--}}
{{--                                            <input type="email" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Fist Name</label>--}}
{{--                                            <input type="text" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Last Name</label>--}}
{{--                                            <input type="text" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row">
                                    <div class="col-md-12">
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Adress</label>--}}
{{--                                            <input type="text" class="form-control">--}}
{{--                                        </div>--}}


                                        <div class="form-group bmd-label-floating">
                                            {!! Form::label('name','Name') !!}
                                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                                        </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating ">
                                            {!! Form::label('email','Email') !!}
                                            {!! Form::text('email',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating  " style="margin-top: 1rem">
                                            {!! Form::label('password','Password') !!}
                                            {!! Form::text('password',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top: 1rem">
                                            {!! Form::label('is_active','Status:') !!}
                                            {!! Form::select('is_active',[''=>'Choose Option',1=>'Active',0=>'Not Active'],null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            <div class="row" >
                                <div class="col-md-12">

                                {!! Form::label('Choose Picture','') !!}
                                {!! Form::file('photo_id') !!}
                                </div>
                            </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group text-white">--}}


{{--                                            {!! Form::label('Choose Picture','') !!}--}}
{{--                                            {!! Form::file('photo_id') !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">City</label>--}}
{{--                                            <input type="text" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Country</label>--}}
{{--                                            <input type="text" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Postal Code</label>--}}
{{--                                            <input type="text" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>About Me</label>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>--}}
{{--                                                <textarea class="form-control" rows="5"></textarea>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <button type="submit" class="btn btn-primary pull-right">Update Profile</button>--}}
                            <div class="form-inline">


                                {!! Form::open(['method'=>'GET','action'=>'PatientController@index']) !!}


                                <div class="form-group">
                                    {!! Form::submit('Back',['class'=>'btn btn-info ']) !!}
                                </div>
                                {!! Form::close() !!}

                            <div class="form-group">
                                {!! Form::submit('Update ',['class'=>'btn btn-primary pull-right']) !!}
                            </div>
                            </div>
                                <div class="clearfix"></div>
                                {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">

                                <img class="img" src="{{asset($user->photo ? $user->photo->path : 'https://placehold.it/400x400')}}" />

                        </div>
                        <div class="card-body">

                            <h4 class="card-title">{{$user->name}}</h4>
                            <p class="card-description">
                                You can edit your account information from here.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop