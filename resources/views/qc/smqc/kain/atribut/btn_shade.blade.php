<?php 
$cek_shade = collect($row->shadel)->count('id')
?>
@if($cek_shade == 0)
<a href="{{route('shade.create', $row->id)}}" class="btn btn-primary btn-sm" title="Create Report"><i class="fas fa-file-medical"></i></a>
@else
<a href="{{route('shade.detail', $row->id)}}" class="btn btn-info btn-sm" title="Show Report"><i class="far fa-eye"></i></a>
@endif