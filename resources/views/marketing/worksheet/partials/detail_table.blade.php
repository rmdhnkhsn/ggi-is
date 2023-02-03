@foreach($master_data->rekap_breakdown->toArray() as $key=>$value)
@php $i=1 @endphp
    <tr>
    <td>{{$master_data->general_identity->first()->style_code}}</td>
    <td>{{$value['color_code']}}</td>
    <td>{{$value['color_name']}}</td>
    <td>{{$master_data->ex_fact}}</td>
    @foreach ($master_data->rekap_size->toArray() as $column => $field)
        @if (str_contains($column,'size')&&($field!==null))
            <td>{{$value['size'.$i]}}</td>
            @php $i+=1 @endphp
        @endif
    @endforeach
    <td>{{$value['total_size']}}</td>
    </tr>
@endforeach