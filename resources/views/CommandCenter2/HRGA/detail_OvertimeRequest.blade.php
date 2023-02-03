@extends("layouts.app")
@section("title","Detail Request")
@push("styles")
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
              <div class="title-24-grey text-left">DETAIL PENGAJUAN LEMBUR</div>
            </div>
            <div class="col-1 text-right">
              <button type="button" class="btn" id="info" data-toggle="popover" title="Info Pengajuan" data-content="Dibuat pada : {{$data->waktu_pembuatan}}, Approve 1 :{{$data->waktu_app1}} , Approve 2 : {{$data->waktu_app2}}"><i class="fas fa-info-circle" style="color : #007bff"></i></button>
            </div>
          </div>
          <form  action="{{route('update.request.overtime')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control input-data-fa" name="id" value="{{$data->id}}" placeholder="Pilih Tanggal" readonly/>
            <div class="row mt-4 mb-2">
              <div class="col-md-4 mb-3">
                <span class="title-sm">Tanggal Lembur</span>
                <div class="input-group mt-1">
                  <div class="input-group date">
                    <div class="input-group-append ">
                      <div class="custom-calendar" style="width:52px"><i class="fs-18 fas fa-calendar-alt"></i></div>
                    </div>
                    <input type="date" class="form-control input-data-fa" name="" value="{{$data->tanggal}}" placeholder="Pilih Tanggal" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <span class="title-sm">Department</span>
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                      <span class="input-group-select-icon" for="F0101_ALPH"><i class="fas fa-briefcase"></i></span>
                  </div>
                  <select class="form-control border-input2" id="" name="" value="{{$data->departemen}}" style="cursor:pointer" readonly>
                    <option value="{{$data->departemen}}">{{$data->departemen}}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <span class="title-sm">Bagian</span>
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                      <span class="input-group-select-icon" for="F0101_ALPH"><i class="fas fa-briefcase"></i></span>
                  </div>
                  <select class="form-control border-input2" id="" name="" value="{{$data->bagian}}" style="cursor:pointer" readonly>
                    <option value="{{$data->departemen}}">{{$data->bagian}}</option>
                  </select>
                </div>
              </div>
              <div class="col-12 mt-4 mb-2">
                <div class="tab-content">
                  @if($count>0)
                  <div class="" >
                    @include('CommandCenter2.HRGA.partials.editkualitatif')
                  </div>
                  @else
                  <div class="">
                    @include('CommandCenter2.HRGA.partials.editkuantitatif')
                  </div>
                  @endif
                </div>
              </div>

            </div>
            <div class="row mb-4 px-2">
              <div class="col-12 border-bottom-blue"></div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="title-20-grey text-left">Daftar Pekerja</div>
              </div>
              <div class="col-12">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="table tbl-content no-wrap py-2">
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
                      <input type="hidden" class="form-control border-input" id="" name="id_karyawan[]" value="{{$value->id}}" placeholder="NIK" style="width:120px">

                        <td><input type="text" class="form-control border-input" id="nik1" name="nik[]" value="{{$value->nik}}" placeholder="NIK" style="width:120px" readonly></td>
                        <td><input type="text" class="form-control border-input" id="nama" name="nama[]" value="{{$value->nama}}" placeholder="Nama Pekerja" style="width:160px" readonly></td>
                        <td><input type="text" class="form-control border-input" id="group" name="group[]" value="{{$value->grup}}" placeholder="Group" style="width:160px" readonly></td>
                        <td><input type="text" class="form-control border-input" id="" name="target_pekerjaan[]" value="{{$value->target_pekerjaan}}" placeholder="Masukan Target Pekerjaan" style="width:280px" readonly></td>
                        <td><input type="time" class="form-control border-input" id="" name="rencana_jam_awal[]" value="{{$value->rencana_jam_awal}}" placeholder="00.00" style="width:130px" readonly></td>
                        <td><input type="time" class="form-control border-input" id="" name="rencana_jam_akhir[]" value="{{$value->rencana_jam_akhir}}" placeholder="00.00" style="width:130px" readonly></td>
                        <td><input type="text" class="form-control border-input" id="" name="rencana_total[]" value="{{$value->rencana_total}}" placeholder="0" style="width:100px" readonly></td>
                        <td><input type="time" class="form-control border-input" id="" name="realisasi_jam_awal[]" value="{{$value->realisasi_jam_awal}}"  placeholder="00.00" style="width:130px" readonly ></td>    
                        <td><input type="time" class="form-control border-input" id="" name="realisasi_jam_akhir[]" value="{{$value->realisasi_jam_akhir}}" placeholder="00.00" style="width:130px" readonly></td>
                        @if($data->status_lembur=='Done')
                        <td><input type="text" class="form-control border-input" id="" name="realisasi_total[]" value="{{$value->realisasi_total}}" style="width:100px"readonly ></td>
                        @else
                        <td><input type="text" class="form-control border-input" id="" name="realisasi_total[]" value="" style="width:100px"readonly ></td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 flex mt-3">
              
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script>
  $('#info').popover('show')
  $('#info').popover('toggle');
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });
  });
</script>
<script>

function add_more() {
  document.getElementById("DTtable")
  .insertRow(-1).innerHTML =                                                                                                                                                                                                                                     
  '<tr><td><input type="text" class="form-control border-input" id="" name="" placeholder="NIK" style="width:120px"></td><td><input type="text" class="form-control border-input" id="" name="" placeholder="Nama Pekerja" style="width:160px"></td><td><input type="text" class="form-control border-input" id="" name="" placeholder="Group" style="width:160px"></td><td><input type="text" class="form-control border-input" id="" name="" placeholder="Masukan Target Pekerjaan" style="width:280px"></td><td><input type="time" class="form-control border-input" id="" name="" style="width:130px"></td><td><input type="time" class="form-control border-input" id="" name="" style="width:130px"></td><td><input type="text" class="form-control border-input" id="" name="" placeholder="0" style="width:100px"></td><td><input type="time" class="form-control border-input" id="" name="" style="width:130px"></td>    <td><input type="time" class="form-control border-input" id="" name="" style="width:130px"></td><td><input type="text" class="form-control border-input" id="" name="" placeholder="0" style="width:100px"></td></tr>';
}
</script>

@endpush