@if($row['fq_id'] == 0)
<form action="{{ route('fq.change', $row['id'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="fq_id" id="fq_id" value="{{$row['id']}}">
    <button type="submit" class="btn btn-primary btn-sm" title="Create Fabric Quality"><i class="fas fa-edit"></i></button>
</form>
@else
<a href="{{route('fq.show', $row['id'])}}" class="edit btn btn-info btn-sm" title="Show Report"><i class="fas fa-eye"></i></a>
@endif