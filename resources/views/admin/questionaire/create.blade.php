@extends('layouts.adminn')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Add Questionaire</h4>
                        </div>
                        <div class="card-body">

                            {!! Form::open(['method'=>'POST','action'=>'AdminQuestionaireController@store']) !!}
                            <div class="row">
                                <div class="col-md-12">


                                    <div class="form-group bmd-label-floating">
                                        {!! Form::label('category_id','Title:') !!}
                                        {!! Form::select('category_id',[''=>'Select one']+$category,null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating ">
                                        {!! Form::label('body','Description') !!}
                                        {!! Form::textarea('body',null,['class'=>'form-control ','rows'=>3]) !!}
                                    </div>
                                    @if ($errors->has('body'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>
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