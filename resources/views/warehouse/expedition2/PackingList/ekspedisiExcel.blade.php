<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
    <head>  
        <style>
            table, td, th {
                border: 1px solid black;
                font-size:9px;
                padding:3px;
                }
            table {
                border-collapse: collapse;
            }
                        #box1{
                            width:180px;
                            height:180px;
                    padding:10px;
                    border: 2px solid grey;
                            background:white;
                        }
                #tabel{
                            width:100%;
                            height: auto;
                    padding:10px;
                    border: 2px solid grey;
                            background:white;
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
            .tables { display: table; width: 100%;}
            .tables-row { display: table-row; }
            .tables-cell { display: table-cell; padding: 1em; }
            .page_break { page-break-inside: auto; }
        </style>
    </head>
    <body> 
        <!-- info  -->
        <!-- Agron  -->
        @if($IsianKotakPutih['buyer']  =='AGRON, INC.')
            @include('warehouse.expedition2.PackingList.partials.lb_download.info.excel.agron')
        <!-- Matsuoka  -->
        @elseif ($IsianKotakPutih['buyer']  =='MATSUOKA TRADING CO., LTD.')
            @include('warehouse.expedition2.PackingList.partials.lb_download.info.excel.matsuoka')
        <!-- Kazen  -->
        @elseif ($IsianKotakPutih['buyer']  == 'MARUBENI CORPORATION JEPANG')
            @include('warehouse.expedition2.PackingList.partials.lb_download.info.excel.kazen')
        <!-- Nishimatsuya  -->
        @elseif ($IsianKotakPutih['buyer'] == 'MARUBENI FASHION LINK LTD.')
            @include('warehouse.expedition2.PackingList.partials.lb_download.info.excel.nishimatsuya')
        <!-- Hexapule -->
        @elseif ($IsianKotakPutih['buyer']  =='HEXAPOLE COMPANY LIMITED')
            @include('warehouse.expedition2.PackingList.partials.lb_download.info.excel.agron')
        @else
            <!-- @include('warehouse.expedition2.PackingList.partials.lb_download.info.excel.lainnya') -->
            @include('warehouse.expedition2.PackingList.partials.lb_download.info.excel.agron')
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
    </body>
</html>