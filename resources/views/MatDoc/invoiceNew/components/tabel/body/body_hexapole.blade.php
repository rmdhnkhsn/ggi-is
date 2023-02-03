@if ($data->buyer == 'HEXAPOLE COMPANY LIMITED')
<tr>
    <!-- po, wo,contract, style,size, descOfGood,hsCode,qty,unit,unitPrice,amount -->
    <td class="text-center">{{ $loop->iteration }}</td>
    <td class="text-center">{{ $value['contract'] }}</td>
    <td class="text-center">{{ $value['wo'] }}</td>
    <td class="text-center">{{ $value['style'] }}</td>  
    <td class="text-center">{{ $value['po'] }}</td>
    <td class="text-center">{{ $value['descOfGood'] }}</td>
    <td class="text-center">{{ $value['hsCode'] }}</td> 
    <td class="text-center">{{  number_format($value['qty'], 0, ",", ".")  }}</td>
    <td class="text-center">{{ $value['unit'] }}</td>
    <td class="text-center">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
    <td class="text-center">$ {{number_format( $value['amount'], 2, ",", ".") }}</td>
</tr>
@endif