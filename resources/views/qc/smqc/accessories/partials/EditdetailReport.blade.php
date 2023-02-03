<!-- Modal -->
<div class="modal fade" id="EditDetail{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
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
                <form action="{{route('report_aksesoris.detail_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Acc ID  -->
                    <input type="hidden" name="id" id="id" value="{{$value->detail->id}}">
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
                                        <input type="radio" name="q_ci" id="detQC-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->q_ci == '1' ) ? "checked" : "" }}>
                                        <label for="detQC-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="detQC-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="q_ci" id="det-QC-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->q_ci == '0' ) ? "checked" : "" }}>
                                        <label for="det-QC-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="det-QC-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="q_dc" name="q_dc" value="{{$value->detail->q_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="q_od" name="q_od" value="{{$value->detail->q_od}}" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="q_remark" name="q_remark" value="{{$value->detail->q_remark}}" placeholder="Insert Remark">
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
                                        <input type="radio" name="c_ci" id="clr-det-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->c_ci == '1' ) ? "checked" : "" }}>
                                        <label for="clr-det-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="clr-det-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="c_ci" id="clr-det-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->c_ci == '0' ) ? "checked" : "" }}>
                                        <label for="clr-det-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="clr-det-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="c_dc" name="c_dc" value="{{$value->detail->c_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="c_od" name="c_od" value="{{$value->detail->c_od}}" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="c_remark" name="c_remark" value="{{$value->detail->c_remark}}" placeholder="Insert Remark">
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
                                        <input type="radio" name="s_ci" id="shp-det-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->s_ci == '1' ) ? "checked" : "" }}>
                                        <label for="shp-det-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="shp-det-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="s_ci" id="shp-det-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->s_ci == '0' ) ? "checked" : "" }}>
                                        <label for="shp-det-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="shp-det-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="s_dc" name="s_dc" value="{{$value->detail->s_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="s_od" name="s_od" value="{{$value->detail->s_od}}" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="s_remark" name="s_remark" value="{{$value->detail->s_remark}}" placeholder="Insert Remark">
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
                                        <input type="radio" name="a_ci" id="art-det-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->a_ci == '1' ) ? "checked" : "" }}>
                                        <label for="art-det-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="art-det-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="a_ci" id="art-det-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->a_ci == '0' ) ? "checked" : "" }}>
                                        <label for="art-det-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="art-det-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="a_dc" name="a_dc" value="{{$value->detail->a_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="a_od" name="a_od" value="{{$value->detail->a_od}}" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="a_remark" name="a_remark" value="{{$value->detail->a_remark}}" placeholder="Insert Remark">
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
                                        <input type="radio" name="f_ci" id="fun-det-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->f_ci == '1' ) ? "checked" : "" }}>
                                        <label for="fun-det-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="fun-det-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="f_ci" id="fun-det-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->f_ci == '0' ) ? "checked" : "" }}>
                                        <label for="fun-det-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="fun-det-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="f_dc" name="f_dc" value="{{$value->detail->f_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="f_od" name="f_od" value="{{$value->detail->f_od}}" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="f_remark" name="f_remark" value="{{$value->detail->f_remark}}" placeholder="Insert Remark">
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
                                        <input type="radio" name="d_ci" id="dmg-det-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->d_ci == '1' ) ? "checked" : "" }}>
                                        <label for="dmg-det-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="dmg-det-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="d_ci" id="dmg-det-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->d_ci == '0' ) ? "checked" : "" }}>
                                        <label for="dmg-det-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="dmg-det-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="d_dc" name="d_dc" value="{{$value->detail->d_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="d_od" name="d_od" value="{{$value->detail->d_od}}" placeholder="InsertNo. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="d_remark" name="d_remark" value="{{$value->detail->d_remark}}" placeholder="Insert Remark">
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
                                        <input type="radio" name="di_ci" id="dms-det-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->di_ci == '1' ) ? "checked" : "" }}>
                                        <label for="dms-det-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="dms-det-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="di_ci" id="dms-det-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->di_ci == '0' ) ? "checked" : "" }}>
                                        <label for="dms-det-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="dms-det-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="di_dc" name="di_dc" value="{{$value->detail->di_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="di_od" name="di_od" value="{{$value->detail->di_od}}" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="di_remark" name="di_remark" value="{{$value->detail->di_remark}}" placeholder="Insert Remark">
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
                                        <input type="radio" name="b_ci" id="bcd-det-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->b_ci == '1' ) ? "checked" : "" }}>
                                        <label for="bcd-det-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="bcd-det-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="b_ci" id="bcd-det-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->b_ci == '0' ) ? "checked" : "" }}>
                                        <label for="bcd-det-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="bcd-det-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="b_dc" name="b_dc" value="{{$value->detail->b_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="b_od" name="b_od" value="{{$value->detail->b_od}}" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="b_remark" name="b_remark" value="{{$value->detail->b_remark}}" placeholder="Insert Remark">
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
                                        <input type="radio" name="m_ci" id="mtl-det-Yes{{$value->id}}" value="1" class="radioCustomInput" {{ ($value->detail->m_ci == '1' ) ? "checked" : "" }}>
                                        <label for="mtl-det-Yes{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="mtl-det-Yes{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">Check</label>
                                </div>
                                <div class="justify-start">
                                    <div class="radioContainer">
                                        <input type="radio" name="m_ci" id="mtl-det-No{{$value->id}}" value="0" class="radioCustomInput" {{ ($value->detail->m_ci == '0' ) ? "checked" : "" }}>
                                        <label for="mtl-det-No{{$value->id}}" class="radioCustom"></label>
                                    </div>
                                    <label for="mtl-det-No{{$value->id}}" class="title-14 pointer ml-1" style="margin-top:6px">No</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Defect Comments</span>
                            <div class="field2 mt-2">
                                <input type="text" id="m_dc" name="m_dc" value="{{$value->detail->m_dc}}" placeholder="Insert Defect Comments">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">No. Of Defect</span>
                            <div class="field2 mt-2">
                                <input type="text" id="m_od" name="m_od" value="{{$value->detail->m_od}}" placeholder="Insert No. Of Defect">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3">
                            <span class="general-identity-title">Remark</span>
                            <div class="field2 mt-2">
                                <input type="text" id="m_remark" name="m_remark" value="{{$value->detail->m_remark}}" placeholder="Insert Remark">
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12 justify-end">
                            <button type="submit" class="btn btn-blue">Update<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>  
