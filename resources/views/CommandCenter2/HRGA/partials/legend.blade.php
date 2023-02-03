<div class="barLegends">
    @foreach($value as $key2 => $value2)
        @if($value2['departemen'] == 'BUSINESS & DEVELOPMENT')
            <div class="container">
                <div class="bisnis"></div><div class="text">Bussines Development</div>
            </div>
        @endif
        @if($value2['departemen'] == 'MARKETING')
            <div class="container">
                <div class="marketing"></div><div class="text">Marketing</div>
            </div>
        @endif  
        @if($value2['departemen'] == 'GLOBAL')
            <div class="container">
                <div class="global"></div><div class="text">GLOBAL</div>
            </div>
        @endif  
        @if($value2['departemen'] == 'HR & GA')
            <div class="container">
                <div class="hr"></div><div class="text">HR & GA</div>
            </div>
        @endif
        @if($value2['departemen'] == 'MANAGEMENT')
            <div class="container">
                <div class="hr"></div><div class="text">MANAGEMENT</div>
            </div>
        @endif
        @if($value2['departemen'] == 'MATERIAL & EXIM')
            <div class="container">
                <div class="exim"></div><div class="text">Material & Exim</div>
            </div>
        @endif
        @if($value2['departemen'] == 'IT & DIGITAL TRANSFORMATION')
            <div class="container">
                <div class="itdt"></div><div class="text">IT & DT</div>
            </div>
        @endif
        @if($value2['departemen'] == 'PRODUKSI')
            <div class="container">
                <div class="produksi"></div><div class="text">Produksi</div>
            </div>
        @endif
        @if($value2['departemen'] == 'PRODUCTION')
            <div class="container">
                <div class="production"></div><div class="text">Produksi</div>
            </div>
        @endif
        @if($value2['departemen'] == 'QUALITY')
            <div class="container">
                <div class="quality"></div><div class="text">Quality</div>
            </div>
        @endif
        @if($value2['departemen'] == 'ACCOUNTING')
            <div class="container">
                <div class="accounting"></div><div class="text">Accounting</div>
            </div>
        @endif
    @endforeach
</div>