<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Phalcon PHP Framework</title>
        <link rel="stylesheet" href="{{ static_url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ static_url('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ static_url('css/custom.css') }}">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">My Todo</h1>
            <hr>

            {% block body %}
            {% endblock %}
        </div>

        <div class="navbar navbar-default fixed-bottom">
            <div class="container">
                <p class="navbar-text" style="font-size: 1.5em;">Benchmark %%benchmark%% (microsecond) - Wow such fast, much better, so amazing ~ Doge</p>
            </div>
        </div>

        <script src="{{ static_url('js/jquery.min.js') }}"></script>
        <script src="{{ static_url('js/bootstrap.min.js') }}"></script>
    </body>
</html>