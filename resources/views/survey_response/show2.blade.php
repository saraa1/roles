
@extends('layouts.adminn')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div><h1 class="text-danger"><center><b>Survey Response</b></center></h1></div>
        </div>
        <div class="card-body">
            <h3 class="text-warning mt-5 ml-3">
                Result:
            </h3><br>

            @if($percentage>=70)


                <h4 class="text-white ml-4"> Your calculated result is <b>Poor</b>. So you need following remedies to follow.</h4>
                {{--        <div class="card">--}}
                {{--            {!! Form::select('name',collect($data), null, ['class' => 'form-control']) !!}--}}
                {{--        </div>--}}
                <div class="container-fluid">
                    <div><h3 class="text-info mt-2"><b>Remedies:</b></h3></div>
                </div>
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                            <th>Sr No.</th>
                            <th>Remedies</th>

                            </thead>
                            @foreach($data as $key=>$d)
                                <tbody>
                                <tr>
                                    <td style="width: 100px">{{$key+1}}</td>
                                    <td>{{$d->name}}</td>

                                </tr>

                                </tbody>
                            @endforeach
                        </table>
                        <div class="card-footer">

                            {!! Form::open(['method'=>'GET','action'=>['SurveyResponseController@pdf',$id,$percentage]]) !!}


                            <div class="form-group">
                                {!! Form::submit('Generate Report',['class'=>'btn btn-primary pull-right']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    @elseif($percentage<70 && $percentage>=50)

                        <h4 class="text-white ml-4">Your calculated result is <b>Average</b>. So you need few remedies to follow.</h4>
                        {{--        <div class="card">--}}
                        {{--            {!! Form::select('name',collect($data), null, ['class' => 'form-control']) !!}--}}
                        {{--        </div>--}}
                        <div class="container-fluid">
                            <div><h3 class="text-info mt-2"><b>Remedies:</b></h3></div>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Remedy</th>

                                    </thead>
                                    @foreach($data as $key=>$d)
                                        <tbody>
                                        <tr>
                                            <td style="width: 100px">{{$key+1}}</td>
                                            <td>{{$d->name}}</td>

                                        </tr>

                                        </tbody>
                                    @endforeach
                                </table>
                                <div class="card-footer">

                                    {!! Form::open(['method'=>'GET','action'=>['SurveyResponseController@pdf',$id,$percentage]]) !!}


                                    <div class="form-group">
                                        {!! Form::submit('Generate Report',['class'=>'btn btn-primary pull-right']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                            @else

                                <h4 class="text-white ml-4">Your calculated result is <b>Good</b>. So you do not need any remedies.</h4>

                            @endif
                        </div>
                </div>
        </div>

    </div>

@stop
