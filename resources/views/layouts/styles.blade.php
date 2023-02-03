<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env("APP_NAME")}} - @yield("title")</title>
    <script src="{{asset('/assets3/jquery.js')}}"></script>
    <script src="{{asset('/assets3/jquery.validate.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/common/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}"> -->
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
    @stack("styles")
    @laravelPWA
</head>