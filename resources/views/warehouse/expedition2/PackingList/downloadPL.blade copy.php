@extends("layouts.app")
@section("title","Detail Packing List")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-3 text-center">
                <div class="title-30">PACKING LIST </div>
                <div class="title-20">PT. GISTEX GARMEN INDONESIA</div>
            </div>
            @include('warehouse.expedition2.PackingList.partials.info')
        </div>
        <div class="row pb-5 mt-2">
            <div class="col-12 mb-2">
                <div class="cards-18" style="padding:1.5rem">
                    <?php 
                        $jumlahSize = collect($jenisSize)->count();
                        $count=0; 
                        $no=1;
                    ?>
                    @foreach($dataTabel as $key => $value)
                    <div class="cards-scroll scrollX" id="scroll-bar">
                        <?php
                            $wh = '';
                            $jumlahCartoon = collect($value)->sum('qty_carton');
                            $patokan_wh = collect($value)->first();
                            $total_pcs = collect($value)->sum('total_pcs');
                            $nw = collect($value)->sum('nw');
                            $gw = collect($value)->sum('gw');
                            if ($patokan_wh['warehouse'] == "-") {
                                $wh = null;
                            }
                        ?>
                        <table id="DTtable4" class="table tbl-content-left no-wrap">
                            <!-- AGRON  -->
                            @if($IsianKotakPutih['buyer']  =='AGRON, INC.')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.agron')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.agron')
                            <!-- MATSUOKA  -->
                            @elseif($IsianKotakPutih['buyer']  == 'MATSUOKA TRADING CO., LTD.')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.matsuoka')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.matsuoka')
                            <!-- Kazen  -->
                            @elseif ($IsianKotakPutih['buyer']  == 'MARUBENI CORPORATION JEPANG')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.kazen')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.kazen')
                            <!-- Nishimatsuya  -->
                            @elseif ($IsianKotakPutih['buyer'] == 'MARUBENI FASHION LINK LTD.')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.nishimatsuya')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.nishimatsuya')
                            <!-- COCOS  -->
                            @elseif ($IsianKotakPutih['buyer']  =='COCOS SAMPLE')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.cocos')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.cocos')
                            <!-- TEIJIN  -->
                            @elseif ($IsianKotakPutih['buyer']  =='TEIJIN FRONTIER CO., LTD SEC. 831')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.teijin')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.teijin')
                            <!-- HEXAPOLE  -->
                            @elseif ($IsianKotakPutih['buyer']  =='HEXAPOLE COMPANY LIMITED')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.agron')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.agron')  
                            <!-- Toyota  -->
                            @elseif ($IsianKotakPutih['buyer']  =='TOYOTA TSUSHO CORPORATION')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.toyota')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.toyota') 
                            <!-- GTHS  -->
                            @elseif ($IsianKotakPutih['buyer']  =='GTHS')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.gths')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.gths') 
                            @else
                          
                            <!-- LAINNYA  -->
                                @include('warehouse.expedition2.PackingList.partials.lb_download.header.agron')
                                @include('warehouse.expedition2.PackingList.partials.lb_download.body.agron')
                            @endif
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Isian Kotak putih biru dibawah  -->
    <?php 
        $total_carton = collect($resume)->sum('qty_carton');
        // dd($total_carton);
        $total_pcs = collect($resume)->sum('total_pcs');
        $total_nw = collect($resume)->sum('nw');
        $total_gw = collect($resume)->sum('gw');
    ?>
    <div class="col-12">
        <div class="row">
            <div class="rc-col-2">
                <div class="sb-card p-3">
                    <div class="txt1">Total Carton</div>
                    <div class="txt2">{{$total_carton}}</div>
                </div>
            </div>
            <div class="rc-col-2">
                <div class="sb-card p-3">
                    <div class="txt1">Total Pcs</div>
                    <div class="txt2">{{$total_pcs}}</div>
                </div>
            </div>
            <div class="rc-col-2">
                <div class="sb-card p-3">
                    <div class="txt1">NW</div>
                    <div class="txt2">{{$total_nw}}</div>
                </div>
            </div>
            <div class="rc-col-2">
                <div class="sb-card p-3">
                    <div class="txt1">GW</div>
                    <div class="txt2">{{$total_gw}}</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
@endpush