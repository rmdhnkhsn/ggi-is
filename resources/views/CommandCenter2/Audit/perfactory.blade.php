@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
@endpush

@section("content")
   
    <section class="content f-poppins">
      <div class="container-fluid">
        
        <div class="row">
        @foreach($menu_uji as $key=>$value)
          @if($value['nama'] == 'Ledger VS IT Inv')
          <a href="{{ route('cc.icr.ledge-it', $Branch->id)}}" class="col-lg-3 col-xl-2 col-md-6 mb-4">
          @else
          <a href="{{route('cc.icr.test', $Branch->id)}}"class="col-lg-3 col-xl-2 col-md-6 mb-4">
          @endif
            <div class="adt-box">
              <div class="icon-box">
                <i class="fas fa-boxes"></i>
              </div>
              <span class="ledgerVS">{{$value['nama']}}</span>
            </div>
          </a>
        @endforeach
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <div class="adt-anom-user">Anomali by User</div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-xl-3 col-md-6 col-sm-12 mb-adt">
            <div class="cards-all bg-card h-80">
              <div class="adt-kotak-anom-all">
                <div class="adt-count">{{$jml_anomali['total']}}</div>
                <div class="adt-anom">Anomali</div>
              </div>
              <div class="adt-name-anom fs-24">
                ALL USER
              </div>
            </div>
          </div>
          @foreach($anomali_user as $key=>$value)
          <a href="{{ route('cc.icr.ledge-it.user',[$Branch->id, $value['user']])}}" class="col-xl-3 col-md-6 col-sm-12 mb-adt">
            <div class="cards bg-card h-80">
              <div class="adt-kotak-anom">
                <div class="adt-count">{{$value['count_anomali']}}</div>
                <div class="adt-anom">Anomali</div>
              </div>
              <div class="adt-name-anom">
              {{$value['user']}}
              </div>
            </div>
          </a>
          @endforeach
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <div class="adt-anom-days">Anomali in the last 30 days</div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="cards bg-card p-3 h-630">
              <div class="row pd-text">
                <div class="col-12">
                  <span class="adt-text-anom">Pemasukan False</span>
                </div>
              </div>
              <div class="scroll h-480" id="scroll-bar">
                <div class="row">
                  <div class="col-12">
                    @foreach($pemasukanF7 as $key=>$value)
                    <div class="alerttt">
                      <a class="prc-modal" data-toggle="modal" data-target="#audit{{$value['F564111C_UKID']}}" title="View Info"> 
                        <div class="prc-alert alert-merah">
                          <div class="prc-bg-merah bg-merah">
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <span class="prc-desc">
                                <div class="text-truncate">
                                  <b class="fw-600">No. Daftar : {{$value['F564111C_DSCRP']}} || User : {{$value['F4111_USER']}}</b>
                                  <div>{{$value['remark']}}</div>
                                </div>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="audit{{$value['F564111C_UKID']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div class="adt-no-daftar-user">
                                  No. Daftar : {{$value['F564111C_DSCRP']}} || User : {{$value['F4111_USER']}}
                              </div>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-12">
                                  <table class="table table-bordered">
                                    <tr>
                                        <td width="50%" style="font-weight:600">Key</td>
                                        <td width="50%" style="font-weight:400">{{$value['F564111C_UKID']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Item Number</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_ITM']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Bussines Unit</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_MCU']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">DC TY</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_DCT']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-CLASS</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_GLPT']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">TR Date Ledger</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRDJ']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-Date Pemasukan</td>
                                        <td width="50%" style="font-weight:400">{{$value['F564111C_DGL']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Lot Num</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_LOTN']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Quantity</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRQT']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">UM</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRUM']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">No. Daftar</td>
                                        <td width="50%" style="font-weight:400">{{$value['F564111C_DSCRP']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Jenis Dokumen</td>
                                        <td width="50%" style="font-weight:400">{{$value['F564111C_DSC1']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">User</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_USER']}}</td>
                                    </tr>
                                  </table>
                                  <table class="table table-bordered">
                                    <tr>
                                        <td width="25%"></td>
                                        <td width="25%" style="font-weight:600">Ledger</td>
                                        <td width="25%" style="font-weight:600">Pemasukan</td>
                                        <td width="25%" style="font-weight:600">Remark</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji Item</td>
                                        <td width="25%" style="font-weight:400">{{$value['F4111_ITM']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['F564111C_ITM']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_ITM']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji Qty</td>
                                        <td width="25%" style="font-weight:400">{{$value['F4111_TRQT']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['F564111C_TRQT']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_QTY']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji UOM</td>
                                        <td width="25%" style="font-weight:400">{{$value['F4111_TRUM']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['F564111C_TRUM']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_UOM']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji Unit</td>
                                        <td width="25%" style="font-weight:400">{{$value['F4111_MCU']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['F564111C_MCU']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_BRANCH']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji Tanggal Transaksi</td>
                                        <td width="25%" style="font-weight:400">OR DATE {{$value['F4111_TRDJ']}}</td>
                                        <td width="25%" style="font-weight:400">GL DATE {{$value['F564111C_DGL']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_Tanggal_Trans_GL']}}</td>
                                    </tr>
                                  </table>
                                  <table class="table table-bordered">
                                    <tr>
                                        <td width="50%" colspan="2" style="font-weight:600">Description</td>
                                        <td width="50%" colspan="2" style="font-weight:400">
                                          <span class="remark-nomatch">{{$value['remark']}}</span>
                                        </td>
                                    </tr>
                                  </table>
                                </div>  
                              </div>  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 justify">
                  <div class="count-anomali-found">
                    <span class="adt-count-merah">{{$jml_anomali['pemasukan']}}</span>
                    <span>Anomali Found</span>
                  </div>
                  <a href="{{route('cc.icr.ledge-it.pemasukan',$Branch->id)}}" class="adt-details">Details<i class="icon-details fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="cards bg-card p-3 h-630">
              <div class="row pd-text">
                <div class="col-12">
                  <span class="adt-text-anom">Pengeluaran False</span>
                </div>
              </div>
              <div class="scroll h-480" id="scroll-bar">
                <div class="row">
                  <div class="col-12">
                    @foreach($pengeluaranF7 as $key=>$value)
                    <div class="alerttt">
                      <a class="prc-modal" data-toggle="modal" data-target="#auditt{{$value['F564111H_UKID']}}" title="View Info"> 
                        <div class="prc-alert alert-merah">
                          <div class="adt-bg-kuning bg-kuning">
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <span class="prc-desc">
                                <div class="text-truncate">
                                  <b class="fw-600">No. Daftar : {{$value['F564111H_DSCP2']}} || User : {{$value['F4111_USER']}}</b>
                                  <div>{{$value['remark']}}</div>
                                </div>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="auditt{{$value['F564111H_UKID']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div class="adt-no-daftar-user">
                                  No. Daftar : {{$value['F564111H_DSCP2']}} || User : {{$value['F4111_USER']}}
                              </div>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-12">
                                  <table class="table table-bordered">
                                    <tr>
                                        <td width="50%" style="font-weight:600">Key</td>
                                        <td width="50%" style="font-weight:400">{{$value['F564111H_UKID']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Item Number</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_ITM']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Bussines Unit</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_MCU']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">DC TY</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_DCT']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-CLASS</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_GLPT']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">TR Date Ledger</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRDJ']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-Date Pemasukan</td>
                                        <td width="50%" style="font-weight:400">{{$value['F564111H_DGL']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Lot Num</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_LOTN']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Quantity</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRQT']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">UM</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRUM']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">No. Daftar</td>
                                        <td width="50%" style="font-weight:400">{{$value['F564111H_DSCP2']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Jenis Dokumen</td>
                                        <td width="50%" style="font-weight:400">{{$value['F564111H_DSC1']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">User</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_USER']}}</td>
                                    </tr>
                                  </table>
                                  <table class="table table-bordered">
                                    <tr>
                                        <td width="25%"></td>
                                        <td width="25%" style="font-weight:600">Ledger</td>
                                        <td width="25%" style="font-weight:600">Pengeluaran</td>
                                        <td width="25%" style="font-weight:600">Remark</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji Item</td>
                                        <td width="25%" style="font-weight:400">{{$value['F4111_ITM']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['F564111H_ITM']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_ITM']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji Qty</td>
                                        <td width="25%" style="font-weight:400">{{$value['F4111_TRQT']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['F564111H_TRQT']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_QTY']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji UOM</td>
                                        <td width="25%" style="font-weight:400">{{$value['F4111_TRUM']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['F564111H_TRUM']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_UOM']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji Unit</td>
                                        <td width="25%" style="font-weight:400">{{$value['F4111_MCU']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['F564111H_MCU']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_BRANCH']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" style="font-weight:600">Uji Tanggal Transaksi</td>
                                        <td width="25%" style="font-weight:400">OR DATE {{$value['F4111_TRDJ']}}</td>
                                        <td width="25%" style="font-weight:400">GL DATE {{$value['F564111H_DGL']}}</td>
                                        <td width="25%" style="font-weight:400">{{$value['Uji_TGL_Trans_GL']}}</td>
                                    </tr>
                                  </table>
                                  <table class="table table-bordered">
                                    <tr>
                                        <td width="50%" colspan="2" style="font-weight:600">Description</td>
                                        <td width="50%" colspan="2" style="font-weight:400">
                                          <span class="remark-nomatch">{{$value['remark']}}</span>
                                        </td>
                                    </tr>
                                  </table>
                                </div>  
                              </div>  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 justify">
                  <div class="count-anomali-found">
                    <span class="adt-count-merah">{{$jml_anomali['pengeluaran']}}</span>
                    <span>Anomali Found</span>
                  </div>
                  <a href="{{route('cc.icr.ledge-it.pengeluaran',$Branch->id)}}" class="adt-details">Details<i class="icon-details fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="cards bg-card p-3 h-630">
              <div class="row pd-text">
                <div class="col-12">
                  <span class="adt-text-anom">NA</span>
                </div>
              </div>
              <div class="scroll h-480" id="scroll-bar">
                <div class="row">
                  <div class="col-12">
                    @foreach($anomali_na7 as $key=>$value)
                    <div class="alerttt">
                      <a class="prc-modal" data-toggle="modal" data-target="#auditt3{{$value['F4111_UKID']}}" title="View Info"> 
                        <div class="prc-alert alert-merah">
                          <div class="adt-bg-biru bg-biru">
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <span class="prc-desc">
                                <div class="text-truncate">
                                  <b class="fw-600">No. Daftar : {{$value['F4111_UKID']}} || User : {{$value['F4111_USER']}}</b>
                                  <div>NA</div>
                                </div>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="auditt3{{$value['F4111_UKID']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div class="adt-no-daftar-user">
                                  No. Daftar : {{$value['F4111_UKID']}} || User : {{$value['F4111_USER']}}
                              </div>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-12">
                                  <table class="table table-bordered">
                                    <tr>
                                        <td width="50%" style="font-weight:600">Key</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_UKID']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Item Number</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_ITM']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Bussines Unit</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_MCU']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">DC TY</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_DCT']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">TR Date</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRDJ']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-Date</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_DGL']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Lot Num</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_LOTN']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Quantity</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRQT']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">UM</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_TRUM']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL Class</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_GLPT']}} </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">User</td>
                                        <td width="50%" style="font-weight:400">{{$value['F4111_USER']}} </td>
                                    </tr>
   
                                  </table>
                                </div>  
                              </div>  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 justify">
                  <div class="count-anomali-found">
                    <span class="adt-count-merah">{{$jml_anomali['na']}}</span>
                    <span>Anomali Found</span>
                  </div>
                  <a href="{{route('cc.icr.ledge-it.na',$Branch->id)}}" class="adt-details">Details<i class="icon-details fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <div class="adt-overall">Overall Statistic</div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="cards bg-card p-4 h-660">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="adt-title-overall py-3">Overall Anomali last 30 days</div>
                  <div class="adt-Dchart2">
                    <div class="adt-chart-container2">
                      <div id="adt-donutChart2"></div>
                    </div>
                    <div class="adt-anomali2">
                      <span class="anomali-count2">{{$jml_anomali['total']}}</span><br>
                      <span class="anomali2">Anomali</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-10 adt-border-donut ml-auto mr-auto">
                </div>
              </div>
              <div class="row">
                <div class="col-11 ml-auto mr-auto">
                  <table class="table-audit">
                    <tr>
                      <td width="60%">Pemasukan False</td>
                      <td width="40%">: {{$jml_anomali['pemasukan']}} Anomali</td>
                    </tr>
                    <tr>
                      <td width="60%">Pengeluaran False</td>
                      <td width="40%">: {{$jml_anomali['pengeluaran']}} Anomali</td>
                    </tr>
                    <tr>
                      <td width="60%">N/A</td>
                      <td width="40%">: {{$jml_anomali['na']}} Anomali</td>
                    </tr>
                  </table>
                  <div class="adt-tot-anomali">
                    Total Anomali {{$jml_anomali['total']}}
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

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 60000);
    })
</script>

<script>
  var donutChart1 = {
    series: <?php echo json_encode($jml_anomali['piechart']); ?>,
    chart: {
      type: 'donut',
    },
    colors: ['#FB5B5B', '#F8B82E', '#0D6EFD'],
    labels: ['Pemasukan False', 'Pengeluaran False','N/A'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
  };
  var chart = new ApexCharts(document.querySelector("#adt-donutChart2"), donutChart1);
  chart.render();
</script>

@endpush

