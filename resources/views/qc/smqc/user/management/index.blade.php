@extends("layouts.app")
@section("title","User Management")
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
<meta name="csrf-token" content="{{ csrf_token() }}">
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
      @include('qc.smqc.user.management.partials.form-modal')
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
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Category</th>
                    <th>Buyer</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Branch</th>
                    <th>Branchdetail</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->nik}}</td>
                        <td>{{$value->nama}}</td>
                        <td>{{$value->kategori}}</td>
                        <td>{{$value->buyer}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->role}}</td>
                        <td>{{$value->branch}}</td>
                        <td>{{$value->branchdetail}}</td>
                        <td>
                          <button data-toggle="modal" data-target="#editRole{{$value->id}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                          <a href="{{route('usersmqc.delete', $value->id)}}" onclick="return confirm('Delete This User ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          @include('qc.smqc.user.management.partials.modal-edit')
                        </td>
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
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "order": [[ 0, "asc" ]],
        "pageLength": 10,
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
    });
  });
</script>

<script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.select2bs4_add').select2({
      theme: 'bootstrap4',
      minimumInputLength: 3,
      ajax: {
        type: "POST",
        url: '{{ route("user.cari_nik") }}',
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            karyawan_nik: params.term // search term
          };
        },
        processResults: function (response) {
          return {
              results: response
            };
        },
        cache: true
      }
})

$('.select2bs4_add').on('select2:select', function (e) {
    e.preventDefault();
    var data = e.params.data;
    $('#nik_karyawan').val(data.text);
    $('#nama_karyawan').val(data.id);
    $('#branch_karyawan').val(data.branch);
    $('#branchdetail_karyawan').val(data.branchdetail);
    $('#email_karyawan').val(data.email);
});
</script>
<script>
   $('.select2bs4_buyer').select2({
    theme: 'bootstrap4'
   })
</script>
@endpush