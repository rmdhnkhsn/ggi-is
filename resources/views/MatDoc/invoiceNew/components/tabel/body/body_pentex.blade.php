@if ($data->buyer == 'PENTEX LTD')
<tr>
    <td>{{ $loop->iteration }}</td> 
    <td>{{ $value['hsCode'] }}</td>
    <td>{{ $value['style'] }}</td>
    <td>{{ $value['docket_no'] }}</td>
    <td>{{ $value['destination_no'] }}</td>
    <td>{{ $value['kimball_no'] }}</td>
    <td class="text-left">{{ $value['descOfGood'] }}</td>
    <td>{{ $value['color'] }}</td>
    <td>{{ $value['carton_qty'] }}</td>
    <td>{{ $value['no_of_units'] }}</td>
    <td>{{ $value['no_of_set'] }}</td>
    <td>${{ number_format( $value['cm'], 2, ",", ".") }}</td>
    <td>{{ $value['fabric'] }}</td>
    <td>${{ number_format( $value['trims'], 2, ",", ".") }}</td>
    <td>${{ number_format( $value['lp'], 2, ",", ".") }}</td>
    <td>${{ number_format( $value['sub'], 2, ",", ".") }}</td>
    <td class="text-left">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
    <td class="text-left">$ {{number_format( $value['amount'], 2, ",", ".") }}</td>
</tr>
@endif