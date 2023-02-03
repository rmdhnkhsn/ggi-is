@if ($row->foto)
    @if(Storage::disk('public')->exists($row->foto))
    <div class="container-tbl-btn2">
        <a href="{{ asset('storage/'.$row->foto) }}" data-toggle="lightbox" data-title="" data-gallery="gallery">
            <img src="{{ asset('storage/'.$row->foto) }}" class="img-fluid mb-2" width="40px"/>
        </a>
    </div>
    @else
        <div class="text-center"> No img</div>
    @endif
@else
    <div class="text-center">-</div>
@endif