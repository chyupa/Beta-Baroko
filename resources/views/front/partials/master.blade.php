<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Beta Baroko</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/libs.css') }}"/>
</head>
<body ng-app="baroko.front">
<div class="container">
    <header>
        @include('front.partials.header-menu')
    </header>
    <div class="row">
        <div class="col-xs-3">
            <div class="row">
                @include('front.partials.left-cart')
            </div>
            <div class="row">
                @include('front.partials.left-menu')
            </div>
        </div>
        <div class="col-xs-9">
            @yield('content')
        </div>
    </div>
    <footer>
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <p>Beta Baroko - Laravel + angular</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ url('/assets/js/libs.js') }}"></script>
<script src="{{ url('/assets/js/baroko.js') }}"></script>
</body>
</html>