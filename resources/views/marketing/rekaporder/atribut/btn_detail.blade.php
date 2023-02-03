@if($row['is_detail_exist'] == 0)
<a href="{{route('rekap.create', $row['id'])}}" class="edit btn btn-primary btn-sm" title="Create Detail"><i class="fas fa-edit"></i></a>
@else
<a href="{{route('rekap.final', $row['id'])}}" class="edit btn btn-info btn-sm" title="Show Report"><i class="fas fa-eye"></i></a>
@endif