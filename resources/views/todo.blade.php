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
    <ul class="list-group">
      @foreach($todos as $todo)
        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-color: {{ $todo->color }} !important">
          <span @class(['text-decoration-line-through' => $todo->completed ])>
            {{ $todo->title }}
            <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}">
              <i class="fas fa-pencil text-info"></i>
            </a>
          </span>
          <div class="btn-toolbar" role="toolbar" >
            <div class="btn-group me-2" role="group">
              <a href="{{ route('todos.complete', ['todo' => $todo->id]) }}" @class(['btn', 'btn-success' => $todo->completed, 'btn-outline-success' => !$todo->completed ])>
                <i @class(['fas', 'fa-check', 'text-white' => $todo->completed, 'text-success' => !$todo->completed ])></i>
              </a>
              <a href="{{ route('todos.destroy', ['todo' => $todo->id]) }}" class="btn btn-outline-danger">
                <i class="fas fa-times text-danger"></i>
              </a>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  </div>

@endsection