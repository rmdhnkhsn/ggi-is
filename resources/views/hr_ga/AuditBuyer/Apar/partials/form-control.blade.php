
<div class="row">
    <div class="col-12">
        <div class="judul-apar">
            CONTROL APAR
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
        <form action="{{route('hr_ga.apar.store')}}" method="post" enctype="multipart/form-data">
         @csrf
            <input type="hidden" class="form-control" id="id_apar" name="id_apar" value="{{$data->id}}" readonly>
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
                        <div class="apar-title">Tekanan APAR</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <div class="wrapper-radio">
                            <input type="radio" name="tekanan" value="Tinggi" class="blue-radio" id="blue-radio-rendah" required>
                            <label for="blue-radio-rendah" class="option option-1">
                                <span class="radio-title-blue">Tinggi</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="wrapper-radio">
                            <input type="radio" name="tekanan" value="Normal" class="green-radio" id="green-radio-normal" required>
                            <label for="green-radio-normal" class="option option-3">
                                <span class="radio-title-green">Normal</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="tekanan" value="Rendah" class="red-radio" id="red-radio-tinggi" required>
                            <label for="red-radio-tinggi" class="option option-2">
                                <span class="radio-title-red">Rendah </span>
                            </label>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="content-apar mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Pin Pengaman APAR</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="pin" value="Ada" class="blue-radio" id="blue-radio-ada" required>
                            <label for="blue-radio-ada" class="option option-1">
                                <span class="radio-title-blue mr-2">Ada</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="pin" value="Tidak" class="red-radio" id="red-radio-tidak" required>
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
                        <div class="apar-title">Kondisi Selang</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="kondisi_selang" value="Bagus" class="blue-radio" id="blue-radio-bagus" required>
                            <label for="blue-radio-bagus" class="option option-1">
                                <span class="radio-title-blue mr-2">Bagus</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="kondisi_selang" value="Rusak" class="red-radio" id="red-radio-rusak"required>
                            <label for="red-radio-rusak" class="option option-2">
                                <span class="radio-title-red mr-2">Rusak</span>
                                <i class="icon-sub-red fas fa-times"></i>
                            </label>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="content-apar mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Berat Tabung APAR</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <div class="wrapper-radio">
                            <input type="radio" name="berat_tabung" value="25Kg" class="blue-radio" id="blue-radio-25"required>
                            <label for="blue-radio-25" class="option option-1">
                                <span class="radio-title-blue">25Kg</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="wrapper-radio">
                            <input type="radio" name="berat_tabung" value="6Kg" class="green-radio" id="green-radio-6"required>
                            <label for="green-radio-6" class="option option-3">
                                <span class="radio-title-green">6Kg</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="berat_tabung" value="3Kg" class="red-radio" id="red-radio-3" required>
                            <label for="red-radio-3" class="option option-2">
                                <span class="radio-title-red">3Kg</span>
                            </label>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="content-apar mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Masa Berlaku Pengisian</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append " data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Tanggal</span><i class="ml-2 fas fa-caret-down"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="masa_berlaku" placeholder="Pilih Tanggal" required/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-apar mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Kondisi Handle/Tuas</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="kondisi_tuas" value="Ada" class="blue-radio" id="blue-radio-ada2"required>
                            <label for="blue-radio-ada2" class="option option-1">
                                <span class="radio-title-blue mr-2">Ada</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="kondisi_tuas" value="Tidak" class="red-radio" id="red-radio-tidak2"required>
                            <label for="red-radio-tidak2" class="option option-2">
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
                        <div class="apar-title">Garis Merah/Red Line APAR</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="garis_merah" value="Ada" class="blue-radio" id="blue-radio-ada3" required>
                            <label for="blue-radio-ada3" class="option option-1">
                                <span class="radio-title-blue mr-2">Ada</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="garis_merah" value="Tidak" class="red-radio" id="red-radio-tidak3" required>
                            <label for="red-radio-tidak3" class="option option-2">
                                <span class="radio-title-red mr-2">Tidak</span>
                                <i class="icon-sub-red fas fa-times"></i>
                            </label>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="content-apar mb-3"  >
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Kondisi Sign APAR</div>
                    </div>
                </div>
                <div class="row mt-2 px-2 options">
                    <div class="form-check flex">
                        <input class="form-check-input check1" type="checkbox" value="Petunjuk APAR Rusak" id="check1" name="kondisi_sign[]" required>
                        <label class="form-check-label" for="check1">
                            <span class="kondisi-sign">Petunjuk APAR Rusak</span>
                        </label>
                    </div>
                    <div class="form-check flex">
                        <input class="form-check-input check1" type="checkbox" value="Cara Penggunaan APAR Rusak" id="check2" name="kondisi_sign[]" required>
                        <label class="form-check-label" for="check2">
                            <span class="kondisi-sign">Cara Penggunaan APAR Rusak</span>
                        </label>
                    </div>
                    <div class="form-check flex">
                        <input class="form-check-input check1" type="checkbox" value="Instruksi Kerja Rusak" id="check3" name="kondisi_sign[]" required>
                        <label class="form-check-label" for="check3">
                            <span class="kondisi-sign">Instruksi Kerja Rusak</span>
                        </label>
                    </div>
                    <div class="form-check flex">
                        <input class="form-check-input check1" style="width:26px" type="checkbox" value="Label 'Dilarang Menyimpan Barang di Area APAR' Rusak" id="check4" name="kondisi_sign[]" required>
                        <label class="form-check-label" for="check4">
                            <span class="kondisi-sign">Label "Dilarang Menyimpan Barang di Area APAR" Rusak</span>
                        </label>
                    </div>
                    <div class="form-check flex">
                        <input class="form-check-input check1" type="checkbox" value="Ceklis APAR Tidak ada/belum diupdate" id="check5" name="kondisi_sign[]" required>
                        <label class="form-check-label" for="check5">
                            <span class="kondisi-sign">Ceklis APAR Tidak ada/belum diupdate</span>
                        </label>
                    </div>
                    <div class="form-check flex">
                        <input class="form-check-input check1" type="checkbox" value="Semua Sign Dalam Kondisi Baik" id="check6" name="kondisi_sign[]" required>
                        <label class="form-check-label" for="check6">
                            <span class="kondisi-sign">Semua Sign Dalam Kondisi Baik</span>
                        </label>
                    </div>
                </div> 
            </div>
            <button type="submit" class="btn btn-kirim btn-block mb-2">Kirim<img class="ml-3 mb-1" width="16px" src="{{url('images/iconpack/plan.svg')}}"></button>
        </div>
        </form>
    </div>
</div>





