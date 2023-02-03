@extends("layouts.app")
@section("title","Work Life")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid overtimeReq pb-4"> 
    <div class="row relative pt-2" style="z-index: 99">
      <div class="col-12 mt-5 showRes">
        <img src="{{url('images/icon/comcen/overtime/clock.svg')}}" class="clockImg2">
        <div class="cards4 text-center p-4" style="min-height:142px">
          <div class="title-20" style="margin-top:2.4rem"><span class="c-blue">WORK LIFE</span><span class="c-orange ml-2">HOUR BALANCE</span> </div>
          <div class="title-10-grey mt-1">Analisis keseimbangan lembur karyawan PT. <br/>Gistex games Indonesia bulan <span class="c-orange">Desember 2022</span> </div>
        </div>
      </div>
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
      <div class="col-lg-9 hideRes">
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
    <div class="row relative stacking pt-4">
      <div class="col-lg-3">
        @include('CommandCenter2.HRGA.overtime.partials.menu')
      </div>
      <div class="col-lg-9">
        <div class="justify-start2 gap-4">
          <div class="title-16-dark3 no-wrap">Top Overtime</div>
          <ul class="nav navBlue">
            <div class="cards-scroll scrollX justify-start" id="scrollBlue">
              <li class="nav-item-show">
                <a class="nav-link" href=""></i>Employee</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" href="{{ route('cc.overtime.buyer')}}"></i>Buyer</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link active" href="{{ route('cc.overtime.departement')}}"></i>Departement</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" href="{{ route('cc.overtime.analytics')}}"></i>Analytics Cost</a>
              </li>
            </div>
          </ul>
        </div>
        <div class="cards-part br-20 relative stacking mt-3">
          <div class="cards-head br-20-top">
            <div class="justify-sb3">
              <div class="title-16-dark-blue2 text-center">TOP 10 Departement with the most overtime hours</div>
              <div class="containerSearch">
                <input type="text" class="form-control borderInput" id="filter" placeholder="Search..."><i class="srch fas fa-search"></i>
              </div>
            </div>
          </div>
          <div class="cards-body br-20-bot p-3">
            <ul class="containerList" id="scroll-bar2">
              <li class="list">
                <div class="number bg-softPink c-pink">1</div>
                <div class="name2">
                  <div class="title-16-dark3">MAT & DOC</div>
                  <div class="title-14-dark"><span class="fw-500 mr-1">Cost :</span> Rp. 100.000.000,-</div> 
                </div>
                <div class="time">
                  <div class="title-12-grey">Jam Lembur</div>
                  <div class="title-14-dark3">45 Jam</div>
                </div>
                <div class="status">
                  <div class="title-12-grey">STATUS</div>
                  <div class="title-14-dark3 c-pink">Extreme</div>
                </div>
                <div class="containerDetails">
                  <button type="button" class="details btn-quick-access">
                    <i class="fas fa-info"></i>
                  </button>
                </div>
              </li>
              <li class="list">
                <div class="number bg-softPink c-pink">2</div>
                <div class="name2">
                  <div class="title-16-dark3">IT & DT</div>
                  <div class="title-14-dark"><span class="fw-500 mr-1">Cost :</span> Rp. 90.000.000,-</div> 
                </div>
                <div class="time">
                  <div class="title-12-grey">Jam Lembur</div>
                  <div class="title-14-dark3">12 Jam</div>
                </div>
                <div class="status">
                  <div class="title-12-grey">STATUS</div>
                  <div class="title-14-dark3 c-blue">Moderate</div>
                </div>
                <div class="containerDetails">
                  <button type="button" class="details btn-quick-access">
                    <i class="fas fa-info"></i>
                  </button>
                </div>
              </li>
              <li class="list">
                <div class="number bg-softYellow c-yellow">3</div>
                <div class="name2">
                  <div class="title-16-dark3">PRODUCTION</div>
                  <div class="title-14-dark"><span class="fw-500 mr-1">Cost :</span> Rp. 90.000.000,-</div> 
                </div>
                <div class="time">
                  <div class="title-12-grey">Jam Lembur</div>
                  <div class="title-14-dark3">12 Jam</div>
                </div>
                <div class="status">
                  <div class="title-12-grey">STATUS</div>
                  <div class="title-14-dark3 c-yellow">High</div>
                </div>
                <div class="containerDetails">
                  <button type="button" class="details btn-quick-access">
                    <i class="fas fa-info"></i>
                  </button>
                </div>
              </li>
              <li class="list">
                <div class="number bg-softBlue c-blue">4</div>
                <div class="name2">
                  <div class="title-16-dark3">EXIM</div>
                  <div class="title-14-dark"><span class="fw-500 mr-1">Cost :</span> Rp. 50.000.000,-</div> 
                </div>
                <div class="time">
                  <div class="title-12-grey">Jam Lembur</div>
                  <div class="title-14-dark3">12 Jam</div>
                </div>
                <div class="status">
                  <div class="title-12-grey">STATUS</div>
                  <div class="title-14-dark3 c-yellow">High</div>
                </div>
                <div class="containerDetails">
                  <button type="button" class="details btn-quick-access">
                    <i class="fas fa-info"></i>
                  </button>
                </div>
              </li>
              <li class="list">
                <div class="number bg-softBlue c-blue">5</div>
                <div class="name2">
                  <div class="title-16-dark3">MARKETING</div>
                  <div class="title-14-dark"><span class="fw-500 mr-1">Cost :</span> Rp. 120.000.000,-</div> 
                </div>
                <div class="time">
                  <div class="title-12-grey">Jam Lembur</div>
                  <div class="title-14-dark3">12 Jam</div>
                </div>
                <div class="status">
                  <div class="title-12-grey">STATUS</div>
                  <div class="title-14-dark3 c-blue">Moderate</div>
                </div>
                <div class="containerDetails">
                  <button type="button" class="details btn-quick-access">
                    <i class="fas fa-info"></i>
                  </button>
                </div>
              </li>
              <li class="list">
                <div class="number bg-softBlue c-blue">6</div>
                <div class="name2">
                  <div class="title-16-dark3">WAREHOUSE</div>
                  <div class="title-14-dark"><span class="fw-500 mr-1">Cost :</span> Rp. 120.000.000,-</div> 
                </div>
                <div class="time">
                  <div class="title-12-grey">Jam Lembur</div>
                  <div class="title-14-dark3">12 Jam</div>
                </div>
                <div class="status">
                  <div class="title-12-grey">STATUS</div>
                  <div class="title-14-dark3 c-blue">Moderate</div>
                </div>
                <div class="containerDetails">
                  <button type="button" class="details btn-quick-access">
                    <i class="fas fa-info"></i>
                  </button>
                </div>
              </li>
              @include('CommandCenter2.HRGA.overtime.partials.list_employee')
            </ul>
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

  $(document).ready(function(){
    $("#filter").keyup(function(){
      var filter = $(this).val(), count = 0;
      $(".containerList li").each(function(){
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).fadeOut();
        } else {
          $(this).show();
          count++;
        }
      });
    });
  });
</script>
<script>
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("closeBtn")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }
  span.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
@endpush