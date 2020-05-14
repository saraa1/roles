@extends('layouts.adminn')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Create Psychiatrist Profile</h4>
                            <p class="card-category">Complete Psychiatrist profile</p>
                        </div>
                        <div class="card-body">

                            {!! Form::open(['method'=>'POST','action'=>['AdminPsychiatristController@store'],'files'=>true]) !!}

                            <div class="row">
                                <div class="col-md-12">


                                    <div class="form-group bmd-label-floating">
                                        {!! Form::label('name','Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating ">
                                        {!! Form::label('email','Email') !!}
                                        {!! Form::text('email',null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating  " style="margin-top: 1rem">
                                        {!! Form::label('password','Password') !!}
                                        {!! Form::text('password',null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-top: 1rem">
                                        {!! Form::label('is_active','Status:') !!}
                                        {!! Form::select('is_active',[''=>'Choose Option',1=>'Active',0=>'Not Active'],null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('is_active'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('is_active') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-md-12">

                                    {!! Form::label('Choose Picture','') !!}
                                    {!! Form::file('photo_id') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="role_id" value="1">
                            </div>



                            <div class="form-group">
                                {!! Form::submit('Add ',['class'=>'btn btn-primary pull-right']) !!}
                            </div>

                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
