@extends('layouts.default')

@section('content')
  
  <div class="mt-3">
    <form action="{{ route('todos.store') }}" method="POST" class="row g-3 justify-content-center">
      @csrf
        <div class="col-lg-6">
          <input type="text" class="form-control" name="title" id="title" placeholder="What are you planning to do?">
        </div>
        <div class="col-auto">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
  </div>

  <div class="mt-3">
    @foreach($todos as $todo)
      <div class="card mb-2">
        <div class="card-body">
          <span @class(['text-decoration-line-through' => $todo->completed ])>{{ $todo->title }}</span>
        </div>
      </div>
    @endforeach
  </div>

@endsection