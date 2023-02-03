@extends("qc.smqc.layouts.app")
@section("title","Report Accessories")
@push("styles")

@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row">
      <div class="col-12 flex">
        <button class="btn btn-blue" type="button" data-toggle="modal" data-target="#inac" title="Create">
          <span class="mr-2">Add Item</span>  
          <i class="fs-20 fas fa-plus"></i>
        </button>
      </div>
      @include('qc.smqc.accessories.partials.form-modal')
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
                    <th>Action</th>
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
                        <?php
                        $cek_detail = collect($value->detail)->count('id');
                        ?>
                        @if($cek_detail == 0)
                        <td>
                          <center>
                            <button data-toggle="modal" data-target="#addDetail{{$value->id}}" class="btn btn-primary btn-sm" title="Add Detail"><i class="fas fa-plus"></i></button>
                            @include('qc.smqc.accessories.partials.modal-addDetail')
                          </center>
                        </td>
                        @else
                        <td>
                          <center>
                            <button data-toggle="modal" data-target="#DetailReport{{$value->id}}" pic-url="{{asset('storage/smqc/accessories/'.$value->detail->file)}}" id="btnDetailReport{{$value->id}}" url-element="imgDetailReport{{$value->id}}" class="btn btn-info btn-sm" title="Detail Report"><i class="fas fa-eye"></i></button>
                            @include('qc.smqc.accessories.partials.modal-detailReport')
                            <button data-toggle="modal" data-target="#EditDetail{{$value->id}}" class="btn btn-warning btn-sm" title="Edit Detail Report"><i class="fas fa-edit"></i></button>
                            @include('qc.smqc.accessories.partials.EditdetailReport')
                            <a href="{{route('report_aksesoris.detail_delete', $value->detail->id)}}" class="btn btn-danger btn-sm" title="Delete Detail Report" onclick="return confirm('Delete Detail Report ?');"><i class="fas fa-trash"></i></a>
                          </center>
                        </td>
                        @endif
                        <!-- End  -->

                        <!-- Status approve purchasing  -->
                        <td>
                          <center>
                          @if($value->prc_app == 0)
                          <a class="btn-secondary btn-sm" title="Waiting"><i class="fas fa-spinner"></i></a>
                          @elseif($value->prc_app == 1)
                          <a class="btn-success btn-sm" title="Reviewed"><i class="fas fa-user-check"></i></a>
                          @endif</center>
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

                        <!-- Button Action  -->
                        <td>
                            <!-- SendReport  -->
                            @if($value->notif_id == 0)
                            <a href="{{route('report_aksesoris.send', $value->id)}}" class="btn btn-primary btn-sm" title="Send Report" onclick="return confirm('Send Report ?');"><i class="fas fa-share"></i></a>
                            @endif
                            @if($value->standar_id != null)
                            <button data-toggle="modal" data-target="#ReportBiasaEdit{{$value->id}}" class="btn btn-warning btn-sm" title="Edit Report Biasa"><i class="fas fa-edit"></i></button>
                            @include('qc.smqc.accessories.partials.modal-edit')
                            @else
                            <button data-toggle="modal" data-target="#EditReportManual{{$value->id}}" class="btn btn-warning btn-sm" title="Edit Report Manual"><i class="fas fa-edit"></i></button>
                            @include('qc.smqc.accessories.partials.modal-edit-manual')
                            @endif
                            <a href="{{route('report_aksesoris.delete', $value->id)}}" class="btn btn-danger btn-sm" title="Delete Report" onclick="return confirm('Delete Report ?');"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <!-- End  -->
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

  $('button[id^="btnDetailReport"]').click(function() {
    let dv=$(this).attr("url-element");
    let ur=$(this).attr("pic-url");
    // alert(dv);
    // alert(ur);

    
    document.getElementById(dv).src=ur;
  })
  
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