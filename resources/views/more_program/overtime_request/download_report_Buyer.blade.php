<!DOCTYPE html>
<html lang="en">

<style>
    *{font-family: sans-serif;}
    .img {width:100px;margin-right:-72px}
    .f-20 {font-size: 20px;font-weight: 600;} .f-18 {font-size: 18px;font-weight: 600;} .f-16 {font-size: 16px;font-weight:400;} .f-14 {font-size: 14px;font-weight:400;} .f-12 {font-size: 12px;font-weight:400;}
    .fw-600 {font-weight:600}
    .table-remark {font-size:11px;font-style:italic}
    .mt-min-2 {margin-top: -2px} .mt-min-10 {margin-top: -10px}
    .mt-1 {margin-top: 0.25rem !important;} .mt-2 {margin-top: 0.5rem !important;} .mt-3 {margin-top: 1rem !important;} .mt-4 {margin-top: 1.5rem !important;} .mt-5 {margin-top: 3rem !important;}
    .ml-1 {margin-left: 0.25rem !important;} .ml-2 {margin-left: 0.5rem !important;} .ml-3 {margin-left: 1rem !important;} .ml-4 {margin-left: 1.5rem !important;} .ml-5 {margin-left: 3rem !important;}
    .pl-1 {padding-left: 0.25rem !important;} .pl-2 {padding-left: 0.5rem !important;} .pl-3 {padding-left: 1rem !important;} .pl-4 {padding-left: 1.5rem !important;} .pl-5 {padding-left: 3rem !important;}
    .text-center {text-align:center}
    .text-left {text-align:left}
    .border-double {border: thick double #000;}
    .underline {text-decoration: underline}
    .no-wrap {white-space: nowrap}
    table {border-collapse: collapse;}
    .tables { display: table; width: 100%;}
    .bg-header {background-color:#ccc}
    .bg-jumlah {background-color:#ffb07c}
    .bg-total {background-color:#e7e408}
    .fs-14, td, th {font-size:14px;}
    .table-bordered {border: 1px solid #000;}
    .table-bordered th,.table-bordered td {border: 1px solid #000;}
    .flex {display:flex}
    .w-50 {width:50%;}
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <b style="font-size:13px">FORM MONITORING OVERTIME BY BUYER</b> 
                <table class="table-borderless">
                    <tr>
                        <td width="68px" style="font-size:11px"><b>TANGGAL</b></td> 
                        <td width="8px">:</td>
                        <td style="font-size:11px"><b>{{$tgl_awal}} s/d {{$tgl_akhir}}</b></td> 
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 mt-1">
               <table class="tables table-bordered">
                        @foreach($collect_record as $key =>$value)
                        <tr>
                            <th colspan="7">FACTORY : {{$key}}</th>
                        </tr>
                        <tr class="bg-header">
                            <th rowspan="3" width="60px" style="font-size:11px;padding:3px">BUYER</th>
                            <th colspan="3" style="font-size:11px;padding:3px">PLAN OVERTIME</th>
                            <th colspan="3" style="font-size:11px;padding:3px">REALISASI OVERTIME</th>
                        </tr>
                        <tr class="bg-header">
                            <th rowspan="2" width="100px" style="font-size:10px;padding:3px">COST</th>
                            <th colspan="2" style="font-size:10px;padding:3px">TARGET</th>
                            <th rowspan="2" width="100px" style="font-size:10px;padding:3px">COST</th>
                            <th colspan="2" style="font-size:10px;padding:3px">TARGET</th>
                        </tr>
                        <tr class="bg-header">
                            <th style="font-size:10px;">KUALITATIF</th>
                            <th style="font-size:10px;">KUANTITATIF</th>
                            <th style="font-size:10px;">KUALITATIF</th>
                            <th style="font-size:10px;">KUANTITATIF</th>
                        </tr>
                        <tbody>
                            @foreach($value as $key2=>$value2)
                            <tr>
                                <td style="font-size:10px;padding:3px"><b>{{$value2['buyer']}}</b></td> 
                                <td style="font-size:10px;padding:3px;text-align:center">Rp. {{number_format($value2['cost_rencana'], 2, ",", ".")}}</td>
                                <td style="font-size:10px;padding:3px">{{$value2['target_kualitatif']}}</td>
                                <td style="font-size:10px;padding:3px">{{$value2['target_kuantitatif']}}</td>
                                <td style="font-size:10px;padding:3px;text-align:center">Rp. {{number_format($value2['cost_realisasi'], 2, ",", ".")}}</td>
                                <td style="font-size:10px;padding:3px">{{$value2['realisasi_kualitatif']}}</td>
                                <td style="font-size:10px;padding:3px">{{$value2['realisasi_kuantitatif']}}</td>
                            </tr>
                            @endforeach

                            @foreach($total_branch as $key3=>$value3)
                            @if($value3['branch']==$key)
                            <tr class="bg-jumlah">
                                <td style="font-size:11px;padding:3px;text-align:center"><b>TOTAL {{$key}}</b></td> 
                                <td style="font-size:11px;padding:3px;text-align:center"><b>Rp. {{number_format($value3['cost_rencana'], 2, ",", ".")}}</b></td> 
                                <td></td>
                                <td style="font-size:11px;padding:3px"><b>{{$value3['target_kuantitatif']}}</b></td>
                                <td style="font-size:11px;padding:3px;text-align:center"><b>Rp. {{number_format($value3['cost_realisasi'], 2, ",", ".")}}</b></td>
                                <td></td>
                                <td style="font-size:11px;padding:3px;text-align:center"><b>{{$value3['realisasi_kuantitatif']}}</b></td> 
                            </tr>
                            @endif
                            @endforeach
                            
                            @endforeach
                        </tbody>
                        <tr class="bg-total">
                            <td style="font-size:11px;padding:3px;text-align:center"><b>TOTAL ALL</b></td> 
                            <td style="font-size:11px;padding:3px;text-align:center"><b>Rp. {{number_format($total_all['cost_rencana'], 2, ",", ".")}}</b></td> 
                            <td></td>
                            <td style="font-size:11px;padding:3px"><b>{{$total_all['target_kuantitatif']}}</b></td>
                            <td style="font-size:11px;padding:3px;text-align:center"><b>Rp. {{number_format($total_all['cost_realisasi'], 2, ",", ".")}}</b></td>
                            <td></td>
                            <td style="font-size:11px;padding:3px;text-align:center"><b>{{$total_all['realisasi_kuantitatif']}}</b></td> 
                        </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>