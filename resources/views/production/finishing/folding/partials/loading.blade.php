<form action="{{ route('folding.storeLoading')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="cards-18" style="padding: 30px 35px">
                <div class="title-22 text-center">Form Input Data Loading</div>
                <div class="justify-center">
                <div class="borderBlue"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <span class="title-sm">NIK</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10 livesearch" id="nik1" name="nik1[]" placeholder="masukkan nik..." required>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Nama</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" id="nama1" name="nama1[]" placeholder="masukkan nama..." required>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">WO</span>
                        <div class="input-group mt-1 mb-3">
                            {{-- <input type="text" class="form-control border-input-10" id="wo" name="wo" placeholder="masukkan wo..." required> --}}
                            <select class="form-control  border-input-10 select2bs46 input-data-fa" id="wo" name="wo" placeholder="masukkan wo..." required>
                                <option  selected> </option>
                                @foreach($dataWo as $key => $value)
                                <option value="{{$value->wo_no}}">{{$value->wo_no}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Style</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" id="style" name="style" placeholder="masukkan style..." required>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Jam Mulai</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="time" class="form-control border-input-10" id="jam_mulai" name="jam_mulai" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Jam Selesai</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="time" class="form-control border-input-10" id="jam_selesai" name="jam_selesai" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Qty Target</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" id="qty_target" name="qty_target" placeholder="masukkan qty..." required>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Placing</span>
                        <div class="input-group mt-1 mb-3">
                            {{-- <input type="text" class="form-control border-input-10" id="placing" name="placing" placeholder="masukkan placing..." required> --}}
                            <select class="form-control  border-input-10 select2bs4 input-data-fa" id="placing" name="placing">
                                <option  selected> </option>
                                @foreach($dataBranch as $key => $value)
                                <option value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Remark</span>
                        <div class="messageGrey mt-1 mb-3">
                            <textarea placeholder="masukkan remark..." name="remark" id="remark"></textarea>
                        </div>
                    </div>
                    <div class="col-12 justify-end mt-3">
                        <button type="submit" id="saveLoading" class="btn-blue-md">Simpan<i class="ml-2 fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

