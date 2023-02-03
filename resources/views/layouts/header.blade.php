<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GCC</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/fontawesome-free/css/font2.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/fontawesome-free/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/assets3/dist/css/adminlte.css')}}">
  <!-- Graph style -->
  <link rel="stylesheet" href="{{asset('/assets3/graph.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- Datatables -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('/assets3/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets3/plugins/select2/css/select2.min.css')}}">

  <link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">

  <!-- <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}"> -->
  <link rel="stylesheet" href="{{asset('/assets/css/style-GCC.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('/assets/css/style-dashboard.css')}}"> -->
  <link rel="stylesheet" href="{{asset('/assets/css/styleCC1.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/css/poppins.css')}}">
  <link rel="stylesheet" href="{{asset('/assets7/css/ngedip.css')}}">



  <script src="{{asset('/assets3/jquery.js')}}"></script>  
  <script src="{{asset('/assets3/jquery.validate.js')}}"></script>  

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.knob.min.js"></script>
  @laravelPWA

<!-- Opacity text -->
<style id="compiled-css" type="text/css"> 

  body {<!--from  ww w  .java  2 s.  c  o  m-->
    margin: 0;
  }
  .container-optext {
    text-align: center;
  }
  .container h2 {
    position: absolute;
    left: 50%;
    top: 76%;
    transform: translate(-50%, -50%);
    opacity: 0;
    margin: 0;
    white-space: nowrap;
    font-size: 16px;
    font-weight: 600;
    color: #000000;`
  }
  .container h2:nth-child(1) {
    animation: rotateWord 12s linear infinite 0s;
  }
  .container h2:nth-child(2) {
    animation: rotateWord 12s linear infinite 3s;
  }
  .container h2:nth-child(3) {
    animation: rotateWord 12s linear infinite 6s;
  }
  .container h2:nth-child(4) {
    animation: rotateWord 12s linear infinite 9s;
  }
  @keyframes rotateWord {
    0% {
      opacity: 0;
   }
   2% {
      opacity: 0;
      transform: translate(-50%, -30px);
   }
   5% {
      opacity: 0;
      transform: translate(-50%, 0px);
   }
   17% {
      opacity: 1;
      transform: translate(-50%, 0px);
   }
   20% {
      opacity: 0;      
   }
   80% {
      opacity: 0;
   }
   100% {
      opacity: 0;
   }
  }


</style>

</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">