@extends('layouts.adminn')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Category</h4>

                        </div>
                        <div class="card-body">



                            {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoryController@update',$category->id]]) !!}

                            <div class="row">
                                <div class="col-md-12">


                                    <div class="form-group bmd-label-floating">
                                        {!! Form::label('name','Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating ">
                                        {!! Form::label('description','Description') !!}
                                        {!! Form::textarea('description',null,['class'=>'form-control','rows'=>3]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Update Category ',['class'=>'btn btn-primary pull-right']) !!}
                            </div>

                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@stop