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