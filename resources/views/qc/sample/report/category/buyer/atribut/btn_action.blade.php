<?php
$cek_item = collect($row->item)->count('id');
?>
<a href="{{route('list_buyer.edit', $row['id'])}}" class="btn btn-warning btn-sm" title="Edit Report"><i class="fas fa-edit"></i></a>
@if($cek_item == 0)
<a href="{{route('list_buyer.delete', $row['id'])}}" class="btn btn-danger btn-sm" title="Delete Report"><i class="fas fa-trash"></i></a>
@endif