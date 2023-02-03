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
          <ul class="nav nav-tabs orangeTabs">
            <li class="nav-side">
              <a href="{{ route('invoice.index')}}" class="btnPrevious"><i class="fas fa-arrow-left"></i>Back To List</a> 
            </li>
            <li class="nav-item-show">
              <a href="{{ route('invoiceList.buyer')}}" class="nav-link active">
                <div class="checkGreen"><img src="{{url('images/iconpack/invoice/double-check.svg')}}"></div>
                <!-- <div class="number">1</div> -->
                Buyer
              </a>
              <div class="sliderGreen"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('invoiceList.information')}}" class="nav-link">
                <div class="checkGreen"><img src="{{url('images/iconpack/invoice/double-check.svg')}}"></div>
                Information
              </a>
              <div class="sliderGreen"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('invoiceList.list-item')}}" class="nav-link">
                <div class="checkGreen"><img src="{{url('images/iconpack/invoice/double-check.svg')}}"></div>
                List Item
              </a>
              <div class="sliderGreen"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('invoiceList.preview')}}" class="nav-link">
                <div class="numberOrange">4</div>
                Preview
              </a>
              <div class="sliderOrange"></div>
            </li>
            <li class="nav-side">
              <a href="{{ route('invoice.index')}}" class="btn-blue-md no-wrap saveAll" id="saveAll" >Save Draft</a> 
            </li>
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane active">
            <div class="row">
                <div class="col-12">
                    <div class="cardPart">
                        <div class="cardHead p-3">
                            <div class="justify-sb3">
                                <div class="title-20-blue no-wrap">PREVIEW INVOICE</div>
                                <div class="endSide">
                                    <div class="flex gap-3">
                                        <a href="{{ route('invoiceList.previewPDF','filter='.$filter) }}" class="btn-merah">Download<i class="ml-2 fas fa-file-pdf"></i></a>
                                        <a href="" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-20 fas fa-file-excel"></i></a>
                                        <a href="" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-20 fas fa-file-pdf"></i></a>
                                        <a href="" class="btn-black-md" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Print" style="height:35px">Print<i class="fs-20 ml-3 fas fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section"></div>
                        <div class="cardBody p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="headerPreview">
                                        <div class="left-side">
                                            <img src="{{url('images/iconpack/invoice/gistex-red.svg')}}" width="180px">
                                            <div class="title-28-grey2 mb-min">PT. GISTEX GARMEN INDONESIA</div>
                                        </div>
                                        <div class="right-side">
                                            <div class="office">
                                                <div class="title-12 judul text-left">Office</div> 
                                                <div class="address">
                                                    <div class="mr-3" style="margin-top:-5px">:</div>
                                                    <div class="title-12 text-left">Jl. Hegarmanah No.5 RT 002 RW 003 Hegarmanah, Cidadap, Bandung 40141</div>
                                                </div>
                                            </div>
                                            <div class="factory mt-2">
                                                <div class="title-12 judul text-left">Factory</div>
                                                <div class="address">
                                                    <div class="mr-3" style="margin-top:-5px">:</div>
                                                    <div class="title-12 text-left">Jl. Panyawungan KM.19<br/> Cileunyi Wetan, Cileunyi<br/> Kab. Bandung, Jawabarat 40393<br/>Telp  : (62-002) - 7796683, 7796684, 7798885 <br/>Fax <span style="margin-left:5px">:</span> (62-002) - 7796686</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                  <div class="headerTable">
                                    <div class="containerHeader">
                                      <div class="all">
                                        <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Beneficiary :</div>
                                        <div class="desc">{{ $invoiceHeader->company_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->city_bene }}</div>  
                                                                                              {{-- <div class="desc">{{ $invoiceHeader->address_bene }}</div>   --}}
                                                                                              {{-- <div class="desc">HEGARMANAH CIDADAP KOTA BANDUNG</div>  
                                        <div class="desc">JAWA BARAT 40141</div>   --}}
                                        <div class="desc">TEL : +62 22 4241308 , FAX :+62 22 4239650</div>  
                                      </div>
                                      <div class="half">
                                        <div class="desc"><span class="title">COMMERCIAL INVOICE</span> : {{ $invoiceHeader->invoice_no }}</div> 
                                        <div class="desc"><span class="title">DATE</span> : {{ $invoiceHeader->date }}</div> 
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="part">
                                        <div class="title">For account and risk :</div>
                                        <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_for }}</div>  
                                        <div class="desc">{{ $invoiceHeader->country_for }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Consignee / Ship to :</div>
                                        <div class="desc">{{ $invoiceHeader->consigne }}</div>  
                                        <div class="desc">{{ $invoiceHeader->addres_cons }}</div>  
                                        <div class="desc">{{ $invoiceHeader->shipto }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Container No :</div>
                                        <div class="desc"> {{ $invoiceHeader->container_no }} </div>  
                                        <div class="desc"> {{ $invoiceHeader->container_no2 }}'HC</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Seal No :</div>
                                        <div class="desc">{{ $invoiceHeader->seal_no }}</div>  
                                        <div class="desc">{{ $invoiceHeader->seal_no2 }}</div>  
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="part">
                                        <div class="title">Vessel name & Voyage :</div>
                                        <div class="desc">{{ $invoiceHeader->visel_name }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Ship on Board :</div>
                                        <div class="desc">{{ $invoiceHeader->shipOnBoard }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Port Of Loading :</div>
                                        <div class="desc">{{ $invoiceHeader->partOfLoading }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Port Of Destination :</div>
                                        <div class="desc">{{ $invoiceHeader->partOfDestination }}</div>  
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half text-center fw-5">{{ $invoiceHeader->delivery_terms }} </div>
                                      <div class="half text-center"><span class="fw-5">PAYMENT</span> : {{ $invoiceHeader->payment }}</div> 
                                    </div>
                                  </div>
                                  <table class="table table-sm tbl-content-12 table-bordered text-center">
                                    <thead>
                                      <tr class="bg-thead2">
                                            <th>NO</th>
                                          {{-- agron,Hexapole,Matsuoka,Jiangsu,Toyota,Benlux,HAP,ExpressWorld,RitraCargo,Adrenaline --}}
                                          @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
                                            <th>PO NUMBER</th>
                                          @endif
                                          {{-- agron, Hexapole,Teijin,Hongkong  --}}
                                          @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                            <th>WO NUMBER</th>
                                          @endif
                                          {{-- marubeni, Hexapole, Marusa, JCP Penney --}}
                                          @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
                                            <th>CONTRACT NUMBER</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>DOCKET NUMBER</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>DESTINATION NUMBER</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>KIMBALL NUMBER</th>
                                          @endif
                                          {{-- agron, marubeni, Hexapole, Matsuoka, Pantex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                          @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY')
                                            <th>STYLE</th>
                                          @endif
                                          @if ($data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'JC PENNEY')
                                            <th>ITEM</th>
                                          @endif
                                          {{-- Marubeni, Hexapole, Express World --}}
                                          @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                            <th>SIZE</th>
                                          @endif
                                          {{-- pentex,HAP, Express World, Asmara Adrenaline --}}
                                          @if ($data->buyer == 'PENTEX LTD' ||$data->buyer == 'HAP., CO LTD'|| $data->buyer == 'ASMARA INTERNATIONAL LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                            <th>COLOUR</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>SUB</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>L&P</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>CARTON QTY </th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>NO OF UNITS</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>NO OF SET</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>CM</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>FABRIC</th>
                                          @endif
                                          @if ($data->buyer == 'PENTEX LTD')
                                            <th>TRIMS</th>
                                          @endif
                                          {{-- agron, marubeni,Hexapole, Teijin, Hong kong, Matsuoka, Pentex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
                                          @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                            <th>DESCRIPTION OF GOODS</th>
                                          @endif
                                          {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Pantex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                          @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                            <th>HS CODE</th>
                                          @endif
                                          {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                          @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                            <th>QUANTITY</th>
                                          @endif
                                          {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
                                          @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                            <th>UNIT</th>
                                          @endif
                                          {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
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
                                                <input type="hidden" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['wo'] }}" readonly>
                                                <td>{{ $loop->iteration }}</td>
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
                                            <td>{{ $value['wo'] }}</td>
                                            @endif
                                          {{-- agron, Hexapole,Teijin,Hongkong  --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                            <td>{{ $value['po'] }}</td>
                                            @endif
                                            @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
                                            <td>{{ $value['contract'] }}</td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>DOCKET NUMBER</td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>DESTINATION NUMBER</td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>KIMBALL NUMBER</td>
                                            @endif
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY')
                                            <td>{{ $value['style'] }}</td>
                                            @endif

                                            @if ($data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'JC PENNEY')
                                            <td>ITEM</td>
                                            @endif
                                          {{-- Marubeni, Hexapole, Express World --}}
                                            @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                            <td>{{ $value['size'] }}</td>
                                            @endif
                                          {{-- pentex,HAP, Express World, Asmara Adrenaline --}}
                                            @if ($data->buyer == 'PENTEX LTD' ||$data->buyer == 'HAP., CO LTD'|| $data->buyer == 'ASMARA INTERNATIONAL LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                            <td>COLOUR
                                                <input type="text" class="form-control border-input" id="colour" name="colour[]" value="{{ $value['colour'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly>
                                            </td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td class="text-left">{{ $value['descOfGood'] }}</td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>L&P
                                                
                                            </td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>CARTON QTY 
                                                
                                            </td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>NO OF UNITS
                                                
                                            </td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>NO OF SET
                                                
                                            </td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>CM
                                                
                                            </td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>FABRIC
                                                
                                            </td>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                            <td>TRIMS
                                                
                                            </td>
                                            @endif
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                              <td class="text-left">{{ $value['descOfGood'] }}</td>
                                            @endif
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')

                                                      <td>{{ $value['hsCode'] }}</td>

                                            @endif
                                          {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                              <td>{{ $value['qty'] }}</td>
                                            @endif
                                          {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                <td>{{ $value['unit'] }}</td>
                                                            
                                            @endif
                                          {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                <td class="text-left">$ {{ $value['unitPrice'] }}</td>
                                            @endif

                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                  <td class="text-left">$ {{ $value['amount'] }}</td>
                                            @endif
                                      </tr>
                                      @endforeach
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        @if ($data->buyer == 'AGRON, INC.' )
                                        <th colspan="5">INVOICE TOTAL</th>
                                        @else
                                        <th colspan="6">INVOICE TOTAL</th>
                                        @endif
                                        <th colspan="2">{{ $dataInvoiceHeader->totalPack }} {{ $dataInvoiceHeader->unit }}</th>
                                        <th></th>
                                        <th class="text-left">${{ $dataInvoiceHeader->totalInvoice }}</th>
                                      </tr>
                                    </tfoot>
                                  </table>
                                  <div class="footerTable">
                                    <div class="containerFooter">
                                      <div class="all">
                                        <div class="title-12-dark text-center">{{ $dataInvoiceHeader->terbilang }}</div>
                                      </div>
                                    </div>
                                    <div class="containerFooter">
                                      <div class="half">
                                        <div class="title">Manufacture Name & Address :</div>
                                        <div class="desc">{{ $invoiceHeader->manufacture_name }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_manu }}</div>  
                                        <div class="desc">{{ $invoiceHeader->country_manu }}</div>  
                                        <div class="desc">TEL :{{ $invoiceHeader->telp_manu }}</div>  
                                        <div class="desc">MID CODE :{{ $invoiceHeader->mid_manu }}</div>
                                      </div>
                                      <div class="half justify-end" style="align-items: flex-start">
                                        <div class="grid-center">
                                          <div class="title">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
                                          <img src="{{url('images/iconpack/invoice/ttd.svg')}}">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
  $('.saveAll').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Successfully',
      text: 'Invoice data Sucessfully Created.',
      buttons: false,
      timer: 5000
    })
  });
</script>

<script>
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

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
@endpush

