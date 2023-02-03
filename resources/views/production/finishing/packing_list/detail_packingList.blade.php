@extends("layouts.app")
@section("title","PackingList")
@push("styles")
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/dataTablesRight3.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('/common/css/style-factory.css')}}">
@endpush

@section("content")
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 flex" style="gap:1rem !important">
            <div class="fa-title">Master Data Packinglist</div>
            <div class="factory-btn-add">
              <a href="{{route('packing-list')}}" class="btn btn-fa-add" title="tambah">Add Packing List<i class="fs-18 ml-2 fas fa-plus"></i></a>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="cards bg-card p-4">
              <div class="row">
                <div class="col-12 pb-5">
                  <div class="cards-scroll scrollX " id="scroll-bar">
                    <button id="btnSearch"><i class="fas fa-search"></i></button> 
                    <div class="fa-title text-white">Master Data Packinglist</div>
                    <table id="DTtable" class="table fa-tbl-content no-wrap " style= "text-align: left;">
                      <thead>
                        <tr>
                          <th class="text-left">NO</th>
                          <th class="text-left">Tanggal</th>
                          <th class="text-left">Wo</th>
                          <th class="text-left">Style</th>
                          <th class="text-left">Buyer</th>
                          <th class="text-left">No Kontrak</th>
                          <th class="text-left">No PO</th>
                          <th class="text-left">OR NUMBER</th>
                          <th class="text-left">QTY SIZE</th>
                          <th class="text-left">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($reportDone as $key => $value)
                      
                          <tr>
                            <td style="text-align:left">{{ $loop->iteration }}</td>
                            <td style="text-align:left">{{ $value['tanggal'] }}</td>
                            <td style="text-align:left">{{ $value['wo'] }}</td>
                            <td style="text-align:left">{{ $value['style'] }}</td>
                            <td style="text-align:left">{{ $value['buyer'] }}</td>
                            <td style="text-align:left">{{ $value['no_kontrak'] }}</td>
                            <td style="text-align:left">{{ $value['po'] }}</td>
                            <td style="text-align:left">{{ $value['or_number'] }}</td>
                            <td style="text-align:left">{{ $value['qty_size'] }}</td>
                            <td class="text-left">
                              <div class="container-tbl-btn flex">
                                <a href="{{ route('packing.details', $value['id'])}}" class="btn btn-fa-info"><i class="fas fa-info"></i></a>
                                {{-- <form action="{{ route('metal.updateFreeMetal', $value['id'])}}" method="post" enctype="multipart/form-data">
                                @csrf --}}
                                {{-- <a href="javascript:void(0)" class="btn-simple-edit" data-toggle="modal" data-target="#editPackingList{{  $value['id'] }}"><i class="fs-18 fas fa-pencil-alt"></i></a>                    
                                @include('production.finishing.packing_list.modal.editPackingList',['submit' => 'Submit']) --}}
                                {{-- </form> --}}
                                <a href="{{route('packing.deletePackingList',$value['id'])}}" class="btn-simple-delete ml-1"><i class="fs-18 fas fa-trash"></i></a>
                              </div>
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
        </div>
    </div>
</div>

@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
/* When click New customer button */
});
$('#nik').keyup(function(){
// console.log("ok");
var ID = $(this).val();

    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("folding.getuser") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#nama').val(data.nama)
          // $('#group').val(data.group)
          // $('#gaji').val(data.gp_tun)
        },

      });
    }
  }); 
</script>
<script>
  document.getElementById('saveChecker').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Input Data Checker Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
  document.getElementById('saveLoading').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Input Data Loading Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
  document.getElementById('saveUnloading').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Input Data Unloading Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
</script>

<script>
  const list = document.querySelectorAll('.list');
  function activeLink(){
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
  }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));
</script>
<script>
      $('.select2bs4').select2({
    theme: 'bootstrap4'
});
      $('.select2bs45').select2({
    theme: 'bootstrap4'
});
      $('.select2bs46').select2({
    theme: 'bootstrap4'
});
</script>

<script>
  jQuery(document).ready(function($) {
  // const buttonpiker = document.getElementsByClassName('datepiker')[0];
  // const buttonpiker = document.getElementsByClassName('.month');
  // console.log(buttonpiker);
  
  // buttonpiker.addEventListener('click', function() {
    //   console.log(date.value);
    // })
    $('#report_date').datetimepicker({
      format: 'MM-Y',
      showButtonPanel: true
    })
    
    // $("#report_date").on("change.datetimepicker", ({date}) => {
    //   var month = $('.input-date-fa').val()
    //   location.replace("{{ url('/qcr/factory-audit/view?month=') }}"+month) 
    // })
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
      if (filter_count > 0) {
        var month = $("#report_date").find("input").val();
        location.replace("{{ url('/prd/finishing/data-packinglist?month=') }}"+month) 
      }
      filter_count++
    })
  });
</script>
<script>
    $(document).ready( function () {

    var table = $('#DTtable').DataTable({
      // scrollX : '100%',
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );

    var current_month = "{{request()->query('month')}}"
    $('.input-date-fa').val(current_month)
  });
</script>

@endpush