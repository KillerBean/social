<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/errors.css" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Courgette" rel="stylesheet" type="text/css">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header clearfix">
                    <!-- Branding Image -->
                    <a class="navbar-brand clearfix" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>

