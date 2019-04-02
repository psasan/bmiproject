<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LaravelApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href=" {{ asset('bootstrap-4.3.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css') }}" rel="stylesheet">

    <!--
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    -->
</head>
<body>
    <div class="container">
        @include('navbar')
        @yield('main')
    </div>
    @yield('footer')

    <script src="{{ asset('js/jquery_2_2_1.min.js') }}"> </script>
    <script src="{{ asset('bootstrap-4.3.1/js/bootstrap.min.js') }}"> </script>
    
</body>
</html>