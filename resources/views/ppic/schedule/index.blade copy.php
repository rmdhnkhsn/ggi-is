@extends("layouts.app")
@section("title","PPIC Schedule")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">

<link href="{{asset('/css/prod_schedule.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/css/prettify.min.css')}}" rel="stylesheet" type="text/css">


<style>
    .skeleton-loader {
    width: 100%;
    height: 100%;
    display: block;
    background: linear-gradient(
        to right,
        rgba(255, 255, 255, 0),
        rgba(255, 255, 255, 0.5) 50%,
        rgba(255, 255, 255, 0) 80%
        ),
        lightgray;
    background-repeat: repeat-y;
    background-size: 50px 500px;
    background-position: 0 0;
    animation: shine 1s infinite;
    }
    @keyframes shine {
        to {
            background-position: 100% 0, /* move highlight to right */ 0 0;
        }
    }

    .badge-wo-zero {
        background-color:rgb(208, 228, 253);
        color:rgb(33, 37, 41);
        font-weight: normal;
    }
    .badge-wo-ontime {
        background-color:rgb(74, 206, 67);
        color:rgb(33, 37, 41);
        font-weight: normal;
    } 
    .badge-wo-warning {
        background-color:rgb(255, 193, 7);
        color:rgb(33, 37, 41);
        font-weight: normal;
    } 
    .badge-wo-delay {
        background-color:rgb(252, 59, 59);
        color:rgb(33, 37, 41);
        font-weight: normal;
    } 
    .badge-wo-today {
        background-color:rgb(96, 147, 255);
        color:rgb(33, 37, 41);
        font-weight: normal;
    } 
    .badge-wo-weekend {
        background-color:rgb(177, 177, 177);
        color:rgb(33, 37, 41);
        font-weight: normal;
    } 
    .badge-wo-holiday {
        background-color:rgb(255, 210, 99);
        color:rgb(33, 37, 41);
        font-weight: normal;
    } 
    .badge-wo-completed-ontime {
        background-color:rgb(72, 123, 252);
        color:rgb(33, 37, 41);
        font-weight: normal;
    } 
    .badge-wo-completed-delay {
        background-color:rgb(1, 31, 107);
        color:rgb(253, 255, 255);
        font-weight: normal;
    } 

    .select2-container .select2-selection--single {
        height:38px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color:black;
    }

</style>

@endpush
@push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")
<section class="content">
    <!-- Main content -->
      <div class="container-fluid">

        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Production Schedule PPIC</span>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
              
            <div class="modal fade" id="modal-xl">
                <div class="modal-dialog" style="max-width:800px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title">Create Schedule</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form_wo" action="#" onsubmit="return validateMyForm();" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('ppic.schedule.form-control', ['submit' => 'Create'])
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-3 mb-3">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        @if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->role=='PPIC_PLANNER')
                        <a type="button" class="btn btn-info" style="color:white;" href="#" id="add_wo"><i class="fas fa-plus"></i> OR Open <span class="badge badge-warning">{{count($master_or)}}</span></a>
                        @endif
                        <a type="button" class="btn btn-info" style="color:white;" target="_blank" href="{{route('ppic.schedule.wo_running')}}"><i class="fas fa-bars"></i> WO Schedule</a>
                        <a type="button" class="btn btn-info" style="color:white;" target="_blank" href="{{route('ppic.schedule.wo_targetday')}}"><i class="fas fa-bullseye"></i> WO Target</a>
                        <a type="button" class="btn btn-info" style="color:white;" target="_blank" href="{{route('ppic.schedule.wo_progress_sewing')}}"><i class="fas fa-chart-line"></i> Progress Sewing</a>
                        <!-- <a type="button" class="btn btn-info" style="color:white;" target="_blank" href="{{route('ppic.schedule.wo_anomali_sewing')}}"><i class="fas fa-bars"></i> Anomali Sewing</a> -->
                        @if(Auth::user()->role=='SYS_ADMIN')
                            <a type="button" class="btn btn-info" style="color:white;" target="_blank" href="{{route('ppic.schedule.update_sewing')}}"><i class="fas fa-asterisk"></i> Trigger Update Produksi (Trial Only)</a>
                            <!-- <a type="button" class="btn btn-info" style="color:white;" target="_blank" href="{{route('ppic.schedule.reset_sewing')}}"><i class="fas fa-asterisk"></i> Trigger Reset Produksi (Trial Only)</a> -->
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Legend Info
                                </button>
                            </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="">
                                            <span style="font-size:12px;font-weight:normal;">Date Legend :</span> 
                                            <span class="badge badge-wo-today">Today</span>
                                            <span class="badge badge-wo-weekend">Week end</span>
                                            <span class="badge badge-wo-holiday">National Holiday</span>
                                        </div>
                                        <div class="">
                                            <span style="font-size:12px;font-weight:normal;">WO Legend :</span> 
                                            <span class="badge badge-wo-ontime">On time</span>
                                            <span class="badge badge-wo-zero">On time zero output</span>
                                            <span class="badge badge-wo-warning">Shipment same as finish</span>
                                            <span class="badge badge-wo-completed-ontime">Completed on time</span>
                                            <span class="badge badge-wo-completed-delay">Completed delay</span>
                                            <span class="badge badge-wo-delay">Delay</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Filter
                                </button>
                            </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{route('ppic.schedule.index')}}" method="get" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">View Schedule</label>
                                        <div class="col-sm-10">
                                            <select name="view_schedule" id="view_schedule">
                                                <option value="oneline" selected>One Line</option>
                                                <option value="detail">Detail</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">View By</label>
                                        <div class="col-sm-10">
                                            <select name="view_mode" id="view_mode">
                                                <option value="wo">WO</option>
                                                <option value="buyer">Buyer</option>
                                                <option value="style">Style</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Branch</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-multiple" name="branch_id[]" multiple="multiple" id="filter_branch">
                                                <option value="0">All Branch</option>
                                                @foreach($master_branch as $d)
                                                    <option value="{{$d->id}}">{{$d->nama_branch}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">WO Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="filter_wo" name="wo_no" value="{{$filter_wo}}" placeholder="Search WO Number">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>

            <div class="gantt mt-0"></div>

          </div>
        </div>

      </div>
</section>
    <!-- /.content -->
@endsection

@push("scripts")
<script src="{{asset('/js/production_sch/custom_lib.js')}}"></script>
<script src="{{asset('/js/production_sch/init_element.js')}}"></script>

<script>
    var j1 = jQuery.noConflict();
    let url_get_schedule="{{route('ppic.schedule.get_schedule',[':woid',':wo_no',':qtorder',':qtadjsupply',':complete',':tday',':lc1',':lc2',':lc3',':dt_start',':line_id'])}}";
    let url_last_line="{{route('ppic.schedule.last_line_available_date',[':line_id',':woid',':timing'])}}";
    let url_wo_line="{{route('ppic.schedule.wo_by_line',[':line_id'])}}";
    let url_wocount_line="{{route('ppic.schedule.wocount_by_line',[':wo_id',':line_id',':tanggal'])}}";
    let url_store="{{route('ppic.schedule.store')}}";
    let url_edit="{{route('ppic.schedule.edit',':id')}}";
    let url_update="{{route('ppic.schedule.update')}}";
    let url_delete="{{route('ppic.schedule.delete',[':id'])}}";
    let url_totalsmv="{{route('ppic.schedule.get_totalsmv',[':itemnumber',':prodline'])}}";
    let url_prodline_eff="{{route('ppic.schedule.get_line_effisiensi',[':itemnumber'])}}";
    var crt_by = "{{ Auth::user()->nik }}";

    j1(function() {

        j1("#view_mode").val("{{$filter_view}}").change();
        j1("#view_schedule").val("{{$filter_view_schedule}}").change();

        j1("#rekap_detail_id").select2({dropdownParent: $("#select_cont")});
        j1("#filter_branch").select2();
        j1('#filter_branch').val(@json($filter_branch)).change();

        j1('#modal-xl').on('hidden.bs.modal', function () {

            // $("#rekap_detail_id").filter(function(){ 
            //     return $(this).attr('data-target-edit') == "yes" }
            // ).remove();
            // var group = $('option[data-target-edit="yes"]');
            // window.alert('');
            j1('option[data-target-edit="yes"]').remove();

        });

        j1('#tgl_mulai').prop('readonly', true);
        
        j1("#add_wo").on("click", function() {
            open_form_schedule(false,null,url_store,url_update,url_delete);
        });
        j1('#rekap_detail_id').on('change', function() {
            var or_qty=j1('option:selected',this).attr('or_qty');
            var fob=j1('option:selected',this).attr('fob');
            var cm=j1('option:selected',this).attr('cm');
            var ex_fact=j1('option:selected',this).attr('ex_fact');
            var item_number=j1('option:selected',this).attr('item_number');

            j1('#ex_fact').val(ex_fact);
            j1('#or_qty').val(or_qty);
            j1('#fob_amount').val(fob);
            j1('#cm_amount').val(cm);

            calculate_day_estimate(url_get_schedule);
            show_smv(url_totalsmv,item_number,0);
            prodline_eff(url_prodline_eff,item_number);
        });
        j1("#qty_order").on("change", function() {
            calculate_day_estimate(url_get_schedule);
        });
        j1("#qty_adjsupply").on("change", function() {
            calculate_day_estimate(url_get_schedule);
        });
        j1("#qty_target_day").on("change", function() {
            calculate_day_estimate(url_get_schedule);
        });
        j1("#lc1").on("change", function() {
            calculate_day_estimate(url_get_schedule);
        });
        j1("#lc2").on("change", function() {
            calculate_day_estimate(url_get_schedule);
        });
        j1("#lc3").on("change", function() {
            calculate_day_estimate(url_get_schedule);
        });
        j1('#plot_setting').on('change', function() {
            j1("#production_line_id").val('');
            j1("#tgl_mulai").val('');
            j1("#tgl_mulai").prop("readonly",true);
            // if (this.value=='PICK_DATE'){
            //     j1("#tgl_mulai").prop("readonly",false);
            // }
        });
        j1('#production_line_id').on('change', function() {
            fill_combo_wo_line(url_wo_line,this.value,j1('#plot_setting').val());
            set_start_date(url_last_line);
            calculate_day_estimate(url_get_schedule);

            var plot_setting=j1("#plot_setting").val();
            if (plot_setting=='PICK_DATE'&&this.value!==''){
                j1("#tgl_mulai").prop("readonly",false);
            }

            var item_number=j1("#rekap_detail_id option:selected").attr('item_number');
            var prodline=j1("#production_line_id").val();
            show_smv(url_totalsmv,item_number,prodline);
        });
        j1('#prod_wo').on('change', function() {
            set_start_date(url_last_line);
            calculate_day_estimate(url_get_schedule);
        });
        j1("#tgl_mulai").on("change", function() {
            calculate_day_estimate(url_get_schedule);
        });
        
        j1("#adding_process_check").change(function() {
            if(this.checked) {
                j1("#adding_process").val(1);
                replaceClass("row_adding_process", "d-none", "d-block");
            } else {
                j1("#adding_process").val(0);
                replaceClass("row_adding_process", "d-block", "d-none");
            }
        });
    });

    function replaceClass(id, oldClass, newClass) {
        var elem = $(`#${id}`);
        if (elem.hasClass(oldClass)) {
            elem.removeClass(oldClass);
        }
        elem.addClass(newClass);
    }

</script>

<script src="{{asset('/js/production_sch/jquery.min.js')}}"></script>
<script src="{{asset('/js/production_sch/jquery.cookie.min.js')}}"></script>
<script src="{{asset('/js/production_sch/jquery.fn.gantt.js')}}"></script>
<script src="{{asset('/js/production_sch/prettify.min.js')}}"></script>
<script>
    var j2 = jQuery.noConflict();

    j2(function() {

        "use strict";

        // var demoSource = @json($prod_sch);

        // shifts dates closer to Date.now()
        // var offset = new Date().setHours(0, 0, 0, 0) -
        //     new Date(demoSource[0].values[0].from).setDate(35);
        // for (var i = 0, len = demoSource.length, value; i < len; i++) {
        //     value = demoSource[i].values[0];
        //     value.from += offset;
        //     value.to += offset;
        // }

        j2(".gantt").gantt({
            source: @json($prod_sch),
            holidays:@json($master_holiday),
            navigate: "scroll",
            scale: "days",
            maxScale: "months",
            minScale: "hours",
            itemsPerPage: 30,
            scrollToToday: false,
            useCookie: true,
            onItemClick: function(data) {
                // alert("Item clicked - show some details : "+JSON.stringify(data));
                edit_init(url_edit,url_store,url_update,url_delete,data.id);
            },
            onAddClick: function(dt, rowId) {
                if (rowId) {
                    // // alert("Empty space clicked - add an item! dt : "+(dt)+", row : "+rowId);
                    open_form_schedule(false,null,url_store,url_update,url_delete);

                }
            },
            onRender: function() {
                if (window.console && typeof console.log === "function") {
                    console.log("chart rendered");
                }
            }
        });

        // j(".gantt").popover({
        //     selector: ".bar",
        //     title: function _getItemText() {
        //         return this.textContent;
        //     },
        //     container: '.gantt',
        //     content: "Here's some useful information.",
        //     trigger: "hover",
        //     placement: "auto right"
        // });

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        function edit_init(url_edit, url_store, url_update, url_delete, id) {
            // var url = "{{route('ppic.schedule.edit',':id')}}";
            url_edit = url_edit.replace(':id', id);

            j2.ajax({
                url: url_edit,
                type: 'GET',
                success: function (response) {
                    // alert(JSON.stringify(response));
                    open_form_schedule(true,response,url_store,url_update,url_delete);
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
                    // j1('#post').html(msg);
                    alert(msg);
                },
            });
        }

        prettyPrint();

    });
</script>

@endpush
  

  