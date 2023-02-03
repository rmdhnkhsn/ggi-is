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