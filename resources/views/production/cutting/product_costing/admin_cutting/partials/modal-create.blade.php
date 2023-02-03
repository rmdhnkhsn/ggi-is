<!-- Modal Gelaran WO  -->
<form action="{{ route('cutting.gelaran_wo')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="add_gelaran" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 py-3 px-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-12 mb-3">
                        <div class="wp-modal-title">Tambahkan WO</div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <span class="title-sm">WO Number</span>
                        <div class="input-group mb-3 mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-select" for="F0101_ALPH">WO</span>
                            </div>
                            <input type="hidden" name="form_id" id="form_id" value="{{$form_id}}">
                            <select class="form-control input-data-fa data_ppic select2bs4" id="no_wo" name="no_wo" required="required">
                                <option selected></option>
                                @foreach($wo as $key => $value)
                                <option value="{{$value->no_wo}}">{{$value->no_wo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <span class="title-sm">Style</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="hidden" class="form-control border-input" id="beli" name="buyer" placeholder="Style..." required>
                            <input type="text" class="form-control border-input" id="gaya" name="style" placeholder="Style..." required>
                            <input type="hidden" class="form-control border-input" id="style_number" name="number_style" placeholder="Style..." required>
                            <input type="hidden" class="form-control border-input" id="fabric" name="factory" placeholder="Style...">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <span class="title-sm">Select Color</span>
                        <div class="input-group mb-3 mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-select" for="F0101_ALPH">Color</span>
                            </div>
                            <select class="form-control input-data-fa" id="color" name="color" required="required">
                                <option selected></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-lg-6">
                        <span class="title-sm">BODY/INT</span>
                        <div class="input-group mb-3 mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-select" for="F0101_ALPH">Part</span>
                            </div>
                            <select class="form-control input-data-fa" id="part" name="part">
                                <option selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <span class="title-sm">Pemakaian Kain</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control border-input" id="pemakaian_kain" name="pemakaian_kain" placeholder="Style..." required>
                        </div>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-12">
                        <span class="title-sm">Qty Breakdown</span>
                    </div>
                </div>
                <div class="row px-4" id="qty_breakdown">
                </div>
                <div class="row p-4">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn ctg-buatForm">Save<i class="wp-icon-btn fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Gelaran WO  -->
<!-- Modal Pemakaian Kain  -->
<div class="modal fade" id="add_gelaran2" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row px-4">
                <div class="col-12 mb-3">
                    <div class="wp-modal-title">Tambah Kain</div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Color</span>
                    <div class="input-group mb-3 mt-2">
                        <input type="text" class="form-control border-input" id="" name="" placeholder="Input Color..." required>
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Qty</span>
                    <div class="input-group mb-3 mt-2">
                        <input type="text" class="form-control border-input" id="" name="" placeholder="Input Qty..." required>
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Consumption</span>
                    <div class="input-group mb-3 mt-2">
                        <input type="text" class="form-control border-input" id="" name="" placeholder="Input Consumption..." required>
                    </div>
                </div>
            </div>
            <div class="row p-4">
                <div class="col-12 text-right">
                    <a href="" class="btn ctg-buatForm">Save<i class="wp-icon-btn fas fa-download"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pemakaian Kain  -->

