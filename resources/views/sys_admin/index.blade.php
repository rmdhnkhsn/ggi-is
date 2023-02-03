@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@push("sidebar")
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('karyawan.index')}}" class="nav-link <?php if($page=='Master_Karyawan'){echo 'active';}?>">
            <i class="nav-icon fa fa-address-book "></i>
              <p class="">
                Master Karyawan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('masterwo.index')}}" class="nav-link <?php if($page=='MasterWo'){echo 'active';}?>">
            <i class="nav-icon fa fa-book "></i>
              <p class="">
                Master WO
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('role.index')}}" class="nav-link <?php if($page=='Role'){echo 'active';}?>">
            <i class="nav-icon fa fa-server "></i>
              <p class="">
                Role
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('branch.index')}}" class="nav-link <?php if($page=='Branch'){echo 'active';}?>">
            <i class="nav-icon fa fa-list-ul "></i>
              <p class="">
                Branch
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='division'){echo 'active';}?>">
              <i class="nav-icon  fas fa-puzzle-piece"></i>
              <p class="">
                Division
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('bagian.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">All Factory</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
@endpush


@section("content")
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-1">
            <a href="{{ route('karyawan.inactive')}}" class="btn btn-block btn-secondary btn-sm"><i class="fas fa-user"></i> Inactive</a>
          </div>
          <div class="col-sm-1">
            <a href="{{ route('karyawan.export')}}" class="btn btn-block btn-info btn-sm"><i class="fas fa-download"></i> Export</a>
          </div>
          <div class="col-sm-1">
            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-upload"></i> Import</button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-xl">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Import Karyawan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding-bottom:20px">
              <form action="{{ route('karyawan.import')}}" method="post" enctype="multipart/form-data">
                  @csrf
                      @include('sys_admin.partials.form-import', ['submit' => 'Import'])
              </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                <i class="icon fas fa-check"></i> {{ $message }}
            </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Konfigurasi</h3>
              </div>
              <div class="card-body">
                <form action="{{route('karyawan.manage')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <select class="form-control " style="width: 100%;" name="nik" id="nik">
                      <option value="">Pilih Karyawan</option>
                      @foreach($all as $a)
                          <option value="{{$a->nik}}">{{$a->nik}} | {{$a->nama}}</option>
                      @endforeach
                  </select>
                  <br><br>
                  <button type="submit" class="btn btn-primary btn-sm col-lg-12"><i class="fas fa-users-cog"></i> Set</button>
                </form>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Bagian</th>
                            <th>Jabatan</th>
                            <th>Branch</th>
                            <th>BranchDetail</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                  </thead>
                  <tfoot>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Bagian</th>
                            <th>Jabatan</th>
                            <th>Branch</th>
                            <th>BranchDetail</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
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
@endsection

@push("scripts")
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('karyawan.index') }}",
        columns: [
            {data: 'nik', name: 'nik'},
            {data: 'nama', name: 'nama'},
            {data: 'bagian', name: 'bagian'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'branch', name: 'branch'},
            {data: 'branchdetail', name: 'branchdetail'},
            {data: 'role', name: 'role'},
            {data: 'status', name: 'status'},
        ]
    });
  });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    });
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush