@extends("layouts.app")
@section("title","Factory Audit")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
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
          <div class="col-12 flex">
            <div class="factory-title">
              <span class="fa-title">Factory Audit</span>
            </div>
            <div class="factory-date ml-auto">
              <div class="input-group date" id="report_date" data-target-input="nearest">
                <div class="input-group-append" data-target="#report_date" data-toggle="datetimepicker">
                    <div class="fa-custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Month</span><i class="ml-2 fas fa-caret-down"></i></div>
                </div>
                <input type="text" class="form-control input-date-fa" data-target="#report_date" id="" name="" placeholder="Select Month" style="width:120px" required/>
              </div>
            </div>
            <div class="factory-btn-date ml-2">
              <form action="{{ route('FactoryAudit.packingPDF') }}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-fa-reportPDF">Report PDF<i class="icon-fa-pdf fas fa-file-pdf"></i></button> 
              </form>
            </div>
            <div class="factory-btn-add ml-2">
              <a href="{{route('FactoryAudit.packing')}}" class="btn btn-fa-add" title="tambah">Add<i class="fs-18 ml-2 fas fa-plus"></i></a>
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
            <div class="row mt-2">
              <div class="col-12 text-center">
                <table id="DTtable" class="table no-wrap">
                  <thead>
                    <tr>
                      <th width="5%">NO</th>
                      <th width="15%">WO</th>
                      <th width="15%">Buyer</th>
                      <th width="10%">Style</th>
                      <th width="10%">Order Qty</th>
                      <th width="10%">Status FA</th>
                      <th width="20%">Revision</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key => $value)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value['po_number'] }}</td>
                        <td>{{ $value['buyer'] }}</td>
                        <td>{{ $value['style'] }}</td>
                        <td>{{ $value['order_qty'] }}</td>
                        <td class="txt-fail">{{ $value['status'] }}</td>
                        <td class="txt-pased">{{ $value['revisian'] }}</td>
                        <td>
                          <a href="{{route('FactoryAudit.details', $value['id']) }}" class="btn btn-fa-info"><i class="fas fa-info"></i></a>
                          @if($value['status'] == 'fail' && $value['revisian'] != 'pased')
                          {{-- <a href="{{route('FactoryAudit.edit', $value['id']) }}" class="btn btn-fa-edit edit-factory"><i class="btn-icon-edit fas fa-pencil-alt"></i></a> --}}
                          <a href="javascript:void(0)" class="btn btn-fa-edit edit-factory"><i class="btn-icon-edit fas fa-pencil-alt"></i></a>
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

  {{-- Modal edit --}}
  <div class="modal fade" id="edit-factory-modal" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row px-4">
                <div class="col-12">
                    <div class="wp-modal-title">Packing Audit</div>
                </div>
                <div class="col-12">
                    <span class="general-identity-title">Remark</span>
                    <div class="fa-message mt-2">
                        <textarea placeholder="Input Remark.." name="remark" class="remark-name" id="remark"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <span class="general-identity-title">QTY Reject</span>
                    <div class="input-group mb-3 mt-2">
                        <input type="text" class="form-control border-input remark-quantity" id="qty_reject" name="qty_reject" placeholder="Input Qty..." required>
                    </div>
                </div>
            </div>
            <div class="row px-4 pb-4">
                <div class="col-12 text-right">
                    <button type="button" class="btn wp-btn-start store-remark">Save<i class="wp-icon-btn fas fa-download"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@push("scripts")
<script>

      $('#report_date').datetimepicker({
        format: 'MM-Y',
        showButtonPanel: true
    });
</script>
<script>
    $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      scrollX : '100%',
      "pageLength": 5,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );

    $('body').on('click', '.edit-factory', function () {
      console.log('ya')
        $('#edit-factory-modal').modal('show')
    });


  } );
</script>
@endpush