<!DOCTYPE html>
<html lang="en">

<style>
    *{font-family: sans-serif !important;}
    .f-20 {font-size: 20px;font-weight: 600;} .f-18 {font-size: 18px;font-weight: 600;} .f-16 {font-size: 16px;font-weight:400;} .f-14 {font-size: 14px;font-weight:400;} .f-12 {font-size: 12px;font-weight:400;}
    .fw-600 {font-weight:600}
    .fw-400 {font-weight:400}
    .mt-min-2 {margin-top: -2px} .mt-min-10 {margin-top: -10px}
    .mt-1 {margin-top: 0.25rem !important;} .mt-2 {margin-top: 0.5rem !important;} .mt-3 {margin-top: 1rem !important;} .mt-4 {margin-top: 1.5rem !important;} .mt-5 {margin-top: 3rem !important;}
    .mb-1 {margin-bottom: 0.25rem !important;} .mb-2 {margin-bottom: 0.5rem !important;} .mb-3 {margin-bottom: 1rem !important;} .mb-4 {margin-bottom: 1.5rem !important;} .mb-5 {margin-bottom: 3rem !important;}
    .ml-1 {margin-left: 0.25rem !important;} .ml-2 {margin-left: 0.5rem !important;} .ml-3 {margin-left: 1rem !important;} .ml-4 {margin-left: 1.5rem !important;} .ml-5 {margin-left: 3rem !important;}
    .pl-1 {padding-left: 0.25rem !important;} .pl-2 {padding-left: 0.5rem !important;} .pl-3 {padding-left: 1rem !important;} .pl-4 {padding-left: 1.5rem !important;} .pl-5 {padding-left: 3rem !important;}
    .py-2 {padding-top: 0.5rem !important;padding-bottom: 0.5rem !important;}
    .px-2 {padding-left: 0.5rem !important;padding-right: 0.5rem !important;}
    .p-2 {padding-top: 0.5rem !important;padding-bottom: 0.5rem !important;padding-left: 0.8rem !important;padding-right: 0.8rem !important;}
    .text-center {text-align:center !important}
    .text-left {text-align:left !important}
    .text-right {text-align:right !important}
    .underline {text-decoration: underline}
    .no-wrap {white-space: nowrap}
    table {border-collapse: collapse;}
    .tables { display: table; width: 100%;}
    .tables thead tr th, .tables tbody tr td, .tables tfoot tr th { padding: 4px 8px}
    .fs-14, td, th {font-size:14px;}
    .table-bordered {border: 1px solid #2b2b2b;}
    .table-bordered th,.table-bordered td {border: 1px solid #2b2b2b;}
    .w-50 {width:50%;}
    .none {color:#fff}
    .bg {background: #007bff}
    .absolute {position: absolute;}
</style>

<body>
  <div class="container-fluid">
    <table style="width: 100%; border:none !important;margin-bottom:2rem" >
        <tr>
            <th width="70%" style="padding-top:60px;text-align:left">
                <img src="{{ public_path('/images/iconpack/invoice/gistex-red.svg') }}">
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
            <td width="20%" style="font-size:14px">
                <span >Jl. Hegarmanah No.5 RT 002 RW 003 Hegarmanah, Cidadap, Bandung 40141</span><br/>
                <div class="none">x</div>
                <span >Jl. Panyawungan KM.19<br/>Cileunyi Wetan, Cileunyi<br/>Kab. Bandung, Jawabarat 40393<br/>Telp : (62-002) - 7796683, 7796684, 7798885<br/>Fax : (62-002) - 7796686</span>
            </td>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th class="p-2">
                <span style="font-size:24px">COMMERCIAL INVOICE</span> 
            </th>
        </tr>
    </table>
    {{-- AGRON --}}
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Beneficiary :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>  
                <div class="fw-400">TEL : +62 22 4241308, FAX : +62 22 4239650</div>  
            </th>
            <th width="50%" class="text-left p-2">
                <div class="absolute">
                    <span style="font-style:italic">COMMERCIAL INVOICE : </span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                    <span style="font-style:italic">DATE : </span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">For account and risk :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->country_for }}</div>  
            </th>
            <th width="25%" class="text-left p-2">
                <div class="absolute">
                    <div style="font-style:italic">Consignee / Ship to :</div>
                    <div class="fw-400">{{ $invoiceHeader->consigne }}</div>  
                    <div class="fw-400">{{ $invoiceHeader->addres_cons }}</div>  
                    <div class="fw-400">{{ $invoiceHeader->shipto }}</div>  
                </div>
            </th>
            <th width="25%" class="text-left p-2">
                <div class="absolute">
                    <div style="font-style:italic">Container No :</div>
                    <div class="fw-400"> {{ $invoiceHeader->container_no }} </div>  
                    <div class="fw-400"> {{ $invoiceHeader->container_no2 }}'HC</div>   
                </div>
            </th>
            <th width="25%" class="text-left p-2">
                <div class="absolute">
                    <div style="font-style:italic">Seal No :</div>
                    <div class="fw-400">{{ $invoiceHeader->seal_no }}</div>  
                    <div class="fw-400">{{ $invoiceHeader->seal_no2 }}</div>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Vessel name & Voyage :</div>
                <div class="fw-400">{{ $invoiceHeader->visel_name }}</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Ship on Board :</div>
                <div class="fw-400">{{ $invoiceHeader->shipOnBoard }}</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Port Of Loading :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Port Of Destination :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfDestination }}</div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="py-2">
                FOB JAKARTA, INDONESIA
            </th>
            <th width="50%" class="py-2">
                PAYMENT : <span class="fw-400">{{ $invoiceHeader->payment }}</span>
            </th>
        </tr>
    </table>
    {{-- END AGRON --}}
    <table class="tables table-bordered">
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
          <th colspan="6">INVOICE TOTAL</th>
          <th colspan="2">1523400 PACK</th>
          <th></th>
          <th class="text-left">$ 960500</th>
        </tr>
      </tfoot>
    </table>
    <table class="tables table-bordered" style="margin-top:-1px">
        <tr>
            <th class="p-2">
                nine hundred sixty nine thousand eight hundred sixty nine dollar
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-top:-1px">
        <tr>
            <th width="50%" class="p-2 text-left">
                <div class="absolute">
                    <div class="mt-1">Manufacture Name & Address :</div>
                    <div class="fw-400">PT. GISTEX GARMEN INDONESIA</div>
                    <div class="fw-400">JL. PANYAWUNGAN KM. 19, CILEUNYI BANDUNG INDONESIA</div>
                    <div class="fw-400">TEL : 6222-7796683</div>
                    <div class="fw-400">MID CODE : IDGIS19BAN</div>
                </div>
            </th>
            <th width="50%" class="p-2 text-right">
                <div class="title mt-1">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
                <img src="{{ public_path('/images/iconpack/invoice/ttd.png') }}" class="mt-2" style="margin-right:70px">
            </th>
        </tr>
    </table>
  </div>
</body>
</html>