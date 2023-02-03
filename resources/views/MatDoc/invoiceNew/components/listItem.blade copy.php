
@extends("layouts.no_breadcrumb.app")
@section("title","List Item")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section("content")
<style>
    .nav-tabs {
        border-bottom: none !important;
    }
</style>
<section class="content">
    <div class="container-fluid invoiceList">
        <div class="row pb-4">
            <div class="col-12">
                <div class="cards3 py-4 mt-3">
                    @include('MatDoc.invoiceNew.partials.stepbar')
                </div>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form  action="{{route('invoice.storeDataInvoice')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_invoice_detail" value="{{ $id }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="cardPart">
                                        <div class="cardHead p-3">
                                            <div class="justify-sb3">
                                                <div class="title-20-blue no-wrap">INVOICE ITEM</div>
                                                <div class="endSide flexx gap-3">
                                                    <div class="DTtableSearch">
                                                        <input type="text" id="SearchText" class="searchText" placeholder="Search...">
                                                        <button type="button" id="SearchBtn" class="iconSearch"><i class="fas fa-search"></i></button>
                                                    </div>
                                                    <div class="flex gap-3">
                                                        <a href="" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:37px;height:37px"><i class="fs-20 fas fa-file-excel"></i></a>
                                                        <a href="" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:37px;height:37px"><i class="fs-20 fas fa-file-pdf"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section"></div>
                                        <div class="cardBody p-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="cards-scroll scrollX" id="scroll-bar">
                                                        <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                                                            <thead>
                                                                <tr class="bg-thead2">
                                                                    <th>NO</th>

                                                                    <!-- agron,Hexapole,Matsuoka,Jiangsu,Toyota,Benlux,HAP,ExpressWorld,RitraCargo,Adrenalin -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
                                                                    <th>PO NUMBER</th>
                                                                    @endif

                                                                    <!-- agron, Hexapole,Teijin,Hongkong -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                                                    <th>WO NUMBER</th>
                                                                    @endif

                                                                    <!-- marubeni, Hexapole, Marusa, JCP Penne -->
                                                                    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
                                                                    <th>CONTRACT NUMBER</th>
                                                                    @endif
                                                                    
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY'|| $data->buyer == 'PENTEX LTD')
                                                                    <th>STYLE</th>
                                                                    @endif

                                                                    @if ($data->buyer == 'PENTEX LTD')
                                                                    <th>DOCKET NUMBER</th>
                                                                    <th>DESTINATION NUMBER</th>
                                                                    <th>KIMBALL NUMBER</th>
                                                                    @endif

                                                                    <!-- {{-- agron, marubeni, Hexapole, Matsuoka, Pantex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'JC PENNEY')
                                                                    <th>ITEM</th>
                                                                    @endif

                                                                    <!-- {{-- Marubeni, Hexapole, Express World --}} -->
                                                                    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                                                    <th>SIZE</th>
                                                                    @endif

                                                                    <!-- {{-- pentex,HAP, Express World, Asmara Adrenaline --}} -->
                                                                    @if ($data->buyer == 'PENTEX LTD' ||$data->buyer == 'HAP., CO LTD'|| $data->buyer == 'ASMARA INTERNATIONAL LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                                                    <th>COLOUR</th>
                                                                    @endif

                                                                    @if ($data->buyer == 'PENTEX LTD')
                                                                    <th>SUB</th>
                                                                    <th>L&P</th>
                                                                    <th>CARTON QTY </th>
                                                                    <th>NO OF UNITS</th>
                                                                    <th>NO OF SET</th>
                                                                    <th>CM</th>
                                                                    <th>FABRIC</th>
                                                                    <th>TRIMS</th>
                                                                    @endif

                                                                    <!-- {{-- agron, marubeni,Hexapole, Teijin, Hong kong, Matsuoka, Pentex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                    <th>DESCRIPTION OF GOODS</th>
                                                                    @endif

                                                                    <!-- {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Pantex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                    <th>HS CODE</th>
                                                                    @endif

                                                                    <!-- {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                    <th>QUANTITY</th>
                                                                    @endif
                                                                    
                                                                    <!-- {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                    <th>UNIT</th>
                                                                    @endif

                                                                    <!-- {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                    <th>UNIT PRICE ($)</th>
                                                                    @endif

                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                    <th>AMOUNT ($)</th>
                                                                    @endif                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($data2 as $key =>$value)
                                                                <tr>
                                                                    <!-- wo  -->
                                                                    @if ($data->buyer != 'AGRON, INC.' && $data->buyer != 'HEXAPOLE COMPANY LIMITED' && $data->buyer != 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                                                    <input type="hidden" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['wo'] }}" readonly>
                                                                    @endif

                                                                    <td>{{ $loop->iteration }}</td>

                                                                    <!-- po  -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
                                                                    <td> <input type="text" class="form-control border-input" id="po" name="po[]" value="{{ $value['po'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    @endif

                                                                    <!-- {{-- agron, Hexapole,Teijin,Hongkong  --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                                                    <td><input type="text" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['wo'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    @endif

                                                                    @if ($data->buyer == 'PENTEX LTD')
                                                                    <td><input type="text" class="form-control border-input" id="style" name="style[]" value="{{ $value['style'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    @endif

                                                                    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
                                                                    <td><input type="text" class="form-control border-input" id="contract" name="contract[]" value="{{ $value['contract'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    @endif

                                                                    @if ($data->buyer == 'PENTEX LTD')
                                                                    <td> <input type="text" class="form-control borderInput" id="" name="docket_no[]" placeholder="-" style="min-width:250px" required></td>
                                                                    <td> <input type="text" class="form-control borderInput" id="" name="destination_no[]" placeholder="-" style="min-width:250px" ></td>
                                                                    <td> <input type="text" class="form-control borderInput" id="" name="kimball_no[]" placeholder="-" style="min-width:250px" ></td>
                                                                    @endif

                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY')
                                                                    <td><input type="text" class="form-control border-input" id="style" name="style[]" value="{{ $value['style'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    @endif

                                                                    @if ($data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'JC PENNEY')
                                                                    <td>ITEM <input type="text" class="form-control borderInput" id="" name="item[]" placeholder="-" style="min-width:250px" required></td>
                                                                    @endif

                                                                    <!-- {{-- Marubeni, Hexapole, Express World --}} -->
                                                                    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                                                    <td>
                                                                        <input type="text" class="form-control border-input" id="size" name="size[]" value="{{ $value['size'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                                                                    </td>
                                                                    @endif

                                                                    <!-- {{-- pentex,HAP, Express World, Asmara Adrenaline --}} -->
                                                                    @if ($data->buyer == 'PENTEX LTD' ||$data->buyer == 'HAP., CO LTD'|| $data->buyer == 'ASMARA INTERNATIONAL LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                                                    <td>
                                                                        <input type="text" class="form-control borderInput" id="" name="color[]" placeholder="-" style="min-width:250px" required>
                                                                    </td>
                                                                    @endif

                                                                    @if ($data->buyer == 'PENTEX LTD')
                                                                    <td>
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control borderInput" id="" name="sub[]" placeholder="-" style="min-width:250px" required>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control borderInput" id="" name="lp[]" placeholder="-" style="min-width:250px" required>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control borderInput" id="" name="carton_qty[]" value="{{ $value['carton_qty'] }}" placeholder="-" style="min-width:250px">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control borderInput" id="" name="no_of_units[]" placeholder="-" style="min-width:250px">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control borderInput" id="" name="no_of_set[]" placeholder="-" style="min-width:250px">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control borderInput" id="" name="cm[]" placeholder="-" style="min-width:250px">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control borderInput" id="" name="fabric[]" placeholder="-" style="min-width:250px">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control borderInput" id="" name="trims[]" placeholder="-" style="min-width:250px">
                                                                        </div>
                                                                    </td>
                                                                    @endif

                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                        <td>
                                                                            <div class="container-tbl-btn">
                                                                                <input type="text" class="form-control borderInput" id="" name="descOfGood[]" list="fabric" placeholder="-" style="min-width:250px" required>
                                                                            </div>
                                                                        </td>
                                                                    @endif

                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')

                                                                        <td>
                                                                            <div class="container-tbl-btn">
                                                                                <input type="text" class="form-control borderInput" id="" name="hsCode[]" placeholder="-" required>
                                                                            </div>
                                                                        </td>
                                                                    @endif

                                                                    <!-- {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                        <td><input type="text" class="form-control border-input qty" id="qty" name="qty[]" value="{{ $value['qty'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    @endif

                                                                    <!-- {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                        <td><input type="text" class="form-control border-input" id="unit" name="unit[]" value="{{ strtoupper($value['satuan']) }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    @endif

                                                                    <!-- {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}} -->
                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                        <td>
                                                                            <div class="container-tbl-btn">
                                                                                <input type="text" class="form-control borderInput unitPrice" name="unitPrice[]" placeholder="-" required>
                                                                            </div>
                                                                        </td>
                                                                    @endif

                                                                    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                                        <td><input type="text" class="form-control border-input amount" name="amount[]" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    @endif
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    @if ($data->buyer == 'AGRON, INC.' )
                                                                    <th colspan="5">INVOICE TOTAL</th>
                                                                    @elseif ($data->buyer == 'HEXAPOLE COMPANY LIMITED')
                                                                    <th colspan="8">INVOICE TOTAL</th>
                                                                    @elseif ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                                                    <th colspan="4">INVOICE TOTAL</th>
                                                                    @else
                                                                    <th colspan="6">INVOICE TOTAL</th>
                                                                    @endif
                                                                    <td colspan="2" class="flex">
                                                                        <input type="text" class="form-control borderInput totalPack" name="totalPack" value="{{ $value['totalPack'] }}" placeholder="-" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                                                                        PACK
                                                                    </td> 
                                                                    <td><input type="text" class="form-control borderInput totalInvoice" name="totalInvoice" id="totalInvoice" placeholder="-" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                                    <td class="fw-6">USD</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="10">
                                                                        <div class="container-tbl-btn">
                                                                            <input type="text" class="form-control readOnlyForm" id="terbilang" name="terbilang" style="font-style: italic" readonly>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <datalist id="fabric"></datalist> 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button type="submit" class="btn-blue-md btnNext d-inline-block">Next & Save <i class="fs-18 ml-2 fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('/js/terbilang.js')}}"></script>
<script type="text/javascript">
  $('#totalInvoice').terbilang({
    lang: 'en',
    output: $('#terbilang')
  });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementsByClassName('form-control'); 
    let elementCreate = (optionlist)=> {
        console.log(optionlist)
        let oldList = document.querySelector('datalist')
        oldList.innerHTML = ''
        if(!optionlist) {
        } else {
            optionlist.map((data)=> {
                let option = document.createElement('option'); 
                option.setAttribute('value', data); 
                option.innerHTML = data
                oldList.appendChild(option)
            })
        }
        return
    }

    const storageDataLoad = localStorage.getItem('recomendation');
    let dataListLoad = JSON.parse(storageDataLoad);
    elementCreate(dataListLoad)

    Array.from(form).forEach(f => {
        f.addEventListener('blur', function(){   
            const storageData = localStorage.getItem('recomendation');
            let dataList = JSON.parse(storageData);
            if(!dataList) {
                dataList = []
            }
            let temp = dataList.find((data)=> data === f.value )
            if(!temp) {
                if(f.value !== '') {
                    // Buat data baru
                    let NewData = [...dataList, f.value]
                    // Push ke localstorage
                    localStorage.setItem('recomendation', JSON.stringify(NewData))
                    // Hapus child sebelumnya
                    elementCreate(NewData)
                }
            }

        })
    })



}, false);
</script>
<script>
   
//   $('.select2bs4').select2({
//       theme: 'bootstrap4'
//   })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
<script>
  $(document).ready( function () {
     
    var table = $('#DTtable').DataTable({
    "pageLength": 10,
    "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    });
  });
  var input = document.getElementById("SearchText");
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("SearchBtn").click();
      }
  });

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".unitPrice").keyup(function() {
            const node = this.parentNode.parentNode.parentNode;
            
            let qty = node.getElementsByClassName('qty')[0].value; 
            // let total = node.getElementsByClassName('total')
            node.getElementsByClassName('amount')[0].value = parseFloat(qty) * parseFloat(this.value); 
            function calculateSum() {
                var sum = 0;
                //iterate through each textboxes and add the values
                $(".amount").each(function() {
                    //add only if the value is number
                    if(!isNaN(this.value) && this.value.length!=0) {
                        sum += parseFloat(this.value);
                    }
                    console.log(sum)
                });
                //.toFixed() method will roundoff the final sum to 2 decimal places
                $("#totalInvoice").val(sum.toFixed(0));
            } 
        node.getElementsByClassName('totalInvoice')[0].value = calculateSum(); 
            // var qty  = $("#qty").val();
            // // var unitPrice = $("#unitPrice").val();
            // var total2 = parseInt(qty) * parseInt(this.value);
            // $(".amount").val(total2);
        });
    });
</script>
@endpush
