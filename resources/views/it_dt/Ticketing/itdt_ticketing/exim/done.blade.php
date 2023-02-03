@extends("layouts.app")
@section("title","Admin Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards p-4">
                    <div class="row">
                        <div class="col-12 justify-sb2">
                            <div class="title-20 text-left">Ticketing Done</div>
                            <div class="filterSMV flexx gap-2">
                                <div class="input-group justify-center" id="filter_date">
                                    <div class="sub-title-14 mr-2 title-hide">Show : </div>
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="width:45px;height:37px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="dateRange" class="form-control border-input-10" name="daterange" value="2022-08-01" placeholder="Input Date" style="height:37px;border-radius:0 10px 10px 0" />
                                </div>
                                <form action="{{route('export-ticket-doc')}}" class="flex gap-2" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="tgl_awal" value="{{$tgl_awal}}">
                                    <input type="hidden" name="tgl_akhir" value="{{$tgl_akhir}}">
                                    <button type="submit" class="btn-simple-monitor" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                    <button type="button" class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 pb-5">
                            <!-- <div class="justify-sb mb-3">
                                <div class="title-22">Ticketing Done</div>
                                <div class="flex" style="gap:.5rem">
                                    <div class="input-group dates" id="filter_date" style="width:270px">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:45px;height:37px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="dateRange" class="form-control border-input-10" name="daterange" value="2022-08-01" placeholder="Input Date" style="height:37px;border-radius:0 10px 10px 0" />
                                    </div>
                                </div>
                                <form action="{{route('export-ticket-doc')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="tgl_awal" value="{{$tgl_awal}}">
                                    <input type="hidden" name="tgl_akhir" value="{{$tgl_akhir}}">
                                    <button type="submit" class="btn-simple-monitor" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                </form>
                            </div> -->
                            <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DTtable" class="table tbl-content no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Vessel</th>
                                            <th>ETA JKT</th>
                                            <th>Jumlah Kemasan</th>
                                            <th>Jenis Kemasan</th>
                                            <th>SHIPPER</th>
                                            <th>ORDER</th>
                                            <th>NO. BL / AWB</th>
                                            <th>Nilai Import</th>
                                            <th>PURCHASING</th>
                                            <th>Tanggal Create</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($done_doc as $key2 => $value2)
                                            <tr>
                                                <td>{{$value2->vessel }}</td>
                                                <td>{{$value2->eta_jkt }}</td>
                                                <td>{{$value2->jum_kemasan }}</td>
                                                <td>{{$value2->jenis_kemasan }}</td>
                                                <td>{{$value2->shipper }}</td>
                                                <td>{{$value2->order_ticket }}</td>
                                                <td>{{$value2->no_bl }}</td>
                                                <td>{{$value2->mata_uang}} {{number_format($value2->jum_devisa, 2, ",", ".")}}</td>
                                                <td>{{$value2->nama }}</td>
                                                <td>{{$value2->tgl_pengajuan }}</td>
                                                <td>
                                                    <div class="container-tbl-btn">
                                                        <a href="{{route('tiket.doc.detail',$value2->id)}}" class="btn-icon-blue"><i class="fas fa-info"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Vessel</th>
                                            <th>ETA JKT</th>
                                            <th>Jumlah Kemasan</th>
                                            <th>Jenis Kemasan</th>
                                            <th>SHIPPER</th>
                                            <th>ORDER</th>
                                            <th>NO. BL / AWB</th>
                                            <th>Jumlah Devisa</th>
                                            <th>PURCHASING</th>
                                            <th>Tanggal Create</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> -->
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
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })

  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ "excel", "pdf" ]
    });
  });

    $('#first').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
      });
    $('#last').datetimepicker({
      format: 'Y-MM-DD  ',
      showButtonPanel: true
      });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });
</script>
<script>
    
    $(function() {
        $('input[name="daterange"]').daterangepicker();
    $("#filter_date").on("change.datetimepicker", ({date}) => {
        var filter = $("#filter_date").find("input").val();
        let result = filter.replaceAll("/", "-");
        console.log(result);
        location.replace("{{ url('/itd/ticket/done-doc?date=')}}"+result) 
    })
  });
</script>
@endpush