<?php
    $cek_color = collect($data->color)->count('id');
    $semua_cell = collect($data->color)->sum('pack');
?>
<?php $no=1;?>
@foreach($data->measurement as $key => $value)
<tr style="text-align:center">
    <td><a href="{{route('sample_measurement.edit', $value->id)}}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
    <a href="{{route('sample_measurement.del', $value->id)}}" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
    </td>
    <td scope="row">{{ $no }}</td>
    <td style="text-align:left;">{{ $value->description }}</td>
    <td>{{ $value->tol }}</td>
    <td>{{ $value->spec }}</td>
    <td>{{ $value->pp }}</td>
    @for($i=1; $i<=$semua_cell; $i++)
    <?php
        $note = "note".$i; 
        $test = $value->$note;
        if ($test == null) {
            $barcode = null;
        }else {
            $barcode = $test;
        }
    ?>
    @if($barcode != null)
    <td>{{$barcode}}</td>
    @else
    <td><i class="fas fa-check"></i></td>
    @endif
    @endfor
</tr>
<?php $no++ ;?>
@endforeach