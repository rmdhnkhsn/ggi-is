<?php 
    $cek_color = collect($data->color)->count('id');
?>
<tr style="text-align:center;">
    <th rowspan="2">ACTION</th>
    <th rowspan="2">NO</th>
    <th rowspan="2">DESCTRIPTION</th>
    <th rowspan="2">TOL</th>
    <th rowspan="2">SPEC</th>
    <th rowspan="2">P/P</th>
    @foreach($data->color as $key => $value)
    <th colspan="{{$value->pack}}">{{$value->color}}</th>
    @endforeach
</tr>
<tr style="text-align:center;">
    @foreach($data->color as $key => $value)
            @for($z=1; $z<=$value->pack; $z++)
                <th>{{$z}}</th>
            @endfor
    @endforeach
</tr>