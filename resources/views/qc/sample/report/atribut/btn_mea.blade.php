@if($row['mea_id'] == 0)
<form action="{{ route('mea.change', $row['id'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="mea_id" id="mea_id" value="{{$row['id']}}">
    <button type="submit" class="btn btn-primary btn-sm" title="Create Measurement"><i class="fas fa-edit"></i></button>
</form>
@else
<a href="" class="edit btn btn-info btn-sm" title="Show Report"><i class="fas fa-eye"></i></a>
@endif