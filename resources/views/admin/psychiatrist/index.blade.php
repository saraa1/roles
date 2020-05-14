@extends('layouts.adminn')
@section('content')


    @if(count($psych)>0)

        <div>
            <h1 class="text-success mt-5">
                <center><b>Psychiatrist Record</b></center>
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
                    @foreach($psych as $key=> $psych)
                        <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$psych->name}}</td>
                            <td>{{$psych->email}}</td>
                            <td>{{$psych->role ? $psych->role->name : 'no role'}}</td>
                            <td>{{$psych->is_active==1 ? 'Active' :'Not Active' }}</td>

                            <td>{{$psych->created_at ? $psych->created_at->diffForHumans() : "no date"}}</td>
                            <td>{{$psych->updated_at ? $psych->updated_at->diffForHumans() : "no date"}}</td>
                            <td>
                            <td>
                                <a href="{{route('admin.psychiatrist.edit',$psych->id)}}" style="color: white">
                                <button class="btn btn-info">

                                        Edit

                                </button>
                                </a>
                            </td>

                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['AdminPsychiatristController@destroy',$psych->id]]) !!}

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
                                    No Psychiatrist Record found
                                </b></center>
                        </h1>
                    </div>

                @endif
            </div>
        </div>
@stop