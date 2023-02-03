<div class="modal fade" id="buat_kontrak" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:610px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <form  action="{{route('subkon.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row px-4">
                    <div class="col-md-6 my-1">
                        <div class="title-sm  d-inline-block">Kategori Subkon <span class="text-pink">*</span></div>
                        <select class="form-control borderInput2 select2bs" id="kategori_subkon" name="kategori_subkon" style="cursor:pointer" required>
                            <option value="" selected>Pilih Kategori</option>
                            <option value="TLDDP">TLDDP</option>    
                            <option value="AKB">AKB</option>    
                        </select>
                    </div>

                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Bisnis Unit <span class="text-pink">*</span></div>
                        <select class="form-control borderInput select2bs_supplier" id="branch" name="branch" style="cursor:pointer" required>
                            <option value="" selected>Select Bisnis Unit</option>
                            <option value="1201" name="branch">1201</option>    
                            <option value="1205" name="branch">1205</option>    
                            <option value="1204" name="branch">1204</option>
                            <option value="1206" name="branch">1206</option>    
                        </select>
                    </div>

                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">NO Surat Persetujuan-SKEP </div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="no_skep" name="no_skep" placeholder="Masukan Nomor SKEP..." >
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Tanggal Surat Persetujuan</div>
                        <div class="input-group flex">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="tgl_persetujuan" placeholder="Pilih Tanggal" />
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">NO BPJ</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="no_bpj" name="no_bpj" placeholder="Masukan Nomor BPJ..." >
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Tanggal BPJ</div>
                        <div class="input-group">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" class="form-control borderInput" name="tgl_bpj" placeholder="Pilih Tanggal" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Custom BOND NO</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="no_bound" name="no_bound" placeholder="Masukan Nomor CB..." >
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Tanggal Custom BOND NO </div>
                        <div class="input-group">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" class="form-control borderInput" name="tgl_cb" placeholder="Pilih Tanggal" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Kontrak Kerja <span class="text-pink">*</span></div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="no_kontrak" name="no_kontrak" placeholder="Masukan Nomor Kontrak Kerja..." required>
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm  d-inline-block">Branch Makloon</div>
                        <select class="form-control borderInput2 select2bs_supplier"  name="kode_branch" style="cursor:pointer">
                            <option value="" selected>Pilih Branch</option>
                            @foreach($dataBranch as $key2 => $value2)
                                <option name="kode_branch" value="{{$value2->id}}">{{$value2->branchdetail}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Tanggal Kontrak</div>
                        <div class="input-group">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" class="form-control borderInput" name="tgl_kontrak" placeholder="Pilih Tanggal" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Jatuh Tempo <span class="text-pink">*</span></div>
                        <div class="input-group">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" class="form-control borderInput" name="jatuh_tempo" placeholder="Pilih Tanggal" required/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 my-1">
                        <div class="title-sm  d-inline-block">Supplier <span class="text-pink">*</span></div>
                        <select class="form-control borderInput2 select2bs_supplier" id="buyer2" name="supplier" style="cursor:pointer" required>
                            <option value="" selected>Pilih Supplier</option>
                            @foreach($ListSupplier as $key => $value)
                                <option name="supplier" value="{{$value['id']}}">{{$value['text']}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">NPWP Supplier</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="npwp_supplier" name="npwp_supplier" placeholder="Masukan NPWP Supplier..." >
                        </div>
                    </div>
                    <!-- <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Tarik CB Asli </div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="tarik_cb" name="tarik_cb" placeholder="Masukan CB Asli..." >
                        </div>
                    </div> -->
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Pengusaha TPB</div>
                        <div class="input-group">
                            <input type="text" value="PT.GISTEX GARMEN INDONESIA" class="form-control borderInput" id="pengusaha_tpb" name="pengusaha_tpb" placeholder="Masukan Nama TPB..." >
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">NPWP Gistex</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="npwp" name="npwp" value='315608729423000' placeholder="Masukan Nomor NPWP..." >
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">NOMOR SURAT IZIN TPB </div>
                        <div class="input-group">
                            <input type="text" value="KEP-523/WBC.09/2022" class="form-control borderInput" id="izintpb" name="izintpb" value="KEP-523/WBC.09/2022" placeholder="Masukan Nomor Surat Izin TPB..." >
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Premi</div>
                        <div class="input-group">
                            <input type="number" class="form-control borderInput" id="premi" name="premi" placeholder="Masukan Premi..." >
                        </div>
                    </div>
                    <!-- <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">BC 262</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="bc_262" name="bc_262" placeholder="Masukan BC 262..." >
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">JDE</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="jde" name="jde" placeholder="Masukan JDE..." >
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Nilai Jaminan</div>
                        <div class="input-group">
                            <input type="number" class="form-control borderInput" id="nilai_jaminan" name="nilai_jaminan" placeholder="Masukan Nilai..." readonly >
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Kurs US *</div>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control borderInput" id="kurs" name="kurs" placeholder="Masukan jenis pekerjaan..." >
                        </div>
                    </div> -->

                    <!-- <div class="col-md-6 my-1">
                        <div class="title-sm mb-1">Amount</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="amount" name="amount" placeholder="Masukan Amount..." >
                        </div>
                    </div> -->

                    <!-- <div class="col-6">
                        <div class="title-sm mb-1">Nomor Surat Izin TPB</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="no_tpb" name="no_tpb" placeholder="Masukan Nomor Surat Izin TPB..." >
                        </div>
                    </div> -->

                    <div class="col-12 my-1">
                        <div class="title-sm mb-1">Jenis Pekerjaan</div>
                        <div class="input-group">
                            <input type="text" class="form-control borderInput" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Masukan jenis pekerjaan..." >
                        </div>
                    </div>

                    <div class="col-md-12 my-1">
                        <div class="title-sm mb-1">Nama PPIC<span class="text-pink">*</span></div>
                        <div class="input-group">
                            <select class="form-control borderInput select2bs" id="nik" name="nik" style="cursor:pointer" required>
                            <option value="" selected>Select Nama PPIC</option>
                            @foreach($karyawan as $key => $value)
                                <option name="nik" value="{{$value['nik']}}">{{$value['nama']}} [{{$value['nik']}}]</option>    
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 my-1">
                        <div class="title-sm mb-1">Keterangan</div>
                        <div>
                            <textarea placeholder="Masukkan Keterangan.." name="ket" class="form-control borderInput py-2" id="ket"></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-1">
                        <div class="title-sm mb-1">Dokumen Perhitungan Jaminan <span class="text-pink">*</span></div>
                        <div class="customFile">
                            <input type="file" class="customFileInput" id="file1" name="file1" value="file1" accept=".xlsx, .xls, .csv" required>
                            <label class="customFileLabelsBlue" for="file1">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 my-1">
                        <div class="title-sm mb-1">Dokumen Barang Jadi <span class="text-pink">*</span></div>
                        <div class="customFile">
                            <input type="file" class="customFileInput" id="file2" name="file2" value="file2" accept=".xlsx, .xls, .csv" required>
                            <label class="customFileLabelsBlue" for="file2">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-12">
                        <button type="submit" class="btn-blue btn-block">Save<i class="wp-icon-btn fas fa-download"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>