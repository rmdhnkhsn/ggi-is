<?php 
    $cek_color = collect($data->color)->count('id');
    $semua_cell = collect($data->color)->sum('pack');
?>
<?php $no=1;?>
@foreach($item->desc as $key => $value)
<tr style="text-align:center">
    <td>{{$no}}</td>
    <input type="hidden" class="form-control" id="semua_cell" name="semua_cell" value="{{$semua_cell}}" placeholder="Insert Status">
    <input type="hidden" class="form-control" id="report_id[]" name="report_id[]" value="{{$report_id}}" placeholder="Insert Status">
    <td><input type="text" class="form-control" id="description[]" name="description[]" value="" placeholder="Description" style="width:15em;"></td>
    <td><input type="text" class="form-control" id="tol[]" name="tol[]" value="" placeholder="TOL" style="width:4em;"></td>
    <td><input type="text" class="form-control" id="spec[]" name="spec[]" value="" placeholder="SPEC" style="width:4em;"></td>
    <td><input type="text" class="form-control" id="pp[]" name="pp[]" value="" placeholder="PP" style="width:3em;"></td>
    <!-- <td><input type="text" id="a1[]" name="a1[]" style="width:3em;"></td> -->
    @for($i=1; $i<=$semua_cell; $i++)
    <td><input type="text" class="form-control" id="note{{$i}}" name="note{{$i}}[]" style="width:3em;"></td>
    @endfor
</tr>
<?php $no++ ;?>
@endforeach
