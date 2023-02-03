<a href="{{route('packing_detail.index',  $row->id)}}" class="btn btn-info btn-sm" title="Detail"><i class="fas fa-eye"></i></a>
<a href="javascript:void(0)" class="btn btn-warning btn-sm editReport" data-id="{{ $row->id }}" title="Edit" data-toggle="modal" data-target="#modal-editReport"><i class="fas fa-edit"></i></a>
@if($row->detail_id == 0)
    <a href="{{route('packing.delete', $row->id)}}" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Hapus Report ?');"><i class="far fa-trash-alt"></i></a>
@endif
<a href="{{route('packing.print',  $row->id)}}" class="btn btn-primary btn-sm" title="Download PDF"><i class="fas fa-file-pdf"></i></a>