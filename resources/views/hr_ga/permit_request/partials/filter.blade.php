    <div id="myModal" class="modals">
        <div class="modal-contents">
            <div class="row" style="padding:2.5rem 2rem">
                <div class="closeBtn"></div>
                <div class="col-12">
                    <div class="title-16">Filter Daftar Pengajuan</div>
                    <div class="borderBottom"></div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Tanggal Izin</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" for=""><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="" id="" style="border-radius: 0 10px 10px 0;font-size:14px">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Pilih kategori izin</div>
                </div>
                <div class="scrollFormX mt-1 mb-3" id="scrollHide">
                    <div class="flex" style="gap:.5rem">
                        <div class="wrapperRadio">
                            <input type="radio" name="kategori" value="" class="radioOrange" id="menunggu">
                            <label for="menunggu" class="optionOrange check">
                                <span class="descOrange">Menunggu</span>
                            </label>
                        </div>
                        <div class="wrapperRadio">
                            <input type="radio" name="kategori" value="" class="radioBlue" id="setuju">
                            <label for="setuju" class="optionBlue check">
                                <span class="descBlue">Kantor</span>
                            </label>
                        </div>
                        <div class="wrapperRadio">
                            <input type="radio" name="kategori" value="" class="radioRed" id="tolak">
                            <label for="tolak" class="optionRed check">
                                <span class="descRed">Ditolak</span>
                            </label>
                        </div>
                        <div class="wrapperRadio">
                            <input type="radio" name="kategori" value="" class="radioGreen" id="selesai">
                            <label for="selesai" class="optionGreen check">
                                <span class="descGreen">Selesai</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">ID Pengajuan</div>
                    <div class="mt-1 mb-3">
                        <input type="text" class="form-control" placeholder="Cari ID Pengajuan (Optional)" style="border-radius:10px;font-size:14px">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <a href="" class="btn-blue">Terapkan Filter <i class="fs-18 ml-2 fas fa-filter"></i></a>
                </div>
            </div>
        </div>
    </div>