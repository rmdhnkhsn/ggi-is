<!DOCTYPE html>
<html lang="en">
    <head>
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
    </head>
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

            <!-- AGRON || HEXAPOLE  -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_agron')
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_hexapole')
            <!-- MARUBENI -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_marubeni')
            <!-- TEIJIN -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_teijin')
            <!-- HONGKONG -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_hongkong')
            <!-- Matsuoka  -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_matsuoka')
            <!-- Pentex  -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_pentex')
            <!-- Jiangsu  -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_jiangsu')
            <!-- Marusa  -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_marusa')
            <!-- Toyota  -->
            @include('MatDoc.invoiceNew.components.pdf.info.pdf_info_toyota')

            <!-- CONTENT START -->
            <table class="tables table-bordered">
                <thead>
                    <!-- {{-- AGRON || HEXAPOLE --}} -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_agron')
                    @include('MatDoc.invoiceNew.components.tabel.header.header_hexapole')
                    <!-- {{-- MARUBENI --}} -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_marubeni')
                    <!-- {{-- TAIJIN || HONGKONG --}} -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_hongkong')
                    @include('MatDoc.invoiceNew.components.tabel.header.header_taijin')
                    <!-- {{-- MATSUOKA --}} -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_matsuoka')
                    <!-- {{-- PENTEX --}} -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_pentex')
                    <!-- {{-- JIANGSU --}} -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_jiangsu')
                    <!-- {{-- MARUSA --}} -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_marusa')
                    <!-- {{-- TOYOTA --}} -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_toyota')
                    <!-- RITA CARGO & ADRENALINE LACROSE -->
                    @include('MatDoc.invoiceNew.components.tabel.header.header_rita_cargo')
                    @include('MatDoc.invoiceNew.components.tabel.header.header_adrenaline')
                </thead>
                <tbody>
                    @foreach ($data2 as $key =>$value)
                        <!-- {{-- AGRON || HEXAPOLE --}} -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_agron')
                        @include('MatDoc.invoiceNew.components.tabel.body.body_hexapole')
                        <!-- {{-- MARUBENI --}} -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_marubeni')
                        <!-- {{-- TAIJIN || HONGKONG --}} -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_hongkong')
                        @include('MatDoc.invoiceNew.components.tabel.body.body_taijin')
                        <!-- {{-- MATSUOKA --}} -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_matsuoka')
                        <!-- {{-- PENTEX --}} -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_pentex')
                        <!-- {{-- JIANGSU --}} -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_jiangsu')
                        <!-- {{-- MARUSA --}} -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_marusa')
                        <!-- {{-- TOYOTA --}} -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_toyota')
                        <!-- RITA CARGO & ADRENALINE LACROSE -->
                        @include('MatDoc.invoiceNew.components.tabel.body.body_rita_cargo')
                        @include('MatDoc.invoiceNew.components.tabel.body.body_adrenaline')
                    @endforeach
                </tbody>
                <tfoot>
                    <!-- tfooot -->
                    @include('MatDoc.invoiceNew.components.tabel.footer.tfoot')
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
            @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
            <table class="tables table-bordered" style="margin-top:-1px">
                <tr>
                    <th class="p-2">
                        MADE IN INDONESIA
                    </th>
                </tr>
            </table>
            @endif 
            @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
            <table class="tables table-bordered" style="margin-top:-1px">
                <tr>
                    <th class="p-2" style="font-style: italic">
                        COUNTRY OF ORIGIN : {{ $invoiceHeader->country_of_origin }}
                    </th>
                </tr>
            </table>
            @endif 
            
            @include('MatDoc.invoiceNew.components.pdf.footer.content_bottom')
            <!-- CONTENT BOTTOM WITH BANK -->
            @include('MatDoc.invoiceNew.components.pdf.footer.content_bottom_with_bank')
            <!-- CONTENT BOTTOM PENTEXXXX -->
            @include('MatDoc.invoiceNew.components.pdf.footer.content_bottom_pentex')
        </div>
    </body>
</html>