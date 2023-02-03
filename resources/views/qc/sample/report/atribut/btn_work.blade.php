@if($row['work_id'] == 0)
<form action="{{ route('work.change', $row['id'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="work_id" id="work_id" value="{{$row['id']}}">
    <button type="submit" class="btn btn-primary btn-sm" title="Create Workmanship"><i class="fas fa-edit"></i></button>
</form>
@else
<a href="{{ route('work.show', $row['id'])}}" class="edit btn btn-info btn-sm" title="Show Report"><i class="fas fa-eye"></i></a>
@endif