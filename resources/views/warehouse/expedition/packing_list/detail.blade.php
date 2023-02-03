@extends("layouts.app")
@section("title","Detail Packing List")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 my-3 text-center">
        <div class="title-30">DETAIL PACKING LIST </div>
        <div class="title-20">PT. GISTEX GARMEN INDONESIA</div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card">
          <div class="flat-title">Nomor PO </div>
          <div class="flat-desc">PO12165454</div>
          <div class="flat-title mt-2">Nomor OR</div>
          <div class="flat-desc">-</div>
          <div class="flat-title mt-2">Nomor WO</div>
          <div class="flat-desc">175461564</div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card">
          <div class="flat-title">Buyer</div>
          <div class="flat-desc">H&M</div>
          <div class="flat-title mt-2">Agent</div>
          <div class="flat-desc">Marubeni</div>
          <div class="flat-title mt-2">Nomor Kontrak</div>
          <div class="flat-desc">3251654321151</div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card">
          <div class="flat-title">Color</div>
          <div class="flat-desc">Black/Green/Blue</div>
          <div class="flat-title mt-2">Qty Order</div>
          <div class="flat-desc">12.000</div>
          <div class="flat-title mt-2">OFF CTN</div>
          <div class="flat-desc">20</div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card">
          <div class="flat-title">Satuan</div>
          <div class="flat-desc">PCE</div>
          <div class="flat-title mt-2">Warehouse</div>
          <div class="flat-desc">Cileunyi</div>
          <div class="flat-title mt-2">Tanggal</div>
          <div class="flat-desc">25 Januari 2021</div>
        </div>
      </div>
    </div>
    <div class="row pb-5 mt-2">
      <div class="col-12">
        <div class="cards-18" style="padding:1.5rem">
          <div class="cards-scroll scrollX" id="scroll-bar">
            <table class="table tbl-content-left no-wrap">
              <thead>
                <tr>
                  <th rowspan="2"><div class="mb-3">CTN CODE</div></th> 
                  <th rowspan="2"><div class="mb-3">COLOR CODE</div></th>
                  <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th>
                  <th rowspan="2"><div class="mb-3">ARTICLE</div></th>
                  <th colspan="5" class="text-center">SIZE</th>
                  <th rowspan="2"><div class="mb-3">QTY SIZE</div></th>
                  <th rowspan="2"><div class="mb-3">SATUAN</div></th>
                  <th rowspan="2"><div class="mb-3">NW</div></th>
                  <th rowspan="2"><div class="mb-3">GW</div></th>
                </tr>
                <tr>
                  <th>SS</th>
                  <th>S</th>
                  <th>M</th>
                  <th>L</th>
                  <th>XL</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1235</td>
                  <td>BK001</td>
                  <td>Cileunyi</td>
                  <td>System215</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  <td>10</td>
                  <td>10</td>
                  <td>1.000</td>
                  <td>Pcs</td>
                  <td>12.523</td>
                  <td>12.523</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 100,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 100,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });

  $(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

@endpush