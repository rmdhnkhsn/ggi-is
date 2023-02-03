<div class="cards3 p-4 mt-3">
    <div class="row p-4">
        <div class="col-md-5">
            <div class="justify-center pdt-5">
                <img src="{{url('images/iconpack/invoice/icon.svg')}}" class="imgInvoice">
            </div>
        </div>
        <div class="col-md-7"> 
            <div class="row pdx-5">
                <div class="col-12">
                    <div class="title-26"><span class="text-biru">#Step 1</span> Please SELECT BUYER, To<br/> choose an invoice format</div>
                </div>
            </div>
            <div class="row pdl-5 pdy-4 relative">
                <div class="borderInvoice"></div>
                <div class="col-md-4">
                    <input type="hidden" value="{{$data->kode_ekspedisi}}" id="kode_ekspedisinya">
                    <div class="radioFlatContainer"  onclick="testing('Agron')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="{{$buyer}}">
                        <label for="{{$buyer}}" class="options check">
                            <span class="radio-desc">{{$buyer}}</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>