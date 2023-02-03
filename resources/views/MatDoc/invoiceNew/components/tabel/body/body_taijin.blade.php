@if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
<tr>
    <td>{{ $loop->iteration }}</td>        
    <!-- <td>{{ $value['wo'] }}</td> -->
    <td>
        <div class="justify-start">
            <div>Container No :</div><span style="font-weight:bold;padding-left:5px;">{{ $value['no_kontainer'] }}</span>
        </div>
        <div class="justify-start">
            <div>Total CTN : </div><span style="font-weight:bold;padding-left:5px;">{{ $value['total_ctn'] }}</span>
        </div>
    </td>
    <td class="text-left">{{ $value['descOfGood'] }}</td>
    <td>{{ $value['hsCode'] }}</td> 
    <td>{{  number_format($value['qty'], 0, ",", ".")  }}</td>
    <td>{{ $value['unit'] }}</td>
    <td class="text-left">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
    <td class="text-left">$ {{number_format( $value['amount'], 2, ",", ".") }}</td>
</tr>
@endif