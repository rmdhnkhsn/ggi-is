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
                                <form action="{{route('export-ticket-acc')}}" class="flex gap-2" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="tgl_awal" value="{{$tgl_awal}}">
                                    <input type="hidden" name="tgl_akhir" value="{{$tgl_akhir}}">
                                    <button type="submit" class="btn-simple-monitor" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                    <!-- <button type="button" class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item-show">
                                <a class="nav-link relative active" data-toggle="tab" href="#waiting" role="tab"></i>
                                    <i class="fs-28 fas fa-business-time"></i>
                                    <div class="f-14">Done</div>
                                </a>
                                <div class="sch-slide"></div>
                            </li>
                            <li class="nav-item-show">
                                <a class="nav-link relative" data-toggle="tab" href="#process" role="tab"></i>
                                    <i class="fs-28 fas fa-chart-line"></i>
                                    <div class="f-14">Reject & Closed</div>
                                </a>
                                <div class="sch-slide"></div>
                            </li>
                        </ul>
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="waiting" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 pb-5">
                                        <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                        <div class="cards-scroll scrollX" id="scroll-bar">
                                            <table id="DTtable" class="table tbl-content no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Create Date</th>
                                                        <th>Explanation</th>
                                                        <th>Currency</th>
                                                        <th>BU</th>
                                                        <th>Account Debit</th>
                                                        <th>Account Credit</th>
                                                        <th>Amount</th>
                                                        <th>Description</th>
                                                        <th>Approved</th>
                                                        <th>Create By</th>
                                                        <th>Support</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=0;?>
                                                @foreach($tiket_done as $key => $value)
                                                <?php $no++;?>
                                                    <tr>
                                                        <td>{{$no}}</td>
                                                        <td>{{$value->tgl_create}}</td> 
                                                        <td>{{$value->pencairan}}</td> 
                                                        <td>IDR</td> 
                                                        <td>{{$value->kode_jde}}</td>
                                                        <td>{{$value->kode_jde}}.{{$value->kode_pencairan}}</td> 
                                                        <td>{{$value->akun_kredit}}</td> 
                                                        <td>Rp. {{number_format($value->amount_reacana, 2, ",", ".")}}</td> 
                                                        <td>{{$value->deskripsi}}</td> 
                                                        <td>{{$value->manager}}</td> 
                                                        <td>{{$value->nama}}</td> 
                                                        <td>{{$value->nama_support}}</td>
                                                        <td class="tbl2"> <a href="" data-toggle="modal" data-target="#detail{{$value->id}}" class="btn-icon-blue"><i class="fas fa-info"></i></a>
                                                        @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.modal.detail')

                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="process" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 pb-5">
                                        <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                        <div class="cards-scroll scrollX" id="scroll-bar">
                                            <table id="DTtable2" class="table tbl-content no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Department</th>
                                                        <th>Create Date</th>
                                                        <th>Description</th>
                                                        <th>status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no=0;?>
                                                    @foreach($tiket_reject as $key2 => $value2)
                                                    <?php $no++;?>
                                                        <tr>
                                                            <td>{{$no}}</td>
                                                            <td>{{$value2->nama}}</td> 
                                                            <td>{{$value2->bagian}}</td> 
                                                            <td>{{$value2->tgl_create}}</td> 
                                                            <td>{{$value2->deskripsi}}</td> 
                                                            @if($value2->status_tiket=='Close')
                                                            <td>{{$value2->status_tiket}}</td> 
                                                            @else
                                                            <td>Reject By {{$value2->manager}}</td> 
                                                            @endif
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
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ "excel", "pdf" ]
    });
  });

  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ "excel", "pdf" ]
    });
  });
</script>
<script>
    
    $(function() {
        $('input[name="daterange"]').daterangepicker();
    $("#filter_date").on("change.datetimepicker", ({date}) => {
        var filter = $("#filter_date").find("input").val();
        let result = filter.replaceAll("/", "-");
        console.log(result);
        location.replace("{{ url('/itd/ticket/done-acc?date=')}}"+result) 
    })
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
</script>
@endpush