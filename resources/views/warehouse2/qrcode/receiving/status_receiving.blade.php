@extends("layouts.app")
@section("title","Warehouse")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
    @include('warehouse.partials.navbar')
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('warehouse-delivery') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Status Delivery</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('warehouse-receiving') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Status Receiving</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-4">
      <div class="col-lg-8">
        <div class="cards-18 p-4">
          <ul class="nav nav-tabs sr-md-tabs mb-4" role="tablist">
            <li class="nav-item-show">
                <a class="nav-link relative active" data-toggle="tab" href="#done" role="tab"></i>
                    <i class="fs-28 fas fa-check-double"></i>
                    <div class="f-14">Done</div>
                    <span class="tabs-badge">{{ $totalDone }}</span>
                </a>
                <div class="sr-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link relative" data-toggle="tab" href="#anomali" role="tab"></i>
                    <i class="fs-28 fas fa-exclamation-circle"></i>
                    <div class="f-14">Anomali</div>
                    <span class="tabs-badge">{{ $totalAnomali }}</span>
                </a>
                <div class="sr-slide"></div>
            </li>
          </ul>
          <div class="tab-content card-block">
            <div class="tab-pane active" id="done" role="tabpanel">
              @include('warehouse.qrcode.receiving.partials.tabs_done')
            </div>
            <div class="tab-pane" id="anomali" role="tabpanel">
              @include('warehouse.qrcode.receiving.partials.tabs_anomali')
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 sr-notification">
        <div class="cards-18" style="max-height:855px; padding:1.3rem">
          <div class="row">
            <div class="col-12 mb-2">
              <div class="title-smb mb-1">Receiving Materials</div>
              <a href="{{ route('scan-delivery') }}" class="btn-green-md"><span class="text-truncate">Scan QRcode</span></a>
            </div>
            <div class="col-12 mt-4">
               @foreach ($notificationData as $key => $value)
                @if (($value['status_delivery'] == 'ANOMALI'))
                <div class="notification">
                  <div class="notification-icon"><i class="fas fa-bell"></i></div>
                  <div class="notification-desc">
                    <div class="notification-title text-truncate"><span class="txt-fail">{{ $value['status_delivery'] }}</span> No. Pengiriman {{ $value['id_barcode'] }}</div> 
                    <div class="notification-number">{{ $value['remark'] }}</div>
                  </div>
                </div>
                 @elseif(($value['status_delivery'] == 'NEW'))
                <div class="notification">
                  <div class="notification-icon"><i class="fas fa-bell"></i></div>
                  <div class="notification-desc">                    
                    <div class="notification-title text-truncate"><span class="txt-primary">{{ $value['status_delivery'] }}</span> No. Pengiriman {{ $value['id_barcode'] }}</div> 
                    <div class="notification-number">Sedang Dalam Pengiriman</div>
                  </div>
                </div>
                 @elseif(($value['status_delivery'] == 'DONE'))
                <div class="notification">
                  <div class="notification-icon"><i class="fas fa-bell"></i></div>
                  <div class="notification-desc">                    
                    <div class="notification-title text-truncate"><span class="txt-pased">{{ $value['status_delivery'] }}</span> No. Pengiriman {{ $value['id_barcode'] }}</div> 
                    <div class="notification-number">Pengiriman Telah selesai</div>
                  </div>
                </div>
                @endif
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable3').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });

  $('#Date').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date2').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date3').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
</script>

@endpush