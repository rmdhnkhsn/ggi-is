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
            <div class="col-lg-6" style="padding-bottom:15px;">
                <div class="row"> 
                    <div class="col-lg-6 col-4">
                    <center>
                        <a href="{{route('worksheet.po_list')}}" class="p_po"></i>Create Details WO
                        <span class="number-badge">{{$jumlah_wo}}</span>
                        </a>
                    </center>
                    <div class="garis_kuning"></div>
                    </div>
                    <div class="col-lg-6 col-4">
                    <center>
                        <a href="{{route('cutting.wo_selesai')}}" class="p-worksheet"></i>WO with Details 
                        <span class="number-badge">{{$wo_selesai}}</span>
                        </a>
                    </center>
                    <div class="garis_abu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4">
            <p>
              <input type="text" id="mySearchText" placeholder="Search...">
              <button id="mySearchButton"><i class="fas fa-search"></i></button>
            </p>
            @include('production.cutting.product_costing.ppic.atribut.modal-qty')
            <table id="DTtable" class="table tbl-ctg table-striped table-bordered no-wrap">
                <thead>
                    <tr>
                        <th width="11%">WO</th>
                        <th width="11%">Style</th>
                        <th width="11%">Buyer</th>
                        <th width="8%">Total Qty</th>
                        <th width="11%">Factory</th>
                        <th width="11%">Production Date</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_table_ppic as $key => $value)
                    @php 
                      $url=route('cutting.qty_breakdown',['id'=>$value['no_wo']]);
                    @endphp
                    <tr>
                        <td>{{$value['no_wo']}}</td>
                        <td>{{$value['style']}}</td>
                        <td>{{$value['buyer']}}</td>
                        <!-- <td><a href="javascript:void(0)" class="QTYbreakdown" data-id="{{ $value['no_wo'] }}" title="Quantity" data-toggle="modal" data-target="#totalQty">{{$value['total_qty']}}</td> -->
                        <td><a href="javascript:void(0)" onclick="get_breakdown('{{$url}}');" >{{$value['total_qty']}}</td>
                        <td>{{$value['factory']}}</td>
                        <td>{{$value['production_date']}}</td>
                        <td>
                        <form action="{{ route('cutting.ppic.create')}}" method="post" enctype="multipart/form-data">
                          @csrf
                            <input type="hidden" name="no_wo" id="no_wo" value="{{$value['no_wo']}}">
                            <input type="hidden" name="item_number" id="item_number" value="{{$value['item_number']}}">
                            <input type="hidden" name="style" id="style" value="{{$value['style']}}">
                            <input type="hidden" name="buyer" id="buyer" value="{{$value['buyer']}}">
                            <input type="hidden" name="total_qty" id="total_qty" value="{{$value['total_qty']}}">
                            <button type="submit" class="btn btn-pic-schedule" >Schedule<i class="ml-2 fs-20 fas fa-arrow-right"></i></button>
                        </form>
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
      order:[[3,"desc"]],
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );
  } );
</script>
<script>
  $('body').on('click', '.QTYbreakdown', function (event) {
  event.preventDefault();   
  var id = $(this).data('id');

});

function get_breakdown(url) {
  console.log(url)
  
  $.get(url , function (data) {
      $('#totalQty').modal('show');
      $("#tabel_breakdown_body").empty();
      i=0;
      $.each(data, function() {
        console.log(data[i].color);
        $("#tabel_breakdown").find('tbody').append("<tr><td>"+data[i].color+"</td><td>"+data[i].size+"</td><td>"+data[i].qty+"</td></tr>");
        i+=1;
      });
  })
}
</script>
@endpush