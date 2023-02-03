<!-- SendReport  -->
@if($value->standar_id != null)
<button data-toggle="modal" data-target="#ReportBiasaEdit{{$value->id}}" class="btn btn-warning btn-sm" title="Edit Report Biasa"><i class="fas fa-edit"></i></button>
@include('qc.smqc.accessories.partials.modal-edit')
@else
<button data-toggle="modal" data-target="#EditReportManual{{$value->id}}" class="btn btn-warning btn-sm" title="Edit Report Manual"><i class="fas fa-edit"></i></button>
@include('qc.smqc.accessories.partials.modal-edit-manual')
@endif
<a href="{{route('report_aksesoris.delete', $value->id)}}" class="btn btn-danger btn-sm" title="Delete Report" onclick="return confirm('Delete Report ?');"><i class="fas fa-trash-alt"></i></a>