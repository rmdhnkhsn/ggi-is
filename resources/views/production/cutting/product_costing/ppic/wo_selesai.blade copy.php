@extends("layouts.app")
@section("title","PPIC")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
@endpush

@section("content")

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
          </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="col-lg-6" style="padding-bottom:15px;">
        <div class="row"> 
            <div class="col-lg-6 col-4">
            <center>
                <a href="{{route('cutting.ppic')}}" class="p_po"></i>Create Details WO
                <span class="number-badge">{{$jumlah_wo}}</span>
                </a>
            </center>
            <div class="garis_abu"></div>
            </div>
            <div class="col-lg-6 col-4">
            <center>
                <a href="{{route('cutting.wo_selesai')}}" class="p-worksheet"></i>WO with Details 
                <span class="number-badge">{{$wo_selesai}}</span>
                </a>
            </center>
            <div class="garis_kuning"></div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4">
            <p>
              <input type="text" id="mySearchText" placeholder="Search...">
              <button id="mySearchButton"><i class="fas fa-search"></i></button>
            </p>
            <table id="DTtable" class="table tbl-ctg table-striped table-bordered no-wrap">
                <thead>
                    <tr>
                        <th width="11%">WO</th>
                        <th width="11%">Style</th>
                        <th width="11%">Buyer</th>
                        <th width="8%">Total Qty</th>
                        <th width="11%">Factory</th>
                        <th width="11%">Production Date</th>
                        <th width="11%">Estimation Complete</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ppic as $key => $value)
                    <tr>
                        <td>{{$value->no_wo}}</td>
                        <td>{{$value->style}}</td>
                        <td>{{$value->buyer}}</td>
                        <td>{{$value->total_qty}}</td>
                        <td>{{$value->factory}}</td>
                        <td>{{$value->production_date}}</td>
                        <td>{{$value->estimation_complete}}</td>
                        <td>
                            <a href="{{route('cutting.ppic.edit', $value->no_wo)}}" class="btn btn-warning">Edit <i class="fas fa-edit"></i></a>
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
    $('#start_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#estimate_date').datetimepicker({
        format: 'Y-MM-DD',
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
      scrollX : '100%',
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );
  } );
</script>
@endpush