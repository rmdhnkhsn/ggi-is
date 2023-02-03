<div class="row">
    <div class="col-12 mb-2">
        <div class="title-16-blue">Lembur Kualitatif</div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="title-sm mb-2">Buyer</div>
        <select class="form-control border-input2 select2bs4" id="buyer2" name="buyer2[]" style="cursor:pointer">
            <option value="" selected>Pilih Buyer</option>
            <option value="ALL BUYER" >ALL BUYER</option>
            @foreach($ListBuyer as $key => $value)
                <option name="buyer2" value="{{$value['text']}}">{{$value['text']}}</option>    
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <span class="title-sm">Target</span>
        <input type="text" class="form-control border-input2 mt-1" id="target2" name="target2[]" placeholder="Masukkan Target...">
    </div>

    <div class="col-12">
        <div id="accordion">
            <div class="cards">
                <div class="card-header accordion-header2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                    <i class="accord-icon fas fa-edit"></i>
                    <div class="accordion-title">Tambahkan Alasan</div>
                    <span class="ml-auto text-danger fw-bold">Wajib Di isi</span>
                    <i class="fas fa-times-circle ml-2 checkalasan" style="color :#FB5B5B"></i>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="cards accordion-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <span class="title-sm">Alasan 1</span>
                                <input type="text" class="form-control border-input2 mt-1 alasanhi" id="what" name="alasan1[]" placeholder="Masukkan alasan...">
                            </div>
                        
                            <div class="col-md-12 mb-3">
                                <span class="title-sm">Alasan 2</span>
                                <input type="text" class="form-control border-input2 mt-1" id="who" name="alasan2[]" placeholder="Masukkan alasan...">
                            </div>
                        
                            <div class="col-md-12 mb-3">
                                <span class="title-sm">Alasan 3</span>
                                <input type="text" class="form-control border-input2 mt-1" id="why" name="alasan3[]" placeholder="Masukkan alasan...">
                            </div>
                        
                            <div class="col-md-12 mb-3">
                                <span class="title-sm">Alasan 4</span>
                                <input type="text" class="form-control border-input2 mt-1" id="when" name="alasan4[]" placeholder="Masukkan alasan...">
                            </div>
                        
                            <div class="col-md-12 mb-3">
                                <span class="title-sm">Alasan 5</span>
                                <input type="text" class="form-control border-input2 mt-1" id="where" name="alasan5[]" placeholder="Masukkan alasan...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="newRowKualitatif"></div>
<div class="row">
    <div class="col-12 flex mb-3" style="gap:.8rem !important">
        <button id="addRowKualitatif" type="button" class="btn-blue" >Tambah Buyer <i class="fs-18 ml-3 fas fa-plus"></i> </button>
    </div>
</div>