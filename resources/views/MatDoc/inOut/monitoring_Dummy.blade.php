@extends("layouts.blank.app")
@section("title","MONITORING")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2VW.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content monitoring">
  <div class="justify-sb">
    <div class="justify-start gap-8">
      <div class="title-48">Tracking Status <span class="text-biru">Pengeluaran Barang</span> </div>
      <a href="" class="btnFilter" data-toggle="modal" data-target="#filter"><i class="mr-2 fas fa-filter"></i>Filter</a>
      @include('MatDoc.inOut.partials.filter')
    </div>
    <img src="{{ url('images/iconpack/gistex.svg')}}" class="imgGistex">
  </div>
  <div class="title-bpb">Total {{count($data_all)}} Data BPB</div>
  <img src="{{ url('images/icon/matdoc/monitoring/pola.svg')}}" class="imgPola">
  <div class="containerTable" id="scrollBlueXL">
    <table class="table tableTracking">
      <thead class="stickyHeader">
        <tr>
          <th class="title">
            <div class="height">UNIT</div>
          </th>
          <th class="title">
            <div class="height">FTY</div>
          </th>
          <th class="title">
            <div class="height">PO</div>
          </th>
          <th class="title">
            <div class="height">BPB</div>
          </th>
          <th class="title">
            <div class="height">G/L CAT</div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/mechanic.svg')}}" width="35%">
              <div class="text">
                <div class="handling">2 Data</div>
                <div class="bagian">Mechanic</div>
              </div>
            </div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/warehouse.svg')}}" width="40%">
              <div class="text">
                <div class="handling">{{$data_all->where('in_gudang','!=','')->where('in_ekspedisi','=','')->count()}} Data</div>
                <div class="bagian">Warehouse</div>
              </div>
            </div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/expedition.svg')}}" width="40%">
              <div class="text">
                <div class="handling">{{$data_all->where('in_ekspedisi','!=','')->where('in_dokumen','=','')->count()}} Data</div>
                <div class="bagian">Expedition</div>
              </div>
            </div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/exim.svg')}}" width="42%">
              <div class="text">
                <div class="handling">{{$data_all->where('in_dokumen','!=','')->where('finish','=','')->count()}} Data</div>
                <div class="bagian">Exim</div>
              </div>
            </div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/complete.svg')}}" width="38%">
              <div class="text">
                <div class="handling">{{$data_all->where('finish','!=','')->count()}} Data</div>
                <div class="bagian">Complete</div>
              </div>
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="title">
            <div class="height">1201</div>
          </td>
          <td class="title">
            <div class="height">CLN</div>
          </td>
          <td class="title">
            <div class="height">001/TRIMS/ GGI CLN / I /2023</div>
          </td>
          <td class="title">
            <div class="height">12456</div>
          </td>
          <td class="title">
            <div class="height">78945</div>
          </td>
          <td class="tracking">
            <div class="timeTracking">
              <div class="time">15:00</div>
              <div class="date">12/12/2022</div>
            </div>
          </td>
          <td class="tracking">
            <div class="trackingSkip"></div>
          </td>
          <td class="tracking">
            <div class="timeTracking">
              <div class="time">15:00</div>
              <div class="date">12/12/2022</div>
            </div>
          </td>
          <td class="tracking">
            <div class="timeTracking">
              <div class="time">15:00</div>
              <div class="date">12/12/2022</div>
            </div>
          </td>
          <td class="tracking">
            <div class="timeTrackingDone">
              <div class="time">17:00</div>
              <div class="date">12/12/2022</div>
              <img src="{{ url('images/icon/matdoc/monitoring/check.svg')}}" class="checkDoneImg">
          </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

@endsection

@push("scripts")
<script>
  let elem = document.querySelector(".containerTable");
  let lastScrollValue = 0
  let double_lastScrollValue = 0
  let scrollOptions = { top: 90, behavior: 'smooth' }
  let l = console.log.bind(console)

  let intScroll = window.setInterval(function() {
    double_lastScrollValue = lastScrollValue //last
    lastScrollValue = elem.scrollTop // after a scroll, this is current
    if (double_lastScrollValue > 0 && double_lastScrollValue == lastScrollValue){
        elem.scrollBy({ top: elem.scrollHeight * -1 });
    } else {
        if (elem.scrollTop == 0){
              elem.scrollBy({ top: 90, behavior: 'smooth' });
        } else {
            elem.scrollBy(scrollOptions);
        }
    }
  }, 1000);
</script>
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
  $(document).ready(function(){
    const options = document.getElementsByClassName('select2-selection--single');
    Array.from(options).forEach(function (element) {
        element.style = "height : 2.6vw !important";
        console.log(element);
      });
	});
</script>
@endpush