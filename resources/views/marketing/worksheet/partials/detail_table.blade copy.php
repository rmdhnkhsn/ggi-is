@foreach($style as $key => $value)
    @foreach($breakdown as $key2 => $value2)
        @if($value->detail_id == $key2)
            $foreach($value2 as $key3 => $value3)
            aa
            @endforeach
        @endif
    @foreach
@endforeach

@foreach($style as $key => $value)
    <tr class="font-td">
        <td rowspan="{{$value['jumlah']+1}}">{{$value['style']}} {{$value['jumlah']}}</td>
        <td rowspan="{{$value['jumlah']+1}}">{{$value['product_name']}}</td>
        <td rowspan="{{$value['jumlah']+1}}">{{$value['exfact']}}</td>
    @foreach($breakdown $key2 => $value2)
        @if($value2->detail_id == $value['detail_id'])
        <td>{{ $value2->color_code }}</td>
        <td>{{ $value2->color_name }}</td>
        @if($master_data->rekap_size->size1 != null)
        <td>{{ $value2->size1 }}</td>
        @endif
        @if($master_data->rekap_size->size2 != null)
        <td>{{ $value2->size2 }}</td>
        @endif
        @if($master_data->rekap_size->size3 != null)
        <td>{{ $value2->size3 }}</td>
        @endif
        @if($master_data->rekap_size->size4 != null)
        <td>{{ $value2->size4 }}</td>
        @endif
        @if($master_data->rekap_size->size5 != null)
        <td>{{ $value2->size5 }}</td>
        @endif
        @if($master_data->rekap_size->size6 != null)
        <td>{{ $value2->size6 }}</td>
        @endif
        @if($master_data->rekap_size->size7 != null)
        <td>{{ $value2->size7 }}</td>
        @endif
        @if($master_data->rekap_size->size8 != null)
        <td>{{ $value2->size8 }}</td>
        @endif
        @if($master_data->rekap_size->size9 != null)
        <td>{{ $value2->size9 }}</td>
        @endif
        @if($master_data->rekap_size->size10 != null)
        <td>{{ $value2->size10 }}</td>
        @endif
        @if($master_data->rekap_size->size11 != null)
        <td>{{ $value2->size11 }}</td>
        @endif
        @if($master_data->rekap_size->size12 != null)
        <td>{{ $value2->size12 }}</td>
        @endif
        @if($master_data->rekap_size->size13 != null)
        <td>{{ $value2->size13 }}</td>
        @endif
        @if($master_data->rekap_size->size14 != null)
        <td>{{ $value2->size14 }}</td>
        @endif
        @if($master_data->rekap_size->size15 != null)
        <td>{{ $value2->size15 }}</td>
        @endif
        @endif
   
    @endforeach
     </tr>
@endforeach