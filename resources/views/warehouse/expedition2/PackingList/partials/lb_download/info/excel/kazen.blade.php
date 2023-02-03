<table style="width:1300px">
    <tr>
        <th colspan="17" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PACKING REPORT</th>
    </tr>
    <tr>
        <th colspan="17" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMENT INDONESIA</th>
    </tr>
    <br>
    <tr>
        <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">INVOICE</th>
        <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $IsianKotakPutih['invoice'] }} </th>
        @if (auth()->user()->branch == 'CLN')
        <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
        <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $IsianKotakPutih['no_surat_jalan'] }}-{{ $IsianKotakPutih['no_surat_jalan2'] }}</th>
        @else
            <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">NO SURAT JALAN</th>
        @endif
    </tr>
    <tr>
        <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">BUYER</th>
        <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $IsianKotakPutih['buyer'] }} </th>
        @if (auth()->user()->branch == 'CLN')
        <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
        <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $IsianKotakPutih['tanggal_surat'] }}</th>
        @else
        <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
        @endif
    </tr>
    <tr>
        <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">CONTAINER NO</th>
        <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $IsianKotakPutih['no_kontainer'] }}-{{ $IsianKotakPutih['no_kontainer2'] }} </th>
        @if (auth()->user()->branch == 'CLN')
        <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
        <th colspan="4" style="font-weight:bold;text-align:left;width:100px;">:{{ $IsianKotakPutih['no_seal'] }}-{{ $IsianKotakPutih['no_seal2'] }}</th>
        @else
        <th colspan="4" style="font-weight:bold;text-align:center;width:100px;">SEAL NO </th>
        @endif
    </tr>
</table>