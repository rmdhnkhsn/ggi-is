<?php $no=1;?>
@foreach($detail as $dt)
<tr style="text-align:center">
    <td><a href="{{route('mdetail.edit', $dt->id)}}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
    <a href="{{route('mdetail.del', $dt->id)}}" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
    </td>
    <td scope="row">{{ $no }}</td>
    <td><input type="text" id="description[]" name="description[]" value="{{$dt->description}}" style="width:8em;" disabled></td>
    <td><input type="text" id="a1[]" name="a1[]" style="width:3em;" value="{{$dt->a1}}" disabled></td>
    <td><input type="text" id="a2[]" name="a2[]" style="width:3em;" value="{{$dt->a2}}" disabled></td>
    <td><input type="text" id="a3[]" name="a3[]" style="width:3em;" value="{{$dt->a3}}" disabled></td>
    <td><input type="text" id="a4[]" name="a4[]" style="width:3em;" value="{{$dt->a4}}" disabled></td>
    <td><input type="text" id="a5[]" name="a5[]" style="width:3em;" value="{{$dt->a5}}" disabled></td>
    <td><input type="text" id="a6[]" name="a6[]" style="width:3em;" value="{{$dt->a6}}" disabled></td>
    <td><input type="text" id="a7[]" name="a7[]" style="width:3em;" value="{{$dt->a7}}" disabled></td>
    <td><input type="text" id="a8[]" name="a8[]" style="width:3em;" value="{{$dt->a8}}" disabled></td>
    <td><input type="text" id="a9[]" name="a9[]" style="width:3em;" value="{{$dt->a9}}" disabled></td>
    <td><input type="text" id="a10[]" name="a10[]" style="width:3em;" value="{{$dt->a10}}" disabled></td>
    <td><input type="text" id="a11[]" name="a11[]" style="width:3em;" value="{{$dt->a11}}" disabled></td>
    <td><input type="text" id="a12[]" name="a12[]" style="width:3em;" value="{{$dt->a12}}" disabled></td>
    <td><input type="text" id="a13[]" name="a13[]" style="width:3em;" value="{{$dt->a13}}" disabled></td>
    <td><input type="text" id="a14[]" name="a14[]" style="width:3em;" value="{{$dt->a14}}" disabled></td>
    <td><input type="text" id="a15[]" name="a15[]" style="width:3em;" value="{{$dt->a15}}" disabled></td>
    @if($dt->a16 != null)
    <td><input type="text" id="a16[]" name="a16[]" style="width:3em;" value="{{$dt->a16}}" disabled></td>
    @endif
    @if($dt->a17 != null)
    <td><input type="text" id="a17[]" name="a17[]" style="width:3em;" value="{{$dt->a17}}" disabled></td>
    @endif
    @if($dt->a18 != null)
    <td><input type="text" id="a18[]" name="a18[]" style="width:3em;" value="{{$dt->a18}}" disabled></td>
    @endif
    @if($dt->a19 != null)
    <td><input type="text" id="a19[]" name="a19[]" style="width:3em;" value="{{$dt->a19}}" disabled></td>
    @endif
    @if($dt->a20 != null)
    <td><input type="text" id="a20[]" name="a20[]" style="width:3em;" value="{{$dt->a20}}" disabled></td>
    @endif
    @if($dt->a21 != null)
    <td><input type="text" id="a21[]" name="a21[]" style="width:3em;" value="{{$dt->a21}}" disabled></td>
    @endif
    @if($dt->a22 != null)
    <td><input type="text" style="width:3em;" value="{{$dt->a22}}" disabled></td>
    @endif
    @if($dt->a23 != null)
    <td><input type="text" style="width:3em;" value="{{$dt->a23}}" disabled></td>
    @endif
    @if($dt->a24 != null)
    <td><input type="text" style="width:3em;" value="{{$dt->a24}}" disabled></td>
    @endif
    @if($dt->a25 != null)
    <td><input type="text" style="width:3em;" value="{{$dt->a25}}" disabled></td>
    @endif
    @if($dt->a26 != null)
    <td><input type="text" style="width:3em;" value="{{$dt->a26}}" disabled></td>
    @endif
    @if($dt->a27 != null)
    <td><input type="text" style="width:3em;" value="{{$dt->a27}}" disabled></td>
    @endif
    @if($dt->a28 != null)
    <td><input type="text" style="width:3em;" value="{{$dt->a28}}" disabled></td>
    @endif
    @if($dt->a29 != null)
    <td><input type="text" style="width:3em;" value="{{$dt->a29}}" disabled></td>
    @endif
    @if($dt->a30 != null) 
    <td><input type="text" style="width:3em;" value="{{$dt->a30}}" disabled></td>
    @endif
</tr>
<?php $no++ ;?>
@endforeach