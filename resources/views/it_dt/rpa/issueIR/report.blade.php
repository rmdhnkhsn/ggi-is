@extends("layouts.app")
@section("title","Request Issue IR")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push("sidebar")
    @include('it_dt.rpa.issueIR.partials.navbar')
@endpush

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('it_dt.rpa.issueIR.partials.modal_filter')
                    <div class="cardPart">
                        <div class="cardHead p-3">
                            <div class="justify-sb3">
                                <div class="title-24-grey no-wrap">Request Issue IR</div>
                                <div class="endSide flexx gap-3">
                                    <!-- <div class="justify-center">
                                        <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                                        <div class="input-group date" id="report_date" data-target-input="nearest">
                                            <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                                <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                            </div>
                                            <input type="text" class="form-control datetimepicker-input borderInput w-130" data-target="#report_date" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                                        </div>
                                    </div> -->
                                    <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#ReportIssueIR">Filter</button>
                                    <div class="flex gap-3">
                                        <button class="btn-simple-monitor buttons-excel" onclick="excel(this)"><i class="fs-20 fas fa-file-excel"></i></button>
                                        <button class="btn-simple-delete" onclick="pdf(this)"><i class="fs-20 fas fa-file-pdf"></i></button>
                                        <!-- <a href="{{route('rpa.issue_ir.excel_export')}}" class="btn-simple-monitor"><i class="fs-20 fas fa-file-excel"></i></a>
                                        <a href="{{route('rpa.issue_ir.export_pdf')}}" class="btn-simple-delete"><i class="fs-20 fas fa-file-pdf"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section"></div>
                        <div class="cardBody p-3">
                            <div class="row">
                                <div class="col-12 pb-5">
                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                        <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                                            <thead>
                                                <tr class="bg-thead2">
                                                    <th>NO</th>
                                                    <th>G/L Date</th>
                                                    <th>Transaction Date</th>
                                                    <th>To Branch/Plant</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th>New OR</th>
                                                    <th>QTY</th>
                                                    <th>Status</th>
                                                    <th>Originator</th>
                                                    <th>Export By</th>
                                                    <th>Export Time</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php $counter = 1; ?>
                                                @foreach($data as $key => $value)
                                                    <?php 
                                                        if ($value->wh_by_name == null && $value->export_by_nik == null) {
                                                            $status = 'Waiting';
                                                        }elseif($value->wh_by_name != null && $value->export_by_nik == null) {
                                                            $status = 'Warehouse';
                                                        }else {
                                                            $status = 'RPA';
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td>{{ $counter }}</td>
                                                        <td>{{$value->gl_date}}</td>
                                                        <td>{{$value->tr_date}}</td>
                                                        <td>{{$value->to_branch}}</td>
                                                        <td>{{$value->item_no}}</td>
                                                        <td>{{$value->item_desc}}</td>
                                                        <td>{{$value->new_or}}</td>
                                                        <td>{{$value->qty}}</td>
                                                        <td>{{$status}}</td>
                                                        <td>{{$value->originator->nama}}</td>
                                                        <td>{{$value->export_by_name}}</td>
                                                        <td>{{$value->export_at}}</td>
                                                    </tr>
                                                    <?php $counter++ ?>
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
    </section>
@endsection

@push("scripts")
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'rtp',
    });
  });
</script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
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
            var url = "";
            url=url.replace(':id',month);
            window.location.href = url;   
        }
        filter_count++
    })
  });
</script>

<script>
    function excel(button) {
        var url = "{{ route('rpa.report_ir.excel_export') }}";
        window.open(url);
        location.reload();
    }

    function pdf(button) {
        var url = "{{ route('rpa.report_ir.export_pdf') }}";
        window.open(url);
        location.reload();
    }
</script>
@endpush
