<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Todo</title>
    
    @include('partials.styles')

  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="{{ route('todos.index') }}">Laravel Todo</a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signup') }}">Sign up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signin') }}">Sign in</a>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="container">

      @include('partials.messages')

      @yield('content')
    </div>
    
    @include('partials.scripts')
  </body>
</html>