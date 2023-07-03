@extends('layout.base')


@section('content_comic')
<div class="container-error">
    <h2>Ooooops!</h2>
    <p>hei, fumettaro...siamo spiacenti ma sei finito nella pagina sbagliata!
        clicca nel bottone in basso e a velocità supersonica ti reindirizzeremo nella nostra pagina principale.
    </p>
    <a href="{{ route('comics.index')}}"> per i Superpoteri da questa parte</a>
</div>
@endsection



