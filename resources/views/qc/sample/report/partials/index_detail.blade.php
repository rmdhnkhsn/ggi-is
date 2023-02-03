<div class="form-group">
    <label for="roll">Buyer</label>
    <input type="text" class="form-control" id="buyer" name="buyer" value="{{$data->buyer_name}}" placeholder="Insert Buyer" disabled>
</div>
<div class="form-group">
    <label for="roll">Style</label>
    <input type="text" class="form-control" id="style" name="style" value="{{$data->style}}" placeholder="Insert Style" disabled>
</div>
<div class="form-group">
    <label for="roll">Status</label>
    <input type="text" class="form-control" id="status" name="status" value="{{$data->status}}" placeholder="Insert Status" disabled>
</div>
<div class="form-group">
    <label for="roll">Date</label>
    <input type="text" class="form-control" id="date" name="date" value="{{$data->date}}" placeholder="Insert Date" disabled>
</div>
<div class="row">
    @if($data->file)
    <div class="col-md-3">
        <div class="cards relative h-200">
            <a href="{{ url('/qc/sample/images/'.$data->file) }}" data-title="Report ID : {{$data->id}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{ url('/qc/sample/images/'.$data->file) }}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($data->file2)
    <div class="col-md-3">
        <div class="cards relative h-200">
            <a href="{{ url('/qc/sample/images/'.$data->file2) }}" data-title="Report ID : {{$data->id}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{ url('/qc/sample/images/'.$data->file2) }}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($data->file3)
    <div class="col-md-3">
        <div class="cards relative h-200">
            <a href="{{ url('/qc/sample/images/'.$data->file3) }}" data-title="Report ID : {{$data->id}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{ url('/qc/sample/images/'.$data->file3) }}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($data->file4)
    <div class="col-md-3">
        <div class="cards relative h-200">
            <a href="{{ url('/qc/sample/images/'.$data->file4) }}" data-title="Report ID : {{$data->id}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{ url('/qc/sample/images/'.$data->file4) }}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
</div>


