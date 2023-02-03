{{-- Button PDF --}}
<a href="{{ route('kain.fir_pdf', $row->id)}}" target="_blank" class="btn btn-danger btn-sm" title="Show Report"><i class="far fa-file-pdf"></i> FIR</a>
<a href="{{ route('kain.far_pdf', $row->id)}}" target="_blank" class="btn btn-danger btn-sm" title="Show Report"><i class="far fa-file-pdf"></i> FAR</a>
<a href="{{ route('kain.shade_pdf', $row->id)}}" target="_blank" class="btn btn-danger btn-sm" title="Show Report"><i class="far fa-file-pdf"></i> SLR</a>