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
                <div class="cards p-4">
                    <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item-show">
                            <a class="nav-link relative active" data-toggle="tab" href="#issue_mr" role="tab"></i>
                                <i class="fs-28 fas fa-file-alt"></i>
                                <div class="f-14">Issue MR</div>
                            </a>
                            <div class="sch-slide"></div>
                        </li>
                        <li class="nav-item-show">
                            <a class="nav-link relative" data-toggle="tab" href="#mr_direct" role="tab"></i>
                                <i class="fs-28 fas fa-file-invoice"></i>
                                <div class="f-14">MR Direct</div>
                            </a>
                            <div class="sch-slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <!-- Issue MR  -->
                        <div class="tab-pane active" id="issue_mr" role="tabpanel">
                            <div class="row">
                                <div class="col-12 joblist-date">
                                    <div class="title-20 text-left">Request Issue MR</div>
                                    <div class="margin-date">
                                        <div class="flexx gap-3">
                                            <div class="input-group date" id="report_date" data-target-input="nearest">
                                                <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                                    <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                                </div>
                                                <input type="text" class="form-control datetimepicker-input borderInput w-130" data-target="#report_date" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                                            </div>
                                            <div class="flex gap-2">
                                                <!-- <a href="{{route('rpa.issue_mr.export_excel')}}" class="btn-simple-monitor exportExcelIssueMR2" ><i class="fs-18 fas fa-file-excel"></i></a> -->
                                                <button class="btn-simple-monitor exportExcelIssueMR2"  onclick="test(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                                <!-- <button class="btn-simple-delete exportPdfIssueMR2" onclick="pdf_button(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="request_date" value="{{$tanggal_request}}">
                                <!-- <input type="hidden" id="ppic_name" value=""> -->
                                <div class="col-12 pb-5">
                                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table id="IssueMR" class="table tbl-content no-wrap">
                                            <thead>
                                                <tr class="bg-thead">
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
                                                    <th>No Contract</th>
                                                    <th>Placing</th>
                                                    <th>Item</th>
                                                    <th>QTY INFA/ININ</th>
                                                    <th>UOM</th>
                                                    <!-- <th></th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($request_issue as $key => $value)
                                                <tr>
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
                                                    <!-- <td>
                                                        <div class="justify-end gap-2"> -->
                                                            <!-- <a href="{{route('rpa.issue_mr.change_status', $value->id)}}"  class="btn-blue-md">Kirim <i class="ml-2 fs-18 fas fa-paper-plane"></i></a> -->
                                                            <!-- Tombol titik 3 tidak muncul jika status barang finish  -->
                                                            <!-- <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <button class="dropdown-item" data-toggle="modal" data-target="#DetailReport{{$value->id}}"><i class="mr-2 fs-18 fas fa-info-circle"></i>Detail</button>
                                                            </div>
                                                        </div>
                                                    </td> -->
                                                </tr>
                                                @include('it_dt.rpa.issue_mr.partials.modal_detail')
                                                @include('it_dt.rpa.issue_mr.partials.modal_done_issueMR')
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- MR Direct  -->
                        <div class="tab-pane" id="mr_direct" role="tabpanel">
                            <div class="row">
                                <div class="col-12 joblist-date">
                                    <div class="title-20 text-left">MR Direct List</div>
                                    <div class="margin-date">
                                        <div class="flexx gap-3">
                                            <div class="flex gap-2">
                                                <button class="btn-simple-monitor exportExcelMRDirect" onclick="test(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                                <button class="btn-simple-delete exportPDFMRDirect"  onclick="pdf_button(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
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
                                                    <th>WO</th>
                                                    <th>OR</th>
                                                    <th>Item Number</th>  
                                                    <th>Item Description</th>  
                                                    <th>Category</th>
                                                    <th>QTY Issued</th>   
                                                    <th>UoM Issued</th>
                                                    <th>Location</th>
                                                    <th>Lot Number</th>
                                                    <th>Contract No</th>
                                                    <th>Placing</th>
                                                    <th>Branch</th>
                                                    <th>Request By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($direct_mr as $key => $value)
                                                <tr>
                                                    <td>{{$value->no_wo}}</td>
                                                    <td>{{$value->no_or}}</td>
                                                    <td>{{$value->item_number}}</td>
                                                    <td>{{$value->item_description}}</td>
                                                    <td>{{$value->category}}</td>    
                                                    <td>{{$value->qty_issued}}</td>
                                                    <td>{{$value->uom_issued}}</td>
                                                    <td>{{$value->location}}</td>
                                                    <td>{{$value->lot_number}}</td>  
                                                    <td>{{$value->no_contract}}</td>
                                                    <td>{{$value->placing}}</td> 
                                                    <td>{{$value->branch}}</td>
                                                    <td>{{$value->created_name}}</td>
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
</section>
 @endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
@if(Session::has('sudah_dikirim'))
  <script>
    window.onload = function() { 
        swal({
            position: 'center',
            icon: 'success',
            title: 'Success',
            text: 'Request Has Been Completed !'
        })
    }
  </script>
@endif
<script>
    function test(button) {
        const tombol = document.getElementsByClassName('buttons-excel');
        if (button.classList.contains('exportExcelIssueMR2')) {
            $.ajax({
            type: "GET",
            url: '{{ route("rpa.issue_mr.export") }}',           
            // data: data,
            dataType: 'json',
                success: function (response) {
                    console.log('sukses');
                }
            })
            tombol[0].click();
            location.reload();
            // alert('sukses');    b        
        } else if (button.classList.contains('exportExcelMRDirect')) {
            $.ajax({
            type: "GET",
            url: '{{ route("rpa.mr_direct.export") }}',           
            // data: data,
            dataType: 'json',
                success: function (response) {
                    console.log('sukses');
                }
            })
            tombol[1].click();
            location.reload();
        }
    }

    function pdf_button(button) {
        const sipdf = document.getElementsByClassName('buttons-pdf');
        if (button.classList.contains('exportPdfIssueMR2')) {
            $.ajax({
            type: "GET",
            url: '{{ route("rpa.issue_mr.export") }}',           
            // data: data,
            dataType: 'json',
                success: function (response) {
                    console.log('sukses');
                }
            })
            sipdf[0].click();
            location.reload();
        } else if (button.classList.contains('exportPDFMRDirect')) {
            $.ajax({
            type: "GET",
            url: '{{ route("rpa.mr_direct.export") }}',           
            // data: data,
            dataType: 'json',
                success: function (response) {
                    console.log('sukses');
                }
            })
            sipdf[1].click();
            location.reload();
        }
    }
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

<!-- Data table Atas  -->
<script>
  $(document).ready( function () {
    var table = $('#IssueMR').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf",
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        } ],
    });
  });
  $(document).ready( function () {
    var table = $('#DirectListTable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf",
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        } ],
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
            var request_date = $("#report_date").find("input").val();
            var month = request_date;
            // console.log(issue_mr_date);
            var url = "{{ route('rpa.issue_mr.utama',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;   
        }
        filter_count++
    })
  });
</script>
@endpush
