
@extends('layouts.patient')
@section('content')

    {!! Form::open(['method'=>'POST','action'=>['SurveyController@store',$questionaire->id,\Illuminate\Support\Str::slug($slug)]]) !!}


    <div>
        <h1 class="text-danger mt-5">
            <center><b>{{$questionaire->category->name}}</b></center>
        </h1>
    </div>

    <div class="row m-5">


        <div class="card">
            <div class="card-header card-header-warning">
                <b>{{$questionaire->category->name}}</b>
            </div>
            <div class="card-body ">
                <h4 class="card-title">{{$questionaire->body}}<br>
                    <small>Kindly read the following questions and select only one checkbox otherwise result will not be
                        accurate.</small>
                </h4>


            </div>
            <div class="card-footer text-white">
                {{--                    <div>--}}
                {{--                        <i class="material-icons text-white mr-1">access_time</i>{{$ques->created_at ? $ques->created_at->diffForHumans() : ""}}--}}
                {{--                    </div>--}}
                <div class="card">
                    @foreach($questionaire->question as $key=> $question )
                        <div class="card-header card-header-success">
                            <b>Q{{$key+1}}:{{$question->question}}</b>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answer as $key=>$answer)
                                    <label for='{{$key}}'>
                                        <li class="list-group-item" style="width: 500px">
                                            <div>

                                                <input type="checkbox" value="{{$answer->id}}" name="answer[]">
                                                {{(old('answer[]')==$answer->id ? 'checked' : '')}}
                                                {{$answer->answer}}

                                            </div>
                                        </li>
                                        @endforeach
                                    </label>
                            </ul>
                        </div>

                    @endforeach
                    <div class="card-footer ">


                    </div>
                </div>


            </div>
            <input type="hidden" name="survey[email]" value="{{$user->email}}">
            <input type="hidden" name="survey[name]" value="{{$user->name}}">

            <div class="form-group mr-4">
                {!! Form::submit('Submit',['class'=>'btn btn-primary pull-right']) !!}
            </div>

        </div>


    </div>
    {!! Form::close() !!}

@stop
