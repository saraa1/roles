@extends('layouts.adminn')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Edit Remedy</h4>

                        </div>
                        <div class="card-body">



                            {!! Form::model($remedy,['method'=>'PATCH','action'=>['RemediesController@update',$remedy->id]]) !!}

                            <div class="row">
                                <div class="col-md-12">


                                    <div class="form-group bmd-label-floating">
                                        {!! Form::textarea('name',null,['class'=>'form-control','rows'=>2]) !!}

                                    </div>
                                    {!! Form::hidden('questionaire_id',$remedy->questionaire_id,null) !!}

                                </div>
                            </div>
                            <div class="form-group form-inline">

                            <div class="form-group">
                                {!! Form::submit('Update ',['class'=>'btn btn-warning pull-right']) !!}
                            </div>

                            <div class="clearfix"></div>
                            {!! Form::close() !!}
                            {!! Form::open(['method'=>'DELETE','action'=>['RemediesController@destroy',$remedy->id]]) !!}
                            <div class="form-group ml-2">
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop