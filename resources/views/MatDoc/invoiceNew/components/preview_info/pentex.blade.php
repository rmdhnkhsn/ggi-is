@if ($data->buyer == 'PENTEX LTD')
<div class="headerTable">
    <div class="containerHeader">
        <div class="all">
            <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
        </div>
    </div>
    <div class="containerHeader">
        <div class="half2">
            <div class="padding">
                <div class="title">Shipper :</div>
                <div class="desc">{{ $invoiceHeader->company_ship }}</div>  
                <div class="desc">{{ $invoiceHeader->addres_ship }}</div>  
                <div class="desc">{{ $invoiceHeader->city_ship }}</div>
                <div class="desc">{{ $invoiceHeader->country_ship }}</div>
            </div>
            <div class="borderTbl"></div>
            <div class="padding">
                <div class="title">For Account and Risk :</div>
                <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
                <div class="desc">{{ $invoiceHeader->address_for }}</div>  
                <div class="desc">{{ $invoiceHeader->country_for }}</div>  
                <div class="desc">{{ $invoiceHeader->telp_for }}</div>
            </div>
            <div class="borderTbl"></div>
            <div class="padding">
                <div class="title">Consignee :</div>
                <div class="desc">{{ $invoiceHeader->consigne }} </div>  
                <div class="desc">{{ $invoiceHeader->cons_shipto }} </div>  
                <div class="desc">{{ $invoiceHeader->cons_street }} </div>  
                <div class="desc">{{ $invoiceHeader->cons_gate }} </div>  
                <div class="desc">{{ $invoiceHeader->country_cons }} </div>  
            </div>
        </div>
        <div class="half">
            <div class="desc flex">
                <div class="title" style="width:130px">Invoice No</div><div class="mx-3">:</div>{{ $invoiceHeader->invoice_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Date</div><div class="mx-3">:</div>{{ date("M d, Y", strtotime($invoiceHeader->date_invoice)) }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Contract No</div><div class="mx-3">:</div>{{ $invoiceHeader->contract_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Date</div><div class="mx-3">:</div>{{ date("M d, Y", strtotime($invoiceHeader->date_contract)) }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Exp No</div><div class="mx-3">:</div>{{ $invoiceHeader->exp_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Date</div><div class="mx-3">:</div>{{ date("M d, Y", strtotime($invoiceHeader->date_exp)) }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">BL No</div><div class="mx-3">:</div>{{ $invoiceHeader->bl_no }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">BL Date</div><div class="mx-3">:</div>{{ date("M d, Y", strtotime($invoiceHeader->date_bl)) }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Port of Loading</div><div class="mx-3">:</div>{{ $invoiceHeader->partOfLoading }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Port of Delivery</div><div class="mx-3">:</div>{{ $invoiceHeader->partOfDestination }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Final Destination</div><div class="mx-3">:</div>{{ $invoiceHeader->partOfDestination }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Negotiation Bank</div><div class="mx-3">:</div>{{ $invoiceHeader->nego_bank }}
            </div> 
            <div class="desc flex">
                <div class="title" style="width:130px">Remarks</div><div class="mx-3">:</div>{{ $invoiceHeader->remark_bank }}
            </div> 
        </div>
    </div>
    <div class="containerHeader">
        <div class="half">
            <div class="title">NOTIFY PARTY :</div>
            <div class="desc">{{ $invoiceHeader->buyer_notif }}</div>  
            <div class="desc">{{ $invoiceHeader->shipto_notif }}</div>  
            <div class="desc">{{ $invoiceHeader->street_notif }}</div>  
            <div class="desc">{{ $invoiceHeader->gate_notif }}</div>  
            <div class="desc">{{ $invoiceHeader->country_notif }}</div>  
        </div>
        <div class="half2">
            <div class="padding">
                <div class="title">Payment Terms :</div>
                @if ( $invoiceHeader->payment == 'By LC')
                <div class="desc flex">
                    <div class="title" style="width:60px">LC No</div><div class="mx-3">:</div>{{ $invoiceHeader->lc_no }}
                </div> 
                <div class="desc flex">
                    <div class="title" style="width:60px">Date</div><div class="mx-3">:</div>{{ date("M d, Y", strtotime($invoiceHeader->date_lc)) }}
                </div> 
                @else
                <div class="desc">{{ $invoiceHeader->payment }}</div>
                @endif
            </div>
            <div class="borderTbl"></div>
            <div class="padding">
                <div class="title">Deliver Terms :</div>
                <div class="desc">{{ $invoiceHeader->delivery_terms }}</div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- END PENTEX --}} -->
@endif