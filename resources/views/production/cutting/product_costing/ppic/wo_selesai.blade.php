@extends("layouts.app")
@section("title","PPIC")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12 justify-sb">
              <div class="title-20 title-hide">Data Cutting Order</div>
              <div class="flexx" style="gap:.6rem">
                <a href="#" class="btn-blue-md no-wrap" data-toggle="modal" data-target="#tambahOrder">Order Cutting<i class="fs-18 ml-2 fas fa-plus"></i></a>
                @include('production.cutting.product_costing.ppic.atribut.tambah_order')
                <div class="containerFormAll">
                  <input type="text" id="SearchText" class="searchTextAll" placeholder="search..." required>
                  <button type="button" id="SearchBtn" class="iconSearchAll"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
            <div class="col-12 mt-2 pb-5">
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable" class="table tbl-content-left no-wrap">
                  <thead>
                    <tr>
                      <th>NO</th> 
                      <th>WO</th>
                      <th>Style</th>
                      <th>Buyer</th>
                      <th>Total Qty</th>
                      <th>Factory</th>
                      <th>Production Date</th>
                      <th>Estimation Complete</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;?>
                    @foreach($ppic as $key => $value)
                    <tr>
                        <td scope="row">{{ $no }}</td>
                        <td>{{$value->no_wo}}</td>
                        <td>{{$value->style}}</td>
                        <td>{{$value->buyer}}</td>
                        <td>{{$value->total_qty}}</td>
                        <td>{{$value->factory}}</td>
                        <td>{{$value->production_date}}</td>
                        <td>{{$value->estimation_complete}}</td>
                        <td>
                          <div class="container-tbl-btn">
                            <a href="" class="btn-simple-edit" data-toggle="modal" data-target="#editOrder{{$value->id}}" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Edit"><i class="fas fa-pencil-alt"></i></a>
                            @include('production.cutting.product_costing.ppic.atribut.edit_order')
                            <!-- <a href="{{route('cutting.ppic.edit', $value->no_wo)}}" class="btn btn-warning">Edit <i class="fas fa-edit"></i></a> -->
                          </div>
                        </td>
                    </tr>
                    <?php $no++ ;?>
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
</section>
@endsection

@push("scripts")
<script>
  $(document).ready(function() {
    $(".multipleSelect").select2();
  });
  $(document).ready(
    function () {
        $('#multipleSelectExample').select2();
    }
  );
  
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })

  $('#start_date').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
  });
  $('#estimate_date').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
  });
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX : '100%',
      order:[[3,"desc"]],
      "pageLength": 10,
      "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    });
  });
  var input = document.getElementById("SearchText");
  input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("SearchBtn").click();
    }
  });
</script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.select2bs4_add').select2({
      theme: 'bootstrap4',
      minimumInputLength: 3,
      ajax: {
        type: "POST",
        url: '{{ route("cutting.ppic.search_wo") }}',
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
              no_wo: params.term // search term
          };
        },
        processResults: function (response) {
          return {
              results: response
            };
        },
        cache: true
      }
})

$('.select2bs4_add').on('select2:select', function (e) {
    e.preventDefault();
    var data = e.params.data;
    $('#nomor_wo').val(data.text);
});

$('#no_wo').change(function(){
var ID = $(this).val();    
// console.log(ID)
if(ID){
    $.ajax({
    data: {
        id: ID,
    },
    url: '{{ route("cutting.ppic.schedule_wo") }}',           
    type: "post",
    dataType: 'json',    
    success:function(res){         
      console.log(res.style);     
      $('#style_wo').val(res.style);
      $('#buyer_wo').val(res.buyer);
      $('#style_number').val(res.style_name);
      $('#item_number_wo').val(res.item_number);
      $('#total_qty_wo').val(res.total_qty);
      $('#total_qty_wo').val(res.total_qty);
      $('#start_date').val(res.start_date);
      $('#finish_date').val(res.finish_date);
    }
    });
}    
});
$('#no_wo').change(function(){
var ID = $(this).val();    
console.log(ID)
if(ID){
    $.ajax({
    data: {
        id: ID,
    },
    url: '{{ route("cutting.ppic.component_wo") }}',           
    type: "post",
    dataType: 'json',    
        success:function(res){       
          console.log(res);        
        if(res){
            $("#multipleSelectExample").empty();
            $("#multipleSelectExample").append('');
            i=0;
            $.each(res,function(){
                $("#multipleSelectExample").append(`<option value='${res[i].item_number}|${res[i].seq}|${res[i].desc}|${res[i].status}|${res[i].remark}'>${res[i].seq} - ${res[i].desc} - ${res[i].status} </option>`);
                i+=1;
            });
        }else{
            $("#multipleSelectExample").empty();
        }
        }
    });
}else{
    $("#multipleSelectExample").empty();
}      
});
</script>
@endpush 
