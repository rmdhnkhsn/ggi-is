@extends("qc.smqc.layouts.app")
@section("title","Report Accessories")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row mt-3 pb-5">
      <div class="col-12 flex">
        <form action="{{route('report_aksesoris.done_semua')}}" method="post" enctype="multipart/form-data">
          @csrf 
          <input type="hidden" name="date" id="date" value="{{$bulan}}">
          <input type="hidden" name="branch" id="branch" value="{{$branch}}">
          <input type="hidden" name="branchdetail" id="branchdetail" value="{{$branchdetail}}">
          <button type="submit" class="btn btn-blue" type="button" data-toggle="modal" data-target="#inac" title="Create">
            <span class="mr-2">Approve All</span>
          </button>
        </form>
      </div>
      <br><br>
      <input type="hidden" name="reportid" id="reportid" value="{{$id}}">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
              <!-- <table id="smqcTableFreeze" class="table hrd-tbl-content no-wrap"> -->
              <table id="example1" class="table hrd-tbl-content no-wrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>PO</th>
                    <th>Order_Quantity</th>
                    <th>PRC_Name</th>
                    <th>Item</th>
                    <th>Date</th>
                    <th>Detail</th>
                    <th>PRC</th>
                    <th>C_QA</th>
                    <th>QC_Check</th>
                    <th>Status</th>
                    <th>Inspector</th>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>

@if(Session::has('detail_ada'))
  <script>
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Detail Sudah pernah dibuat  !'
      })
    }
  </script>
@endif
<script type="text/javascript">
  $(function () {
    const input = document.getElementById('reportid').value;
    console.log(input);
    var table = $('#example1').removeAttr('width').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        processing: true,
        serverSide: true,
        ajax:{
        data: {
          ID: input,
        },
				url: "{{route('report_aksesoris.hasil_report')}}",
        type: "GET",
        dataType: 'json', 
			  },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'supplier', name: 'supplier'},
            {data: 'po', name: 'po'},
            {data: 'order_quan', name: 'order_quan'},
            {data: 'buyer', name: 'buyer'},
            {data: 'item', name: 'item'},
            {data: 'date', name: 'date'},
            {data: 'detail', name: 'detail', orderable: false, searchable: false},
            {data: 'prc_app', name: 'prc_app'},
            {data: 'chief_app', name: 'chief_app'},
            {data: 'qc_qty', name: 'qc_qty'},
            {data: 'status_id', name: 'status_id'},
            {data: 'inspector', name: 'inspector'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order:
          [0,'desc'],
    });
  });
</script>
<script>
  function myFunction(clicked_id) {
    $('#DetailReport'+clicked_id).modal('show');
    const classnya = document.getElementsByClassName("dicobasaja"+clicked_id);
    let dv = 'imgDetailReport'+clicked_id;
    let ur=$(classnya).attr("pic-url");
    document.getElementById(dv).src=ur;
  }
</script>
<script>
   $('.select2bs4_standar').select2({
    theme: 'bootstrap4'
   })
   $('.select2bs4_prc1').select2({
    theme: 'bootstrap4'
   })
   $('.select2bs4_prc2').select2({
    theme: 'bootstrap4'
   })
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.imageUploadWrap').hide();

            reader.onload = function (e) {
                $(".fileUploadImg").attr("src", e.target.result);
                $(".fileUploadContent").show();
            };
            reader.readAsDataURL(input.files[0]);
            // $("#frmSubmit").submit();

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.fileUploadInput').replaceWith($('.fileUploadInput').clone());
        $('.fileUploadContent').hide();
        $('.imageUploadWrap').show();
    }
    $('.imageUploadWrap').bind('dragover', function () {
        $('.imageUploadWrap').addClass('image-dropping');
    });
    $('.imageUploadWrap').bind('dragleave', function () {
        $('.imageUploadWrap').removeClass('image-dropping');
    });
</script>
@endpush