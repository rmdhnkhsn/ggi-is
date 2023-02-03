@extends("layouts.app")
@section("title","Proses Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush

@section("content")
  <section class="content">
    <div class="container-fluid">
        @include('production.cutting.product_costing.report.partials.sidemenu')
        <div class="row mb-3">
            <div class="col-12">
                <span class="title-24">Proses Cutting</span>
            </div>
        </div>
        <div class="row pb-5">
          <div class="col-12">
            <div class="cards p-4">
                <button id="btn_search"><i class="fas fa-search"></i></button>
                <div class="cards-scroll scrollX" id="scroll-bar">
                    <table id="DTtable" class="table tbl-ctg table-striped no-wrap text-center" width="100%">
                        <thead>
                            <tr>
                                <th>TANGGAL</th>
                                <th>COLOR</th>
                                <th>FORM ID</th>
                                <th>WO</th>
                                <th>Qty/ORANG</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>DURATION (M)</th>
                                <th>COST/PCS</th>
                                <th>TOTAL COST</th>
                                <th>REMARK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_pertama as $key => $value)
                            <tr>
                                <td>{{$value['tanggal']}}</td>
                                <td>{{$value['color']}}</td>
                                <td>Form {{$value['form_id']}}</td>
                                <td>{{$value['no_wo']}}</td>
                                <td>{{$value['qty_user']}}</td>
                                <td>{{$value['nik']}}</td>
                                <td>{{$value['nama']}}</td>
                                <td>{{number_format($value['durasi_per_wo'], 2, ",", ".")}}</td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#cost{{$value['no_wo']}}-{{$value['nik']}}" title="View Info">Rp. {{number_format($value['cost_pc'], 2, ",", ".")}}</a>
                                    @include('production.cutting.product_costing.report.partials.cutting.cutting_modal')
                                </td>
                                <td>Rp. {{number_format($value['total_cost_wo'], 2, ",", ".")}}</td>
                                <td>{{$value['keterangan']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX:'100%',
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );
  } );
</script>
@endpush