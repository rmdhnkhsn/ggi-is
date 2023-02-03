<div class="row">
    <div class="col-12 mb-2">
        <div class="title-16-blue">Lembur Kuantitatif</div>
    </div>
</div>
    @foreach($Kuantitatif as $key=>$value)
    <div class="row">
    <input type="hidden" id="id_kuantitatif" name="id_kuantitatif[]" value="{{$value->id}}" placeholder="Masukan Nomor WO" readonly>
        <div class="col-md-3 mb-3">
            <span class="title-sm">Buyer</span>
            <input type="text" class="form-control border-input2 mt-1" id="buyer" name="buyer" value="{{$value->buyer}}" placeholder="Nama buyer" readonly>
        </div>
        <div class="col-md-3 mb-3">
            <span class="title-sm">Item</span>
            <input type="text" class="form-control border-input2 mt-1" id="item" name="item" value="{{$value->item}}" placeholder="item, item 2" readonly>
        </div>
        <div class="col-md-2 mb-4">
            <span class="title-sm">WO/PO</span>
            <div class="relative mt-1">
                <input type="text" class="form-control border-input2" id="wo" name="wo[]" value="{{$value->wo}}" placeholder="Masukan Nomor WO" readonly>
                <!-- <button type="submit" class="btn-blue-absolute"><i class="fs-20 fas fa-plus"></i></button> -->
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <span class="title-sm">Target</span>
            <input type="text" class="form-control border-input2 mt-1" id="target" name="target[]" value="{{$value->target}}" placeholder="Masukkan Target..." readonly>
        </div>
        <div class="col-md-2 mb-4">
            <span class="title-sm">Realisasi</span>
            <input type="number" class="form-control border-input2 mt-1" id="realisasi" name="realisasi[]" value="{{$value->realisasi}}" placeholder="Masukkan Realisasi..." readonly>
        </div>
    </div>
    @endforeach