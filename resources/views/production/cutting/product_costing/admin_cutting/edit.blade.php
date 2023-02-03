@extends("layouts.app")
@section("title","Edit Form")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section("content")
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 justify-center">
            <span class="ctg-ppic-title">Form Gelar</span>
          </div>
        </div>
    </div>
</div>
@include('production.cutting.product_costing.admin_cutting.partials.modal-edit')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="custom-col-9">
          <div class="cards bg-card p-4">
            <div class="row mt-2">
                <div class="col-10">
                    <span class="ctg-title-card">Daftar Gelaran WO </span>
                    <button type="button" class="ctg-buatForm ml-4" data-toggle="modal" data-target="#add_gelaran" title="Create">
                    <span class="mr-2">Add Item</span>  
                    <i class="fs-20 fas fa-plus"></i>
                    </button>
                </div>
                <div class="col-2 justify-end">
                    <label for="form">#Form {{$data->id}}</label>
                </div>
            </div>
            <div class="row mt-4 scrollX" id="scroll-bar">
                <div class="col-12 text-center">
                    <table class="table tbl-ctg table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>WO</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>BODY/INT</th>
                                <th>Total Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_gelaran as $key => $value)
                            <tr>
                                <td>{{$value['no_wo']}}</td>
                                <td>{{$value['style']}}</td>
                                <td>{{$value['color']}}</td>
                                <td>{{$value['part']}}</td>
                                <td>{{$value['total_qty']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <span class="ctg-title-card">Pemakaian Kain</span>
              </div>
            </div>
            <div class="row mt-4 scrollX" id="scroll-bar">
                <div class="col-12 text-center">
                    <table id="DTtable" class="table tbl-ctg table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Qty</th>
                                <th>Consumption</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->pemakaian_kain as $key => $value)
                            <tr>
                                <td>{{$value->color}}</td>
                                <td>{{$value->qty}}</td>
                                <td>{{$value->consumption}}</td>
                                <td>
                                    <a href="{{route('adm.delete_fabric', $value->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    <button title="Edit" data-toggle="modal" data-target="#edit_detail-{{$value->id}}" class="btn btn-warning btn-sm editData"><i class="fas fa-edit"></i></button>
                                    @include('production.cutting.product_costing.admin_cutting.partials.edit.modal-pemakaiankain')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <span class="ctg-title-card">Assortmarker</span>
                <?php 
                    $assort = collect($data->assortmarker)->count('id');
                ?>
                @if($assort != 0)
                <button type="button" class="ctg-buatForm ml-4" data-toggle="modal" data-target="#add_assortmarker" title="Create">
                    <span class="mr-2">Add New</span>  
                    <i class="fs-20 fas fa-plus"></i>
                </button>
                @endif
              </div>
            </div>
            @include('production.cutting.product_costing.admin_cutting.partials.assortmarker')
            @if($assort != 0)
            <form action="{{ route('adm.update_detail')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$data->id}}">
                <input type="hidden" name="factory" id="factory" value="{{str_replace(" ","",$branch->kode_jde)}}">
                <div class="row mt-2">
                    <div class="col-xl-3 col-md-6">
                        <span class="title-sm">Total Ratio</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" id="result" class="form-control border-input" name="total_ratio" value="{{$data->total_ratio}}" readonly>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <span class="title-sm">Panjang Marker</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" id="panjang_marker" name="panjang_marker" value="{{$data->panjang_marker}}" placeholder="0">
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-md-6">
                        <span class="title-sm">Panjang Marker Actual</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" id="panjang_marker_actual" name="panjang_marker_actual" placeholder="0" readonly>
                        </div>
                    </div> -->
                    <div class="col-xl-3 col-md-6">
                        <span class="title-sm">Lebar Marker</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" id="lebar_marker" name="lebar_marker" value="{{$data->lebar_marker}}" placeholder="0">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <span class="title-sm">QTY Lembar</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" id="qty_lembar" name="qty_lembar" value="{{$data->qty_lembar}}" placeholder="Insert QTY Lembar">
                        </div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn ctg-buatForm">Simpan<i class="wp-icon-btn fas fa-download"></i></button>
                    </div>
                </div>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@push("scripts")
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX:'auto',
      "pageLength": 10,
      "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    } );
  });

</script>
<script>
$(document).ready(function () {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
});

$('#no_wo').change(function(){
var ID = $(this).val();    
if(ID){
    $.ajax({
    data: {
        ID: ID,
    },
    url: '{{ route("cutting.color") }}',           
    type: "post",
    dataType: 'json',    
        success:function(res){               

        if(res){
            $("#color").empty();
            $("#color").append('');
            i=0;
            $.each(res,function(){
                console.log(res[i].F560020_SEG4);
                $("#color").append('<option value=""></option><option value="'+res[i].F560020_SEG4+'|'+res[i].F560020_DOCO+'">'+res[i].F560020_SEG4+'</option>');
                i+=1;
            });
        }else{
            $("#color").empty();
        }
        }
    });
}else{
    $("#color").empty();

}      
});

$(document).ready(function() {
    $(document).on('change', '.data_ppic', function() {

      var id = $(this).val();
      console.log(id)
      $.get('create/data_ppic' + id , function (data) {
          $('#add_gelaran').modal('show');
          $('#gaya').val(data.style);
          $('#style_number').val(data.number_style);
          $('#beli').val(data.buyer);
          $('#fabric').val(data.factory);
          console.log(data.style)
      })
    });
});

$('#no_wo').change(function(){
var ID = $(this).val();    
console.log(ID)
if(ID){
    $.ajax({
    data: {
        ID: ID,
    },
    url: '{{ route("cutting.component") }}',           
    type: "post",
    dataType: 'json',    
        success:function(res){               
        if(res){
            $("#part").empty();
            $("#part").append('');
            i=0;
            $.each(res,function(){
                console.log(res);
                $("#part").append('<option value="'+res[i].id+'">'+res[i].item_desc+'</option>');
                i+=1;
            });
        }else{
            $("#part").empty();
        }
        }
    });
}else{
    $("#part").empty();

}      
});

$('#color').change(function(){
var ID = $(this).val();    
console.log(ID)
if(ID){
    $.ajax({
    data: {
        ID: ID,
    },
    url: '{{ route("cutting.size") }}',           
    type: "post",
    dataType: 'json',    
        success:function(res){               
        if(res){
            $("#qty_breakdown").empty();
            $("#qty_breakdown").append('');
            i=0;
            size=1;
            $.each(res,function(){
                console.log(res);
                $("#qty_breakdown").append(`
                <div class="col-xl-3 col-lg-6">
                    <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                            <span class="ctg-input-group" for="">`+res[i].size+`</span>

                        </div>
                        <input type="hidden" class="form-control border-input ratio-reject" id="size" name="size`+[size]+`" value="`+res[i].size+`" required>
                        <input type="text" class="form-control border-input ratio-reject" id="" name="qty`+[size]+`" value="`+res[i].quantity+`" required>
                    </div>
                </div>`);
                i+=1;
                size+=1;
            });
        }else{
            $("#part").empty();
        }
        }
    });
}else{
    $("#part").empty();

}      
});

$(".qty1").on("blur", function(){
    var sum=0;
    $(".qty1").each(function(){
        if($(this).val() !== "")
          sum += parseInt($(this).val(), 10);   
    });

    $('#result').val(sum);
});
</script>
@endpush