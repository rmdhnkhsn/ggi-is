@include('audit.Uji_TF.layouts.header')
@include('audit.Uji_TF.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="card-header">
          <h3 class="card-judul text-center">Anomali Ledger VS IT Inv</h3>
        </div>
        <div class="row mt-3">
          <div class="col-12 mt-4 mb-2 mr-auto ml-auto">
            <div class="menu-bar2">
              <div class="navigation2">
                <ul>

                  <li class="list active">
                    <a href="{{ route('auditpf.form.gudang')}}">
                      <span class="icon">
                        <i class="fas fa-file-download"></i>
                      </span>
                      <span class="text">Pemasukan False</span>
                    </a>
                  </li>
                 
                  <li class="list">
                    <a href="{{ route('auditf.form.gudang')}}">
                      <span class="icon">
                        <i class="fas fa-file-upload"></i>
                      </span>
                      <span class="text">Pengeluaran False</span>
                    </a>
                  </li>
                  
                  <li class="list">
                    <a href="{{ route('audit.form.gudang')}}">
                      <span class="icon">
                        <i class="fas fa-exclamation"></i>
                      </span>
                      <span class="text">N/A All GL CLASS</span>
                    </a>
                  </li>
                  <div class="indicator2"></div>
                </ul>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="modal fade modal-loading" id="test2" aria-hidden="true">
        <div class="body-skeleton">
          <div class="card-skeleton">
            <div class="header">
              <div class="details">
                <span class="name-1"></span>
                <span class="name-2"></span>
              </div>
            </div>

            <div class="Skeleton-table-head">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body1">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body2">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body3">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body4">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body5">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body6">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body7">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
            <div class="Skeleton-table-body8">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
              <div class="line line-4"></div>
              <div class="line line-5"></div>
            </div>
          </div>
        </div>
      </div>  
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
             
              <div class="card-body">
                <form action="{{route('auditpf.get.gudang')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('audit.Uji_TF.gudang.partials.form-control', ['submit' => 'Get'])
                </form>
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                    <button type="button" class="close" data-dismiss="alert">×</button>   
                    <center> 
                    <strong>{{ $message }}</strong>
                    </center>
                </div>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('audit.Uji_TF.layouts.footer')
<script>
$(document).ready(function() {
    $('.select3').select2({
        placeholder:"Select Branch",
        theme: 'bootstrap4'
    });
});
$(document).ready(function() {
    $('.select4').select2({
        placeholder:"Select Branch Detail",
        theme: 'bootstrap4'
    });
});
$('#reservationdate').datetimepicker({
    format: 'Y-MM-DD'
    });
    $('#reservationdate2').datetimepicker({
    format: 'Y-MM-DD'
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});
function test(){
    // alert('Ceklist GL Class minimal 1')
    document.getElementById("test1").innerHTML=""
    $('#test2').modal('show');
  }
</script>

<script>
  const list = document.querySelectorAll('.list');
  function activeLink(){
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
  }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));
</script>