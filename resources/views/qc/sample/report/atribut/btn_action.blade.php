<a href="{{route('qr.edit', $row['id'])}}" class="btn btn-warning btn-sm" title="Edit Report"><i class="fas fa-edit"></i></a>
@if($row['mea_id'] == 0 && $row['fq_id'] == 0 && $row['work_id'] == 0 && $row['mea_detail'] == 0)
<a href="{{route('qr.delete', $row['id'])}}" class="btn btn-danger btn-sm" title="Delete Report"><i class="fas fa-trash"></i></a>
@endif