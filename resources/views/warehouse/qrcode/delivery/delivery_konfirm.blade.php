@extends("layouts.app")
@section("title","Delivery Confirm")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
    @include('warehouse.partials.navbar')
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('delivery-details') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Pick Item</div>
            </div>
          </div>
        </div>
      </a>
       <a href="{{ route('delivery-konfirm') }}" class="column-2">
        <div class="cards nav-card  bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12"> 
              <i class="icons-active fas fa-box"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Confirm Box</div>
            </div>
          </div>
          @if($item_picked_byuser)
            <span class="tabs-badge mr-1" style="top : 6px; right : 10px">{{$item_picked_byuser->total_item_picked()}}</span>
          @endif
        </div>
      </a>
      <!-- <a href="{{ route('receiving-details') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Status Receiving</div>
            </div>
          </div>
        </div>
      </a> -->
    </div>
    <form action="{{route ('delivery-create') }}" method="post" enctype="multipart/form-data">
    @csrf  
      <div class="row pb-4">
        <div class="col-12">
          <div class="cards" style="padding: 30px 20px">
            <div class="row">
              <div class="col-12 mt-4">
                <div class="title-24 title-absolute">Material Konfirm</div>
                <div class="cards-scroll scrollX" id="scroll-bar-sm">
                  <button id="btnSearch"><i class="fas fa-search"></i></button>  
                  <table id="DTtable3" class="table tbl-content-left no-wrap">
                      <thead>
                          <tr>
                              <th>NO BOX</th>
                              <th></th>
                              <th>DOC NUMBER</th>
                              <th>SUBCONT.NO</th>
                              <th>DESC1</th>
                              <th>DESC2</th>
                              <th>QUANTITY</th>
                              <th>TRANS UOM</th>
                              <th>TRANSACTION DATE</th>
                              <th>DOC TYPE</th>
                              <th>DOC CO</th>
                              <th>BRANCH/PLANT</th>
                              <th>UNIT COST</th>
                              <th>EXTENDED</th>
                              <th>LOT/SERIAL</th>
                              <th>LOCATION</th>
                              <th>ORDER CO</th>
                              <th>CLASS CODE</th>
                              <th>G/L DATE</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if($item_picked_byuser)
                          @foreach ($item_picked_byuser->items as $v)
                            <tr>
                              <td>{{ $v->no_box }}</td>
                              <td>
                                  <a href="{{route('warehouse-delete-box',$v->id)}}" class="btn-icon-red" title="Delete Box"><i class="fas fa-times"></i></a>
                                  <!-- <input type="checkbox" id="check{{$v->id}}" class="check1"> -->
                                  <input type="hidden" id="cek{{$v->id}}" name="cek[]" >
                                  <input type="hidden" id="id" name="id" value="{{$v->warehouse_delivery_id}}">
                              </td>
                              <td>{{ $v->wo }}</td>
                              <td>{{ $v->no_kontrak }}</td>
                              <td>{{ $v->item }}</td>
                              <td>{{ $v->item2 }}</td>
                              <td>{{number_format( $v->qty,2) }}</td>
                              <td>{{ $v->trans_uom }}</td>
                              <td>{{ $v->transaction_date }}</td>
                              <td>{{ $v->doc_type }}</td>
                              <td>{{ $v->doc_co }}</td>
                              <td>{{ $v->branch }}</td>
                              <td>{{ $v->unit_cost }}</td>
                              <td>{{ $v->extended }}</td>
                              <td>{{ $v->lot_serial }}</td>
                              <td>{{ $v->location }}</td>
                              <td>{{ $v->order_co }}</td>
                              <td>{{ $v->class_code }}</td>
                              <td>{{ $v->gl_date }}</td>
                            </tr>
                            <script>
                                  $(document).on('click', '#check{{$v->id}}', function(){
                                    var status = document.getElementById('check{{ $v->id }}').value;
                                    if(document.getElementById('check{{ $v->id }}').checked){
                                      var result = '1';
                                      document.getElementById('cek{{$v->id}}').value = result;
                                    }
                                    else{
                                      var result = null; 
                                      document.getElementById('cek{{ $v->id}}').value = result;
                                    }    
                                      
                                  }); 
                              </script>
                          @endforeach
                        @endif
                      </tbody>
                  </table>
                </div>
                <div class="flex mt-3"> 
                  <button name="archive" type="submit" onclick="archiveFunction()" id="save" class="btn-blue-md" style="width:235px">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection

@push("scripts")


<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/css/sweetalert.min.css')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('common/css/sweetalert.min.css')}}">

<script>
  function archiveFunction() {
  event.preventDefault(); // prevent form submit
  var form = event.target.form; // storing the form
    swal({
      title: "Apakah Anda Yakin?",
      text: "Ini akan Membuat QR Code ke Halaman Receive !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes",
      cancelButtonText: "No ",
      closeOnConfirm: false,
      closeOnCancel: false
    },
  function(isConfirm){
    if (isConfirm) {
      form.submit();          // submitting the form when user press yes
    } else {
      swal("Cancelled", "File imajiner Anda aman :)", "error");
    }
  });
}
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable3').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

@endpush