
    <div class="modal fade" id="editFreeMetal{{$value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 pt-3 px-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="cards-18" style="padding: 30px 35px">
                        <div class="title-22 text-center">Form Update Data Free Metal </div>
                        <div class="justify-center">
                        <div class="borderBlue"></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <span class="title-sm">Status Prosess</span>
                                <div class="input-group mt-1 mb-3">
                                    <select class="form-control  border-input-10 select2bs45" id="status" name="status" placeholder="masukkan wo..."  required>
                                        <option > {{ $value['status'] }}</option>
                                        <option >PACKING BOX</option>
                                        <option >RASIO DI MEJA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">NIK</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10 livesearch" id="nik" name="nik" value="{{ $value['nik'] }}" placeholder="masukkan nik..." required>
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">Nama</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="nama" name="nama" placeholder="masukkan nama..." value="{{ $value['nama'] }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">WO</span>
                                <div class="input-group mt-1 mb-3">
                                    {{-- <input type="text" class="form-control border-input-10" id="wo" name="wo" placeholder="masukkan wo..." required> --}}
                                    <select class="form-control  border-input-10 select2bs45" id="wo" name="wo" placeholder="masukkan wo..." value="{{ $value['wo'] }}" required>
                                        <option  selected>{{ $value['wo'] }} </option>
                                        @foreach($dataWo as $key1 => $value1)
                                        <option value="{{$value1->wo_no}}">{{$value1->wo_no}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">Buyer</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="buyer" name="buyer" placeholder="masukkan style..." required>
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">Style</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="style" name="style" value="{{ $value['style'] }}" placeholder="masukkan style..." required>
                                     
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">Jam Mulai</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="time" class="form-control border-input-10" id="jam_mulai" name="jam_mulai" value="{{ $value['jam_mulai'] }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">Jam Selesai</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="time" class="form-control border-input-10" id="jam_selesai" name="jam_selesai" value="{{$value['jam_selesai'] }}" >
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">Qty Target</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" value="{{ $value['qty_target'] }}" id="qty_target" name="qty_target" placeholder="masukkan qty..."  >
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">Placing</span>
                                <div class="input-group mt-1 mb-3">
                                    {{-- <input type="text" class="form-control border-input-10" id="placing" name="placing" placeholder="masukkan placing..." required> --}}
                                    <select class="form-control  border-input-10 select2bs4" id="placing" name="placing">
                                        <option  selected> {{ $value['placing'] }}</option>
                                        @foreach($dataBranch as $key2 => $value2)
                                        <option value="{{$value2->nama_branch}}">{{$value2->nama_branch}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">Remark</span>
                                <div class="messageGrey mt-1 mb-3">
                                    <textarea type="text" value="{{ $value['remark'] }}" name="remark" id="remark" ></textarea>
                                    
                                </div>
                            </div>
                            <div class="col-12 justify-end mt-3">
                                <button type="submit" id="saveChecker" class="btn-blue-md">{{ $submit }}<i class="ml-2 fas fa-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    /* When click New customer button */
    });
    $('#nik').keyup(function(){
    // console.log("ok");
    var ID = $(this).val();

    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("folding.getuser") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#nama').val(data.nama)
          // $('#group').val(data.group)
          // $('#gaji').val(data.gp_tun)
        },

      });
    }
  }); 
</script>