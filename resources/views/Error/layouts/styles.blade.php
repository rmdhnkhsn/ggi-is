<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <script src="{{asset('/assets3/jquery.js')}}"></script>
    <script src="{{asset('/assets3/jquery.validate.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/common/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
    @stack("styles")
    @laravelPWA
</head>