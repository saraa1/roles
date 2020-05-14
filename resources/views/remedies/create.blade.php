@extends('layouts.adminn')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Remedies for {{$questionaire->category->name}}</h4>

                        </div>
                        <div class="card-body">

                            {!! Form::open(['method'=>'POST','action'=>['RemediesController@store',$questionaire->id]]) !!}
                            <input type="hidden" name="questionaire_id" value="{{$questionaire->id}}">

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group bmd-label-floating">
                                        {!! Form::label('name','Remedy') !!}
                                        {!! Form::textarea('name',null,['class'=>'form-control ','rows'=>3]) !!}
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::submit('Create Remedy',['class'=>'btn btn-danger pull-right']) !!}
                            </div>

                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                    <div class="card-body">
                        You can click on remedies to see the details.
                        <div class="row">
                            @foreach($remedy as $key=> $remedy)

                                <div class="col-xl-4 col-lg-12">

                                    <a href="{{route('remedy.show',$remedy->id)}}">
                                        <div class="card">
                                            <div class="card-header card-header-success">
                                                <b>Remedy {{$key+1}}</b>
                                            </div>
                                            <div class="card-body">
                                                {{$remedy->name}}
                                            </div>
                                            <div class="card-footer text-white">
                                                <div class="card-footer text-white">
                                                    <div>
                                                        <i class="material-icons text-white mr-1">access_time</i>{{$remedy->created_at ? $remedy->created_at->diffForHumans() : ""}}
                                                    </div>
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
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
                        {!! Form::open(['method'=>'GET','action'=>'PsychiatristController@index']) !!}


            <div class="form-group">
                {!! Form::submit('Back',['class'=>'btn btn-info ']) !!}
            </div>
            {!! Form::close() !!}

        </div>

{{--    --}}
{{--    --}}
{{--    <div class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header card-header-danger">--}}
{{--                            <h4 class="card-title">Remedies for {{$questionaire->category->name}}</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}

{{--                            @if(count($remedy)>0)--}}
{{--                                @if(Session::has('deleted_user'))--}}
{{--                                    <p class="bg-danger"> {{session('deleted_user')}} </p>--}}
{{--                                @endif--}}

{{--                                @if(Session::has('updated_user'))--}}
{{--                                    <p class="bg-primary"> {{session('updated_user')}} </p>--}}
{{--                                @endif--}}

{{--                                <div class="card">--}}
{{--                                    <div class="card-body table-responsive">--}}
{{--                                        <table class="table table-hover">--}}
{{--                                            <thead class="text-warning active">--}}
{{--                                            <th>Sr No.</th>--}}
{{--                                            <th>Remedy</th>--}}
{{--                                            <th>Created_at</th>--}}
{{--                                            <th>Updated_at</th>--}}
{{--                                            </thead>--}}
{{--                                            @foreach($remedy as $key=>$remedy)--}}
{{--                                                <tbody>--}}
{{--                                                <tr>--}}
{{--                                                    <td>{{$key+1}}</td>--}}
{{--                                                    <td>--}}
{{--                                                        <a href="{{route('remedy.show',$remedy->id)}}">{{$remedy->name}}</a>--}}
{{--                                                    </td>--}}
{{--                                                    <td>{{$remedy->created_at ? $remedy->created_at->diffForHumans() : "no date"}}</td>--}}
{{--                                                    <td>{{$remedy->updated_at ? $remedy->updated_at->diffForHumans() : "no date"}}</td>--}}
{{--                                                    <td>--}}
{{--                                                    <td>--}}
{{--                                                        <button class="btn btn-info">--}}
{{--                                                            <a href="{{route('remedy.show',$remedy->id)}}"--}}
{{--                                                               style="color: white">--}}
{{--                                                                Edit--}}
{{--                                                            </a>--}}
{{--                                                        </button>--}}
{{--                                                    </td>--}}

{{--                                                    <td>--}}
{{--                                                        {!! Form::open(['method'=>'DELETE','action'=>['RemediesController@destroy',$remedy->id]]) !!}--}}

{{--                                                        <div class="form-group">--}}
{{--                                                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}--}}
{{--                                                        </div>--}}
{{--                                                        {!! Form::close() !!}--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                @endforeach--}}

{{--                                                </tbody>--}}
{{--                                        </table>--}}
{{--                                        @else--}}
{{--                                            <div>--}}
{{--                                                <h1 class="text-warning mt-5">--}}
{{--                                                    <center><b>--}}
{{--                                                            <strong class="text-danger">No remedies found</strong>--}}
{{--                                                        </b></center>--}}
{{--                                                </h1>--}}
{{--                                            </div>--}}

{{--                                        @endif--}}

{{--                                    </div>--}}


{{--                                </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}









    {{--        <h3></h3>--}}
    {{--  --}}
    {{--  --}}
    {{--    <div class="form-group">--}}
    {{--       --}}

    {{--    </div>--}}

    {{--    <div class="form-group">--}}
    {{--       --}}
    {{--    </div>--}}
    {{--    {!! Form::close() !!}--}}

    {{--    --}}
    {{--    <div class="card-body">--}}
    {{--        @if(count($remedy)>0)--}}
    {{--            <ul class="list-group">--}}
    {{--               --}}
    {{--                    <li class="list-group-item">--}}
    {{--                       --}}
    {{--                    </li>--}}
    {{--                @endforeach--}}
    {{--            </ul>--}}
    {{--        @else--}}
    {{--           --}}
    {{--        @endif--}}


    {{--    </div>--}}

@stop