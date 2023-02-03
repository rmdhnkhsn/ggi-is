<div class="row mt-3">
    <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card h-155">
            <div class="flat-title">Surat Persetujuan-BPJ</div>
            <div class="flat-desc">{{$data_kontrak->no_skep}}</div>
            <div class="flat-title mt-2">Tanggal Surat Persetujuan</div>
            <div class="flat-desc">{{$data_kontrak->tgl_persetujuan}}</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card h-155">
            <div class="flat-title">Nomor Kontrak Kerja</div>
            <div class="flat-desc">{{$data_kontrak->sub_no_kontrak}}</div>
            <div class="flat-title mt-2">SUBKON</div>
            <div class="flat-desc">{{$data_kontrak->jenis_pekerjaan}}</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card h-155">
            <div class="flat-title">Akhir Masa SUBKON</div>
            <div class="flat-desc">{{$data_kontrak->jatuh_tempo}}</div>
            <div class="flat-title mt-2">Customer BOND Number</div>
            <div class="flat-desc">{{$data_kontrak->no_bound}}</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="flat-card pd-flat-card h-155">
            <div class="flat-title">Jatuh Tempo Jaminan</div>
            <div class="flat-desc">{{$data_kontrak->jatuh_tempo}}</div>
            <div class="flat-title mt-2">Nilai Jaminan</div>
            <div class="flat-desc">Rp {{number_format($data_kontrak->nilai_jaminan, 2, "," , ".")}}</div>
        </div>
    </div>
</div>