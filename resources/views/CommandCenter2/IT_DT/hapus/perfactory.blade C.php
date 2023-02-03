@include('layouts.header')
@include('layouts.navbar2')
<style>
.test {
  width: auto;
  height: auto;
  font-family: Ubuntu;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1;
  letter-spacing: normal;
  text-align: left;
  color: #0f314a;
}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/font-awesome/css/font-awesome.min.css') }}">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap/css/bootstrap.min.css') }}">
<!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style2.css') }}">
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <section class="content-header">
        <div class="content-header">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <a href="{{ route('commandCenter2') }}" class="btn btn-primary btn-sm btn-block"><i class="fas fa-arrow-circle-left"></i> ALL FACTORY</a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ route('it_dt2.all') }}" class="btn btn-primary btn-sm btn-block"><i class="fas fa-arrow-circle-left"></i> IT & DT</a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ route('cc2.level2', $dataBranch->id) }}" class="btn btn-primary btn-sm btn-block"><i class="fas fa-arrow-circle-left"></i> {{$dataBranch->nama_branch}}</a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ route('cc2.it.dt', $dataBranch['id'])}}" class="btn btn-primary btn-sm btn-block"><i class="fas fa-arrow-circle-left"></i> Ticket IT Support</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($it_support as $key => $value)
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success">{{$value['jumlah_asiggn']}}</i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">{{$value ['nama']}}</span>
                            <span class="test"><font style="font-size:12px;">{{$value ['proses']}}</font>
                                <br>
                                <font style="font-size:16px;font-weight:bold;">{{$value ['branchdetail']}}-{{$value ['no']}}</font>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="content pb-2">
        <div class="container-fluid h-100">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-row card-secondary" style="height:500px;overflow:auto">
                        <div class="card-header">
                            <h3 class="card-title">Waiting {{$total_tiket['waiting']}}</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($dataTiketw as $key => $value)
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">No Ticket {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</h5>
                                    <div class="card-tools">
                                        <a href="{{route('cc2.tiket_detail', $value['id'])}}" class="btn btn-primary btn-sm" title="Tiket">
                                        <i class="fas fa-edit"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label  class="custom-control-label">User : {{ $value['nama'] }}</label>
                                    <br>
                                    <label  class="custom-control-label">Create Date : {{ $value['tgl_pengajuan'] }}</label>
                                    <br>
                                    <label for="customCheckbox3" class="custom-control-label">Error : {{ $value['judul'] }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-row card-primary" style="height:500px;overflow:auto">
                        <div class="card-header">
                            <h3 class="card-title">On Process {{ $total_tiket['proggres'] }}</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($dataTiketpro as $key => $value)
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">No Ticket {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</h5>
                                    <div class="card-tools">
                                        <a href="{{route('cc2.tiket_detail', $value['id'])}}" class="btn btn-primary btn-sm" title="Tiket">
                                            <i class="fas fa-edit"></i></a>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label  class="custom-control-label">User : {{ $value['nama'] }}</label>
                                    <br>
                                    <label  class="custom-control-label">Create Date : {{ $value['tgl_pengajuan'] }}</label>
                                    <br>
                                    <label for="customCheckbox3" class="custom-control-label">Error : {{ $value['judul'] }}</label>
                                    <br>
                                    <label for="customCheckbox5" class="custom-control-label">IT Support : {{ $value['petugas'] }}</label>
                                    <br>
                                    <label  class="custom-control-label">Start Process : {{ $value['tgl_pengerjaan'] }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-row card-danger" style="height:500px;overflow:auto">
                        <div class="card-header">
                            <h3 class="card-title">Pending {{ $total_tiket['pending'] }}</h3>
                        </div>
                        <div class="card-body">
                        @foreach ($dataTiketp as $key => $value)
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">No Ticket {{ $value['branchdetail'] }}-{{ $value['no_tiket'] }}</h5>
                                    <div class="card-tools">
                                        <a href="{{route('cc2.tiket_detail', $value['id'])}}" class="btn btn-primary btn-sm" title="Tiket">
                                            <i class="fas fa-edit"></i></a>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label  class="custom-control-label">User : {{ $value['nama'] }}</label>
                                    <br>
                                    <label  class="custom-control-label">Create Date: {{ $value['tgl_pengajuan'] }}</label>
                                    <br>
                                    <label for="customCheckbox3" class="custom-control-label">Error : {{ $value['judul'] }}</label>
                                    <br>
                                    <label for="customCheckbox5" class="custom-control-label">IT Support : {{ $value['petugas'] }}</label>
                                    <br>
                                    <label  class="custom-control-label">Start Process : {{ $value['tgl_pengerjaan'] }}</label>
                                    <br>
                                    <label  class="custom-control-label">Pending Date : {{ $value['tgl_pending'] }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@include('layouts.footer')
<script>
$(document).ready(function () {

/* Show customer */
$('body').on('click', '#show-customer', function () {
$('#customerCrudModal-show').html("Ticket Detail");
$('#crud-modal-show').modal('show');
});
});

</script>