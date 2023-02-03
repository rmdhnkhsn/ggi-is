<a href="javascript:void(0)" class="btn btn-warning btn-sm editProduct" data-id="{{ $row->id }}" title="Edit" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i></a>
<a href="{{ route('trimcard.delete', $row->id)}}" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
<a href="{{route('trimcard.breakdown', $row->no_wo)}}" class="btn btn-primary btn-sm" title="Get"><i class="fas fa-copy"></i></a>
<a href="{{route('trimcard.file', $row->id)}}" class="btn btn-info btn-sm" title="File"><i class="far fa-folder"></i></a>
