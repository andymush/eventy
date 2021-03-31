@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <img src="/events/public/storage/event_posters/{{ $post['event_poster'] }}"class="img img-top" style="width:100%; height:80%; padding:10px;">
                <div class="card card-body">
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                        <a href="/events/public/posts/{{ $post->id }}/edit" class="btn btn-success" style="width:50%;"><i class="fas fa-edit">Edit</i></a>
                    <br>
                        {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST', 'class'=> 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}
                        @endif
                    @endif
                    <br>
                    <a href="" class="btn btn-primary">BOOK EVENT</a>
                </div>
            </div>
            <div class="col-sm-6">
            <h5>Posted by: {{$post->user->name}}</h5>
                <div class="card card-header">
                    <h5 style="color:blue;">Title</h5>
                </div>
                <div class="card card-body" >
                    <p>{{ $post->title }}</p>
                </div>

                <div class="card card-header">
                    <h5 style="color:blue;">Venue</h5>
                </div>
                <div class="card card-body">
                    <p>{{ $post->venue }}</p>
                </div>

                <div class="card card-header">
                    <h5 style="color:blue;">Description</h5>
                </div>
                <div class="card card-body">
                    <p>{{$post->description}}</p>
                </div>
                            
            </div>
            

        </div>
    </div>
</div>

@endsection