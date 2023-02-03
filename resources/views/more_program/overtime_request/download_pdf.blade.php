<!DOCTYPE html>
<html lang="en">

<style>
    .img {width:100px;margin-right:-72px}
    .f-20 {font-size: 20px;font-weight: 600;} .f-18 {font-size: 18px;font-weight: 600;} .f-16 {font-size: 16px;font-weight:400;} .f-14 {font-size: 14px;font-weight:400;}
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
    .fs-14, td, th {font-size:14px;}
    .table-bordered {border: 1px solid #000;}
    .table-bordered th,.table-bordered td {border: 1px solid #000;}
    .flex {display:flex}
    .w-50 {width:50%;}
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="tables table-borderless">
                    <tbody>
                        <tr>
                            <td style="width : 12%"><img class="img" src="{{ public_path('/images/ggi-gold.png') }}"></td>
                            <td style="width:80%">
                                <div class="f-18">PT.GISTEX GARMEN INDONESIA</div>
                                <div class="f-14 mt-min-2">JL.Panyawungan Km 19 - Cileunyi Wetan</div>
                            </td>
                            <td style="width:30%">
                                <table class="table table-borderless table-sm text-left">
                                    <tr>
                                        <th style="font-size : 12px; padding-left: 10px; text-align : left">Form ID</th>
                                        <th style="font-size : 12px; padding-left: 10px; text-align : left">Request Date</th>
                                        <th style="font-size : 12px; padding-left: 10px; text-align : left">Approve 1</th>
                                        <th style="font-size : 12px; padding-left: 10px; text-align : left">Approve 2</th>
                                    </tr>
                                    <tr>
                                        <td style="font-size : 12px; padding-left: 10px; text-align : left">{{$data['id']}}</td>
                                        <td style="font-size : 12px; padding-left: 10px; text-align : left">{{$data['waktu_pembuatan']}}</td>
                                        <td style="font-size : 12px; padding-left: 10px; text-align : left">{{$data['waktu_app1']}}</td>
                                        <td style="font-size : 12px; padding-left: 10px; text-align : left">{{$data['waktu_app2']}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 text-center mt-4">
                <div class="f-20">FORMULIR RENCANA & REALISASI KERJA LEMBUR</div>
                <div class="f-14 mt-1">KB-06/P-50/HRGA/F-01/06/2016</div>
            </div>
        </div>
        <div class="row mt-3 border-double">
            <table class="table-borderless">
                <tbody>
                    <tr>
                        <td width="600px">
                            <table class="table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="pl-3">BUYER</td>
                                        <td class="pl-3">: {{$data['buyer']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-3">NO.PO/WO</td>
                                        <td class="pl-3">: {{$data['wo']}}</td>
                                    </tr>
                                    <tr>
                                        @if($data['kategori']=="kualitatif")
                                        <td class="pl-3">ALASAN </td>
                                        @elseif($data['kategori']=="kuantitatif")
                                        <td class="pl-3">ITEM</td>
                                        @endif
                                        <td class="pl-3">: {{$data['item']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="600px">
                            <table class="table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="pl-3">JUMLAH ORANG</td>
                                        <td class="pl-3">: {{$data['jumlah_orang']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-3">TARGET</td>
                                        <td class="pl-3">: {{$data['target']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-3">ACTUAL</td>
                                        <td class="pl-3">: {{$data['aktual']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-12 mt-1" style="margin:-1px">
                <table class="tables table-bordered fs-14">
                    <thead>
                        <tr class="bg-header">
                            <th colspan="2" class="text-left pl-3">TANGGAL : {{$data['tanggal']}}</th>
                            <th>NAMA ADM</th>
                            <th>DISERAHKAN <div>TANGGAL</div></th>
                            <th>PERSONALIA</th>
                            <th>DITERIMA <div>TANGGAL</div></th> 
                            <th>STATUS <div class="table-remark">(Diisi Oleh Personalia)</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>DEPARTMENT : {{$data['departemen']}}</td>
                            <td>BAGIAN : {{$data['bagian']}}</td>
                            <!-- <td></td> -->
                            <td>{{$data['nama']}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-3" style="margin:-1px">
                <table class="tables table-bordered fs-14 text-center">
                    <thead>
                        <tr class="bg-header">
                            <th rowspan="2" width="4%">NO</th>
                            <th rowspan="2" width="7%">NIK</th>
                            <th rowspan="2" width="13%">NAMA</th>
                            <th rowspan="2" width="25%">TARGET PEKERJAAN</th>
                            <th colspan="3" width="13%">RENCANA</th>
                            <th width="10%">PERSETUJUAN <div>KARYAWAN</div></th>
                            <th colspan="3" width="28%">REALISASI</th>
                        </tr>
                        <tr class="bg-header">
                            <th>JAM AWAL</th>
                            <th>JAM AKHIR</th>
                            <th>JUMLAH JAM</th>
                            <th>TTD</th>
                            <th>JAM <div>AWAL</div></th>
                            <th>JAM <div>AKHIR</div></th>
                            <th>JUMLAH <div>JAM</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0;?>
                        @foreach ($karyawan as $key=>$value)
                        <?php $no++;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$value->nik}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->target_pekerjaan}}</td>
                            <td>{{$value->rencana_jam_awal}}</td>
                            <td>{{$value->rencana_jam_akhir}}</td>
                            <td>{{$value->rencana_total}}</td>
                            <td></td>
                            <td>{{$value->realisasi_jam_awal}}</td>
                            <td>{{$value->realisasi_jam_akhir}}</td>
                            <td>{{$value->realisasi_total}}</td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <td colspan="3"></td>
                        </tr> -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11" style="height: 12px"></td>
                        </tr>
                        <tr>
                            <td rowspan="2" colspan="4" class="text-left pl-2">
                             <div>#Formulir Rencana dan Realisasi Kerja Lembur dikumpulkan lengkap dengan tanda tangan approval maksimal 1 hari setelah tanggal lembur <span class="fw-600">JAM 12.00 WIB</span></div>   
                            </td>
                            <th class="bg-header" style="height:32px">SUPERVISOR</th>
                            <th class="bg-header" style="height:32px">KABAG</th>
                            <th class="bg-header" style="height:32px">MANAGER</th>
                            <th class="bg-header" style="height:32px">SUPERVISOR</th>
                            <th class="bg-header" style="height:32px">KABAG</th>
                            <th class="bg-header" style="height:32px">MANAGER</th>
                            <th class="bg-header" style="height:32px">HRD</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Approved</th>
                            <th></th>
                            <th></th>
                            <th>Approved</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>