@extends('app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url'=>'/admin/login','method'=>'post']) !!}

        <div class='form-group'>
           {!! Form::label("email", "Email:") !!}
           {!! Form::text("email", null, ['class' => 'form-control' ]) !!}
        </div>
        <!---  Field --->
        <div class='form-group'>
            {!! Form::label("password", "Password:") !!}
            {!! Form::password("password", ['class' => 'form-control' ]) !!}
        </div>
        {!! Form::submit('登陆',['class'=>'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
        {{$errors}}
    </div>
@stop