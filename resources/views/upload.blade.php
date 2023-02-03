<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PT.Gistex Garmen Indonesia</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('/assets/img/ggi.png')}}" rel="icon">
  <link href="{{asset('/assets/img/ggi.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{asset('/assets/vendor/animate.css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/vendor/boxicons/css/boxicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/vendor/glightbox/css/glightbox.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/vendor/remixicon/remixicon.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/vendor/swiper/swiper-bundle.min.css')}}">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
  @laravelPWA
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="fixed-top d-flex align-items-center">

    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center" style="float:center;">
        <i> Gistex Garmen Indonesia Command Center</i>
      </div>

    </div>

  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">

    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!-- <h1><a href="index.html">My<span>Biz</span></a></h1> -->

        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{url('/')}}"><img src="{{ asset('/assets/img/PT.-Gistex-Garmen-Indonesia.png') }}" alt="" class="img-fluid"></a>

      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Technology</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Product</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="{{ route('guide') }}">Guide</a></li>
          <li><a a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>

  </header>
  <!-- End Header -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  
    <section id="about-list" class="about-list">
      <div class="container">
        <div class="row content">
          <div class="text-center title">
            <h1>Upload Videos</h1>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('uploadedVideo') }}" enctype="multipart/form-data" >
            {{ csrf_field() }}
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="fa-report-cards h-200">
                      <h4>Details</h4>
                      <h5>title</h5>
                      <input type="text" id="title" name="title" placeholder="please submit" style="width;280px">
                    </div>
                </div>
            </div>
            <br>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="fa-report-cards h-200">
                      <h5>description</h5>
                      <input type="text" id="title" name="title" placeholder="please submit" style="width;280px">
                    </div>
                </div>
            </div>
            <br>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="fa-report-cards h-200">
                      <h5>Category</h5>
                      <select name="kategori" id="kategori"></select>
                    </div>
                </div>
            </div>
            <br>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="fa-report-cards h-200">
                      <h5>Playlist</h5>
                      <select name="playlist" id="playlist"></select>
                    </div>
                </div>
            </div>
            <br>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="fa-report-cards h-200">
                      <h5>Video</h5>
                          <input type="file" name="video" id="video">
                    </div>
                </div>
            </div>
            <br>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="fa-report-cards h-200">
                      <h5>Thumbnaile</h5>
                          <input type="file" name="tumbnail" id="tumbnail">
                    </div>
                </div>
            </div>

            <br>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="fa-report-cards h-200">
                      <h5>Playlist</h5>
                      <button type="submit" class="btn btn-primary btn-sm">submit</button>
                    </div>
                </div>
            </div>

           </form>
        </div>
      </div>
        

    </section>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>



</html>
