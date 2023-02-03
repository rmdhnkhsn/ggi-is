@extends("layouts.app")
@section("title","Internal Control")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<!-- <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}"> -->
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section("content")
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Inventory</h3>
              </div>
              <div class="card-body">
                <form action="{{route('icr.get.inventory')}}" id="get_data" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="pabrik" class="font-weight-bold">Branch</label>
                    <div class="form-group clearfix">
                      <div class="row">
                        <div class="col-12">
                          @foreach($dataBranch as $db)
                          <div class="justify-start mb-1">
                              <input type="radio" class="radioCustomInput" name="branch" id="{{$db->branchdetail}}" value="{{$db->id}}" required>
                              <label style="font-weight:500;cursor:pointer;margin:0" class="ml-2 font-weight-normal" for="{{$db->branchdetail}}"> {{$db->nama_branch}} ({{$db->kode_jde}})</label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                     </div>

                        <label for="pabrik" class="font-weight-bold">Inventory</label>
                       <div class="form-group clearfix">
                        <div class="row">
                          <div class="col-12">

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inventory" id="pemasukan" value="pemasukan">
                            <label class="form-check-label" for="pemasukan">Pemasukan</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inventory" id="pengeluaran" value="pengeluaran">
                            <label class="form-check-label" for="pengeluaran">Pengeluaran</label>
                          </div>
                          </div>
                        </div>
                      </div>
                    <div class="row mt-3">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">First Date</label>
                            <div class="input-group date" id="first" data-target-input="nearest">
                                <div class="input-group-append" data-target="#first" data-toggle="datetimepicker">
                                    <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" data-target="#first" name="first" placeholder="Pilih Tanggal" required/>
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Last Date</label>
                            <div class="input-group date" id="last" data-target-input="nearest">
                                <div class="input-group-append" data-target="#last" data-toggle="datetimepicker">
                                    <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" data-target="#last" name="last" placeholder="Pilih Tanggal" required/>
                            </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Get Data</button>
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
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection

@push("scripts")
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
  $('#first').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
      });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });
  $('#last').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
      });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });
</script>
<!-- <script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>
    document.getElementById('get_data').addEventListener('submit', function() {
        showLoading();
    });
    function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                // showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
            }
        })
    }

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });

</script> -->
@endpush