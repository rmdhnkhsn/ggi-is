$("#addSize").click(function () {
    var html = '';
    html += '<div class="cards-18" style="padding: 30px 35px">';
    html += '<div class="title-22 text-center">Quantity Carton</div>';
    html += '<div class="justify-center"><div class="borderBlue"></div></div>';
    html += '<div class="row mt-4">';
    // html += '<div class="col-md-6">';
    // html += '<div class="title-sm">Color Code</div>';
    // html += '<div class="input-group flex mt-1 mb-3">';
    // html += '<div class="input-group-prepend">';
    // html += '<span class="inputGroupBlue" style="height:40px;width:50px"><i class="fs-20 fas fa-palette"></i></span>';
    // html += '</div>';
    // html += '<select class="form-control border-input-10 select2bs4 pointer ColorCode" id="color_code" name="color_code_'+i+'" required>';
    // html += '<option selected> </option>';
    // html += '</select>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-md-6">';
    // html += '<span class="title-sm">Color Code</span>';
    // html += '<div class="input-group mt-1 mb-3">';
    // html += '<input type="text" class="form-control border-input-10" id="color_code" name="color_code_' + i + '" placeholder="masukkan color code..." required>';
    // html += '</div>';
    // html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Qty Carton</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10 qty_carton_' + i + '" id="qty_carton_' + i + '" name="qty_carton_' + i + '" placeholder="masukkan qty carton..." required>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">Satuan</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10" id="satuan_' + i + '" name="satuan_'+ i + '" placeholder="masukkan satuan...">';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">NW</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10" id="NW_' + i + '" name="NW_' + i + '" placeholder="masukkan NW..." required>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<div class="title-sm">GW</div>';
    html += '<div class="input-group mt-1 mb-3">';
    html += '<input type="text" class="form-control border-input-10" id="GW_' + i + '" name="GW_' + i + '" placeholder="masukkan GW..." required>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-12"><div class="title-sm">Size & Quantity</div></div>';

    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend size-1" id="size1" name="nama_size_' + i + '[]"  placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend  size-2" id="size2" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend  size-3" id="size3" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend  size-4" id="size4" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend  size-5" id="size5" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend size-6" id="size6" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend size-7" id="size7" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend size-8" id="size8" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend size-9" id="size9" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend size-10" id="size10" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend size-11" id="size11" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '<div class="col-lg-2 col-md-4">';
    // html += '<div class="input-group date mt-1 mb-3">';
    // html += '<div class="input-group-append">';
    // html += '<input type="text" class="custom-calendar sizeAppend size-12" id="size12" name="nama_size_' + i + '[]" placeholder="...."/>';
    // html += '</div>';
    // html += '<input type="text" class="form-control border-input-10 jumlah_size_' + i + '" name="jumlah_size_' + i + '[]" value = "0" placeholder="0"/>';
    // html += '</div>';
    // html += '</div>';
    // html += '</div>';
    html += '<input type="hidden" id="jumlahRowColor_'+i+'" name="jumlahRowColor_'+i+'" value="0">'
    html += '<div id="newRowCarton_' + i + '"></div>';
    html += ' <button type="button" class="btn-yellow btn-block mt-3"  id="addCarton_'+i+'" style="border-radius:10px">Add Color<i class="ml-3 fas fa-box-open"></i></button>';
    html += '</div>';


    $('#newRowSize').append(html);
// console.log(datasize)
    // const size1 = document.getElementsByClassName('size-1');
    // Array.from(size1).forEach(function (element) {
    //     element.value = datasize.size1;
    // });
    // const size2 = document.getElementsByClassName('size-2');
    // Array.from(size2).forEach(function (element) {
    //     element.value = datasize.size2;
    // });
    // const size3 = document.getElementsByClassName('size-3');
    // Array.from(size3).forEach(function (element) {
    //     element.value = datasize.size3;
    // });
    // const size4 = document.getElementsByClassName('size-4');
    // Array.from(size4).forEach(function (element) {
    //     element.value = datasize.size4;
    // });
    // const size5 = document.getElementsByClassName('size-5');
    // Array.from(size5).forEach(function (element) {
    //     element.value = datasize.size5;
    // });
    // const size6 = document.getElementsByClassName('size-6');
    // Array.from(size6).forEach(function (element) {
    //     element.value = datasize.size6;
    // });
    // const size7 = document.getElementsByClassName('size-7');
    // Array.from(size7).forEach(function (element) {
    //     element.value = datasize.size7;
    // });
    // const size8 = document.getElementsByClassName('size-8');
    // Array.from(size8).forEach(function (element) {
    //     element.value = datasize.size8;
    // });
    // const size9 = document.getElementsByClassName('size-9');
    // Array.from(size9).forEach(function (element) {
    //     element.value = datasize.size9;
    // });
    // const size10 = document.getElementsByClassName('size-10');
    // Array.from(size10).forEach(function (element) {
    //     element.value = datasize.size10;
    // });
    // const size11 = document.getElementsByClassName('size-11');
    // Array.from(size11).forEach(function (element) {
    //     element.value = datasize.size11;
    // });
    // const size12 = document.getElementsByClassName('size-12');
    // Array.from(size12).forEach(function (element) {
    //     element.value = datasize.size12;
    // });
    console.log("i", i)
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
        html += '<span class="inputGroupBlue" style="height:40px;width:50px"><i class="fs-20 fas fa-palette"></i></span>';
        html += '</div>';
        html += '<select class="form-control border-input-10 select2bs4 pointer ColorCode'+z+'" id="color_code_' + z + '_' + j + '" name="color_code_' + z + '_' + j + '" value="BLACK" required>';
        html += '<option selected> </option>';
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
                                html += '<input type="text" class="form-control border-input-10 jumlah_size_' + z + '" value="' + 0 +'" id="jumlah_size_' + z + '_' + jj + '" name="jumlah_size_' + z + '_' + jj + '[]" value = "0" placeholder="0"/>';
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
        //  ListColor(colours);
        $('#color_code_' + z + '_' + j ).select2({
            theme: 'bootstrap4',
            placeholder:'Pilih Color',
            searchInputPlaceholder: 'search',
            data: colours
        });
        //   var classList = document.getElementById("myDiv").classList;
        // console.log($(".ColorCode"+z));
        // console.log($(".ColorCode" + z).length);
        
        // Bind an event
        
        $('#color_code_' + z + '_' + jj).on('select2:selecting', function (e) { 
            var lenColorCode = $(".ColorCode" + z).length;
            console.log(lenColorCode)
            for (var ii = 0; ii < lenColorCode; ii++){
                if(ii ==  jj){
                    continue
                }
                var colorCode = $('#color_code_' + z + '_' + ii).val();
                if ( colorCode == e.params.args.data.id) {
                    alert("color code gak boleh sama")
                    return false;
                }
            }
        });
          console.log('z', z, 'jj',jj);
        $("#jumlahRowColor_" + z).val(jj);
        
        j++
   })
    i++
    $("#jumlahRow").val(i)
});

