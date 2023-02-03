@if($row->prc_app == 0)
<a class="btn btn-secondary btn-sm" title="Waiting"><i class="fas fa-spinner"></i></a> 
@elseif($row->prc_app == 1)
<a class="btn btn-success btn-sm" title="Reviewed"><i class="fas fa-user-check"></i></a>
@endif