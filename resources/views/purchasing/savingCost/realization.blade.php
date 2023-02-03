@extends("layouts.app")
@section("title","Realization")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush


@section("content")
  <section class="content">
    <div class="container-fluid savingCost">
        <form action="{{ route('savingCost.store_realization')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-12">
                    <div class="cards-20 p-4">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="title-20-grey">Purchase Plan</div>
                            </div>
                            <input type="hidden" id="id" name="id" value="{{$data->id}}">
                            <div class="col-md-4">
                                <div class="title-sm">Buyer</div>
                                <input type="hidden" class="form-control borderInput mt-1 mb-3" value="{{$data->buyer}}" id="buyer" name="buyer" placeholder="" readonly>
                                <input type="text" class="form-control borderInput mt-1 mb-3" value="{{$data->buyer_name}}" id="buyer_name" name="buyer_name" placeholder="" readonly>
                            </div>
                            <div class="col-md-4">
                                <div class="title-sm">Item</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" value="{{$data->item}}" id="item" name="item" placeholder="Input item">
                            </div>
                            <div class="col-md-4">
                                <div class="title-sm">Valid Date</div>
                                <div class="input-group flex mt-1 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" value="{{$data->valid_date}}" class="form-control borderInput" id="valid_date" name="valid_date">
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <div class="title-sm">Before</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3"  value="{{$data->before}}" id="before" name="before" placeholder="Masukan plan before">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">After</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3"  value="{{$data->after}}" id="after" name="after" placeholder="Masukan plan after">
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="cards-20 p-4">
                        <div class="row">
                            <div class="col-12 justify-start2 gap-3 mb-3">
                                <div class="title-20-grey mr-4">Purchase Realization</div>
                                <button type="button" id="addPO" class="btnSoftBlue">Add More PO</button>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">Amount Before</div>
                                <input type="hidden" id="nambah_po" name="nambah_po">
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="amount_before" name="amount_before1" value="{{$data->amount_before}}" placeholder="Input amount before" readonly>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">Amount After</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="amount_after" name="amount_after1" value="{{$data->amount_after}}" placeholder="Input amount after" readonly>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">Old Price</div>
                                <input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" id="oldprice12" value="{{$data->old_price}}" name="old_price1" placeholder="Input old price" required>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">New Price</div>
                                <input type="number" step="0.01" class="form-control borderInput mt-1 mb-3" value="{{$data->new_price}}" id="newprice12" name="new_price1" placeholder="Input new price" required>
                            </div>
                            <div class="col-md-12">
                                <div class="title-sm mb-1">Currency</div>
                                <div class="input-group flex mb-3">
                                    <div class="input-group-prepend">
                                        <select class="form-control pointer" id="currency12" name="currency1" style="border-radius:10px 0 0 10px">
                                            <option value="IDR">IDR</option> 
                                            <option value="USD"  {{ ( $data->currency == 'USD') ? 'selected' : '' }}>USD</option> 
                                            <option value="YPY"  {{ ( $data->currency == 'YPY') ? 'selected' : '' }}>YPY</option> 
                                            <option value="EUR"  {{ ( $data->currency == 'EUR') ? 'selected' : '' }}>EUR</option> 
                                            <option value="POUND"  {{ ( $data->currency == 'POUND') ? 'selected' : '' }}>POUND</option> 
                                        </select>
                                    </div>
                                    <input  type="number" step="0.01"  class="form-control borderInput" id="kurs12" name="kurs1" value="{{$data->kurs}}" placeholder="Insert Kurs">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">PO</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" value="{{$data->no_po}}" id="no_po" name="no_po1" placeholder="Input po">
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">Qty</div>
                                <input type="number" step="0.01" class="form-control borderInput mt-1 mb-3"  value="{{$data->qty}}" id="qty" name="qty1" placeholder="Input Qty">
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">UOM</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" value="{{$data->uom}}" id="uom12" name="uom1" placeholder="Input UOM">
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">Amount Saving</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="amount_saving" name="amount_saving1" value="{{$data->amount_saving}}" placeholder="Input Amount Saving" readonly>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">%Saving</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="saving" name="saving1" placeholder="Input %Saving" value="{{$data->saving}}" readonly>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">Remarks</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" value="{{$data->remark}}" id="remark" name="remark1" placeholder="Input remarks">
                            </div>
                        </div>
                    </div>
                    <div id="newPO"></div>
                </div>
                <div class="col-12 justify-start">
                    <button type="submit" class="btn-blue-md">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
    $(function () {
        $("input").change(function () {
            $("#amount_before").val(function () {
                var harga_lama = parseFloat($("#oldprice12").val());
                var kuantiti = parseFloat($("#qty").val());
                harga_lama = isNaN(harga_lama) ? 0 : harga_lama;
                kuantiti = isNaN(kuantiti) ? 0 : kuantiti;
                console.log(harga_lama * kuantiti);
                return harga_lama * kuantiti;
            });
            $("#amount_after").val(function () {
                var harga_baru = parseFloat($("#newprice12").val());
                var kuantiti = parseFloat($("#qty").val());
                harga_baru = isNaN(harga_baru) ? 0 : harga_baru;
                kuantiti = isNaN(kuantiti) ? 0 : kuantiti;
                return harga_baru * kuantiti;
            });
            $("#amount_saving").val(function () {
                var hitungan_sebelumnya = parseFloat($("#amount_before").val());
                var hitungan_baru = parseFloat($("#amount_after").val());
                hitungan_sebelumnya = isNaN(hitungan_sebelumnya) ? 0 : hitungan_sebelumnya;
                hitungan_baru = isNaN(hitungan_baru) ? 0 : hitungan_baru;
                amount_saving = hitungan_sebelumnya - hitungan_baru;
                return amount_saving;
            });
            $("#saving").val(function () {
                // mencari amount before
                var harga_lama = parseFloat($("#oldprice12").val());
                var harga_baru = parseFloat($("#newprice12").val());
                var kuantiti = parseFloat($("#qty").val());

                harga_lama = isNaN(harga_lama) ? 0 : harga_lama;
                harga_baru = isNaN(harga_baru) ? 0 : harga_baru;
                kuantiti = isNaN(kuantiti) ? 0 : kuantiti;

                amount_before = harga_lama * kuantiti;
                amount_after = harga_baru * kuantiti;
                amount_saving = amount_before-amount_after;

                rumusan = (amount_saving/amount_before) * 100
                return  parseFloat(rumusan).toFixed(2); 
            });
        });
    });
</script>
<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Apakah Anda Yakin?",
        text: "Setelah mengkonfirmasi, data akan secara permanent di hapus",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff5757",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Data Anda Kembali Aman", "error");
        }
    }); 
  });
</script>

<script>
    $('#date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>

<script>
    var tombol = 0;
    $("#addPO").click(function (e) {
        tombol++;
        var oldprice =  document.getElementById('oldprice12').value;
        var newprice =  document.getElementById('newprice12').value;
        var kurs =  document.getElementById('kurs12').value;
        var uom =  document.getElementById('uom12').value;
        var currency = $('#currency12 option:selected').text();
        // console.log(currency);

        // let optiongroup = '', 
        // html +='<option value="IDR" selected>IDR</option>'; 
        // html +='<option value="USD" selected>USD</option>'; 
        // html +='<option value="YPY" selected>YPY</option>';
        // html +='<option value="EUR" selected>EUR</option>'; 

        // if (currency == 'IDR') {
        //     }else if(currency == 'USD'){
        //     }else if(currency == 'YPY'){
        //     }else if(currency == 'EUR'){
        //     }else if(currency == 'POUND'){
        //         html +='<option value="POUND" selected>POUND</option>'; 
        //     }else{
        //         html +='<option value="IDR" selected>IDR</option>'; 
        //     }    

        var html = '';
            html +='<div class="cards-20 p-4 sipalingtambahpo" id_nya="'+tombol+'">';
            html +='<div class="row">';
            html +='<div class="col-12 mb-3">';
            html +='<div class="title-20-grey mr-4">Purchase Realization</div>';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">Amount Before</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3 sibefore" name="amount_before[]" placeholder="Input amount before" readonly>';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">Amount After</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3 siafter" name="amount_after[]" placeholder="Input amount after" readonly>';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">Old Price</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3 oldprice" value="'+oldprice+'" onchange="hitung(this)" name="old_price[]" placeholder="Input old price">';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">New Price</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3 newprice" value="'+newprice+'" onchange="hitung(this)" name="new_price[]" placeholder="Input new price">';
            html +='</div>';
            html +='<div class="col-md-12">';
            html +='<div class="title-sm mb-1">Currency</div>';
            html +='<div class="input-group flex mb-3">';
            html +='<div class="input-group-prepend">';
            html +='<select class="form-control pointer" id="currency" name="currency[]" style="border-radius:10px 0 0 10px">';  
            html +=`<option value="IDR" ${ currency == 'IDR' && 'selected' }>IDR</option>`; 
            html +=`<option value="USD" ${ currency == 'USD' && 'selected' }>USD</option>`; 
            html +=`<option value="YPY" ${ currency == 'YPY' && 'selected' }>YPY</option>`;
            html +=`<option value="EUR" ${ currency == 'EUR' && 'selected' }>EUR</option>`; 
            html +=`<option value="POUND" ${ currency == 'POUND' && 'selected' }>POUND</option>`; 
            html +='</select>';
            html +='</div>';
            html +='<input type="number" step="0.01"  class="form-control borderInput" name="kurs[]" value="'+kurs+'" placeholder="Insert Kurs">';
            html +='</div>';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">PO</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="no_po" name="no_po[]" placeholder="Input po">';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">Qty</div>';
            html +='<input type="number" step="0.01" class="form-control borderInput mt-1 mb-3 qty" onchange="hitung(this)" name="qty[]" placeholder="Input Qty">';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">UOM</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" value="'+uom+'" id="uom" name="uom[]" placeholder="Input UOM">';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">Amount Saving</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3 amountsaving" name="amount_saving[]" placeholder="Input Amount Saving" readonly>';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">%Saving</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3 persent" name="saving[]" placeholder="Input %Saving" readonly>';
            html +='</div>';
            html +='<div class="col-md-6">';
            html +='<div class="title-sm">Remarks</div>';
            html +='<input type="text" class="form-control borderInput mt-1 mb-3" id="remark" name="remark[]" placeholder="Input remarks">';
            html +='</div>';
            html +='</div>';
            html +='</div>';
            html +='</div>';

    $('#newPO').append(html);
        document.getElementById('nambah_po').value = 'YES';
    });
    // preventDefault();
    // // remove row
    // $(document).on('click', '#removeRow', function () {
    //     $(this).closest('#inputFormRow').remove();
    // });
</script>
<script>
    function hitung(node) {
        const parent = node.parentNode.parentNode
        const oldprice = parent.getElementsByClassName('oldprice')[0].value;
        const NewPrice = parent.getElementsByClassName('newprice')[0].value; 
        const qty = parent.getElementsByClassName('qty')[0].value; 
        // amount before && amount after
        parent.getElementsByClassName('sibefore')[0].value = parseInt(oldprice) * parseInt(qty); 
        parent.getElementsByClassName('siafter')[0].value = parseInt(NewPrice) * parseInt(qty); 
        const amountbefore = parent.getElementsByClassName('sibefore')[0].value;
        const amountafter = parent.getElementsByClassName('siafter')[0].value;
        
        let amountsaving = amountbefore - amountafter;
        let persent = ((parseFloat(amountsaving) / parseFloat(amountbefore)) * 100); 

        // // Inner
        parent.getElementsByClassName('amountsaving')[0].value =  parseInt(amountsaving); 
        parent.getElementsByClassName('persent')[0].value =  parseFloat(persent).toFixed(2); 
        
    }
</script>
@endpush
