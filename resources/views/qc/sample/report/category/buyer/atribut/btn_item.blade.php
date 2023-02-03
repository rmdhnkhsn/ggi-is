<?php
$cek_item = collect($row->item)->count('id');
?>

@if($cek_item == 0)
<a href="{{route('item_category.index', $row['id'])}}" class="edit btn btn-primary btn-sm" title="Create Item"><i class="fas fa-edit"></i></a>
@else
<a href="{{route('item_category.index', $row['id'])}}" class="edit btn btn-info btn-sm" title="Show Item"><i class="fas fa-eye"></i></a>
@endif