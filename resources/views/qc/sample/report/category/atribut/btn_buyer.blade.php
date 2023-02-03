<?php
$cek_buyer = collect($row->buyer)->count('id');
?>

@if($cek_buyer == 0)
<a href="{{route('list_buyer.index', $row['id'])}}" class="edit btn btn-primary btn-sm" title="Create Item"><i class="fas fa-edit"></i></a>
@else
<a href="{{route('list_buyer.index', $row['id'])}}" class="edit btn btn-info btn-sm" title="Show Item"><i class="fas fa-eye"></i></a>
@endif