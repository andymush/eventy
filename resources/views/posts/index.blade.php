@extends('layouts.app')

@section('content')
        </div><div class="container-fluid">
        
            <div class="row">
            @if(count($posts) > 0)
             @foreach($posts as $post)
                <div class="col-sm-3">
                    <div class="card-deck" style="display:flex;">

                        <div class="card border-primary mb-3" >

                            <a href="/events/public/posts/{{ $post->id }}" ><img src="/events/public/storage/event_posters/{{ $post->event_poster }}" class="card-img-top" style="height:250px; width:250px;" alt=""></a>
                            <h6 style="text-align:center;"></h6>

                            <div class="card card-body" style="text-align:center;">
                                <u><h4>{{ $post->title }}</h4></u>
                                    <p></p>
                                <u><h5 >Venue</h5></u>
                                    <p>{{ $post->venue }}</p>
                                <u><h6>Description</h6></u>
                                    <p>{{ $post->description }}</p>
                                <a href="{{ route('booked') }}" class="btn btn-primary"><i class="fas fa-edit">BOOK EVENT</i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
        </div>
        

    @else
        <p> No events posted</p>
    @endif

@endsection