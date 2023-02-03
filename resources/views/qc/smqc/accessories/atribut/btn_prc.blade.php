<center>
@if($value->prc_app == 0)
<a class="btn-secondary btn-sm" title="Waiting"><i class="fas fa-spinner"></i></a>
@elseif($value->prc_app == 1)
<a class="btn-success btn-sm" title="Reviewed"><i class="fas fa-user-check"></i></a>
@endif</center>