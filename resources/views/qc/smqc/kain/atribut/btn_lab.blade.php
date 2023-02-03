<?php
$cek_lab = collect($row->lab)->count('id');
?>
@if($cek_lab == 0)
<a class="btn btn-secondary btn-sm" title="Waiting"><i class="fas fa-spinner"></i></a>
@else
<a class="btn btn-success btn-sm" title="Done"><i class="fas fa-user-check"></i></a>
@endif
