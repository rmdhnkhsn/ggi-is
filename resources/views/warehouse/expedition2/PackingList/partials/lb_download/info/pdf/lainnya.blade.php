<table style="width: 100%; border:none !important" class="header">
    <tr>
        <th style="text-align: left; width:15%">INVOICE</th>
        <th style="text-align: left; width:35%">:{{ $IsianKotakPutih['invoice'] }}</th>
        @if (auth()->user()->branch == 'CLN')
        <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
        <th style="text-align: left">:{{ $IsianKotakPutih['no_surat_jalan'] }}-{{ $IsianKotakPutih['no_surat_jalan2'] }}</th>
        @else
        <th style="text-align: left; width: 15%">NO SURAT JALAN</th>
        @endif
    </tr>
    <tr>
        <th style="text-align: left">BUYER</th>
        <th style="text-align: left; width:35%">:{{ $IsianKotakPutih['buyer'] }} </th>
        @if (auth()->user()->branch == 'CLN')
        <th style="text-align: left; width: 15%">DATE </th>
        <th style="text-align: left">: {{ $IsianKotakPutih['tanggal_surat'] }}</th>
        @else
        <th style="text-align: left; width: 15%">DATE </th>
        @endif
    </tr>
    <tr>
        <th style="text-align: left">CONTAINER NO</th>
        <th style="text-align: left; width:35%">:{{ $IsianKotakPutih['no_kontainer'] }}-{{ $IsianKotakPutih['no_kontainer2'] }} </th>
        @if (auth()->user()->branch == 'CLN')
        <th style="text-align: left; width: 15%">SEAL NO </th>
        <th style="text-align: left">:{{ $IsianKotakPutih['no_seal'] }}-{{ $IsianKotakPutih['no_seal2'] }} </th>
        @else
        <th style="text-align: left; width: 15%">SEAL NO </th>
        @endif
    </tr>
</table>