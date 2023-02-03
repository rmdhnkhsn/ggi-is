@if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
<!-- {{-- MARUBENI --}} -->
<div class="headerTable">
    <div class="containerHeader">
        <div class="all">
            <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Beneficiary :</div>
            <div class="desc">{{ $invoiceHeader->company_bene }}</div>  
            <div class="desc">{{ $invoiceHeader->address_bene }}</div>  
            <div class="desc">{{ $invoiceHeader->city_bene }}</div>
            <div class="desc">TEL : +62 22 4241308 , FAX : +62 22 4239650</div>  
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
        <div class="half">
            <div class="title">Consignee :</div>
            <div class="desc">{{ $invoiceHeader->consigne }}</div>  
            <div class="desc">{{ $invoiceHeader->address_cons }}</div>  
            <div class="desc">{{ $invoiceHeader->country_cons }}</div>  
        </div>
        @if ( $invoiceHeader->payment == 'By LC')
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">LC No</div><div class="mx-3">:</div><div class="title-12B">{{ $invoiceHeader->lc_no }}</div>
            </div> 
            <div class="desc flex">
                <div class="title" style="width:100px">DD</div><div class="mx-3">:</div>{{ $invoiceHeader->date_lc }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:100px">Issued By</div><div class="mx-3">:</div>{{ $invoiceHeader->issued_by }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:100px">Country</div><div class="mx-3">:</div>
            </div> 
        </div>
        @else
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Payment</div><div class="mx-3">:</div><div class="title-12B">{{  $invoiceHeader->payment }}</div>
            </div>  
        </div>
        @endif

    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Notify Party :</div>
            <div class="desc">{{ $invoiceHeader->buyer_notif }}</div>  
            <div class="desc">{{ $invoiceHeader->address_notif }}</div>  
            <div class="desc">{{ $invoiceHeader->country_notif }}</div>  
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Ref No</div><div class="mx-3">:</div>{{ $invoiceHeader->ref_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:100px">Contract No</div><div class="mx-3">:</div>{{ $invoiceHeader->contract_no }}
            </div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Shipt On Board :</div>
            <div class="desc">{{ $invoiceHeader->shipOnBoard }}</div>
        </div>
        <div class="half">
            <div class="title">Vessel Name And Voyage :</div>
            <div class="desc">{{ $invoiceHeader->visel_name }}</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Port Of Loading :</div>
            <div class="desc">{{ $invoiceHeader->partOfLoading }}</div>
        </div>
        <div class="half">
            <div class="title">Port Of Destination :</div>
            <div class="desc">{{ $invoiceHeader->partOfDestination }}</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="all text-center fw-5">{{ $invoiceHeader->delivery_terms }} </div>
    </div>
</div> 
<!-- {{-- END MARUBENI --}} -->
@endif