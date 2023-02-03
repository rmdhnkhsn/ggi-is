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
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Status Delivery</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('warehouse-receiving') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Status Receiving</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-4">
      <div class="col-lg-8">
        <div class="cards-18 p-4">
          {{-- <ul class="nav nav-tabs sr-md-tabs mb-4" role="tablist">
              <li class="nav-item-show">
                  <a class="nav-link relative active" data-toggle="tab" href="#process" role="tab"></i>
                      <i class="fs-28 fas fa-truck-loading"></i>
                      <div class="f-14">On Process</div>
                      <span class="tabs-badge">{{ $totalOnProcess }}</span>
                  </a>
                  <div class="sr-slide"></div>
              </li>
              <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#done" role="tab"></i>
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
          </ul> --}}
          <ul class="nav nav-tabs sr-md-tabs mb-4" role="tablist">
            <li class="nav-item-show">
              <a class="nav-link relative active" data-toggle="tab" href="#process" role="tab"></i>
                <i class="fs-28 fas fa-truck-loading"></i>
                <div class="f-14">On Process</div>
                <span class="tabs-badge">{{ $totalOnProcess }}</span>
              </a>
              <div class="sr-slide"></div>
            </li>
          </ul>
          <div class="tab-content card-block">
            <div class="tab-pane active" id="process" role="tabpanel">
              @include('warehouse.qrcode.delivery.partials.tabs_process')
            </div>
            {{-- <div class="tab-pane" id="done" role="tabpanel">
              @include('warehouse.qrcode.delivery.partials.tabs_done')
            </div>
            <div class="tab-pane" id="anomali" role="tabpanel">
              @include('warehouse.qrcode.delivery.partials.tabs_anomali')
            </div> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-4 sr-notification">
        <div class="cards-18" style="max-height:855px; padding:1.3rem">
          <div class="row">
            <div class="col-12 mb-2">
              <div class="title-smb mb-1">Create Delivery</div>
              <a href="javascript:void(0)" class="btn-blue-md store-qr-code"><span class="text-truncate">Create QRcode</span></a> 
            </div>
            {{-- <div class="col-lg-6 mb-2">
              <div class="title-smb mb-1">Receiving Materials</div>
              <a href="{{ route('scan-delivery') }}" class="btn-green-md"><span class="text-truncate">Scan QRcode</span></a>
            </div> --}}
            <div class="col-12 mt-4">
              <div class="title-16 mb-1">Notification</div>
              <div class="cards-scroll pr-1 mt-1 scroll-Y" id="scroll-bar" style="max-height:700px">
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
  </div>
</section>

<div class="modal fade" id="modalStoreQrCode">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 border-bottom pb-2 mb-2 justify-sb">
                        <span class="title-15">Create QRcode</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <span class="title-sm">Number Contract</span>
                        <div class="justify-start" style="gap:.5rem !important">
                          <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select-icon"><i class="fas fa-file-signature"></i></span>
                            </div>
                            <input type="text" class="form-control border-input number_contract" name="number_contract" placeholder="input contract number...">
                          </div>
                          <button class="show-delivery-detail btn-green"><i class="fs-18 fas fa-sync-alt"></i></button>
                        </div>
                    </div>
                    {{-- <div class="col-12 mt-3">
                        <span class="title-sm">Vendor Name</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select-icon"><i class="fas fa-users"></i></span>
                            </div>
                            <input type="text" class="form-control border-input" name="vendor_name" placeholder="input vendor name...">
                        </div>
                    </div> --}}
                    <div class="col-12 mt-3">
                        <span class="title-sm">Transaction Date</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select-icon"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <select name="transaction_date" class="transaction_date form-control border-input"></select>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                      <button class="search-delivery-detail btn-blue btn-block">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@push("scripts")
<script src="{{asset('/common/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

  
  $('body').on('click', '.store-qr-code', function () {
    $('#modalStoreQrCode').modal('show')
  })



  function showLoading(){
    let timerInterval
    Swal.fire({
        title: 'Please Wait . . .',
        html: ' ',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
    })
}

  $('body').on('click', '.show-delivery-detail', function () {
    var number_contract = $('.number_contract').val()
    console.log(number_contract)
    $.ajax({
      data: {
        number_contract: number_contract
      },
      url: '{{ route("show-delivery-detail") }}?',         
      type: "get",
      dataType: 'json',            
      success: function (data) {   
        html = ``
        for (let i = 0; i < data.length; i++) {
          html += `<option value="`+data[i].F4111_TRDJ+`">`+data[i].F4111_TRDJ+`</option>`
        }
        $('.transaction_date').html(html)
      },
      error: function (xhr, status, error) {
        alert(xhr.responseText);
        
      }
    });
  })

  $('body').on('click', '.search-delivery-detail', function () {
    showLoading()
    var number_contract = $('.number_contract').val()
    var transaction_date = $('.transaction_date').val()
    location.replace("{{ url('/war/delivery-details') }}?number_contract="+number_contract+"&transaction_date="+transaction_date);
  })
</script>

@endpush