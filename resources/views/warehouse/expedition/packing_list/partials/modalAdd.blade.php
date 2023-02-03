<div class="modal fade" id="addPacking" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row pt-3 px-4">
                <div class="col-12 justify-sb">
                    <div class="title-20">Tambah Keterangan Packing List</div>
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
                    <span class="title-sm">Invoice no</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input2" id="" name="" value="" placeholder="masukan nomor invoice..." style="border-radius:8px">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Invoice Deskripsi</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input2" id="" name="" value="" placeholder="masukan deskripsi..." style="border-radius:8px">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Container No</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input2" id="" name="" value="" placeholder="masukan nomor kontainer..." style="border-radius:8px">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Seal No</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input2" id="" name="" value="" placeholder="masukan nomor seal..." style="border-radius:8px">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Tanggal</span>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:55px;border-radius:8px 0 0 8px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control border-input2" name="" id="" style="border-radius:0 8px 8px 0">
                    </div>
                </div>
                <div class="col-12 justify-start mb-4 mt-2">
                    <!-- <button type="button" class="btn-blue-md">Simpan</button> -->
                    <a href="{{ route('download-packing') }}" class="btn-blue-md">Simpan</a>
                </div>
            </div>
        </div>
    </div>
</div>