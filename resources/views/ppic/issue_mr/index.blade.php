@extends("layouts.app")
@section("title","Issue MR")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push("sidebar")
    @include('ppic.issue_mr.partials.navbar')
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
                        <input type="hidden" id="date_issue_mr" value="{{$tanggal_issue_mr}}">
                        <div class="tab-pane active" id="issue_mr" role="tabpanel">
                            <div class="row">
                                <div class="col-12 justify-sb2 mb-3">
                                    <div class="title-20 text-left">Request Issue MR</div>
                                    <div class="flexx gap-3">
                                        <div class="input-group date" id="report_date" data-target-input="nearest">
                                            <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                                <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                            </div>
                                            <input type="text" class="form-control datetimepicker-input borderInput" data-target="#report_date" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                                        </div>
                                        <div class="flex gap-2">
                                            <button class="btn-simple-monitor exportExcelIssueMR" onclick="excel(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                            <button class="btn-simple-delete exportPdfIssueMR" onclick="pdf(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                        </div>
                                        @if($waktuaktif <= $batasWaktu)
                                            <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#AddIssue">Create</button>
                                            @include('ppic.issue_mr.partials.modal_add')
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 pb-5">
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table id="IssueMR" class="table tbl-content">
                                            <thead>
                                                <tr class="bg-thead">
                                                    <th>No</th>
                                                    <th>WO</th>
                                                    <th>OR</th>
                                                    <th>Line</th>
                                                    <th>Branch</th>
                                                    <th>Allowance</th>
                                                    <th>Category</th>
                                                    <th>Contract</th>
                                                    <th>Request Date</th>
                                                    <th>Delivery Date</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1;?>
                                                @foreach($request_issue as $key => $value)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{$value->no_wo}}</td>
                                                    <td>{{$value->no_or}}</td>
                                                    <td>{{$value->line}}</td>
                                                    <td>{{$value->branch}}</td>
                                                    <td>{{$value->allowance}}</td>
                                                    <td>{{$value->category}}</td>
                                                    <td>{{$value->no_contract}}</td>
                                                    <td>{{$value->request_date}}</td>
                                                    <td>{{$value->delivery_date}}</td>
                                                    <td>
                                                        @if($value->status_pengerjaan == 0)
                                                        Waiting
                                                        @else
                                                        Finish
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="justify-end gap-2">
                                                            <!-- Tombol titik 3 tidak muncul jika status barang finish  -->
                                                            <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>

                                                            <div class="dropdown-menu">
                                                                <!-- Modal Detail  -->
                                                                <button class="dropdown-item" data-toggle="modal" data-target="#DetailReport{{$value->id}}"><i class="mr-2 fs-18 fas fa-info-circle"></i>Detail</button>
                                                                <!-- Button Edit  -->
                                                                <!-- <button class="dropdown-item editData" data-toggle="modal" data-target="#EditIssueMR{{$value->id}}" style="color:#007bff"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Data</button> -->
                                                                @if($waktuaktif <= $batasWaktu)
                                                                <button class="dropdown-item copyData" id="{{$value->id}}" onclick="siCopy(this.id)" style="color:#07C16B"><i class="mr-2 fs-18 far fa-copy"></i>Copy Data</button>
                                                                <button class="dropdown-item editData" id="{{$value->id}}" onclick="myFunction(this.id)" style="color:#007bff"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Data</button>
                                                                <a href="{{route('rpa.issue_mr.delete_issue', $value->id)}}" onclick="return confirm('Are you sure you want to delete this data?');" class="dropdown-item" style="color:#FE1313"><i class="mr-2 fs-18 fas fa-trash-alt"></i>Delete</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('ppic.issue_mr.partials.modal_detail')
                                                @include('ppic.issue_mr.partials.modal_edit_issueMR')
                                                @include('ppic.issue_mr.partials.modal_copy')
                                                <?php $no++ ;?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- MR Direct  -->
                        <input type="hidden" id="tanggal_direct_mr" value="{{$tanggal_direct_list}}">
                        <div class="tab-pane" id="mr_direct" role="tabpanel">
                            <div class="row">
                                <div class="col-12 justify-sb2 mb-3">
                                    <div class="title-20 text-left">MR Direct List</div>
                                    <div class="flexx gap-3">
                                        <div class="input-group date" id="direct_list" data-target-input="nearest">
                                            <div class="input-group-append datepiker" data-target="#direct_list" data-toggle="datetimepicker">
                                            <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                            </div>
                                            <input type="text" class="form-control datetimepicker-input borderInput" data-target="#direct_list" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                                        </div>
                                        <div class="flex gap-2">
                                            <button class="btn-simple-monitor exportExcelMRDirect" onclick="excel(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                            <button class="btn-simple-delete exportPDFMRDirect" onclick="pdf(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                        </div>
                                        @if($waktuaktif <= $batasWaktu)
                                        <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#AddDirectList">Create</button>
                                        @include('ppic.issue_mr.partials.modal_directList')
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 pb-5">
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table id="DirectListTable" class="table tbl-content">
                                            <thead>
                                                <tr class="bg-thead">
                                                    <th>NO</th>
                                                    <th>Tanggal</th>
                                                    <th>WO</th>
                                                    <th>OR</th>
                                                    <th>Category</th>
                                                    <th>QTY Issued</th>
                                                    <th>UoM Issued</th>
                                                    <th>Location</th>
                                                    <th>Lot Number</th>
                                                    <th>Contract No</th>
                                                    <th>Placing</th>
                                                    <th>Item Number</th>
                                                    <th>Request By</th>
                                                    <th>Status</th>
                                                    <th></th>
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
                                                    <td>{{$value->category}}</td>
                                                    <td>{{$value->qty_issued}}</td>
                                                    <td>{{$value->uom_issued}}</td>
                                                    <td>{{$value->location}}</td>
                                                    <td>{{$value->lot_number}}</td>
                                                    <td>{{$value->no_contract}}</td>
                                                    <td>{{$value->placing}}</td>
                                                    <td>{{$value->item_number}}</td>
                                                    <td>{{$value->created_name}}</td>
                                                    <td>
                                                        @if($value->status_pengerjaan == 0 && $value->ready_to_issue == 'Yes')
                                                        Waiting
                                                        @elseif($value->status_pengerjaan == 0 && $value->ready_to_issue == 'No')
                                                        <div class="justify-end gap-2">
                                                            <a href="{{route('rpa.issue_mr.ready_issue', $value->id)}}"  class="btn-blue-md">Send <i class="ml-2 fs-16 fas fa-paper-plane"></i></a>
                                                        </div>
                                                        @else
                                                        Finish
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="justify-end gap-2">
                                                            <!-- Tombol titik 3 tidak muncul jika status barang finish  -->
                                                            <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>

                                                            <div class="dropdown-menu">
                                                                <!-- Button Edit  -->
                                                                <!-- <button class="dropdown-item editData" data-toggle="modal" data-target="#EditIssueMR{{$value->id}}" style="color:#007bff"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Data</button> -->
                                                                @if($waktuaktif <= $batasWaktu && $value->status_pengerjaan == 0)
                                                                <button class="dropdown-item editData" id="{{$value->id}}" onclick="direct(this.id)" style="color:#007bff"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Data</button>
                                                                <a href="{{route('rpa.issue_mr.delete_issue', $value->id)}}" onclick="return confirm('Are you sure you want to delete this data?');" class="dropdown-item" style="color:#FE1313"><i class="mr-2 fs-18 fas fa-trash-alt"></i>Delete</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $no++ ;?>
                                                @include('ppic.issue_mr.partials.modal_edit_directMR')
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
@if(Session::has('store_oke'))
  <script>
    window.onload = function() { 
        swal({
            position: 'center',
            icon: 'success',
            title: 'Success',
            text: 'Saved !'
        })
    }
  </script>
@endif
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
@if(Session::has('berhasil_hapus'))
  <script>
    window.onload = function() { 
        swal({
            position: 'center',
            icon: 'success',
            title: 'Success',
            text: 'Successfully Deleted !'
        })
    }
  </script>
@endif
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

    function DeleteRowItem(si_id) {
        var elem = document.getElementById("inputFormRowWO"+si_id);
        // console.log(elem);
        elem.remove();
    }

    function CopyDeleteRowItem(si_id) {
        var elem = document.getElementById("CopyinputFormRowWO"+si_id);
        // console.log(elem);
        elem.remove();
    }
    
    function siCopy(clicked_id) {
        $('#CopyData'+clicked_id).modal('show');
        let copyCategory = document.querySelector('.copyCategory'+clicked_id);
        let radio = copyCategory.getElementsByClassName('radio5'); 
        
        if(copyCategory.getElementsByClassName('radio5')[2].checked) {
            let kotak = document.getElementById(`HideCopy${clicked_id}`);
            kotak.classList.remove('hide');
        }

        $(document).on('change', '#copy_request_date'+clicked_id, function() {
            const copy_request = $(this).val();
            const delivery_date = new Date(copy_request);
            delivery_date.setDate(delivery_date.getDate() + 1); // Set now + 30 days as the new date 

            if(delivery_date.getDay() == 6){ 
                delivery_date.setDate(delivery_date.getDate() + 2);
            }else if(delivery_date.getDay() == 0){
                delivery_date.setDate(delivery_date.getDate() + 1);
            };

            var ed = new Date(delivery_date);
            var d = ed.getDate();
            var m = ed.getMonth() + 1;
            var y = ed.getFullYear();
            var tanggal = '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
            // console.log(tanggal);
            document.getElementById("copy_delivery_date"+clicked_id).value = tanggal;
        });
    };

    function direct(clicked_id) {
        $('#EditDirectMR'+clicked_id).modal('show');
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
<!-- Data table Atas  -->
<script>
  $(document).ready( function () {
    let partlist_wo=[];
    let partlist_wo_direct=[];

    var table = $('#IssueMR').DataTable({
        "pageLength": 10,
        dom: 'Brtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf",
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        } ]
    });
    $('.exportExcelIssueMR').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdfIssueMR').click(function(){
        $(".buttons-pdf").click();
    })
  });
</script>
<!-- Data table Bawah  -->
<script>
    $(document).ready( function () {
        var table = $('#DirectListTable').DataTable({
            "pageLength": 10,
            dom: 'Brtp',
            "buttons": [ {extend: 'excel', title: ''}, "pdf",
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                text: 'PDF',
                download: 'open'
            } ]
        });

    });
    $('.exportExcelMRDirect').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPDFMRDirect').click(function(){
        $(".buttons-pdf").click();
    })
</script>
<script>
    function excel(button) {
        const tombol = document.getElementsByClassName('buttons-excel');

        if (button.classList.contains('exportExcelIssueMR')) {
            tombol[0].click();
        } else if (button.classList.contains('exportExcelMRDirect')) {
            tombol[1].click();
        }
    }
    function pdf(button) {
        const tombol = document.getElementsByClassName('buttons-pdf');

        if (button.classList.contains('exportPdfIssueMR')) {
            tombol[0].click();
        } else if (button.classList.contains('exportPDFMRDirect')) {
            tombol[1].click();
        }
    }
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
        if (filter_count >= 0) {
            var issue_mr_date = $("#report_date").find("input").val();
            var mr_direct_date = $("#tanggal_direct_mr").val();
            var month = issue_mr_date+'|'+mr_direct_date;
            // console.log( month);
            var url = "{{ route('ppic.issue_mr.issue_mr_data',[':id']) }}";
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
            var url = "{{ route('ppic.issue_mr.issue_mr_data',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;   
        }
        filter_count++
    })
  });
</script>

<!-- search wo issue  -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $("#select2insidemodal").select2({
            theme: 'bootstrap4',
            dropdownParent: $("#AddIssue"),
            minimumInputLength: 3,
            ajax: {
                type: "POST",
                url: '{{ route("ppic.issue_mr.cari_wo") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    // console.log(params)
                    return {
                        no_wo: params.term // search term
                    };
                },
                processResults: function (response) {
                return {
                    results: response
                    };
                },
                cache: true
            }
        });


        $(".select2partlistDirect").on('select2:select', function (e) {
            let uom = $(this).select2('data')[0].attr_uom;
            $(`#uom_issued`).val(uom);
        });

    });

function get_partlist() {
    let wo=$(`#select2insidemodal`).val();
    let url = "{{ route('ppic.issue_mr.cari_partlist', ['wo' => ':wo', 'glpt'=>':glpt']) }}";
        url = url.replace(":wo",wo);
        url = url.replace(":glpt",'INFA,ININ');

    if (wo!=='') {
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                // alert(JSON.stringify(response));
                partlist_wo=response;
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            },
        });
    }
}

// partlist direct mr 
function get_partlist_direct() {
    let wo=$(`#select2bs4_add`).val();
    let url = "{{ route('ppic.issue_mr.cari_partlist', ['wo' => ':wo','glpt'=>':glpt']) }}";
        url = url.replace(":wo",wo);
        url = url.replace(":glpt",'ALL');

    if (wo!=='') {
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $(".select2partlistDirect").empty().trigger("change");
                $(".select2partlistDirect").append('<option selected disabled>Select Item Number</option>');
                $(".select2partlistDirect").select2({
                    data: response
                })
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            },
        });
    }
}
$(document).ready(function() {
    $(document).on('change', '.select2partlistDirect', function() {
        event.preventDefault();
        // console.log('hai hai');
        const item = $(this).val();
        const contract = $('#direct_contract').val();
        const no_wo = $('#select2bs4_add').val();
        const branch = $('#direct_branch').val();
        // console.log(no_wo)
        if (item != null) {
            $.ajax({
            data: {
                item: item,
                contract: contract,
                branch: branch,
                no_wo : no_wo,
            },
            url: '{{ route("ppic.issue_mr.sisa_kontrak") }}',           
            type: "get",
            dataType: 'json',    
                success:function(data){  
                    var res = Object.values(data);   
                    if (data.message == "") {
                        const messageallert = document.querySelector('.messageallert')
                        if(messageallert) {
                            messageallert.remove()
                        }
                    } else {
                        $(".item_number .select2-container").append(`<span class="text-pink messageallert" style="font-size : 12px">*${data.message}</span>`);
                    }
                    
                    $('#qty_tersisa').val(res[0]);
                    $('#issue_item_description').val(res[1]);
                }
            });
        }
    });
});

function set_dropdown_partlist() {
    $(".select2partlist").select2({
        data: partlist_wo
    })
    $(".select2partlist").on('select2:select', function (e) {
        let uom = $(this).select2('data')[0].attr_uom;
        $(this).closest('.hapusRow').find('.partlist_uom').val(uom);
    });
}
</script>
<!-- isian form issue mr  -->
<script>
    $(document).ready(function() {
        $(document).on('change', '#select2insidemodal', function() {
            event.preventDefault();
            var id = $(this).val();
            if(id){
                $.ajax({
                data: {
                    ID: id,
                },
                url: '{{ route("ppic.issue_mr.cari_jde") }}',           
                type: "post",
                dataType: 'json',    
                    success:function(res){      
                        // console.log(res)         
                        if(res){
                            $('#issue_or').val(res.no_or);
                            $('#issue_contract').val(res.contract);
                            $('#issue_placing').val(res.placing);
                            $('#issue_branch').val(res.branch);
                            $('#issue_line').val(res.id_line);

                            $(".select2partlist").empty().trigger("change");
                            $(".select2partlist").append('<option selected disabled>Select Item Number</option>');
                            set_default_ui();
                        }
                    }
                });
            }     
        });
    });
</script>
<!-- filter tanggal request_date - delivery date  -->
<script>
    $(document).ready(function() {
        $(document).on('change', '#issue_request_date', function() {
            const issue_request = $(this).val();
            const delivery_date = new Date(issue_request);
            delivery_date.setDate(delivery_date.getDate() + 1); // Set now + 30 days as the new date 

            if(delivery_date.getDay() == 6){ 
                delivery_date.setDate(delivery_date.getDate() + 2);
            }else if(delivery_date.getDay() == 0){
                delivery_date.setDate(delivery_date.getDate() + 1);
            };

            var ed = new Date(delivery_date);
            var d = ed.getDate();
            var m = ed.getMonth() + 1;
            var y = ed.getFullYear();
            var tanggal = '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
            document.getElementById("issue_delivery_date").value = tanggal;
        });
    });
</script>

<!-- search mr direct  -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $("#select2bs4_add").select2({
            theme: 'bootstrap4',
            dropdownParent: $("#AddDirectList"),
            minimumInputLength: 3,
            ajax: {
                type: "POST",
                url: '{{ route("ppic.issue_mr.cari_wo") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    // console.log(params)
                return {
                    no_wo: params.term // search term
                };
                },
                processResults: function (response) {
                return {
                    results: response
                    };
                },
                cache: true
            }
        });
    });
</script>
<!-- isian form mr direct  -->
<script>
    $(document).ready(function() {
        $(document).on('change', '#select2bs4_add', function() {
            event.preventDefault();
            var id = $(this).val();
            // console.log(id)
            if(id){
                $.ajax({
                data: {
                    ID: id,
                },
                url: '{{ route("ppic.issue_mr.cari_jde") }}',           
                type: "post",
                dataType: 'json',    
                    success:function(res){     
                        console.log(res)          
                        if(res){
                            $('#direct_or').val(res.no_or);
                            $('#direct_contract').val(res.contract);
                            $('#direct_placing').val(res.placing);
                            $('#direct_lot_number').val(res.lot_number);
                            $('#direct_branch').val(res.branch);
                            get_partlist_direct();
                        }
                    }
                });
            }     
        });
    });
</script>

<!-- add row item  -->
<script>
  $("#addRow").click(function () {
    var html = '';
        html +='<div class="row hapusRow" id="inputFormRowWO">' ;
        html +='<div class="col-4">';
        html +='<div class="title-sm">Item</div>';
        // html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="item_infa_inin" name="item_infa_inin[]" value="" placeholder="Input Item">';
        html +='<select class="form-control select2partlist" id="item_infa_inin" name="item_infa_inin[]" required><option selected disabled>Select Item Number</option></select>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="title-sm">Qty (INFA/ININ)</div>';
        html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="qty_infa_inin" name="qty_infa_inin[]" value="" placeholder="Input Qty" required>';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">UOM</div>';
        html +='<input type="text" class="form-control borderInput mt-1 mb-3 partlist_uom" id="uom_infa_inin" name="uom_infa_inin[]" value="" placeholder="Input UOM" readonly required>';
        html +='</div>';   
        html +='<div class="col-md-1">';
        html +='<button id="removeRowWO" type="button" class="btn-delete-row" style="margin-top:2rem"><i class="fs-20 far fa-times-circle"></i></button>'; 
        html +='</div>';      
        html +='</div>';
                     
    $('#newRow').append(html);

    set_dropdown_partlist();
  });

  // remove row
  $(document).on('click', '#removeRowWO', function () {
    $(this).closest('#inputFormRowWO').remove();
  });
</script>

<!-- Append new row di edit -->
<script>
    let tombol = 0;
    function dicobasaja(clicked_id) {
        tombol++; 
        var html = '';
            html +='<div class="row hapusRow" id="inputFormRowWO'+tombol+'">' ;
            html +='<div class="col-4">';
            html +='<div class="title-sm">Item</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="item_infa_inin" name="edit_item_infa_inin'+clicked_id+'[]" placeholder="Input Item">';
            html +='</div>';
            html +='<div class="col-4">';
            html +='<div class="title-sm">Qty (INFA/ININ)</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="qty_infa_inin" name="edit_qty_infa_inin'+clicked_id+'[]" placeholder="Input Qty">';
            html +='</div>';
            html +='<div class="col-3">';
            html +='<div class="title-sm">UOM</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="uom_infa_inin" name="edit_uom_infa_inin'+clicked_id+'[]" placeholder="Input UOM">';
            html +='</div>';   
            html +='<div class="col-1">';
            html +='<button id="'+tombol+'" onclick="DeleteRowItem(this.id)" type="button" class="btn-delete-row" style="margin-top:2rem"><i class="fs-20 far fa-times-circle"></i></button>'; 
            html +='</div>';      
            html +='</div>';
        $('#newRow'+clicked_id).append(html);
    };
</script>

<!-- Edit + tambah row  -->
<script>
    $(document).ready(function() {
    $(".SubmitEdit").click('#btn-moreqq',function(e){
      e.preventDefault(); 
        //   console.log('berhasil');
        const id_nya = e.target.getAttribute('atributnya');
        const type = $('input[name="type'+id_nya+'"]').val();
        const wo = $('input[name="no_wo'+id_nya+'"]').val();
        const or = $('input[name="no_or'+id_nya+'"]').val();
        const contract = $('input[name="no_contract'+id_nya+'"]').val();
        const placing = $('input[name="placing'+id_nya+'"]').val();
        const line = $('input[name="line'+id_nya+'"]').val();
        const branch = $('input[name="branch'+id_nya+'"]').val();
        const allowance = $('input[name="allowance'+id_nya+'"]').val();
        const request_date = $('input[name="request_date'+id_nya+'"]').val();
        const delivery_date = $('input[name="delivery_date'+id_nya+'"]').val();
        const category = $('input[name="category'+id_nya+'"]:checked').val();
        const item_infa_inin = $('input[name="edit_item_infa_inin'+id_nya+'[]"]').map(function(){return this.value;}).get();
        const qty_infa_inin = $('input[name="edit_qty_infa_inin'+id_nya+'[]"]').map(function(){return this.value;}).get();
        const uom_infa_inin = $('input[name="edit_uom_infa_inin'+id_nya+'[]"]').map(function(){return this.value;}).get();
        // console.log(line);
        const data = {
            'id': id_nya,
            'type': type,
            'wo': wo,
            'or': or,
            'contract': contract,
            'placing': placing,
            'line': line,
            'branch': branch,
            'allowance': allowance,
            'request_date': request_date,
            'delivery_date': delivery_date,
            'category': category,
            'item_infa_inin[]': item_infa_inin,
            'qty_infa_inin[]': qty_infa_inin,
            'uom_infa_inin[]': uom_infa_inin,
        };
        // console.log(data);
        $.ajax({
            type: "POST",
            url: '{{ route("ppic.issue_mr.update-request") }}',           
            data: data,
            dataType: 'json',
            success: function (response) {
                location.reload();
            }
        });
    })
  })
</script>

<!-- Copy + tambah row  -->
<script>
    $(document).ready(function() {
    $(".SubmitCopy").click('#btn-moreqq',function(e){
      e.preventDefault(); 
        //   console.log(e.target.getAttribute('id_we'));
        const id_nya = e.target.getAttribute('id_we');
        const type = $('input[name="copy_type'+id_nya+'"]').val();
        const wo = $('input[name="copy_no_wo'+id_nya+'"]').val();
        const or = $('input[name="copy_no_or'+id_nya+'"]').val();
        const contract = $('input[name="copy_no_contract'+id_nya+'"]').val();
        const placing = $('input[name="copy_placing'+id_nya+'"]').val();
        const line = $('input[name="copy_line'+id_nya+'"]').val();
        const branch = $('input[name="copy_branch'+id_nya+'"]').val();
        const allowance = $('input[name="copy_allowance'+id_nya+'"]').val();
        const request_date = $('input[name="copy_request_date'+id_nya+'"]').val();
        const delivery_date = $('input[name="copy_delivery_date'+id_nya+'"]').val();
        const category = $('input[name="copy_category'+id_nya+'"]:checked').val();
        const created_by = $('input[name="created_by'+id_nya+'"]').val();
        const created_name = $('input[name="created_name'+id_nya+'"]').val();
        const created_branch = $('input[name="created_branch'+id_nya+'"]').val();
        const created_branchdetail = $('input[name="created_branchdetail'+id_nya+'"]').val();
        const item_infa_inin = $('input[name="copy_item_infa_inin'+id_nya+'[]"]').map(function(){return this.value;}).get();
        const qty_infa_inin = $('input[name="copy_qty_infa_inin'+id_nya+'[]"]').map(function(){return this.value;}).get();
        const uom_infa_inin = $('input[name="copy_uom_infa_inin'+id_nya+'[]"]').map(function(){return this.value;}).get();
        const data = {
            'id_nya': id_nya,
            'type': type,
            'no_wo': wo,
            'no_or': or,
            'no_contract': contract,
            'placing': placing,
            'line': line,
            'branch': branch,
            'allowance': allowance,
            'request_date': request_date,
            'delivery_date': delivery_date,
            'category': category,
            'created_by': created_by,
            'created_name': created_name,
            'created_branch': created_branch,
            'created_branchdetail': created_branchdetail,
            'item_infa_inin[]': item_infa_inin,
            'qty_infa_inin[]': qty_infa_inin,
            'uom_infa_inin[]': uom_infa_inin,
        };
        // console.log(data);
        $.ajax({
            type: "POST",
            url: '{{ route("ppic.issue_mr.copy-request") }}',           
            data: data,
            dataType: 'json',
            success: function (response) {
                // console.log(response)
                location.reload();
            }
        });
    })
  })
</script>

<script>
    function checkQty(evt){
        const qtyIssued = parseInt(evt.value); 
        const qtyTersisa = parseInt(document.querySelector('#qty_tersisa').value)
        const btnCreate = document.querySelector('#create')

        if(qtyIssued  > qtyTersisa  ) {
            btnCreate.classList.add('d-none')
            btnCreate.classList.remove('d-block')
            alert(`Quantity yang di Issue tidak boleh melebihi Quantity Tersisa, Lebih : ${qtyTersisa- qtyIssued}` )
        } else {
            btnCreate.classList.add('d-block')
            btnCreate.classList.remove('d-none')
        }

    }
</script>
@endpush
