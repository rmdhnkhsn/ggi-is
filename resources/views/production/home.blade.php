@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
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
            <a href="{{ route('prd.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-broadcast-tower"></i>
                            <div class="main-name">Tower Light</div>
                            <div class="main-desc">To see data tower signal</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('cutting.dashboard')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-cut"></i>
                            <div class="main-name">Cutting</div>
                            <div class="main-desc">All data process, Update and Monitoring Cutting</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('prd.sewing.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-tshirt"></i>
                            <div class="main-name">Sewing</div>
                            <div class="main-desc">All Production Sewing Monitoring</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('finishing.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-box-open"></i>
                            <div class="main-name">Finishing</div>
                            <div class="main-desc">Inputting Finishing Process and Packing List</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('operatorperformance.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-user-friends"></i>
                            <div class="main-name">Operator Performance</div>
                            <div class="main-desc">Production Issues and Performance</div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- <a href="{{ route('mastersmv.index')}}" class="main-col-3"> -->
            <a href="{{ route('databasesmv.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-stopwatch"></i>
                            <div class="main-name">Database SMV</div>
                            <div class="main-desc">Data standard minute value for item style</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('capabilityline.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-file-archive"></i>
                            <div class="main-name">Capability Line</div>
                            <div class="main-desc">Set item efficiency per line</div>
                        </div>
                    </div>
                </div>
            </a>
            @if(str_contains(auth()->user()->departemensubsub,'MEKANIK') || auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('asset.dashboard.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-database"></i>
                            <div class="main-name">Assets Management</div>
                            <div class="main-desc">Manage In – Out Company Assets, know the status & position of Company Assets.</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            <a href="{{ route('prd.prdstatus.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-industry"></i>
                            <div class="main-name">Production Status</div>
                            <div class="main-desc">Work order progress production start from cutting to finishing</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
      </div>
    </section>
@endsection

@push("scripts")

@endpush