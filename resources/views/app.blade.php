<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="container">
{{--        @if (Session::has('flash_message'))
            <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
                @if (Session::has('flash_message_important'))
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @endif

--}}{{--                {{ Session::get('flash_message') }}--}}{{--
--}}{{--                    same with helper --}}{{--
                {{ session('flash_message') }}
            </div>
        @endif--}}
{{--        extracted to the partial--}}
{{--        @include('partials.flash')--}}
        @include ('flash::message')
        @yield('content')
    </div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script>
        // $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        $('#flash-overlay-modal').modal();
    </script>

    @yield('footer')
</body>
</html>