<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        @include('layouts.common.GCCnotification')
        <li class="nav-item login-username">
            <span class="nav-link text-white"><i class="icon-user fas fa-user-check"></i></span>
        </li>
    </ul>
    
    <ul class="navbar-nav d-sm-inline-block mr-3">
        <li class="nav-item login-username user-auth">
            <span class="nama-user-auth">{{auth()->user()->nama}}</span>
            @if(auth()->user()->nik == 210010 || auth()->user()->nik == 220033)
            <span class="nama-jabatan-auth">{{auth()->user()->jabatan}}</span>
            @else
            <span class="nama-jabatan-auth">{{auth()->user()->jabatan}} {{auth()->user()->departemensubsub}}</span>
            @endif
        </li>
    </ul>
</nav>