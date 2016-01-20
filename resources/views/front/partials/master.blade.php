<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Beta Baroko</title>
  <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/libs.css') }}" />
</head>
<body ng-app="baroko.front">
  <div class="container">
    <header>
      @include('front.partials.header-menu')
    </header>
    @yield('content')
    <footer>
      das
    </footer>
  </div>
  <script src="{{ url('/assets/js/libs.js') }}" ></script>
  <script src="{{ url('/assets/js/baroko.js') }}" ></script>
</body>
</html>