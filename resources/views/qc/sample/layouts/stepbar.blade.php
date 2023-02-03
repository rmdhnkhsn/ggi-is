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
    /* background-color: #007BFF; */
}
.label_ijo{
    font-size: 18px;
    color: #67C965;
    /* color: #007BFF; */
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

<!-- Cek cek value  -->
<?php 
    $fabric_quality = collect($data->fabric_quality)->count('id');
    $cek_color = collect($data->color)->count('id');
    $cek_detail = collect($data->measurement)->count('id');
    $workmanship = collect($data->workmanship)->count('id');
?>
<div class="row">
    <a href="{{route('create.detail', $report_id)}}" class="col-lg-2 col-6">
        <div>
            <div class="label_ijo">MASTER</div>
            <div class="container btn_ijo"></div>
        </div>
    </a>
    <!-- Fabric Quality  -->
    @if($fabric_quality == 0)
        <a href="{{route('fq.add', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_abu">FABRIC QUALITY</div>
                <div class="container btn_abu"></div>
            </div>
        </a>
    @else
        <a href="{{route('fq.show', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_ijo">FABRIC QUALITY</div>
                <div class="container btn_ijo"></div>
            </div>
        </a>
    @endif

    <!-- Color  -->
    @if($cek_color == 0)
        <a href="{{route('sample_color.add', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_abu">COLOR</div>
                <div class="container btn_abu"></div>
            </div>
        </a>
    @else
        <a href="{{route('sample_color.show', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_ijo">COLOR</div>
                <div class="container btn_ijo"></div>
            </div>
        </a>
    @endif

    <!-- Measurement  -->
    @if($cek_color != 0 && $cek_detail == 0)
        <a href="{{route('sample_measurement.add', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_abu">MSR DETAIL</div>
                <div class="container btn_abu"></div>
            </div>
        </a>
    @elseif($cek_color == 0 && $cek_detail == 0)
        <a href="" class="col-lg-2 col-6">
            <div>
                <div class="label_abu">MSR DETAIL</div>
                <div class="container btn_abu"></div>
            </div>
        </a>
    @else
        <a href="{{route('sample_measurement.show', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_ijo">MSR DETAIL</div>
                <div class="container btn_ijo"></div>
            </div>
        </a>
    @endif

    <!-- Workmanship  -->
    @if($workmanship == 0)
        <a href="{{route('work.add', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_abu">WORKMANSHIP</div>
                <div class="container btn_abu"></div>
            </div>
        </a>
    @else
        <a href="{{route('work.show', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_ijo">WORKMANSHIP</div>
                <div class="container btn_ijo"></div>
            </div>
        </a>
    @endif

    @if($fabric_quality != 0 && $cek_color != 0 && $cek_detail != 0 && $workmanship != 0)
        <a href="{{route('sample.final', $report_id)}}" class="col-lg-2 col-6">
            <div>
                <div class="label_ijo">FINAL REPORT</div>
                <div class="container btn_ijo"></div>
            </div>
        </a>
    @else
        <a href="" class="col-lg-2 col-6">
            <div>
                <div class="label_abu">FINAL REPORT</div>
                <div class="container btn_abu"></div>
            </div>
        </a>
    @endif
</div>