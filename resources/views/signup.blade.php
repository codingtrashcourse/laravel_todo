@extends('layouts.public')

@section('content')

<div class="row justify-content-center">
  <div class="col-md-6">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      
      <div class="mb-3">
        <label class="form-label">Full name</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
  </div>
</div>

@endsection