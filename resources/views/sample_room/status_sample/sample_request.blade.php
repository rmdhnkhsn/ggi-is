@extends("layouts.app")
@section("title","Sample Request")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
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
      <a href="{{ route('sample-request') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Sample Request</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-scheduling') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-calendar-alt"></i>
            </div>
            <div class="col-12">
              <div class="desc">Scheduling</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-dashboard') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-chart-pie"></i>
            </div>
            <div class="col-12">
              <div class="desc">Dashboard</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-user') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-users"></i>
            </div>
            <div class="col-12">
              <div class="desc">Sample User</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-4">
      <div class="col-lg-8">
          <div class="cards-18 p-4" style="min-height:895px">
            <ul class="nav nav-tabs sr-md-tabs mb-4" role="tablist">
                <li class="nav-item-show">
                    <a class="nav-link relative active" data-toggle="tab" href="#request" role="tab"></i>
                        <i class="icon-tabs1 fas fa-eject"></i>
                        <div class="f-14">Request</div>
                        <span class="tabs-badge">{{ $requestSample }}</span>
                    </a>
                    <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#pattern" role="tab"></i>
                        <i class="fs-28 fas fa-pencil-ruler"></i>
                        <div class="f-14">Pattern</div>
                        <span class="tabs-badge">{{ $pattern }}</span>
                    </a>
                    <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#dev" role="tab"></i>
                        <i class="fs-28 fas fa-code"></i>
                        <div class="f-14">Development</div>
                        <span class="tabs-badge">{{ $dev }}</span>
                    </a>
                    <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#cutting" role="tab"></i>
                        <i class="fs-28 fas fa-cut"></i>
                        <div class="f-14">Cutting</div>
                        <span class="tabs-badge">{{ $cutting }}</span>
                    </a>
                    <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#sewing" role="tab"></i>
                        <i class="fs-28 fas fa-tshirt"></i>
                        <div class="f-14">Sewing</div>
                        <span class="tabs-badge">{{ $sewing }}</span>
                    </a>
                    <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#cancel" role="tab"></i>
                        <i class="fs-28 fas fa-eject"></i>
                        <div class="f-14">Cancel</div>
                        <span class="tabs-badge">{{ $cancle }}</span>
                    </a>
                    <div class="sr-slide"></div>
                </li>
            </ul>
              <div class="tab-content card-block">
                <div class="tab-pane active" id="request" role="tabpanel">
                  @include('sample_room.status_sample.partials.sample_request.request')
                </div>
                <div class="tab-pane" id="pattern" role="tabpanel">
                  @include('sample_room.status_sample.partials.sample_request.pattern')
                </div>
                <div class="tab-pane" id="dev" role="tabpanel">
                  @include('sample_room.status_sample.partials.sample_request.development')
                </div>
                <div class="tab-pane" id="cutting" role="tabpanel">
                  @include('sample_room.status_sample.partials.sample_request.cutting')
                </div>
                <div class="tab-pane" id="sewing" role="tabpanel">
                  @include('sample_room.status_sample.partials.sample_request.sewing')
                </div>
                <div class="tab-pane" id="cancel" role="tabpanel">
                  @include('sample_room.status_sample.partials.sample_request.cancel')
                </div>
              </div>
          </div>
      </div>
      <div class="col-lg-4 sr-notification">
        <div class="cards-18 p-3" style="height:895px">
          <div class="row mb-4">
            <div class="col-4">
              <div class="color-card bg-biru">
                <div class="icons"><i class="rotate180 c-biru fas fa-eject"></i></div>
                <div class="jumlah">{{ $request }}</div>
                <div class="request">Request</div>
                <div class="desc">Project In</div>
              </div>
            </div>
            <div class="col-4">
              <div class="color-card bg-kuning">
                <div class="icons"><i class="c-kuning fas fa-clipboard-check"></i></div>
                <div class="jumlah">{{ $Finish }}</div>
                <div class="request">Request</div>
                <div class="desc">done</div>
              </div>
            </div>
            <div class="col-4">
              <div class="color-card bg-red">
                <div class="icons"><i class="c-red fas fa-eject"></i></div>
                <div class="jumlah">{{ $Cancel }}</div>
                <div class="request">Request</div>
                <div class="desc">cancel</div>
              </div>
            </div>
            <div class="col-12">
              <div class="wp">
                <div class="wp-desc">Sample Request WP</div>
                <div class="wp-count">{{ $sampleRequestWP }}</div>
              </div>
            </div>
            <div class="col-12 mb-4">
              <div class="title-16">Due Soon</div>
              <div class="cards-scroll pr-1 mt-1 scroll-Y" id="scroll-bar" style="max-height:265px">
                @foreach ($dataNotifDueSonn as $key => $value)
                <div class="due-soon">
                  <div class="due-icon"><i class="fas fa-calendar-alt"></i></div>
                  <div class="due-desc">
                    <div class="due-title text-truncate">{{ $value['buyer'] }} - {{ $value['style'] }}</div>
                    @if (($value['tanggal'] < '7'))
                    <div class="due-number text-truncate">{{ $value['sample_code'] }} - <span class="txt-failed">{{ $value['tanggal'] }}</span> </div>
                    @else
                    <div class="due-number text-truncate">{{ $value['sample_code'] }} - {{ $value['tanggal'] }}</div>
                    @endif
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="col-12">
              <div class="title-16">Notification</div>
              <div class="cards-scroll pr-1 mt-1 scroll-Y" id="scroll-bar" style="max-height:265px">
                @foreach ($dataNotif as $key => $value)
                <div class="notification">
                  <div class="notification-icon"><i class="fas fa-bell"></i></div>
                  <div class="notification-desc">
                    @if (($value['result'] == 'CANCEL'))
                      <div class="notification-title"><span class="txt-fail">{{ $value['result'] }}</span> Sample Request</div> 
                      <div class="notification-number text-truncate">{{ $value['buyer'] }} - {{ $value['style'] }}</div>
                    @elseif(($value['result'] == 'WIP'))
                      <div class="notification-title"><span class="txt-failed">{{ $value['result'] }}</span> Sample Request</div> 
                      <div class="notification-number text-truncate">{{ $value['buyer'] }} - {{ $value['style'] }}</div>
                    @elseif(($value['result'] == 'NEW'))
                      <div class="notification-title"><span class="txt-primary">{{ $value['result'] }}</span> Sample Request</div> 
                      <div class="notification-number text-truncate">{{ $value['buyer'] }} - {{ $value['style'] }}</div>
                    @elseif(($value['result'] == 'DONE'))
                      <div class="notification-title"><span class="txt-pased">{{ $value['result'] }}</span> Sample Request</div> 
                      <div class="notification-number text-truncate">{{ $value['buyer'] }} - {{ $value['style'] }}</div>
                    @elseif(($value['result'] == 'LATE'))
                      <div class="notification-title"><span class="txt-late">{{ $value['result'] }}</span> Sample Request</div> 
                      <div class="notification-number text-truncate">{{ $value['buyer'] }} - {{ $value['style'] }}</div>
                    @endif
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="cards-18 p-4">
          <div class="row">
            <div class="col-12">
              <div class="title-24">Request Sample List</div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 pb-5">
              <div class="cards-scroll scrollX" id="scroll-bar-sm">
                  <button id="btnSearch"><i class="fas fa-search"></i></button>  
                  <table id="SList" class="table table-borderles tbl-content no-wrap py-2">
                      <thead>
                          <tr>
                              <th>INITIAL</th>
                              <th>CODE</th>
                              <th>BUYER</th>
                              <th>STYLE</th>
                              <th>PROJECT IN</th>
                              <th>PATTERN DATE</th>
                              <th>DUE DATE</th>
                              <th>FINISH DATE</th>
                              <th>STATUS</th>
                              <th>RESULT</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($dataSampleAll as $key => $value)
                            
                          <tr>
                              <td>{{\Carbon\Carbon::parse($value['created_at'])->format('M') }}</td>
                              <td>{{ $value['sample_code'] }}</td>
                              <td>{{ $value['buyer'] }}</td>
                              <td>{{ $value['style'] }}</td>
                              <td>{{\Carbon\Carbon::parse($value['created_at'])->format('d-m-Y') }}</td>
                              <td>{{ $value['pattern_start'] }}</td>
                              <!-- <td>10/04/2022</td> -->
                              <td>
                                @if (($value['tanggal']) < ($value['finish_date']))
                                <span class="txt-red">{{ \Carbon\Carbon::parse($value['tanggal'])->format('d-m-Y') }}</span>
                                @else
                                <span>{{ \Carbon\Carbon::parse($value['tanggal'])->format('d-m-Y') }}</span>
                                @endif
                              </td> 
                              <td>{{$value['finish_date']  }}</td>
                              <td>
                                <div class="justify-start">
                                  @if (($value['departement_trecking'] == 'PATTERN'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-yellow" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['departement_trecking'] }}  </a>
                                  @elseif(($value['departement_trecking'] == 'CUTTING'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}" class="badge-yellow" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['departement_trecking'] }} </a>
                                  @elseif(($value['departement_trecking'] == 'SEWING'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-yellow" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['departement_trecking'] }} </a>
                                  @elseif(($value['departement_trecking'] == 'REQUEST'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-blue" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['departement_trecking'] }} </a>
                                  @elseif(($value['departement_trecking'] == 'FINISH'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-green" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['departement_trecking'] }} </a>
                                  @else
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-pink" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['departement_trecking'] }} </a> 
                                  @endif
                                </div>
                               
                              </td>
                              <td>
                                <div class="justify-center">
                                  @if (($value['result'] == 'WIP'))
                                      <div class="badge-yellow">{{ $value['result'] }}</div>
                                  @elseif(($value['result'] == 'LATE'))
                                      <div class="badge-pink">{{ $value['result'] }}</div>
                                  @elseif(($value['result'] == 'DONE'))
                                      <div class="badge-green">{{ $value['result'] }}</div>
                                  @else
                                   
                                  @endif
                                </div>
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
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

<script>
  $(document).ready( function () {
    var table = $('#DTtable_sticky').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable_sticky2').DataTable({
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable_sticky3').DataTable({
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable_sticky4').DataTable({
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable_sticky5').DataTable({
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable_sticky6').DataTable({
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#SList').DataTable({
    "pageLength": 15,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
  $('#Date').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date2').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date3').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date4').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date5').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date6').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });
</script>
<script>
	$(document).ready(function(){
	  $('[data-toggle="popover"]').popover();
	});
</script>

@endpush