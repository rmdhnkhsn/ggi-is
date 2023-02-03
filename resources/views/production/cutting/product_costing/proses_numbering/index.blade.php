@extends("layouts.app")
@section("title","Proses Numbering")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<!-- <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> -->
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

<style>
  .dataTables_empty {
    text-align: center !important;
  }
</style>

@endpush

@section("content")

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12" id="numbering">
          <div class="row py-2">
            <div class="col-12 text-center">
              <div class="cards py-3 px-4">
                <div class="title-20 text-left py-2">Proses Numbering</div>
                <button id="SearchBTN"><i class="fas fa-search"></i></button>
                <table id="DTtable" class="table tbl-content-left table-striped no-wrap">
                    <thead>
                        <tr>
                            <th>Form ID</th>
                            <th>List Wo</th>
                            <th>Cutting User</th>
                            <th>Qty Lembar</th>
                            <th>Total Qty</th>
                            <th>Assortmaker</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($numbering as $key => $value)
                      <?php 
                        $qty_gelar = collect($value->proses_gelar)->sum('qty_gelar');
                        $qty_pcs = collect($value->gelaran_wo)->sum('total_qty');
                        $no_wo = collect($value->gelar_qty_breakdown)->groupby('no_wo');
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
                          @foreach($no_wo as $key4 => $value4)
                            <a class="tbl-total-qty" data-toggle="modal" data-target="#nmb_list{{$value->id}}-{{$key4}}" title="View Info">{{$key4}}</a> -
                            @include('production.cutting.product_costing.proses_numbering.partials.listWO')
                          @endforeach
                        </td>
                        <td class="text-truncate">
                          <div style="width:180px">
                            @foreach($value->proses_cutting_user as $key2 => $value2)
                              {{$value2->nama}}, 
                            @endforeach
                          </div>
                        </td>
                        <td>{{$qty_gelar}}</td>
                        <td>{{$jumlahnya}}</td>
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
                        <td>
                          @include('production.cutting.product_costing.proses_numbering.atribut.btn_numbering')
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12" id="pressing">
          <div class="row py-2">
            <div class="col-12 text-center">
              <div class="cards py-3 px-4">
                <div class="title-20 text-left py-2">Proses Pressing</div>
                <button id="SearchBTN"><i class="fas fa-search"></i></button>
                <table id="DTtable2" class="table tbl-content-left table-striped no-wrap">
                    <thead>
                        <tr>
                            <th>Form ID</th>
                            <th>List Wo</th>
                            <th>Numbering User</th>
                            <th>Qty Lembar</th>
                            <th>Total Qty</th>
                            <th>Assortmaker</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($pressing as $key => $value)
                      <?php 
                        $qty_gelar = collect($value->proses_gelar)->sum('qty_gelar');
                        $qty_pcs = collect($value->gelaran_wo)->sum('total_qty');
                        $no_wo = collect($value->gelar_qty_breakdown)->groupby('no_wo');
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
                          @foreach($no_wo as $key4 => $value4)
                            <a class="tbl-total-qty" data-toggle="modal" data-target="#nmb_list{{$value->id}}-{{$key4}}" title="View Info">{{$key4}}</a> -
                            @include('production.cutting.product_costing.proses_numbering.partials.listWO')
                          @endforeach
                        </td>
                        <td class="text-truncate">
                          <div style="width:180px">
                            @foreach($value->proses_numbering_user as $key2 => $value2)
                              {{$value2->nama}}, 
                            @endforeach
                          </div>
                        </td>
                        <td>{{$qty_gelar}}</td>
                        <td>{{$jumlahnya}}</td>
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
                        <td>
                          @include('production.cutting.product_costing.proses_numbering.atribut.btn_pressing')
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12" id="bundling">
          <div class="row py-2">
            <div class="col-12 text-center">
              <div class="cards py-3 px-4">
                <div class="title-20 text-left py-2">Proses Bundling</div>
                <button id="SearchBTN"><i class="fas fa-search"></i></button>
                <table id="DTtable3" class="table tbl-content-left table-striped no-wrap">
                    <thead>
                        <tr>
                            <th>Form ID</th>
                            <th>No Wo</th>
                            <th>Color</th>
                            <th>Numbering User</th>
                            <th>Pressing User</th>
                            <th>Qty Gelar</th>
                            <th>Size</th>
                            <th>Total Qty</th>
                            <th>Sisa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($bundling as $key => $value)
                        <?php 
                        $percobaan = collect($value->proses_bundling)->where('status', null);
                        ?>
                        @foreach($percobaan as $key2 => $value2)
                          <?php 
                            $qty1 = collect($value2->gelar_qty_breakdown)->sum('qty1');
                            $qty2 = collect($value2->gelar_qty_breakdown)->sum('qty2');
                            $qty3 = collect($value2->gelar_qty_breakdown)->sum('qty3');
                            $qty4 = collect($value2->gelar_qty_breakdown)->sum('qty4');
                            $qty5 = collect($value2->gelar_qty_breakdown)->sum('qty5');
                            $qty6 = collect($value2->gelar_qty_breakdown)->sum('qty6');
                            $qty7 = collect($value2->gelar_qty_breakdown)->sum('qty7');
                            $qty8 = collect($value2->gelar_qty_breakdown)->sum('qty8');
                            $qty9 = collect($value2->gelar_qty_breakdown)->sum('qty9');
                            $qty10 = collect($value2->gelar_qty_breakdown)->sum('qty10');
                            $qty11 = collect($value2->gelar_qty_breakdown)->sum('qty11');
                            $qty12 = collect($value2->gelar_qty_breakdown)->sum('qty12');
                            $qty13 = collect($value2->gelar_qty_breakdown)->sum('qty13');
                            $qty14 = collect($value2->gelar_qty_breakdown)->sum('qty14');
                            $qty15 = collect($value2->gelar_qty_breakdown)->sum('qty15');
                            $jumlahnya = $qty1+$qty2+$qty3+$qty4+$qty5+$qty6+$qty7+$qty8+
                                        $qty9+$qty10+$qty11+$qty12+$qty13+$qty14+$qty15;
                          ?>
                          <tr>
                            <td>{{$value2->form_id}}</td>
                            <td>{{$value2->no_wo}}</td>
                            <td>{{$value2->color}}</td>
                            <td class="text-truncate">
                              <div style="width:150px">
                                {{$value2->numbering_user}}
                              </div>
                            </td>
                            <td class="text-truncate">
                              <div style="width:150px">
                                {{$value2->pressing_user}}
                              </div>
                            </td>
                            <td>{{$jumlahnya}}</td>
                            <td>{{$value2->size}}</td>
                            <td>{{$value2->qty}}</td>
                            <td>{{$value2->sisa}}</td>
                            <td>
                              @include('production.cutting.product_costing.proses_numbering.atribut.btn_bundling')
                            </td>
                          </tr>
                        @endforeach
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ScrollCutting">
        <a href="#numbering" class="ScrollToNumbering"><i class="fas fa-sort-numeric-down"></i></a>
        <a href="#pressing" class="ScrollToPressing"><i class="fas fa-compress"></i></a>
        <a href="#bundling" class="ScrollToBundling"><i class="fas fa-scroll"></i></a>
      </div>
    </div>
</section>
@endsection

@push("scripts")
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX:'auto',
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    //   scrollX:'auto',
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    } );
  });
  $(document).ready( function () {
    var table = $('#DTtable3').DataTable({
    //   scrollX:'auto',
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    } );
  });

</script>
@endpush