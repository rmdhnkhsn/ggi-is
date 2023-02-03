

<!-- Navbar -->
<nav class="main-header fixed-top navbar navbar-white">
  <div class="logo">
    <a href="{{url('/')}}"><img src="{{ asset('/assets/img/PT.-Gistex-Garmen-Indonesia.png') }}" width="100px"></a>
  </div>

  <ul class="px-5">
    <li><a class="nav-link" href="{{ url('/') }}">Home</a></li>
    <li><a class="nav-link" href="{{ url('/') }}">About</a></li>
    <li><a class="nav-link" href="{{ url('/') }}">Technology</a></li>
    <li><a class="nav-link" href="{{ url('/') }}">Product</a></li>
    <li><a class="nav-link" href="{{ url('/') }}">Contact</a></li>
    <li><a class="nav-link" href="{{ route('guide-home') }}">Guide</a></li>
    <li><a class="nav-link active" href="{{route('career-home')}}">Career</a></li>
    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav>
