<!-- Cek cek value  -->
<?php 
    $fabric_quality = collect($row->fabric_quality)->count('id');
    $cek_color = collect($row->color)->count('id');
    $cek_detail = collect($row->measurement)->count('id');
    $workmanship = collect($row->workmanship)->count('id');
?>

@if($fabric_quality == 0 || $cek_color == 0 ||  $cek_detail == 0 || $workmanship == 0 )
<a href="{{route('create.detail', $row['id'])}}" class="edit btn btn-primary btn-sm" title="Create Detail"><i class="fas fa-edit"></i></a>
@else
<a href="{{route('sample.final', $row['id'])}}" class="edit btn btn-info btn-sm" title="Show Report"><i class="fas fa-eye"></i></a>
@endif