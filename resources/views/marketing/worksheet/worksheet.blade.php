@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="col-lg-4">
      <div class="row"> 
        <div class="col-lg-6 col-4">
          <center>
            <a href="{{route('worksheet.po_list')}}" class="p_po"></i>PO 
              <span class="number-badge">{{$jumlah}}</span>
            </a>
          </center>
          <div class="garis_abu"></div>
        </div>
        <div class="col-lg-6 col-4">
          <center>
            <a href="{{route('worksheet.list')}}" class="p-worksheet"></i>Worksheet 
              <span class="number-badge">{{$jumlah_worksheet}}</span>
            </a>
          </center>
          <div class="garis_kuning"></div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" >
              <thead>
                <tr class="font-tr">
                  <th>PO Number</th>
                  <th>Style</th>
                  <th>Buyer</th>
                  <th>Style Total</th>
                  <th>Qty</th>
                  <th>Shipment to</th>
                  <th>Edited</th>
                  <th style="width:150px;">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script>
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>

<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "order": [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: "{{ route('worksheet.list') }}",
        columns: [
            {data: 'no_po', name: 'no_po'},
            {data: 'style', name: 'style'},
            {data: 'buyer', name: 'buyer'},
            {data: 'total_style', name: 'total_style'},
            {data: 'qty', name: 'qty'},
            {data: 'shipment_to', name: 'shipment_to'},
            {data: 'note1', name: 'note1'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endpush
