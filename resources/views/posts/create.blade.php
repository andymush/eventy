@extends('layouts.app')

@section('content')

<h1>Post Your Event</h1>

{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title','',['classs'=>'form-control','placeholder' => 'Title'])}}
    </div>
    
    <div class="form-group">
        {{Form::label('venue', 'Venue')}}
        {{Form::text('venue','',['classs'=>'form-control','placeholder' => 'Venue'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description','',['classs'=>'form-control','placeholder' => 'Description'])}}
    </div>
    <div class="form-group">
        {{Form::file('event_poster')}}
    </div>
    {{ Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}


@endsection