<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TURNERO</title>


@if(Internet::is_connected())
    <!-- Bootstrap core CSS -->
        <link rel="stylesheet"
              href="{!! secure_url('//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
    @else
        <link rel="stylesheet" href="{!! asset('bootstrap/css/bootstrap.css') !!}">
    @endif
<!-- Custom styles for this template -->
    <link rel="stylesheet" href="{!! asset('css/helpers.css') !!}">
    @stack('scriptsCSS')
</head>