@if ( $data->buyer == 'PENTEX LTD')
<!-- {{-- HANYA PANTEX --}} -->
<div class="containerFooter">
    <div class="half">
        <div class="title">PAYMENT INSTRUCTION</div>
    </div>
    <div class="half">
        <div class="title text-center">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
    </div>
</div>
<div class="containerFooter">
    <div class="half">
        <div class="desc flex">
            <div style="width:120px">BENEFICIARY NAME</div><div class="mx-3">:</div>{{$invoiceHeader->bank_detail}}
        </div>
        <div class="desc flex">
            <div style="width:120px">BANK NAME</div><div class="mx-3">:</div>{{$invoiceHeader->bene_name}}
        </div>
        <div class="desc flex">
            <div style="width:120px">BANK ADDRESS</div><div class="mx-3">:</div>{{$invoiceHeader->bank_name}}
        </div>
        <div class="desc flex">
            <div style="width:120px">SWIFT CODE</div><div class="mx-3">:</div>{{$invoiceHeader->bank_acc}}
        </div>
        <div class="desc flex">
            <div style="width:120px">ACCOUNT NUMBER</div><div class="mx-3">:</div>{{$invoiceHeader->bank_swift}}
        </div>
    </div>
    <div class="half justify-center">
        <img src="{{url('images/iconpack/invoice/ttd.svg')}}">
    </div>
</div>
@endif