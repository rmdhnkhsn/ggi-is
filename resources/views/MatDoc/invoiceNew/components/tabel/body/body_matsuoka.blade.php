@if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $value['style'] }}</td>
    <td>{{ $value['po'] }}</td>
    <td class="text-left">{{ $value['descOfGood'] }}</td>
    <td>{{ $value['hsCode'] }}</td>
    <td>{{  number_format($value['qty'], 0, ",", ".")  }}</td>
    <td>{{ $value['unit'] }}</td>
    <td class="text-left">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
    <td class="text-left">$ {{number_format( $value['amount'], 2, ",", ".") }}</td>
</tr>
@endif