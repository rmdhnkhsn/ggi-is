@if($row->mrc_app == 0)
<a href="{{route('md_approve.report', $row->id)}}" class="btn btn-primary btn-sm" title="OK?"><i class="far fa-check-square"></i></i></a> 
@elseif($row->mrc_app == 1)
<a class="btn btn-success btn-sm" title="Reviewed"><i class="fas fa-user-check"></i></a>
@endif