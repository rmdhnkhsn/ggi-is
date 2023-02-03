<div class="row">
    <div class="col-12 mb-2">
        <div class="title-16-blue">Lembur Kualitatif</div>
    </div>
    @foreach($Kualitatif as $key=> $value)
    <input type="hidden"  id="id_kualitatif" name="id_kualitatif" value="{{$value->id}}">
    <div class="col-md-4 mb-3">
        <span class="title-sm">Buyer</span>
        <input type="text" class="form-control border-input2 mt-1" id="deskripsi" name="buyer2" value="{{$value->buyer}}" placeholder="Masukkan Deskripsi..." readonly>
    </div>
    <div class="col-md-4 mb-3">
        <span class="title-sm">Target</span>
        <input type="text" class="form-control border-input2 mt-1" id="target" name="target2" value="{{$value->target}}" placeholder="Masukkan Target..." readonly>
    </div>
    <div class="col-md-4 mb-3">
        <span class="title-sm">Realisasi</span>
        <input type="text" class="form-control border-input2 mt-1" id="realisasi" name="realisasi1" value="{{$value->realisasi}}" placeholder="Masukkan Realisasi..." readonly>
    </div>
    <div class="col-md-12 mb-3">
        <span class="title-sm">Alasan 1</span>
        <input type="text" class="form-control border-input2 mt-1" id="alasan" name="alasan1" value="{{$value->alasan1}}" placeholder="Masukkan alasan..." readonly>
    </div>
    @if($value->alasan2!=null)
    <div class="col-md-12 mb-3">
        <span class="title-sm">Alasan 2</span>
        <input type="text" class="form-control border-input2 mt-1" id="alasan" name="alasan2" value="{{$value->alasan2}}" placeholder="Masukkan alasan..." readonly>
    </div>
    @endif
    @if($value->alasan3!=null)

    <div class="col-md-12 mb-3">
        <span class="title-sm">Alasan 3</span>
        <input type="text" class="form-control border-input2 mt-1" id="alasan" name="alasan3" value="{{$value->alasan3}}" placeholder="Masukkan alasan..." readonly>
    </div>
    @endif
    @if($value->alasan4!=null)
    <div class="col-md-12 mb-3">
        <span class="title-sm">Alasan 4</span>
        <input type="text" class="form-control border-input2 mt-1" id="alasan" name="alasan4" value="{{$value->alasan4}}" placeholder="Masukkan alasan..." readonly>
    </div>
    @endif
    @if($value->alasan5!=null)
    <div class="col-md-12 mb-3">
        <span class="title-sm">Alasan 5</span>
        <input type="text" class="form-control border-input2 mt-1" id="alasan" name="alasan5" value="{{$value->alasan5}}" placeholder="Masukkan alasan..." readonly>
    </div>
    @endif
    @endforeach
</div>