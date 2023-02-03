<!-- Modal -->
<div class="modal fade" id="addDetail{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:1000px;">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <form action="{{route('report_aksesoris.detail_store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Acc ID  -->
                    <input type="hidden" name="acc_id" id="acc_id" value="{{$value->id}}">
                    <!-- End  -->
                    <!-- 1. Quality  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">1. QUALITY</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="q_ci" id="QC-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="QC-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="QC-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="q_ci" id="QC-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="QC-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="QC-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="q_dc" name="q_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="q_od" name="q_od" value="" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="q_remark" name="q_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    <!-- 2 Color  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">2. COLOR</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="c_ci" id="clr-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="clr-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="clr-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="c_ci" id="clr-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="clr-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="clr-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="c_dc" name="c_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="c_od" name="c_od" value="" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="c_remark" name="c_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    <!-- 3. Shape  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">3. SHAPE</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="s_ci" id="shp-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="shp-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="shp-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="s_ci" id="shp-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="shp-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="shp-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="s_dc" name="s_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="s_od" name="s_od" value="" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="s_remark" name="s_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    <!-- 4. Artwork  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">4. ARTWORK</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="a_ci" id="art-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="art-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="art-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="a_ci" id="art-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="art-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="art-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="a_dc" name="a_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="a_od" name="a_od" value="" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="a_remark" name="a_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    <!-- 5. FUNCTIONAL  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">5. FUNCTIONAL</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="f_ci" id="FUN-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="FUN-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="FUN-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="f_ci" id="FUN-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="FUN-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="FUN-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="f_dc" name="f_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="f_od" name="f_od" value="" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="f_remark" name="f_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    <!-- 6. DAMAGE  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">6. DAMAGE</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="d_ci" id="DMG-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="DMG-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="DMG-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="d_ci" id="DMG-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="DMG-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="DMG-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="d_dc" name="d_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="d_od" name="d_od" value="" placeholder="InsertNo. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="d_remark" name="d_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    <!-- 7. DIMENSI  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">7. DIMENSI</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="di_ci" id="DMS-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="DMS-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="DMS-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="di_ci" id="DMS-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="DMS-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="DMS-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="di_dc" name="di_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="di_od" name="di_od" value="" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="di_remark" name="di_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->

                    <!-- 8. BARCODE  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">8. BARCODE</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="b_ci" id="BCD-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="BCD-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="BCD-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="b_ci" id="BCD-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="BCD-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="BCD-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="b_dc" name="b_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="b_od" name="b_od" value="" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="b_remark" name="b_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->
                    
                    <!-- 9. METAL DETECTOR  -->
                    <div class="row" style="text-align:left;">
                        <div class="col-12 mt-3">
                            <span class="title-16">9. METAL DETECTOR</span>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Check Item</span>
                            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="m_ci" id="MTL-Yes{{$value->id}}" value="1" class="radioCustomInput">
                                        <label for="MTL-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="MTL-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="m_ci" id="MTL-No{{$value->id}}" value="0" class="radioCustomInput">
                                        <label for="MTL-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="MTL-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="m_dc" name="m_dc" value="" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="m_od" name="m_od" value="" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="m_remark" name="m_remark" value="" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <!-- End  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="fileUploads mt-1">
                                <div class="imageUploadWrap">
                                    <i class="iconUpload fas fa-upload"></i>
                                    <button class="d-none" type="button" id="images"
                                        onclick="$('.fileUploadInput').trigger('click')">Select Image</button>
                                    <input class="fileUploadInput" type='file' id="images" name="file"
                                        onchange="readURL(this);" accept="image/*" />
                                    <div class="dragText">
                                        <span>upload your file,<br/> or drop here</span>
                                    </div>
                                </div>
                                <div class="fileUploadContent">
                                    <img class="fileUploadImg" src="" alt="Image Format Only" data-toggle="lightbox" />
                                    <button type="button" onclick="removeUpload()" class="removeImage">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12 justify-end">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>  
