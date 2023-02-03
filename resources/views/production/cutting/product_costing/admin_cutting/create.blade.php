@extends("layouts.app")
@section("title","Create Form")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


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
@include('production.cutting.product_costing.admin_cutting.partials.modal-create')
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
                    <label for="form">#Form {{$form_id}}</label>
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
                    <table class="table tbl-ctg table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Qty</th>
                                <th>Consumption</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('add.assortmarker')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="form_id" id="form_id" value="{{$form_id}}">
                <div class="row mt-2">
                    <div class="col-gelar">
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input ratio-reject" id="size1" name="size[]" value="" placeholder="Size">
                            <input type="number" class="form-control border-input ratio-reject qty1" id="qty1" name="qty[]" value="" placeholder="Qty">
                        </div>
                    </div>
                    <div class="col-gelar">
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input ratio-reject" id="size2" name="size[]" value="" placeholder="Size">
                            <input type="number" class="form-control border-input ratio-reject qty1" id="qty2" name="qty[]" value="" placeholder="Qty">
                        </div>
                    </div>
                    <div class="col-gelar">
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input ratio-reject" id="size3" name="size[]" value="" placeholder="Size">
                            <input type="number" class="form-control border-input ratio-reject qty1" id="qty3" name="qty[]" value="" placeholder="Qty">
                        </div>
                    </div>
                    <div class="col-gelar">
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input ratio-reject" id="size4" name="size[]" value="" placeholder="Size">
                            <input type="number" class="form-control border-input ratio-reject qty1" id="qty4" name="qty[]" value="" placeholder="Qty">
                        </div>
                    </div>
                    <div class="col-gelar2">
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input ratio-reject" id="size5" name="size[]" value="" placeholder="Size">
                            <input type="number" class="form-control border-input ratio-reject qty1" id="qty5" name="qty[]" value="" placeholder="Qty">
                        </div>
                    </div>
                    <div class="col-gelar2">
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input ratio-reject" id="size6" name="size[]" value="" placeholder="Size">
                            <input type="number" class="form-control border-input ratio-reject qty1" id="qty6" name="qty[]" value="" placeholder="Qty">
                        </div>
                    </div>
                    <div class="col-gelar3">
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input ratio-reject" id="size7" name="size[]" value="" placeholder="Size">
                            <input type="number" class="form-control border-input ratio-reject qty1" id="qty7" name="qty[]" value="" placeholder="Qty">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-xl-3 col-md-6">
                        <span class="title-sm">Total Ratio</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" id="result" class="form-control border-input" name="total_ratio" readonly>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <span class="title-sm">Panjang Marker</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" id="panjang_marker" name="panjang_marker" placeholder="0">
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
                            <input type="text" class="form-control border-input" id="lebar_marker" name="lebar_marker" placeholder="0">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <span class="title-sm">QTY Lembar</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" id="qty_lembar" name="qty_lembar" placeholder="0">
                        </div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn ctg-buatForm">Simpan<i class="wp-icon-btn fas fa-download"></i></button>
                    </div>
                </div>
            </form>
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