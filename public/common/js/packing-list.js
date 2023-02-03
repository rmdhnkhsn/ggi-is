
$("#addRow").click(function () {
    var html = '';
    html += '<div class="row mt-4" id="inputFormRow">';
    html += '<div class="col-12 text-center mb-3"><div class="title-20">Input Size</div><div class="justify-center"><div class="borderBlue" style="width:40px !important"></div></div></div>';
    html += '<div class="col-12"><span class="title-sm">Color Code</span><div class="input-group mt-1 mb-3"><input type="text" class="form-control border-input-10" id="color_code" name="color_code[]" placeholder="masukkan kode..." required></div></div>';
    html += '<div class="col-12"><span class="title-sm">Size</span></div>';
    html += '<div class="col-md-4"><div class="input-group date mt-1 mb-3"><div class="input-group-append"><div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:50px"><span>S</span></div></div><input type="number" class="form-control border-input-10 amount"  onblur="findTotal()" id="S" name="S[]" placeholder="size..."/></div></div>';
    html += '<div class="col-md-4"><div class="input-group date mt-1 mb-3"><div class="input-group-append"><div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:50px"><span>M</span></div></div><input type="number" class="form-control border-input-10 amount"  onblur="findTotal()" id="M" name="M[]" placeholder="size..."/></div></div>';
    html += '<div class="col-md-4"><div class="input-group date mt-1 mb-3"><div class="input-group-append"><div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:50px"><span>L</span></div></div><input type="number" class="form-control border-input-10 amount"  onblur="findTotal()" id="L" name="L[]" placeholder="size..."/></div></div>';
    html += '<div class="col-lg-3"><div class="input-group date mt-1 mb-3"><div class="input-group-append"><div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:50px"><span>LL</span></div></div><input type="number" class="form-control border-input-10 amount"  onblur="findTotal()" id="LL" name="LL[]" placeholder="size..."/></div></div>';
    html += '<div class="col-lg-3"><div class="input-group date mt-1 mb-3"><div class="input-group-append"><div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:50px"><span>3L</span></div></div><input type="number" class="form-control border-input-10 amount"  onblur="findTotal()" id="L3" name="L3[]" placeholder="size..."/></div></div>';
    html += '<div class="col-lg-3"><div class="input-group date mt-1 mb-3"><div class="input-group-append"><div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:50px"><span>4L</span></div></div><input type="number" class="form-control border-input-10 amount"  onblur="findTotal()" id="L4" name="L4[]" placeholder="size..."/></div></div>';
    html += '<div class="col-lg-3"><div class="input-group date mt-1 mb-3"><div class="input-group-append"><div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:50px"><span>5L</span></div></div><input type="number" class="form-control border-input-10 amount"  onblur="findTotal()" id="L5" name="L5[]" placeholder="size..."/></div></div>';
    html += '<div class="col-12"><span class="title-sm">Qty Carton</span><div class="input-group mt-1 mb-3"><input type="text" class="form-control border-input-10" id="qty_carton" name="qty_carton[]"placeholder="masukkan nw..." required></div></div>';
    html += '<div class="col-12"><span class="title-sm">NW</span><div class="input-group mt-1 mb-3"><input type="text" class="form-control border-input-10" id="NW" name="NW[]" placeholder="masukkan nw..." required></div></div>';
    html += '<div class="col-12"><span class="title-sm">GW</span><div class="input-group mt-1 mb-3"><input type="text" class="form-control border-input-10" id="GW" name="GW[]" placeholder="masukkan gw..." required></div></div>';
    html += '<div class="col-12"><span class="title-sm">QTY</span><div class="input-group mt-1 mb-3"><input type="number" class="form-control border-input-10" id="totalordercost"  name="qty_size[]" placeholder="masukkan qty..." readonly></div></div>';
    html += '</div>';

    $('#newRow').append(html);
});

//   ===================


//   ===================

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
/* When click New customer button */
});
$('#wo_no').keyup(function(){
// console.log("ok");
var wo_no = $(this).val();

    if(wo_no){
        $.ajax({
        data: {
          wo_no: wo_no,
        },
        url: '{{ route("packing.getDataWo") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          // $('#F0101_ALPH').val(data.F0101_ALPH)
          $('#style_name').val(data.style_name)
          $('#contract').val(data.contract)
          // $('#group').val(data.group)
          // $('#gaji').val(data.gp_tun)
        },

      });
    }
  }); 

   function storeSize(){
        $.ajax({
            data: {
                id: id,
                id_packing: id_packing,
                color_code: color_code,
                S: S,
                M: M,
                L: L,
                LL: LL,
                L3: L3,
                L4: L4,
                L5: L5,
                NW: NW,
                GW: GW,
                qty_carton: qty_carton,
            },
            url: '{{ route("packing.storeSize") }}',
            type: "post",
            dataType: 'json',            
            success: function (data) {     
                location.replace("{{ url('/prd/finishing/packing-list') }}") 
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

    function showSize(id_packing){
        $.ajax({
            data: {
                id_packing: id_packing,
            },
            url: '{{ route("packing.storeSize") }}',
            type: "get",
            dataType: 'json',            
            success: function (data) {     
            // alert('success')
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
}
    

// ===================

  document.getElementById('save').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Input Packing Report Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
  document.getElementById('save2').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Data Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });

//   ======================

