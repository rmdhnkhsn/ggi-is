<!-- Modal -->
<form action="{{ route('kode_kerja_karyawan.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="add_employ" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>  
                    </div> 
                    <div class="row">
                        <div class="col-12 text-center">
                            <span class="title-18">Kode Kerja Karyawan</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Periode</span>
                            <div class="mt-2">
                                <select class="form-control select2bs4 border-input" id="periode" name="periode">
                                    <option selected disabled>Input Periode</option>
                                    <option value="21 Januari - 20 Februari">21 Januari - 20 Februari</option>
                                    <option value="21 Februari - 20 Maret">21 Februari - 20 Maret</option>
                                    <option value="21 Maret - 20 April">21 Maret - 20 April</option>
                                    <option value="21 April - 20 Mei">21 April - 20 Mei</option>
                                    <option value="21 Mei - 20 Juni">21 Mei - 20 Juni</option>
                                    <option value="21 Juni - 20 Juli">21 Juni - 20 Juli</option>
                                    <option value="21 Juli - 20 Agustus">21 Juli - 20 Agustus</option>
                                    <option value="21 Agustus - 20 September">21 Agustus - 20 September</option>
                                    <option value="21 September - 20 Oktober">21 September - 20 Oktober</option>
                                    <option value="21 Oktober - 20 November">21 Oktober - 20 November</option>
                                    <option value="21 November - 20 Desember">21 November - 20 Desember</option>
                                    <option value="21 Desember - 20 Januari">21 Desember - 20 Januari</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Hari Kerja</span>
                            <div class="fields mt-2">
                                <input type="text" id="hari_kerja" name="hari_kerja" required>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="title-sm">Tahun</span>
                            <div class="mt-2">
                                <div class="input-group date mt-1" id="Date" data-target-input="nearest">
                                    <div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker">
                                        <div class="custom-calendar"><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Tahun</span><i class="ml-2 fas fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="tahun" name="tahun" class="form-control datetimepicker-input border-input" data-target="#Date" placeholder="Pilih Tahun" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">NIK</span>
                            <div class="mt-2">
                                <select class="custom-select border-input select2bs cari_nik" name="nik" required>
                                    <option disabled selected>NIK karyawan</option>
                                    @foreach($karyawan as $key => $value)
                                    <option value="{{$value->nik}}">{{$value->nama}} ({{$value->nik}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Gedung</span>
                            <div class="fields mt-2">
                                <input type="text" id="gedung" name="gedung" required>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Group</span>
                            <div class="fields mt-2">
                                <input type="text" id="group" name="group" required>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Kategory</span>
                            <div class="fields mt-2">
                                <input type="text" id="kategory" name="kategory">
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Gaji Pokok</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" required>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Prem. KRJ</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="prem_krj" name="prem_krj">
                            </div>
                        </div> 
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Tun. Tetap</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="tun_tetap" name="tun_tetap">
                            </div>
                        </div> 
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">THP</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="thp" name="thp" required>
                            </div>
                        </div> 
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">GP+TJ</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="gp_tun" name="gp_tun" required>
                            </div>
                        </div> 
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Gaji/Hari</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="gaji_per_hari" name="gaji_per_hari">
                            </div>
                        </div> 
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Gaji/Jam</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="gaji_per_jam" name="gaji_per_jam">
                            </div>
                        </div> 
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">BPJamsostek</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="bpjamsostek" name="bpjamsostek" required>
                            </div>
                        </div> 
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">BPJS KS</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="bpjs_ks" name="bpjs_ks" required>
                            </div>
                        </div> 
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Uang Makan</span>
                            <div class="fields mt-2">
                                <input type="number" step="0.01" id="uang_makan" name="uang_makan">
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Kode Kerja</span>
                            <div class="mt-2">
                                <select class="custom-select border-input select2bs kode_kerja" name="kode_kerja" required>
                                    <option disabled selected>Masukan Kode Kerja</option>
                                    @foreach($kode_kerja as $key => $value)
                                    <option value="{{$value->kode_kerja}}">{{$value->kode_kerja}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Jam Kerja (Satuan Jam)</span>
                            <div class="fields mt-2">
                                <input type="number" id="jam_kerja_karyawan" name="jam_kerja" placeholder="Contoh (8 Jam)" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="general-identity-title">Istirahat (Satuan Menit)</span>
                            <div class="fields mt-2">
                                <input type="number" id="istirahat_karyawan" name="istirahat" placeholder="Masukan dalam satuan menit, Contoh (30  Menit)" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-12 justify-end">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</form>

<!-- =============== -->
<form action="{{route('kode_kerja_karyawan.search')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="filter" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:360px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 border-bottom pb-2 mb-2 justify-sb">
                            <span class="title-15">Filter Data</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-12">
                            <span class="title-sm">Periode</span>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-GI" for="" style="width: 93px">Periode</span>
                                </div>
                                <select class="form-control select2bs4 border-input" id="periode" name="periode">
                                    <option selected disabled>Input Periode</option>
                                    <option value="21 Januari - 20 Februari">21 Januari - 20 Februari</option>
                                    <option value="21 Februari - 20 Maret">21 Februari - 20 Maret</option>
                                    <option value="21 Maret - 20 April">21 Maret - 20 April</option>
                                    <option value="21 April - 20 Mei">21 April - 20 Mei</option>
                                    <option value="21 Mei - 20 Juni">21 Mei - 20 Juni</option>
                                    <option value="21 Juni - 20 Juli">21 Juni - 20 Juli</option>
                                    <option value="21 Juli - 20 Agustus">21 Juli - 20 Agustus</option>
                                    <option value="21 Agustus - 20 September">21 Agustus - 20 September</option>
                                    <option value="21 September - 20 Oktober">21 September - 20 Oktober</option>
                                    <option value="21 Oktober - 20 November">21 Oktober - 20 November</option>
                                    <option value="21 November - 20 Desember">21 November - 20 Desember</option>
                                    <option value="21 Desember - 20 Januari">21 Desember - 20 Januari</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="title-sm">Tahun</span>
                            <div class="input-group date mt-1" id="Date2" data-target-input="nearest">
                                <div class="input-group-append datepiker" data-target="#Date2" data-toggle="datetimepicker">
                                    <div class="custom-calendar"><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Tahun</span><i class="ml-2 fas fa-caret-down"></i>
                                    </div>
                                </div>
                                <input type="text" name="tahun" id="tahun" class="form-control datetimepicker-input border-input" data-target="#Date2" placeholder="Pilih Tahun" />
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn-block btn-blue">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>