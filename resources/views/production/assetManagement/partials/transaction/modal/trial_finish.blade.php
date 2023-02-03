<div class="modal fade" id="trialFinish" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:740px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-20">Transaction Out</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-4">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12 mb-1">
                    <div class="title-sm">Transaction Category</div>
                </div>
                <div class="col-md-4">
                    <div class="wrapperRadio mb-3">
                        <input type="radio" name="category" value="1" class="radioBlue" id="sale2">
                        <label for="sale2" class="optionBlue check">
                            <span class="descBlue">Sale</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wrapperRadio mb-3">
                        <input type="radio" name="category" value="1" class="radioGreen" id="rental2">
                        <label for="rental2" class="optionGreen check">
                            <span class="descGreen">Rental Finished</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wrapperRadio mb-3">
                        <input type="radio" name="category" value="0" class="radioOrange" id="trial2">
                        <label for="trial2" class="optionOrange check">
                            <span class="descOrange">Trial Finished</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Supplier</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                        </div>
                        <select class="form-control border-input-10 pointer h-38 select2bs4" id="" name="">
                            <option selected disabled>Supplier name</option>
                            <option name="lorem">lorem</option>  
                            <option name="lorem">lorem</option>  
                            <option name="lorem">lorem</option>  
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control border-input-10 h-38" id="" name="">
                    </div>
                </div>

                <div class="col-12 mt-2 mb-4">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12 justify-sb mb-3">
                    <div class="title-18">Item List</div>
                    <button id="addRowTrial" type="button" class="btn-blue-md">Add<i class="fs-18 ml-2 fas fa-plus"></i> </button>
                </div>
                <div class="noItem" id="noItem3">
                    <img src="{{url('images/iconpack/asset_management/no-item.svg')}}">
                </div>
            </div>
            <div id="newRowTrial"></div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="" class="btn-outline-merah-md btn-block" data-dismiss="modal" aria-label="Close">Cancel<img src="{{url('images/iconpack/feedback/cancel.svg')}}" class="ml-2"></a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn-blue-md btn-block"> Save <i class="fs-18 ml-3 fas fa-download"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>