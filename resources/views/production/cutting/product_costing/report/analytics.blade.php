@extends("layouts.app")
@section("title","Data Analytics")
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
                <span class="title-24">Analytics</span>
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
                                <th>WO</th>
                                <th>Gelar</th>
                                <th>Cutting</th>
                                <th>Numbering</th>
                                <th>Pressing</th>
                                <th>Bundling</th>
                                <th>Total Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_pertama as $key => $value)
                            <?php 
                            $total_cost = round($value['total_bayar_gelar']+$value['total_bayar_cutting']+$value['total_bayar_numbering']+$value['total_bayar_pressing']+$value['total_bayar_bundling']);
                            ?>
                            <tr>
                                <td>{{$value['no_wo']}}</td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#cost_gelar{{$value['no_wo']}}">Rp. {{number_format($value['total_bayar_gelar'], 2, ",", ".")}}</a>
                                    @include('production.cutting.product_costing.report.partials.analytics.analytics_modal')
                                </td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#cost_cutting{{$value['no_wo']}}">Rp. {{number_format($value['total_bayar_cutting'], 2, ",", ".")}}</a>
                                    @include('production.cutting.product_costing.report.partials.analytics.analytics_modal')
                                </td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#cost_numbering{{$value['no_wo']}}">Rp. {{number_format($value['total_bayar_numbering'], 2, ",", ".")}}</a>
                                    @include('production.cutting.product_costing.report.partials.analytics.analytics_modal')
                                </td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#cost_pressing{{$value['no_wo']}}">Rp. {{number_format($value['total_bayar_pressing'], 2, ",", ".")}}</a>
                                    @include('production.cutting.product_costing.report.partials.analytics.analytics_modal')
                                </td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#cost_bundling{{$value['no_wo']}}">Rp. {{number_format($value['total_bayar_bundling'], 2, ",", ".")}}</a>
                                    @include('production.cutting.product_costing.report.partials.analytics.analytics_modal')
                                </td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#total_cost{{$value['no_wo']}}">Rp. {{number_format($total_cost, 2, ",", ".")}}</a>
                                    @include('production.cutting.product_costing.report.partials.analytics.analytics_modal')
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