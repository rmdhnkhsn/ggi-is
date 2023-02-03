@extends("layouts.app")
@section("title","PPIC Schedule")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style_maps.css')}}">

<link rel="stylesheet" href="{{asset('/css/prodSchedule.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('/css/prettify.css')}}" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}" />


<style>
.modal { overflow-y: auto}
</style>

@endpush
@push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")
<section class="content">
    <div class="container-fluid ProdSchedule">
        <button class="legendButton" id="btn-legend">
            <img src="{{url('images/iconmaps/circle-question-solid 1.svg')}}" style="width:40px">
        </button>
        @include('ppic.schedule.partials.floating-legend')
        <div class="floatMenu" style="left:2.5%;bottom:11.5%;">
            <div class="toggle2">
                <i class="fas fa-plus"></i>
            </div>
            <li class="navOne">
                <button type="button" class="softBlue triggerNextDay" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Next Day">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </li>
            <li class="navTwo">
                <button type="button" class="softBlue triggerPrevDay" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Previous Day">
                    <i class="fas fa-arrow-left"></i>
                </button>
            </li>
            <li class="navThree">
                <button type="button" class="softBlue triggerPageNext" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Next Page">
                    <i class="fas fa-arrow-down"></i>
                </button>
            </li>
            <li class="navFour">
                <button type="button" class="softBlue triggerPageBack" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Back Page">
                    <i class="fas fa-arrow-up"></i>
                </button>
            </li>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cards" style="padding:2.6rem 1.6rem 0 1.6rem">
                    <div class="justify-center mb-3 gap-9">
                        <div class="judul">Production Schedule</div>
                        <a href="" class="btnSoftBlue" data-toggle="modal" data-target="#filter"><i class="fas fa-filter"></i>Filter</a>
                        @include('ppic.schedule.partials.filter')
                    </div>
                    <div class="navSchedule">
                        @if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->role=='PPIC_PLANNER')
                        <button type="button" class="btnNav addWO" id="add_wo">OR Open <span class="badgeNav">{{count($master_or)}}</span></button>
                        @endif
                        <a href="{{route('ppic.schedule.unplanned_output')}}" class="btnNav" target="_blank">
                            @if(count($unplanned_output)>0)
                                <span class="badgeNav bg-danger">{{count($unplanned_output)}}</span>
                            @endif
                            Output Unplanned
                        </a>

                        <a href="{{route('ppic.schedule.wo_running')}}" class="btnNav" target="_blank">WO Schedule</a>
                        <a href="{{route('ppic.schedule.wo_targetday')}}" class="btnNav" target="_blank">WO Target</a>
                        <a href="{{route('ppic.schedule.wo_progress_sewing')}}" class="btnNav" target="_blank">Progress Sewing</a>
                        @if(Auth::user()->role=='SYS_ADMIN')
                        <a href="{{route('ppic.schedule.update_sewing')}}" class="btnNav" target="_blank">Trigger Update Produksi (Trial Only)</a>
                        @endif
                    </div>
                    @include('ppic.schedule.partials.or_open')
                    @include('ppic.schedule.select-buyer')
                    <div class="gantt"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="navScheduleBottom">
    <!-- <div class="cards-scroll flex gap-8 scrollX pb-1" id="scroll-bar-sm"> -->
        @if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->role=='PPIC_PLANNER')
        <button type="button" class="btnNavBottom" id="triggerWO">
            <img src="{{url('images/iconpack/production/list.png')}}">
            <div class="name">OR Open</div> 
            <div class="badgeNav">{{count($master_or)}}</div> 
        </button>
        @endif
        <a href="{{route('ppic.schedule.wo_running')}}" class="btnNavBottom" target="_blank">
            <img src="{{url('images/iconpack/production/timetable.png')}}">
            <div class="name">WO Schedule</div> 
        </a>
        <a href="{{route('ppic.schedule.wo_targetday')}}" class="btnNavBottom" target="_blank">
            <img src="{{url('images/iconpack/production/dart-board.png')}}">
            <div class="name">WO Target</div>
        </a>
        <a href="{{route('ppic.schedule.wo_progress_sewing')}}" class="btnNavBottom" target="_blank">
            <img src="{{url('images/iconpack/production/growth.png')}}">
            <div class="name">Progress Sewing</div>
        </a>
        <!-- @if(Auth::user()->role=='SYS_ADMIN')
        <a href="{{route('ppic.schedule.update_sewing')}}" class="btnNavBottom" target="_blank">
            <img src="{{url('images/iconpack/production/refresh.png')}}">
            <div class="name">Trigger Update</div>
        </a>
        @endif -->
    <!-- </div> -->
</div>

<form action="{{route('ppic.schedule.index')}}" id="frmResetBuyerOR" method="get">
</form>
@endsection

@push("scripts")
<script src="{{asset('/js/production_sch/custom_lib.js')}}"></script>
<script src="{{asset('/js/production_sch/init_element.js')}}"></script>

<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>

@if(Session::has('error'))
  <script>
    var msg="{{Session::get('error')}}";
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: msg
      })
    }
  </script>
@endif

<script>
    const buttontoggle = document.getElementById("btn-legend");
    const legend = document.getElementsByClassName("floating-legend")[0];
    buttontoggle.addEventListener('click', function () {
        legend.classList.toggle('fade-in');
        legend.classList.toggle('fade-Out');
        console.log('ok');
    });

    let toggle = document.querySelector('.toggle2');
    let menu = document.querySelector('.floatMenu');
    toggle.onclick = function () {
        menu.classList.toggle('active')
    }
</script>

<script>
    $('#triggerWO').click(function(){
        $(".addWO").click();
    })

    $('.triggerNextDay').click(function(){
        $(".nav-next-day").click();
    })

    $('.triggerPrevDay').click(function(){
        $(".nav-prev-day").click();
    })

    $('.triggerPageNext').click(function(){
        $(".nav-page-next").click();
    })

    $('.triggerPageBack').click(function(){
        $(".nav-page-back").click();
    })

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })


    
</script>

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
        j1("#view_line").val("{{$filter_view_line}}").change();

        j1("#rekap_detail_id").select2({dropdownParent: $("#select_cont")});
        j1("#filter_branch").select2();
        j1('#filter_branch').val(@json($filter_branch)).change();

        j1("#or_buyer").select2();
        j1('#or_buyer').val(@json($or_buyer)).change();

        j1('#modal-xl').on('hidden.bs.modal', function () {

            // $("#rekap_detail_id").filter(function(){ 
            //     return $(this).attr('data-target-edit') == "yes" }
            // ).remove();
            // var group = $('option[data-target-edit="yes"]');
            // window.alert('');
            j1('option[data-target-edit="yes"]').remove();

        });

        j1('#tgl_mulai').prop('readonly', true);
        
        j1("#openBuyer").on("click", function() {
            open_form_schedule(false,null,url_store,url_update,url_delete);
        });
        j1("#add_wo").on("click", function() {
            // open_form_schedule(false,null,url_store,url_update,url_delete);
            // open_select_buyer();
            show_or_buyer_new();
        });
        j1('#rekap_detail_id').on('change', function() {
            var or_qty=j1('option:selected',this).attr('or_qty');
            var fob=j1('option:selected',this).attr('fob');
            var cm=j1('option:selected',this).attr('cm');
            var ex_fact=j1('option:selected',this).attr('ex_fact');
            var item_number=j1('option:selected',this).attr('item_number');

            j1('#ex_fact').val(ex_fact);
            j1('#tgl_shipment').val(ex_fact);
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
            calculate_day_estimate(url_get_schedule);
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
  

  