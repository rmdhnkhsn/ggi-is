<?php
$cek_description = collect($row->desc)->count('id');
?>
<a href="{{route('item_category.edit', $row['id'])}}" class="btn btn-warning btn-sm" title="Edit Report"><i class="fas fa-edit"></i></a>
@if($cek_description == 0)
<a href="{{route('item_category.delete', $row['id'])}}" class="btn btn-danger btn-sm" title="Delete Report"><i class="fas fa-trash"></i></a>
@endif