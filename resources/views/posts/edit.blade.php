@extends('layouts.app')

@section('content')

<h1>Update Your Event</h1>

{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title',$post->title,['classs'=>'form-control','placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('venue', 'Venue')}}
        {{Form::text('venue',$post->venue,['classs'=>'form-control','placeholder' => 'Venue'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description',$post->description,['classs'=>'form-control','placeholder' => 'Description'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{ Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}


@endsection