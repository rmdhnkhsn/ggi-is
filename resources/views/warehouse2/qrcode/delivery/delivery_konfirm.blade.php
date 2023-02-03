@extends("layouts.app")
@section("title","Delivery Details")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
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
              <div class="desc">Status Delivery</div>
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
        </div>
      </a>
      <a href="{{ route('receiving-details') }}" class="column-2">
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
      </a>
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
                              <th></th>
                              <th>DOC NUMBER</th>
                              <th>ITEM</th>
                              <th>DOC TYPE</th>
                              <th>DOC CO</th>
                              <th>TRANSACTION DATE</th>
                              <th>BRANCH/PLANT</th>
                              <th>QUANTITY</th>
                              <th>TRANS UOM</th>
                              <th>UNIT COST</th>
                              <th>EXTENDED</th>
                              <th>LOT/SERIAL</th>
                              <th>LOCATION</th>
                              <th>ORDER CO</th>
                              <th>CLASS CODE</th>
                              <th>G/L DATE</th>
                              <th>ACTION</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($dataResultJDE as $key =>$value)
                          <tr>
                            <td>
                              <input type="checkbox" class="check1" id="check{{$value['id']}}">
                                <input type="hidden" id="cek{{$value['id']}}" name="cek[]" >
                                <input type="hidden" id="id" name="id[]" value="{{ $value['id'] }}">
                            </td>
                            <td>{{ $value['wo'] }}</td>
                            <td>{{ $value['item'] }}</td>
                            <td>{{ $value['doc_type'] }}</td>
                            <td>{{ $value['doc_co'] }}</td>
                            <td>{{ $value['transaction_date'] }}</td>
                            <td>{{ $value['branch'] }}</td>
                            <td>{{number_format( $value['qty'],2) }}</td>
                            <td>{{ $value['trans_uom'] }}</td>
                            <td>{{ $value['unit_cost'] }}</td>
                            <td>{{ $value['extended'] }}</td>
                            <td>{{ $value['lot_serial'] }}</td>
                            <td>{{ $value['location'] }}</td>
                            <td>{{ $value['order_co'] }}</td>
                            <td>{{ $value['class_code'] }}</td>
                            <td>{{ $value['gl_date'] }}</td>
                            <td>
                                {{-- <div class="flex" style="gap:.35rem;margin:-6px 0">
                                    <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                                    <input type="hidden" id="status" name="status" value="CONFIRM">
                                    <button type="submit" class="btn-simple-check"><i class="fs-20 fas fa-check"></i></button>
                                    {{-- <a href=""  class="btn-simple-delete"><i class="fs-20 fas fa-times"></i></a> 
                                  </div> --}}
                            </td>
                          </tr>
                          <script>
                                $(document).on('click', '#check{{$value['id']}}', function(){
                                  var status = document.getElementById('check{{ $value['id'] }}').value;
                                  if(document.getElementById('check{{ $value['id'] }}').checked){
                                    var result = '1';
                                    document.getElementById('cek{{$value['id'] }}').value = result;
                                  }
                                  else{
                                    var result = null; 
                                    document.getElementById('cek{{ $value['id'] }}').value = result;
                                  }    
                                    
                                }); 
                            </script>
                        @endforeach
                      </tbody>
                  </table>
                </div>
                <div class="flex mt-3"> 
                  <button name="archive" type="submit" onclick="archiveFunction()" id="save" class="btn-blue-md" style="width:235px">Create Barcode</button>
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

<script>
  function archiveFunction() {
  event.preventDefault(); // prevent form submit
  var form = event.target.form; // storing the form
    swal({
      title: "Apakah Anda Yakin?",
      text: "Ini akan Membuat QR Code ke Halaman Receive !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#2e93ff",
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