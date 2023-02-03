@extends("layouts.app")
@section("title","Folding")
@push("styles")
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/dataTablesRight2.css')}}">
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
          <div class="col-12">
            <div class="factory-title">
              <span class="fa-title">Master Folding</span>
            </div>
          </div>
          <div class="col-12">
            <div class="btn-hp-fa">
              <div class="factory-date">
                <div class="input-group date" id="report_date" data-target-input="nearest">
                  <div class="input-group-append datepiker" data-target="#report_date"
                      data-toggle="datetimepicker">
                      <div class="fa-custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Month</span><i class="ml-2 fas fa-caret-down"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input input-date-fa"
                    data-target="#report_date" placeholder="Select Month"/>
                </div>
              </div>
              {{-- <div class="factory-btn-date">
                <form action="{{ route('FactoryAudit.packingPDF') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden"  name="month" class="form-control datetimepicker-input input-date-fa"/>
                  <button type="submit" class="btn btn-fa-reportPDF">Report PDF<i class="icon-fa-pdf fas fa-file-pdf"></i></button> 
                </form>
              </div> --}}
              <div class="factory-btn-add">
                <a href="{{route('folding.index')}}" class="btn btn-fa-add" title="tambah">Add Folding<i class="fs-18 ml-2 fas fa-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12 pb-5">
            <div class="cards bg-card p-4">
              <button id="btnSearch"><i class="fas fa-search"></i></button> 
              <table id="DTtable3" class="table fa-tbl-content no-wrap " style= "text-align: left;">
                <thead>
                  <tr>
                    <th width="5%" class="text-left">NO</th>
                    <th width="10%" class="text-left">Tanggal</th>
                    <th width="10%" class="text-left">Wo</th>
                    <th width="10%" class="text-left">Style</th>
                    <th width="10%" class="text-left">Order Qty</th>
                    <th width="5%" class="text-left">Jam Mulai</th>
                    <th width="5%" class="text-left">Jam Selesai</th>
                    <th width="10%" class="text-left">NIK</th>
                    <th width="15%" class="text-left">Nama</th>
                    <th width="15%" class="text-left">Remark</th>
                    <th width="10%" class="text-left">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dataFolding as $key => $value)
                    <tr>
                      <td style="text-align:left">{{ $loop->iteration }}</td>
                      <td style="text-align:left">{{ $value['tanggal'] }}</td>
                      <td style="text-align:left">{{ $value['wo'] }}</td>
                      <td style="text-align:left">{{ $value['style'] }}</td>
                      <td style="text-align:left">{{ $value['qty_target'] }}</td>
                      <td style="text-align:left">{{ $value['jam_mulai'] }}</td>
                      <td style="text-align:left">{{ $value['jam_selesai'] }}</td>
                      <td style="text-align:left">{{ $value['nik'] }}</td>
                      <td style="text-align:left">{{ $value['nama'] }}</td>
                      <td style="text-align:left">{{ $value['remark'] }}</td>
                      <td class="text-left">
                        <div class="container-tbl-btn flex">
                          <form action="{{ route('folding.updateChecker', $value['id'])}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <a href="javascript:void(0)" class="btn-simple-edit" data-toggle="modal" data-target="#edit{{  $value['id'] }}"><i class="fs-18 fas fa-pencil-alt"></i></a>                    
                          @include('production.finishing.folding.modal.edit',['submit' => 'Submit'])
                          </form>
                          <a href="{{route('folding.deleteFolding',$value['id'])}}" class="btn-simple-delete ml-1"><i class="fs-18 fas fa-trash"></i></a>
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
{{-- <script>
    $(document).ready( function () {
      

    var table = $('#DTtable3').DataTable({
      scrollX : '100%',
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );

    var current_month = "{{request()->query('month')}}"
    $('.input-date-fa').val(current_month)
  });
</script> --}}
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
        location.replace("{{ url('/prd/finishing/data-folding?month=') }}"+month) 
      }
      filter_count++
    })
  });
</script>
<script>
    $(document).ready( function () {
      

    var table = $('#DTtable3').DataTable({
      scrollX : '100%',
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