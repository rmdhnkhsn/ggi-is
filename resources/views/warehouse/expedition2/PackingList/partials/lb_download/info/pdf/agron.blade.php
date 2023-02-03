<table style="width: 100%; border:none !important" class="header">
    <tr>
        <th width="30%" style="text-align:left">
        <div class="content">
            <span style="font-size:16px">INVOICE NO</span>
            <span style="margin-left:40px">:</span>
            <span style="font-size:16px;margin-left:10px">{{ $IsianKotakPutih['invoice'] }}</span>
        </div>
        <div class="content">
            <span style="font-size:16px">DATE</span>
            <span style="margin-left:93px">:</span>
            <span style="font-size:16px;margin-left:10px">{{ $IsianKotakPutih['tanggal_surat'] }}</span>
        </div>
        </th>
        <th width="30%" style="text-align:left">
        <div class="content">
            <span style="font-size:16px">CONTAINER NO :</span><br/>
            <span style="font-size:16px;font-weight:400">{{ $IsianKotakPutih['no_kontainer'] }}</span><br/>
            <span style="font-size:16px;font-weight:400">{{ $IsianKotakPutih['no_kontainer2'] }}</span>
        </div>
        </th>
        <th width="40%" style="text-align:left">
        <div class="content">
            <span style="font-size:16px">SEAL NO :</span><br/>
            <span style="font-size:16px;font-weight:400">{{ $IsianKotakPutih['no_seal'] }}</span><br/>
            <span style="font-size:16px;font-weight:400">{{ $IsianKotakPutih['no_seal2'] }}</span>
        </div>
        </th>
    </tr>
</table>