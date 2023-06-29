@extends('layout.base')

@section('content_comic')
<form method="POST" action="{{ route('comics.store') }}" class="form">
    <div class="mb-3">
      <label for="title" class="form-label">title</label>
      <input type="text" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <textarea class="form-control" id="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="series" class="form-label">Series</label>
        <input type="text" class="form-control" id="series">
      </div>
    <div class="mb-3">
      <label for="type" class="form-label">type</label>
      <input type="text" class="form-control" id="type">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
    
@endsection