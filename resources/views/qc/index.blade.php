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
      @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_OP' || auth()->user()->role == 'QCR_REPORT' || auth()->user()->role == 'QCR_PIC' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_SPV')
      <a href="{{ route('rework.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-redo-alt"></i>
              <div class="main-name">QC REWORK</div>
              <div class="main-desc">Create rework status (Broken, Puckering, Croocked, Pleated, ROS, Bad Shape, Shading, etc ).</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_USER' || auth()->user()->role == 'QCS_SPL' || auth()->user()->role == 'QCS_DEPT' || auth()->user()->role == 'QCS_SPV')
      <a href="{{ route('sample.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-pencil-ruler"></i>
              <div class="main-name">QC SAMPLE</div>
              <div class="main-desc">Do Reject Cuting, Recap QC, Marker, Daily Cuting, Embro & Print </div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('qc-cutting')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-cut"></i>
              <div class="main-name">QC CUTTING</div>
              <div class="main-desc">Do Reject Cuting, Recap QC, Marker, Daily Cuting, Embro & Print </div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('qa.inline.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-tasks"></i>
              <div class="main-name">QUALITY ASSURANCE</div>
              <div class="main-desc">Membuat Invoice Buyer,  Berdasarkan data Packing List.</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('rgarment.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-tshirt"></i>
              <div class="main-name">REJECT GARMEN</div>
              <div class="main-desc">Reject garments on the production line & Create Report</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('RejectCutting.dashboard')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-hand-scissors"></i>
              <div class="main-name">REJECT CUTTING</div>
              <div class="main-desc">Add description here</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN' ||auth()->user()->nik == '340552')
      <a href="{{ route('search.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-search"></i>
              <div class="main-name">FINAL INSPECTION</div>
              <div class="main-desc">Carry out final stage final inspection on garment</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN' ||auth()->user()->nik == '340552')
      <a href="{{ route('FactoryAudit.dashboard')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-pallet"></i>
              <div class="main-name">FACTORY AUDIT</div>
              <div class="main-desc">Check the garment qty in the box </div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == "SMQC_USER")
      <a href="{{route('smqc.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fab fa-cotton-bureau"></i>
              <div class="main-name">SMQC</div>
              <div class="main-desc">Check the cloth roll and accessories</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{route('aql.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon far fa-file-excel"></i>
              <div class="main-name">AQL MIYAMORI</div>
              <div class="main-desc">Create AQL inspection report, Standard shipping inspection calculation</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      <!-- @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{route('daily.cutting.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-clipboard-list"></i>
              <div class="main-name">DAILY CUTTING</div>
              <div class="main-desc">Recap output cutting & create reports</div>
            </div>
          </div>
        </div>
      </a>
      @endif -->
    </div>
  </div>
</section>
@endsection

@push("scripts")

@endpush