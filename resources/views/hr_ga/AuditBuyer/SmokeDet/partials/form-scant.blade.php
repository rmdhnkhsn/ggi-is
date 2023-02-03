    <div class="row">
        <div class="col-12">
            <div class="judul-scan mt-2">
                SCAN BARCODE
            </div>
        </div>
    </div>
    <form action="{{ route('hr_ga.smokedet.controll')}}" method="post" enctype="multipart/form-data">
        @csrf
        <video id="preview" class="col-lg-9"></video>
        <div class="camera-pc">
            <div class="row">
                <div class="col-12 ml-auto mr-auto">
                    <div class="cards-scan w-405 ml-auto mr-auto py-2 px-4">
                        <i class="icon-camera fas fa-camera"></i>
                        <span class="border-1"></span>
                        <span class="border-2"></span>
                        <span class="border-3"></span>
                        <span class="border-4"></span>
                    </div>
                </div>
            </div>
        </div>
        @if ($message = Session::get('error'))
            <div class="row mt-3">
                <div class="notif-message w-405 ml-auto mr-auto">
                    <span>{{ $message }}</span>
                </div>
            </div>
        @endif
        <div class="row py-3">
            <div class="col-12">
                <input type="text" class="form-control mb-2 ml-auto mr-auto" id="kode_lokasi" name="kode_lokasi" placeholder="Masukan kode Lokasi" style="max-width:350px">
                <div class="button-controll">
                    <button type="submit" id="kode_lokasi_cari" class="btn btn-controll">Control<i class="ml-3 far fa-calendar-check"></i></button>
                </div>
            </div>
        </div>
    </form>





