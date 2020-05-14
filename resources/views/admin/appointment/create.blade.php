@extends('layouts.admin')

@section('content')

    <html lang="en">

{{--    <head>--}}
{{--        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">--}}

{{--        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">--}}
{{--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}

{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>--}}

{{--    </head>--}}

{{--    <body>--}}
    {!! Form::open(['method'=>'POST','action'=>'AppointmentController@store']) !!}

    <div class="form-group">
        {!! Form::label('date','App Date') !!}
        {!! Form::date('date',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Book Appointment',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

{{--    <script type="text/javascript">--}}

{{--        $( "#datepicker" ).datepicker();--}}

{{--    </script>--}}


{{--    </body>--}}

{{--    </html>--}}


@endsection
