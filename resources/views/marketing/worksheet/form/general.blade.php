@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content f-poppins">
    <div class="container-fluid">
        @include('marketing.worksheet.partials.stepbar')
        <form action="{{ route('worksheet.general_store', $master_data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('marketing.worksheet.partials.form-general')
        </form>        
    </div>
</section>
@include('marketing.worksheet.partials.add-po')
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
<script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.select2bs49').select2({
      theme: 'bootstrap4',
      minimumInputLength: 3,
      ajax: {
        type: "POST",
        url: '{{ route("worksheet.cari_po") }}',
        dataType: 'json',
        delay: 250,
        data: function (params) {
          console.log(params);
          return {
            karyawan_nik: params.term// search term
          };
        },
        processResults: function (response) {
          // var res = response.items.map(function (item) {
          //               return {id: item.id, text: item.name};
          //           });
          //       return {
          //           results: res
          //       };
          console.log(response);
          return {
              results: response
            };
        },
        cache: true
      }
  });
  $('.select2bs49').on('select2:select', function (e) {
      e.preventDefault();
      var data = e.params.data;
      $('#id_rekap_order').val(data.rekap_order_id);
      $('#style_rekap_order').val(data.rekap_order_style);
      $('#ex_fact_rekap_order').val(data.rekap_order_ex_fact);
      $('#po_creation_rekap_order').val(data.rekap_order_po_creation);
  });
</script>
@endpush
