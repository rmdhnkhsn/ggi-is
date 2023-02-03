@if($row['spv_app'] == 0)
<p class="btn btn-secondary btn-sm" title="Waiting"><i class="fas fa-spinner"></i></p>
@elseif($row['spv_app'] == 1)
<p class="btn btn-success btn-sm" title="Reviewed"><i class="fas fa-user-check"></i></p>
@endif