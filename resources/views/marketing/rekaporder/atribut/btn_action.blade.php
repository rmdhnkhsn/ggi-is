<a href="javascript:void(0)" class="btn btn-warning btn-sm editProduct" data-id="{{ $row['id'] }}" title="Edit" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i></a>
@if($row['is_detail_exist'] == 0)
<a href="{{ route('rekap.delete', $row['id'])}}" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
@endif