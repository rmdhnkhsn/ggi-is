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
            <div class="menu-bar">
              <div class="navigation">
                <ul>
                  <li class="list">
                    <a href="{{ route('auditp.form')}}">
                      <span class="icon">
                        <i class="fas fa-download"></i>
                      </span>
                      <span class="text">Pemasukan True/False</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('auditpf.form')}}">
                      <span class="icon">
                        <i class="fas fa-file-download"></i>
                      </span>
                      <span class="text">Pemasukan False</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('audit.form')}}">
                      <span class="icon">
                        <i class="fas fa-upload"></i>
                      </span>
                      <span class="text">Pengeluaran True/False</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('auditf.form')}}">
                      <span class="icon">
                        <i class="fas fa-file-upload"></i>
                      </span>
                      <span class="text">Pengeluaran False</span>
                    </a>
                  </li>
                  <li class="list ">
                    <a href="{{ route('audit.formm1')}}">
                      <span class="icon">
                        <i class="fas fa-exclamation"></i>
                      </span>
                      <span class="text">N/A</span>
                    </a>
                  </li>
                  <li class="list active">
                    <a href="{{ route('audit.formmall')}}">
                      <span class="icon">
                        <i class="fas fa-exclamation"></i>
                      </span>
                      <span class="text">N/A All GL CLASS</span>
                    </a>
                  </li>
                  <div class="indicator"></div>
                </ul>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              
              <div class="card-body">
                <form action="{{route('audit.gettall')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('audit.Uji_TF.UjiNa.partials.formall-control', ['submit' => 'Get'])
                </form>
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                    <button type="button" class="close" data-dismiss="alert">??</button>   
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
    $('#reservationdate3').datetimepicker({
    format: 'Y-MM-DD'
    });
    $('#reservationdate4').datetimepicker({
    format: 'Y-MM-DD'
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});
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