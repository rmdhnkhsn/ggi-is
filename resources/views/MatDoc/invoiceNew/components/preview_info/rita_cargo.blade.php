@if ($data->buyer == 'Ritra Cargo Holland B.V.')
<!-- RITA CARGO & ADRENALINE LACROSE -->
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
            <div class="desc">TEL : +62 22 4241308</div>
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
        <div class="part">
            <div class="title">Notify Party :</div>
            <div class="desc">{{ $invoiceHeader->buyer_notif }}</div>  
            <div class="desc">{{ $invoiceHeader->address_notif }}</div>  
            <div class="desc">{{ $invoiceHeader->country_notif }}</div>  
        </div>
        <div class="part">
            <div class="title">Consignee/Ship To :</div>
            <div class="desc">{{ $invoiceHeader->consigne }} </div>  
            <div class="desc">{{ $invoiceHeader->address_cons }} </div>  
            <div class="desc">{{ $invoiceHeader->shipto }} </div>  
            <div class="desc">{{ $invoiceHeader->country_cons }} </div>  
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Payment</div><div class="mx-3">:</div>{{ $invoiceHeader->payment }}
            </div>   
            <div class="desc flex">
                <div class="title" style="width:100px">LC No</div><div class="mx-3">:</div>{{ $invoiceHeader->lc_no }}
            </div>   
        </div>
    </div>
    <div class="containerHeader">
        <div class="part">
            <div class="title">Vessel name & Voyage :</div>
            <div class="desc">{{ $invoiceHeader->visel_name }}</div>  
        </div>
        <div class="part">
            <div class="title">Ship on Board :</div>
            <div class="desc">{{ $invoiceHeader->shipOnBoard }}</div>  
        </div>
        <div class="part">
            <div class="title">Port Of Loading :</div>
            <div class="desc">{{ $invoiceHeader->partOfLoading }}</div>  
        </div>
        <div class="part">
            <div class="title">Port Of Destination :</div>
            <div class="desc">{{ $invoiceHeader->partOfDestination }}</div>  
        </div>
    </div>
    <div class="containerHeader">
        <div class="all text-center fw-5">FOB JAKARTA, INDONESIA</div>
    </div>
</div>
@endif