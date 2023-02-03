<div class="col-xl-3 col-md-6">
    <div class="flat-card pd-flat-card" style="height:156px">
        <div class="flat-title">Invoice</div>
        <div class="flat-desc"> {{$IsianKotakPutih['invoice']}}</div>
        @if (auth()->user()->branch == 'CLN')
        <div class="flat-title mt-2">No Surat jalan</div>
        <div class="flat-desc truncate">{{$IsianKotakPutih['no_surat_jalan']}}-{{$IsianKotakPutih['no_surat_jalan2']}}</div>
        @else 
        <div class="flat-title mt-2">No Surat jalan</div>
        @endif
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="flat-card pd-flat-card" style="height:156px">
        <div class="flat-title">Buyer</div>
        <div class="flat-desc">{{$IsianKotakPutih['buyer']}}</div>
        @if (auth()->user()->branch == 'CLN')
        <div class="flat-title mt-2">Date</div>
        <div class="flat-desc truncate">{{$IsianKotakPutih['tanggal_surat']}}</div>
        @else 
        <div class="flat-title mt-2">Date</div>
        @endif
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="flat-card pd-flat-card" style="height:156px">
        <div class="flat-title">Container No</div>
        <div class="flat-desc">{{$IsianKotakPutih['no_kontainer']}}{{$IsianKotakPutih['no_kontainer2']}}</div>
        @if (auth()->user()->branch == 'CLN')
        <div class="flat-title mt-2">Seal No</div>
        <div class="flat-desc truncate">{{$IsianKotakPutih['no_seal']}}-{{$IsianKotakPutih['no_seal2']}}</div>
        @else 
        <div class="flat-title mt-2">Seal No</div>
        @endif
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="flat-card pd-flat-card" style="height:156px">
        <div class="flat-title">Download Packing List</div>
        <div class="containerGrid">
            <a href="{{ route('packing.EkspedisiPDF',$IsianKotakPutih['kode_ekspedisi']) }}" class="btn-merah">Download<i class="fs-18 ml-3 fas fa-file-pdf"></i></a>
            <a href="{{ route('packing.EkspedisiExcel',$IsianKotakPutih['kode_ekspedisi']) }}" class="btn-green">Download<i class="fs-18 ml-3 fas fa-file-excel"></i></a>
        </div>
    </div>
</div>