<?php 
$cek_fir = collect($row->fir)->count('id')
?>
@if($cek_fir == 0)
<a href="{{route('fir.create', $row->id)}}" class="btn btn-primary btn-sm" title="Create Report"><i class="fas fa-file-medical"></i></a>
@else
<a href="{{route('fir.detail', $row->id)}}" class="btn btn-info btn-sm" title="Show Report"><i class="far fa-eye"></i></a>
@endif