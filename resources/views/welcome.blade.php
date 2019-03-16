
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Url Shortener</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="/css/cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">Url Shortener</h3>
      <nav class="nav nav-masthead justify-content-center">
        @auth
            <a class="nav-link active" href="{{ url('/home') }}">Home</a>
         @else
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            @endif
        @endauth
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading">Url Shortener.</h1>
    <div class="alert alert-success" role="alert" id="success" style="display:none;"></div>
    <div class="alert alert-warning" role="alert" id="warning" style="display:none;">
        Error Processing Request Invalid Url
    </div>
    <div>
      <form id="shortener-form">
        <div class="form-group">
            <input type="search" name="url" class="form-control" placeholder="http://google.com" required>
            <small id="emailHelp" class="form-text text-muted">Place the link you want to shorten.</small>
        </div>
      </form>
    </div>
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    </div>
  </footer>
</div>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="/js/shortener.js"></script>

</body>

</html>
