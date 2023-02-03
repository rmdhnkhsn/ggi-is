
<a href="{{route('edit-data', $row['id'])}}" class="btn btn-edit btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a> 
<a href="{{ route('qrcode.generate', $row->id) }}" class="btn btn-qr btn-sm" title="Generate Qrcode"><i class="fas fa-barcode"></i></a> 
{{-- @if($row['smv'] == 0 && $row['ppm'] == 0 && $row['work'] == 0 && $row['trimcard'] == 0) --}}
<a href="{{route('qrcode.show', $row['id'])}}" class="btn btn-show btn-sm" title="Show Data Document"><i class="fas fa-info"></i></a>
@if($percentData < 20) 
    <a href="{{route('qrcode.delete', $row['id'])}}" class="btn btn-danger btn-sm" title="Delete Data"><i class="fas fa-trash"></i></a> 
@else
  <a href="{{route('qrcode.delete', $row['id'])}}" class="btn btn-danger btn-sm" hidden title="Delete Data"><i class="fas fa-trash" ></i></a>
@endif

