@extends("layouts.app")
@section("title","More Program")
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
            <a href="{{ route('gistube-leaderboard') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('/images/iconpack/Gistube2.svg') }}"
                                onmouseover="this.src='{{ asset('/images/iconpack/Gistube.svg') }}';"
                                onmouseout="this.src='{{ asset('/images/iconpack/Gistube2.svg') }}';">
                            </img>
                            <!-- <div class="img-gistube"></div> -->
                            <!-- <img src="{{ asset('/images/iconpack/Gistube.svg') }}" class="main-svg">
                            <img src="{{ asset('/images/iconpack/Gistube2.svg') }}" class="main-svg2"> -->
                            <div class="main-name">My Video GisTube</div>
                            <div class="main-desc">About video tutorials about work</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-briefcase"></i>
                            <div class="main-name">Assignment & Appointment</div>
                            <div class="main-desc">Make work orders, and make appointments</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('overtime-request') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-file-signature"></i>
                            <div class="main-name">Overtime Request</div>
                            <div class="main-desc">Create a Form for the plan & realization of overtime work</div>
                        </div>
                    </div>
                </div>
            </a>
            @if(auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA' || auth()->user()->branch == 'GK')
            <a href="{{ route('job.index') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-book"></i>
                            <div class="main-name">Job Orientation</div>
                            <div class="main-desc">Create & Read documentation or job guides for all departments</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan == 'KABAG'||auth()->user()->jabatan == 'MANAGER')
            <a href="{{ route('traffic-index') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-chart-line"></i>
                            <div class="main-name">GCC Traffic</div>
                            <div class="main-desc">See the number of visits to the gistex garmen system</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            <a href="{{ route('weekly-question') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-viruses"></i>
                            <div class="main-name">Question Weekly</div>
                            <div class="main-desc">Question Corona</div>
                        </div>
                    </div>
                </div>
            </a>
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('rating.index') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-clipboard"></i> 
                            <div class="main-name">User Feedback</div>
                            <div class="main-desc">See review user from each system</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('barcode.security.index') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-barcode"></i>
                            <div class="main-name">Barcode Security</div>
                            <div class="main-desc">To scan employees who leave the company</div>
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