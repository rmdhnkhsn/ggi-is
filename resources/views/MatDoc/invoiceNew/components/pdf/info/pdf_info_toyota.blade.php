 <!-- Toyota  -->
 @if ($data->buyer == 'TOYOTA TSUSHO CORPORATION')
<table class="tables table-bordered" style="margin-bottom:-1px">
    <tr>
        <th width="50%" class="text-left p-2">
            <div style="font-style:italic">Exporter :</div>
            <div class="fw-400">{{ $invoiceHeader->company_bene }}</div>  
            <div class="fw-400">{{ $invoiceHeader->address_bene }}</div>  
            <div class="fw-400">{{ $invoiceHeader->city_bene }}</div>
            <div class="fw-400">TEL : +62 22 4241308</div>  
        </th>
        <th width="50%" class="text-left p-2">
            <div class="mb-1">
                <span style="font-style:italic">Invoice No</span><span style="margin-left:35px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_deliv }}</span>  
            </div>
            <div class="mb-1">
                <span style="font-style:italic">Date</span><span style="margin-left:75px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
            </div>
            <div class="mb-1">
                <span style="font-style:italic">Container No</span><span style="margin-left:18px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->invoice_deliv }}</span>  
            </div>
            <div class="mb-1">
                <span style="font-style:italic">Seal No</span><span style="margin-left:54px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
            </div>
            <div class="mb-1">
                <span style="font-style:italic">Carton</span><span style="margin-left:60px;margin-right:10px">:</span><span class="fw-400">{{ $invoiceHeader->date }}</span>  
            </div>
        </th>
    </tr>
    <tr>
        <th width="50%" class="text-left p-2">
            <div style="font-style:italic">For Account And Risk :</div>
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
        <th width="50%" class="text-left p-2" rowspan="3">
            <div style="font-style:italic">Remarks :</div>
            <div class="fw-400">{{ $invoiceHeader->remarks }}</div>
        </th>
    </tr>
    <tr>
        <th>
            <table class="tables tbl-bordered-right">
                <tr>
                    <th width="50%" class="text-left p-2">
                        <div style="font-style:italic">Port of Loading  :</div>
                        <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
                    </th>
                    <th width="50%" class="text-left p-2">
                        <div style="font-style:italic">Final Destination  :</div>
                        <div class="fw-400">{{ $invoiceHeader->partOfDestinaion }} </div>
                    </th>
                </tr>
            </table>
        </th>
    </tr>
    <tr>
        <th>
            <table class="tables tbl-bordered-right">
                <tr>
                    <th width="50%" class="text-left p-2">
                        <div style="font-style:italic">Carrier  :</div>
                        <div class="fw-400">{{ $invoiceHeader->partOfLoading }}</div>
                    </th>
                    <th width="50%" class="text-left p-2">
                        <div style="font-style:italic">Sailing on or About  :</div>
                        <div class="fw-400">{{ $invoiceHeader->partOfDestinaion }} </div>
                    </th>
                </tr>
            </table>
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
<!-- End Toyota  -->