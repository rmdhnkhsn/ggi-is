<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav userNameLeft ml-1">
        <li class="nav-item login-username user-auth">
            <div class="nama-user-auth">{{auth()->user()->nama}}</div>
            @if(auth()->user()->nik == 210010 || auth()->user()->nik == 220033)
            <div class="nama-jabatan-auth">{{auth()->user()->jabatan}}</div>
            @else
            <div class="nama-jabatan-auth">{{auth()->user()->jabatan}} {{auth()->user()->departemensubsub}}</div>
            @endif
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        @include('layouts.common.GCCnotification')
        <li class="nav-item login-username">
            <span class="nav-link text-white"><i class="icon-user fas fa-user-check"></i></span>
        </li>
    </ul>
    
    <ul class="navbar-nav userNameRight">
        <li class="nav-item login-username user-auth">
            <div class="nama-user-auth">{{auth()->user()->nama}}</div>
            @if(auth()->user()->nik == 210010 || auth()->user()->nik == 220033)
            <div class="nama-jabatan-auth">{{auth()->user()->jabatan}}</div>
            @else
            <div class="nama-jabatan-auth">{{auth()->user()->jabatan}} {{auth()->user()->departemensubsub}}</div>
            @endif
        </li>
    </ul>
</nav>