{{-- validsi notif --}}
@if($row->notif_id == 0 )
    <a href="{{ route('fabric.notif', $row->id)}}" class="btn btn-primary btn-sm" title="Send Report" onclick="return confirm('Send Report ?');"><i class="far fa-share-square"></i></a>
@elseif($row->notif_id !== 0)
    <a class="btn btn-success btn-sm" title="Sent"><i class="far fa-check-square"></i></a>
@endif