@extends("layouts.app")
@section("title","QR-code")
@push("styles")
  <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style2.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style-dashboard.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style-form.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/poppins.css') }}">
  <link rel="stylesheet" href="{{asset('/assets3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

<style>

  .table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; }
  .table-responsive > .table-bordered {
    border: 0; }

  .no-wrap td,
  .no-wrap th {
  white-space: nowrap; }

</style>
@endpush

@push("sidebar")
  @include('production.layouts.navbar3')

@endpush


@section("content")
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 flex">
            <a href="{{ route('qrcode.create')}}" class="btn-blue-sm"> Add New<i class="ml-2 fas fa-plus"></i></a>
            <button type="button" class="ml-4 navbar-notif" data-toggle="modal" data-target="#qr-notif">
              <i class="qr-notif fas fa-bell"></i>
              <span class="qr-notif-count">{{ $test }}</span>
            </button>
            @include('production.qrcode.partials.modal-notif')
          </div>  
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
              <div class="card-header">
                <h3 class="card-title">DATA PRODUCTION SAMPLE</h3>
              </div>
              <div class="card-body">
                @if($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <input type="text" id="mySearchText" placeholder="Search...">
                    {{-- <button id="mySearchButton"><i class="fas fa-search"></i></button> --}}
                    <table id="example1" class="table table-bordered table-striped no-wrap">
                      <thead>
                            <tr>
                                <th>STYLE</th>
                                <th>BUYER</th>
                                <th>IMAGE</th>
                                <th>TECHPACK</th>
                                <th>SMV / AP</th>
                                <th>WORKSHEET</th>
                                <th>TRIMCARD</th>
                                <th>PPM DATE</th>
                                <th>PPM</th>
                                <th>PPM VIDEOS</th>
                                <th>ACTION</th>
                                <th>PROGRESS</th>
                            </tr>
                      </thead>
                      <tbody>
                      </tbody>

                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push("scripts")
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        // aoColumns: [ { sWidth: "45%" }, { sWidth: "45%" }, { sWidth: "10%", bSearchable: false, bSortable: false } ],
        // "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
        // scrollY:'50vh',
        // scrollCollapse: true,
        // processing: true,
        // serverSide: true,
        "order": [[ 3, "desc" ]], //or asc 
        "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
        scrollCollapse: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('qrcode.index') }}",
        columns: [
            {data: 'style', name: 'style'},
            {data: 'buyer', name: 'buyer'},
            {data: 'foto', name: 'foto'},
            {data: 'techspech', name: 'techspech'},
            {data: 'smv', name: 'smv'},
            {data: 'work', name: 'work'},
            {data: 'trimcard', name: 'trimcard'},
            {data: 'ppm_date', name: 'ppm_date'},
            {data: 'ppm', name: 'ppm'},
            {data: 'ppm_videos', name: 'ppm_videos'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'progress', name: 'progress'},
        ]
    });
  });

  $(document).ready( function () {
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    });
  });
</script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })

</script>

@endpush
