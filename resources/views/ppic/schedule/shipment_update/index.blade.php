@extends("layouts.app")
@section("title","Update Shipment")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endpush
@push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="title-24">Update Shipment Date Schedule</div>
      </div>
    </div>
    <form id="form_wo" class="mt-3" action="{{route('ppic.schedule.upship.index')}}" method="get">
      <div class="row">
        <div class="col-12">
          <div class="cards p-3">
            <div class="justify-sb2">
              <div class="title-20-grey">Filter Shipment Date </div>
              <a href="#" class="btnSoftBlue" data-toggle="modal" data-target="#filter">Filter<i class="fas fa-filter"></i></a>
              @include('ppic.schedule.shipment_update.partials.modal-filter')
            </div>
          </div>
        </div>
      </div>
    </form>
    <form id="form_wo" action="{{route('ppic.schedule.upship.update')}}" method="post">
    {{csrf_field()}}
      <div class="row">
        <div class="col-12">
          <div class="cards p-4">
            <div class="row">
              <div class="col-12 justify-sb2">
                <div class="title-20-grey">Data Shipment Date Schedule</div>
                <div class="filterSMV flex" style="gap:.5rem">
                  <button class="btnSoftBlue" data-toggle="modal" data-target="#update">Update<i class="fas fa-calendar-alt"></i></button>
                  <button class="btn-icon-blue exportCsv" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export CSV"><i class="fs-18 fas fa-file-csv"></i></button>
                  <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                  @include('ppic.schedule.shipment_update.partials.modal-update')
                </div>
              </div>
              <div class="col-12 pb-5">
                <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="tabelReject" class="table tbl-content no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th class="bg-thead2"><input class="check1" name="selectAll" value="1" id="selectAll" type="checkbox" onclick="check_all();"/><span class="ml-2">All</span></th> 
                        <th>ID</th>
                        <th>Branch</th>
                        <th>Line</th>
                        <th>WO.No</th>
                        <th>OR.No</th>
                        <th>Ship.Date</th>
                        <th>Tarikan</th>
                        <th>OR.Order</th>
                        <th>WO.Order</th>
                        <th>Style</th>
                        <th>Product.Name</th>
                        <th>Planner</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $d)
                      @php
                        $no_or=$d->rekap_detail->no_or??null;
                        $total_or=$d->rekap_detail->total_breakdown??null;
                        $style=$d->rekap_detail->style??null;
                        $product_name=$d->rekap_detail->product_name??null;
                        $planner=$d->originator->nama??null;
                      @endphp

                      <tr>
                        <td><input type="checkbox" class="check1" class="child_{{$d->id}}" name="wo_id[]" value="{{$d->id}}"></td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->prod_line->sub}}</td>
                        <td>{{$d->prod_line->line}} </td>
                        <td>{{$d->wo_no}}</td>
                        <td>{{$no_or}} </td>
                        <td>{{$d->shipment_date}} </td>
                        <td>{{$d->tarikan}} </td>
                        <td>{{$total_or}} </td>
                        <td>{{$d->qty_order}} </td>
                        <td>{{$style}} </td>
                        <td>{{$product_name}} </td>
                        <td>{{$planner}} </td>
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
    </form>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script>
  $('.update').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Update Shipment?",
        // text: "Data yang dihapus tidak akan bisa dikembalikan lagi !",
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
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Shipment date gagal di update", "error");
        }
    }); 
  });
</script>
<script>
  function updateFunction() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    swal({
      title: "Update Shipment..?",
      // text: "Ini akan Membuat Data Packing List Di Kirimkan ke Ekspedisi !",
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
        swal("Batal", "Shipment date gagal di update", "error");
      }
    }); 
  }
</script>
<script>
  $('.select2Branch').select2({
      theme: 'bootstrap4'
  })
  $('.select2Line').select2({
      theme: 'bootstrap4'
  })

  $(function () {
      $('[data-toggle="popover"]').popover()
  })

  $('.exportCsv').click(function(){
      $(".buttons-csv").click();
  })

  $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
  })

  $('#target_date').datetimepicker({
    format: 'YYYY-MM-DD',
    showButtonPanel: true
  });

  $(document).ready(function() {
    check_all();
    $('#tabelReject').DataTable({
      info: false,
      dom: 'Bfrtip',
      buttons: [
        'csv',
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        }
      ],
      fixedColumns:   {
        left: 1,
        right: 0
      },
    });
  });

  // $("input[class^='child_']").click(function(e){
  //         e.preventDefault();
  // });

  $("input[class^='parent_']").click(function(){
      if(this.checked){
          $(".child_"+this.value).each(function(){
              this.checked=true;
          })              
      }else{
          $(".child_"+this.value).each(function(){
              this.checked=false;
          })              
      }
  });

  function check_all() {
    var $selectAll = $('#selectAll'); 
    var $table = $('#tabelReject');
    var $tdCheckbox = $table.find('tbody input:checkbox');
    var tdCheckboxChecked = 0; 

    $selectAll.on('click', function () {
        $tdCheckbox.prop('checked', this.checked);
    });

    $tdCheckbox.on('change', function(e){
        tdCheckboxChecked = $table.find('tbody input:checkbox:checked').length; 
        $selectAll.prop('checked', (tdCheckboxChecked === $tdCheckbox.length));
    })
  }

</script>

@endpush
  

  