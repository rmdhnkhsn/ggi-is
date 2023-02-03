@extends("layouts.app")
@section("title","Data Packing List")
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
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endpush

@push("sidebar")

@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row Finishing">
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Nomor PO</div>
                    <div class="sub-judul"></div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor OR</div>
                    <div class="sub-judul"></div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor WO</div>
                    <div class="sub-judul"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Buyer</div>
                    <div class="sub-judul"></div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Agent</div>
                    <div class="sub-judul"></div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor Kontrak</div>
                    <div class="sub-judul"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Qty Order</div>
                    <div class="sub-judul"></div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Warehouse</div>
                    <div class="sub-judul"></div>
                </div>
                <div class="deskripsi">
                    <div class="judul">OFF CTN</div>
                    <div class="sub-judul"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Tanggal</div>
                    <div class="sub-judul"></div>
                </div>
                
            </div>
        </div>
        <div class="col-12">
            <div class="cards" style="padding:26px">
                <div class="row">
                    <div class="col-12">
                        <div class="title-22 text-left">Data Performa Packing List</div>
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
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable4').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>


@endpush