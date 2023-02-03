@extends("layouts.app")
@section("title","Proses Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush

@section("content")

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 justify-center">
            <span class="ctg-ppic-title">Cutting Proses</span>
          </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-11 mx-auto">
          <div class="cards bg-card p-4">
            <p>
              <input type="text" id="mySearchText" placeholder="Search...">
              <button id="mySearchButton"><i class="fas fa-search"></i></button>
            </p>
            <table id="DTtable" class="table tbl-content-left table-striped no-wrap">
                <thead>
                    <tr>
                        <th width="15%">Form ID</th>
                        <th width="15%">Gelar</th>
                        <th width="10%">Total Qty (Lembar)</th>
                        <th width="15%">Assortmaker</th>
                        <th width="15%">Total Qty (pcs)</th>
                        <th width="15%">BODY/INT</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $value)
                  <?php 
                    $qty_gelar = collect($value->proses_gelar)->sum('qty_gelar');
                    $qty_pcs = collect($value->gelaran_wo)->sum('total_qty');
                    $qty1 = collect($value->gelar_qty_breakdown)->sum('qty1');
                    $qty2 = collect($value->gelar_qty_breakdown)->sum('qty2');
                    $qty3 = collect($value->gelar_qty_breakdown)->sum('qty3');
                    $qty4 = collect($value->gelar_qty_breakdown)->sum('qty4');
                    $qty5 = collect($value->gelar_qty_breakdown)->sum('qty5');
                    $qty6 = collect($value->gelar_qty_breakdown)->sum('qty6');
                    $qty7 = collect($value->gelar_qty_breakdown)->sum('qty7');
                    $qty8 = collect($value->gelar_qty_breakdown)->sum('qty8');
                    $qty9 = collect($value->gelar_qty_breakdown)->sum('qty9');
                    $qty10 = collect($value->gelar_qty_breakdown)->sum('qty10');
                    $qty11 = collect($value->gelar_qty_breakdown)->sum('qty11');
                    $qty12 = collect($value->gelar_qty_breakdown)->sum('qty12');
                    $qty13 = collect($value->gelar_qty_breakdown)->sum('qty13');
                    $qty14 = collect($value->gelar_qty_breakdown)->sum('qty14');
                    $qty15 = collect($value->gelar_qty_breakdown)->sum('qty15');
                    $jumlahnya = $qty1+$qty2+$qty3+$qty4+$qty5+$qty6+$qty7+$qty8+
                                $qty9+$qty10+$qty11+$qty12+$qty13+$qty14+$qty15;
                  ?>
                  <tr>
                    <td>
                      <a class="tbl-total-qty" data-toggle="modal" data-target="#FormID-{{$value->id}}" title="View Info">Form {{$value->id}}</a>
                      <div class="modal fade" id="FormID-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
                              <div class="modal-content" style="border-radius:10px">
                                  <div class="modal-body">
                                      <div class="row">
                                          <div class="col-12">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                              </button>
                                          </div>
                                      </div>
                                      @include('production.cutting.product_costing.proses_cutting.partials.tabel-listwo')
                                  </div>
                              </div>
                          </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-truncate" style="max-width:250px">
                        @foreach($value->proses_gelar_user as $key2 => $value2)
                          {{$value2->nama}}, 
                        @endforeach
                      </div>
                    </td>
                    <td>{{$qty_gelar}}</td>
                    <td>
                        <a class="tbl-total-qty" data-toggle="modal" data-target="#Assort-{{$value->id}}" title="View Info">{{$value->total_ratio}}</a>
                        <div class="modal fade" id="Assort-{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
                                <div class="modal-content" style="border-radius:10px">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                        @include('production.cutting.product_costing.admin_cutting.partials.tabel-assortmarker')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{$jumlahnya}}</td>
                    <td>
                      @include('production.cutting.product_costing.proses_cutting.partials.part')
                    </td>
                    <td>
                      @include('production.cutting.product_costing.proses_cutting.atribut.btn_action')
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  <!-- /.container-fluid -->
</section>
@endsection

@push("scripts")
<script>
    $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      scrollX:'auto',
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );
  } );
</script>
@endpush