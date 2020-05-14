@extends('layouts.adminn')
@section('content')


    @if(count($patients)>0)

        <div>
            <h1 class="text-success mt-5">
                <center><b>Patient's Record</b></center>
            </h1>
        </div>
        @if(Session::has('deleted_user'))
            <p class="bg-danger"> {{session('deleted_user')}} </p>
        @endif

        @if(Session::has('updated_user'))
            <p class="bg-primary"> {{session('updated_user')}} </p>
        @endif

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning active">
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>
                        Status
                    </th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    </thead>
                    @foreach($patients as $key=> $patient)
                        <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$patient->name}}</td>
                            <td>{{$patient->email}}</td>
                            <td>{{$patient->role ? $patient->role->name : 'no role'}}</td>
                            <td>{{$patient->is_active==1 ? 'Active' :'Not Active' }}</td>

                            <td>{{$patient->created_at ? $patient->created_at->diffForHumans() : "no date"}}</td>
                            <td>{{$patient->updated_at ? $patient->updated_at->diffForHumans() : "no date"}}</td>
                            <td>
                            <td>
                                <a href="{{route('admin.patient.edit',$patient->id)}}" style="color: white">
                                <button class="btn btn-info">

                                        Edit

                                </button>
                                </a>
                            </td>

                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['AdminPatientController@destroy',$patient->id]]) !!}

                                <div class="form-group">
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                </table>
                @else
                    <div>
                        <h1 class="text-warning mt-5">
                            <center><b>
                                    No Patient Record found
                                </b></center>
                        </h1>
                    </div>

                @endif
            </div>
        </div>
@stop