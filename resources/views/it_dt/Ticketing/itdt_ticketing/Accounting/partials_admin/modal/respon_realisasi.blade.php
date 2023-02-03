<div class="modal fade" id="realisasi{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <form action="{{route('tiket-acc-done')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="TotalBaris" name="TotalBaris" value="1">
            <div class="modal-content" style="border-radius:10px">
                <div class="row" style="padding:20px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Realization</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-6">
                        <div class="title-sm mb-1">Amount Rencana</div>
                        <input type="text" class="form-control border-input-10 mb-3" name="amount_rencana" value="{{number_format($value->amount_rencana, 2, ",", ".")}}" placeholder="0,00" readonly>
                        <input type="hidden" class="form-control border-input-10 mb-3 rencana" id="rencana{{$value->id}}" onkeyup="jumlah()" value="{{$value->amount_rencana}}" placeholder="0,00" readonly>
                        <input type="hidden" class="form-control border-input-10 mb-3" name="id" value="{{$value->id}}" readonly>
                    </div>
                    <div class="col-6">
                        <div class="title-sm mb-1">Amount Realisasi</div>
                        <input type="number" class="form-control border-input-10 mb-3 realisasi" id="realisasiAmount{{$value->id}}" name="amount_realisasi" value="{{$value->amount_realisasi}}" placeholder="0,00" required>
                        <input type="hidden" class="form-control border-input-10 mb-3" name="id" value="{{$value->id}}" readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Balance</div>
                        <!-- <input type="text" class="form-control border-input-10 mb-3 balance" id="balanceAmount{{$value->id}}" name="" value="{{$value->amount_rencana-$value->amount_realisasi}}" placeholder="0,00" readonly> -->
                        <input type="text" class="form-control border-input-10 mb-3 balance" id="balanceAmount{{$value->id}}" name="" value="{{number_format($value->amount_rencana-$value->amount_realisasi, 2, ",", ".")}}" placeholder="0,00" readonly>
                    </div>
                    <div class="col-12">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="" name="desc_done" value="" placeholder="your Description" style="height:120px" required>{{$value->desc_done}}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="justify-sb mb-2">
                            <div class="title-sm">Photo (Bukti Pengembalian Dana)</div>
                        </div> 
                        @foreach($value->file_acc as $k => $v)
                            @if($v->type=='kembalian')
                            <div class="flex gap-3" id="innerRow">
                                <div class="customFile mb-3">
                                    <input type="hidden" name="id_file[]" value="{{$v->id}}">
                                    <input type="text" class="customFileInput" id="foto{{$k}}" name="file_bukti_edit[]" value="{{$v->file}}" accept=".JPG, .PNG, .JPEG">
                                    <label class="customFileLabelsBlueFoto" for="foto{{$k}}">
                                        <span class="chooseFile text-truncate" style="margin-left:135px">{{$v->file}}</span>
                                    </label>
                                </div>
                                <button id="removeRow" type="button" class="btn-delete-row3"><i class="fs-24 far fa-times-circle"></i></button>
                            </div>
                            @endif
                        @endforeach
                        <div class="customFile mb-3">
                            <input type="file" class="form-control borderInput pointer" name="file_bukti[]" value=""  accept=".JPG, .PNG, .JPEG" style="padding-left:3rem;padding-top:.3rem">
                            <div class="customFileLabelsFoto">Choose Photo</div>
                        </div>
                        <div class="customFile mb-3">
                            <input type="file" class="form-control borderInput pointer" name="file_bukti[]" value=""  accept=".JPG, .PNG, .JPEG" style="padding-left:3rem;padding-top:.3rem">
                            <div class="customFileLabelsFoto">Choose Photo</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="justify-sb mb-3">
                            <div class="title-sm">Photo (faktur, surat jalan, etc.)</div>
                            <button type="button" id="addRow{{$value->id}}" class="btnSoftBlue">Add Photo</button>
                        </div>
                        @if($value->tgl_proses==null && $value->amount_realisasi==null)
                        <div class="customFile mb-3">
                            <input type="file" class="form-control borderInput pointer" name="file[]" value=""  accept=".JPG, .PNG, .JPEG" style="padding-left:3rem;padding-top:.3rem" required>
                            <div class="customFileLabelsFoto">Choose Photo</div>
                        </div>
                        @endif

                        <div id="newRow{{$value->id}}"></div>
                    </div>
                    <div class="col-12 my-2">
                        @if($value->tgl_proses!=null && $value->amount_realisasi!=null)
                            <button type="submit" class="btn-green-md btn-block ">Verification</button>
                        @else
                            <button type="submit" class="btn-green-md btn-block ">Update Realization</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $("#addRow{{$value->id}}").click(function () {
    var html = '';
        html +='<div class="flex gap-3" id="innerRow">';
        html +='<div class="customFile mb-3">';
        html +='<input type="file" class="form-control borderInput pointer" name="file[]" value=""  accept=".JPG, .PNG, .JPEG" style="padding-left:3rem;padding-top:.3rem" required>';
        html +='<div class="customFileLabelsFoto">Choose Photo</div>';
        html +='</div>';
        html +='<button id="removeRow" type="button" class="btn-delete-row3"><i class="fs-24 far fa-times-circle"></i></button>';
        html +='</div>';
    $('#newRow{{$value->id}}').append(html);
  });

  // remove row
  $(document).on('click', '#removeRow', function () {
    $(this).closest('#innerRow').remove();
  });

//   $("document").ready(function() {
//     $(".btnSoftBlue").trigger('click');
//   });
</script>
<script>
    $(".customFileInput").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".customFileLabelsBlueFoto").addClass("selected").html(fileName).css('padding-left', '150px');
    });
</script>