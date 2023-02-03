@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/dist/css/adminlte.min.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content f-poppins">
    <div class="container-fluid">
        <center>
        <span class="label_worksheet">General Identity</span>
        </center> 
        @include('marketing.worksheet.partials.stepbar')
        @include('marketing.worksheet.partials.form-general_show')
        <div class="container">
            <a href="{{route('worksheet.breakdown', $master_data->id)}}" class="btn btn_next btn-sm title-navigate-next">Next <i class="fas fa-arrow-right icon_next"></i></a>
        </div>
    </div>
    <br>
    <!-- /.container-fluid -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog" style="max-width:1140px">
            <div class="modal-content">
                <div class="modal-body" id="smallBody">
                    <form action="{{ route('worksheet.general_update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('marketing.worksheet.partials.form-general_edit', ['submit' => 'Save'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")

<script>
    $('.select2bs4').select2({
      theme: 'bootstrap4',
    });
    $('#reservationdate').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#reservationdate2').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#reservationdate3').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

    $('body').on('click', '.editProduct', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    $.get('edit/' + id , function (data) {
        $('#modal-edit').modal('show');
        $('#id').val(data.id);
        $('#no_or').val(data.nomor_or);
        $('#cont').val(data.contract);
        $('#no_po').val(data.no_po);
        $('#buyer').val(data.buyer);
        $('#age').val(data.agent);
        $('#arti').val(data.article);
        $('#product_n').val(data.product_name);
        $('#style_c').val(data.style_code);
        $('#style_n').val(data.style_name);
        $('#desc').val(data.description);
        $('#shipment_d').val(data.shipment_date);
        $('#ship').val(data.ship_to);
        $('#exfact_d').val(data.exfact_date);
        $('#po_d').val(data.po_date);
        console.log(data.nomor_or)
    })
});
</script>

  <!-- Foto -->
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
        $('.image-upload-wrap').hide();

        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();

        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
    }

    function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
<!-- End Foto -->
@endpush
