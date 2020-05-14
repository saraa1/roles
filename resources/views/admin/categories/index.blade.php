@extends('layouts.adminn')
@section('content')
    @if(count($categories)>0)

        <div>
            <h1 class="text-primary mt-5">
                <center><b>Intellactual Disabilities</b></center>
            </h1>
        </div>
        @if(Session::has('deleted_category'))
            <p class="bg-danger"> {{session('deleted_category')}} </p>
        @endif

        @if(Session::has('updated_category'))
            <p class="bg-primary"> {{session('updated_category')}} </p>
        @endif

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning active">
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    </thead>
                    @foreach($categories as $key=> $category)
                        <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{str_limit($category->description,15)}}</td>

                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : "no date"}}</td>
                            <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : "no date"}}</td>
                            <td>

                            <td>


                               {!! Form::open(['method'=>'GET','action'=>['AdminCategoryController@show',$category->id]]) !!}


                               <div class="form-group">
                                   {!! Form::submit('View / Edit',['class'=>'btn btn-info']) !!}
                               </div>
                               {!! Form::close() !!}
                            </td>

                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$category->id]]) !!}

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
                                    No Category found
                                </b></center>
                        </h1>
                    </div>

                @endif
            </div>
        </div>

@stop