@extends('layouts.adminn')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div>
                <h1 class="text-warning">
                    <center><b>Questionaires for Intellactual Disabilities</b></center>
                </h1>
                <p class="text-white">Click on any questionaire to go through the test for that particular disability or
                    add questions to the questionaire</p></div>
            <div class="card-body">

                <div class="row">
                    @foreach($ques as $ques)

                        <div class="col-xl-6 col-lg-12">

                            <a href="{{route('admin.questionaire.show',$ques->id)}}">
                                <div class="card">
                                    <div class="card-header card-header-info">
                                        <b>{{$ques->category->name}}</b>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">{{$ques->body}}</h4>
                                    </div>
                                    <div class="card-footer text-white">
                                        <div class="form-inline">
                                            {!! Form::open(['method'=>'GET','action'=>['QuestionController@create',$ques->id]]) !!}

                                            <div class="form-group">
                                                {!! Form::submit('Add Questions',['class'=>'btn btn-warning ']) !!}
                                            </div>
                                            {!! Form::close() !!}

                                            {!! Form::open(['method'=>'GET','action'=>['RemediesController@create',$ques->id]]) !!}

                                            <div class="form-group ml-2">
                                                {!! Form::submit('Remedies',['class'=>'btn btn-success ']) !!}
                                            </div>
                                            {!! Form::close() !!}
                                            {!! Form::open(['method'=>'Delete','action'=>['AdminQuestionaireController@destroy',$ques->id]]) !!}

                                            <div class="form-group ml-2">
                                                {!! Form::submit('Delete',['class'=>'btn btn-danger ']) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>

                                    </div>
                                </div>

                            </a>
                        </div>

                    @endforeach
                </div>


            </div>

        </div>
    </div>


@stop
