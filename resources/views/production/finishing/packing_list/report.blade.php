@extends("layouts.app")
@section("title","Packing Report")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
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
        <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem">
          <div class="row">
            <div class="col-12 mb-2">
              <div class="title-24">Finishing Report</div>
            </div>
            <div class="col-10x4-3">
              <div class="title-sm">Start Date</div>
              <div class="input-group mt-1 date" id="startDate" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#startDate" data-toggle="datetimepicker">
                  <div class="custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                  </div>
                </div>
                <input type="text" name="" class="form-control datetimepicker-input border-input-grey" data-target="#startDate" placeholder="Select Date" required/>
              </div>
            </div>
            <div class="col-10x4-3">
              <div class="title-sm">Last Date</div>
              <div class="input-group mt-1 date" id="lastDate" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#lastDate" data-toggle="datetimepicker">
                  <div class="custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                  </div>
                </div>
                <input type="text" name="" class="form-control datetimepicker-input border-input-grey" data-target="#lastDate" placeholder="Select Date" required/>
              </div>
            </div>
            <div class="col-10x4-3">
              <div class="title-sm">Category Finishing</div>
              <div class="input-group mt-1">
                <div class="input-group-prepend">
                    <span class="input-group-select" for="">Category</span>
                </div>
                <select class="form-control border-input-grey" id="" name="" style="cursor:pointer" required>
                  <option selected disabled>Select Category</option>
                  <option name="item">Item</option>    
                  <option name="Buyer">Buyer</option>    
                  <option name="Bagian">Bagian</option>    
                </select>
              </div>
            </div>
            <div class="col-10x4-1">
              <div class="title-sm text-white mb-1">download</div>
              <a href="" class="btn-red">Download<i class="ml-2 fs-18 fas fa-file-pdf"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="cards-18" style="padding: 30px 35px">
          <div class="row">
            <div class="title-24">Data Finishing</div>
            <div class="col-12 pb-5">
              <div class="cards-scroll scrollX" id="scroll-bar-sm">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable" class="table tbl-content-left no-wrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>Bulan</th>
                      <th>Style</th>
                      <th>Proses</th>
                      <th>Placing</th>
                      <th>WO</th>
                      <th>Buyer</th>
                      <th>Total</th>
                      <th>Start</th>
                      <th>Finish</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Remark</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>02/03/2022</td>
                      <td>Mei</td>
                      <td>5152362</td>
                      <td>Folding</td>
                      <td>CLN</td>
                      <td>173622</td>
                      <td>Adidas</td>
                      <td>18</td>
                      <td>16:20</td>
                      <td>20:00</td>
                      <td>110080</td>
                      <td>Lorem ipsum</td>
                      <td>Lorem ipsum, dolor sit amet.</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>02/03/2022</td>
                      <td>Mei</td>
                      <td>5152362</td>
                      <td>Folding</td>
                      <td>CLN</td>
                      <td>173622</td>
                      <td>Adidas</td>
                      <td>18</td>
                      <td>16:20</td>
                      <td>20:00</td>
                      <td>110080</td>
                      <td>Lorem ipsum</td>
                      <td>Lorem ipsum, dolor sit amet.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>

<script>
  document.getElementById('save').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Input Packing Report Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
  document.getElementById('save2').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Data Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $('#Date').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: false
  })
  $('#startDate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: false
  })
  $('#lastDate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: false
  })
</script>

@endpush