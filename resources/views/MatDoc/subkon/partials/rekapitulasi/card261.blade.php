<div class="row mt-4">
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total BM 261 (Rp)</div>
            <div class="txt2">{{number_format($data261['totalbm'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total PPN 261 (Rp)</div>
            <div class="txt2">{{number_format($data261['totalppn'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total PPH 261 (Rp)</div>
            <div class="txt2">{{number_format($data261['totalpph'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total Jaminan 261 (Rp)</div>
            <div class="txt2">{{number_format($data261['totaljaminan'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Jaminan Tersisa 261 (Rp)</div>
            <div class="txt2">{{number_format($data261['jaminan_tersisan'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Balance Jaminan (Rp)</div>
            <div class="txt2">{{number_format($data261['totaljaminan']-$data262['totaljaminan'], 0, ",", ".")}}</div>
        </div>
    </div>
</div>