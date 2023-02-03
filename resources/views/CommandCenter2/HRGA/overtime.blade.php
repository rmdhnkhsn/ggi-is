@extends("layouts.app")
@section("title","Work Life ")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid overtimeReq pb-4"> 
    <div class="row relative pt-2" style="z-index:99">
      <div class="col-lg-3">
        <div class="cards4 relative p-4">
          <div class="justify-start gap-3">
            <div class="boxIcon bg-softYellow">
              <i class="text-yellow fas fa-caret-down"></i>
            </div>
            <div class="title-16-500 text-yellow">Total Cost</div>
            <div class="ml-auto" id="filterDate" data-target-input="nearest">
              <div class="pointerButton datepiker" data-target="#filterDate" data-toggle="datetimepicker">
                <i class="fs-16 fas fa-ellipsis-v"></i>
              </div>
              <input type="text" data-target="#filterDate" hidden/>
            </div>
          </div>
          <div class="title-24-dark fw-600" style="margin-top:.75rem">Rp. 7.779.600 ,-</div>
          <div class="title-14-dark mt-1">Desember 2022</div> 
        </div>
      </div>
      <div class="col-lg-9">
        <img src="{{url('images/icon/comcen/overtime/clock.svg')}}" class="clockImg">
        <div class="cards4 relative o-hidden p-4" style="min-height:142px">
          <div class="row">
            <div class="col-md-4">
              <img src="{{url('images/icon/comcen/overtime/mask2.svg')}}" class="maskImg">
            </div>
            <div class="col-md-8"> 
              <div class="title-32"><span class="c-blue">WORK LIFE</span><span class="c-orange ml-2">HOUR BALANCE</span> </div>
              <div class="title-14-dark mt-1">Analisis keseimbangan lembur karyawan PT. <br/>Gistex games Indonesia bulan <span class="c-orange">Desember 2022</span> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row relative zIndex pt-4">
      <div class="col-lg-3">
        <div class="title-16-dark3" style="margin-top:.8rem">OTHER MENU</div>
        <div class="containerMenu mtOV" id="scroll-bar3">
          <a href="" class="navMenu">
            <div class="kiri">
              <i class="fas fa-hard-hat"></i>
            </div>
            <div class="kanan">
              <div class="title">Safety Compliance</div>
              <div class="sub-title">Monitoring security devices</div>
            </div>
          </a>
          <a href="" class="navMenu">
            <div class="kiri">
              <i class="fas fa-user-clock"></i>
            </div>
            <div class="kanan">
              <div class="title">Past Time</div>
              <div class="sub-title">Work Life Hour Balance </div>
            </div>
          </a>
          <a href="" class="navMenu">
            <div class="kiri">
              <i class="fas fa-file-signature"></i>
            </div>
            <div class="kanan">
              <div class="title">Overtime Approval</div>
              <div class="sub-title">Submission of employee overtime</div>
            </div>
          </a>
          <a href="" class="navMenu">
            <div class="kiri">
              <i class="fas fa-chart-bar"></i>
            </div>
            <div class="kanan">
              <div class="title">Covid Monitoring</div>
              <div class="sub-title">weekly activity analytics</div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="justify-start gap-4">
          <div class="title-16-dark3">Top Overtime</div>
          <ul class="nav navBlue" role="tablist">
            <li class="nav-item-show">
              <a class="nav-link active" data-toggle="tab" href="#employee" role="tab"></i>Employee</a>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#buyer" role="tab"></i>Buyer</a>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#departement" role="tab"></i>Departement</a>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#analytics" role="tab"></i>Analytics Cost</a>
            </li>
          </ul>
        </div>
        <div class="tab-content card-block">
          <div class="tab-pane active" id="employee" role="tabpanel">
            <div class="cards-part br-20 relative zIndex mt-3">
              <div class="cards-head br-20-top">
                <div class="justify-sb">
                  <div class="title-16-dark-blue2 title-none no-wrap">TOP 10 employees with the most overtime hours</div>
                  <div class="containerSearch">
                    <input type="text" class="form-control borderInput" id="filter" placeholder="Search..."><i class="srch fas fa-search"></i>
                  </div>
                </div>
              </div>
              <div class="cards-body br-20-bot p-3">
                lorem
              </div>
            </div>
          </div>
          <div class="tab-pane" id="buyer" role="tabpanel">
              buyer
          </div>
          <div class="tab-pane" id="departement" role="tabpanel">
              departement
          </div>
          <div class="tab-pane" id="analytics" role="tabpanel">
              analytics
          </div>
        </div>
      </div>
    </div>
    <img src="{{url('images/icon/pola3.svg')}}" class="pola3">
    <img src="{{url('images/icon/hive.svg')}}" class="hive">
  </div>
</section>
@endsection

@push("scripts")

<script>
  $(document).ready(function($) {
    $('#filterDate').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
  });
</script>

@endpush