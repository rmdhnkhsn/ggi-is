@extends("layouts.app")

@section("title","Dashboard")

@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush

@section("content")
    <section class="content-header f-poppins">
        <div class="container-fluid">
            <div class="row mb-2 mt-cs">
                <div class="col-12">
                    <div class="hr-title">Damage Recap</div>
                </div>
            </div>
            <div class="row">
                <div class="hr-col-2 mb-3">
                    <div class="cards-controll">
                        <div class="hr-cards-blue">
                            <img class="hr-image" src="{{url('images/iconpack/role-alarm-sm.svg')}}">
                        </div>
                        <span class="hr-desc">Alarm Button</span>
                        <p class="hr-count">{{$count_PerItem['alarm']}}</p>
                        <div class="hr-totdamal">Total Damage</div>
                        <div class="hr-totdamal2">All Location</div>
                    </div>
                </div>
                <div class="hr-col-2 mb-3">
                    <div class="cards-controll">
                        <div class="hr-cards-blue">
                            <img class="hr-image" src="{{url('images/iconpack/role-smokdet-sm.svg')}}">
                        </div>
                        <span class="hr-desc">Smoke Detector</span>
                        <p class="hr-count">{{$count_PerItem['smokedet']}}</p>
                        <div class="hr-totdamal">Total Damage</div>
                        <div class="hr-totdamal2">All Location</div>
                    </div>
                </div>
                <div class="hr-col-2 mb-3">
                    <div class="cards-controll">
                        <div class="hr-cards-blue">
                            <img class="hr-image" src="{{url('images/iconpack/role-apar-sm.svg')}}">
                        </div>
                        <span class="hr-desc">APAR</span>
                        <p class="hr-count">{{$count_PerItem['apar']}}</p>
                        <div class="hr-totdamal">Total Damage</div>
                        <div class="hr-totdamal2">All Location</div>
                    </div>
                </div>
                <div class="hr-col-2 mb-3">
                    <div class="cards-controll">
                        <div class="hr-cards-blue">
                            <img class="hr-image" src="{{url('images/iconpack/role-emerexit-sm.svg')}}">
                        </div>
                        <span class="hr-desc">Emergency Exit</span>
                        <p class="hr-count">{{$count_PerItem['emerexit']}}</p>
                        <div class="hr-totdamal">Total Damage</div>
                        <div class="hr-totdamal2">All Location</div>
                    </div>
                </div>
                <div class="hr-col-2 mb-3">
                    <div class="cards-controll">
                        <div class="hr-cards-blue">
                            <img class="hr-image" src="{{url('images/iconpack/role-emerlamp-sm.svg')}}">
                        </div>
                        <span class="hr-desc">Emergency Lamp</span>
                        <p class="hr-count">{{$count_PerItem['emerlamp']}}</p>
                        <div class="hr-totdamal">Total Damage</div>
                        <div class="hr-totdamal2">All Location</div>
                    </div>
                </div>
                <div class="hr-col-2 mb-3">
                    <div class="cards-controll2">
                        <span class="hr-desc-overall">Overall</span>
                        <p class="hr-count-overall">{{$count_PerItem['total']}}</p>
                        <div class="hr-total">
                            <div class="hr-totdamal">Total Damage</div>
                            <div class="hr-totdamal2">All Location</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12 justify-sb">
                    <div class="hr-title">Details Damage Recap</div>
                    <a  href="{{ route('hr_ga.auditbuyer.repairpdf')}}" class="btn hr-btn-downloadPDF"> Download PDF<i class="ml-3 far fa-file-pdf"></i></a> 
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="cards bg-card ml_mr-7">
                        <!-- <form  enctype="multipart/form-data"> -->
                        <!-- </form> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="hr-report-title my-3">Alarm Button</div>
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table class="table table-bordered">
                                            <tr class="bg-thead">
                                                <td width="5%" style="font-size:16px;">No</td>
                                                <td width="15%" style="font-size:16px;">Kode Lokasi</td>
                                                <td width="20%" style="font-size:16px;">Lokasi</td>
                                                <td width="20%" style="font-size:16px;">Kerusakan Terakhir </td>
                                                <td width="20%" style="font-size:16px;">Total Kerusakan </td>
                                                <td width="20%" style="font-size:16px;">Keterangan</td>
                                            </tr>
                                            <?php $no=1;?>
                                            @foreach($record_alarm as $key =>$value)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{$value['kode_lokasi']}}</td>
                                                <td>{{$value['nama_lokasi']}}</td>
                                                @if($value['count']> '0')
                                                <td>{{$value['tgl_periksa']}}</td>
                                                <td style="color:#FB5B5B">{{$value['count']}} Kerusakan</td>
                                                    @if($value['finish'] != null)
                                                    <td>{{$value['finish']}}</td>
                                                    @else
                                                    <td>Proses Perbaikan</td>
                                                    @endif
                                                @else
                                                <td>-</td>
                                                <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                                <td>-</td>
                                                @endif
            
                                            <?php $no++ ;?>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="hr-report-title my-3">Smoke Detector</div>
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table class="table table-bordered">
                                            <tr class="bg-thead">
                                                <td width="5%" style="font-size:16px;">No</td>
                                                <td width="15%" style="font-size:16px;">Kode Lokasi</td>
                                                <td width="20%" style="font-size:16px;">Lokasi</td>
                                                <td width="20%" style="font-size:16px;">Kerusakan Terakhir </td>
                                                <td width="20%" style="font-size:16px;">Total Kerusakan </td>
                                                <td width="20%" style="font-size:16px;">Keterangan</td>
                                            </tr>
                                            <?php $no=1;?>
                                            @foreach($record_SmokeDet as $key =>$value)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{$value['kode_lokasi']}}</td>
                                                <td>{{$value['nama_lokasi']}}</td>
                                                @if($value['count']> '0')
                                                <td>{{$value['tgl_periksa']}}</td>
                                                <td style="color:#FB5B5B">{{$value['count']}} Kerusakan</td>
                                                    @if($value['finish'] != null)
                                                    <td>{{$value['finish']}}</td>
                                                    @else
                                                    <td>Proses Perbaikan</td>
                                                    @endif
                                                @else
                                                <td>-</td>
                                                <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                                <td>-</td>
                                                @endif
            
                                            <?php $no++ ;?>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="hr-report-title my-3">APAR</div>
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table class="table table-bordered">
                                            <tr class="bg-thead">
                                                <td width="5%" style="font-size:16px">No</td>
                                                <td width="15%" style="font-size:16px">Kode Lokasi</td>
                                                <td width="20%" style="font-size:16px">Lokasi</td>
                                                <td width="20%" style="font-size:16px">Kerusakan Terakhir </td>
                                                <td width="20%" style="font-size:16px">Total Kerusakan </td>
                                                <td width="20%" style="font-size:16px">Keterangan</td>
                                            </tr>
                                            <?php $no=1;?>
                                            @foreach($record_Apar as $key =>$value)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{$value['kode_lokasi']}}</td>
                                                <td>{{$value['nama_lokasi']}}</td>
                                                @if($value['count']> '0')
                                                <td>{{$value['tgl_periksa']}}</td>
                                                <td style="color:#FB5B5B">{{$value['count']}} Kerusakan</td>
                                                    @if($value['finish'] != null)
                                                    <td>{{$value['finish']}}</td>
                                                    @else
                                                    <td>Proses Perbaikan</td>
                                                    @endif
                                                @else
                                                <td>-</td>
                                                <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                                <td>-</td>
                                                @endif
            
                                            <?php $no++ ;?>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="hr-report-title my-3">Emergency Exit</div>
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table class="table table-bordered">
                                            <tr class="bg-thead">
                                                <td width="5%" style="font-size:16px">No</td>
                                                <td width="15%" style="font-size:16px">Kode Lokasi</td>
                                                <td width="20%" style="font-size:16px">Lokasi</td>
                                                <td width="20%" style="font-size:16px">Kerusakan Terakhir </td>
                                                <td width="20%" style="font-size:16px">Total Kerusakan </td>
                                                <td width="20%" style="font-size:16px">Keterangan</td>
                                            </tr>
                                            <?php $no=1;?>
                                            @foreach($record_EmerExit as $key =>$value)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{$value['kode_lokasi']}}</td>
                                                <td>{{$value['nama_lokasi']}}</td>
                                                @if($value['count']> '0')
                                                <td>{{$value['tgl_periksa']}}</td>
                                                <td style="color:#FB5B5B;">{{$value['count']}} Kerusakan</td>
                                                    @if($value['finish'] != null)
                                                    <td>{{$value['finish']}}</td>
                                                    @else
                                                    <td>Proses Perbaikan</td>
                                                    @endif
                                                @else
                                                <td>-</td>
                                                <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                                <td>-</td>
                                                @endif
            
                                            <?php $no++ ;?>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="hr-report-title my-3">Emergency Lamp</div>
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table class="table table-bordered">
                                            <tr class="bg-thead">
                                                <td width="5%" style="font-size:16px">No</td>
                                                <td width="15%" style="font-size:16px">Kode Lokasi</td>
                                                <td width="20%" style="font-size:16px">Lokasi</td>
                                                <td width="20%" style="font-size:16px">Kerusakan Terakhir </td>
                                                <td width="20%" style="font-size:16px">Total Kerusakan </td>
                                                <td width="20%" style="font-size:16px">Keterangan</td>
                                            </tr>
                                            <?php $no=1;?>
                                            @foreach($record_EmerLamp as $key =>$value)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{$value['kode_lokasi']}}</td>
                                                <td>{{$value['nama_lokasi']}}</td>
                                                @if($value['count']> '0')
                                                <td>{{$value['tgl_periksa']}}</td>
                                                <td style="color:#FB5B5B">{{$value['count']}} Kerusakan</td>
                                                    @if($value['finish'] != null)
                                                    <td>{{$value['finish']}}</td>
                                                    @else
                                                    <td>Proses Perbaikan</td>
                                                    @endif
                                                @else
                                                <td>-</td>
                                                <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                                <td>-</td>
                                                @endif
            
                                            <?php $no++ ;?>
                                            @endforeach
                                        </table>
                                    </div>
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
<style>
	table, td, th {
  border: 1px solid black;
  text-align:center;
  font-size:13px;
  padding:3px;
  }
  table {
    border-collapse: collapse;
  }
			#box1{
				width:180px;
				height:180px;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tabel{
				width:100%;
				height: auto;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tab{
        width:100%;
				height: auto;
        border: 1px solid grey;
				background:white;
			}
      #tbl{
        width:100%;
				height: 200px;
        border: 1px solid grey;
				background:white;
			}
      h7 {
        text-decoration: overline;
      }
      input[type=text] {
        width: 100%;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid black;
        }
        .dit {
        width: 180px;
        padding: 3px;
        border: 1px solid black;
        margin: 0;
        }
        .div3 {
        width: auto;
        height: auto;  
        padding: 5px;
        border: 1px solid black;
        }
</style>
@endpush
