@extends("layouts.app")
@section("title","Master Kode Kerja")
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
  @include('production.cutting.product_costing.layouts.navbar')
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row">
      <a href="#" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-business-time"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Master Kode Kerja</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('kode_kerja_karyawan.index')}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-user-clock"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Kode Kerja Karyawan</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-12 flex">
        <button class="btn btn-blue" type="button" data-toggle="modal" data-target="#inac" title="Create">
          <span class="mr-2">Add Item</span>  
          <i class="fs-20 fas fa-plus"></i>
        </button>
        <!-- <a href="" class="btn-blue ml-3" data-toggle="modal" data-target="#hari_kerja">Hari Kerja ({{$hari_kerja->num1}})<i class="ml-2 fs-20 fas fa-calendar-day"></i></a> -->
      </div>
      @include('production.cutting.product_costing.hrd.master_kode_kerja.partials.form-modal')
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
              <table id="example1" class="table hrd-tbl-content no-wrap">
                <thead>
                  <tr class="font-tr">
                    <th>Kode Kerja</th>
                    <th>Jam Kerja</th>
                    <th>Istirahat</th>
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
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "order": [[ 0, "asc" ]],
        "pageLength": 10,
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        processing: true,
        serverSide: true,
        ajax: "{{ route('master_kode_kerja.index') }}",
        columns: [
            {data: 'kode_kerja', name: 'kode_kerja'},
            {data: 'jam_kerja', name: 'jam_kerja'},
            {data: 'istirahat', name: 'istirahat'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endpush