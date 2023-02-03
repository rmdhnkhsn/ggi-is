<div class="row mt-4">
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total BM 262 (Rp)</div>
            <div class="txt2">{{number_format($data262['totalbm'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total PPN 262 (Rp)</div>
            <div class="txt2">{{number_format($data262['totalppn'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total PPH 262 (Rp)</div>
            <div class="txt2">{{number_format($data262['totalpph'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total Jaminan 262 (Rp)</div>
            <div class="txt2">{{number_format($data262['totaljaminan'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Jaminan Tersisa 262 (Rp)</div>
            <div class="txt2">{{number_format($data262['jaminan_tersisan'], 0, ",", ".")}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Balance Jaminan (RP) </div>
            <div class="txt2">{{number_format($data261['totaljaminan']-$data262['totaljaminan'], 0, ",", ".")}}</div>
        </div>
    </div>
</div>