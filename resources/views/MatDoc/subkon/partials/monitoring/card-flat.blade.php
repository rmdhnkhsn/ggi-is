<div class="row mt-3">
    <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card h-210">
            <div class="flat-title">Nomor Kontrak Kerja</div>
            <div class="flat-desc">{{$data_kontrak->sub_no_kontrak}}</div>
            <div class="flat-title mt-2">Tanggal Kontrak Kerja</div>
            <div class="flat-desc">{{$data_kontrak->tgl_kontrak}}</div>
            <div class="flat-title mt-2">Jenis Pekerjaan </div>
            <div class="flat-desc">{{$data_kontrak->jenis_pekerjaan}}</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card h-210">
            <div class="flat-title">Surat Persetujuan - SKEP</div>
            <div class="flat-desc">{{$data_kontrak->no_skep}}</div>
            <div class="flat-title mt-2 text-truncate">Tanggal Surat Persetujuan - SKEP Date</div>
            <div class="flat-desc">{{$data_kontrak->tgl_persetujuan}}</div>
            <div class="flat-title mt-2">Nilai Jaminan</div>
            <div class="flat-desc">Rp{{number_format($data_kontrak->nilai_jaminan, 2, "," , ".")}}</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card h-210">
            <div class="flat-title text-truncate">Nomor Bukti Penerimaan Jaminan - BPJ</div>
            <div class="flat-desc">{{$data_kontrak->no_bpj}}</div>
            <div class="flat-title mt-2 text-truncate">Tanggal Penerimaan Jaminan</div>
            <div class="flat-desc">{{$data_kontrak->tgl_bpj}}</div>
            <div class="flat-title mt-2 text-truncate">Tanggal Jatuh Tempo SUB Kontrak</div>
            <div class="flat-desc">{{$data_kontrak->jatuh_tempo}}</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="row">
            <div class="col-12">
                <div class="flat-card px-3 py-2">
                    <div class="flat-title text-truncate">Tanggal Jatuh Tempo Jaminan</div>
                    <div class="flat-desc">{{$data_kontrak->jatuh_tempo}}</div>
                </div>
            </div>
            <div class="col-12">
                <div class="flat-card h-134 pd-flat-card">
                    <div class="flat-title text-truncate">Hari Ini</div>
                    <div class="flat-date">{{$hari}},<br> {{$tanggal}}</div>
                </div>
            </div>
        </div>
    </div>
</div>