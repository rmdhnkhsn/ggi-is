@if ($data->buyer != 'MARUBENI CORPORATION JEPANG' && $data->buyer != 'MARUBENI FASHION LINK LTD.' && $data->buyer != 'PENTEX LTD')
<!-- CONTENT BOTTOM -->
<table class="tables table-bordered" style="margin-top:-1px">
    <tr>
        <th width="50%" class="p-2 text-left">
            <div class="absolute">
                <div class="mt-1">Manufacture Name & Address :</div>
                <div class="fw-400">{{ $invoiceHeader->manufacture_name }}</div>  
                <div class="fw-400">{{ $invoiceHeader->address_manu }}</div>  
                <div class="fw-400">{{ $invoiceHeader->country_manu }}</div>  
                <div class="fw-400">TEL :{{ $invoiceHeader->telp_manu }}</div>  
                <div class="fw-400">MID CODE :{{ $invoiceHeader->mid_manu }}</div>
            </div>
        </th>
        <th width="50%" class="p-2 text-center">
            <div class="title mt-1">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
            <img src="{{ public_path('/images/iconpack/invoice/ttd.png') }}" class="mt-2" style="margin-right:70px">
        </th>
    </tr>
</table> 
@endif