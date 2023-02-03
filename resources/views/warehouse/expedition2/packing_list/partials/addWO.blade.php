<form  action="{{route('packinglist.addWo')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="modal fade" id="addwo" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
          <div class="modal-content" style="border-radius:10px">
              <div class="row pt-3 px-4">
                  <div class="col-12 justify-sb">
                      <div class="title-20">Tambah Wo ke Ekspedisi</div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fas fa-times"></i></span>
                      </button>
                  </div>
                  <div class="col-12">
                      <div class="borderlight"></div>
                  </div>
              </div>
              <div class="row mt-3 px-4">
                  <div class="col-12">
                      <span class="title-sm">Input Wo Data</span>
                      <div class="input-group mt-1 mb-3">
                        <select class="form-control borderInput pointer select2bs4" id="id" name="id" required>
                            <option selected disabled>Select WO</option>
                            @foreach ($datawo as $key =>$value)
                                <option value="{{ $value['id'] }}">{{ $value['wo'] }}-{{ $value['qty'] }}-{{ $value['buyer'] }}</option> 
                                <input type="hidden" name="id_packing" value="{{ $value['id'] }}">
                                <input type="hidden" name="id_packing_size" value="{{ $value['id'] }}">
                            @endforeach  
                        </select>
                        <input type="hidden" id="kode_ekspedisi" name="kode_ekspedisi" value="{{ $collectionData['kode_ekspedisi'] }}">
                        <input type="hidden" id="kode_ekspedisi" name="kode_ekspedisi" value="{{ $collectionData['kode_ekspedisi'] }}">
                        <input type="hidden" id="" name="no_surat_jalan" value="{{ $collectionData['no_surat_jalan'] }}">
                        <input type="hidden" id="" name="no_surat_jalan2" value="{{ $collectionData['no_surat_jalan2'] }}">
                        <input type="hidden" id="" name="tanggal_surat" id="" value="{{ $collectionData['tanggal_surat'] }}">
                        <input type="hidden" id="" name="no_doct" value="{{ $collectionData['no_doct'] }}">
                        <input type="hidden" id="" name="jenis_doct" value="{{ $collectionData['jenis_doct'] }}">
                        <input type="hidden" id="" name="no_kontainer2" value="{{ $collectionData['no_kontainer2'] }}">
                        <input type="hidden" id="" name="no_kontainer" value="{{ $collectionData['no_kontainer'] }}">
                        <input type="hidden" id="" name="no_seal" value="{{ $collectionData['no_seal'] }}">
                        <input type="hidden" id="" name="no_seal2" value="{{ $collectionData['no_seal2'] }}">
                      </div>
                  </div>
                  <div class="col-12 justify-start mb-4 mt-2">
                      <button type="submit" class="btn-blue-md">Simpan</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</form>