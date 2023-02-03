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
                <span style="font-style:italic">INVOICE NO</span><span class="mx-3" style="margin-left:26px">: </span><span class="fw-400">{{ $invoiceHeader->invoice_deliv }}</span><br/> 
                <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">: </span><span class="fw-400">{{date("d-M-y",strtotime($invoiceHeader->date))}}</span>  
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
            <div class="fw-400">ATTN : Mr. Takehara</div>
        </th>
        <th width="50%" class="text-left p-2">
        @if ($invoiceHeader->payment == 'T/T Payment')
        <th width="50%" class="text-left p-2">
            <span style="font-style:italic">Payment</span><span class="mx-3" style="margin-left:66px">: </span><span>{{ $invoiceHeader->payment }}</span><br/> 
        </th>
            @else
            <div class="absolute"> 
                <span style="font-style:italic">LC NO</span><span class="mx-3" style="margin-left:65px">: </span><span class="fw-400">{{ $invoiceHeader->lc_deliv }}</span><br/> 
                <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px">: </span><span class="fw-400">{{date("d-M-y",strtotime($invoiceHeader->date_delive))}}</span><br/> 
                <span style="font-style:italic">ISSUED BY</span><span class="mx-3" style="margin-left:33px">: </span><span class="fw-400">{{ $invoiceHeader->issued_by }}</span>  
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
            <div class="fw-400">TELP : +81 6 6233 2678</div>  
            <div class="fw-400">ATTN : Mr. Takehara</div> 
        </th>
        <th width="50%" class="text-left p-2">
            <div class="absolute">
                <div style="font-style:italic">Remarks :</div>
                <div class="fw-400">{{  $invoiceHeader->remarks }}</div>  
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
            <div class="fw-400">{{  $invoiceHeader->partOfDestination }}</div>
        </th>
        <th width="25%" class="text-left p-2">
            <div style="font-style:italic">Carrier :</div>
            <div class="fw-400">{{  $invoiceHeader->carrier_deliv }}</div>
        </th>
        <th width="25%" class="text-left p-2">
            <div style="font-style:italic">Sailing on or about :</div>
            <div class="fw-400">{{date("F j, Y",strtotime($invoiceHeader->salling))}}</div>
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