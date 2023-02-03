<div class="row mt-4">
    <div class="rc-col-2">
        <div class="sb-card justify-start p-3">
            <div class="keterangan">Total Fabric</div>
            <div class="count">{{$total_fabric}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card justify-start p-3">
            <div class="keterangan">Total Garment</div>
            <div class="count">{{$TotalGarment}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card justify-start p-3">
            <div class="keterangan">Qty Contract</div>
            <div class="count">{{$qty_kontrak}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card justify-start p-3">
            <div class="keterangan">Balance</div>
            <div class="count">{{$Balance}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card2 justify-start p-3">
            <div class="keterangan">Master Upload CEISA</div>
            <a href="{{route('subkon.uploadtpb',$no_kontrak)}}" class="export-excel"><i class="fas fa-file-excel"></i></a>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card2 justify-start p-3">
            <div class="keterangan">Rekap Penutupan</div>
            <a href="{{route('subkon.monitoring.excel',$no_kontrak)}}" class="export-excel"><i class="fas fa-file-excel"></i></a>
        </div>
    </div>
</div>