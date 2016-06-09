<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beta Baroko</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.cyan-pink.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/libs.css') }}"/>
    <style>
        .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type  {
            padding-right: 0;
        }
    </style>
</head>
<body ng-app="baroko.front">
    <div class="demo-layout-waterfall mdl-layout mdl-js-layout">
        @include('front.partials.header-menu')
        <main class="mdl-layout__content">
            <div class="mdl-grid">
                @yield('content')
            </div>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__center-section">
                    <div class="mdl-logo">Beta Baroko - Laravel + angular</div>
                </div>
            </footer>
        </main>
    </div>
<script src="{{ url('/assets/js/libs.js') }}"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script src="{{ url('/assets/js/baroko.js') }}"></script>
</body>
</html>