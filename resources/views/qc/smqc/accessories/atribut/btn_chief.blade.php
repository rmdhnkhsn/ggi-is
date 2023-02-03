<center>
@if($value->chief_app == 0)
<a class="btn-secondary btn-sm" title="Waiting"><i class="fas fa-spinner"></i></a>
@elseif($value->chief_app == 1)
<a class="btn-success btn-sm" title="Approved"><i class="fas fa-user-check"></i></a>
@endif</center>