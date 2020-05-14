@extends('layouts.patient')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div><h1 class="text-warning"><center><b>Questionaires for Intellactual Disabilities</b></center></h1>
                <p class="text-white">Click on any questionaire to go through the test for that particular disability.</p></div>
            <div class="card-body">

            <div class="row">
                @foreach($ques as $ques)

                    <div class="col-xl-4 col-lg-12">

                        <a href="{{url('/patient_questionaire',$ques->id)}}">
                        <div class="card" >
                            <div class="card-header card-header-success">
                                <b>{{$ques->category->name}}</b>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{$ques->body}}</h4>
                            </div>
                            <div class="card-footer text-white">
                                <div>
                                    <i class="material-icons text-white mr-1">access_time</i>{{$ques->created_at ? $ques->created_at->diffForHumans() : ""}}
                                </div>
                            </div>
                        </div>
                        </a>


                    </div>
                @endforeach

            </div>
                {!! Form::open(['method'=>'GET','action'=>'PatientController@index']) !!}


                <div class="form-group">
                    {!! Form::submit('Back',['class'=>'btn btn-info ']) !!}
                </div>
                {!! Form::close() !!}

            </div>
    </div>

@stop