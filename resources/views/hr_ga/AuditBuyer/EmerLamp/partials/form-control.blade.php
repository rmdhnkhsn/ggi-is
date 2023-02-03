
<div class="row">
    <div class="col-12">
        <div class="judul-apar">
            CONTROL Emergency Lamp
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
        <form action="{{route('hr_ga.emerlamp.store')}}" method="post" enctype="multipart/form-data">
         @csrf
            <input type="hidden" class="form-control" id="id_emerlamp" name="id_emerlamp" value="{{$data->id}}" readonly>
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
                        <div class="apar-title">Kondisi Lampu</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="kondisi" value="Menyala" class="blue-radio" id="blue-radio-Menyala" required>
                            <label for="blue-radio-Menyala" class="option option-1">
                                <span class="radio-title-blue mr-2">Menyala</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="kondisi" value="Rusak" class="red-radio" id="red-radio-Rusak" required>
                            <label for="red-radio-Rusak" class="option option-2">
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
                        <div class="apar-title">Kebersihan</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="kebersihan" value="Bersih" class="blue-radio" id="blue-radio-Bersih" required>
                            <label for="blue-radio-Bersih" class="option option-1">
                                <span class="radio-title-blue mr-2">Bersih</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="kebersihan" value="Kotor" class="red-radio" id="red-radio-Kotor"required>
                            <label for="red-radio-Kotor" class="option option-2">
                                <span class="radio-title-red mr-2">Kotor</span>
                                <i class="icon-sub-red fas fa-times"></i>
                            </label>
                        </div>
                    </div>
                </div> 
            </div>
            
            <div class="content-apar mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="apar-title">Form Checklist</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="wrapper-radio">
                            <input type="radio" name="form" value="Ada" class="blue-radio" id="blue-radio-Ada" required>
                            <label for="blue-radio-Ada" class="option option-1">
                                <span class="radio-title-blue mr-2">Ada</span>
                                <i class="icon-sub-blue fas fa-check"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrapper-radio"> 
                            <input type="radio" name="form" value="Tidak" class="red-radio" id="red-radio-Tidak"required>
                            <label for="red-radio-Tidak" class="option option-2">
                                <span class="radio-title-red mr-2">Tidak</span>
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



                




