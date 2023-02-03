function open_select_buyer() {
    j1('#modal-buyer').modal('show');
}

function open_form_schedule(editMode,data,url_store,url_update,url_delete) {
    init_form_schedule(editMode,url_store,url_update);

    if (editMode&&data) {
        var or_qty_avail=parseFloat(data.qty_order)+parseFloat(data.wo_qty_balance);
        j1('#form_wo').attr('action', url_update);
        
        j1('#rekap_detail_id').append('<option data-target-edit="yes" value="'+data.rekap_detail_id+'" or_qty="'+data.or_qty+'" fob="'+data.fob+'" cm="'+data.cm+'" ex_fact="'+data.ex_fact+'">'+data.article+'/'+data.no_or+'/'+or_qty_avail+' </option>'); 
        j1('#rekap_detail_id').val(data.rekap_detail_id);
        j1('#or_qty').val(data.or_qty);
        j1('#ex_fact').val(data.ex_fact);
        j1('#fob_amount').val(data.fob);
        j1('#cm_amount').val(data.cm);

        j1('#wo_no').val(data.wo_no);
        j1('#qty_order').val(data.qty_order);
        j1('#qty_adjsupply').val(data.qty_adjsupply);
        j1('#qty_complete').val(data.sewing_good);
        var qty_bal=data.qty_order-data.qty_adjsupply-data.sewing_good;
        qty_bal=qty_bal < 0 ? 0 : qty_bal;

        j1('#qty_balance').val(qty_bal);
        j1('#qty_target_day').val(data.qty_target_day);
        j1('#lc1').val(data.lc1);
        j1('#lc2').val(data.lc2);
        j1('#lc3').val(data.lc3);
        j1('#day_estimate').val(data.day_estimate);
        j1('#cutting_factory_id').val(data.cutting_factory_id);
        j1('#production_line_id').val(data.production_line_id);
        if (data.adding_process=="1") {
            j1('#adding_process').val(data.adding_process);
            j1('#adding_process_check').prop('checked', true);
            replaceClass("row_adding_process", "d-none", "d-block");
            j1('#desc_adding_process').val(data.adding_process_desc);
        }
        j1('#plot_setting').val(data.plot_setting);

        j1('#plot_setting').val(data.plot_setting);
        j1('#tgl_fabric').val(data.fabric_eta);
        j1('#planner').val(data.originator);
        j1('#tgl_cutting').val(data.cutting_date);
        j1('#tgl_shipment').val(data.shipment_date);
        j1('#tgl_mulai').val(data.start_date);
        j1('#tgl_selesai').val(data.finish_date);
        j1('#created_by').val(data.created_by);
        j1('#id').val(data.id);
        // j1('#hour_balance').val(data.hour_balance);

        url_delete = url_delete.replace(':id', data.id);
        j1("#btnDelete").attr("href", url_delete);
        
        j1('#submit').text("Update");
        j1("#btnDelete").show();

        // if (crt_by !== data.created_by) {
        if (data.is_editable !== 1) {
            j1('#submit').hide();
            j1("#btnDelete").hide();
        }
        if (data.plot_setting=='PICK_DATE'){
            j1("#tgl_mulai").prop("readonly",false);
        }
    }

    j1('#modal-xl').modal('show');
}
function init_form_schedule(editMode,url_store,url_update) {
    if (editMode) {
        j1('#modal-title').html("Edit Schedule");
        j1('#form_wo').attr('action', url_update);
    } else {
        j1('#modal-title').html("Create Schedule");
        j1('#form_wo').attr('action', url_store);
        j1('#created_by').val(crt_by);
    }
    j1('#rekap_detail_id').val('');
    j1('#or_qty').val('');
    j1('#ex_fact').val('');
    j1('#fob_amount').val('');
    j1('#cm_amount').val('');
    j1('#wo_no').val('');
    j1('#qty_order').val('');
    j1('#qty_adjsupply').val('');
    j1('#qty_complete').val('');
    j1('#qty_balance').val('');
    j1('#qty_target_day').val('');
    j1('#lc1').val('100');
    j1('#lc2').val('100');
    j1('#lc3').val('100');
    j1('#day_estimate').val('');
    j1('#cutting_factory_id').val('');
    j1('#production_line_id').val('');
    j1('#plot_setting').val('LAST_SCHEDULE');
    j1('#prod_wo').empty();
    j1('#prod_wo').val('');
    j1('#tgl_fabric').val('');
    j1('#planner').val('');
    j1('#tgl_cutting').val('');
    j1('#tgl_shipment').val('');
    j1('#tgl_mulai').val('');
    j1('#tgl_selesai').val('');
    j1('#id').val('');
    j1('#adding_process').prop('checked', false);
    j1('#labelsmv').html('');
    j1('#labelline').html('');

    // j1('#hour_balance').val('');
    j1('#submit').show();
    j1("#btnDelete").hide();
    j1("#tgl_mulai").prop("readonly",true);

    j1('#adding_process').val(0);
    j1('#adding_process_check').prop('checked', false);
    replaceClass("row_adding_process", "d-block", "d-none");
    j1('#desc_adding_process').val('');

}
function calculate_day_estimate(url) {
    var woid=strFloat(j1('#id').val());
    var wo_no=(j1('#wo_no').val());
    var qtorder=strFloat(j1('#qty_order').val());
    var qtadjsupply=strFloat(j1('#qty_adjsupply').val());
    var qtcomplete=strFloat(j1('#qty_complete').val());

    var tday=strFloat(j1('#qty_target_day').val());
    var lc1=strFloat(j1('#lc1').val());
    var lc2=strFloat(j1('#lc2').val());
    var lc3=strFloat(j1('#lc3').val());
    var dt_start=(j1('#tgl_mulai').val());
    var line_id=(j1('#production_line_id').val());
    // var hour_balance=strFloat(j1('#hour_balance').val());

    var qty_bal=qtorder-qtadjsupply-qtcomplete;
    qty_bal = qty_bal < 0 ? 0 : qty_bal;
    j1('#qty_balance').val(strFloat(qty_bal));

    if (wo_no!==0&&qtorder!==0&&tday!==0&&lc1!==0&&lc2!==0&&lc3!==0&&dt_start!==''&&line_id!==0) {
        var schedule=get_schedule(url,woid,wo_no,qtorder,qtadjsupply,qtcomplete,tday,lc1,lc2,lc3,dt_start,line_id);
        if (schedule!==0) {
            var day_est=JSON.stringify(schedule.day_estimate);
            var tgl_start=JSON.stringify(schedule.tgl_mulai);
            var tgl_fin=JSON.stringify(schedule.tgl_selesai);

            var cutting_date=new Date(tgl_start);
            if($('#adding_process').prop('checked')) {
               cutting_date.setDate(cutting_date.getDate() - 20);
            } else {
               cutting_date.setDate(cutting_date.getDate() - 6);
            }
            cutting_date=cutting_date.toISOString().slice(0, 10);
            j1('#tgl_cutting').val(cutting_date);

            j1('#day_estimate').val(day_est.replaceAll('"',''));
            if (j1('#plot_setting').val()!=='PICK_DATE') {
                j1('#tgl_mulai').val(tgl_start.replaceAll('"',''));
            }
            j1('#tgl_selesai').val(tgl_fin.replaceAll('"',''));
        } else {
            // j1('#hour_balance').val(0);
        }
    }
}
function fill_combo_wo_line(url,lineid,plotsetting) {
    if (plotsetting=='BEFORE_WO'||plotsetting=='AFTER_WO') {
        let list_wo=get_list_wo_line(url,lineid);
        $('#prod_wo').empty();
        $('#prod_wo').append("<option disabled selected>Select WO Line</option>");
        $.each(list_wo, function (key, value) { 
            $('#prod_wo').append("<option value="+value.id+">" + value.wo_no + " / Fin Date : " + value.finish_date + "</option>");
        })
    }
}
function set_start_date(url) {
    var isedit=j1('#modal-title').html();
    if (j1('#plot_setting').val()=='BEFORE_WO'&&j1('#prod_wo').val()==null) {
        return "";
    }
    if (j1('#plot_setting').val()=='AFTER_WO'&&j1('#prod_wo').val()==null) {
        return "";
    }
    var line_avail=get_start_date(url,j1('#production_line_id').val(),j1('#prod_wo').val(),j1('#plot_setting').val());
    if (line_avail!==0) {
        var tgl=JSON.stringify(line_avail.tanggal);
        var bal=JSON.stringify(line_avail.hour_balance);
        tgl=tgl.replaceAll('"','');
        bal=bal.replaceAll('"','');

        j1('#tgl_mulai').val(tgl);

        // j1('#hour_balance').val(bal);
    } else {
        // j1('#hour_balance').val(0);
    }
}

function view_all_or() {
    j1("#frmResetBuyerOR").submit();
}

function show_or_buyer_new() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const orbuyer = urlParams.get('or_buyer');
    let or_buyer = j1('#or_buyer').val();

    // alert(orbuyer+' --- '+or_buyer);
    if (orbuyer==null) {
        j1('#modal-buyer').modal('show');
    } else if (orbuyer==or_buyer) {
        // j1('#modal-buyer').modal('hide');
        open_form_schedule(false,null,url_store,url_update,url_delete);
    } else {
        j1('#modal-buyer').modal('show');
        // j1("#frmBuyerSearch").submit();
    }
}

function show_or_buyer_todel() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const orbuyer = urlParams.get('or_buyer');
    let or_buyer = j1('#or_buyer').val();

    if (orbuyer==or_buyer) {
        j1('#modal-buyer').modal('hide');
        open_form_schedule(false,null,url_store,url_update,url_delete);
    } else {
        j1("#frmBuyerSearch").submit();
    }
}

function validateMyForm() {
    const allowed_role=['SYS_ADMIN', 'PPIC_PLANNER'];
    var format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    var user_role=($('#user_role').val());
    var wo_no=($('#wo_no').val());
    var wo_id=($('#id').val());
    var line_id=($('#production_line_id').val());
    var plot_setting=($('#plot_setting').val());
    var qty_wo=strFloat($('#qty_order').val());
    var qty_adjsupply=strFloat($('#qty_adjsupply').val());
    var qty_target=strFloat($('#qty_target_day').val());
    var qty_balance=strFloat($('#qty_balance').val());
    var lc1=strFloat($('#lc1').val());
    var lc2=strFloat($('#lc2').val());
    var lc3=strFloat($('#lc3').val());
    var tgl_fabric= new Date($('#tgl_fabric').val());
    var tgl_start= new Date($('#tgl_mulai').val());
    var tgl_selesai= new Date($('#tgl_selesai').val());
    var tgl_shipm= new Date($('#tgl_shipment').val());

    if(format.test(wo_no)) {
        alert("WO tidak boleh mengandung karakter spesial");
        return false;
    }
    if(allowed_role.includes(user_role)==false) {
        alert("Bukan role PPIC Planner");
        return false;
    }
    if(wo_no=='') {
        alert("Work Order number cannot blank");
        return false;
    }
    if(tgl_fabric>tgl_start) {
        alert("Fabric date cannot greather than start production");
        return false;
    }
    if(tgl_selesai>tgl_shipm) {
        // alert("Shipment date cannot less than finish production");
        // return false;
    }
    if($('#tgl_mulai').val()==null || $('#tgl_mulai').val()=='') {
        alert("Start date cannot blank");
        return false;
    }
    if($('#tgl_selesai').val()==null || $('#tgl_selesai').val()=='') {
        alert("Finish date cannot blank");
        return false;
    }
    if(qty_wo==0) {
        alert("Enter Qty Order WO");
        return false;
    }
    if(qty_target==0) {
        alert("Enter Qty Target /Day");
        return false;
    }
    if(qty_balance<0) {
        alert("Qty WO more than Qty OR");
        return false;
    }
    if(lc1<=0||lc2<=0||lc3<=0) {
        alert("Learning Curve cannot less than zero");
        return false;
    }
    if(lc1>100||lc2>100||lc3>100) {
        alert("Learning Curve cannot more than 100");
        return false;
    }
    if(plot_setting=='PICK_DATE') {
        var tgl= ($('#tgl_mulai').val());
        var isallowed_pickdate=get_countwo_line(url_wocount_line,wo_id,line_id,tgl);
        if(isallowed_pickdate>0) {
            // alert("Pick date hanya untuk WO pertama pada line, gunakan LAST/BEFORE/AFTER");
            // return false;
        }
    }
    if($('#adding_process').is(':checked')) {
        var adding_proc = $('#desc_adding_process').val();
        if(adding_proc==null || adding_proc=='') {
            alert("Adding Process cannot blank");
            return false;
        }
    }
    calculate_day_estimate(url_get_schedule);
    return true;
}
function strFloat(n) {
    n=+n || 0
    return n;
}
function show_smv(url,itemnumber,prodline) {
    var data=get_smv(url,itemnumber,prodline);
    j1("#labelsmv").html('Smv:'+data.datasmv.totalsmv);
    j1("#labelline").html('Operator:'+data.datasmv.totalop);
}

function prodline_eff(url,itemnumber) {
    // var data=get_prodline_eff(url,itemnumber);
    // j1('#production_line_id').empty();
    // j1('#production_line_id').append("<option disabled selected>Select Production Line</option>");
    // j1.each(data, function(i, item) {
    //     j1('#production_line_id').append('<option value="'+data[i].id+'">'+data[i].line+'</option>');
    // });
}

// =====================================================================
// ========================== AJAX FUNCTION ============================
// =====================================================================

function get_schedule(url,woid,wo_no,qtorder,qtadjsupply,complete,tday,lc1,lc2,lc3,dt_start,line_id,hour_balance) {
    // var url = "{{route('ppic.schedule.get_schedule',[':woid',':wo_no',':qtorder',':tday',':lc1',':lc2',':lc3',':dt_start',':line_id',':hour_balance'])}}";
    url = url.replace(':woid', woid);
    url = url.replace(':wo_no', wo_no);
    url = url.replace(':qtorder', qtorder);
    url = url.replace(':qtadjsupply', qtadjsupply);
    url = url.replace(':complete', complete);
    url = url.replace(':tday', tday);
    url = url.replace(':lc1', lc1);
    url = url.replace(':lc2', lc2);
    url = url.replace(':lc3', lc3);
    url = url.replace(':dt_start', dt_start);
    url = url.replace(':line_id', line_id);
    // url = url.replace(':hour_balance', hour_balance);
   
    var return_first = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    url: url,
                    type: 'GET',
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response;
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
        return lbr;
    }(); 
    return return_first;
}
function get_start_date(url,line_id,woid,timing) {
    // var url = "{{route('ppic.schedule.last_line_available_date',[':line_id'])}}"; 
    url = url.replace(':line_id', line_id);
    url = url.replace(':woid', woid);
    url = url.replace(':timing', timing);

    var return_first = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    url: url,
                    type: 'GET',
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response;
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
        return lbr;
    }(); 
    return return_first;
}
function get_list_wo_line(url,line_id) {
    // var url = "{{route('ppic.schedule.wo_by_line',[':line_id'])}}";
    url = url.replace(':line_id', line_id);
    var return_first = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    url: url,
                    type: 'GET',
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response
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
        return lbr;
    }(); 
    return return_first;
}
function get_countwo_line(url,woid,line_id,tanggal) {
    // var url = "{{route('ppic.schedule.wo_by_line',[':line_id'])}}";
    if (woid=='') {
        woid=0;
    }
    url = url.replace(':wo_id', woid);
    url = url.replace(':line_id', line_id);
    url = url.replace(':tanggal', tanggal);

    var return_first = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    url: url,
                    type: 'GET',
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response
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
                        lbr=0;
                        return lbr;
                    },
                });
        return lbr;
    }(); 
    return return_first;
}
function get_smv(url,itemnumber,prodline) {
    // var url = "{{route('ppic.schedule.get_totalsmv',[':itemnumber',':prodline'])}}";
    // url = url.replace(':itemnumber', itemnumber);
    // url = url.replace(':prodline', prodline);

    var return_first = function () {
        var lbr = 0;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    async: false,
                    url: url,
                    type: 'POST',
                    data: {
                        "itemnumber": itemnumber,
                        "prodline": prodline
                    },
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response
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
                        lbr=0;
                        return lbr;
                    },
                });
        return lbr;
    }(); 
    return return_first;
}
function get_prodline_eff(url,itemnumber) {
    // url = url.replace(':itemnumber', itemnumber);

    var return_first = function () {
        var lbr = 0;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    async: false,
                    url: url,
                    type: 'POST',
                    data: {
                        "itemnumber": itemnumber
                    },
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response
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
                        lbr=0;
                        return lbr;
                    },
                });
        return lbr;
    }(); 
    return return_first;
}