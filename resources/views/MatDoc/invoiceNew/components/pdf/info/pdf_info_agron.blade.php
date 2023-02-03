@if ($data->buyer == 'AGRON, INC.')
<!-- AGRON || HEXAPOLE  -->
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
                <span style="font-style:italic">Invoice No : </span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                <span style="font-style:italic">Date : </span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
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
            <div class="fw-400">{{ $invoiceHeader->address_cons }}</div>  
            <div class="fw-400">{{ $invoiceHeader->country_cons }}</div>  
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
<!-- END AGRON -->
@endif