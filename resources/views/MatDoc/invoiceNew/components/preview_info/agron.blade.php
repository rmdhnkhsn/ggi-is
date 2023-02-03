@if ($data->buyer == 'AGRON, INC.')
<!-- {{-- AGRON || HEXAPOLE --}} -->
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
            <div class="desc">TEL : +62 22 4241308 , FAX :+62 22 4239650</div>  
        </div>
        <div class="half">
            <div class="desc"><span class="title">Invoice No</span> : {{ $invoiceHeader->invoice_no }}</div> 
            <div class="desc"><span class="title">Date</span> : {{ $invoiceHeader->date }}</div> 
        </div>
    </div>
    <div class="containerHeader">
        <div class="part">
            <div class="title">For account and risk :</div>
            <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
            <div class="desc">{{ $invoiceHeader->address_for }}</div>  
            <div class="desc">{{ $invoiceHeader->country_for }}</div>  
        </div>
        <div class="part">
            <div class="title">Consignee / Ship to :</div>
            <div class="desc">{{ $invoiceHeader->consigne }}</div>  
            <div class="desc">{{ $invoiceHeader->address_cons }}</div>  
            <div class="desc">{{ $invoiceHeader->country_cons }}</div>  
        </div>
        <div class="part">
            <div class="title">Container No :</div>
            <div class="desc"> {{ $invoiceHeader->container_no }} </div>  
            <div class="desc"> {{ $invoiceHeader->container_no2 }}'HC</div>  
        </div>
        <div class="part">
            <div class="title">Seal No :</div>
            <div class="desc">{{ $invoiceHeader->seal_no }}</div>  
            <div class="desc">{{ $invoiceHeader->seal_no2 }}</div>  
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
        <div class="half text-center fw-5">{{ $invoiceHeader->delivery_terms }} </div>
        <div class="half text-center"><span class="fw-5">PAYMENT</span> : {{ $invoiceHeader->payment }}</div> 
    </div>
</div>
@endif