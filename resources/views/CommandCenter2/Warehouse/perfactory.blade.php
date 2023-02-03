@extends("layouts.app")
@section("title","Perfactory")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
@endpush

@section("content")
<section class="content-header f-poppins">
      <div class="card-navigate">
        <!-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('commandCenter2') }}" class="title-navigate">ALL FACTORY</a></li>
            <li class="breadcrumb-item title-navigate-active" aria-current="page">Internal Audit</li>
          </ol>
        </nav> -->
      </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content f-poppins">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-xl-2 col-md-6 mb-4">
            <div class="adt-box">
              <div class="icon-box">
                <i class="fas fa-boxes"></i>
              </div>
              <span class="ledgerVS">Ledger Vs Inventory</span>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <div class="adt-anom-user">Anomali by User</div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-xl-3 col-md-6 col-sm-12 mb-adt">
            <div class="cards bg-card h-80">
              <div class="adt-kotak-anom">
                <div class="adt-count">50</div>
                <div class="adt-anom">Anomali</div>
              </div>
              <div class="adt-name-anom">
                SYIPA@MJL
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <div class="adt-anom-days">Anomali in the last 7 days</div>
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
                    <div class="alerttt">
                      <a class="prc-modal" data-toggle="modal" data-target="#auditt" title="View Info"> 
                        <div class="prc-alert alert-merah">
                          <div class="prc-bg-merah bg-merah">
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <span class="prc-desc">
                                <div class="text-truncate">
                                  <b class="fw-600">No. Daftar : 134519 || User : SYIPA@MJL</b>
                                  <div>NO MATCH Qty Branch TGL TRANSAKSI</div>
                                </div>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="auditt" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div class="adt-no-daftar-user">
                                  No. Daftar : 134519 || User : Wati
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
                                        <td width="50%" style="font-weight:400">13448888</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Item Number</td>
                                        <td width="50%" style="font-weight:400">12345678</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Bussines Unit</td>
                                        <td width="50%" style="font-weight:400">1201</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">DC TY</td>
                                        <td width="50%" style="font-weight:400">OV</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-CLASS</td>
                                        <td width="50%" style="font-weight:400">INFA</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">TR Date Ledger</td>
                                        <td width="50%" style="font-weight:400">2022-01-12</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-Date Pemasukan</td>
                                        <td width="50%" style="font-weight:400">2022-01-14</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Lot Num</td>
                                        <td width="50%" style="font-weight:400">27/22/00863/21003597/21005764</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Quantity</td>
                                        <td width="50%" style="font-weight:400">358</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">UM</td>
                                        <td width="50%" style="font-weight:400">MT</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">No. Daftar</td>
                                        <td width="50%" style="font-weight:400">863</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Jenis Dokumen</td>
                                        <td width="50%" style="font-weight:400">BC.27 Masuk</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">User</td>
                                        <td width="50%" style="font-weight:400">Wati</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji Item</td>
                                        <td width="50%" style="font-weight:400">True</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji Qty</td>
                                        <td width="50%" style="font-weight:400">True</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji UOM</td>
                                        <td width="50%" style="font-weight:400">True</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji Unit</td>
                                        <td width="50%" style="font-weight:400">True</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji Tanggal Transaksi</td>
                                        <td width="50%" style="font-weight:400">False</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Remark</td>
                                        <td width="50%" style="font-weight:400">
                                          <span class="remark-nomatch">No Match Tanggal Transaksi</span>
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
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 justify">
                  <div class="count-anomali-found">
                    <span class="adt-count-merah">4</span>
                    <span>Anomali Found</span>
                  </div>
                  <a href="{{ route('cwarehouse.perfactory.detail')}}" class="adt-details">Details<i class="icon-details fas fa-arrow-right"></i></a>
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
                    <div class="alerttt">
                      <a class="prc-modal" data-toggle="modal" data-target="#auditt" title="View Info"> 
                        <div class="prc-alert alert-merah">
                          <div class="adt-bg-kuning bg-kuning">
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <span class="prc-desc">
                                <div class="text-truncate">
                                  <b class="fw-600">No. Daftar : 134519 || User : SYIPA@MJL</b>
                                  <div>NO MATCH Qty Branch TGL TRANSAKSI</div>
                                </div>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="auditt" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div class="adt-no-daftar-user">
                                  No. Daftar : 134519 || User : Wati
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
                                        <td width="50%" style="font-weight:400">13448888</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Item Number</td>
                                        <td width="50%" style="font-weight:400">12345678</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Bussines Unit</td>
                                        <td width="50%" style="font-weight:400">1201</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">DC TY</td>
                                        <td width="50%" style="font-weight:400">OV</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-CLASS</td>
                                        <td width="50%" style="font-weight:400">INFA</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">TR Date Ledger</td>
                                        <td width="50%" style="font-weight:400">2022-01-12</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-Date Pemasukan</td>
                                        <td width="50%" style="font-weight:400">2022-01-14</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Lot Num</td>
                                        <td width="50%" style="font-weight:400">27/22/00863/21003597/21005764</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Quantity</td>
                                        <td width="50%" style="font-weight:400">358</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">UM</td>
                                        <td width="50%" style="font-weight:400">MT</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">No. Daftar</td>
                                        <td width="50%" style="font-weight:400">863</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Jenis Dokumen</td>
                                        <td width="50%" style="font-weight:400">BC.27 Masuk</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">User</td>
                                        <td width="50%" style="font-weight:400">Wati</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji Item</td>
                                        <td width="50%" style="font-weight:400">True</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji Qty</td>
                                        <td width="50%" style="font-weight:400">True</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji UOM</td>
                                        <td width="50%" style="font-weight:400">True</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji Unit</td>
                                        <td width="50%" style="font-weight:400">True</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Uji Tanggal Transaksi</td>
                                        <td width="50%" style="font-weight:400">False</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Remark</td>
                                        <td width="50%" style="font-weight:400">
                                          <span class="remark-nomatch">No Match Tanggal Transaksi</span>
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
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 justify">
                  <div class="count-anomali-found">
                    <span class="adt-count-merah">50</span>
                    <span>Anomali Found</span>
                  </div>
                  <a href="" class="adt-details">Details<i class="icon-details fas fa-arrow-right"></i></a>
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
                    <div class="alerttt">
                      <a class="prc-modal" data-toggle="modal" data-target="#auditt3" title="View Info"> 
                        <div class="prc-alert alert-merah">
                          <div class="adt-bg-biru bg-biru">
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <span class="prc-desc">
                                <div class="text-truncate">
                                  <b class="fw-600">No. Daftar : 134519 || User : RISNAWATI</b>
                                  <div>NA</div>
                                </div>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="auditt3" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div class="adt-no-daftar-user">
                                  No. Daftar : 134519 || User : Risnawati
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
                                        <td width="50%" style="font-weight:400">13448888</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Item Number</td>
                                        <td width="50%" style="font-weight:400">12345678</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Bussines Unit</td>
                                        <td width="50%" style="font-weight:400">1201</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">DC TY</td>
                                        <td width="50%" style="font-weight:400">OV</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">TR Date Ledger</td>
                                        <td width="50%" style="font-weight:400">2022-01-12</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL-Date Pemasukan</td>
                                        <td width="50%" style="font-weight:400">2022-01-14</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Lot Num</td>
                                        <td width="50%" style="font-weight:400">27/22/00863/21003597/21005764</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">Quantity</td>
                                        <td width="50%" style="font-weight:400">358</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">UM</td>
                                        <td width="50%" style="font-weight:400">PC</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">GL Class</td>
                                        <td width="50%" style="font-weight:400">INFA</td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="font-weight:600">User</td>
                                        <td width="50%" style="font-weight:400">Siti QC</td>
                                    </tr>
   
                                  </table>
                                </div>  
                              </div>  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 justify">
                  <div class="count-anomali-found">
                    <span class="adt-count-merah">1.500</span>
                    <span>Anomali Found</span>
                  </div>
                  <a href="" class="adt-details">Details<i class="icon-details fas fa-arrow-right"></i></a>
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
                  <div class="adt-title-overall py-3">Overall Total Anomali February 2021</div>
                  <div class="adt-Dchart2">
                    <div class="adt-chart-container2">
                      <div id="adt-donutChart2"></div>
                    </div>
                    <div class="adt-anomali2">
                      <span class="anomali-count2">2.000</span><br>
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
                      <td width="40%">: 300 Anomali</td>
                    </tr>
                    <tr>
                      <td width="60%">Pengeluaran False</td>
                      <td width="40%">: 100 Anomali</td>
                    </tr>
                    <tr>
                      <td width="60%">N/A</td>
                      <td width="40%">: 500 Anomali</td>
                    </tr>
                  </table>
                  <div class="adt-tot-anomali">
                    Total Anomali 900
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
    series: [10, 40, 50],
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