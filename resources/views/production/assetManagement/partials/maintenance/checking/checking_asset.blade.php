@extends("layouts.blank.app")
@section("title","Checking Assets")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/dist/css/adminlte2.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/singleStyle/maintenance.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content index">
    <div class="container-fluid">
        <div class="header">
            <div class="buleud"></div>
            @include("layouts.common.breadcrumb")
            <div class="containerBack"> 
                <a href="{{ route('asset.maintenance.index')}}" class="btnBack"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <form  action="{{route('asset.maintenance.updateCheckingAssets')}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="container">
                <div class="contents mx-auto mt-mins">
                    <div class="title-30W judul2">Checking Asset</div>
                    <div class="card p-3">
                        <div class="title-20G">Checking Information</div>
                        <div class="borderBlue"></div>
                        <div class="containers">
                            <div class="widthSec">
                                <div class="title-sm">Mechanic</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                    </div>
                                    <input type="hidden" id="TotalBaris" name="TotalBaris" value="1">
                                        <input type="text" class="form-control borderInput" name="created_by" id="" value="{{ auth()->user()->nama }}" readonly>
                                </div>
                            </div>
                            <div class="widthSec">
                                <div class="title-sm">Transaction</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="flex">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-random"></i></span>
                                    </div>
                                    <input type="text" class="form-control borderInput" name="status" id="" value="Checking" readonly>
                                </div>
                            </div>
                            <div class="widthSec">
                                <div class="title-sm">Date</div>
                                <div class="input-group mt-1 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control borderInput" name="date" id="" value="{{ $date }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="title-16G mt-3">Check Item</div>
                        <div class="cards p-2 mt-2">
                            <div id="newAssets"></div>
                        </div>
                        <div class="flex gap-3 mt-3">
                            <button type="button" id="addAssets" class="btnSoftBlue justify-center h-45 w-full">Add Asset Item</button>
                            <button type="submit" class="btn-blue-md justify-center h-45 w-full">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal fade" id="camera" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-3" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18G">Camera</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <input type="hidden" id="rowNumber" value="0">
                    
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12">
                    <div id="qr-reader" style="width:100%"></div>
                    <div id="qr-reader-results" style="width:100%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="{{asset('common/js/html5qrcode.min.js')}}"></script>
<script>
var resultContainer = document.getElementById('qr-reader-results');
var lastResult, countResults = 0;

function onScanSuccess(decodedText, decodedResult) {
    if (decodedText !== lastResult) {
        // debugger
        ++countResults;
        lastResult = decodedText;
        // Handle on success condition with the decoded message.
        console.log(`Scan result ${decodedText}`, decodedResult);
        var url = "{{ route('asset.maintenance.getMachineById', ['id' => 'id']) }}";
        url = url.replace("id",decodedText);
        var data = null;
        $.ajax({
        aysnc:false,
        url: url,
        success: function(resp){
            // debugger
           if(!resp.id) {
                alert("No Data Found")
                return false;
            } else {
                var rowNumber = $("#rowNumber").val();
                $("#id_"+rowNumber).val(resp.id)
                $("#id_machine_"+rowNumber).val(resp.id)
                $("#serialno_"+rowNumber).val(resp.serialno)
                $("#jenis_"+rowNumber).val(resp.jenis)
                $("#qty_"+rowNumber).val(resp.qty || 1)
                $("#lokasi_"+rowNumber).val(resp.lokasi)
                $("#kondisi_"+rowNumber).val(resp.kondisi)
                $("#price_"+rowNumber).val(resp.price)
                $("#tipe_"+rowNumber).val(resp.tipe)
                $("#merk_"+rowNumber).val(resp.merk)
                $("#varian_"+rowNumber).val(resp.varian)
                $("#supplier_"+rowNumber).val(resp.coOrigin)
                $('.modal').modal('toggle');
            }}
        })
        }
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);
function getMachine(id){
    var url = "{{ route('asset.maintenance.getMachineById', ['id' => 'id']) }}";
    url = url.replace("id",id);
    var data = null;
    $.ajax({
    aysnc:false,
    url: url,
    success: function(resp){
        // debugger
        data = resp;
        }
    })
    console.log(data)
    return data;
}
</script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
  $('.saveChecking').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Are You Sure..?",
        text: "For Saving Checking assets !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#007bff",
        confirmButtonText: "Yes",
        cancelButtonText: "No ",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
        //   window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Checking Assets failed to save", "error");
        }
    }); 
  });
</script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<script>
    function openCam(baris) {
    // debugger)
    $("#camera").modal("show");
    $("#rowNumber").val(baris);
    }
    var TotalBaris = 1;
  $("#addAssets").click(function () {
    var html = '';
        html +='<div id="rowAssets">';
        html +='<div class="borderlight mb-4"></div>';
        html +='<div class="justify-sb">';
        html +='<div class="justify-start2 gap-3">';
        html +='<div class="title-sm">Asset No.</div> <div class="badgeSoftBlue">'+TotalBaris+'</div>';
        html +='</div>';
        html +='<button id="removeAssets" type="button" class="btn-delete-row"><i class="fs-24 far fa-times-circle"></i></button>';
        html +='</div>';
        html +='<div class="containers">';
        html +='<div class="widthHalf">';
        html +='<div class="input-group">';
        html +='<div class="input-group-prepend">';
        html +='<span class="inputGroupBlue" style="width:45px"><i class="fs-20 fas fa-th"></i></span>';
        html +='</div>';
        html +='<input type="text" class="form-control borderInput2" name="serialno[]" id="serialno_'+TotalBaris+'" placeholder="Input serial number" readonly><input type="hidden" name="id_machine[]" id="id_machine_'+TotalBaris+'"><input type="hidden" name="id[]" id="id_'+TotalBaris+'">';
        html +='<div class="input-group-prepend">';
        html +='<button type="button" class="inputGroupBlueRight pointer" id="btn-open'+TotalBaris+'" onclick=openCam('+TotalBaris+')  style="width:45px"><i class="fs-20 fas fa-camera"></i></button>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
        html +='<div class="widthHalf">';
        html +='<div class="input-group">';
        html +='<div class="input-group-prepend">';
        html +='<span class="inputGroupBlue" style="width:45px"><i class="fs-20 fas fa-toolbox"></i></span>';
        html +='</div>';
        html +='<input type="text" class="form-control borderInput" name="jenis[]" id="jenis_'+TotalBaris+'" placeholder="Input jenis Asset" style="border-radius:0 10px 10px 0" readonly>';
        html +='<input type="hidden" class="form-control borderInput" name="time[]" id="" value="{{$time}}">';
        html +='<input type="hidden" class="form-control borderInput" name="branch[]" id="" value="{{ auth()->user()->branchdetail }}">';
        html +='</div>';
        html +='</div>';
        html +='<div class="widthHalf">';
        html +='<div class="input-group">';
        html +='<div class="input-group-prepend">';
        html +='<span class="inputGroupBlue" style="width:45px"><i class="fs-20 fas fa-building"></i></span>';
        html +='</div>';
        html +='<input type="text" class="form-control borderInput" name="lokasi[]" id="lokasi_'+TotalBaris+'" placeholder="Input Origin" readonly>';
        html +='</div>';
        html +='</div>';
        html +='<div class="widthHalf">';
        html +='<div class="input-group">';
        html +='<div class="input-group-prepend">';
        html +='<span class="inputGroupBlue" style="width:45px"><i class="fs-20 fas fa-heartbeat"></i></span>';
        html +='</div>';
        html +='<select class="form-control borderInput select2bs4 pointer" id="kondisi_'+TotalBaris+'" name="kondisi[]" required>';
        html +='<option selected disabled>Select Condition</option>';
        html +='<option name="Proses Perbaikan">Proses Perbaikan</option>';
        html +='<option name="Rusak Berat">Rusak Berat</option>';
        html +='<option name="Siap Pakai">Siap Pakai</option>';
        html +='</select>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
        html +='<input type="hidden" class="form-control borderInput" name="lokasi[]" id="lokasi_'+TotalBaris+'" placeholder="Input Origin" readonly>';
        html +='<input type="hidden" class="form-control borderInput" name="price[]" id="price_'+TotalBaris+'" placeholder="Input Origin" readonly>';
        html +='<input type="hidden" class="form-control borderInput" name="tipe[]" id="tipe_'+TotalBaris+'" placeholder="Input Origin" readonly>';
        html +='<input type="hidden" class="form-control borderInput" name="merk[]" id="merk_'+TotalBaris+'" placeholder="Input Origin" readonly>';
        html +='<input type="hidden" class="form-control borderInput" name="varian[]" id="varian_'+TotalBaris+'" placeholder="Input Origin" readonly>';
        html +='<input type="hidden" class="form-control borderInput" name="supplier[]" id="supplier_'+TotalBaris+'" placeholder="Input Origin" readonly>';


    $('#newAssets').append(html);
    TotalBaris = TotalBaris +1;
    $("#TotalBaris").val(TotalBaris);
  });
 $("document").ready(function() {
            $(".btnSoftBlue").trigger('click');
    });
  // remove row
  $(document).on('click', '#removeAssets', function () {
    $(this).closest('#rowAssets').remove();
  });
</script>
@endpush        