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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">

  <style>
    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }
  </style>

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
          <li><a class="nav-link scrollto" href="{{ route('career-home') }}">Career</a></li>
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
    <section class="content">
      <!-- /.container-fluid -->

      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <div class="text-center title">
            <h1>Want You Know Aboute What !</h1>
          </div>
          <div class="row justify-content-center">
            <div class="col-12 col-lg-8 d-flex gap-2">
              <div class="form-search-video flex-grow-1">
                <div class="input-group mb-3">
                  <input type="text" class="form-control form-search mr-1" placeholder="Cari video..." aria-label="Recipient's username" aria-describedby="button-addon2" autofocus>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                  </div>
                </div>
              </div>

              <div class="upload-button">
                <a href="{{route('upload')}}" class="btn btn-outline-primary" title="tambah">
                  Upload
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="container-fluid">
        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'London')">London</button>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
        </div>

        <div id="London" class="tabcontent">
          <h3>London</h3>
          <p>London is the capital city of England.</p>
        </div>

        <div id="Paris" class="tabcontent">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p> 
        </div>

        <div id="Tokyo" class="tabcontent">
          <h3>Tokyo</h3>
          <p>Tokyo is the capital of Japan.</p>
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

  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
</body>
</html>
