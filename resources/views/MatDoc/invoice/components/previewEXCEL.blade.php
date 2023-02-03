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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @if ($data->buyer == 'AGRON, INC.' && $data->buyer='HEXAPOLE COMPANY LIMITED')
     <!-- HEADER AGRON -->
    <table style="width:1300px">
        <tr>
              <th colspan="10" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">COMMERCIAL INVOICE ass</th>
        </tr>
        <br>
        <tr>
          <th colspan="10" style="font-weight:bold;font-size:14px;text-align:center;width:200px;"></th>
        </tr>
          <tr>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">Beneficiary :</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
          </tr>
          <tr>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->company_bene }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">Invoice No : {{ $invoiceHeader->invoice_no }}</th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
          </tr>
          <tr>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->address_bene }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">DATE : {{ $invoiceHeader->date }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
          </tr>
          <tr>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->city_bene }} </th>
          </tr>
          <tr>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">TEL : +62 22 4241308, FAX : +62 22 4239650 </th>
          </tr>
          <br>
          <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">For account and risk  :</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">Consignee / Ship to :</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">Container No :</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">Seal  No :</th>
          </tr>
          <tr>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->buyer_for }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->consigne }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->container_no }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->seal_no }} </th>
          </tr>
          <tr>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->address_for }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->address_cons }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->container_no2 }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->seal_no2 }} </th>
          </tr>
          <tr>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->country_for }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->shipto }} </th>
          </tr>
          <br>
            <tr>
              <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">Vessell Name And Voyage :</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">Ship On Board :</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">Part Of Loading :</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">Part Of Destination :</th>
          </tr>
          <tr>
            <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->visel_name }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->shipOnBoard }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->partOfLoading }} </th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->partOfDestination }} </th>
          </tr>
          <tr>
            <th colspan="5" style="font-weight:bold;text-align:center;width:100px;"> {{ $invoiceHeader->delivery_terms }} </th>
            <th colspan="5" style="font-weight:bold;text-align:center;width:100px;"> PAYMENT : {{ $invoiceHeader->payment }}</th>
          </tr>
    </table>
    <!-- END HEADER AGRON -->
    @endif


    
    <!-- CONTENT START -->
    <table class="tables">
      <thead>
        <tr>
            <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO</th>
            {{-- agron,Hexapole,Matsuoka,Jiangsu,Toyota,Benlux,HAP,ExpressWorld,RitraCargo,Adrenaline --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PO NO</th>
            @endif
            {{-- agron, Hexapole,Teijin,Hongkong  --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">WORK NO</th>
            @endif
            {{-- marubeni, Hexapole, Marusa, JCP Penney --}}
            @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CONTRACT NUMBER</th>
            @endif
           @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'PENTEX LTD')
            <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">STYLE</th>
            @endif

            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">DOCKET NUMBER</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">DESTINATION NUMBER</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">KIMBALL NUMBER</th>
            @endif
            {{-- agron, marubeni, Hexapole, Matsuoka, Pantex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
            @if ($data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'JC PENNEY')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">ITEM</th>
            @endif
            {{-- Marubeni, Hexapole, Express World --}}
            @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'EXPRESS, LLC')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SIZE</th>
            @endif
            {{-- pentex,HAP, Express World, Asmara Adrenaline --}}
            @if ($data->buyer == 'PENTEX LTD' ||$data->buyer == 'HAP., CO LTD'|| $data->buyer == 'ASMARA INTERNATIONAL LIMITED' || $data->buyer == 'EXPRESS, LLC')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">COLOUR</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">SUB</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">L&P</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CARTON QTY </th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO OF UNITS</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NO OF SET</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CM</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">FABRIC</th>
            @endif
            @if ($data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">TRIMS</th>
            @endif
            {{-- agron, marubeni,Hexapole, Teijin, Hong kong, Matsuoka, Pentex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:300px;background-color:#C0C0C0;">DESCRIPTION OF GOODS</th>
            @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Pantex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">HS CODE</th>
            @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">QUANTITY</th>
            @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT</th>
            @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">UNIT PRICE ($)</th>
            @endif
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
              <th style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">AMOUNT ($)</th>
            @endif                                    
        </tr>
      </thead>
      <tbody>
        @foreach ($data2 as $key =>$value)
          <tr> 
                  <td style="text-align:center;">{{ $loop->iteration }}</td>
                  {{-- agron, Hexapole,Teijin,Hongkong  --}}
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
              <td style="text-align:center;">{{ $value['wo'] }}</td>
              @endif

              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
              <td style="text-align:center;">{{ $value['po'] }}</td>
              @endif
            
              @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
              <td style="text-align:center;">{{ $value['contract'] }}</td>
              @endif
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'PENTEX LTD')
              <td style="text-align:center;">{{ $value['style'] }}</td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;">{{ $value['docket_no'] }}</td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;">{{ $value['destination_no'] }} </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;">{{ $value['kimball_no'] }}</td>
              @endif
              

              @if ($data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'JC PENNEY')
              <td style="text-align:center;">ITEM</td>
              @endif
            {{-- Marubeni, Hexapole, Express World --}}
              @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'EXPRESS, LLC')
              <td style="text-align:center;">{{ $value['size'] }}</td>
              @endif
            {{-- pentex,HAP, Express World, Asmara Adrenaline --}}
              @if ($data->buyer == 'PENTEX LTD' ||$data->buyer == 'HAP., CO LTD'|| $data->buyer == 'ASMARA INTERNATIONAL LIMITED' || $data->buyer == 'EXPRESS, LLC')
              <td style="text-align:center;">{{ $value['color'] }}
                  {{-- <input type="text" class="form-control border-input" id="colour" name="colour[]" value="{{ $value['colour'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly> --}}
              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;" class="text-left">{{ $value['lp'] }}</td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;">{{ $value['kimball_no'] }}
                  
              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;">13 
                  
              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
                <td style="text-align:center;">{{ $value['no_of_unit'] }}</td>

              @endif
              @if ($data->buyer == 'PENTEX LTD')
               <td style="text-align:center;">{{ $value['no_of_set'] }}</td>

              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;"> 820
                  
              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;">              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td style="text-align:center;"> $ 0.065 </td>
              @endif
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                <td style="text-align:center;" class="text-left">{{ $value['descOfGood'] }}</td>
              @endif
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')

                <td style="text-align:center;">{{ $value['hsCode'] }}</td>

              @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                <td style="text-align:center;">{{  number_format($value['qty'], 0, ",", ".")  }}</td>
              @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                  <td style="text-align:center;">{{ $value['unit'] }}</td>
                              
              @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                  <td style="text-align:center;" class="text-left">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
              @endif

              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                    <td style="text-align:center;" class="text-left">$  {{number_format( $value['amount'], 2, ",", ".") }}</td>
              @endif
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- FOOTER AGRON -->
    <table>
        <tr>
            @if ($data->buyer == 'AGRON, INC.' || $data->buyer='HEXAPOLE COMPANY LIMITED')
            <th style="text-align:center;" colspan="6">INVOICE TOTAL</th>
            @elseif ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
            <th style="text-align:center;" colspan="5">INVOICE TOTAL</th>
            @elseif ($data->buyer == 'HEXAPOLE COMPANY LIMITED')
            <th style="text-align:center;" colspan="8">INVOICE TOTAL</th>
            @elseif ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
            <th style="text-align:center;" colspan="4">INVOICE TOTAL</th>
            @elseif ($data->buyer == 'PENTEX LTD')
            <th style="text-align:center;" colspan="16">INVOICE TOTAL</th>
            @else
            <th style="text-align:center;" colspan="6">INVOICE TOTAL</th>
            @endif
                <th colspan="2" style="text-align:center;">{{ number_format($dataInvoiceHeader->totalPack, 0, ",", ".") }} {{ $dataInvoiceHeader->unit }}</th>
                <th colspan="2"  style="text-align:right;">$ {{ number_format($dataInvoiceHeader->totalInvoice, 2, ",", ".") }}</th>
        </tr>
        <tr>
            <th colspan="9" class="p-2" style="text-align:left;font-style:italic">
                {{ $dataInvoiceHeader->terbilang }}
            </th>
        </tr>
        <tr>
          <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">Manufacture Name And Address :</th>
          <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
          <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">ON BEHALF OF PT GISTEX GARMEN INDONESIA</th>
        </tr>
        <tr>
          <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->manufacture_name }}</th>
        </tr>
        <tr>
          <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->address_manu }}</th>
        </tr>
        <tr>
          <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">{{ $invoiceHeader->country_manu }}</th>
        </tr>
        <tr>
          <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">TEL :{{ $invoiceHeader->telp_manu }}</th>
        </tr>
        <tr>
          <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">MID CODE :{{ $invoiceHeader->mid_manu }}</th>
        </tr>
    </table>
    <!-- END FOOTER AGRON -->
  
</body>
</html>