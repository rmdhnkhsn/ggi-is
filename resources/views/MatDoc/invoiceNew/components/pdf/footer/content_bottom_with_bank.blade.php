@if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
<!-- CONTENT BOTTOM WITH BANK -->
<table class="tables table-bordered" style="margin-top:-1px">
    <tr>
        <th width="50%" class="p-2 text-left">
            <div class="title">Manufacture Name & Address :</div>
            <div class="fw-400">PT. GISTEX GARMEN INDONESIA</div>
            <div class="fw-400">JL. PANYAWUNGAN KM. 19, CILEUNYI BANDUNG INDONESIA</div>
            <div class="fw-400">TEL : 6222-7796683</div>
            <div class="fw-400">MID CODE : IDGIS19BAN</div> 

            @if($data->buyer != 'MARUBENI CORPORATION JEPANG')
            <div class="title mt-3">Transfer Bank :</div>
            <div class="fw-400">CITIBANK N.A</div>
            <div class="fw-400">Jl. Asia Afrika No.135-137 Bandung Swift Code : CITIIDJXBDG </div>
            <div class="fw-400">Account USD : 0700247 503 In the name of : PT. Gistex Garmen Indonesia</div>
            @endif
        </th>
        <th width="50%" class="p-2 text-center">
            <div class="title mt-1">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
            <img src="{{ public_path('/images/iconpack/invoice/ttd.png') }}" class="mt-2" style="margin-right:70px">
        </th>
    </tr>
</table> 
@endif