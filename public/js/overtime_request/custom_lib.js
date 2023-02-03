function add_row() {
    $("#DTtable > tbody").append(' <tr> <td><button class="btn-delete-row" onClick="deleteRow(this); return false;"><i class="fs-20 fas fa-times"></i></button></td><td><input type="text" class="form-control borderInput livesearch" id="nik" name="nik[]" placeholder="NIK" style="width:120px" onchange="search_pekerja(this);" required></td> <td><input type="text" class="form-control borderInput nama" id="nama" name="nama[]" placeholder="Nama Pekerja" style="width:160px" readonly></td> <td> <input type="hidden" class="form-control borderInput gaji" id="gaji" name="gaji[]" placeholder="gaji" style="width:160px"> <input type="text" class="form-control borderInput group" id="group" name="group[]" placeholder="Group" style="width:160px" readonly> </td> <td><input type="text" class="form-control borderInput" id="" name="target_pekerjaan[]" placeholder="Masukan Target Pekerjaan" style="width:280px" required></td> <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_awal[]" placeholder="00.00" style="width:130px" required></td> <td><input type="time" class="form-control borderInput" id="" name="rencana_jam_akhir[]" placeholder="00.00" style="width:130px" required></td> <td><input type="number" step="0.01" min="0.5" class="form-control borderInput" id="" name="rencana_total[]" placeholder="0" style="width:100px" required></td></tr>');
    autofill_target_pekerjaan();
}
function deleteRow(childElem) {
    var row = $(childElem).closest("tr"); // find <tr> parent
    row.remove();
}

$("#addRowWO").click(function () {
    var html = '';
    html += '<div class="cardFlat p-4 CariWO" id="inputFormRowWO">';
    html += '<div class="row">';
    html += '<div class="col-md-3 item-wo"><div class="title-sm">Nomor WO </div><input type="text" class="form-control borderInput livesearch mt-1 mb-3" id="wo" name="wo[]" onchange="search_wo(this);" placeholder="Masukan Nomor WO" required></div>';
    html += '<div class="col-md-3"><div class="title-sm">Buyer</div><input type="text" class="form-control borderInput mt-1 mb-3 buyer" id="buyer" name="buyer[]" placeholder="Masukan nama buyer (Contoh : Adidas, Erigo, H&M)" readonly required ></div>';
    html += '<div class="col-md-3"><div class="title-sm">Item</div><input type="text" class="form-control borderInput mt-1 mb-3 item" id="item" name="item[]" placeholder="Masukan nama item (contoh : Boxer, T-Shirt, Half Zip, dll)"  readonly required></div>';
    html += '<div class="col-md-3"><div class="title-sm">Target</div><input type="number" class="form-control borderInput mt-1 mb-3" id="target" name="target[]" placeholder="Masukkan Target..." required></div>';
    html += '</div>';
    html += '<button id="removeRowWO" type="button" class="removeRow"><i class="fas fa-times"></i></button>';
    html += '</div>';

    $('#newRowWO').append(html);
});

// remove row
$(document).on('click', '#removeRowWO', function () {
    $(this).closest('#inputFormRowWO').remove();
});

$(document).on('click', '#removeRowPO', function () {
    $(this).closest('#inputFormRowPO').remove();
});


$("#addRowPO").click(function () {
    var html = '';
    html += '<div class="cardFlat p-4" id="inputFormRowPO">';
    html += '<div class="row">';

    html += '<div class="col-md-3 item-wo">';
    html += '<div class="title-sm">Nomor PO</div>';
    html += '<input type="text" class="form-control borderInput livesearch mt-1 mb-3" id="wo" name="wo[]"  placeholder="Masukan Nomor PO" required>';
    html += '</div>';

    html += '<div class="col-md-3">';
    html += '<div class="title-sm">Buyer</div>';
    html += '<div class="input-group flex mt-1 mb-3">';
    html += '<div class="input-group-prepend">';
    html += '<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>';
    html += '</div>';
    html += '<select class="form-control borderInput buyerCoba" name="buyer[]" required="required">';
    html += '<option selected></option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';

    html += '<div class="col-md-3">';
    html += '<div class="title-sm">Item</div>';
    html += '<div class="input-group flex mt-1 mb-3">';
    html += '<div class="input-group-prepend">';
    html += '<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>';
    html += '</div>';
    html += '<select class="form-control borderInput select2Alt" name="item[]" required="required">';
    html += '<option value="" selected>Pilih Item</option>'
    html += '<option value="HANCA">HANCA</option>';
    html += '<option value="FABRIC">FABRIC</option>';
    html += '<option value="ACCESSORIES">ACCESSORIES</option>';
    html += '<option value="MESIN/SPARE PART">MESIN/SPARE PART</option>';
    html += '<option value="GARMEN">GARMEN</option>';
    html += '<option value="SAMPLE">SAMPLE</option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';

    html += '<div class="col-md-3">';
    html += '<div class="title-sm">Target</div>';
    html += '<input type="number" class="form-control borderInput mt-1 mb-3" id="target" name="target[]" placeholder="Masukkan Target..." required>';
    html += '</div>';
    html += '</div>';
    html += '<button id="removeRowPO" type="button" class="removeRow"><i class="fas fa-times"></i></button>';
    html += '</div>';

    $('#newRowPO').append(html);
    ListBuyer();
});

$("#addRowKualitatif").click(function () {
    console.log('ok');
    var html = '';
    html += '<div class="cardFlat p-4" id="inputFormRowBuyer">';
    html += '<div class="row">';
    html += '<div class="col-md-4">';
    html += '<div class="title-sm">Buyer</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<div class="input-group-append">';
    html += '<div class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></div>';
    html += '</div>';
    html += '<select class="form-control borderInput buyerCoba" name="buyer2[]" required="required">';
    html += '<option selected></option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-4">';
    html += '<div class="title-sm">Target</div>';
    html += '<input type="text" class="form-control borderInput mt-1 mb-3" id="target2" name="target2[]" placeholder="Masukkan Target..." required>';
    html += '</div>';
    html += '<div class="col-md-4">';
    html += '<div class="title-sm">Alasan</div>';
    html += '<input type="text" class="form-control borderInput mt-1 mb-3" id="what" name="alasan1[]" placeholder="Masukkan Alasan..." required>';
    html += '</div>';
    html += '<div class="col-12 accordionFlat">';
    html += '<div class="accordionItems" id="accordion">';
    html += '<div class="accordionHeaders" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="headingOne">';
    html += '<div class="title-16-dark3">ALASAN LAINNYA</div>';
    html += '<div class="icons">';
    html += '<div class="chevron">';
    html += '<i class="fas fa-angle-left"></i>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '<div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">';
    html += '<div class="bodyContents">';
    html += '<div class="row">';
    html += '<div class="col-md-6 mb-3">';
    html += '    <div class="title-sm">Alasan 2</div>';
    html += '    <input type="text" class="form-control borderInput mt-1" id="who" name="alasan2[]" placeholder="Masukkan alasan...">';
    html += '</div>';
    html += '<div class="col-md-6 mb-3">';
    html += '    <div class="title-sm">Alasan 3</div>';
    html += '    <input type="text" class="form-control borderInput mt-1" id="why" name="alasan3[]" placeholder="Masukkan alasan...">';
    html += '</div>';
    html += '<div class="col-md-6 mb-3">';
    html += '    <div class="title-sm">Alasan 4</div>';
    html += '    <input type="text" class="form-control borderInput mt-1" id="when" name="alasan4[]" placeholder="Masukkan alasan...">';
    html += '</div>';
    html += '<div class="col-md-6 mb-3">';
    html += '    <div class="title-sm">Alasan 5</div>';
    html += '    <input type="text" class="form-control borderInput mt-1" id="where" name="alasan5[]" placeholder="Masukkan alasan...">';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '<button id="removeKualitatif" type="button" class="removeRow"><i class="fas fa-times"></i></button>';
    html += '';

    $('#newRowKualitatif').append(html);
    ListBuyer();
});

// remove row
$(document).on('click', '#removeKualitatif', function () {
    $(this).closest('#inputFormRowBuyer').remove();
});

function autofill_target_pekerjaan() {
    // $('#DTtable > tbody  > tr').each(function(index, tr) { 
    // //   console.log(index);
    // //   console.log(tr);
    //   var tp=tr.find('input.target_pekerjaan').val();
    //   console.log(tp);
    // });
    var target_before = '';
    $("#DTtable > tbody  > tr").each(function (rowIndex) {
        $(this).find("td").each(function (cellIndex) {
            // alert("Row " + rowIndex + ", cell " + cellIndex + ": " + $(this).find("input[type=text]").val());
            // kolom target pekerjaan = 3
            if (cellIndex == 4) {
                var tp = $(this).find("input[type=text]").val();
                if (tp.length > 0) {
                    target_before = tp;
                }
                if (tp.length == 0 && target_before.length > 0) {
                    $(this).find("input[type=text]").val(target_before);
                }
            }
        });
    });
}

function validateMyForm() {
    var iskategori_lembur = $("#kategori_lembur .active").length;
    var btnkategori_lembur = $("#kategori_lembur .active").attr('id');

    if (iskategori_lembur == 0) {
        alert("Pilih kategori lembur");
        return false;
    }
    if (btnkategori_lembur == 'btnkualitatif') {
        if (validateKualitatif() == false) {
            return false;
        }
    }
    if (btnkategori_lembur == 'btnkuantitatif') {
        if (validateKuantitatif() == false) {
            return false;
        }
    }
    return true;
}
function validateKuantitatif() {
    var buyer = ($('#buyer').val());
    var item = ($('#item').val());
    var wo = ($('#wo').val());
    var target = ($('#target').val());
    const itemwo = document.getElementsByClassName('item-wo');

    if (itemwo.length == 0) {
        alert('Tambah WO atu PO ');
        return false;
    }
    if (buyer == '') {
        alert("Buyer tidak boleh kosong");
        return false;
    }
    if (item == '') {
        alert("Item tidak boleh kosong");
        return false;
    }
    if (wo == '') {
        alert("WO tidak boleh kosong");
        return false;
    }
    if (target == '') {
        alert("Target tidak boleh kosong");
        return false;
    }
    showLoading();
    return true;
}
function validateKualitatif() {
    var buyer = ($('#buyer2').val());
    var target = ($('#target2').val());
    var what = ($('#what').val());
    var who = ($('#who').val());
    var why = ($('#why').val());
    var when = ($('#when').val());
    var where = ($('#where').val());
    if (buyer == '') {
        alert("Buyer tidak boleh kosong");
        return false;
    }
    if (target == '') {
        alert("Target tidak boleh kosong");
        return false;
    }
    if (what == '') {
        alert("Alasan Tidak Boleh Kosong");
        return false;
    }
    showLoading();
    return true;
}
function clearKuantitatif() {
    $('#buyer').val('');
    $('#item').val('');
    $('#wo').val('');
    $('#target').val('');
}
function clearKualitatif() {
    $('#buyer2').val('');
    $('#target2').val('');
    $('#what').val('');
    $('#who').val('');
    $('#why').val('');
    $('#when').val('');
    $('#where').val('');
}
function strFloat(n) {
    n = +n || 0
    return n;
}


