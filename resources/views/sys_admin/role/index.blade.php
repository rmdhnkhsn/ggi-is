@extends("layouts.app")
@section("title","Dashboard")
@push("styles")

  <link rel="stylesheet" href="{{asset('/common/assets/plugins/fontawesome-free/css/font2.css')}}">

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
            <a href="{{ route('role.create')}}" class="btn btn-block btn-info btn-sm"><i class="fas fa-plus"></i> Add New</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Role</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>Kode Role</th>
                            <th>Nama Role</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>Kode Role</th>
                            <th>Nama Role</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
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
        ajax: "{{ route('role.index') }}",
        columns: [
            {data: 'kode_role', name: 'kode_role'},
            {data: 'nama_role', name: 'nama_role'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
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
</script>
@endpush