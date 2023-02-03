<a href="{{route('kain.edit', $row->id)}}" class="btn btn-warning btn-sm" title="Edit Report"><i class="fas fa-edit"></i></a>
<?php 
$cek_far = collect($row->far)->count('id');
$cek_fir = collect($row->fir)->count('id');
$cek_shadel = collect($row->shadel)->count('id');
?>
@if($cek_far == 0 && $cek_fir == 0 && $cek_shadel == 0)
<a href="{{route('kain.delete', $row->id)}}" class="btn btn-danger btn-sm" title="Delete Report" onclick="return confirm('Delete Report ?');"><i class="fas fa-trash"></i></button></a>
@endif