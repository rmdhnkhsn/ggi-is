<div class="modal fade" id="uploadDoc" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Upload Document</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
                <div class="col-12">
                    <section class="progress-area"></section>
                    <section class="uploaded-area"></section>
                </div>
                <div class="col-12">
                    <div class="title-sm">Select Category Document</div>
                    <div class="flexx gap-5 mt-1 mb-3">
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="category" value="" class="radioBlue" id="in">
                            <label for="in" class="optionBlue check">
                                <span class="descBlue">Document IN</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="category" value="" class="radioGreen" id="out">
                            <label for="out" class="optionGreen check">
                                <span class="descGreen">Document OUT</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="category" value="" class="radioOrange" id="other">
                            <label for="other" class="optionOrange check">
                                <span class="descOrange">Document Other</span>
                            </label>
                        </div>
                    </div>  
                </div>
                <div class="col-12">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" name="" id="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Type</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                            <option selected disabled>Select Type</option>
                            <option name="Berita Acara">Berita Acara</option>    
                            <option name="Pembatalan dan Perubahan Data">Pembatalan dan Perubahan Data</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Contract Number</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down-alt"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" name="" id="" placeholder="Input contract Number">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <a href="" class="btn-blue-md" id="saveDoc">Save Document</a>
                </div>
            </div>
        </div>
    </div>
</div>