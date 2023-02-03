@if ($data->buyer != 'MARUBENI CORPORATION JEPANG' && $data->buyer != 'MARUBENI FASHION LINK LTD.' && $data->buyer != 'PENTEX LTD')
<!-- FOOTER CONTENT NO BANK -->
<!-- {{-- ALL --}} -->
<div class="containerFooter">
    <div class="half">
        <div class="title">Manufacture Name & Address :</div>
        <div class="desc">{{ $invoiceHeader->manufacture_name }}</div>  
        <div class="desc">{{ $invoiceHeader->address_manu }}</div>  
        <div class="desc">{{ $invoiceHeader->country_manu }}</div>  
        <div class="desc">TEL :{{ $invoiceHeader->telp_manu }}</div>  
        <div class="desc">MID CODE :{{ $invoiceHeader->mid_manu }}</div>
    </div>
    <div class="half" style="align-items: flex-start">
        <div class="grid-center">
            <div class="title">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
            <img src="{{url('images/iconpack/invoice/ttd.svg')}}">
        </div>
    </div>
</div>
@endif