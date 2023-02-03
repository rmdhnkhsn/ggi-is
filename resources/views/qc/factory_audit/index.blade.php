@extends("layouts.app")
@section("title","Factory Audit")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-factory.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush
@push("sidebar")
  @include('qc.factory_audit.layouts.navbar')
@endpush

@section("content")

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="factory-title">
              <span class="fa-title">Factory Audit</span>
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
              <div class="factory-btn-date">
                <form action="{{ route('FactoryAudit.packingPDF') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden"  name="month" class="form-control datetimepicker-input input-date-fa"/>
                  <button type="submit" class="btn btn-fa-reportPDF">Report PDF<i class="icon-fa-pdf fas fa-file-pdf"></i></button> 
                </form>
              </div>
              <div class="factory-btn-add">
                <a href="{{route('FactoryAudit.packing')}}" class="btn btn-fa-add" title="tambah">Add<i class="fs-18 ml-2 fas fa-plus"></i></a>
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
              <button id="mySearchButton" class="hiden"><i class="fas fa-search"></i></button>
            </p>
            <div class="row mt-2">
              <div class="col-12 text-left">
                <table id="DTtable" class="table fa-tbl-content no-wrap " style= "text-align: left;">
                  <thead>
                    <tr>
                      <th width="5%" class="text-left">NO</th>
                      <th width="10%" class="text-left">Tanggal</th>
                      <th width="10%" class="text-left">PO Number</th>
                      <th width="20%" class="text-left">Buyer</th>
                      <th width="30%" class="text-left">Style</th>
                      <th width="10%" class="text-left">Order Qty</th>
                      <th width="5%" class="text-left">Status FA</th>
                      <th width="5%" class="text-left">Revision</th>
                      <th width="15%" class="text-left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key => $value)
                      <tr>
                        <td style="text-align:left">{{ $loop->iteration }}</td>
                        <td style="text-align:left">{{ $value['tanggal'] }}</td>
                        <td style="text-align:left">{{ $value['po_number'] }}</td>
                        <td style="text-align:left">{{ $value['buyer'] }}</td>
                        <td style="text-align:left">{{ $value['style'] }}</td>
                        <td style="text-align:left">{{ $value['order_qty'] }}</td>
                          @if ($value['status'] == 'fail')
                            <td  class="txt-fail text-left">{{ $value['status'] }}</td>
                          @else
                            <td  class="txt-pased text-left">{{ $value['status'] }}</td>
                          @endif                 
                          @if ($value['revisian'] == 'fail')
                            <td  class="txt-fail text-left">{{ $value['revisian'] }}</td>
                          @else
                            <td  class="txt-pased text-left">{{ $value['revisian'] }}</td>
                          @endif
                        <td class="text-left">
                          <a href="{{route('FactoryAudit.details', $value['id']) }}" class="btn btn-fa-info"><i class="fas fa-info"></i></a>
                          @if($value['status'] == 'fail' && $value['revisian'] != 'pass')
                          <a href="{{route('factory-audit.edit', $value['id']) }}" class="btn btn-fa-edit"><i class="btn-icon-edit fas fa-pencil-alt"></i></a>
                            @endif
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
  <!-- /.container-fluid -->
</section>
@endsection

@push("scripts")
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
        location.replace("{{ url('/qcr/factory-audit/view?month=') }}"+month) 
      }
      filter_count++
    })
  });
</script>

<script>
    $(document).ready( function () {
      

    var table = $('#DTtable').DataTable({
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