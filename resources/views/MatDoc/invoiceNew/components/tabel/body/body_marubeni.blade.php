@if ($data->buyer == 'MARUBENI CORPORATION JEPANG')
<tr>
    <td>{{ $loop->iteration }}</td> 
    <td>{{ $value['style'] }}</td>
    <td>{{ $value['item'] }}</td>
    <td>{{ $value['contract'] }}</td>
    <td class="text-left">{{ $value['descOfGood'] }}</td>
    <td>{{ $value['size'] }}</td>
    <td>{{ $value['hsCode'] }}</td>
    <td>{{  number_format($value['qty'], 0, ",", ".")  }}</td>
    <td>{{ $value['unit'] }}</td>
    <td class="text-left">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
    <td class="text-left">$ {{number_format( $value['amount'], 2, ",", ".") }}</td>
</tr>
@elseif($data->buyer == 'MARUBENI FASHION LINK LTD.')
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $value['style'] }}</td>
    <td>{{ $value['contract'] }}</td>
    <td class="text-left">{{ $value['descOfGood'] }}</td>
    <td>{{ $value['size'] }}</td>
    <td>{{ $value['hsCode'] }}</td>
    <td>{{  number_format($value['qty'], 0, ",", ".")  }}</td>
    <td>{{ $value['unit'] }}</td>
    <td class="text-left">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
    <td class="text-left">$ {{number_format( $value['amount'], 2, ",", ".") }}</td>
</tr>
@endif