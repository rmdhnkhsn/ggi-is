@extends("layouts.app")
@section("title","Report Warehouse")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<section class="content-header">
    <div class="row pb-4">
      <div class="col-12">
        <div class="cards" style="padding: 30px 20px">
          <div class="row">
            <div class="col-12 mt-4">
                @if($status_delivery =='DELIVERY')
                  <div class="title-24 title-absolute">REPORT HARIAN PENGIRIMAN MATERIAL/BARANG JADI/MESIN-SPAREPART</div>
                  @elseif($status_delivery =='RECEIVING')
                    <div class="title-24 title-absolute">REPORT HARIAN PENERIMAAN MATERIAL/BARANG JADI/MESIN-SPAREPART</div>
                  
                  @endif
              <div class="cards-scroll scrollX" id="scroll-bar-sm">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable" class="table tbl-content-left no-wrap">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NO BOX</th>
                            <th>DOC NUMBER</th>
                            <th>DESC 1</th>
                            <th>DESC 2</th>
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
                      @foreach ($data_awal as $key =>$value)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $value['no_box'] }}</td>
                          <td>{{ $value['wo'] }}</td>
                          <td>{{ $value['item'] }}</td>
                          <td>{{ $value['item2'] }}</td>
                          <td>{{ $value['doc_type'] }}</td>
                          <td>{{ $value['doc_co'] }}</td>
                          <td>{{ $value['transaction_date'] }}</td>
                          <td>{{ $value['branch'] }}</td>
                          <td>{{ $value['qty'] }}</td>
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
                    <div class="col-md-1 col-6">
                      <form action="{{ route('warehouse-reportPDF') }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                            <input type="hidden" name="branch" id="branch" value="{{ $dataBranch->id }}">
                            <input type="hidden" name="status_delivery" id="status_delivery" value="{{ $status_delivery }}">
                          <button type="submit" class="btn-merah-md ml-2">Download<i class="ml-2 fas fa-file-pdf"></i></button>
                      </form>
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



