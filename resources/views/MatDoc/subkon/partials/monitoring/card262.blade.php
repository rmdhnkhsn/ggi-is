<div class="row mt-4">
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total Fabric</div>
            <div class="txt2">{{$total_fabric}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Total Garment</div>
            <div class="txt2">{{$TotalGarment}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Qty Contract</div>
            <div class="txt2">{{$qty_kontrak}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card p-3">
            <div class="txt1">Balance</div>
            <div class="txt2">{{$Balance}}</div>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card2 p-3">
            <div class="txt1">Master Upload CEISA</div>
            <a href="{{route('subkon.uploadtpb',$no_kontrak)}}" class="export-excel"><i class="fas fa-file-excel"></i></a>
        </div>
    </div>
    <div class="rc-col-2">
        <div class="sb-card2 p-3">
            <div class="txt1">Rekap Penutupan</div>
            <a href="{{route('subkon.monitoring.excel',$no_kontrak)}}" class="export-excel"><i class="fas fa-file-excel"></i></a>
        </div>
    </div>
</div>