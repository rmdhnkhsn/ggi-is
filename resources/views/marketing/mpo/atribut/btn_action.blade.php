<!-- <a href="{{route('masterpo.style', $row->id)}}" class="btn btn-info btn-sm" title="Detail"><i class="fas fa-eye"></i></a> -->
<a href="{{ route('edit-image', $row->id) }}" class="btn btn-success btn-sm" title="Edit" style="box-shadow: 2px 2px 8px rgba(0,0,0,0.3);"><i class="fas fa-edit"></i></a> |
<a href="{{ route('masterpo.style', $row->id) }}" class="btn btn-primary btn-sm" title="Add Style" style="box-shadow: 2px 2px 8px rgba(0,0,0,0.3);"><i class="fas fa-pen"></i></a> 

<!-- <a href="" class="btn btn-info btn-sm" title="View Image"><i class="fas fa-eye"></i></a> -->

