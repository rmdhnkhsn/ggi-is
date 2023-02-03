@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row">
      <div class="col-12">
        <a class="btn-blue-md btnSMQC d-inline-flex" href="{{route('kain.create')}}" title="Create"><span class="mr-2">Add Item</span><i class="fs-20 fas fa-plus"></i></a>
      </div>
      <div class="col-12">
        <div class="DTtable-search2">
          <i class="fs-24 fas fa-search"></i>
        </div>
      </div>
    </div>
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
              <!-- <table id="smqcTableFreeze" class="table hrd-tbl-content no-wrap"> -->
                <table id="example1" class="table hrd-tbl-content no-wrap">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Buyer</th>
                        <th>Supplier</th>
                        <th>Color</th>
                        <th>Style</th>
                        <th>Lab</th>
                        <th>FAR</th>
                        <th>FIR</th>
                        <th>SLR</th>
                        <th>PRC</th>
                        <th>MD</th>
                        <th>C_QA</th>
                        <th>Status</th>
                        <th>Arrival_Date</th>
                        <th>Inspector</th>
                        <th>Inspection_Date</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script type="text/javascript">
  $(function () {
    var table = $('#example1').removeAttr('width').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        processing: true,
        // serverSide: true,
        ajax:{
				  url: "{{ route('kain.dashboard') }}"
			  },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'buyer_id', name: 'buyer_id'},
            {data: 'supplier', name: 'supplier'},
            {data: 'color', name: 'color'},
            {data: 'style', name: 'style'},
            {data: 'lab', name: 'lab', orderable: false, searchable: false},
            {data: 'far_id', name: 'far_id'},
            {data: 'fir_id', name: 'fir_id'},
            {data: 'shade_id', name: 'shade_id'},
            {data: 'prc_app', name: 'prc_app'},
            {data: 'mrc_app', name: 'mrc_app'},
            {data: 'qm_app', name: 'qm_app'},
            {data: 'notif_id', name: 'notif_id'},
            {data: 'date', name: 'date'},
            {data: 'inspector', name: 'inspector'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order:
          [0,'desc'],
    });
  });
</script>
@endpush