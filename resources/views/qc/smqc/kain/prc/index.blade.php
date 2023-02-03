@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight5.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-3">
          <div class="row">
            <div class="col-12 mb-4">
              <div class="justify-sb" style="gap:1rem">
                <div class="title-14 text-white">MD Report</div>
                <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="row pb-5">
            <div class="col-12">
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="example1" class="table tbl-content no-wrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Buyer</th>
                      <th>Supplier</th>
                      <th>Color</th>
                      <th>Style</th>
                      <th>FAR</th>
                      <th>FIR</th>
                      <th>SLR</th>
                      <th>PRC</th>
                      <th>MD</th>
                      <th>C_QA</th>
                      <th>Arrival_Date</th>
                      <th>Branch</th>       
                      <th>Branch Detail</th>
                      <th>Inspection_Date</th>    
                      <th>Inspector</th>
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
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/dataTables-fixed-column-smqc.js')}}"></script>

<script type="text/javascript">
  $(function () {
    var table = $('#example1').removeAttr('width').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        processing: true,
        serverSide: true,
        fixedColumns:   {
            left: 5
        },
        ajax:{
				url: "{{route('prc_data.report')}}",
        type: "GET",
        dataType: 'json'
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'buyer_id', name: 'buyer_id'},
            {data: 'supplier', name: 'supplier'},
            {data: 'color', name: 'color'},
            {data: 'style', name: 'style'},
            {data: 'far_id', name: 'far_id'},
            {data: 'fir_id', name: 'fir_id'},
            {data: 'shade_id', name: 'shade_id'},
            {data: 'prc_app', name: 'prc_app'},
            {data: 'mrc_app', name: 'mrc_app'},
            {data: 'qm_app', name: 'qm_app'},
            {data: 'date', name: 'date'},
            {data: 'branch', name: 'branch'},
            {data: 'branchdetail', name: 'branchdetail'},
            {data: 'created_at', name: 'created_at'},
            {data: 'inspector', name: 'inspector'},
        ],
        order:
          [0,'desc'],
    });
  });
</script>
<script>
  $('.select2bs4_branch').select2({
    theme: 'bootstrap4'
  })
</script>
@endpush