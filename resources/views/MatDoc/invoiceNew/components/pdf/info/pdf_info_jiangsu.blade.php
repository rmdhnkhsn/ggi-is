 <!-- Jiangsu  -->
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
<!-- End Jiangsu  -->