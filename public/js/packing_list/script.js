$("#addSize").click(function () {
    const input = document.getElementById('kemasan_induk').value;
    const input1 = document.getElementById('nw_induk').value;
    const input2 = document.getElementById('gw_induk').value;
    const buyer = document.getElementById('buyer').value;
    console.log(buyer)
    var html = '';
    html += '<div class="cards-18" style="padding: 30px 35px">';
    html += '<div class="title-22 text-center">Quantity Carton</div>';
    html += '<div class="justify-center"><div class="borderBlue"></div></div>';
    html += '<div class="row mt-4">';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Qty Carton</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10 qty_carton_' + i + '" id="qty_carton_' + i + '" name="qty_carton_' + i + '" placeholder="masukkan qty carton..." >';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Satuan</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10" id="satuan_' + i + '" name="satuan_'+ i + '" value="'+input+' "placeholder="masukkan satuan...">';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">NW</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10" id="NW_' + i + '" name="NW_' + i + '"  value="'+input1+'" placeholder="masukkan NW..." required>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">GW</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10" id="GW_' + i + '" name="GW_' + i + '" value="'+input2+'" placeholder="masukkan GW..." required>';
    html += '</div>';
    html += '</div>';
    if (buyer == 'MARUBENI CORPORATION JEPANG' || buyer == 'MARUBENI FASHION LINK LTD.') {
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Warehouse</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10" id="warehouse_' + i + '" name="warehouse_' + i + '" placeholder="masukkan warehouse..." required>';
    html += '</div>';
    html += '</div>';
    }
    html += '<div class="col-12"><div class="title-sm">Size & Quantity</div></div>';
    html += '<input type="hidden" id="jumlahRowColor_'+i+'" name="jumlahRowColor_'+i+'" value="0">'
    html += '<div id="newRowCarton_' + i + '"></div>';
    html += '<div class="flexx gap-5 w-100">';
    html += ' <button type="button" class="btn-yellow btn-block mt-3"  id="addCarton_'+i+'" style="border-radius:10px">Add Color<i class="ml-3 fas fa-palette"></i></button>';
    html += ' <button type="button" class="btn-red btn-block mt-3"  onclick="dd('+i+')" style="border-radius:10px">Delete Color<i class="ml-3 fas fa-trash"></i></button>';
    html += '</div>';
    html += '</div>';

    $('#newRowSize').append(html);
    // console.log("i", i)
    var j = 0;
    var z = i;
    $("#addCarton_"+z).click(function () {
        var html = '';
        html += '<div class="row mt-3">';
        html += '<div class="col-12 mb-4"><div class="borderlight"></div></div>';
        html += '<div class="col-12">';
        html += '<div class="title-sm">Color Code</div>';
        html += '<div class="input-group flex mt-1 mb-3">';
        html += '<div class="input-group-prepend">';
        html += '<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-palette"></i></span>';
        html += '</div>';
        html += '<select class="form-control border-input-10 js-states pointer ColorCode'+z+' multipleSelect" id="color_code_' + z + '_' + j + '" multiple="multiple" name="color_code_' + z + '_' + j + '[]" required>';
        html += '<option> </option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-12"><div class="title-sm">Size & Quantity</div></div>';
        var zzz = 0;
        var jj = j;
        loop1:
            for (const property in datasize) {
                if (property.includes("size") && !property.includes("jumlah_size")) {
        loop2:
                    for (let zz = 0; zz < 20; zz++) {
                        if (property == "size" + zz) {
                            if (datasize[property] != null && datasize[property] != "") {
                                var jml = datasize["jumlah_size" + zz] == null ? 0 : datasize["jumlah_size" + zz];
                                html += '<div class="col-lg-2 col-md-4">';
                                html += '<div class="input-group date mt-1 mb-3">';
                                html += '<div class="input-group-append">';
                                html += '<input type="text" class="custom-calendar sizeAppend size-1" id="size1" value="'+datasize[property]+'"  id="nama_size_' + z + '_' + jj + '" name="nama_size_' + z + '_' + jj + '[]"  placeholder="...."/>';
                                html += '</div>';
                                html += '<input type="text" class="form-control border-input-10 jumlah_size_' + z + '" value="" id="jumlah_size_' + z + '_' + jj + '" name="jumlah_size_' + z + '_' + jj + '[]" value = "0" placeholder="0"/>';
                                html += '</div>';
                                html += '</div>';
                            }
                            break loop2;
                        }
                    }
                }
            }
        html += '</div>';
         $("#newRowCarton_"+z).append(html);
        // $('#color_code_' + z + '_' + j ).select2({
        //     theme: 'bootstrap4',
        //     placeholder:'Pilih Color',
        //     searchInputPlaceholder: 'search',
        //     data: colours
        // });
        
        $('#color_code_' + z + '_' + j).select2({
            theme: 'bootstrap4',
            placeholder:'Pilih Color',
            searchInputPlaceholder: 'search',
            data: colours
        });
                    
        $('#color_code_' + z + '_' + j).on("select2:select", function (evt) {
        var element = evt.params.data.element;
        var $element = $(element);
        
        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
        
        });
        
        $('#color_code_' + z + '_' + jj).on('select2:selecting', function (e) { 
            var lenColorCode = $(".ColorCode" + z).length;
            // console.log(lenColorCode)
            for (var ii = 0; ii < lenColorCode; ii++){
                if(ii ==  jj){
                    continue
                }
                var colorCode = $('#color_code_' + z + '_' + ii).val();
                if ( colorCode == e.params.args.data.id) {
                    swal({
                        position: 'center',
                        type: 'warning',
                        title: 'Warning',
                        icon: 'warning',
                        text: 'Color Code Tidak Boleh Sama',
                        showConfirmButton: false,
                        timer: 1800
                    });
                    return false;
                }
            }
        });
        //   console.log('z', z, 'jj',jj);
        $("#jumlahRowColor_" + z).val(jj);
        j++
   })
    i++
    $("#jumlahRow").val(i)
});

function dd(a) {
    const card = document.getElementById('newRowCarton_'+a); 
    card.removeChild(card.lastChild);
}