@extends("layouts.app")
@section("title","Invoice List")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endpush


@section("content")
<style>
  .nav-tabs {
    border-bottom: none !important;
  }
</style>
<section class="content">
  <div class="container-fluid">
    <div class="row pb-4">
      <div class="col-12">  
        <div class="cards px-4 pt-4">
          <div class="title-24-dark">Create Invoice</div>
          <ul class="nav nav-tabs blue-md-tabs2 justify-start mt-3" id="myTab" role="tablist">
            <li class="nav-item-show">
              <a class="nav-link active" data-toggle="tab" href="#packing_list" role="tab"></i>Packing List</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link" data-toggle="tab" href="#invoice_list" role="tab"></i>Invoice List</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12">
        <div class="cards" style="padding:1.5rem">
          <div class="tab-content card-block">
            <div class="tab-pane active" id="packing_list" role="tabpanel">
              @include('MatDoc.invoice.partials.packing_list')
            </div>
            <div class="tab-pane" id="invoice_list" role="tabpanel">
              @include('MatDoc.invoice.partials.invoice_list')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script type="text/javascript">
  $(function() {
      $('input[name="daterange"]').daterangepicker();
  });
  $('#Date').datetimepicker({
      format: 'DD-MM-YY',
      showButtonPanel: false
  })
  $('#invoice').datetimepicker({
      format: 'DD-MM-YY',
      showButtonPanel: false
  })
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

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

@endpush