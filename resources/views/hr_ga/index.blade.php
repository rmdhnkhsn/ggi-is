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
        <span class="main-title ml-1">Main Menu</span>
      </div>
    </div>
    <div class="row mt-3">
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'ADMIN_HRD'|| auth()->user()->role == 'PETUGAS_APAR'|| auth()->user()->nik == '300047') 
        <a href="{{ route('hrga.index_auditbuyer')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon far fa-file-alt"></i>
                        <div class="main-name">Safety Compliance</div>
                        <div class="main-desc">Do controll Alaram Button, Smoke Detector, APAR, Emergency Exit, Emergency Lamp</div>
                    </div>
                </div>
            </div>
        </a>
        @endif

        <a href="{{ route('tiket-index','v_mode=hr')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <!-- <i class="main-icon fas fa-ticket-alt"></i> -->
                        <i class="main-icon fa-solid fa-ticket"></i>
                        <div class="main-name">Ticketing</div>
                        <div class="main-desc">Make & Take a ticket for work operational problems (IT, DT, HR & GA)</div>
                    </div>
                </div>
            </div>
        </a>
        
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->jabatan == 'MANAGER' || auth()->user()->departemensubsub == 'RECRUITMENT') 
        <a href="{{ route('employee-tracking')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-briefcase"></i>
                        <div class="main-name">Job Vacancy</div>
                        <div class="main-desc">Open vacancies and look for candidates according to qualifications</div>
                    </div>
                </div>
            </div>
        </a>
        @endif

        @if(auth()->user()->role == 'SYS_ADMIN') 
        <a href="{{ route('question.draft')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-book"></i>
                        <div class="main-name">Orientation Question</div>
                        <div class="main-desc">Make & Update a question for employee orientation</div>
                    </div>
                </div>
            </div>
        </a>
        @endif

        @if(auth()->user()->role == 'SYS_ADMIN') 
        <a href="{{ route('to-index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-user-minus"></i>
                        <div class="main-name">Daily Turn Over</div>
                        <div class="main-desc">Resume for employee resignation of PT. Gistex Garment Indonesia</div>
                    </div>
                </div>
            </div>
        </a>
        @endif

        <a href="{{ route('rekap-index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-calendar-check"></i>
                        <div class="main-name">Absence Recap</div>
                        <div class="main-desc">See your attendance resume this month</div>
                    </div>
                </div>
            </div>
        </a>
        
        @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan == 'MANAGER'||auth()->user()->departemensubsub == 'MANAGEMENT'||auth()->user()->nik == 'GISCA') 
        <a href="{{ route('absen-index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-calendar-times"></i>
                        <div class="main-name">Daily Absence</div>
                        <div class="main-desc">See employee attendance status at pt gistex garment indonesia</div>
                    </div>
                </div>
            </div>
        </a>
        @endif
        
        @if(auth()->user()->role == 'SYS_ADMIN') 
        <a href="{{ route('permit.request.pengajuan')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-id-badge"></i>
                        <div class="main-name">Permit Request</div>
                        <div class="main-desc">Application for permission to leave the office and permission to go home quickly</div>
                    </div>
                </div>
            </div>
        </a>
        @endif
        
        @if(auth()->user()->role == 'SYS_ADMIN') 
        <a href="{{ route('report.permit.request')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-book"></i>
                        <div class="main-name">Report Permit Request</div>
                        <div class="main-desc">To see overall permission to leave the office and permission to go home quickly</div>
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