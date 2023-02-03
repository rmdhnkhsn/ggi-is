@extends("layouts.blank.app")
@section("title","Maintenance")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/singleStyle/maintenance.css')}}">
@endpush

@section("content")
<section class="content index">
    <div class="container-fluid">
        <div class="header">
            <div class="buleud"></div>
            @include("layouts.common.breadcrumb")
        </div>
        <div class="container">
            <div class="contents mx-auto mt-mins">
                <div class="headerContent gap-3 mb-4">
                    <img src="{{url('images/user.jpg')}}" class="avatar">
                    <div class="judul truncate">
                        <div class="title-16W">Selamat Datang,</div>
                        <div class="title-24W mt-1 truncate">{{ auth()->user()->nama }}</div>
                    </div>
                </div>
                <div class="card p-3">
                    <div class="buttons">
                        <div class="btn1 w-100">
                            <a href="{{ route('asset.maintenance.tfAsset')}}" class="btn-blue justify-start h-64"><i class="iconBtn fas fa-random"></i><div class="title-none">Transfer</div></a> 
                            <div class="titleBtn">Transfer</div>
                        </div>
                        <div class="btn2 w-100">
                            <a href="{{ route('asset.maintenance.checkingAsset')}}" class="btn-yellow justify-start h-64"><i class="iconBtn fas fa-tasks"></i><div class="title-none">Checking</div></a>
                            <div class="titleBtn">Checking</div>
                        </div>
                        <div class="btn3 w-100">
                            <a href="{{ route('asset.maintenance.maintenanceAsset')}}" class="btn-green justify-start h-64"><i class="iconBtn fas fa-toolbox"></i><div class="title-none">Maintenance</div></a>
                            <div class="titleBtn no-wrap">Maintenance</div>
                        </div>
                        <div class="btn4 w-100">
                            <a href="{{ route('asset.maintenance.settingAsset')}}" class="btn-blue2 justify-start h-64"><i class="iconBtn fas fa-cogs"></i><div class="title-none">Setting</div></a>
                            <div class="titleBtn">Setting</div>
                        </div>
                    </div>
                    <div class="containerGisca">
                        <img src="{{url('images/iconpack/asset_management/gisca.svg')}}" class="giscaImg">
                        <div class="containerFrame">
                            <div class="elipse1"></div>
                            <div class="elipse2"></div>
                            <div class="elipse3"></div>
                            <div class="judulGisca">
                                <div class="judul">
                                    <div class="title-32W">Assets Control</div>
                                    <div class="title-16W mt-1">Maintenance & Control Assets, <br/>PT.Gistex Gament Indonesia</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="title-20G">Check your data maintenance</div>
                    <div class="containerBottom">
                        @if(auth()->user()->departemensubsub == 'MEKANIK' &&  auth()->user()->departemensubsub == 'OPERATOR' )
                            <a href="" class="btnBottom">
                                @else
                                <a href="{{ route('asset.maintenance.dataTransfer')}}" class="btnBottom">
                            @endif
                            <div class="btnSoftBlue h-48">
                                <div class="justify-sb h-48">
                                    <div class="justify-start gap-3">
                                        <i class="fs-18 fas fa-random"></i>
                                        Data Transfer
                                    </div>
                                    <i class="arrowBtn fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                        @if(auth()->user()->departemensubsub == 'MEKANIK' &&  auth()->user()->departemensubsub == 'OPERATOR' )
                                <a href="" class="btnBottom">
                                @else
                                <a href="{{ route('asset.maintenance.dataChecking')}}" class="btnBottom">
                        @endif
                            <div class="btnSoftBlue h-48">
                                <div class="justify-sb h-48">
                                    <div class="justify-start gap-3">
                                        <i class="fs-18 fas fa-tasks"></i>
                                        Data Checking
                                    </div>
                                    <i class="arrowBtn fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                        @if(auth()->user()->departemensubsub == 'MEKANIK' &&  auth()->user()->departemensubsub == 'OPERATOR' )
                                <a href="" class="btnBottom">
                                @else
                                <a href="{{ route('asset.maintenance.dataMaintenance')}}" class="btnBottom">
                            @endif
                            <div class="btnSoftBlue h-48">
                                <div class="justify-sb h-48">
                                    <div class="justify-start gap-3">
                                        <i class="fs-18 fas fa-toolbox"></i>
                                        Data Maintenance
                                    </div>
                                    <i class="arrowBtn fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                        @if(auth()->user()->departemensubsub == 'MEKANIK' &&  auth()->user()->departemensubsub == 'OPERATOR' )
                            <a href="" class="btnBottom">
                        @else
                            <a href="{{ route('asset.maintenance.dataSetting')}}" class="btnBottom">
                        @endif
                            <div class="btnSoftBlue h-48">
                                <div class="justify-sb h-48">
                                    <div class="justify-start gap-3">
                                        <i class="fs-18 fas fa-cogs"></i>
                                        Data Setting
                                    </div>
                                    <i class="arrowBtn fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push("scripts")

@endpush        