 <!-- Matsuoka  -->
 @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
<table class="tables table-bordered" style="margin-bottom:-1px">
    <tr>
        <th width="50%" class="text-left p-2">
            <div style="font-style:italic">Beneficiary :</div>
            <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
            <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
            <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>  
            <div class="fw-400">{{ $invoiceHeader->country_bene }}</div>  
            <div class="fw-400">{{ $invoiceHeader->telp_bene }}</div>  
        </th>
        <th width="50%" class="text-left p-2">
            <div class="absolute"> 
                <span style="font-style:italic">INVOICE NO</span><span class="mx-3" style="margin-left:26px;color:white;">:</span><span class="fw-400">{{ $invoiceHeader->invoice_no }}</span><br/> 
                <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px;color:white;">:</span><span class="fw-400">{{ date("M d, Y", strtotime($invoiceHeader->date)) }}</span>  
            </div>
        </th>
    </tr>
</table>
<table class="tables table-bordered" style="margin-bottom:-1px">
    <tr>
        <th width="50%" class="text-left p-2">
            <div style="font-style:italic">Consignee :</div>
            <div class="fw-400">{{ $invoiceHeader->consigne }} </div>  
            <div class="fw-400">{{ $invoiceHeader->address_cons }} </div>  
            <div class="fw-400">{{ $invoiceHeader->shipto }} </div>  
            <div class="fw-400">{{ $invoiceHeader->country_cons }} </div>  
            <div class="fw-400">{{ $invoiceHeader->telp }} </div>
        </th>
        <th width="50%" class="text-left p-2">
            <div class="absolute"> 
                <span style="font-style:italic">Container No</span><span class="mx-3" style="margin-left:21px;color:white;">:</span><span class="fw-400">{{ $invoiceHeader->container_no }}</span><br/> 
                <span style="font-style:italic">Seal No</span><span class="mx-3" style="margin-left:57px;color:white;">:</span><span class="fw-400">{{ $invoiceHeader->seal_no }}</span><br/> 
            </div>
        </th>
    </tr>
</table>
<table class="tables table-bordered" style="margin-bottom:-1px">
    <tr>
        <th width="50%" class="text-left p-2">
            <div style="font-style:italic">Shipt On Board :</div>
            <div class="fw-400">{{ date("M d, Y", strtotime($invoiceHeader->shipOnBoard)) }}</div>  
        </th>
        <th width="50%" class="text-left p-2">
            <div style="font-style:italic">Vessel No :</div>
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
            <div style="font-style:italic">Part Of Destination :</div>
            <div class="fw-400">{{ $invoiceHeader->partOfDestination }}</div>  
        </th>
    </tr>
</table>
<table class="tables table-bordered" style="margin-bottom:-1px">
    <tr>
        <th width="50%" class="p-2">
        {{  $invoiceHeader->delivery_terms }}
        </th>
        @if ( $invoiceHeader->payment == 'By LC')
        <th width="50%" class="text-left p-2">
            <span style="font-style:italic">LC No</span><span class="mx-3" style="margin-left:67px;color:white;">:</span><span class="fw-400"> {{ $invoiceHeader->lc_no }}</span><br/>
            <span style="font-style:italic">DATE</span><span class="mx-3" style="margin-left:70px;color:white;">:</span><span class="fw-400"> {{ date("M d, Y", strtotime($invoiceHeader->lc_date)) }}</span>  
        </th>
        @else
        <th width="50%" class="p-2">
        <span style="font-style:italic;align:center;">PAYMENT :</span><span class="mx-3" style="margin-left:15px;color:white;">:</span>{{  $invoiceHeader->payment }}
        </th>
        @endif
    </tr>
</table>
@endif
<!-- End Matsuoka  -->