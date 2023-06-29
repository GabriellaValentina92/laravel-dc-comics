@extends('layout.base')

@section('content_comic')
    <div class="container_card">
        @foreach ($comics as $comic)
            <div class="card box-card">
                <img src="{{$comic->thumb}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$comic->title}}</h5>
                    <p class="card-text">{{$comic->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$comic->series}}</li>
                    <li class="list-group-item">{{$comic->type}}</li>
                    <li class="list-group-item">{{$comic->sale_date}}</li>
                    <li class="list-group-item">$ {{$comic->price}}</li>
                </ul>
                <div class="card-body">
                    <a href="{{route('comics.show', ['comic' => $comic->id ])}}" class="card-link">view</a>
                    <a href="#" class="card-link">edit</a>
                    <a href="#" class="card-link">delete</a>
                </div>
            </div>    
        @endforeach
    </div>
@endsection