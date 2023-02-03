@include('layouts.header')
@include('layouts.navbar2')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper f-poppins">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="content-header">
        <div class="card-navigate">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('commandCenter2') }}" class="title-navigate">ALL FACTORY</a></li>
              <li class="breadcrumb-item"><a href="{{ route('cc2.qc', $dataBranch['id']) }}" class="title-navigate">Quality Control</a></li>
              <li class="breadcrumb-item title-navigate-active" aria-current="page">Rework Line</li>
              <li class="navigate-active ml-rwk"></li>
            </ol>
          </nav>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content f-poppins">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-12">
            <span class="analytics">Lines</span>
          </div>
        </div>

        <div class="row">
          <a href="{{route('cc2.rework', $dataBranch->id)}}" class="col-xl-3 col-md-6">
            <div class="cards card-rework">
              <div class="row px-2">
                <div class="col-5">
                  <div class="row">
                    <div class="col-12">
                      <center>
                        @if($totalSemuaLine['p_total_reject'] == 0)
                        <div class="container-knob-rework">
                          <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['p_total_reject']}}" disabled>
                        </div>
                        @else
                        <div class="container-knob-rework">
                          <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['p_total_reject']}}" disabled>
                        </div>
                        @endif
                      </center>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <center>
                        <span class="rework-total">Rework Total</span>
                      </center>
                    </div>
                  </div>

                </div>
                <div class="col-7 card-reworkActive">
                  <div class="row">
                    <div class="col-10 border-bot ml-auto mr-auto pt-4">
                      <span class="branch-lines">All Line CLN</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-10 ml-auto mr-auto content-branch-lines">
                      <span>Production : {{$totalSemuaLine['total_check']}} Pcs</span><br>
                      <span>Target :  {{$target}} Pcs</span><br>
                      <span>Jumlah WO : {{$jum_wo}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>

          @foreach($mline as $ml)
          <a href="{{route('cc2.lines', $ml['id_line'])}}" class="col-xl-3 col-md-6">
            <div class="cards card-rework">
              @if($ml['terpenuhi'] == $ml['target_wo'])
              <span class="fulfilled"><span class="finish-text">Good</span></span>
              @else
              @endif
              <div class="row px-2">
                <div class="col-5">
                  <div class="row">
                    <div class="col-12">
                      <center>
                        @if($ml['p_reject'] < 5)
                        <div class="container-knob-rework">
                          <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$ml['p_reject']}}" disabled>
                        </div>
                        @elseif($ml['p_reject'] >= 5 && $ml['p_reject'] <= 10)
                        <div class="container-knob-rework">
                          <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$ml['p_reject']}}" disabled>
                        </div>
                        @elseif($ml['p_reject'] > 10 )
                        <div class="container-knob-rework">
                          <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$ml['p_reject']}}" disabled>
                        </div>
                        @endif
                      </center>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <center>
                        <span class="rework-total">Rework Total</span>
                      </center>
                    </div>
                  </div>

                </div>
                <div class="col-7">
                  <div class="row">
                    <div class="col-10 border-bot2 ml-auto mr-auto pt-4">
                      <span class="branch-lines2">{{$ml['line']}}</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-10 ml-auto mr-auto content-branch-lines2">
                      <span>Production : {{$ml['terpenuhi']}} Pcs</span><br>
                      <span>Target : {{$ml['target_wo']}} Pcs</span><br>
                      <span>Jumlah WO : {{$ml['jumlah_wo']}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>

        <div class="row">

          <div class="col-xl-5 col-md-6 col-sm-12">
            <div class="cards bg-card py-4 h-700L">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="py-4">
                    <span class="ALRework">All Line Rework & Finish good</span>
                  </div>
                  <div class="DRework">
                    <div class="chart-container">
                      <div id="ReworkDonut"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-7 border-donut ml-auto mr-auto">
                  <table class="table-rework">
                    <tr>
                      <td width="4%"></td>
                      <td width="52%">Total Production</td>
                      <td width="40%">: {{$totalSemuaLine['total_check']}} Pcs</td>
                      <td width="4%"></td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td width="52%">Target</td>
                      <td width="40%">: {{$target}} Pcs</td>
                      <td width="4%"></td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td width="52%">Finish Good</td>
                      <td width="40%">: {{$totalSemuaLine['fg']}} Pcs</td>
                      <td width="4%"></td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td width="52%">Rework</td>
                      <td width="40%">: {{$totalSemuaLine['total_reject']}} Pcs</td>
                      <td width="4%"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-7 col-md-6 col-sm-12">
            <div class="cards bg-card py-4 px-4 h-700I">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="py-4">
                    <span class="IRRework">Indikator Rework Line</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator">
                  <center>
                    @if($totalSemuaLine['tot_broken'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_broken']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_broken'] >= 5 && $totalSemuaLine['tot_broken'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_broken']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_broken'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_broken']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">BROKEN</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator">
                  <center>
                    @if($totalSemuaLine['tot_skip'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_skip']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_skip'] >= 5 && $totalSemuaLine['tot_skip'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_skip']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_skip'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_skip']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">SKIP</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator">
                  <center>
                    @if($totalSemuaLine['tot_pktw'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_pktw']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_pktw'] >= 5 && $totalSemuaLine['tot_pktw'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_pktw']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_pktw'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_pktw']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">PUCKERING</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator">
                  <center>
                    @if($totalSemuaLine['tot_crooked'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_crooked']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_crooked'] >= 5 && $totalSemuaLine['tot_crooked'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_crooked']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_crooked'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_crooked']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">CROOCKED</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator">
                  <center>
                    @if($totalSemuaLine['tot_pleated'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_pleated']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_pleated'] >= 5 && $totalSemuaLine['tot_pleated'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_pleated']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_pleated'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_pleated']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">PLEATED</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator">
                  <center>
                    @if($totalSemuaLine['tot_ros'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_ros']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_ros'] >= 5 && $totalSemuaLine['tot_ros'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_ros']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_ros'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_ros']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">R-O-S</label>
                    </center>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_htl'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_htl']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_htl'] >= 5 && $totalSemuaLine['tot_htl'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_htl']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_htl'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_htl']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">HTL/LABEL</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_button'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_button']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_button'] >= 5 && $totalSemuaLine['tot_button'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_button']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_button'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_button']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">BUTTON</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_print'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_print']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_print'] >= 5 && $totalSemuaLine['tot_print'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_print']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_print'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_print']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">PRINT</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_bs'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_bs']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_bs'] >= 5 && $totalSemuaLine['tot_bs'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_bs']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_bs'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_bs']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">BAD SHAPE</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_unb'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_unb']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_unb'] >= 5 && $totalSemuaLine['tot_unb'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_unb']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_unb'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_unb']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">UNB</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_shading'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_shading']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_shading'] >= 5 && $totalSemuaLine['tot_shading'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_shading']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_shading'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_shading']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">SHADING</label>
                    </center>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_dof'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_dof']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_dof'] >= 5 && $totalSemuaLine['tot_dof'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_dof']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_dof'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_dof']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">DOF</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_dirty'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_dirty']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_dirty'] >= 5 && $totalSemuaLine['tot_dirty'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_dirty']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_dirty'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_dirty']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">DIRTY,OIL</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_shiny'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_shiny']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_shiny'] >= 5 && $totalSemuaLine['tot_shiny'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_shiny']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_shiny'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_shiny']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">SHINY</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_sticker'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_sticker']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_sticker'] >= 5 && $totalSemuaLine['tot_sticker'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_sticker']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_sticker'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_sticker']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">STICKER</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_trimming'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_trimming']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_trimming'] >= 5 && $totalSemuaLine['tot_trimming'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_trimming']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_trimming'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_trimming']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">TRIMMING</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_ip'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_ip']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_ip'] >= 5 && $totalSemuaLine['tot_ip'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_ip']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_ip'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_ip']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">I-PROBLEM</label>
                    </center>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_meas'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_meas']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_meas'] >= 5 && $totalSemuaLine['tot_meas'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_meas']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_meas'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_meas']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">MEAS</label>
                    </center>
                  </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-4 responsive-indikator2">
                  <center>
                    @if($totalSemuaLine['tot_other'] < 5)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#0CAE63" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_other']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_other'] >= 5 && $totalSemuaLine['tot_other'] <= 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#fdbf39" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_other']}}" disabled>
                      </div>
                    @endif
                    @if($totalSemuaLine['tot_other'] > 10)
                      <div class="container-knob-indikator">
                        <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="100" data-thickness=".22" data-height="100" value="{{$totalSemuaLine['tot_other']}}" disabled>
                      </div>
                    @endif
                  </center>
                  <div class="container">
                    <center>
                      <label class="title-indikator">OTHER</label>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="cards bg-card p-4 h-370 scroll-y">
              <div class="row mb-4">
                <div class="col-12">
                  <span class="detail-lines">Detail Lines</span>
                </div>
              </div>
              <table class="table">
                <thead>
                  <tr>
                      <th class="no-wrap" width="15%">LINE</th>
                      <th class="no-wrap" width="15%">NO WO</th>
                      <th class="no-wrap" width="15%">TARGET</th>
                      <th class="no-wrap" width="10%">FULFILLED</th>
                      <th class="no-wrap" width="30%">PROGRESS</th>
                      <th class="no-wrap" width="15%">STATUS</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php $no = 1; ?>
                  @foreach($detailLine as $dt)
                  <tr>
                    <td class="no-wrap" width="15%">{{$dt['line']}}</td>
                    <td class="no-wrap" width="15%">{{$dt['no_wo']}}</td>
                    <td class="no-wrap" width="15%">{{$dt['target_wo']}}</td>
                    <td class="no-wrap" width="10%">{{$dt['terpenuhi']}}</td>
                    <td class="no-wrap" width="30%">
                      <body class="body-progress">
                        <div class="space"></div>
                        <div class="skill-bars">
                          <div class="bar">
                            <div class="progress-line">
                              @if($dt['progress'] == 100)
                                <span class="bar2" style="width: 100%;">
                                  <span class="percent-bar2">100 %</span>
                                </span>
                                @else
                                <span class="bar3" style="width: {{$dt['progress']}}%;">
                                  <span class="percent-bar3">{{$dt['progress']}} %</span>
                                </span>
                              @endif
                              
                            </div>
                          </div>
                        </div>
                      </body>
                    </td>
                    @if($dt['proses'] == 0)
                    <td class="no-wrap" width="15%"><span class="badge-status bg-notdone">Not Done</span></td>
                    @elseif($dt['proses'] == 1)
                    <td class="no-wrap" width="15%"><span class="badge-status bg-unfulfilled">Unfulfilled</span></td>
                    @elseif($dt['proses'] == 2)
                    <td class="no-wrap" width="15%"><span class="badge-status bg-fulfilled">Fulfilled</span></td>
                    @endif
                  </tr>
                  <?php $no++; ?>
                  @endforeach
                </tbody>

              </table>
            </div>
          </div>
        </div>



      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer')

<script>
  $(".dial").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('position', 'absolute').css('font-size', '8.85pt').css('font-weight', '500').css('font-family', 'poppins');
      $(this.i).val(this.cv + '%');


      // "tron" case
      if(this.$.data('skin') == 'tron') {

        this.cursorExt = 0.3;

        var a = this.arc(this.cv)  // Arc
            , pa                   // Previous arc
            , r = 1;

        this.g.lineWidth = this.lineWidth;

        if (this.o.displayPrevious) {
            pa = this.arc(this.v);
            this.g.beginPath();
            this.g.strokeStyle = this.pColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
            this.g.stroke();
        }

        this.g.beginPath();
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
        this.g.stroke();

        this.g.lineWidth = 1;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
        this.g.stroke();

        return false;
      }
    }
  });
</script>

<script>
  $(".dial-indikator").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('font-size', '8.85pt').css('font-weight', '500').css('font-family', 'poppins');
      $(this.i).val(this.cv + '%');


      // "tron" case
      if(this.$.data('skin') == 'tron') {

        this.cursorExt = 0.3;

        var a = this.arc(this.cv)  // Arc
            , pa                   // Previous arc
            , r = 1;

        this.g.lineWidth = this.lineWidth;

        if (this.o.displayPrevious) {
            pa = this.arc(this.v);
            this.g.beginPath();
            this.g.strokeStyle = this.pColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
            this.g.stroke();
        }

        this.g.beginPath();
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
        this.g.stroke();

        this.g.lineWidth = 1;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
        this.g.stroke();

        return false;
      }
    }
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 60000);
    })
</script>

<script>
  var DRework = {
    series: <?php echo json_encode($chart); ?>,
    chart: {
      type: 'donut',
    },
    colors: ['#007BFF', '#FB5B5B'],
    labels: ['Finish Good', 'Rework'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
  };

  var chart = new ApexCharts(document.querySelector("#ReworkDonut"), DRework);
  chart.render();
</script>
