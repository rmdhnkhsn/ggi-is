<?php
$cek_buyer = collect($row->buyer)->count('id');
?>
<a href="{{route('sample_category.edit', $row['id'])}}" class="btn btn-warning btn-sm" title="Edit Report"><i class="fas fa-edit"></i></a>
@if($cek_buyer == 0)
<a href="{{route('sample_category.delete', $row['id'])}}" class="btn btn-danger btn-sm" title="Delete Report"><i class="fas fa-trash"></i></a>
@endif