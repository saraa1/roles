@extends('layouts.adminn')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Add Questions</h4>
                        </div>
                        <div class="card-body">

                            {!! Form::open(['method'=>'POST','action'=>['QuestionController@store',$questionaire->id]]) !!}
                            <input type="hidden" name="questionaire_id" value="{{$questionaire->id}}">

                            <div class="row">
                                <div class="col-md-12">


                                    <div class="form-group bmd-label-floating">
                                        {!! Form::label('question','Question:') !!} <br>
                                        {!! Form::text('question[question]',null,['class'=>'form-control', 'placeholder'=>'Enter Question']) !!}
                                        @if ($errors->has('question.question'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('question.question') }}</strong>
                            </span>
                                        @endif
                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    Answers:
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating ">
                                        {!! Form::label('answer1','1.') !!}
                                        {!! Form::text('answers[][answer]',null,['class'=>'form-control', 'placeholder'=>'Enter Option 1']) !!}
                                        @if ($errors->has('answers.0.answer'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('answers.0.answer') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating ">
                                        {!! Form::label('answer2','2.') !!}
                                        {!! Form::text('answers[][answer]',null,['class'=>'form-control', 'placeholder'=>'Enter Option 2']) !!}
                                        @if ($errors->has('answers.1.answer'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('answers.1.answer') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                </fieldset>
                            </div>


                            <div class="form-group">
                                {!! Form::submit('Add Questions',['class'=>'btn btn-primary pull-right']) !!}
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