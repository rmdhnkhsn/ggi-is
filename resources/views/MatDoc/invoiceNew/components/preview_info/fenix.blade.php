@if ($data->buyer == 'FENIX LOGISTIC SERVICE LTD')
<!-- {{-- TAIJIN || HONGKONG --}} -->
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
            <div class="desc">TEL : +62 22 4241308 , FAX : +62 22 4239650</div>  
        </div>
        <div class="half">
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
                    <div class="title" style="width:100px">Payment</div>
                    <div class="mx-3">:</div><div class="title-12B">{{  $invoiceHeader->payment }}</div>
                </div>
            </div>
            @endif
            <div class="desc flex">
                <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
            </div> 
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">For account and risk  : </div>
            <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
            <div class="desc">{{ $invoiceHeader->address_for }}</div>  
            <div class="desc">{{ $invoiceHeader->country_for }}</div> 
        </div>
        <div class="half">
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
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">Notify Party :</div>
            <div class="desc">{{  $invoiceHeader->buyer_notif }}</div>  
            <div class="desc">{{  $invoiceHeader->address_notif }}</div>  
            <div class="desc">{{  $invoiceHeader->country_notif }}</div>  
        </div>
        <div class="half">
            <div class="title">Remarks :</div>
            <div class="desc">{{  $invoiceHeader->remarks }}</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="part">
            <div class="title">Port Of Loading :</div>
            <div class="desc">{{  $invoiceHeader->partOfLoading }}</div>
        </div>
        <div class="part">
            <div class="title">Final Destination :</div>
            <div class="desc">{{  $invoiceHeader->partOfDestination }}</div>
        </div>
        <div class="part">
            <div class="title">Carrier :</div>
            <div class="desc">{{  $invoiceHeader->carrier_deliv }}</div>
        </div>
        <div class="part">
            <div class="title">Sailing on or about :</div>
            <div class="desc">Aug 9,2022</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half text-center fw-5">{{  $invoiceHeader->delivery_terms }} </div>
        <div class="half text-center"><span class="fw-5">PAYMENT</span> : {{ $invoiceHeader->payment }}</div> 
    </div>
</div>
<!-- {{-- END TAIJIN --}} -->
@endif