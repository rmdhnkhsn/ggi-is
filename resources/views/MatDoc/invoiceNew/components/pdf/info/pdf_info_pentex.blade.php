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
<!-- End Pentex  -->