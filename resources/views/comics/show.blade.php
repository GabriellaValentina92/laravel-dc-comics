@extends('layout.base')

@section('content_comic')
    <div class="containerId">
        <h1>{{ $comic->title }}</h1>
        <img src="{{ $comic->thumb }}" alt="">
        <p>{!! $comic->description !!}</p>
    </div>
@endsection