@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row">
      <div class="col-xl-8">
        <div class="row">
          <div class="col-12 mb-2">
            <span class="title-24">Map Control</span>
          </div>
          <a href="{{ route('hrd.map.gm2')}}" class="col-12">
            <div class="card-map bg-benua p-3" style="height:455px">
              <div class="row">
                <div class="col-12 justify-center mb-1">
                  <span class="desc-map">Gistex Majalengka 2</span>
                </div>
                <div class="col-12 justify-center">
                  <img src="{{ asset('/images/HR/gm2.svg') }}">
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="row">
          <div class="col-12 mb-2">
            <span class="title-24">Notification</span>
          </div>
          <div class="col-12">
            <div class="cards h-455 p-3">
              @if($count_damage != 0)
              <div class="card-scroll h-400F scrollY" id="scroll-bar">

                @foreach($alarm_perbaikan as $key=>$value)
                @if($value->perbaikan==null)
                  <div class="alertt c-pointer alert-merah" data-toggle="modal" data-target="#modal-alarm{{$value->id}}">
                    <div class="icon-notification bg-merah">
                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-alarm.svg')}}">
                    </div>
                    <span class="desc-notif truncate">
                      Ada masalah <b>Alarm Button</b> di lokasi <b>{{$value->nama_lokasi}} </b> 
                    </span>
                  </div>
                  <div class="modal" id="modal-alarm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content" style="border-radius:10px">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                            </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-12">
                                  <table class="table tbl-ctg table-bordered table-striped">
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Item</td>
                                        <td width="70%">{{$value->item}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Lokasi</td>
                                        <td width="70%">{{$value->nama_lokasi}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Kondisi Tombol Alaram</td>
                                        <td width="70%">{{$value->kondisi}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Kebersihan tombol alarm</td>
                                        <td width="70%">{{$value->kebersihan}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Chechklist tombol alarm</td>
                                        <td width="70%">{{$value->ceklis}}</td>
                                      </tr>
                                  </table>
                              </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
                @endforeach
                <!-- <a href="#"> -->
                @foreach($SmokeDet_perbaikan as $key=>$value)
                @if($value->perbaikan==null)
                  <div class="alertt c-pointer alert-biru" data-toggle="modal" data-target="#modal-SmokeDet{{$value->id}}">
                    <div class="icon-notification bg-biru">
                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-smoke.svg')}}">
                    </div>
                    <span class="desc-notif truncate">
                      Ada masalah <b>Smoke Detector</b> di lokasi <b>{{$value->nama_lokasi}} </b> 
                    </span>
                  </div>
                  <div class="modal" id="modal-SmokeDet{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content" style="border-radius:10px">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                            </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-12">
                                  <table class="table tbl-ctg table-bordered table-striped">
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Item</td>
                                        <td width="70%">{{$value->item}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Lokasi</td>
                                        <td width="70%">{{$value->nama_lokasi}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Terdapat smoke detector</td>
                                        <td width="70%">{{$value->ada_smoke}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Fungsi smoke detector</td>
                                        <td width="70%">{{$value->fungsi}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Baterai Smoke Detector</td>
                                        <td width="70%">{{$value->baterai}}</td>
                                      </tr>
                                  </table>
                              </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
                @endforeach

                @foreach($apar_perbaikan as $key=>$value)
                @if($value->perbaikan==null)
                <div class="alertt c-pointer alert-kuning" data-toggle="modal" data-target="#modal-apar{{$value->id}}">
                  <div class="icon-notification bg-kuning">
                    <img width="38px" height="38px" src="{{url('images/iconpack/icon-apar.svg')}}">
                  </div>
                  <span class="desc-notif truncate">
                    Ada masalah <b>APAR</b> di lokasi <b>{{$value->nama_lokasi}} </b> 
                  </span>
                </div>
                <div class="modal" id="modal-apar{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" style="border-radius:10px">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-12">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                              </button>
                          </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <table class="table tbl-ctg table-bordered table-striped">
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Item</td>
                                      <td width="70%">{{$value->item}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Lokasi</td>
                                      <td width="70%">{{$value->nama_lokasi}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Tekanan APAR</td>
                                      <td width="70%">{{$value->tekanan}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Pin Pengaman APAR</td>
                                      <td width="70%">{{$value->pin}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Kondisi Selang</td>
                                      <td width="70%">{{$value->kondisi_selang}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Berat Tabung APAR</td>
                                      <td width="70%">{{$value->berat_tabung}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Masa Berlaku Pengisian</td>
                                      <td width="70%">{{$value->masa_berlaku}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Kondisi Handle/Tuas</td>
                                      <td width="70%">{{$value->kondisi_tuas}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Garis Merah / Red Line APAR</td>
                                      <td width="70%">{{$value->garis_merah}}</td>
                                    </tr>
                                    <tr>
                                      <td class="fw-600 no-wrap" width="30%">Kondisi Sign APAR</td>
                                      <td width="70%">{{$value->kondisi_sign}}</td>
                                    </tr>
                                </table>
                            </div>  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach

                @foreach($EmerLamp_perbaikan as $key=>$value)
                @if($value->perbaikan==null)
                  <div class="alertt c-pointer alert-hijau" data-toggle="modal" data-target="#modal-EmerLamp{{$value->id}}">
                    <div class="icon-notification bg-hijau">
                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-emlamp.svg')}}">
                    </div>
                    <span class="desc-notif truncate">
                      Ada masalah <b>Emergency Lamp</b> di lokasi <b>{{$value->nama_lokasi}} </b> 
                    </span>
                  </div>
                  <div class="modal" id="modal-EmerLamp{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content" style="border-radius:10px">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                            </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-12">
                                  <table class="table tbl-ctg table-bordered table-striped">
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Item</td>
                                        <td width="70%">{{$value->item}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Lokasi</td>
                                        <td width="70%">{{$value->nama_lokasi}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Kondisi Lampu</td>
                                        <td width="70%">{{$value->kondisi}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Kebersihan Lampu</td>
                                        <td width="70%">{{$value->kebersihan}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Form Checklist</td>
                                        <td width="70%">{{$value->form}}</td>
                                      </tr>
                                  </table>
                              </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
                @endforeach

                @foreach($EmerExit_perbaikan as $key=>$value)
                @if($value->perbaikan==null)
                  <div class="alertt c-pointer alert-merah-tua" data-toggle="modal" data-target="#modal-EmerExit{{$value->id}}">
                    <div class="icon-notification bg-merah-tua">
                      <img width="38px" height="38px" src="{{url('images/iconpack/icon-emexit.svg')}}">
                    </div>
                    <span class="desc-notif truncate">
                      Ada masalah <b>Emergency Exit</b> di lokasi <b>{{$value->nama_lokasi}} </b> 
                    </span>
                  </div>
                  <div class="modal" id="modal-EmerExit{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content" style="border-radius:10px">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                            </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-12">
                                  <table class="table tbl-ctg table-bordered table-striped">
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Item</td>
                                        <td width="70%">{{$value->item}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Lokasi</td>
                                        <td width="70%">{{$value->nama_lokasi}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Terdapat Emergency Exit</td>
                                        <td width="70%">{{$value->ada_exit}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Kondisi Lampu</td>
                                        <td width="70%">{{$value->kondisi_lampu}}</td>
                                      </tr>
                                      <tr>
                                        <td class="fw-600 no-wrap" width="30%">Kebersihan</td>
                                        <td width="70%">{{$value->kebersihan}}</td>
                                      </tr>
                                  </table>
                              </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 @endif
                @endforeach
              </div>
              @else
              <div class="text-center no-notif">
                <i class="fas fa-bell d-block"></i>
                <span>No Notificatiion</span>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection

@push("scripts")

@endpush