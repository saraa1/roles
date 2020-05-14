@extends('layouts.adminn')
@section('content')

    <div><h1 class="text-danger mt-5" ><center><b>{{$ques->category->name}}</b></center></h1></div>

    <div class="row m-5">



        <div class="card" >
            <div class="card-header card-header-warning">
                <b>{{$ques->category->name}}</b>
            </div>
            <div class="card-body ">
                <h4 class="card-title">{{$ques->body}}<br>
                    <small>Kindly read the following questions and if you feel these symptoms then take survey so that it can give you remedies according to the result.</small>
                </h4>
            </div>

            <div class="card-body text-dark form-inline">

                {!! Form::open(['method'=>'GET','action'=>['QuestionController@create',$ques->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Add Questions',['class'=>'btn btn-info ']) !!}
                </div>
                {!! Form::close() !!}
                {!! Form::open(['method'=>'GET','action'=>['SurveyController@show',$ques->id,\Illuminate\Support\Str::slug($ques->category->name)]]) !!}

                <div class="form-group ml-2">
                    {!! Form::submit('Take Survey',['class'=>'btn btn-dark ']) !!}
                </div>
                {!! Form::close() !!}


            </div>

            <div class="card-footer text-white">
                {{--                    <div>--}}
                {{--                        <i class="material-icons text-white mr-1">access_time</i>{{$ques->created_at ? $ques->created_at->diffForHumans() : ""}}--}}
                {{--                    </div>--}}
                <div class="card" >
                    @foreach($ques->question as $key=> $question )
                        <div class="card-header card-header-success">
                            <b>Q{{$key+1}}:{{$question->question}}</b>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answer as $answer)
                                    <li class="list-group-item">{{$answer->answer}}</li><br>
                                @endforeach
                            </ul>
                        </div>


                    <div class="card-footer">
                        {!! Form::open(['method'=>'DELETE','action'=>['QuestionController@destroy',$ques->id,$question->id]]) !!}

                        <div class="form-group mb-5">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger pull-right']) !!}
                        </div>
                        {!! Form::close() !!}


                    </div>
                    @endforeach
                </div>


            </div>

        </div>




    </div>



@stop