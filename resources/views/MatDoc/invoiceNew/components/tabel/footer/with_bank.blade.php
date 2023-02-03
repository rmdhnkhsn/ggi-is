@if ($data->buyer == 'MARUBENI CORPORATION JEPANG' || $data->buyer == 'MARUBENI FASHION LINK LTD.')
<!-- FOOTER CONTENT WTTH BANK -->
<!-- {{-- HANYA MARUBENI --}} -->
<div class="containerFooter">
    <div class="half">
        <div class="title">Manufacture Name & Address :</div>
        <div class="desc">{{ $invoiceHeader->manufacture_name }}</div>  
        <div class="desc">{{ $invoiceHeader->address_manu }}</div>  
        <div class="desc">{{ $invoiceHeader->country_manu }}</div>  
        <div class="desc">TELP : {{ $invoiceHeader->telp_manu }}</div>  
        <div class="desc">MID CODE : {{ $invoiceHeader->mid_manu }}</div>
        <div class="title mt-3">Transfer Bank :</div>
        <div class="desc">CITIBANK N.A</div>  
        <div class="desc">Jl. Asia Afrika No.135-137 Bandung Swift Code : CITIIDJXBDG </div>  
        <div class="desc">Account USD : 0700247 503 In the name of : PT. Gistex Garmen Indonesia</div>  
    </div>
    <div class="half" style="align-items: flex-start">
        <div class="grid-center">
            <div class="title">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
            <img src="{{url('images/iconpack/invoice/ttd.svg')}}">
        </div>
    </div>
</div> 
@endif