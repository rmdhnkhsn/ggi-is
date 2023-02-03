<?php
    $totalCarton = collect($data2)->sum('carton_qty');
    $NoOfUnits = collect($data2)->sum('no_of_units');
?>
<tr>
    @if ($data->buyer == 'AGRON, INC.')
    <th colspan="5">INVOICE TOTAL</th>
    @elseif ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    @elseif ($data->buyer == 'HEXAPOLE COMPANY LIMITED')
    <th colspan="7">INVOICE TOTAL</th>
    @elseif ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
    <th colspan="4">INVOICE TOTAL</th>
    @elseif ($data->buyer == 'PENTEX LTD')
    <th colspan="8">TOTAL</th>
    <th>{{$totalCarton}}</th>
    <th>{{$NoOfUnits}}</th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th class="text-left">${{number_format($dataInvoiceHeader->totalInvoice, 2, ",", ".")}}</th>
    @elseif($data->buyer == 'MARUBENI CORPORATION JEPANG')
    <th colspan="7">INVOICE TOTAL</th>
    @else
    <th colspan="6">INVOICE TOTAL</th>
    @endif
    @if($data->buyer != 'PENTEX LTD')
    <th colspan="2">{{ number_format($dataInvoiceHeader->totalPack, 0, ",", ".")}} {{ $dataInvoiceHeader->unit }}</th>
    <th></th>
    <th class="text-left">$ {{number_format($dataInvoiceHeader->totalInvoice, 2, ",", ".")}}</th>
    @endif
</tr>

<!-- khusus pentex  -->
@if($data->buyer == 'PENTEX LTD')
<tr>
    <th colspan="8"></th>
    <th colspan="9" style="font-style: italic">ADVANCE ADJUSTMENT</th>
    <th class="text-left">$ {{$dataInvoiceHeader->advance}}</th>
</tr>
<tr>
    <th colspan="8">TOTAL INVOICE</th>
    <th>{{$totalCarton}} Ctn</th>
    <th>{{$NoOfUnits}} Pcs</th>
    <th colspan="7"></th>
    <th class="text-left">${{number_format($dataInvoiceHeader->totalInvoice, 2, ",", ".")}}</th>
</tr>
@endif