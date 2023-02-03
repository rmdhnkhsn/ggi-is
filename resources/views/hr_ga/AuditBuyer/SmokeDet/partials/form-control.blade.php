
<div class="row">
    <div class="col-12">
        <div class="judul-apar">
            CONTROL SMOKE DETECTOR
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="cards-apar w-405 ml-auto mr-auto py-2 px-4">
            <div class="apar-info">
                <span class="tanggal">Tanggal</span>:<span class="ml-2">{{$todayDate}}</span><br>
                <span class="location">Location</span>:<span class="ml-2">{{$data->nama_lokasi}}</span>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{route('hr_ga.smokedet.store')}}" method="post" enctype="multipart/form-data">
         @csrf
            <input type="hidden" class="form-control" id="id_smokedet" name="id_smokedet" value="{{$data->id}}" readonly>
            <input type="hidden" class="form-control" id="item" name="item" value="{{$data->item}}" readonly>
            <input type="hidden" class="form-control" id="kode_lokasi" name="kode_lokasi" value="{{$data->kode_lokasi}}" readonly>
            <input type="hidden" class="form-control" id="nama_lokasi" name="nama_lokasi" value="{{$data->nama_lokasi}}" readonly>
            <input type="hidden" class="form-control" id="tgl_periksa" name="tgl_periksa" value="{{$todayDate}}" readonly>
            <input type="hidden" class="form-control" id="kode_branch" name="kode_branch" value="{{$data->kode_branch}}" readonly>
            <input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{$data->branchdetail}}" readonly>
            <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{ Auth::user()->nama }}" readonly>
        <div class="cards w-405 ml-auto mr-auto py-4 px-4">
            <div class="content-apar mb-3 mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Apakah ada SMOKE DETECTOR di lokasi tersebut..?</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="ada_smoke" value="Ada" class="blue-radio" id="blue-radio-ada" required>
                            <label for="blue-radio-ada" class="option option-1">
                                <span class="radio-title-blue mr-2">Ada</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="ada_smoke" value="Tidak" class="red-radio" id="red-radio-tidak" required>
                            <label for="red-radio-tidak" class="option option-2">
                                <span class="radio-title-red mr-2">Tidak</span>
                                <i class="icon-sub-red fas fa-times"></i>
                            </label>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="content-apar mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Cek Fungsi smoke detector</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="fungsi" value="Berfungsi" class="blue-radio" id="blue-radio-Berfungsi" required>
                            <label for="blue-radio-Berfungsi" class="option option-1">
                                <span class="radio-title-blue mr-2">Berfungsi</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="fungsi" value="Tidak" class="red-radio" id="red-radio-Tidak"required>
                            <label for="red-radio-Tidak" class="option option-2">
                                <span class="radio-title-red mr-2">Tidak</span>
                                <i class="icon-sub-red fas fa-times"></i>
                            </label>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="content-apar mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Cek Baterai Smoke Detector</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="baterai" value="Bagus" class="blue-radio" id="blue-radio-Bagus" required>
                            <label for="blue-radio-Bagus" class="option option-1">
                                <span class="radio-title-blue mr-2">Bagus</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="baterai" value="Rusak" class="red-radio" id="red-radio-Rusak"required>
                            <label for="red-radio-Rusak" class="option option-2">
                                <span class="radio-title-red mr-2">Rusak</span>
                                <i class="icon-sub-red fas fa-times"></i>
                            </label>
                        </div>
                    </div>
                </div> 
            </div>
            <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
        </div>
        </form>
    </div>
</div>



                




