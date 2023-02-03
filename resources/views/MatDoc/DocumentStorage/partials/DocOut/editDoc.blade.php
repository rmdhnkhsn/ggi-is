<div class="modal fade" id="editDoc" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Edit Document</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
                <div class="col-12">
                    <section class="uploaded-area" id="inputFile">
                        <div class="row">
                            <div class="content upload">
                                <div class="containerIcon">
                                    <i class="fas fa-file-archive"></i>
                                </div>
                                <div class="details">
                                    <div class="name">loremXXX</div>
                                    <div class="size">2 mb</div>
                                </div>
                            </div>
                            <button class="removeDoc" onclick="remove()">
                                <i class="fas fa-times-circle"></i>
                            </button>
                        </div>
                    </section>
                </div>
                <div class="col-12 hide" id="removeHide">
                    <div class="title-sm">Re-upload your Document</div>
                    <div class="customFile mt-1 mb-3">
                        <input type="file" class="customFileInput" id="customFile" name="file" value="file">
                        <label class="customFileLabelsBlue" for="customFile">
                            <span class="chooseFile"></span>
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Select Category Document</div>
                    <div class="flexx gap-5 mt-1 mb-3">
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="category" value="" class="radioBlue" id="edit_in">
                            <label for="edit_in" class="optionBlue check">
                                <span class="descBlue">Document IN</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="category" value="" class="radioGreen" id="edit_out">
                            <label for="edit_out" class="optionGreen check">
                                <span class="descGreen">Document OUT</span>
                            </label>
                        </div>
                        <div class="wrapperRadio w-100 mt-1">
                            <input type="radio" name="category" value="" class="radioOrange" id="edit_other">
                            <label for="edit_other" class="optionOrange check">
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
                            <option name="BC41">BC41</option>    
                            <option name="BC25">BC25</option>    
                            <option name="BC30">BC30</option>    
                            <option name="BC33">BC33</option>    
                            <option name="BC261">BC261</option>    
                            <option name="BC27">BC27</option>    
                            <option name="BAP">BAP</option>    
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
                    <a href="" class="btn-blue-md" id="updateDoc">Save Document</a>
                </div>
            </div>
        </div>
    </div>
</div>