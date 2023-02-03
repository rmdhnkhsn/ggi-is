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
        <div class="title-30">PACKING LIST </div>
        <div class="title-20">PT. GISTEX GARMEN INDONESIA</div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card" style="height:156px">
          <div class="flat-title">Invoice</div>
          <div class="flat-desc">S-5366/WBC.09/KPP.MP.04/2021</div>
          <div class="flat-title mt-2">Description</div>
          <div class="flat-desc truncate">Garmen LK 231 Garmen LK 231Garmen LK 231Garmen LK 231 Lorem ipsum dolor sit amet.</div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card" style="height:156px">
          <div class="flat-title">Buyer</div>
          <div class="flat-desc">H&M</div>
          <div class="flat-title mt-2">Date</div>
          <div class="flat-desc truncate">01 January 2021</div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card" style="height:156px">
          <div class="flat-title">Container No</div>
          <div class="flat-desc">D 43154 AM</div>
          <div class="flat-title mt-2">Seal No</div>
          <div class="flat-desc truncate">13100071.21.06279</div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card" style="height:156px">
          <div class="flat-title">Download Packing List</div>
          <div class="containerGrid">
            <a href="" class="btn-merah">Download<i class="fs-18 ml-3 fas fa-file-pdf"></i></a>
            <a href="" class="btn-green">Download<i class="fs-18 ml-3 fas fa-file-excel"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row pb-5 mt-2">
      <div class="col-12 mb-2">
        <div class="cards-18" style="padding:1.5rem">
          <div class="cards-scroll scrollX" id="scroll-bar">
            <table class="table tbl-content-left no-wrap">
              <thead>
                <tr>
                  <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                  <th rowspan="2"><div class="mb-3">TTL CTN</div></th>
                  <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th>
                  <th rowspan="2"><div class="mb-3">WO</div></th>
                  <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th>
                  <th rowspan="2"><div class="mb-3">STYLE</div></th>
                  <th rowspan="2"><div class="mb-3">ARTICLE NO</div></th>
                  <th rowspan="2"><div class="mb-3">PO</div></th>
                  <th rowspan="2"><div class="mb-3">COLOR</div></th>
                  <th rowspan="2"><div class="mb-3">BUYER</div></th>
                  <th colspan="5" class="text-center">SIZE</th>
                  <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                  <th rowspan="2"><div class="mb-3">TTL PACK</div></th>
                  <th rowspan="2"><div class="mb-3">NW</div></th>
                  <th rowspan="2"><div class="mb-3">GW</div></th>
                  <th rowspan="2"><div class="mb-3">MEAS (M3)</div></th>
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
                  <td>20</td>
                  <td>Cileunyi</td>
                  <td>10754548</td>
                  <td>323216425</td>
                  <td>Stylem 215</td>
                  <td>23256146</td>
                  <td>PO26546251</td>
                  <td>BLACK</td>
                  <td>H & M</td>
                  <td>0</td>
                  <td>0</td>
                  <td>10</td>
                  <td>10</td>
                  <td>0</td>
                  <td>1.000</td>
                  <td>Pcs</td>
                  <td>12.326</td>
                  <td>12.326</td>
                  <td>12.326</td>
                </tr>
                <tr>
                  <td>1235</td>
                  <td>20</td>
                  <td>Cileunyi</td>
                  <td>10754548</td>
                  <td>323216425</td>
                  <td>Stylem 215</td>
                  <td>23256146</td>
                  <td>PO26546251</td>
                  <td>BLACK</td>
                  <td>H & M</td>
                  <td>0</td>
                  <td>0</td>
                  <td>10</td>
                  <td>10</td>
                  <td>0</td>
                  <td>1.000</td>
                  <td>Pcs</td>
                  <td>12.326</td>
                  <td>12.326</td>
                  <td>12.326</td>
                </tr>
                <tr>
                  <td>1235</td>
                  <td>20</td>
                  <td>Cileunyi</td>
                  <td>10754548</td>
                  <td>323216425</td>
                  <td>Stylem 215</td>
                  <td>23256146</td>
                  <td>PO26546251</td>
                  <td>BLACK</td>
                  <td>H & M</td>
                  <td>0</td>
                  <td>0</td>
                  <td>10</td>
                  <td>10</td>
                  <td>0</td>
                  <td>1.000</td>
                  <td>Pcs</td>
                  <td>12.326</td>
                  <td>12.326</td>
                  <td>12.326</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>JUMLAH</th>
                  <th>4.000</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>1.000</th>
                  <th>2.000</th>
                  <th>3.000</th>
                  <th>6.000</th>
                  <th>4.000</th>
                  <th>16.000</th>
                  <th></th>
                  <th>5.200</th>
                  <th>5.400</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
            <table class="table tbl-content-left no-wrap">
              <thead>
                <tr>
                  <th rowspan="2"><div class="mb-3">CTN NO</div></th> 
                  <th rowspan="2"><div class="mb-3">TTL CTN</div></th>
                  <th rowspan="2"><div class="mb-3">WAREHOUSE</div></th>
                  <th rowspan="2"><div class="mb-3">WO</div></th>
                  <th rowspan="2"><div class="mb-3">CONTRACT NO</div></th>
                  <th rowspan="2"><div class="mb-3">STYLE</div></th>
                  <th rowspan="2"><div class="mb-3">ARTICLE NO</div></th>
                  <th rowspan="2"><div class="mb-3">PO</div></th>
                  <th rowspan="2"><div class="mb-3">COLOR</div></th>
                  <th rowspan="2"><div class="mb-3">BUYER</div></th>
                  <th colspan="5" class="text-center">SIZE</th>
                  <th rowspan="2"><div class="mb-3">TTL PCS</div></th>
                  <th rowspan="2"><div class="mb-3">TTL PACK</div></th>
                  <th rowspan="2"><div class="mb-3">NW</div></th>
                  <th rowspan="2"><div class="mb-3">GW</div></th>
                  <th rowspan="2"><div class="mb-3">MEAS (M3)</div></th>
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
                  <td>20</td>
                  <td>Cileunyi</td>
                  <td>10754548</td>
                  <td>323216425</td>
                  <td>Stylem 215</td>
                  <td>23256146</td>
                  <td>PO26546251</td>
                  <td>BLACK</td>
                  <td>H & M</td>
                  <td>0</td>
                  <td>0</td>
                  <td>10</td>
                  <td>10</td>
                  <td>0</td>
                  <td>1.000</td>
                  <td>Pcs</td>
                  <td>12.326</td>
                  <td>12.326</td>
                  <td>12.326</td>
                </tr>
                <tr>
                  <td>1235</td>
                  <td>20</td>
                  <td>Cileunyi</td>
                  <td>10754548</td>
                  <td>323216425</td>
                  <td>Stylem 215</td>
                  <td>23256146</td>
                  <td>PO26546251</td>
                  <td>BLACK</td>
                  <td>H & M</td>
                  <td>0</td>
                  <td>0</td>
                  <td>10</td>
                  <td>10</td>
                  <td>0</td>
                  <td>1.000</td>
                  <td>Pcs</td>
                  <td>12.326</td>
                  <td>12.326</td>
                  <td>12.326</td>
                </tr>
                <tr>
                  <td>1235</td>
                  <td>20</td>
                  <td>Cileunyi</td>
                  <td>10754548</td>
                  <td>323216425</td>
                  <td>Stylem 215</td>
                  <td>23256146</td>
                  <td>PO26546251</td>
                  <td>BLACK</td>
                  <td>H & M</td>
                  <td>0</td>
                  <td>0</td>
                  <td>10</td>
                  <td>10</td>
                  <td>0</td>
                  <td>1.000</td>
                  <td>Pcs</td>
                  <td>12.326</td>
                  <td>12.326</td>
                  <td>12.326</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>JUMLAH</th>
                  <th>4.000</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>1.000</th>
                  <th>2.000</th>
                  <th>3.000</th>
                  <th>6.000</th>
                  <th>4.000</th>
                  <th>16.000</th>
                  <th></th>
                  <th>5.200</th>
                  <th>5.400</th>
                  <th></th>
                </tr>
                <tr>
                  <th>TOTAL</th>
                  <th>8.000</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>2.000</th>
                  <th>4.000</th>
                  <th>6.000</th>
                  <th>12.000</th>
                  <th>8.000</th>
                  <th>32.000</th>
                  <th></th>
                  <th>10.200</th>
                  <th>10.400</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <div class="rc-col-2">
        <div class="sb-card p-3">
          <div class="txt1">Total Carton</div>
          <div class="txt2">139.771</div>
        </div>
      </div>
      <div class="rc-col-2">
        <div class="sb-card p-3">
          <div class="txt1">Total Pcs</div>
          <div class="txt2">153.749</div>
        </div>
      </div>
      <div class="rc-col-2">
        <div class="sb-card p-3">
          <div class="txt1">NW</div>
          <div class="txt2">38.438</div>
        </div>
      </div>
      <div class="rc-col-2">
        <div class="sb-card p-3">
          <div class="txt1">GW</div>
          <div class="txt2">331.958</div>
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