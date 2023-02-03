<nav class="main-header navbar navbar-expand navbar-blue navbar-light" style="margin-left:0 !important;">
    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
        </li> -->

        <div class="btn-group" role="group" aria-label="Basic example">
            <a type="button" href="{{ url()->previous() }}" class="btn btn-secondary" id="btnNavBack"><i class="icon-back fas fa-long-arrow-alt-left"></i> Back</a>
            <button type="button" class="btn btn-secondary" id="btnNavCsv"><i class="fas fa-file"></i> CSV</button>
            <button type="button" class="btn btn-secondary" id="btnNavPdf"><i class="fas fa-file-download"></i> PDF</button>
        </div>
    </ul>
    <ul class="navbar-nav ml-auto">
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