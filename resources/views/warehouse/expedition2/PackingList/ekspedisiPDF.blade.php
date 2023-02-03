<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
    <head>
        <style>
            table,tr, td, th {
                border: 1px solid black;
                text-align:center;
                font-size:12px;
                padding:3px;
                margin-bottom: 0;
            }

            .header tr, .header th {
                border: none !important;
            }

            table {
                border-collapse: collapse;
                font-size:12px;
            }
                #tabel{
                width:100%;
                height: auto;
                padding:4px;
                border: 3px solid grey;
                background:white;
                align ; left;
                    }
                #tab{
                width:100%;
                        height: auto;
                border: 1px solid grey;
                        background:white;
                    }
                #tbl{
                width:100%;
                        height: 200px;
                border: 1px solid grey;
                        background:white;
                    }
                h7 {
                text-decoration: overline;
                }
                input[type=text] {
                width: 100%;
                box-sizing: border-box;
                border: none;
                border-bottom: 2px solid black;
            }
            .dit {
            width: 180px;
            padding: 3px;
            border: 1px solid black;
            margin: 0;
            }
            h3{
                margin-bottom: -10px;
            }
            h4{
                margin-top: -15px;
            }
            
            .tables { display: table; width: 100%;}
            .tables-row { display: table-row; }
            .tables-cell { display: table-cell; padding: 1em; }
            .page_break { page-break-before: always; }
            .none {color:#fff}
            .tbl-none tr th, .tbl-none tr td {border: 1px solid #fff}
        </style>
    </head>
    <body> 
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                                <table class="tbl-none" style="width: 100%; !important;margin-bottom:2rem" >
                                    <tr>
                                        <th width="70%" style="padding-top:60px;text-align:left">
                                            <img src="{{ storage_path('/app/public/databaseSmv/img/gistex-red.svg') }}">
                                            <span style="font-size:28px;margin-left:24px">PT. GISTEX GARMEN INDONESIA</span>
                                        </th>
                                        <td width="10%" style="font-size:14px;text-align:right;padding:right:12px">
                                            <span style="width:200px;position:relative;top:0">Office</span> <span class="ml-2">:</span>
                                            <div class="none">x</div>
                                            <div class="none">x</div>
                                            <span style="width:200px;position:relative;top:0">Factory</span> <span class="ml-2">:</span>
                                            <div class="none">x</div>
                                            <div class="none">x</div>
                                            <div class="none">x</div>
                                            <div class="none">x</div>
                                        </td>
                                        <td width="20%" style="font-size:14px;text-align:left">
                                            <span >Jl. Hegarmanah No.5 RT 002 RW 003 Hegarmanah, Cidadap, Bandung 40141</span><br/>
                                            <div class="none">x</div>
                                            <span >Jl. Panyawungan KM.19<br/>Cileunyi Wetan, Cileunyi<br/>Kab. Bandung, Jawabarat 40393<br/>Telp : (62-002) - 7796683, 7796684, 7798885<br/>Fax : (62-002) - 7796686</span>
                                        </td>
                                    </tr>
                                </table>
                                <center><h2 style="font-weight:bold;">PACKING REPORT</h2></center>
                                <center><h4>PT GISTEX GARMENT INDONESIA</h4></center> 
                                <br>
                                <!-- info  -->
                                <!-- AGRON  -->
                                @if($IsianKotakPutih['buyer']  =='AGRON, INC.')
                                    @include('warehouse.expedition2.PackingList.partials.lb_download.info.pdf.agron')
                                <!-- MATSUOKA  -->
                                @elseif ($IsianKotakPutih['buyer']  =='MATSUOKA TRADING CO., LTD.')
                                    @include('warehouse.expedition2.PackingList.partials.lb_download.info.pdf.matsuoka')
                                <!-- MARUBENI  -->
                                @elseif ($IsianKotakPutih['buyer']  =='MARUBENI CORPORATION JEPANG' || $IsianKotakPutih['buyer'] == 'MARUBENI FASHION LINK LTD.')
                                    @include('warehouse.expedition2.PackingList.partials.lb_download.info.pdf.marubeni')
                                <!-- HEXAPOLE  -->
                                @elseif ($IsianKotakPutih['buyer']  =='HEXAPOLE COMPANY LIMITED')
                                    @include('warehouse.expedition2.PackingList.partials.lb_download.info.pdf.agron')
                                <!-- LAINNYA  -->
                                @else
                                    @include('warehouse.expedition2.PackingList.partials.lb_download.info.pdf.agron')
                                @endif
                                <!-- End info  -->
                                <br>
                                <?php 
                                    $jumlahSize = collect($jenisSize)->count();
                                    $count=0; 
                                    $no=1;
                                ?>
                                <table style="width:100%">
                                    <!-- THEAD  -->
                                    <!-- AGRON  -->
                                    @if($IsianKotakPutih['buyer']  =='AGRON, INC.')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.agron')
                                    <!-- MATSUOKA  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='MATSUOKA TRADING CO., LTD.')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.matsuoka')
                                    <!-- Kazen  -->
                                    @elseif ($IsianKotakPutih['buyer']  == 'MARUBENI CORPORATION JEPANG')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.kazen')
                                    <!-- Nishimatsuya  -->
                                    @elseif ($IsianKotakPutih['buyer'] == 'MARUBENI FASHION LINK LTD.')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.nishimatsuya')
                                    <!-- COCOS  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='COCOS SAMPLE')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.cocos')
                                    <!-- TEIJIN  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='TEIJIN FRONTIER CO., LTD SEC. 831')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.teijin')
                                    <!-- HEXAPOLE  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='HEXAPOLE COMPANY LIMITED')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.agron')
                                    <!-- Toyota  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='TOYOTA TSUSHO CORPORATION')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.toyota')
                                    <!-- GTHS  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='GTHS')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.gths')
                                    <!-- LAINNYA  -->
                                    @else
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.header.agron')
                                    @endif
                                    <!-- End Thead  -->

                                    <!-- TBODY  -->
                                    @foreach($dataTabel as $key => $value)
                                        <?php
                                            $jumlahCartoon = collect($value)->sum('qty_carton');
                                            $patokan_wh = collect($value)->first();
                                            $total_pcs = collect($value)->sum('total_pcs');
                                            $nw = collect($value)->sum('nw');
                                            $gw = collect($value)->sum('gw');
                                        ?>
                                        <!-- AGRON  -->
                                        @if($IsianKotakPutih['buyer']  =='AGRON, INC.')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.agron')
                                        <!-- MATSUOKA  -->
                                        @elseif ($IsianKotakPutih['buyer']  =='MATSUOKA TRADING CO., LTD.')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.matsuoka')
                                        <!-- Kazen  -->
                                        @elseif ($IsianKotakPutih['buyer']  == 'MARUBENI CORPORATION JEPANG')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.kazen')
                                        <!-- Nishimatsuya  -->
                                        @elseif ($IsianKotakPutih['buyer'] == 'MARUBENI FASHION LINK LTD.')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.nishimatsuya')
                                        <!-- COCOS  -->
                                        @elseif ($IsianKotakPutih['buyer']  =='COCOS SAMPLE')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.cocos')
                                        <!-- TEIJIN  -->
                                        @elseif ($IsianKotakPutih['buyer']  =='TEIJIN FRONTIER CO., LTD SEC. 831')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.teijin')
                                        <!-- HEXAPOLE  -->
                                        @elseif ($IsianKotakPutih['buyer']  =='HEXAPOLE COMPANY LIMITED')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.agron')
                                        <!-- Toyota  -->
                                        @elseif ($IsianKotakPutih['buyer']  =='TOYOTA TSUSHO CORPORATION')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.toyota')
                                        <!-- GTHS  -->
                                        @elseif ($IsianKotakPutih['buyer']  =='GTHS')
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.gths')
                                        <!-- LAINNYA  -->
                                        @else
                                            @include('warehouse.expedition2.PackingList.partials.lb_download.body.agron')
                                        @endif
                                    @endforeach
                                    <!-- End Tbody  -->
                                    <!-- GrandTotal  -->
                                    <?php 
                                        $total_carton = collect($resume)->sum('qty_carton');
                                        $total_pcs = collect($resume)->sum('total_pcs');
                                        $total_nw = collect($resume)->sum('nw');
                                        $total_gw = collect($resume)->sum('gw');
                                    ?>
                                    <!-- AGRON  -->
                                    @if($IsianKotakPutih['buyer']  =='AGRON, INC.')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.agron')
                                    <!-- MATSUOKA  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='MATSUOKA TRADING CO., LTD.')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.matsuoka')
                                    <!-- Kazen  -->
                                    @elseif ($IsianKotakPutih['buyer']  == 'MARUBENI CORPORATION JEPANG')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.kazen')
                                    <!-- Nishimatsuya  -->
                                    @elseif ($IsianKotakPutih['buyer'] == 'MARUBENI FASHION LINK LTD.')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.nishimatsuya')
                                    <!-- COCOS  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='COCOS SAMPLE')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.cocos')
                                    <!-- TEIJIN  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='TEIJIN FRONTIER CO., LTD SEC. 831')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.teijin')
                                    <!-- HEXAPOLE  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='HEXAPOLE COMPANY LIMITED')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.agron')
                                    <!-- Toyota  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='TOYOTA TSUSHO CORPORATION')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.toyota')
                                    <!-- GTHS  -->
                                    @elseif ($IsianKotakPutih['buyer']  =='GTHS')
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.gths')
                                    <!-- LAINNYA  -->
                                    @else
                                        @include('warehouse.expedition2.PackingList.partials.lb_download.grand_total.agron')
                                    @endif
                                    <!-- End GrandTotal  -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </body>
</html>