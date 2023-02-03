<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env("APP_NAME")}} - @yield("title")</title>
    <script src="{{asset('/assets3/jquery.js')}}"></script>
    <script src="{{asset('/assets3/jquery.validate.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/common/css/poppins.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables2.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    @stack("styles")
    @laravelPWA
</head>