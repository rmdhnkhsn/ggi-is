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
    .tbl-bordered-right th,.tbl-bordered-right td {
        border-top: 1px solid transparent;
        border-right: 1px solid #2b2b2b;
        border-bottom: 1px solid transparent;
        border-left: 1px solid transparent;
    }
    .w-50 {width:50%;}
    .none {color:#fff}
    .bg {background: #007bff}
    .absolute {position: absolute;}
</style>

<body>
  <div class="container-fluid">
    <!-- HEADING -->
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
    <!-- END HEADING -->
    @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED' )
    {{-- AGRON || HEXAPOLE --}}
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
                <div style="font-style:italic">Consignee / Ship to :</div>
                <div class="fw-400">{{ $invoiceHeader->consigne }}</div>  
                <div class="fw-400">{{ $invoiceHeader->addres_cons }}</div>  
                <div class="fw-400">{{ $invoiceHeader->shipto }}</div>  
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
                <div style="font-style:italic">Part Of Destination :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfDestination }}</div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="py-2">
                {{ $invoiceHeader->delivery_terms }}
            </th>
            <th width="50%" class="py-2">
                PAYMENT : <span class="fw-400">{{ $invoiceHeader->payment }}</span>
            </th>
        </tr>
    </table>
    {{-- END AGRON --}}
    @endif

    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
    <!-- MARUBENI -->
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Beneficiary :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>  
                {{-- <div class="fw-400">{{ $invoiceHeader->telp }}</div>   --}}
                <div class="fw-400">TEL : +62 22 4241308, FAX : +62 22 4239650</div>  
            </th>
            <th width="50%" class="text-left p-2">
                <div class="absolute"> 
                    <span style="font-style:italic">INVOICE NO</span><span class="mx-3" style="margin-left:26px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                    <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Consignee :</div>
                <div class="fw-400">{{ $invoiceHeader->consigne }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_cons }}</div>  
                <div class="fw-400">{{ $invoiceHeader->country_cons }}</div>
            </th>
            @if ($invoiceHeader->payment == 'T/T Payment')
            <th width="50%" class="text-left p-2">
                <span style="font-style:italic">Payment</span><span class="mx-3" style="margin-left:66px">:</span><span>{{ $invoiceHeader->payment }}</span><br/> 
            </th>
            @else
                <th width="50%" class="text-left p-2">
                    <span style="font-style:italic">LC No</span><span class="mx-3" style="margin-left:66px">:</span><span>{{ $invoiceHeader->lc_no }}</span><br/>  
                    <span style="font-style:italic">DD</span><span class="mx-3" style="margin-left:87px">:</span><span class="fw-400">{{ $invoiceHeader->date_lc }}</span><br/>   
                    <span style="font-style:italic">Issued By</span><span class="mx-3" style="margin-left:41px">:</span><span class="fw-400">{{ $invoiceHeader->issued_by }}</span><br/>   
                    <span style="font-style:italic">Country</span><span class="mx-3" style="margin-left:54px">:</span><span class="fw-400">{{ $invoiceHeader->date_lc }}</span>  
                </th>
            @endif
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Notify Party :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->address_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->country_notif }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div class="absolute">
                    <span style="font-style:italic">Ref No</span><span class="mx-3" style="margin-left:62px">:</span><span class="fw-400">{{ $invoiceHeader->ref_no }}</span><br/>  
                    <span style="font-style:italic">Contract No</span><span class="mx-3" style="margin-left:27px">:</span><span class="fw-400">{{ $invoiceHeader->contract_no }}</span>
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Shipt On Board :</div>
                <div class="fw-400">{{ $invoiceHeader->shipOnBoard }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Vessel Name And Voyage :</div>
                <div class="fw-400">{{ $invoiceHeader->visel_name }}</div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th class="py-2">
                {{ $invoiceHeader->delivery_terms }}
            </th>
        </tr>
    </table> 
    <!-- END MARUBENI -->
    @endif

    @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
    <!-- TEIJIN -->
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
                    <span style="font-style:italic">INVOICE NO</span><span class="mx-3" style="margin-left:26px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                    <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">For account and risk :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_for }} </div>  
                <div class="fw-400">{{ $invoiceHeader->address_for }} </div>  
                <div class="fw-400">{{ $invoiceHeader->country_for }} </div>  
                <div class="fw-400">{{ $invoiceHeader->telp_for }} </div>  
                {{-- <div class="fw-400">NAKANOSHIMA FESTIVAL TOWER WEST 30F</div>  
                <div class="fw-400">3-2-4,NAKANOSHIMA,KITA-KU</div>  
                <div class="fw-400">OSAKA - 530-8605 - JAPAN</div>  
                <div class="fw-400">TELP : +81 6 6233 2678</div>  
                <div class="fw-400">ATTN : Mr. Takehara</div>   --}}
            </th>
            <th width="50%" class="text-left p-2">
               @if ($invoiceHeader->payment == 'T/T Payment')
            <th width="50%" class="text-left p-2">
                <span style="font-style:italic">Payment</span><span class="mx-3" style="margin-left:66px">:</span><span>{{ $invoiceHeader->payment }}</span><br/> 
            </th>
                @else
                <div class="absolute"> 
                    <span style="font-style:italic">LC NO</span><span class="mx-3" style="margin-left:65px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                    <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span><br/> 
                    <span style="font-style:italic">ISSUED BY</span><span class="mx-3" style="margin-left:33px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
                @endif
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Notify Party :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->address_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->country_notif }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div class="absolute">
                    <div style="font-style:italic">Remarks :</div>
                    <div class="fw-400">- </div>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Part Of Loading :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Final Destination:</div>
                <div class="fw-400">KANSAI (OSAKA)</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Carrier :</div>
                <div class="fw-400">JL 720</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Sailing on or about :</div>
                <div class="fw-400">Aug 9, 2022</div>
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
    <!-- END TEIJIN -->
    @endif
    @if ($data->buyer == 'HONG KONG DESCENTE TRADING LTD.')
    <!-- HONGKONG -->
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Exporter :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>  
                <div class="fw-400">TEL : +62 22 4241308, FAX : +62 22 4239650</div>  
            </th>
            <th width="50%" class="text-left p-2">
                <div class="absolute"> 
                    <span style="font-style:italic">INVOICE NO</span><span class="mx-3" style="margin-left:26px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                    <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">For account and risk :</div>
                <div class="fw-400">TEIJIN FRONTIER CO.,LTD. </div>  
                <div class="fw-400">NAKANOSHIMA FESTIVAL TOWER WEST 30F</div>  
                <div class="fw-400">3-2-4,NAKANOSHIMA,KITA-KU</div>  
                <div class="fw-400">OSAKA - 530-8605 - JAPAN</div>  
                <div class="fw-400">TELP : +81 6 6233 2678</div>  
                <div class="fw-400">ATTN : Mr. Takehara</div>  
            </th>
            <th width="50%" class="text-left p-2">
                <div class="absolute"> 
                    <span style="font-style:italic">LC NO</span><span class="mx-3" style="margin-left:65px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                    <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span><br/> 
                    <span style="font-style:italic">ISSUED BY</span><span class="mx-3" style="margin-left:33px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Notify Party :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->address_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->country_notif }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div class="absolute">
                    <div style="font-style:italic">Remarks :</div>
                    <div class="fw-400">- </div>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Part Of Loading :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Final Destination:</div>
                <div class="fw-400">KANSAI (OSAKA)</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Carrier :</div>
                <div class="fw-400">JL 720</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Sailing on or about :</div>
                <div class="fw-400">Aug 9, 2022</div>
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
    <!-- END HONGKONG -->
    @endif
    @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
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
                    <span style="font-style:italic">INVOICE NO</span><span class="mx-3" style="margin-left:26px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                    <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Consignee :</div>
                <div class="fw-400">MATSUOKA TRADING CO., LTD.</div>  
                <div class="fw-400">1-3-24, MIKADO-CHO, FUKUYAMA,</div>  
                <div class="fw-400">HIROSHIMA JAPAN 7200805</div>  
                <div class="fw-400">TEL: 084-922-6886, FAX: 084-922-6925</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div class="absolute"> 
                    <span style="font-style:italic">Container No</span><span class="mx-3" style="margin-left:21px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                    <span style="font-style:italic">Seal No</span><span class="mx-3" style="margin-left:57px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Shipt On Board :</div>
                <div class="fw-400">{{ $invoiceHeader->shipOnBoard }}</div>  
            </th>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Vessel No :</div>
                <div class="fw-400">OOCL ZHOUSHAN V.236 E</div>  
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Port Of Loading :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>  
            </th>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Part Of Destination :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfDestination }}</div>  
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="p-2">
                FOB JAKARTA, INDONESIA
            </th>
            <th width="50%" class="text-left p-2">
                <span style="font-style:italic">LC No</span><span class="mx-3" style="margin-left:67px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span><br/>
                <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
            </th>
        </tr>
    </table>
    @endif
    @if ($data->buyer == 'PENTEX LTD')
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Beneficiary :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>
            </th>
            <th width="50%" class="text-left p-2" rowspan="3">
                <div class="mb-1">
                    <span style="font-style:italic">Invoice No</span><span style="margin-left:64px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Date</span><span style="margin-left:104px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Contract No</span><span style="margin-left:54px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->contract_no }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Date</span><span style="margin-left:104px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date_contract }}</span>  
                </div>
                {{-- <div class="mb-1">
                    <span style="font-style:italic">Exp No</span><span style="margin-left:86px;margin-right:10px">:</span><span class="fw-400">-</span>  
                </div> --}}
                {{-- <div class="mb-1">
                    <span style="font-style:italic">Date</span><span style="margin-left:104px;margin-right:10px">:</span><span class="fw-400">-</span>  
                </div> --}}
                <div class="mb-1">
                    <span style="font-style:italic">BL BO</span><span style="margin-left:91px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->bl_no }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">BL Date</span><span style="margin-left:82px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date_bl }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Port Of Loading</span><span style="margin-left:29px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->partOfLoading }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Part Of Delivery</span><span style="margin-left:30px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->partOfDestination }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Final Destination</span><span style="margin-left:22px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->partOfDestination }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Negotiation Bank</span><span style="margin-left:20px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->nego_bank }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Remarks</span><span style="margin-left:76px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->remark_bank }}</span>  
                </div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">FOR ACCOUNT AND RISK  :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->country_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->telp_for }}</div> 
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Consignee  :</div>
                <div class="fw-400">{{ $invoiceHeader->consigne }} </div>  
                <div class="fw-400">{{ $invoiceHeader->address_cons }} </div>  
                <div class="fw-400">{{ $invoiceHeader->shipto }} </div>  
                <div class="fw-400">{{ $invoiceHeader->country_cons }} </div>  
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2" rowspan="2">
                <div style="font-style:italic">NOTIFY PARTY :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->address_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->country_notif }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Payment Terms :</div>
                <div class="fw-400">{{ $invoiceHeader->payment }}</div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Deliver Terms :</div>
                <div class="fw-400">FOB INDONESIA</div>
            </th>
        </tr>
    </table>
    @endif

    @if ($data->buyer == 'JIANGSU TEXTILE INDUSTRY')
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Beneficiary :</div>
               <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>
            </th>
            <th width="50%" class="text-left p-2" rowspan="3">
                <div class="absolute">
                    <div class="mb-1">
                        <span style="font-style:italic">Invoice No</span><span style="margin-left:64px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_deliv }}</span>  
                    </div>
                    <div class="mb-1">
                        <span style="font-style:italic">Date</span><span style="margin-left:104px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">For Account And Risk :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->country_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->telp_for }}</div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Consignee/Ship To  :</div>
                <div class="fw-400">{{ $invoiceHeader->consigne }} </div>  
                <div class="fw-400">{{ $invoiceHeader->address_cons }} </div>  
                <div class="fw-400">{{ $invoiceHeader->shipto }} </div>  
                <div class="fw-400">{{ $invoiceHeader->country_cons }} </div>  
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Vessel Name & Voyage :</div>
                <div class="fw-400">{{ $invoiceHeader->visel_name }}</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Shipt on Board :</div>
                <div class="fw-400">{{ $invoiceHeader->shipOnBoard }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Port of Loading :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
            </th>
        </tr>
    </table>
    @endif

    @if ($data->buyer == 'MARUSA Co.,Ltd.')
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Beneficiary :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div class="mb-1">
                    <span style="font-style:italic">Invoice No</span><span style="margin-left:35px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_deliv }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Date</span><span style="margin-left:75px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Consignee :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div class="mb-1">
                    <span style="font-style:italic">Payment</span><span style="margin-left:47px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->payment }}</span>  
                </div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Notify Party :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->address_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->country_notif }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <span style="font-style:italic">Ref No</span><span class="mx-3" style="margin-left:60px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->ref_no }}</span><br/>  
                <span style="font-style:italic">Contract No</span><span class="mx-3" style="margin-left:25px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->contract_no }}sasas</span>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Shipt on Board :</div>
                <div class="fw-400">{{ $invoiceHeader->shipOnBoard }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Part of Destination :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfDestination }}</div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Part of Loading :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Part of Destination :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfDestination }}</div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="100%" class="p-2">
                FOB JAKARTA, INDONESIA
            </th>
        </tr>
    </table>
    @endif

    @if ($data->buyer == 'TOYOTA TSUSHO CORPORATION')
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Exporter :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>
                <div class="fw-400">TEL : +62 22 4241308</div>  
            </th>
            <th width="50%" class="text-left p-2">
                <div class="mb-1">
                    <span style="font-style:italic">Invoice No</span><span style="margin-left:35px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_deliv }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Date</span><span style="margin-left:75px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Container No</span><span style="margin-left:18px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_deliv }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Seal No</span><span style="margin-left:54px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Carton</span><span style="margin-left:60px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">For Account And Risk :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div class="mb-1">
                    <span style="font-style:italic">Payment</span><span style="margin-left:47px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->payment }}</span>  
                </div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Notify Party :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->address_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->country_notif }}</div>
            </th>
            <th width="50%" class="text-left p-2" rowspan="3">
                <div style="font-style:italic">Remarks :</div>
                <div class="fw-400">{{ $invoiceHeader->remarks }}</div>
            </th>
        </tr>
        <tr>
            <th>
                <table class="tables tbl-bordered-right">
                    <tr>
                        <th width="50%" class="text-left p-2">
                            <div style="font-style:italic">Port of Loading  :</div>
                            <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
                        </th>
                        <th width="50%" class="text-left p-2">
                            <div style="font-style:italic">Final Destination  :</div>
                            <div class="fw-400">{{ $invoiceHeader->partOfDestinaion }} </div>
                        </th>
                    </tr>
                </table>
            </th>
        </tr>
        <tr>
            <th>
                <table class="tables tbl-bordered-right">
                    <tr>
                        <th width="50%" class="text-left p-2">
                            <div style="font-style:italic">Carrier  :</div>
                            <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
                        </th>
                        <th width="50%" class="text-left p-2">
                            <div style="font-style:italic">Sailing on or About  :</div>
                            <div class="fw-400">{{ $invoiceHeader->partOfDestinaion }} </div>
                        </th>
                    </tr>
                </table>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="100%" class="p-2">
                FOB JAKARTA, INDONESIA
            </th>
        </tr>
    </table>
    @endif
    {{-- BENLUXX --}}
    <!-- <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Exporter :</div>
                <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
                <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div class="mb-1">
                    <span style="font-style:italic">Invoice No</span><span style="margin-left:35px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_deliv }}</span>  
                </div>
                <div class="mb-1">
                    <span style="font-style:italic">Date</span><span style="margin-left:75px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
                </div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">For Account and Risk :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->country_for }}</div>  
                <div class="fw-400">{{ $invoiceHeader->telp_for }}</div> 
            </th>
            <th width="50%" class="text-left p-2">
                <div class="mb-1">
                    <span style="font-style:italic">Payment</span><span style="margin-left:47px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->payment }}</span>  
                </div>
            </th>
        </tr>
        <tr>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Notify Party :</div>
                <div class="fw-400">{{ $invoiceHeader->buyer_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->address_notif }}</div>
                <div class="fw-400">{{ $invoiceHeader->country_notif }}</div>
            </th>
            <th width="50%" class="text-left p-2">
                <div style="font-style:italic">Remarks :</div>
                <div class="fw-400">{{ $invoiceHeader->remarks }}</div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Port of Loading :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Final Destination  :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfDestinaion }} </div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Carrier  :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
            </th>
            <th width="25%" class="text-left p-2">
                <div style="font-style:italic">Sailing on or About  :</div>
                <div class="fw-400">{{ $invoiceHeader->partOfDestinaion }} </div>
            </th>
        </tr>
    </table>
    <table class="tables table-bordered" style="margin-bottom:-1px">
        <tr>
            <th width="100%" class="p-2">
                FOB JAKARTA, INDONESIA
            </th>
        </tr>
    </table> -->
    {{-- END BENLUXX --}}

    <!-- CONTENT START -->
    <table class="tables table-bordered">
      <thead>
        <tr class="bg-thead2">
              <th>NO</th>
            {{-- agron,Hexapole,Matsuoka,Jiangsu,Toyota,Benlux,HAP,ExpressWorld,RitraCargo,Adrenaline --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
              <th>PO NO</th>
            @endif
            {{-- agron, Hexapole,Teijin,Hongkong  --}}
            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
              <th>WORK NO</th>
            @endif
            {{-- marubeni, Hexapole, Marusa, JCP Penney --}}
            @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
              <th>CONTRACT NUMBER</th>
            @endif
           @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'PENTEX LTD')
                                            <th>STYLE</th>
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
                  {{-- agron, Hexapole,Teijin,Hongkong  --}}
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
              <td>{{ $value['wo'] }}</td>
              @endif

              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
              <td>{{ $value['po'] }}</td>
              @endif
            
              @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
              <td>{{ $value['contract'] }}</td>
              @endif
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'PENTEX LTD')
              <td>{{ $value['style'] }}</td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td>{{ $value['docket_no'] }}</td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td>{{ $value['destination_no'] }} </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td>{{ $value['kimball_no'] }}</td>
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
              <td>{{ $value['color'] }}
                  {{-- <input type="text" class="form-control border-input" id="colour" name="colour[]" value="{{ $value['colour'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly> --}}
              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td class="text-left">{{ $value['lp'] }}</td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td>{{ $value['kimball_no'] }}
                  
              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td>13 
                  
              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
                <td>{{ $value['no_of_unit'] }}</td>

              @endif
              @if ($data->buyer == 'PENTEX LTD')
               <td>{{ $value['no_of_set'] }}</td>

              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td> 820
                  
              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td>              </td>
              @endif
              @if ($data->buyer == 'PENTEX LTD')
              <td> $ 0.065 </td>
              @endif
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                <td class="text-left">{{ $value['descOfGood'] }}</td>
              @endif
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')

                <td>{{ $value['hsCode'] }}</td>

              @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                <td>{{  number_format($value['qty'], 0, ",", ".")  }}</td>
              @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                  <td>{{ $value['unit'] }}</td>
                              
              @endif
            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                  <td class="text-left">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
              @endif

              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                    <td class="text-left">$  {{number_format( $value['amount'], 2, ",", ".") }}</td>
              @endif
        </tr>
        @endforeach
      </tbody>
      <tfoot>
          @if ($data->buyer == 'AGRON, INC.')
          <th colspan="6">INVOICE TOTAL</th>
          @elseif ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
          <th colspan="5">INVOICE TOTAL</th>
          @elseif ($data->buyer == 'HEXAPOLE COMPANY LIMITED')
          <th colspan="8">INVOICE TOTAL</th>
          @elseif ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
          <th colspan="4">INVOICE TOTAL</th>
          @elseif ($data->buyer == 'PENTEX LTD')
          <th colspan="16">INVOICE TOTAL</th>
          @else
          <th colspan="6">INVOICE TOTAL</th>
          @endif
        <th colspan="2">{{ number_format($dataInvoiceHeader->totalPack, 0, ",", ".") }} {{ $dataInvoiceHeader->unit }}</th>
        <th></th>
        <th class="text-left px-2">$ {{ number_format($dataInvoiceHeader->totalInvoice, 2, ",", ".") }}</th>
      </tfoot>
    </table>
    <!-- DOLLAR SAY -->
    <table class="tables table-bordered" style="margin-top:-1px">
        <tr>
            <th class="p-2" style="font-style: italic">
               {{ $dataInvoiceHeader->terbilang }}
            </th>
        </tr>
    </table>

    @if ($data->buyer != 'MARUBENI CORPORATION JEPANG' && $data->buyer != 'MARUBENI FASHION LINK LTD.' && $data->buyer != 'PENTEX LTD')
    <!-- CONTENT BOTTOM -->
    <table class="tables table-bordered" style="margin-top:-1px">
        <tr>
            <th width="50%" class="p-2 text-left">
                <div class="absolute">
                    <div class="mt-1">Manufacture Name & Address :</div>
                    <div class="fw-400">{{ $invoiceHeader->manufacture_name }}</div>  
                    <div class="fw-400">{{ $invoiceHeader->address_manu }}</div>  
                    <div class="fw-400">{{ $invoiceHeader->country_manu }}</div>  
                    <div class="fw-400">TEL :{{ $invoiceHeader->telp_manu }}</div>  
                    <div class="fw-400">MID CODE :{{ $invoiceHeader->mid_manu }}</div>
                </div>
            </th>
            <th width="50%" class="p-2 text-right">
                <div class="title mt-1">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
                <img src="{{ public_path('/images/iconpack/invoice/ttd.png') }}" class="mt-2" style="margin-right:70px">
            </th>
        </tr>
    </table> 
    @endif
    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
    <!-- CONTENT BOTTOM WITH BANK -->
    <table class="tables table-bordered" style="margin-top:-1px">
        <tr>
            <th width="50%" class="p-2 text-left">
                <div class="title">Manufacture Name & Address :</div>
                <div class="fw-400">PT. GISTEX GARMEN INDONESIA</div>
                <div class="fw-400">JL. PANYAWUNGAN KM. 19, CILEUNYI BANDUNG INDONESIA</div>
                <div class="fw-400">TEL : 6222-7796683</div>
                <div class="fw-400">MID CODE : IDGIS19BAN</div> 

                <div class="title mt-3">Transfer Bank :</div>
                <div class="fw-400">CITIBANK N.A</div>
                <div class="fw-400">Jl. Asia Afrika No.135-137 Bandung Swift Code : CITIIDJXBDG </div>
                <div class="fw-400">Account USD : 0700247 503 In the name of : PT. Gistex Garmen Indonesia</div>
            </th>
            <th width="50%" class="p-2 text-right">
                <div class="absolute" style="right:18px">
                    <div class="title mt-1">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
                    <img src="{{ public_path('/images/iconpack/invoice/ttd.png') }}" class="mt-2" style="margin-right:70px">
                </div>
            </th>
        </tr>
    </table> 
    @endif
    @if ($data->buyer == 'PENTEX LTD')
    <!-- CONTENT BOTTOM PENTEXXXX -->
        <table class="tables table-bordered" style="margin-top:-1px">
            <tr>
                <th width="50%" class="p-2 text-left">
                    <div class="title mb-2">PAYMENT INSTRUCTION</div>
                    <span style="font-weight:400">BENEFICIARY NAME</span><span class="mx-3" style="margin-left:15px">:</span><span class="fw-400">{{ $invoiceHeader->bank_detail }}</span><br/> 
                    <span style="font-weight:400">BANK NAME</span><span class="mx-3" style="margin-left:70px">:</span><span class="fw-400">{{ $invoiceHeader->bene_name }}</span><br/> 
                    <span style="font-weight:400">BANK ADDRESS</span><span class="mx-3" style="margin-left:43px">:</span><span class="fw-400">{{ $invoiceHeader->bank_name }}</span><br/> 
                    <span style="font-weight:400">SWIFT CODE</span><span class="mx-3" style="margin-left:65px">:</span><span class="fw-400">{{ $invoiceHeader->bank_acc }}</span><br/> 
                    <span style="font-weight:400">ACCOUNT NUMBER</span><span class="mx-3" style="margin-left:19px">:</span><span class="fw-400">{{ $invoiceHeader->bank_swift }}</span><br/> 
                </th>
                <th width="50%" class="p-2 text-right">
                    <div class="absolute" style="right:18px">
                        <div class="title mt-1">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
                        <img src="{{ public_path('/images/iconpack/invoice/ttd.png') }}" class="mt-2" style="margin-right:70px">
                    </div>
                </th>
            </tr>
        </table>
    @endif
  </div>
</body>
</html>