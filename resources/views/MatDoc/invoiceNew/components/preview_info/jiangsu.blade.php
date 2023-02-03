<!-- {{-- JIANGSU --}} -->
@if ($data->buyer == 'JIANGSU TEXTILE INDUSTRY')
<div class="headerTable">
    <div class="containerHeader">
        <div class="all">
            <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half2">
            <div class="padding">
                <div class="title">Beneficiary :</div>
                <div class="desc">{{ $invoiceHeader->company_bene }}</div>  
                <div class="desc">{{ $invoiceHeader->address_bene }}</div>  
                <div class="desc">{{ $invoiceHeader->city_bene }}</div>
                <div class="desc">TEL : +62 22 4241308</div> 
            </div>
            <div class="borderTbl"></div> 
            <div class="flex">
                <div class="padding2" style="border-right:1px solid #777">
                    <div class="title">For Account and Risk :</div>
                    <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
                    <div class="desc">{{ $invoiceHeader->address_for }}</div>  
                    <div class="desc">{{ $invoiceHeader->country_for }}</div>  
                </div>
                <div class="padding2">
                    <div class="title">Consignee/Ship To :</div>
                    <div class="desc">{{ $invoiceHeader->consigne }} </div>  
                    <div class="desc">{{ $invoiceHeader->address_cons }} </div>  
                    <div class="desc">{{ $invoiceHeader->shipto }} </div>  
                    <div class="desc">{{ $invoiceHeader->country_cons }} </div>  
                </div>
            </div>
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Invoice No</div><div class="mx-3">:</div>{{ $invoiceHeader->invoice_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
            </div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half2">
            <div class="flex">
                <div class="padding2" style="border-right:1px solid #777">
                    <div class="title">Vessel name & Voyage :</div>
                    <div class="desc">{{ $invoiceHeader->visel_name }}</div>
                </div>
                <div class="padding2">
                    <div class="title">Shipt on Board :</div>
                    <div class="desc">{{ $invoiceHeader->shipOnBoard }}</div>
                </div>
            </div>
        </div>
        <div class="half">
            <div class="title">Port Of Loading :</div>
            <div class="desc">{{ $invoiceHeader->partOfLoading }}</div>   
        </div>
    </div>
    <div class="containerHeader">
        <div class="half text-center fw-5">FOB JAKARTA, INDONESIA </div>
        <div class="half text-center"><span class="fw-5">PAYMENT</span> : {{ $invoiceHeader->payment }}</div> 
    </div>
</div>
@endif