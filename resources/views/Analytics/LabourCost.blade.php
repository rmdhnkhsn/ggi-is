@extends("layouts.blank.app")
@section("title","Labour Cost Analytics")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content Analytics">
  <div class="header">
    <img src="{{url('images/icon/analytics/bg-header.svg')}}" class="BGHeader">
    <div class="contentHeader">
      <div class="subContent">
        <ul class="BreadCrumb">
        <li><a href="{{ url('/home')}}">Home</a></li> 
        <li><a href="{{ route('commandCenter2')}}">Command Center</a></li>
        </ul>
        <div class="name">Welcome, <span class="fw-500">Ramadhon Ikhsan Prasetya</span></div> 
        <div class="desc">Dashboard ini berisi data-data yang relevan mengenai laporan labour cost, Turn Over, Approval OT, Report Packing List, Daily output sewing, Ratio Mesin & On Time Supply, lihat detaillnya dibawah ini</div>
      </div>
      <img src="{{url('images/icon/analytics/icon-header.svg')}}" class="IconHeader">
    </div>
  </div>
  <div class="body">
    <ul class="nav nav-tabs round-tabs" role="tablist" id="scrollNone">
      <li class="nav-item-show">
        <a href="" class="nav-link <?php if($ActiveMenu=='Dashboard'){echo 'active';}?>"><i class="fa-solid fa-chart-line"></i>Dashboard</a>
      </li>
      <li class="nav-item-show">
        <a href="" class="nav-link <?php if($ActiveMenu=='LabourCost'){echo 'active';}?>"><i class="fa-solid fa-wallet"></i>Labour Cost</a>
      </li>
      <li class="nav-item-show">
        <a href="" class="nav-link <?php if($ActiveMenu=='TurnOver'){echo 'active';}?>"><i class="fa-solid fa-mobile-screen"></i>Turn Over</a>
      </li>
      <li class="nav-item-show">
        <a href="" class="nav-link <?php if($ActiveMenu=='ApprovalOT'){echo 'active';}?>"><i class="fa-solid fa-check-double"></i>Approval OT</a>
      </li>
      <li class="nav-item-show">
        <a href="" class="nav-link <?php if($ActiveMenu=='Profit'){echo 'active';}?>"><i class="fa-solid fa-money-bill-trend-up"></i>Profit & Lost</a>
      </li>
      <li class="nav-item-show">
        <a href="" class="nav-link <?php if($ActiveMenu=='DailySewing'){echo 'active';}?>"><i class="fa-solid fa-chart-simple"></i>Daily Sewing</a>
      </li>
      <li class="nav-item-show">
        <a href="" class="nav-link <?php if($ActiveMenu=='Ratio'){echo 'active';}?>"><i class="fa-solid fa-microchip"></i>Ratio Mesin</a>
      </li>
      <li class="nav-item-show">
        <a href="" class="nav-link <?php if($ActiveMenu=='onTime'){echo 'active';}?>"><i class="fa-solid fa-stopwatch"></i>onTime Supply</a>
      </li>
    </ul>
    <div class="bodyTabs">
      <div class="contents">
        <div class="row">
          <div class="col-lg-6">
            <div class="title-32-400 c-orange">Summary Overtime All Factory</div> 
            <div class="justify-start gap-6">
              <div class="title-16-400 c-grey2">Period : 21 December 2022 - 20 January 2023</div>
              <div class="dropdown">
                <button type="button" class="btn-icon-yellow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{url('images/icon/analytics/calendar-icon.svg')}}">
                </button>
                <div class="dropdown-menu ScrollMenu" id="scrollOrange">
                   <a href="" class="dropdown-item-orange no-wrap">21 December 2022 sd 20 January 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 January 2023 sd 20 February 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 February 2023 sd 20 March 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 March 2023 sd 20 April 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 April 2023 sd 20 May 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 May 2023 sd 20 June 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 June 2023 sd 20 July 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 July 2023 sd 20 August 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 August 2023 sd 20 September 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 September 2023 sd 20 October 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 October 2023 sd 20 November 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 November 2023 sd 20 Desember 2023</a>
                </div>
              </div> 
            </div>
            <div class="row SummaryPeriod" id="scrollNone">
              <div class="col-xl-4 col-md-6">
                <div class="cards-20 bg-orange p-3">
                  <div class="justify-start gap-3">
                    <div class="icons"><i class="fa-solid fa-file-lines"></i></div>
                    <div class="sub-title-14 c-white">All Factory</div>
                  </div>
                  <div class="title-14 c-white text-left">Rp. 310,158,152.93,-</div>
                  <div class="title-12 c-white text-left text-truncate">12/21/2022 - 01/20/2023</div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="cards-20 p-3">
                  <div class="justify-start gap-3">
                    <div class="icons"><i class="fa-regular fa-calendar-days"></i></div>
                    <div class="sub-title-14 c-orange">Week 1</div>
                  </div>
                  <div class="title-14 c-dark text-left">Rp. 66,232,209.44,-</div>
                  <div class="title-12 c-semi-dark text-left text-truncate">12/21/2022 - 12/25/2022</div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="cards-20 p-3">
                  <div class="justify-start gap-3">
                    <div class="icons"><i class="fa-regular fa-calendar-days"></i></div>
                    <div class="sub-title-14 c-orange">Week 2</div>
                  </div>
                  <div class="title-14 c-dark text-left">Rp. 54,853,556.31,-</div>
                  <div class="title-12 c-semi-dark text-left text-truncate">12/21/2022 - 12/25/2022</div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="cards-20 p-3">
                  <div class="justify-start gap-3">
                    <div class="icons"><i class="fa-regular fa-calendar-days"></i></div>
                    <div class="sub-title-14 c-orange">Week 3</div>
                  </div>
                  <div class="title-14 c-dark text-left">Rp. 72,978,225.89,-</div>
                  <div class="title-12 c-semi-dark text-left text-truncate">12/21/2022 - 12/25/2022</div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="cards-20 p-3">
                  <div class="justify-start gap-3">
                    <div class="icons"><i class="fa-regular fa-calendar-days"></i></div>
                    <div class="sub-title-14 c-orange">Week 4</div>
                  </div>
                  <div class="title-14 c-dark text-left">Rp. 88,578,579.27,-</div>
                  <div class="title-12 c-semi-dark text-left text-truncate">12/21/2022 - 12/25/2022</div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="cards-20 p-3">
                  <div class="justify-start gap-3">
                    <div class="icons"><i class="fa-regular fa-calendar-days"></i></div>
                    <div class="sub-title-14 c-orange">Week 5</div>
                  </div>
                  <div class="title-14 c-dark text-left">Rp. 27,515,582.02,-</div>
                  <div class="title-12 c-semi-dark text-left text-truncate">12/21/2022 - 12/25/2022</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="cards-20 p-4">
              <div class="justify-sb3">
                <div class="title-20-dark-blue2">Cost Overtime</div>
                <div class="title-14-dark">Periode : 21 Desember - 20 January 2023</div>
              </div>
              <div class="chart-container mt-3">
                <canvas id="barChart" style="height:255px"></canvas>
              </div>
            </div>
          </div>
          <div class="col-12 mt-2">
            @include('Analytics.components.LabourCost.carousel')
          </div>
          <div class="col-lg-7">
            <div class="cards-20 pd-DChart">
              <div class="row">
                <div class="col-12 mb-5">
                  <div class="titleChart">
                    <div class="title-18-dark">Analytics Overtime</div>
                    <div class="title-12-grey4">Period : 21 Dec 2022 - 20 Jan 2023</div>
                  </div>
                </div>
                <div class="col-xl-5">
                  <div class="containerChart">
                    <div class="textHour">
                      <div class="hourCount">100</div>
                      <div class="hour">Hour</div>
                    </div>
                    <canvas id="doughnutChart"></canvas>
                  </div>
                </div>
                <div class="col-xl-7">
                  <div class="LegendDChart">
                    <div class="justify-start gap-4 no-wrap">
                      <div class="circle bg-cln"></div>
                      <div class="title-14-dark4">Gistex Cileunyi</div>
                      <div class="title-14-darkblue">20%</div>
                      <div class="title-14-darkblue">(20 Hour)</div>
                    </div>
                    <div class="justify-start gap-4 no-wrap">
                      <div class="circle bg-mj1"></div>
                      <div class="title-14-dark4">Gistex Majalengka 1</div>
                      <div class="title-14-darkblue">20%</div>
                      <div class="title-14-darkblue">(20 Hour)</div>
                    </div>
                    <div class="justify-start gap-4 no-wrap">
                      <div class="circle bg-mj2"></div>
                      <div class="title-14-dark4">Gistex Majalengka 2</div>
                      <div class="title-14-darkblue">10%</div>
                      <div class="title-14-darkblue">(10 Hour)</div>
                    </div>
                    <div class="justify-start gap-4 no-wrap">
                      <div class="circle bg-chw"></div>
                      <div class="title-14-dark4">Chawan</div>
                      <div class="title-14-darkblue">10%</div>
                      <div class="title-14-darkblue">(10 Hour)</div>
                    </div>
                    <div class="justify-start gap-4 no-wrap">
                      <div class="circle bg-kbd"></div>
                      <div class="title-14-dark4">Kalibenda</div>
                      <div class="title-14-darkblue">10%</div>
                      <div class="title-14-darkblue">(10 Hour)</div>
                    </div>
                    <div class="justify-start gap-4 no-wrap">
                      <div class="circle bg-cnj"></div>
                      <div class="title-14-dark4">CNJ2</div>
                      <div class="title-14-darkblue">10%</div>
                      <div class="title-14-darkblue">(10 Hour)</div>
                    </div>
                    <div class="justify-start gap-4 no-wrap">
                      <div class="circle bg-cba"></div>
                      <div class="title-14-dark4">CBA</div>
                      <div class="title-14-darkblue">10%</div>
                      <div class="title-14-darkblue">(10 Hour)</div>
                    </div>
                    <div class="justify-start gap-4 no-wrap">
                      <div class="circle bg-kpy"></div>
                      <div class="title-14-dark4">Krapyak</div>
                      <div class="title-14-darkblue">10%</div>
                      <div class="title-14-darkblue">(10 Hour)</div>
                    </div>
                  </div>
                </div>
              </div>
              <img src="{{url('images/icon/analytics/mask-card.svg')}}" class="mask">
            </div>
          </div>
          <div class="col-lg-5">
            <div class="cards-part o-hidden">
              <div class="cards-head" style="padding:.8rem">
                <div class="justify-sb3">
                  <div class="title-20G c-orange">Approval Overtime</div>
                  <a href="" class="btn-yellow-md">See More <i class="fs-18 ml-2 fas fa-caret-right"></i></a>
                </div>
              </div>
              <div class="cards-body py-2 h-apporval">
                <div class="card-close-orange py-1 px-2 mb-2 mb-2">
                  <div class="txt-orange">Terdapat <span class="c-darkgrey fw-500">15 Pengajuan</span> Overtime Yang memerlukan tindakan</div> 
                  <button type="button" class="close-icon" data-effect="fadeOut"><i class="fa fa-times"></i></button>
                </div>
                <div class="cards-scroll scrollX pb-1" id="scrollOrange">
                  <table class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead3">
                        <th><div class="c-orange">NAMA</div></th>
                        <th><div class="c-orange">BAGIAN</div></th>
                        <th><div class="c-orange">PLAN AMOUNT</div></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="text-truncate" style="width:220px">
                            RAMADHON IKHSAN PRASETYA
                          </div>
                        </td>
                        <td>IT & DT</td>
                        <td>
                          <div class="justify-start gap-3">
                            <div class="c-lightgrey mr-1">Rp.</div>
                            5,070,017.35
                          </div>
                        </td> 
                      </tr>
                      <tr>
                        <td>
                          <div class="text-truncate" style="width:220px">
                            RAMADHON IKHSAN PRASETYA
                          </div>
                        </td>
                        <td>IT & DT</td>
                        <td>
                          <div class="justify-start gap-3">
                            <div class="c-lightgrey mr-1">Rp.</div>
                            8,070,017.35
                          </div>
                        </td> 
                      </tr>
                      <tr>
                        <td>
                          <div class="text-truncate" style="width:220px">
                            RAMADHON IKHSAN PRASETYA
                          </div>
                        </td>
                        <td>IT & DT</td>
                        <td>
                          <div class="justify-start gap-3">
                            <div class="c-lightgrey mr-1">Rp.</div>
                            5,070,017.35
                          </div>
                        </td> 
                      </tr>
                      <tr>
                        <td>
                          <div class="text-truncate" style="width:220px">
                            RAMADHON IKHSAN PRASETYA
                          </div>
                        </td>
                        <td>IT & DT</td>
                        <td>
                          <div class="justify-start gap-3">
                            <div class="c-lightgrey mr-1">Rp.</div>
                            8,070,017.35
                          </div>
                        </td> 
                      </tr>
                      <tr>
                        <td>
                          <div class="text-truncate" style="width:220px">
                            RAMADHON IKHSAN PRASETYA
                          </div>
                        </td>
                        <td>IT & DT</td>
                        <td>
                          <div class="justify-start gap-3">
                            <div class="c-lightgrey mr-1">Rp.</div>
                            5,070,017.35
                          </div>
                        </td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12 relative zIndex">
            <div class="title-32-400 c-orange">Overtime Recap</div> 
            <div class="justify-start gap-6">
              <div class="title-16-400 c-grey2">Period : 21 December 2022 - 20 January 2023</div>
              <div class="dropdown">
                <button type="button" class="btn-icon-yellow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{url('images/icon/analytics/calendar-icon.svg')}}">
                </button>
                <div class="dropdown-menu ScrollMenu" id="scrollOrange">
                   <a href="" class="dropdown-item-orange no-wrap">21 December 2022 sd 20 January 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 January 2023 sd 20 February 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 February 2023 sd 20 March 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 March 2023 sd 20 April 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 April 2023 sd 20 May 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 May 2023 sd 20 June 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 June 2023 sd 20 July 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 July 2023 sd 20 August 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 August 2023 sd 20 September 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 September 2023 sd 20 October 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 October 2023 sd 20 November 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 November 2023 sd 20 Desember 2023</a>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-12">
            <ul class="nav navOrange scrollX myTab mt-4" role="tablist" id="scrollNone">
              <li class="nav-item-show">
                <a class="nav-link active" data-toggle="tab" href="#recap_cln" role="tab"></i>Cileunyi</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#recap_mj1" role="tab"></i>Majalengka 1</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#recap_mj2" role="tab"></i>Majalengka 2</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#recap_kbd" role="tab"></i>Kalibenda</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#recap_cwn" role="tab"></i>Chawan</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#recap_cnj" role="tab"></i>CNJ2</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#recap_cba" role="tab"></i>CBA</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#recap_ang" role="tab"></i>Anugrah</a>
              </li>
            </ul>
            <div class="tab-content card-block">
              <div class="tab-pane active" id="recap_cln" role="tabpanel">
                @include('Analytics.components.LabourCost.recap.cileunyi')
              </div>
              <div class="tab-pane" id="recap_mj1" role="tabpanel">
                @include('Analytics.components.LabourCost.recap.majalengka1')
              </div>
              <div class="tab-pane" id="recap_mj2" role="tabpanel">
                @include('Analytics.components.LabourCost.recap.majalengka2')
              </div>
              <div class="tab-pane" id="recap_kbd" role="tabpanel">
                @include('Analytics.components.LabourCost.recap.kalibenda')
              </div>
              <div class="tab-pane" id="recap_cwn" role="tabpanel">
                @include('Analytics.components.LabourCost.recap.chawan')
              </div>
              <div class="tab-pane" id="recap_cnj" role="tabpanel">
                @include('Analytics.components.LabourCost.recap.cnj2')
              </div>
              <div class="tab-pane" id="recap_cba" role="tabpanel">
                @include('Analytics.components.LabourCost.recap.cba')
              </div>
              <div class="tab-pane" id="recap_ang" role="tabpanel">
                @include('Analytics.components.LabourCost.recap.anugrah')
              </div>
            </div>
            <img src="{{url('images/icon/analytics/icon-recap.svg')}}" class="icon-recap">
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12 relative zIndex">
            <div class="title-32-400 c-orange">Overtime Control</div> 
            <div class="justify-start gap-6">
              <div class="title-16-400 c-grey2">Period : 21 December 2022 - 20 January 2023</div>
              <div class="dropdown">
                <button type="button" class="btn-icon-yellow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{url('images/icon/analytics/calendar-icon.svg')}}">
                </button>
                <div class="dropdown-menu ScrollMenu" id="scrollOrange">
                   <a href="" class="dropdown-item-orange no-wrap">21 December 2022 sd 20 January 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 January 2023 sd 20 February 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 February 2023 sd 20 March 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 March 2023 sd 20 April 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 April 2023 sd 20 May 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 May 2023 sd 20 June 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 June 2023 sd 20 July 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 July 2023 sd 20 August 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 August 2023 sd 20 September 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 September 2023 sd 20 October 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 October 2023 sd 20 November 2023</a>
                   <a href="" class="dropdown-item-orange no-wrap">21 November 2023 sd 20 Desember 2023</a>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-12">
            <ul class="nav navOrange scrollX myTab mt-4" role="tablist" id="scrollNone">
              <li class="nav-item-show">
                <a class="nav-link active" data-toggle="tab" href="#control_cln" role="tab"></i>Cileunyi</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#control_mj1" role="tab"></i>Majalengka 1</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#control_mj2" role="tab"></i>Majalengka 2</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#control_kbd" role="tab"></i>Kalibenda</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#control_cwn" role="tab"></i>Chawan</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#control_cnj" role="tab"></i>CNJ2</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#control_cba" role="tab"></i>CBA</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#control_ang" role="tab"></i>Anugrah</a>
              </li>
            </ul>
            <div class="tab-content card-block">
              <div class="tab-pane active" id="control_cln" role="tabpanel">
                @include('Analytics.components.LabourCost.control.cileunyi')
              </div>
              <div class="tab-pane" id="control_mj1" role="tabpanel">
                @include('Analytics.components.LabourCost.control.majalengka1')
              </div>
              <div class="tab-pane" id="control_mj2" role="tabpanel">
                @include('Analytics.components.LabourCost.control.majalengka2')
              </div>
              <div class="tab-pane" id="control_kbd" role="tabpanel">
                @include('Analytics.components.LabourCost.control.kalibenda')
              </div>
              <div class="tab-pane" id="control_cwn" role="tabpanel">
                @include('Analytics.components.LabourCost.control.chawan')
              </div>
              <div class="tab-pane" id="control_cnj" role="tabpanel">
                @include('Analytics.components.LabourCost.control.cnj2')
              </div>
              <div class="tab-pane" id="control_cba" role="tabpanel">
                @include('Analytics.components.LabourCost.control.cba')
              </div>
              <div class="tab-pane" id="control_ang" role="tabpanel">
                @include('Analytics.components.LabourCost.control.anugrah')
              </div>
            </div>
            <img src="{{url('images/icon/analytics/icon-control.svg')}}" class="icon-control">
          </div>
        </div>
      </div>
      <div class="footers">
        <img src="{{url('images/icon/analytics/gistex.svg')}}" class="gistexImg">
        <div class="title-26 c-white">GISTEX COMMAND CENTER</div>
        <div class="containerLink">
          <a href="{{ url('/home')}}" class="footer-link">Dashboard</a>
          <a href="{{ route('commandCenter2')}}" class="footer-link">Command Center</a>
          <a href="#scrollUp" id="scrollUp" class="footer-link">Analytics</a>
        </div>
      </div>
      <img src="{{url('images/icon/analytics/eclipse-1.svg')}}" class="eclipse-1">
      <img src="{{url('images/icon/analytics/eclipse-2.svg')}}" class="eclipse-2">
      <img src="{{url('images/icon/analytics/eclipse-3.svg')}}" class="eclipse-3">
      <img src="{{url('images/icon/analytics/eclipse-4.svg')}}" class="eclipse-4">
      <img src="{{url('images/icon/analytics/eclipse-5.svg')}}" class="eclipse-5">
    </div>
  </div>
</section>

@endsection

@push("scripts")
<script>
  $(document).ready(function(){
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $(function () {
      $('[data-toggle="popover"]').popover()
    })

    $('.close-icon').on('click',function() {
      $(this).closest('.card-close-orange').fadeOut();
    })
  });

  var scrollUp = document.getElementById("scrollUp");
  var rootElement = document.documentElement;

  function scrollToTop() {
    rootElement.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }
  scrollUp.addEventListener("click", scrollToTop);
</script>
<script>
  $(document).ready(function(){
    addEventListener('scroll', function(){
      document.querySelector('.nav-tabs').style.boxShadow = document.documentElement.scrollTop > 180 ? '0px 4px 5px rgba(0, 0, 0, 0.08)' : 'none';
    });
  });

  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('.myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>

<script>
  var doughnutChart = document.getElementById('doughnutChart').getContext('2d');
  var myDoughnutChart = new Chart(doughnutChart, {
    type: 'doughnut',
    data: {
      labels: [ 'Cileunyi', 'Majalengka 1', 'Majalengka 2', 'Chawan', 'Kalibenda', 'CNJ2', 'CBA', 'Krapyak' ],
      datasets: [{
        data: [20, 20, 10, 10, 10, 10, 10, 10],
        backgroundColor: ['#0F9F6E', '#4083F8', '#FBCA15', '#FF5A20', '#E02423', '#FB15C8', '#7040F8', '#4412D0'],
        borderColor: ['#0F9F6E', '#4083F8', '#FBCA15', '#FF5A20', '#E02423', '#FB15C8', '#7040F8', '#4412D0'],
      }],
    },
    options: {
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            return data['labels'][tooltipItem['index']] + ' : ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
          }
        }
      },
      cutoutPercentage: 70,
      responsive: true, 
      maintainAspectRatio: false,
      legend : {
        display: false
      },
    }
  });
</script>
<script>
  var barChart = document.getElementById('barChart').getContext('2d');
  // var background_2 = barChart.createLinearGradient(0, 0, 0, 600);
  // background_2.addColorStop(0, '#FFAE00');
  // background_2.addColorStop(.5, '#ffffff');
      
  var mybarChart = new Chart(barChart, {
    type: 'bar',
    data: {
      labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5',],
      datasets : [{
        label: "Percentage",
        data:  [10000000, 8000000, 7000000, 5000000, 12000000],
        backgroundColor: [ 
          '#ffc955',
          '#ffc955',
          '#ffc955',
          '#ffc955',
          '#ffc955',
        ],
      }],
    },

    options: {
      tooltips: {
        enabled: true,
        mode: 'single',
        callbacks: {
          label: function(tooltipItem, data) {
            var allData = data.datasets[tooltipItem.datasetIndex].data;
            var tooltipLabel = data.labels[tooltipItem.index];
            var tooltipData = allData[tooltipItem.index];
            return "Cost" + " : " + " Rp. " + tooltipData + ",-";
          }
        }
      },
      responsive: true, 
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          ticks: {
            precision: 0,
            beginAtZero: true,
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
          }
        }]
      },
      legend: {
        display: false
      },
    }
  });

</script>

<script>
  $('#recipeCarousel').carousel({
    interval: 3500
  })

  $(document).ready( function () {
    const carouselcount = document.getElementsByClassName('carousel-item').length;
    $('.carousel .carousel-item').each(function(){
      if ( carouselcount < 6 ) {
          var minPerSlide = carouselcount - 2;
      } else {
          var minPerSlide = 4;
      }
      var next = $(this).next();
      if (!next.length) {
      next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      
      for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
      }
    });
  });
</script>
@endpush