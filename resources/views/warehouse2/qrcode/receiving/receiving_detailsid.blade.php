@extends("layouts.app")
@section("title","Delivery Details")
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
      <a href="{{ route('delivery-details') }}" class="column-2">
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
       <a href="{{ route('delivery-konfirm') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12"> 
              <i class="icons fas fa-box"></i>
            </div>
            <div class="col-12">
              <div class="desc">Confirm Box</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('receiving-details') }}" class="column-2">
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
      <div class="col-12">
        <div class="cards" style="padding: 30px 20px">
          <div class="row">
            <div class="col-12 mt-4">
              <div class="title-24 title-absolute">Material Receiving Details</div>
              <div class="cards-scroll scrollX" id="scroll-bar-sm">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable" class="table tbl-content-left no-wrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>DOC NUMBER</th>
                            <th>ITEM</th>
                            <th>DOC TYPE</th>
                            <th>DOC CO</th>
                            <th>TRANSACTION DATE</th>
                            <th>BRANCH/PLANT</th>
                            <th>QUANTITY</th>
                            <th>TRANS UOM</th>
                            <th>UNIT COST</th>
                            <th>EXTENDED</th>
                            <th>LOT/SERIAL</th>
                            <th>LOCATION</th>
                            <th>ORDER CO</th>
                            <th>CLASS CODE</th>
                            <th>G/L DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($dataResultJDE as $key =>$value)
                        <tr>
                          <td>
                            {{-- <input type="checkbox" id="check1" value="" name=""> --}}
                          </td>
                          <td>{{ $value['wo'] }}</td>
                          <td>{{ $value['item'] }}</td>
                          <td>{{ $value['doc_type'] }}</td>
                          <td>{{ $value['doc_co'] }}</td>
                          <td>{{ $value['transaction_date'] }}</td>
                          <td>{{ $value['branch'] }}</td>
                          <td>{{ number_format( $value['qty'],2) }}</td>
                          <td>{{ $value['trans_uom'] }}</td>
                          <td>{{ $value['unit_cost'] }}</td>
                          <td>{{ $value['extended'] }}</td>
                          <td>{{ $value['lot_serial'] }}</td>
                          <td>{{ $value['location'] }}</td>
                          <td>{{ $value['order_co'] }}</td>
                          <td>{{ $value['class_code'] }}</td>
                          <td>{{ $value['gl_date'] }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

              </div>
              <div class="flex mt-3">
                  <a href="{{ route('warehouse-qrcodeID',$value['id_barcode']) }}" class="btn-merah">Download<i class="ml-2 fas fa-file-pdf"></i></a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

<script>
  document.getElementById('save').addEventListener('click', function() {
    swal({
      title: 'Are you sure?',
      text: "Save Data & Create Qrcode..?",
      type: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'OK'
    })//.then(function (isConfirm) {
      // swal(
      //   'Success!',
      //   'Your file has been Saved.',
      //   'success'
      // )
    //})
  });
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

@endpush