<?php 
$assort = collect($form->assortmarker)->count('id');
?>
@if($assort != 0)
<thead class="bg-thead">
    <tr>
        <th colspan="{{$assort + 2}}">ASSORTMAKER</th>
    </tr>
    <tr>
        <th>Size</th>
        @foreach($form->assortmarker as $key => $value)
        <th>{{$value->size}}</th>
        @endforeach
        <th>Total</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>Ratio</td>
        @foreach($form->assortmarker as $key => $value)
        <td>{{$value->qty}}</td>
        @endforeach
        <td>{{$form->total_ratio}}</td>
    </tr>
</tbody>
@endif