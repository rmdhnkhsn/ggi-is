@extends("layouts.app")
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
        <a href="{{route('accessories_prc.approveall', auth()->user()->nama)}}" class="btn btn-blue" title="Approve all">
          <span class="mr-2">Approve all</span>  
          <i class="fs-20 fas fa-check"></i>
        </a>
      </div>
      <br><br>
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
              <!-- <table id="smqcTableFreeze" class="table hrd-tbl-content no-wrap"> -->
              <table id="example1" class="table hrd-tbl-content no-wrap">
                <thead>
                  <tr class="font-tr">
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>No PO</th>
                    <th>Order Quantity</th>
                    <th>PRC Name</th>
                    <th>Item</th>
                    <th>Date</th>
                    <th>Detail</th>
                    <th>PRC</th>
                    <th>C-QA</th>
                    <th>QC Check</th>
                    <th>Status</th>
                    <th>Inspector</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->supplier}}</td>
                        <td class="text-truncate"><div style="width:180px">{{$value->po}}</div></td>
                        <td>{{$value->order_quan}}</td>
                        <td>{{$value->buyer}}</td>
                        <td class="text-truncate"><div style="width:180px">{{$value->item}}</div></td>
                        <td>{{$value->date}}</td>

                        <!-- Buat detail report  -->
                        <td>
                          <center>
                            <button data-toggle="modal" data-target="#DetailPRC{{$value->id}}" class="btn btn-info btn-sm" title="Detail Report"><i class="fas fa-eye"></i></button>
                            @include('qc.smqc.accessories.partials.detailprc')
                          </center>
                        </td>
                        <!-- End  -->

                        <!-- Status approve purchasing  -->
                        <td>
                          <center>
                            <button button data-toggle="modal" data-target="#notePurchasing{{$value->id}}" class="btn-primary btn-sm" title="Done Report"><i class="fas fa-check"></i></button>
                            @include('qc.smqc.accessories.partials.notepurchasing')
                          </center>
                        </td>
                        <!-- End  -->

                        <!-- Status approve QC Gudang  -->
                        <td><center>
                          @if($value->chief_app == 0)
                          <a class="btn-secondary btn-sm" title="Waiting"><i class="fas fa-spinner"></i></a>
                          @elseif($value->chief_app == 1)
                          <a class="btn-success btn-sm" title="Approved"><i class="fas fa-user-check"></i></a>
                          @endif</center>
                        </td>
                        <!-- End  -->

                        <td>{{$value->qc_qty}}</td>

                        <!-- Status report pass or fail  -->
                        <td>
                          @if($value->status_id == '1')
                              PASS
                          @else
                              FAIL
                          @endif
                        </td>
                        <!-- End  -->
                        <td>{{$value->inspector}}</td>
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
    var table = $('#example1').DataTable({
        "order": [[ 0, "desc" ]],
        "pageLength": 10,
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
    });
  });
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