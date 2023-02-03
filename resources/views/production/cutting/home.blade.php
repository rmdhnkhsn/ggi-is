@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <span class="main-title">Main Menu</span>
            </div>
        </div>

        <div class="row mt-3">
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{route('master_kode_kerja.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-users"></i>
                            <div class="main-name">HRD</div>
                            <div class="main-desc">Human Resources Development</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            <a href="{{ route('cutting.ppic')}}" class="main-col-3">
            <!-- <a href="" class="main-col-3"> -->
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-boxes"></i>
                            <div class="main-name">PPIC</div>
                            <div class="main-desc">Production Planing and Inventory Controll</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('cutting.admincutting')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-user-cog"></i>
                            <div class="main-name">Admin Cutting</div>
                            <div class="main-desc">Create Form Gelaran, </div>
                        </div>
                    </div>
                </div>
            </a>
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('admin.cutting.gelaran')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-user-cog"></i>
                            <div class="main-name">Admin Cutting REV</div>
                            <div class="main-desc">Create Form Gelaran, </div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            <a href="{{ route('cutting.gelar')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-scroll"></i>
                            <div class="main-name">Proses Gelar</div>
                            <div class="main-desc">Recap Details start, and Finish prosess</div>
                        </div>
                    </div>
                </div>
            </a>
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('cutting.gelar.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-scroll"></i>
                            <div class="main-name">Proses Gelar REV</div>
                            <div class="main-desc">Recap Details start, and Finish prosess</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            <a href="{{ route('proses_cutting.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-cut"></i>
                            <div class="main-name">Proses Cutting</div>
                            <div class="main-desc">Recap Details start, and Finish prosess</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('proses_numbering.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-sort-numeric-down"></i>
                            <div class="main-name">Prosess Numbering </div>
                            <div class="main-desc">Recap Details start, and Finish prosess</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('proses_numbering.index')}}
            " class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-server"></i>
                            <div class="main-name">Prosess Bundling</div>
                            <div class="main-desc">Recap Details start, and Finish prosess</div>
                        </div>
                    </div>
                </div>
            </a>
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('report.gelar')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-file-contract"></i>
                            <div class="main-name">Report Product Costing</div>
                            <div class="main-desc">Recap Data Reject cutting</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
        </div>
      </div>
    </section>
@endsection

@push("scripts")

@endpush