<div class="modal fade" id="info{{$value['no_kontrak']}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true" style="z-index:999">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:610px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <span class="title-sm ml-2" style="color : #2B2B2B">Created At : {{$value['created_at']}}</span>
                    <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button> 
                </div>
            </div>
            <div class="row px-4">
                <div class="col-md-6">
                    <span class="general-identity-title">Kategori Subkon</span>
                    <div class="input-group my-2">
                        <input type="text" class="form-control borderInput" id="" name="kategori_subkon" value="{{$value['kategori_subkon']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Bisnis Unit</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append ">
                                <div class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-building"></i></span></div>
                            </div>
                            <input type="text" class="form-control borderInput " id="branch" name="branch" value="{{$value['branch']}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">NO Surat Persetujuan-SKEP </span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput" id="no_skep" name="no_skep" value="{{$value['no_skep']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Tanggal Surat Persetujuan</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append ">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control datetimepicker-input borderInput" data-target="#persetujuan" name="tgl_persetujuan" value="{{$value['tgl_persetujuan']}}" readonly/>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <span class="title-sm">NO BPJ</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="no_bpj" name="no_bpj" value="{{$value['no_bpj']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Tanggal BPJ</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append ">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control datetimepicker-input borderInput" data-target="#bpj" name="tgl_bpj" value="{{$value['tgl_bpj']}}" readonly/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Customer BOND NO</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="no_bound" name="no_bound" value="{{$value['no_bound']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="title-sm mb-1">Tanggal Custom BOND NO </div>
                    <div class="input-group">
                        <div class="input-group date">
                            <div class="input-group-append ">
                                <div class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></div>
                            </div>
                            <input type="date" class="form-control borderInput" name="tgl_cb" value="{{$value['tgl_cb']}}" placeholder="Pilih Tanggal" readonly/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Nilai Jaminan</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="nilai_jaminan" name="nilai_jaminan" value="{{$value['nilai_jaminan']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="general-identity-title">Kurs US</span>
                    <div class="input-group my-2">
                        <input type="text" class="form-control borderInput " id="kurs" name="kurs" value="{{$value['kurs']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Kontrak Kerja</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="no_kontrak" name="no_kontrak" value="{{$value['sub_no_kontrak']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Branch Makloon </span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append ">
                                <div class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-building"></i></span></div>
                            </div>
                            <input type="text" class="form-control borderInput " id="branch" name="branch" value="{{$value['branchdetail']}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="general-identity-title">Tanggal Kontrak</span>
                    <div class="input-group my-2">
                        <div class="input-group date">
                            <div class="input-group-append ">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="tgl_kontrak" value="{{$value['tgl_kontrak']}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Jatuh Tempo</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append ">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control datetimepicker-input borderInput" data-target="#jatuh_tempo" name="jatuh_tempo" value="{{$value['jatuh_tempo']}}" readonly/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Supplier</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="supplier" name="supplier" value="{{$value['supplier']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">NPWP Supplier</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="npwp_supplier" name="npwp_supplier" value="{{$value['npwp_supplier_jde']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Pengusaha TPB</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="pengusaha_tpb" name="pengusaha_tpb" value="{{$value['pengusaha_tpb']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">NPWP Gistex</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="npwp" name="npwp" value="{{$value['npwp']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="general-identity-title">NOMOR SURAT IZIN TPB </span>
                    <div class="input-group my-2">
                        <input type="text" class="form-control borderInput" id="izintpb" name="izintpb" value="{{$value['izintpb']}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="title-sm">Premi</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="number" class="form-control borderInput " id="premi" name="premi" value="{{$value['premi']}}" readonly>
                    </div>
                </div>
               
              
                

                <!-- <div class="col-md-6">
                    <span class="title-sm">Tarik CB Asli </span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="tarik_cb" name="tarik_cb" value="{{$value['tarik_cb']}}" readonly>
                    </div>
                </div> -->
                
                <!-- <div class="col-md-6">
                    <span class="title-sm">BC 262</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="bc_262" name="bc_262" value="{{$value['bc_262']}}" readonly>
                    </div>
                </div> -->
                <!-- <div class="col-md-6">
                    <span class="title-sm">JDE</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="jde" name="jde" value="{{$value['jde']}}" readonly>
                    </div>
                </div> -->

                
                
                
                <!-- <div class="col-md-6">
                    <span class="title-sm">Amount</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="amount" name="amount" value="{{$value['amount']}}" readonly>
                    </div>
                </div> -->
               
               
                
                <!-- <div class="col-6">
                    <span class="title-sm">Nomor Surat Izin TPB</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="no_tpb" name="no_tpb" value="{{$value['no_tpb']}}" readonly>
                    </div>
                </div> -->
                
                <div class="col-12">
                    <span class="title-sm">Jenis Pekerjaan</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="jenis_pekerjaan" name="jenis_pekerjaan" value="{{$value['jenis_pekerjaan']}}" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Nama PPIC</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control borderInput " id="nama" name="nama" value="{{$value['nama']}}" readonly>
                    </div>
                </div>
                
                <div class="col-12 mt-1">
                    <span class="title-sm">Keterangan</span>
                    <div class="mt-1 mb-3">
                        <textarea name="ket" class="form-control borderInput py-2" id="ket">{{$value['ket']}}</textarea>
                    </div>
                </div>
                <div class="col-12 pb-3">
                    <div class="title-sm">Nama dokumen Perhitungan Jaminan</div>
                    <div class="doc-jaminan mt-1 mb-3">
                        <div class="document">
                            <div class="doc-name"><i class="icon-doc fas fa-file-excel"></i>{{$value['file_jaminan']}}</div>
                            <div class="doc-name mt-1"><i class="icon-doc fas fa-file-excel"></i>{{$value['file_barang']}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>