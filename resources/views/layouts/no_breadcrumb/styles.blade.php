<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env("APP_NAME")}} @yield("title")</title>
    <script src="{{asset('/assets3/jquery.min.js')}}"></script>
    <script src="{{asset('/assets3/jquery.validate.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    
    @stack("styles")
    @laravelPWA
</head>