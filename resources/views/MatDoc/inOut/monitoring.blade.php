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
                <div class="handling">{{$data_all->where('in_mekanik','!=','')->where('in_ekspedisi','=','')->count()}} Data</div>
                <div class="bagian">Mechanic.</div>
              </div>
            </div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/warehouse.svg')}}" width="40%">
              <div class="text">
                <div class="handling">{{$data_all->where('in_gudang','!=','')->where('in_ekspedisi','=','')->count()}} Data</div>
                <div class="bagian">Warehouse.</div>
              </div>
            </div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/expedition.svg')}}" width="40%">
              <div class="text">
                <div class="handling">{{$data_all->where('in_ekspedisi','!=','')->where('in_dokumen','=','')->count()}} Data</div>
                <div class="bagian">Expedition.</div>
              </div>
            </div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/exim.svg')}}" width="42%">
              <div class="text">
                <div class="handling">{{$data_all->where('in_dokumen','!=','')->where('finish','=','')->count()}} Data</div>
                <div class="bagian">Exim.</div>
              </div>
            </div>
          </th>
          <th>
            <div class="tracking">
              <img src="{{ url('images/icon/matdoc/monitoring/complete.svg')}}" width="38%">
              <div class="text">
                <div class="handling">{{$data_all->where('finish','!=','')->count()}} Data</div>
                <div class="bagian">Complete.</div>
              </div>
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($data_all as $d)
        <tr>
          <td class="title">
            @if($d->from_branchdetail=='CLN')
              <div class="height">1201</div>
            @elseif($d->from_branchdetail=='GM1')
              <div class="height">1205</div>
            @elseif($d->from_branchdetail=='GM2')
              <div class="height">1204</div>
            @endif
          </td>
          <td class="title">
            <div class="height">{{$d->from_branchdetail}}</div>
          </td>
          <td class="title">
            <div class="height">{{$d->list_subkon()}}</div>
          </td>
          <td class="title">
            <div class="height">{{$d->bpb}}</div>
          </td>
          <td class="title">
            <div class="height">{{$d->list_glcat()}}</div>
          </td>
          <td class="tracking"></td>
          <td class="tracking">
            @if($d->in_mekanik!==null)
                @if($d->in_ekspedisi==null) 
                  <div class="timeTrackingDone">
                @else
                  <div class="timeTracking">
                @endif
                <div class="time">{{substr($d->in_mekanik,11,5)}}</div>
                <div class="date">{{date_format(date_create(substr($d->in_mekanik,0,10)),"d M Y")}}</div>
                @if($d->in_ekspedisi==null) 
                <img src="{{ url('images/icon/matdoc/monitoring/check.svg')}}" class="checkDoneImg">
                @endif
              </div>
            @endif
          </td>
          <td class="tracking">
            @if($d->in_mekanik!==null && $d->in_ekspedisi!==null)
              <div class="trackingSkip"></div>
            @else
              @if($d->in_gudang!==null)
              <!-- <div class="timeTrackingDelay"> -->
                @if($d->in_ekspedisi==null) 
                  <div class="timeTrackingDone">
                @else
                  <div class="timeTracking">
                @endif
                <div class="time">{{substr($d->in_gudang,11,5)}}</div>
                <div class="date">{{date_format(date_create(substr($d->in_gudang,0,10)),"d M Y")}}</div>
                @if($d->in_ekspedisi==null) 
                <img src="{{ url('images/icon/matdoc/monitoring/check.svg')}}" class="checkDoneImg">
                @endif
              </div>
              @endif
            @endif
          </td>
          <!-- <td class="tracking">
            <div class="trackingSkip"></div>
          </td> -->
          <td class="tracking">
            @if($d->in_ekspedisi!==null)
                @if($d->in_dokumen==null) 
                  <div class="timeTrackingDone">
                @else
                  <div class="timeTracking">
                @endif
                <div class="time">{{substr($d->in_ekspedisi,11,5)}}</div>
                <div class="date">{{date_format(date_create(substr($d->in_ekspedisi,0,10)),"d M Y")}}</div>
                @if($d->in_dokumen==null) 
                <img src="{{ url('images/icon/matdoc/monitoring/check.svg')}}" class="checkDoneImg">
                @endif
              </div>
            @endif
          </td>
          <td class="tracking">
            @if($d->in_dokumen!==null)
                @if($d->finish==null) 
                  <div class="timeTrackingDone">
                @else
                  <div class="timeTracking">
                @endif
                <div class="time">{{substr($d->in_dokumen,11,5)}}</div>
                <div class="date">{{date_format(date_create(substr($d->in_dokumen,0,10)),"d M Y")}}</div>
                @if($d->finish==null) 
                <img src="{{ url('images/icon/matdoc/monitoring/check.svg')}}" class="checkDoneImg">
                @endif
              </div>
            @endif
          </td>
          <td class="tracking">
            @if($d->finish!==null)
               <div class="timeTrackingDone">
                  <div class="time">{{substr($d->finish,11,5)}}</div>
                  <div class="date">{{date_format(date_create(substr($d->finish,0,10)),"d M Y")}}</div>
                  <img src="{{ url('images/icon/matdoc/monitoring/check.svg')}}" class="checkDoneImg">
              </div>
            @endif
          </td>
        </tr>
        @endforeach
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