<?php 
$cek_far = collect($row->far)->count('id')
?>
<?php 
$cek_far = collect($row->far)->count('id')
?>
@if($cek_far == 0)
<a href="{{route('far.index', $row->id)}}" class="btn btn-primary btn-sm" title="Create Report"><i class="fas fa-file-medical"></i></a>
@else
<a href="{{route('far.index', $row->id)}}" class="btn btn-info btn-sm" title="Show Report"><i class="far fa-eye"></i></a>
@endif