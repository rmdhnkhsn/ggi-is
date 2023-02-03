@extends("layouts.app")
@section("title","Proses Gelar")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush

@section("content")

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 justify-center">
            <span class="ctg-ppic-title">Gelar</span>
          </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="custom-col-9 text-center">
          <div class="cards bg-card p-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="justify-sb" style="gap:1rem">
                        <div class="title-14 text-white">All Data</div>
                        <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-12">
                    <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable" class="table tbl-ctg table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th width="16%">No. Gelaran</th>
                                    <th width="16%">Total Qty Lembar</th>
                                    <th width="16%">Assortmaker</th>
                                    <th width="16%">Total Qty Pcs</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($form as $key => $value)
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
                                                        @include('production.cutting.product_costing.admin_cutting.partials.tabel-listwo')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $total_qty = collect($value->pemakaian_kain)->sum('consumption');
                                        ?>
                                        {{$value->qty_lembar}}
                                    </td>
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
                                        <?php
                                        $total_qty = collect($value->gelaran_wo)->sum('total_qty');
                                        ?>
                                        {{$value->qty_lembar * $value->total_ratio}}
                                    </td>
                                    <td>
                                        <div class="container-tbl-btn justify-center">
                                            <a href="{{ route('mulai-gelar', $value->id)}}" class="btn-blue">Start<i class="ml-2 fs-20 fas fa-arrow-right"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- /.container-fluid -->
</section>
@endsection

@push("scripts")
<script>
    $('#start_date').datetimepicker({
        format: 'DD-MM-Y',
        showButtonPanel: true
    });
    $('#estimate_date').datetimepicker({
        format: 'DD-MM-Y',
        showButtonPanel: true
    });

    $(document).ready(
        function () {
            $('#multipleSelectExample').select2();
        }
    );
</script>
<script>
    $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      scrollX:'auto',
      "pageLength": 5,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );
  } );
</script>
@endpush