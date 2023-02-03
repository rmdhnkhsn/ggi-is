@extends("layouts.app")
@section("title","Hourly")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@push("sidebar")
  @include('production.operatorperformance.hourly.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row hourly">
      <div class="col-12 mb-3">
        <div class="title-32">Today Issue</div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_1.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Downtime Machine</div>
              <div class="sub-judul">Mesin Rusak</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              @if($operator_performance->where('t_downtime','>',0) != null)
              <i class="infoDanger infoo fas fa-exclamation-triangle"></i>
              @endif
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            @if($operator_performance->where('t_downtime','>',0) == null)
              <div class="justify-start" style="gap:1.4rem">
                <img src="{{url('images/iconpack/production/no_issue.svg')}}" class="iconIssue">
                <div class="noIssue">No Issue</div>
              </div>
            @else
              @php
                $i=1;
              @endphp
              @foreach($operator_performance->where('t_downtime','>',0)->sortByDesc('TotalTimeDowntime')->take(5) as $d)
                <li class="listGroup2 hoverLB" id="">
                  <table>
                    <tr>
                      <td width="60px">
                        <div class="number">{{$i}}</div>
                      </td>
                      <td>
                        <div class="descName">
                          <div class="judul1">Nama</div>
                          <div class="judul2 text-truncate">{{$d->nama}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Factory</div>
                          <div class="judul2">{{$d->fasilitas}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:110px">
                          <div class="judul1">Line</div>
                          <div class="judul2">{{$d->line}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:130px">
                          <div class="judul1 text-truncate">Elapsed Time</div>
                          <div class="judul2">{{$d->TotalTimeDowntime}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Count</div>
                          <div class="judul2">{{$d->t_downtime}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descProcess">
                          <div class="judul1">Process</div>
                          <div class="judul2 text-truncate">{{$d->proses}}</div>
                        </div>
                      </td>
                      <td class="detailModal">
                        <div class="listDetail">
                          <div class="descName2">
                            <div class="judul1">Nama</div>
                            <div class="judul2 text-truncate">{{$d->nama}}</div>
                          </div>
                          <a href="" data-toggle="modal" data-target="#detailsDowntime-{{$d->nokartu}}-{{$d->no_proses}}"><i class="fas fa-info"></i></a>
                          @include('production.operatorperformance.hourly.partials.detail')
                        </div>
                      </td>
                    </tr>
                  </table>
                </li>
                @php
                  $i+=1;
                @endphp
              @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_2.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Lost Time</div>
              <div class="sub-judul">Keperluan Pribadi</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              @if($operator_performance->where('t_lost','>',0) != null)
              <i class="infoDanger infoo fas fa-exclamation-triangle"></i>
              @endif
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            @if($operator_performance->where('t_lost','>',0) == null)
              <div class="justify-start" style="gap:1.4rem">
                <img src="{{url('images/iconpack/production/no_issue.svg')}}" class="iconIssue">
                <div class="noIssue">No Issue</div>
              </div>
            @else
              @php
                $i=1;
              @endphp
              @foreach($operator_performance->where('t_lost','>',0)->sortByDesc('TotalLosttime')->take(5) as $d)
                <li class="listGroup2 hoverLB" id="">
                  <table>
                    <tr>
                      <td width="60px">
                        <div class="number">{{$i}}</div>
                      </td>
                      <td>
                        <div class="descName">
                          <div class="judul1">Nama</div>
                          <div class="judul2 text-truncate">{{$d->nama}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Factory</div>
                          <div class="judul2">{{$d->fasilitas}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:110px">
                          <div class="judul1">Line</div>
                          <div class="judul2">{{$d->line}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:130px">
                          <div class="judul1 text-truncate">Elapsed Time</div>
                          <div class="judul2">{{$d->TotalLosttime}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Count</div>
                          <div class="judul2">{{$d->t_lost}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descProcess">
                          <div class="judul1">Process</div>
                          <div class="judul2 text-truncate">{{$d->proses}}</div>
                        </div>
                      </td>
                      <td class="detailModal">
                        <div class="listDetail">
                          <div class="descName2">
                            <div class="judul1">Nama</div>
                            <div class="judul2 text-truncate">{{$d->nama}}</div>
                          </div>
                          <a href="" data-toggle="modal" data-target="#detailsLost-{{$d->nokartu}}-{{$d->no_proses}}"><i class="fas fa-info"></i></a>
                          @include('production.operatorperformance.hourly.partials.detail')
                        </div>
                      </td>
                    </tr>
                  </table>
                </li>
                @php
                  $i+=1;
                @endphp
              @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_3.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Overload</div>
              <div class="sub-judul">Kelebihan WIP</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              @if($operator_performance->where('t_overload','>',0) != null)
              <i class="infoDanger infoo fas fa-exclamation-triangle"></i>
              @endif
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            @if($operator_performance->where('t_overload','>',0) == null)
              <div class="justify-start" style="gap:1.4rem">
                <img src="{{url('images/iconpack/production/no_issue.svg')}}" class="iconIssue">
                <div class="noIssue">No Issue</div>
              </div>
            @else
              @php
                $i=1;
              @endphp
              @foreach($operator_performance->where('t_overload','>',0)->sortByDesc('TotalOverload')->take(5) as $d)
                <li class="listGroup2 hoverLB" id="">
                  <table>
                    <tr>
                      <td width="60px">
                        <div class="number">{{$i}}</div>
                      </td>
                      <td>
                        <div class="descName">
                          <div class="judul1">Nama</div>
                          <div class="judul2 text-truncate">{{$d->nama}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Factory</div>
                          <div class="judul2">{{$d->fasilitas}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:110px">
                          <div class="judul1">Line</div>
                          <div class="judul2">{{$d->line}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:130px">
                          <div class="judul1 text-truncate">Elapsed Time</div>
                          @if($d->TotalOverload != null)
                          <div class="judul2">{{$d->TotalOverload}}</div>
                          @else
                          <div class="judul2">00:00:00</div>
                          @endif
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Count</div>
                          <div class="judul2">{{$d->t_overload}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descProcess">
                          <div class="judul1">Process</div>
                          <div class="judul2 text-truncate">{{$d->proses}}</div>
                        </div>
                      </td>
                      <td class="detailModal">
                        <div class="listDetail">
                          <div class="descName2">
                            <div class="judul1">Nama</div>
                            <div class="judul2 text-truncate">{{$d->nama}}</div>
                          </div>
                          <a href="" data-toggle="modal" data-target="#detailsOverload-{{$d->nokartu}}-{{$d->no_proses}}"><i class="fas fa-info"></i></a>
                          @include('production.operatorperformance.hourly.partials.detail')
                        </div>
                      </td>
                    </tr>
                  </table>
                </li>
                @php
                  $i+=1;
                @endphp
              @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_4.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Bantuan Teknis</div>
              <div class="sub-judul">Operator Coaching</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              @if($operator_performance->where('t_coach','>',0) != null)
              <i class="infoDanger infoo fas fa-exclamation-triangle"></i>
              @endif
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            @if($operator_performance->where('t_coach','>',0) == null)
              <div class="justify-start" style="gap:1.4rem">
                <img src="{{url('images/iconpack/production/no_issue.svg')}}" class="iconIssue">
                <div class="noIssue">No Issue</div>
              </div>
            @else
              @php
                $i=1;
              @endphp
              @foreach($operator_performance->where('t_coach','>',0)->sortByDesc('TotalCoaching')->take(5) as $d)
                <li class="listGroup2 hoverLB" id="">
                  <table>
                    <tr>
                      <td width="60px">
                        <div class="number">{{$i}}</div>
                      </td>
                      <td>
                        <div class="descName">
                          <div class="judul1">Nama</div>
                          <div class="judul2 text-truncate">{{$d->nama}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Factory</div>
                          <div class="judul2">{{$d->fasilitas}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:110px">
                          <div class="judul1">Line</div>
                          <div class="judul2">{{$d->line}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:130px">
                          <div class="judul1 text-truncate">Elapsed Time</div>
                          @if($d->TotalCoaching != null)
                          <div class="judul2">{{$d->TotalCoaching}}</div>
                          @else
                          <div class="judul2">00:00:00</div>
                          @endif
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Count</div>
                          <div class="judul2">{{$d->t_coach}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descProcess">
                          <div class="judul1">Process</div>
                          <div class="judul2 text-truncate">{{$d->proses}}</div>
                        </div>
                      </td>
                      <td class="detailModal">
                        <div class="listDetail">
                          <div class="descName2">
                            <div class="judul1">Nama</div>
                            <div class="judul2 text-truncate">{{$d->nama}}</div>
                          </div>
                          <a href="" data-toggle="modal" data-target="#detailsBantuan-{{$d->nokartu}}-{{$d->no_proses}}"><i class="fas fa-info"></i></a>
                          @include('production.operatorperformance.hourly.partials.detail')
                        </div>
                      </td>
                    </tr>
                  </table>
                </li>
                @php
                  $i+=1;
                @endphp
              @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_5.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Supply Problem</div>
              <div class="sub-judul">Supply Problem</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              @if($operator_performance->where('t_problem','>',0) != null)
              <i class="infoDanger infoo fas fa-exclamation-triangle"></i>
              @endif
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            @if($operator_performance->where('t_problem','>',0) == null)
              <div class="justify-start" style="gap:1.4rem">
                <img src="{{url('images/iconpack/production/no_issue.svg')}}" class="iconIssue">
                <div class="noIssue">No Issue</div>
              </div>
            @else
              @php
                $i=1;
              @endphp
              @foreach($operator_performance->where('t_problem','>',0)->sortByDesc('TotalSupply')->take(5) as $d)
                <li class="listGroup2 hoverLB" id="">
                  <table>
                    <tr>
                      <td width="60px">
                        <div class="number">{{$i}}</div>
                      </td>
                      <td>
                        <div class="descName">
                          <div class="judul1">Nama</div>
                          <div class="judul2 text-truncate">{{$d->nama}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Factory</div>
                          <div class="judul2">{{$d->fasilitas}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:110px">
                          <div class="judul1">Line</div>
                          <div class="judul2">{{$d->line}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:130px">
                          <div class="judul1 text-truncate">Elapsed Time</div>
                          @if($d->TotalSupply != null)
                          <div class="judul2">{{$d->TotalSupply}}</div>
                          @else
                          <div class="judul2">00:00:00</div>
                          @endif
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Count</div>
                          <div class="judul2">{{$d->t_problem}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descProcess">
                          <div class="judul1">Process</div>
                          <div class="judul2 text-truncate">{{$d->proses}}</div>
                        </div>
                      </td>
                      <td class="detailModal">
                        <div class="listDetail">
                          <div class="descName2">
                            <div class="judul1">Nama</div>
                            <div class="judul2 text-truncate">{{$d->nama}}</div>
                          </div>
                          <a href="" data-toggle="modal" data-target="#detailsSupply-{{$d->nokartu}}-{{$d->no_proses}}"><i class="fas fa-info"></i></a>
                          @include('production.operatorperformance.hourly.partials.detail')
                        </div>
                      </td>
                    </tr>
                  </table>
                </li>
                @php
                  $i+=1;
                @endphp
              @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_6.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Rework</div>
              <div class="sub-judul">Perbaikan</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              @if($operator_performance->where('t_rework','>',0) != null)
              <i class="infoDanger infoo fas fa-exclamation-triangle"></i>
              @endif
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            @if($operator_performance->where('t_rework','>',0) == null)
              <div class="justify-start" style="gap:1.4rem">
                <img src="{{url('images/iconpack/production/no_issue.svg')}}" class="iconIssue">
                <div class="noIssue">No Issue</div>
              </div>
            @else
              @php
                $i=1;
              @endphp
              @foreach($operator_performance->where('t_rework','>',0)->sortByDesc('TotalPerbaikan')->take(5) as $d)
                <li class="listGroup2 hoverLB" id="">
                  <table>
                    <tr>
                      <td width="60px">
                        <div class="number">{{$i}}</div>
                      </td>
                      <td>
                        <div class="descName">
                          <div class="judul1">Nama</div>
                          <div class="judul2 text-truncate">{{$d->nama}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Factory</div>
                          <div class="judul2">{{$d->fasilitas}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:110px">
                          <div class="judul1">Line</div>
                          <div class="judul2">{{$d->line}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:130px">
                          <div class="judul1 text-truncate">Elapsed Time</div>
                          @if($d->TotalPerbaikan != null)
                          <div class="judul2">{{$d->TotalPerbaikan}}</div>
                          @else
                          <div class="judul2">00:00:00</div>
                          @endif
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Count</div>
                          <div class="judul2">{{$d->t_rework}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descProcess">
                          <div class="judul1">Process</div>
                          <div class="judul2 text-truncate">{{$d->proses}}</div>
                        </div>
                      </td>
                      <td class="detailModal">
                        <div class="listDetail">
                          <div class="descName2">
                            <div class="judul1">Nama</div>
                            <div class="judul2 text-truncate">{{$d->nama}}</div>
                          </div>
                          <a href="" data-toggle="modal" data-target="#detailsRework-{{$d->nokartu}}-{{$d->no_proses}}"><i class="fas fa-info"></i></a>
                          @include('production.operatorperformance.hourly.partials.detail')
                        </div>
                      </td>
                    </tr>
                  </table>
                </li>
                @php
                  $i+=1;
                @endphp
              @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_7.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Change Layout</div>
              <div class="sub-judul">Perubahan Layout</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              @if($operator_performance->where('t_change','>',0) != null)
              <i class="infoDanger infoo fas fa-exclamation-triangle"></i>
              @endif
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            @if($operator_performance->where('t_change','>',0) == null)
            <div class="justify-start" style="gap:1rem">
              <img src="{{url('images/iconpack/production/no_issue.svg')}}">
              <div class="noIssue">No Issue</div>
            </div>
            @else
              @php
                $i=1;
              @endphp
              @foreach($operator_performance->where('t_change','>',0)->sortByDesc('TotalLayout')->take(5) as $d)
                <li class="listGroup2 hoverLB" id="">
                  <table>
                    <tr>
                      <td width="60px">
                        <div class="number">{{$i}}</div>
                      </td>
                      <td>
                        <div class="descName">
                          <div class="judul1">Nama</div>
                          <div class="judul2 text-truncate">{{$d->nama}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Factory</div>
                          <div class="judul2">{{$d->fasilitas}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:110px">
                          <div class="judul1">Line</div>
                          <div class="judul2">{{$d->line}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList" style="width:130px">
                          <div class="judul1 text-truncate">Elapsed Time</div>
                          @if($d->TotalLayout != null)
                          <div class="judul2">{{$d->TotalLayout}}</div>
                          @else
                          <div class="judul2">00:00:00</div>
                          @endif
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descList">
                          <div class="judul1">Count</div>
                          <div class="judul2">{{$d->t_change}}</div>
                        </div>
                      </td>
                      <td class="hidden">
                        <div class="descProcess">
                          <div class="judul1">Process</div>
                          <div class="judul2 text-truncate">{{$d->proses}}</div>
                        </div>
                      </td>
                      <td class="detailModal">
                        <div class="listDetail">
                          <div class="descName2">
                            <div class="judul1">Nama</div>
                            <div class="judul2 text-truncate">{{$d->nama}}</div>
                          </div>
                          <a href="" data-toggle="modal" data-target="#detailsLayout-{{$d->nokartu}}-{{$d->no_proses}}"><i class="fas fa-info"></i></a>
                          @include('production.operatorperformance.hourly.partials.detail')
                        </div>
                      </td>
                    </tr>
                  </table>
                </li>
                @php
                  $i+=1;
                @endphp
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection

@push("scripts")
<script>
  const accordionItems = document.querySelectorAll('.accordionItem2')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeader2')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContent2')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>

@endpush