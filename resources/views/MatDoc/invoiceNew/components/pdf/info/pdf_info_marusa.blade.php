   <!-- Marusa  -->
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
    <!-- End Marusa  -->