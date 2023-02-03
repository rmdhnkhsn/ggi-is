@extends("layouts.app")
@section("title","Issue MR")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.rpa.issue_mr.partials.navbar')
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                 @include('it_dt.rpa.issue_mr.partials.modal_filter_issue')
                <div class="cards p-4">
                    <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item-show">
                            <a class="nav-link relative active" data-toggle="tab" href="#issue_mr" role="tab"></i>
                                <i class="fs-28 fas fa-file-alt"></i>
                                <div class="f-14">Report Issue MR</div>
                            </a>
                            <div class="sch-slide"></div>
                        </li>
                        <li class="nav-item-show">
                            <a class="nav-link relative" data-toggle="tab" href="#mr_direct" role="tab"></i>
                                <i class="fs-28 fas fa-file-invoice"></i>
                                <div class="f-14">Report MR Direct</div>
                            </a>
                            <div class="sch-slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <!-- Issue MR 
                        <input type="hidden" id="date_issue_mr" value=""> -->
                        <div class="tab-pane active" id="issue_mr" role="tabpanel">
                            <div class="row">
                                <div class="col-12 joblist-date">
                                    <div class="title-20 text-left">Report Request Issue MR</div>
                                    <div class="margin-date">
                                        <div class="flexx gap-3">
                                            <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#ReportIssueMR">Filter</button>
                                            <div class="flex gap-2">
                                                <button class="btn-simple-monitor exportExcelIssueMR" onclick="test(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                                <button class="btn-simple-delete exportPdfIssueMR" onclick="pdf_button(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 pb-5">
                                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table id="IssueMR" class="table tbl-content no-wrap">
                                            <thead>
                                                <tr class="bg-thead">
                                                    <th>No</th>
                                                    <th>WO</th>
                                                    <th>OR</th>
                                                    <th>Line</th>
                                                    <th>Branch</th>
                                                    <th>Allowance</th>
                                                    <th>Request By</th>
                                                    <th>Category</th>
                                                    <th>Request Date</th>
                                                    <th>Delivery Date</th>
                                                    <th>Status</th>
                                                    <th>Contract No</th>
                                                    <th>Placing</th>
                                                    <th>Item</th>
                                                    <th>QTY INFA & ININ</th>
                                                    <th>UOM</th>
                                                    <th>Status</th>
                                                    <th>Export By</th>
                                                    <th>Export At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1;?>
                                                @foreach($request_issue as $key => $value)
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$value->no_wo}}</td>
                                                    <td>{{$value->no_or}}</td>
                                                    <td>{{$value->line}}</td>
                                                    <td>{{$value->branch}}</td>
                                                    <td>{{$value->allowance}}</td>
                                                    <td>{{$value->created_name}}</td>
                                                    <td>{{$value->category}}</td>
                                                    <td>{{$value->request_date}}</td>
                                                    <td>{{$value->delivery_date}}</td>
                                                    <td>{{$value->status}}</td>
                                                    <td>{{$value->no_contract}}</td>
                                                    <td>{{$value->placing}}</td>
                                                    <td>{{$value->item_infa_inin}}</td>
                                                    <td>{{$value->qty_infa_inin}}</td>
                                                    <td>{{$value->uom_infa_inin}}</td>
                                                    <td>
                                                        @if($value->status_pengerjaan == 0)
                                                        Waiting
                                                        @else
                                                        Process
                                                        @endif
                                                    </td>
                                                    <td>{{$value->export_by_name}}</td>
                                                    <td>{{$value->export_at}}</td>
                                                </tr>
                                                <?php $no++ ;?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- MR Direct  -->
                        <input type="hidden" id="tanggal_direct_mr" value="">
                        <div class="tab-pane" id="mr_direct" role="tabpanel">
                            <div class="row">
                                <div class="col-12 joblist-date">
                                    <div class="title-20 text-left">Report MR Direct List</div>
                                    <div class="margin-date">
                                        <div class="flexx gap-3">
                                            <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#ReportMRDirect">Filter</button>
                                            <div class="flex gap-2">
                                                <button class="btn-simple-monitor exportExcelMRDirect" onclick="test(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                                <button class="btn-simple-delete exportPDFMRDirect" onclick="pdf_button(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 pb-5">
                                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table id="DirectListTable" class="table tbl-content no-wrap">
                                            <thead>
                                                <tr class="bg-thead">
                                                    <th>NO</th>
                                                    <th>Tanggal</th>
                                                    <th>WO</th>
                                                    <th>OR</th>
                                                    <th>Item Number</th>
                                                    <th>Item Description</th>
                                                    <th>Category</th>
                                                    <th>QTY Issued</th>
                                                    <th>UoM Issued</th>
                                                    <th>Location</th>
                                                    <th>Branch</th>
                                                    <th>Lot Number</th>
                                                    <th>Contract No</th>
                                                    <th>Placing</th>
                                                    <th>Request By</th>
                                                    <th>Status</th>
                                                    <th>Export By</th>
                                                    <th>Export At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1;?>
                                                @foreach($direct_mr as $key => $value)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{date('Y-m-d', strtotime($value->created_at))}}</td>
                                                    <td>{{$value->no_wo}}</td>
                                                    <td>{{$value->no_or}}</td>
                                                    <td>{{$value->item_number}}</td>
                                                    <td>{{$value->item_description}}</td>
                                                    <td>{{$value->category}}</td>
                                                    <td>{{$value->qty_issued}}</td>
                                                    <td>{{$value->uom_issued}}</td>
                                                    <td>{{$value->location}}</td>
                                                    <td>{{$value->branch}}</td>
                                                    <td>{{$value->lot_number}}</td>
                                                    <td>{{$value->no_contract}}</td>
                                                    <td>{{$value->placing}}</td>
                                                    <td>{{$value->created_name}}</td>
                                                    <td>
                                                        @if($value->status_pengerjaan == 0)
                                                        Waiting
                                                        @else
                                                        Process
                                                        @endif
                                                    </td>
                                                    <td>{{$value->export_by_name}}</td>
                                                    <td>{{$value->export_at}}</td>
                                                </tr>
                                                <?php $no++ ;?>
                                                @endforeach
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
</section>
 @endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script>
    function myFunction(clicked_id) {
        $('#EditIssueMR'+clicked_id).modal('show');
        let categorymodal = document.querySelector('.categorymodal'+clicked_id);
        let radio = categorymodal.getElementsByClassName('radio'); 
        
        if(categorymodal.getElementsByClassName('radio')[2].checked) {
            let kotak = document.getElementById(`showHide${clicked_id}`);
            kotak.classList.remove('hide');
        }
    };

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
<script>
        function test(button) {
        const tombol = document.getElementsByClassName('buttons-excel');
        if (button.classList.contains('exportExcelIssueMR')) {
            tombol[0].click();
        } else if (button.classList.contains('exportExcelMRDirect')) {
            tombol[1].click();
        }
    }

    function pdf_button(button) {
        const sipdf = document.getElementsByClassName('buttons-pdf');
        if (button.classList.contains('exportPdfIssueMR')) {
            sipdf[0].click();
        } else if (button.classList.contains('exportPDFMRDirect')) {
            sipdf[1].click();
        }
    }
</script>
<!-- Data table Atas  -->
<script>
  $(document).ready( function () {
    var table = $('#IssueMR').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf"],
    });
  });
  $(document).ready( function () {
    var table = $('#DirectListTable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf"],
    });
  });
</script>
<!-- filter tanggal table atas  -->
<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true,
        useCurrent: false,
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
        console.log(filter_count);
        if (filter_count >= 0) {
            var issue_mr_date = $("#report_date").find("input").val();
            var mr_direct_date = $("#tanggal_direct_mr").val();
            var month = issue_mr_date+'|'+mr_direct_date;
            // console.log( month);
            var url = "{{ route('rpa.issue_mr.report',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;   
        }
        filter_count++
    })
  });
</script>
<!-- filter tanggal table bawah  -->
<script>
  jQuery(document).ready(function($) {
    $('#direct_list').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true,
        useCurrent: false,
    })
    
    var filter_count = 0;
    $("#direct_list").on("change.datetimepicker", ({date}) => {
        // console.log(filter_count);
        if (filter_count >= 0) {
            var issue_mr_date = $("#date_issue_mr").val();
            var mr_direct_date = $("#direct_list").find("input").val();
            var month = issue_mr_date+'|'+mr_direct_date;
            // console.log( month);
            var url = "{{ route('rpa.issue_mr.report',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;   
        }
        filter_count++
    })
  });
</script>
@endpush
