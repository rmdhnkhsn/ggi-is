<?php 
    $cek_color = collect($data->color)->count('id');
    $semua_cell = collect($data->color)->sum('pack');
?>
<input type="hidden" id="id" name="id" style="width:3em;" value="{{$detail->id}}">
<input type="hidden" id="report_id" name="report_id" style="width:3em;" value="{{$detail->report_id}}">
<tr style="text-align:center">
    <td>1</td>
    <td><input type="text" class="form-control" id="description" name="description" value="{{$detail->description}}" style="width:15em;"></td>
    <td><input type="text" class="form-control" id="tol" name="tol" placeholder="TOL" value="{{$detail->tol}}" style="width:4em;"></td>
    <td><input type="text" class="form-control" id="spec" name="spec" placeholder="SPEC" value="{{$detail->spec}}" style="width:4em;"></td>
    <td><input type="text" class="form-control" id="pp" name="pp" placeholder="PP" value="{{$detail->pp}}" style="width:3em;"></td>
    <!-- <td><input type="text" id="a1" name="a1" style="width:3em;"></td> -->
    @for($i=1; $i<=$semua_cell; $i++)
    <?php
        $note = "note".$i; 
        $test = $detail->$note;
    ?>
    <td><input type="text" class="form-control" id="note{{$i}}" name="note{{$i}}" value="{{$test}}" style="width:3em;"></td>
    @endfor
</tr>