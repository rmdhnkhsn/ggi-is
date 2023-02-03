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
        <th width="50%" class="text-left p-2">
            <div style="font-style:italic">Port Of Loading :</div>
            <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
        </th>
        <th width="50%" class="text-left p-2">
            <div style="font-style:italic">Port Of Destination :</div>
            <div class="fw-400">{{ $invoiceHeader->partOfDestination }}</div>
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