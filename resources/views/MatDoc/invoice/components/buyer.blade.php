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
                @if ($data->buyer == 'AGRON, INC.')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Agron')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="agron">
                        <label for="agron" class="options check btnNext">
                            <span class="radio-desc">AGRON, INC.</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
                <div class="col-md-4">
                    <div class="radioFlatContainer" onclick="testing('Marubeni')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="marubeni" >
                        <label for="marubeni" class="options check btnNext">
                            <span class="radio-desc">MARUBENI</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'HEXAPOLE COMPANY LIMITED')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Hexapole')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="hexapole">
                        <label for="hexapole" class="options check btnNext">
                            <span class="radio-desc">HEXAPOLE</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Teijin')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="teijin">
                        <label for="teijin" class="options check btnNext">
                            <span class="radio-desc">TEIJIN</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'HONG KONG DESCENTE TRADING LTD.' || $data->buyer == 'FENIX LOGISTIC SERVICE LTD')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Hongkong')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="hongkong">
                        <label for="hongkong" class="options check btnNext">
                            <span class="radio-desc">HONGKONG</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Matsuoka')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="matsuoka">
                        <label for="matsuoka" class="options check btnNext">
                            <span class="radio-desc">MATSUOKA</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'PENTEX LTD' || $data->buyer == 'POSTIE PLUS GROUP LIMITED')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Pentex')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="pantex">
                        <label for="pantex" class="options check btnNext">
                            <span class="radio-desc">PANTEX, LTD</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'MARUSA Co.,Ltd.')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Marusa')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="marusa">
                        <label for="marusa" class="options check btnNext">
                            <span class="radio-desc">MARUSA</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'JIANGSU TEXTILE INDUSTRY')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Jiangsu')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="jiangsu">
                        <label for="jiangsu" class="options check btnNext">
                            <span class="radio-desc">JIANGSU</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'TOYOTA TSUSHO CORPORATION')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Toyota')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="toyota">
                        <label for="toyota" class="options check btnNext">
                            <span class="radio-desc">TOYOTA</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'YAMATO TRANSPORT (S) PTE LTD')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Benlux')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="benlux">
                        <label for="benlux" class="options check btnNext">
                            <span class="radio-desc">BENLUX</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'EXPRESS WORLD HEADQUARTERS')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Express')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="express">
                        <label for="express" class="options check btnNext">
                            <span class="radio-desc">EXPRESS WORLD</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'HAP., CO LTD')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('HAP')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="hap">
                        <label for="hap" class="options check btnNext">
                            <span class="radio-desc">HAP</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'JC PENNEY')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('JC Penney')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="jcp_penny">
                        <label for="jcp_penny" class="options check btnNext">
                            <span class="radio-desc">JCP PENNY</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'Ritra Cargo Holland B.V.')
                <div class="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Ritra Cargo')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="ritra_cargo">
                        <label for="ritra_cargo" class="options check btnNext">
                            <span class="radio-desc">RITRA CARGO</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
                @if ($data->buyer == 'ADRENALINE')
                <div lass="col-md-4">
                    <div class="radioFlatContainer"  onclick="testing('Adrenalin Lacrosse')">
                        <input type="radio" name="selectBuyer" value="" class="radioFlat" id="adrenaline">
                        <label for="adrenaline" class="options check btnNext">
                            <span class="radio-desc">ADRENALINE LAC</span>
                            <div class="notChecked"></div>
                            <i class="fas fa-check-circle"></i>
                        </label>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>