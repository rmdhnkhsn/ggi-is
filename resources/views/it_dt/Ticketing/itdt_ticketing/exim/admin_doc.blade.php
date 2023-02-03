@extends("layouts.app")
@section("title","Admin Ticketing")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style_maps.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush
@section("content")
<section class="content">
<div class="container-fluid">
    <div class="row pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="col-12">
              <div class="justify-sb mb-3">
                <div class="title-22">Ticket Exim</div>
              </div>
            </div>
            <div class="col-12 mt-2">
              <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item-show">
                    <a class="nav-link relative active" data-toggle="tab" href="#waiting" role="tab"></i>
                        <i class="fs-28 fas fa-business-time"></i>
                        <div class="f-14">Waiting</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#process" role="tab"></i>
                        <i class="fs-28 fas fa-chart-line"></i>
                        <div class="f-14">Process</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
              </ul>
              <div class="tab-content card-block">
                <div class="tab-pane active" id="waiting" role="tabpanel">
                  <div class="row" style="margin-top:-14px">
                    <div class="col-12 pb-5">
                      <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="DTtable" class="table tbl-content no-wrap">
                            <thead>
                              <tr class="bg-thead">
                                <th>Vessel</th>
                                <th>ETD</th>
                                <th>Jumlah Kemasan</th>
                                <th>Jenis Kemasan</th>
                                <th>SHIPPER</th>
                                <th>ORDER</th>
                                <th>NO. BL / AWB</th>
                                <th>Jumlah Devisa</th>
                                <th>PURCHASING</th>
                                <th>Tanggal Create</th>
                                <th class="bg-thead">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($waiting_doc as $key => $value)
                              <tr>
                                <td>{{$value->vessel }}</td>
                                <td>{{$value->etd }}</td>
                                <td>{{$value->jum_kemasan }}</td>
                                <td>{{$value->jenis_kemasan }}</td>
                                <td>{{$value->shipper }}</td>
                                <td>{{$value->order_ticket }}</td>
                                <td>{{$value->no_bl }}</td>
                                <td>{{$value->mata_uang}} {{number_format($value->jum_devisa, 2, ",", ".")}}</td>
                                <td>{{$value->nama }}</td>
                                <td>{{$value->tgl_pengajuan }}</td>
                                <td>
                                  <div class="fa-container-action justify-start">               
                                    <form action="{{ route('process-ticket-doc')}}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                      <input type="hidden" class="form-control" id="status" name="status"  Value="On Process">
                                      <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{ Auth::user()->nik }}" >
                                      <input type="hidden" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ Auth::user()->nama }}" >
                                      <button type="submit" class="btn-blue-md">Assign <i class="fs-18 ml-2 fas fa-check"></i></button>
                                    </form>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                              <tr class="bg-white">
                                <th>Vessel</th>
                                <th>ETD</th>
                                <th>Jumlah Kemasan</th>
                                <th>Jenis Kemasan</th>
                                <th>SHIPPER</th>
                                <th>ORDER</th>
                                <th>NO. BL / AWB</th>
                                <th>Nilai Import</th>
                                <th>PURCHASING</th>
                                <th>Tanggal Create</th>
                                <th class="bg-white">Action</th>
                              </tr>
                            </tfoot>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="process" role="tabpanel">
                  <div class="row" style="margin-top:-14px">
                    <div class="col-12 pb-5">
                      <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="DTtable2" class="table tbl-content no-wrap">
                            <thead>
                              <tr class="bg-thead">
                                <th>ETD</th>
                                <th>Jumlah Kemasan</th>
                                <th>Jenis Kemasan</th>
                                <th>SHIPPER</th>
                                <th>ORDER</th>
                                <th>NO. BL / AWB</th>
                                <th>Nilai Import</th>
                                <th>PURCHASING</th>
                                <th>Tanggal Create</th>
                                <th class="bg-thead">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($process_doc as $key2 => $value2)
                                <tr>
                                  <td>{{$value2->etd }}</td>
                                  <td>{{$value2->jum_kemasan }}</td>
                                  <td>{{$value2->jenis_kemasan }}</td>
                                  <td>{{$value2->shipper }}</td>
                                  <td>{{$value2->order_ticket }}</td>
                                  <td>{{$value2->no_bl }}</td>
                                  <td>{{$value2->mata_uang}} {{number_format($value2->jum_devisa, 2, ",", ".")}}</td>
                                  <td>{{$value2->nama }}</td>
                                  <td>{{$value2->tgl_pengajuan }}</td>
                                  <td>
                                    @if(auth()->user()->nik==$value2->nik_support)
                                    <div class="fa-container-action flex">
                                      <a href="{{route('tiket.doc.edit',$value2->id)}}" class="btn-yellow-md">Update<i class="fs-18 ml-2 far fa-edit"></i></a>
                                    </div>
                                    @else
                                    <div class="fa-container-action flex">
                                      <button type="button" class="btn-grey-md" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="{{substr($value2->nama_support,0,16)}}..." style="cursor: not-allowed;">Update<i class="fs-18 ml-2 far fa-edit"></i></button>
                                    </div>
                                    @endif
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                              <tr class="bg-white">
                                <th>ETD</th>
                                <th>Jumlah Kemasan</th>
                                <th>Jenis Kemasan</th>
                                <th>SHIPPER</th>
                                <th>ORDER</th>
                                <th>NO. BL / AWB</th>
                                <th>Jumlah Devisa</th>
                                <th>PURCHASING</th>
                                <th>Tanggal Create</th>
                                <th class="bg-white">Action</th>
                              </tr>
                            </tfoot>
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
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<!-- <script>
  const done = document.getElementsByClassName('done');
  Array.from(done).forEach(function(a) {
    a.addEventListener('click', function(e) {
      const gtx = e.target.previousElementSibling.value;
      if( gtx === '' ) {
        swal({
            title: "ETA GTX TIDAK LENGKAP",
            text: "Harap Lengkapi Tanggal ETA GTX sebelum menyelesaikan tugas",
            icon: "warning",
            button : false,
          });
      } else {
        e.target.form.submit();
      }
    })
  })
</script> -->

<script>
  $(function () {
    $("#DTtable").DataTable({
      dom: 'rtp',
      fixedColumns:   {
        left: 0,
        right: 1
      },
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable tfoot th').each( function () {
        var title = $('#DTtable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });

  $(function () {
    $("#DTtable2").DataTable({
      dom: 'rtp',
      fixedColumns:   {
        left: 0,
        right: 1
      },
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable2 tfoot th').each( function () {
        var title = $('#DTtable2 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable2').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });

  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
@endpush