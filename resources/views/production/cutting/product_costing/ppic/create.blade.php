@extends("layouts.app")
@section("title","PPIC")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4">
          <form action="{{ route('cutting.ppic.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('production.cutting.product_costing.ppic.atribut.form-create')
          </form>
          </div>
        </div>
      </div>
    </div>
  <!-- /.container-fluid -->
</section>
@endsection

@push("scripts")
<script>
    $('#start_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#estimate_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

    $(document).ready(
        function () {
            $('#multipleSelectExample').select2();
        }
    );
</script>
@endpush