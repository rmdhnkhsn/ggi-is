<style>
.btn_abu {
    width: auto;
    height: auto;
    padding: 2px;
    border-radius: 8px;
    background-color: #DBDBDB;
}
.btn_ijo {
    width: auto;
    height: auto;
    padding: 2px;
    border-radius: 8px;
    background-color: #67C965;
}
.label_ijo{
    font-size: 18px;
    color: #67C965;
    text-align:center;
    font-weight:bold;
}
.label_abu{
    font-size: 18px;
    color: #DBDBDB;
    text-align:center;
    font-weight:bold;
}
</style>

<div class="row">
    <a href="{{route('production.grafik')}}" class="col-lg-2 col-6">
        <div>
            <div class="label_ijo">GRAFIK LINE</div>
            <div class="container btn_ijo"></div>
        </div>
    </a>
    @if($grafik->fq_id == 0)
    <a href="{{route('production.grafikBatang')}}" class="col-lg-2 col-6">
        <div>
            <div class="label_abu">GARFIK BAR</div>
            <div class="container btn_abu"></div>
        </div>
    </a>
    @endif
    <div class="col-lg-2 col-6">
        
    </div>
    <div class="col-lg-2 col-6">
        
    </div>
    <div class="col-lg-2 col-6">
    </div>
</div>