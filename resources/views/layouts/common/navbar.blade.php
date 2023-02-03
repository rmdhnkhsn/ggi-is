<nav class="main-header navbar navbar-expand navbarV2">
  <ul class="navbar-nav">
    <li class="containerNavLeft responsiveLeft">
      <a href="#" class="NavbarCollapse" data-widget="pushmenu" role="button"><span></span><span></span><span></span></a>
      <img src="{{url('images/iconpack/gistex.svg')}}" class="gistexImages">
      <div class="gccText">Gistex Command Center</div>
    </li>
    <li class="containerNavRight">
      <img src="{{url('images/iconpack/home/hand-shake.svg')}}" class="title-none2">
      <div class="name"> 
        <div class="user"><span class="title-none2">Hi, </span>{{auth()->user()->nama}}</div>
        @if(auth()->user()->nik == 210010 || auth()->user()->nik == 220033)
        <div class="jabatan">{{auth()->user()->jabatan}}</div>
        @else
        <div class="jabatan">{{auth()->user()->jabatan}} {{auth()->user()->departemensubsub}}</div>
        @endif
      </div>
      @include('layouts.common.GCCnotification')
    </li>
  </ul>
</nav>
