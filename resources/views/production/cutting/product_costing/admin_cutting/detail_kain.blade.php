@extends("layouts.app")
@section("title","Admin Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-cutting.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-12">
            <span class="title-20">Daftar Kain</span>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <div class="cards bg-card p-4 scrollX" id="scroll-bar">
                <button id="cutting_search"><i class="fas fa-search"></i></button>
                <table id="DTtable" class="table tbl-ctg table-striped">
                    <thead>
                        <tr>
                            <th>WO</th>
                              <th>Style</th>
                              <th>Style Number</th>
                              <th>Buyer</th>
                              <th>Color</th>
                              <th>Roll No</th>
                              <th>Country</th>
                              <th>Fabric</th>
                              <th>QTY Utuh</th>
                              <th>Pemakaian Kain</th>
                              <th>Satuan</th>
                              <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data->label_kain as $key => $value)
                        <tr>
                            <td>{{$value->no_wo}}</td>
                            <td>{{$value->style}}</td>
                            <td>{{$value->number_style}}</td>
                            <td>{{$value->buyer}}</td>
                            <td>{{$value->color}}</td>
                            <td>{{$value->roll_no}}</td>
                            <td>{{$value->country}}</td>
                            <td>{{$value->fabric}}</td>
                            <td>{{$value->qty_utuh}}</td>
                            <td>{{$value->pemakaian_kain}}</td>
                            <td>{{$value->satuan}}</td>
                            <td>
                              <div class="container-tbl-btn justify-start">
                                <a data-toggle="modal" data-target="#modal-edit{{$value->id}}" class="btn-icon-yellow mr-2"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('cutting.label_delete', $value->id)}}" class="btn-icon-red"><i class="fas fa-trash"></i></a>
                              </div>
                            </td>
                        </tr>
                        @include('production.cutting.product_costing.admin_cutting.partials.edit-label')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 text-right" style="padding-bottom:15px;">
              <a href="{{route('cutting.label_print', $data->id)}}" type="submit" class="btn ctg-buatForm">Print<i class="wp-icon-btn fas fa-print"></i></a>
        </div>
      </div>
    </div>
</section>
@endsection

@push("scripts")
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX:'auto',
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"><"clear">'
    });
  });
</script>
@endpush