@extends("layouts.app")
@section("title","Acc & Fin")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Main Menu</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->departemen == 'ACCOUNTING'||auth()->user()->nik == 'GISCA'||auth()->user()->jabatan == 'MANAGER')
      <a href="{{route('accfin.costfactory.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-industry"></i>
              <div class="main-name">Cost Factory</div>
              <div class="main-desc">To see the master cost of factory.</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      
      <a href="{{ route('accfin.costfactoryrpt.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon far fa-file-alt"></i>
              <div class="main-name">Cost Factory Report</div>
              <div class="main-desc">To see the Report Cost Factory</div>
            </div>
          </div>
        </div>
      </a>
      
      <a href="{{ route('tiket-index','v_mode=acc')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <!-- <i class="main-icon fas fa-ticket-alt"></i> -->
              <i class="main-icon fa-solid fa-ticket"></i>
              <div class="main-name">Ticketing</div>
              <div class="main-desc">Make & Take a ticket for work operational problems </div>
            </div>
          </div>
        </div>
      </a>
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('acc.budget.monitoring')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-money-check-alt"></i>
              <div class="main-name">Blocking Budget</div>
              <div class="main-desc">To limit spending this month has passed the plan or not</div>
            </div>
          </div>
        </div>
      </a>
      @endif  
    </div>
  </div>
</section>
  
@endsection
