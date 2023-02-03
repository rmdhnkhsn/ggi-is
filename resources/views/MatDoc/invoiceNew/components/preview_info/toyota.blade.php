<!-- {{-- TOYOTA --}} -->
@if ($data->buyer == 'TOYOTA TSUSHO CORPORATION')
<div class="headerTable">
    <div class="containerHeader">
        <div class="all">
            <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Exporter :</div>
            <div class="desc">{{ $invoiceHeader->company_bene }}</div>  
            <div class="desc">{{ $invoiceHeader->address_bene }}</div>  
            <div class="desc">{{ $invoiceHeader->city_bene }}</div>
            <div class="desc">TEL : +62 22 4241308</div>  
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Invoice No</div><div class="mx-3">:</div>{{ $invoiceHeader->invoice_no }}
            </div>
            <div class="desc flex">
                <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
            </div>
            <div class="desc flex">
                <div class="title" style="width:100px">Container No</div><div class="mx-3">:</div>-
            </div>
            <div class="desc flex">
                <div class="title" style="width:100px">Seal No</div><div class="mx-3">:</div>-
            </div>
            <div class="desc flex">
                <div class="title" style="width:100px">Carton</div><div class="mx-3">:</div>-
            </div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">For account and risk :</div>
            <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
            <div class="desc">{{ $invoiceHeader->address_for }}</div>  
            <div class="desc">{{ $invoiceHeader->country_for }}</div>  
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Payment</div><div class="mx-3">:</div>{{ $invoiceHeader->payment }}
            </div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half2">
            <div class="padding">
                <div class="title">Notify Party :</div>
                <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
                <div class="desc">{{ $invoiceHeader->address_for }}</div>  
                <div class="desc">{{ $invoiceHeader->country_for }}</div>  
            </div>
            <div class="borderTbl"></div> 
            <div class="flex">
                <div class="padding2" style="border-right:1px solid #777">
                    <div class="title">Port Of Loading :</div>
                    <div class="desc">{{  $invoiceHeader->partOfLoading }}</div>
                </div>
                <div class="padding2">
                    <div class="title">Final Destination :</div>
                    <div class="desc">{{  $invoiceHeader->partOfDestination }}</div>
                </div>
            </div>
            <div class="borderTbl"></div> 
            <div class="flex">
                <div class="padding2" style="border-right:1px solid #777">
                    <div class="title">Carrier :</div>
                    <div class="desc">{{  $invoiceHeader->carrier_deliv }}</div>
                </div>
                <div class="padding2">
                    <div class="title">Sailing on or About :</div>
                    <div class="desc">Jun 6, 2022</div>
                </div>
            </div>
        </div>
        <div class="half">
            <div class="title">Remarks :</div>
            <div class="desc">{{  $invoiceHeader->remarks }}</div>  
        </div>
    </div>
    <div class="containerHeader">
        <div class="all text-center fw-5">FOB JAKARTA, INDONESIA</div>
    </div>
</div>
@endif