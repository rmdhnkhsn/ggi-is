 <!-- {{-- MATSUOKA --}} -->
 @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
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
            <div class="desc">{{ $invoiceHeader->country_bene }}</div>
            <div class="desc">{{ $invoiceHeader->telp_bene }}</div>  
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Invoice No</div><div class="mx-3"></div>{{ $invoiceHeader->invoice_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:100px">Date</div><div class="mx-3"></div>{{ date("M d, Y", strtotime($invoiceHeader->date)) }}
            </div> 
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Consignee  : </div>
            <div class="desc">{{ $invoiceHeader->consigne }} </div>  
            <div class="desc">{{ $invoiceHeader->address_cons }} </div>  
            <div class="desc">{{ $invoiceHeader->shipto }} </div>  
            <div class="desc">{{ $invoiceHeader->country_cons }} </div>  
            <div class="desc">{{ $invoiceHeader->telp }} </div>  
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Container No</div><div class="mx-3"></div>{{ $invoiceHeader->container_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:100px">Seal No</div><div class="mx-3"></div>{{ $invoiceHeader->seal_no }}
            </div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Shipt on Board :</div>
            <div class="desc">{{ date("M d, Y", strtotime($invoiceHeader->shipOnBoard)) }}</div>  
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">Vessel No</div><div class="mx-3">:</div>{{ $invoiceHeader->visel_name }}
            </div> 
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Port Of Loading :</div>
            <div class="desc">{{  $invoiceHeader->partOfLoading }}</div>
        </div>
        <div class="half">
            <div class="title">Part of Destination :</div>
            <div class="desc">{{  $invoiceHeader->partOfDestination }}</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half justify-center fw-5">{{  $invoiceHeader->delivery_terms }} </div>
        @if ( $invoiceHeader->payment == 'By LC')
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:100px">LC No</div><div class="mx-3"></div>{{ $invoiceHeader->lc_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:100px">Date</div><div class="mx-3"></div>{{ date("M d, Y", strtotime($invoiceHeader->date_lc)) }}
            </div> 
        </div>
        @else
        <div class="half justify-center fw-5"> <div class="title" style="width:70px">PAYMENT :</div>{{  $invoiceHeader->payment }} </div>
        @endif 
    </div>
</div> 
<!-- {{-- END MATSUOKA --}} -->
@endif