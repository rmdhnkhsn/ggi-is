<!-- {{-- MARUSA --}} -->
@if ($data->buyer == 'MARUSA Co.,Ltd.')
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
            <div class="desc flex">
                <div class="title" style="width:120px">Invoice No</div><div class="mx-3">:</div>{{ $invoiceHeader->invoice_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:120px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
            </div> 
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Consignee :</div>
            <div class="desc">{{ $invoiceHeader->consigne }} </div>  
            <div class="desc">{{ $invoiceHeader->address_cons }} </div>  
            <div class="desc">{{ $invoiceHeader->shipto }} </div>  
            <div class="desc">{{ $invoiceHeader->country_cons }} </div>  
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:120px">Payment</div><div class="mx-3">:</div>{{ $invoiceHeader->payment }}
            </div> 
        </div>
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
                <div class="title" style="width:120px">Ref No.</div><div class="mx-3">:</div>-
            </div> 
            <div class="desc flex">
                <div class="title" style="width:120px">Contract No</div><div class="mx-3">:</div>21MR-0001
            </div> 
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:94px">Shipt On Board</div><div class="mx-3">:</div>{{ $invoiceHeader->shipOnBoard }}
            </div>
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:120px">Part Of Destination</div><div class="mx-3">:</div>Allegoria 0566
            </div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Port Of Loading :</div>
            <div class="desc">{{ $invoiceHeader->partOfLoading }}</div>  
        </div>
        <div class="half">
            <div class="title">Part Of Destination :</div>
            <div class="desc">NARITA JAPAN</div> 
        </div>
    </div>
    <div class="containerHeader">
        <div class="all text-center fw-5">FOB JAKARTA, INDONESIA</div>
    </div>
</div>
@endif