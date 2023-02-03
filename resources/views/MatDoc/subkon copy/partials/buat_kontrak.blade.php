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
                    <div class="col-md-6">
                        <span class="general-identity-title">NO Surat Persetujuan-SKEP </span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_skep" name="no_skep" placeholder="Masukan Nomor SKEP..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Tanggal Surat Persetujuan</div>
                        <div class="input-group flex">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="tgl_persetujuan" placeholder="Pilih Tanggal" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">NO BPJ</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_bpj" name="no_bpj" placeholder="Masukan Nomor BPJ..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Tanggal BPJ</span>
                        <div class="input-group my-2">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="custom-calendar px-3" ><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" class="form-control input-data-fa" name="tgl_bpj" placeholder="Pilih Tanggal" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title mb-2 d-inline-block">Supplier *</span>
                        <select class="form-control borderInput2 select2bs_supplier" id="buyer2" name="supplier" style="cursor:pointer" required>
                            <option value="" selected>Pilih Supplier</option>
                            @foreach($ListSupplier as $key => $value)
                                <option name="supplier" value="{{$value['text']}}">{{$value['text']}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Jatuh Tempo *</span>
                        <div class="input-group my-2">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="custom-calendar px-3" ><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" class="form-control input-data-fa" name="jatuh_tempo" placeholder="Pilih Tanggal" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Kontrak Kerja *</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_kontrak" name="no_kontrak" placeholder="Masukan Nomor Kontrak Kerja..." required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Tanggal Kontrak</span>
                        <div class="input-group my-2">
                            <div class="input-group date">
                                <div class="input-group-append ">
                                    <div class="custom-calendar px-3" ><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" class="form-control input-data-fa" name="tgl_kontrak" placeholder="Pilih Tanggal" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Customer BOND NO</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_bound" name="no_bound" placeholder="Masukan Nomor CB..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Bisnis Unit *</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select  px-3" for="" ><i class="fas fa-building" style="font-size : 18px"></i></span>
                            </div>
                            <select class="form-control borderInput" id="branch" name="branch" style="cursor:pointer" required>
                            <option value="" selected>Select Bisnis Unit</option>
                            <option value="1201" name="branch">1201</option>    
                            <option value="1205" name="branch">1205</option>    
                            <option value="1204" name="branch">1204</option>
                            <option value="1206" name="branch">1206</option>    

                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">Tarik CB Asli </span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="tarik_cb" name="tarik_cb" placeholder="Masukan CB Asli..." >
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <span class="general-identity-title">Premi</span>
                        <div class="input-group my-2">
                            <input type="number" class="form-control borderInput" id="premi" name="premi" placeholder="Masukan Premi..." >
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">BC 262</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="bc_262" name="bc_262" placeholder="Masukan BC 262..." >
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">JDE</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="jde" name="jde" placeholder="Masukan JDE..." >
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <span class="general-identity-title">Nilai Jaminan</span>
                        <div class="input-group my-2">
                            <input type="number" class="form-control borderInput" id="nilai_jaminan" name="nilai_jaminan" placeholder="Masukan Nilai..." readonly >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Kurs US *</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control borderInput" id="kurs" name="kurs" placeholder="Masukan jenis pekerjaan..." required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">NOMOR SURAT IZIN TPB </span>
                        <div class="input-group my-2">
                            <input type="text" value="437/KM.4/2013" class="form-control borderInput" id="izintpb" name="izintpb" placeholder="Masukan Nomor Surat Izin TPB..." >
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <span class="general-identity-title">Amount</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="amount" name="amount" placeholder="Masukan Amount..." >
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <span class="general-identity-title">NPWP</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="npwp" name="npwp" placeholder="Masukan Nomor NPWP..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">Pengusaha TPB</span>
                        <div class="input-group my-2">
                            <input type="text" value="PT.GISTEX GARMEN INDONESIA" class="form-control borderInput" id="pengusaha_tpb" name="pengusaha_tpb" placeholder="Masukan Nama TPB..." >
                        </div>
                    </div>
                    <!-- <div class="col-6">
                        <span class="general-identity-title">Nomor Surat Izin TPB</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="no_tpb" name="no_tpb" placeholder="Masukan Nomor Surat Izin TPB..." >
                        </div>
                    </div> -->
                    <div class="col-12">
                        <span class="general-identity-title">Jenis Pekerjaan</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control borderInput" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Masukan jenis pekerjaan..." >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <span class="general-identity-title">Nama PPIC</span>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-select px-3" for=""><i class="fas fa-user" style="font-size : 18px"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs" id="nik" name="nik" style="cursor:pointer" required>
                            <option value="" selected>Select Nama PPIC</option>
                            @foreach($karyawan as $key => $value)
                                <option name="nik" value="{{$value['nik']}}">{{$value['nama']}} [{{$value['nik']}}]</option>    
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <span class="general-identity-title">Keterangan</span>
                        <div class="fa-message my-2">
                            <textarea placeholder="Masukkan Keterangan.." name="ket" class="remark-name" id="ket"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="ws-sub-title">Dokumen Perhitungan Jaminan</span>
                        <div class="custom-file my-2">
                            <input type="file" class="custom-file-input" id="file1" name="file1" accept=".xlsx, .xls, .csv" required>
                            <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="ws-sub-title">Dokumen Barang Jadi</span>
                        <div class="custom-file my-2">
                            <input type="file" class="custom-file-input" id="file2" name="file2" accept=".xlsx, .xls, .csv" required >
                            <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
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