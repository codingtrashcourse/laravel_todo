@extends('layouts.default')

@section('content')
<div class="mt-3">
  <form action="{{ route('todos.update', ['todo' => $todo->id]) }}" method="POST" class="row g-3 justify-content-center">
    @csrf
    {{ method_field('PUT') }}
      <div class="col-lg-6">
        <input type="text" class="form-control" name="title" id="title" placeholder="What are you planning to do?" value="{{ $todo->title }}">
      </div>
      <div class="col-auto">
      <button type="submit" class="btn btn-primary">Update</button>
      </div>
  </form>
</div>
@endsection