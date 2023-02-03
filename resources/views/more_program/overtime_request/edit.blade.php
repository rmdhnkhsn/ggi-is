@extends("layouts.app")
@section("title","Edit Request")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
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
        <div class="cards p-4">
          <div class="row">
            <div class="col-11 mb-3">
              <div class="title-24-grey text-left">EDIT FORMULIR RENCANA & REALISASI KERJA LEMBUR</div>
            </div>
            <div class="col-1 text-right">
              <button type="button" class="btn" id="info" data-toggle="popover" title="Info Pengajuan" data-content="Dibuat pada : {{$data->waktu_pembuatan}}, Approve 1 :{{$data->waktu_app1}} , Approve 2 : {{$data->waktu_app2}}"><i class="fas fa-info-circle" style="color : #007bff"></i></button>
            </div>
          </div>
        <form id="update" action="{{route('update.request.overtime')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="text" class="form-control borderInput" name="status_lembur" value="{{$data->status_lembur}}" placeholder="Pilih Tanggal" readonly/>
          <input type="hidden" class="form-control borderInput" name="id" value="{{$data->id}}" placeholder="Pilih Tanggal" readonly/>
          <div class="row mt-4 mb-2">
            <div class="col-md-4 mb-3">
              <span class="title-sm">Tanggal Lembur</span>
              <div class="input-group mt-1">
                <div class="input-group date">
                  <div class="input-group-append ">
                    <div class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></div>
                  </div>
                  <input type="date" class="form-control borderInput" name="" value="{{$data->tanggal}}" placeholder="Pilih Tanggal" readonly/>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <span class="title-sm">Department</span>
              <div class="input-group mt-1">
                <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px" for="F0101_ALPH"><i class="fs-20 fas fa-briefcase"></i></span>
                </div>
                <select class="form-control borderInput" id="" name="" value="{{$data->departemen}}" style="cursor:pointer" readonly>
                  <option value="{{$data->departemen}}">{{$data->departemen}}</option>
                </select>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <span class="title-sm">Bagian</span>
              <div class="input-group mt-1">
                <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px" for="F0101_ALPH"><i class="fs-20 fas fa-briefcase"></i></span>
                </div>
                <select class="form-control borderInput" id="" name="" value="{{$data->bagian}}" style="cursor:pointer" readonly>
                  <option value="{{$data->departemen}}">{{$data->bagian}}</option>
                </select>
              </div>
            </div>
            <div class="col-12 mt-4 mb-2">
              <div class="tab-content">
                @if($count>0)
                <div class="" >
                  @include('more_program.overtime_request.partials.editkualitatif')
                </div>
                @else
                <div class="">
                  @include('more_program.overtime_request.partials.editkuantitatif')
                </div>
                @endif
              </div>
            </div>

          </div>
          <div class="row mb-4 px-2">
            <div class="col-12"></div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="title-20-grey text-left mb-3">Daftar Pekerja</div>
            </div>
            <div class="col-12">
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable1" class="table tbl-content no-wrap py-2">
                @if (($data->status_lembur=="Approve 2")||($data->status_lembur=="Done"))
                  <thead>
                    <tr class="text-center">
                      <th colspan="4"></th>
                      <th colspan="3" class="bg-Bwhite">REALISASI</th>
                      <th colspan="3" class="bg-Bwhite">RENCANA</th>
                    </tr>
                    <tr>
                      <th>NIK</th>
                      <th>NAMA</th>
                      <th>GROUP</th>
                      <th>TARGET PEKERJAAN</th>
                      <th>JAM AWAL</th>
                      <th>JAM AKHIR</th>
                      <th>TOTAL JAM</th>
                      <th>JAM AWAL</th>
                      <th>JAM AKHIR</th>
                      <th>TOTAL JAM</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($karyawan as $key=> $value)
                    <tr>
                     <input type="hidden" class="form-control borderInput" id="" name="id_karyawan[]" value="{{$value->id}}" placeholder="NIK" style="width:120px">

                      <td><input type="text" class="form-control borderInput" id="nik1" name="nik[]" value="{{$value->nik}}" placeholder="NIK" style="width:120px" readonly></td>
                      <td><input type="text" class="form-control borderInput" id="nama" name="nama[]" value="{{$value->nama}}" placeholder="Nama Pekerja" style="width:160px" readonly></td>
                      <td><input type="text" class="form-control borderInput" id="group" name="group[]" value="{{$value->grup}}" placeholder="Group" style="width:160px" readonly></td>
                      <td><input type="text" class="form-control borderInput" id="" name="target_pekerjaan[]" value="{{$value->target_pekerjaan}}" placeholder="Masukan Target Pekerjaan" style="width:280px" readonly></td>
                      <td><input type="time" class="form-control borderInput" id="" name="realisasi_jam_awal[]" value="{{$value->realisasi_jam_awal}}"  placeholder="00.00" style="width:130px" required></td>    
                      <td><input type="time" class="form-control borderInput" id="" name="realisasi_jam_akhir[]" value="{{$value->realisasi_jam_akhir}}" placeholder="00.00" style="width:130px" required></td>
                      <td><input type="number" step="0.01" class="form-control borderInput" id="" name="realisasi_total[]" value="{{$value->realisasi_total}}"  style="width:100px" required ></td>
                      <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_awal[]" value="{{$value->rencana_jam_awal}}" placeholder="00.00" style="width:130px"readonly ></td>
                      <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_akhir[]" value="{{$value->rencana_jam_akhir}}" placeholder="00.00" style="width:130px" readonly></td>
                      <td><input type="text" class="form-control borderInput" id="" name="rencana_total[]" value="{{$value->rencana_total}}" placeholder="0" style="width:100px" readonly></td>
                    </tr>
                    @endforeach
                  </tbody>
                @else
                  <thead>
                    <tr class="text-center">
                      <th colspan="4"></th>
                      <th colspan="3" class="bg-Bwhite">RENCANA</th>
                      <th colspan="3" class="bg-Bwhite">REALISASI</th>
                    </tr>
                    <tr>
                      <th>NIK</th>
                      <th>NAMA</th>
                      <th>GROUP</th>
                      <th>TARGET PEKERJAAN</th>
                      <th>JAM AWAL</th>
                      <th>JAM AKHIR</th>
                      <th>TOTAL JAM</th>
                      <th>JAM AWAL</th>
                      <th>JAM AKHIR</th>
                      <th>TOTAL JAM</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($karyawan as $key=> $value)
                    <tr>
                     <input type="hidden" class="form-control borderInput" id="" name="id_karyawan[]" value="{{$value->id}}" placeholder="NIK" style="width:120px">

                      <td><input type="text" class="form-control borderInput" id="nik1" name="nik[]" value="{{$value->nik}}" placeholder="NIK" style="width:120px" readonly></td>
                      <td><input type="text" class="form-control borderInput" id="nama" name="nama[]" value="{{$value->nama}}" placeholder="Nama Pekerja" style="width:160px" readonly></td>
                      <td><input type="text" class="form-control borderInput" id="group" name="group[]" value="{{$value->grup}}" placeholder="Group" style="width:160px" readonly></td>
                      <td><input type="text" class="form-control borderInput" id="" name="target_pekerjaan[]" value="{{$value->target_pekerjaan}}" placeholder="Masukan Target Pekerjaan" style="width:280px" readonly></td>
                      @if ($data->status_lembur=="Waiting")
                      <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_awal[]" value="{{$value->rencana_jam_awal}}" placeholder="00.00" style="width:130px"required ></td>
                      <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_akhir[]" value="{{$value->rencana_jam_akhir}}" placeholder="00.00" style="width:130px" required></td>
                      <td><input type="text" class="form-control borderInput" id="" name="rencana_total[]" value="{{$value->rencana_total}}" placeholder="0" style="width:100px" required></td>
                      @else
                      <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_awal[]" value="{{$value->rencana_jam_awal}}" placeholder="00.00" style="width:130px"readonly ></td>
                      <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_akhir[]" value="{{$value->rencana_jam_akhir}}" placeholder="00.00" style="width:130px" readonly></td>
                      <td><input type="text" class="form-control borderInput" id="" name="rencana_total[]" value="{{$value->rencana_total}}" placeholder="0" style="width:100px" readonly></td>
                      @endif
                      <td><input type="time" class="form-control borderInput" id="" name="realisasi_jam_awal[]" value="{{$value->realisasi_jam_awal}}"  placeholder="00.00" style="width:130px" readonly></td>    
                      <td><input type="time" class="form-control borderInput" id="" name="realisasi_jam_akhir[]" value="{{$value->realisasi_jam_akhir}}" placeholder="00.00" style="width:130px" readonly></td>
                      <td><input type="number" step="0.01" class="form-control borderInput" id="" name="realisasi_total[]" value="{{$value->realisasi_total}}" placeholder="0" style="width:100px" readonly ></td>
                    </tr>
                    @endforeach
                  </tbody>
                @endif
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 flex mt-3">
              @if (($data->status_lembur=="Approve 2")||($data->status_lembur=="Done"))
              <button type="submit" class="btn-blue mb-2 w-100">Simpan <i class="fs-18 ml-3 fas fa-download"></i></button>
              @endif
            </div>
          </div>
        </form>
          @if ($data->status_lembur=="Waiting")
          <form id="add_karyawan" action="{{route('overtime.add.karyawan')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <div class="col-12">
                <div class="title-20-grey text-left">Daftar Pekerja Tambahan</div>
                <input type="hidden" name="id_lembur" value="{{$data->id}}">

              </div>
              <div class="col-12">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="table tbl-content no-wrap py-2">
                    <thead>
                      <tr class="text-center">
                        <th colspan="5">
                          <div class="flex" style="margin:-8px 0">
                            <button class="btn-blue" onclick="add_row();">Tambah Pekerja<i class="fs-18 ml-3 fas fa-plus"></i></button>
                          </div>
                        </th>
                        <th colspan="3" class="bg-Bwhite">RENCANA</th>
                        <th colspan="3" class="bg-Bwhite">REALISASI</th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>NIK</th>
                        <th>NAMA</th>
                        <th>GROUP</th>
                        <th>TARGET PEKERJAAN</th>
                        <th>JAM AWAL</th>
                        <th>JAM AKHIR</th>
                        <th>TOTAL JAM</th>
                        <th>JAM AWAL</th>
                        <th>JAM AKHIR</th>
                        <th>TOTAL JAM</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                        </td>
                        <td><input type="text" class="form-control borderInput livesearch" id="nik" name="nik[]" placeholder="NIK" style="width:120px" onchange="search_pekerja(this);" required></td>
                        <td><input type="text" class="form-control borderInput nama" id="nama" name="nama[]" placeholder="Nama Pekerja" style="width:160px" readonly></td>
                        <td>
                          <input type="hidden" class="form-control borderInput gaji" id="gaji" name="gaji[]" placeholder="gaji" style="width:160px">
                          <input type="text" class="form-control borderInput group" id="group" name="group[]" placeholder="Group" style="width:160px" readonly>
                        </td>
                        <td><input type="text" class="form-control borderInput target_pekerjaan" id="" name="target_pekerjaan[]" placeholder="Masukan Target Pekerjaan" style="width:280px" required></td>
                        <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_awal[]" placeholder="00.00" style="width:130px" required></td>
                        <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_akhir[]" placeholder="00.00" style="width:130px" required></td>
                        <td><input type="number" step="0.01" min="0.5" class="form-control borderInput" id="" name="rencana_total[]" placeholder="0" style="width:100px" required></td>
                        <td><input type="time" class="form-control borderInput" id="" name="realisasi_jam_awal[]" placeholder="00.00" style="width:130px" readonly></td>    
                        <td><input type="time" class="form-control borderInput" id="" name="realisasi_jam_akhir[]" placeholder="00.00" style="width:130px" readonly></td>
                        <td><input type="text" class="form-control borderInput" id="" name="realisasi_total[]" placeholder="0" style="width:100px" readonly></td>
                      </tr>
                    </tbody>
                  </table> 
                  
                </div>
                <div class="row">
                    <div class="col-12 flex mt-3">
                      <button id="add" type="submit" class="btn-blue mb-2 w-100">Simpan <i class="fs-18 ml-3 fas fa-download"></i></button>
                    </div>
                  </div>
              </div>
            </div>
          </form>
          @endif

          @if ($data->status_lembur=="Done")
            <form  action="{{route('pdf.request.overtime')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" class="form-control borderInput" name="id" value="{{$data->id}}" placeholder="Pilih Tanggal" readonly/>
  
              <button type="submit" class="btn-red w-100">Download <i class="fas fa-file-pdf ml-3"></i></button>
            </form>
          @endif

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script>
//  document.getElementById('add_karyawan').addEventListener('submit', function() {
//     document.getElementById('update').submit()
//       })
  document.getElementById('add').addEventListener('click', function() {
    document.getElementById('update').submit()
})
</script>

<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script src="{{asset('/js/overtime_request/custom_lib.js')}}"></script>


</script>
@if(Session::has('success'))
  <script>
    window.onload = function() {
      Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Data Berhasil Disimpan',
      showConfirmButton: false,
      timer: 1500
      })
    };
  </script>
@endif


<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 100,
    "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });
  });
</script>
<script>

function add_more() {
  document.getElementById("DTtable")
  .insertRow(-1).innerHTML =                                                                                                                                                                                                                                     
  '<tr><td><input type="text" class="form-control borderInput" id="" name="" placeholder="NIK" style="width:120px"></td><td><input type="text" class="form-control borderInput" id="" name="" placeholder="Nama Pekerja" style="width:160px"></td><td><input type="text" class="form-control borderInput" id="" name="" placeholder="Group" style="width:160px"></td><td><input type="text" class="form-control borderInput" id="" name="" placeholder="Masukan Target Pekerjaan" style="width:280px"></td><td><input type="time" class="form-control borderInput" id="" name="" style="width:130px"></td><td><input type="time" class="form-control borderInput" id="" name="" style="width:130px"></td><td><input type="text" class="form-control borderInput" id="" name="" placeholder="0" style="width:100px"></td><td><input type="time" class="form-control borderInput" id="" name="" style="width:130px"></td>    <td><input type="time" class="form-control borderInput" id="" name="" style="width:130px"></td><td><input type="text" class="form-control borderInput" id="" name="" placeholder="0" style="width:100px"></td></tr>';
  }

  $('#info').popover('show')
  $('#info').popover('toggle');
</script>
<script>
   function search_pekerja(elem) {
    var nik=$(elem).val();
    if (nik!==''||nik!=='undefined') {
      var data=get_pekerja(nik);

      if (!jQuery.isEmptyObject(data)) {
        // alert(JSON.stringify(data.gp_tun));
        $(elem).closest('tr').find('input.nama').val(data.nama);
        $(elem).closest('tr').find('input.group').val(data.group);
        $(elem).closest('tr').find('input.gaji').val(data.gp_tun);
      } else {
        $(elem).closest('tr').find('input.nama').val('');
        $(elem).closest('tr').find('input.group').val('');
        $(elem).closest('tr').find('input.gaji').val('');
      }

    }
  }

  function get_pekerja(nik) {
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    var return_first = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    data: {
                      ID: nik,
                    },
                    url: '{{ route("overtime.getuser") }}',
                    type: 'POST',
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response;
                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'Not connect.\n Verify Network.';
                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        alert(msg);
                    },
                });
        return lbr;
    }(); 
    return return_first;
  }
</script>
@endpush