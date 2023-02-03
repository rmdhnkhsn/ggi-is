
    <div class="modal fade" id="editPackingList{{$value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 pt-3 px-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-4">
              <div class="col-md-6">
                <span class="title-sm">WO</span>
                <div class="input-group mt-1 mb-3">
                  {{-- <input type="text" class="form-control border-input-10 livesearch" id="wo" name="wo" placeholder="masukkan wo..." required> --}}
                  <select class="form-control  border-input-10 select2bs45 livesearch" id="wo" name="wo" placeholder="masukkan wo..." required>
                      <option  selected> </option>
                      {{-- @foreach($dataByWo as $key => $value)
                      <option value="{{$value['wo_no']}}">{{$value['wo_no']}}</option>
                      @endforeach --}}
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <span class="title-sm">Style</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input-10" id="style_name" name="style" placeholder="masukkan style..." required>
                </div>
              </div>
              <div class="col-md-6">
                <span class="title-sm">Buyer</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input-10" id="buyer" name="buyer" placeholder="masukkan buyer..." required>
                </div>
              </div>
              <div class="col-md-6">
                <span class="title-sm">PO</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input-10" id="no_po" name="po" placeholder="masukkan po..." required>
                </div>
              </div>
              <div class="col-md-6">
                <span class="title-sm">No. Kontrak</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input-10" id="contract" name="no_kontrak" placeholder="masukkan no kontrak..." required>
                </div>
              </div>
              {{-- <div class="col-md-6">
                <span class="title-sm">OFF CTN</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input-10" id="off_ctn" name="off_ctn" placeholder="masukkan off ctn..." required>
                </div>
              </div> --}}
              {{-- <div class="col-md-6">
                <span class="title-sm">QTY</span>
                <div class="input-group mt-1 mb-3">
                  <input type="text" class="form-control border-input-10" id="qty" name="qty" placeholder="masukkan qty..." required>
                </div>
              </div> --}}
              <div class="col-md-6">
                <span class="title-sm">Tanggal</span>
                <div class="input-group date mt-1" id="Date" data-target-input="nearest">
                  <div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker">
                    <div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; padding: 0 20px; gap: .7rem !important">
                      <i class="fas fa-calendar-alt"></i><span class="fs-14">Date</span><i class="fas fa-caret-down"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input border-input-10" id="tanggal" name="tanggal" data-target="#Date" placeholder="Select Date"/>
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