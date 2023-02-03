<!-- Modal -->
<div class="modal fade" id="inac" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:900px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="title-18">Create Report</span>
                    </div>
                </div>
                <!-- Report Biasa  -->
                <form action="{{route('far.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="report_id" class="span10" name="report_id" value="{{ $data->id }}">
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Roll no</span>
                            <div class="field2 mt-2">
                                <input type="text" id="roll_no" name="roll_no" value="" placeholder="Insert Roll No">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Number Roll</span>
                            <div class="field2 mt-2">
                                <input type="text" id="number" name="number" value="" placeholder="Insert Roll Number">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">LOT</span>
                            <div class="field2 mt-2">
                                <input type="text" id="lot" name="lot" value="" placeholder="Insert Number LOT">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Actual Width (Start)</span>
                            <div class="field2 mt-2">
                                <input type="text" id="ac_beg" name="ac_beg" value="" placeholder="Insert Actual Width (Start)" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">On Roll</span>
                            <div class="field2 mt-2">
                                <input type="text" id="on_roll" name="on_roll" value="" placeholder="Insert On Roll" required>
                            </div>
                        </div>
                        <div class="col-lg-12 justify-end" style="padding-top:20px;">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                        <input type="hidden" id="tot" class="span10" name="tot" value="0">
                        <input type="hidden" id="adj" class="span10" name="adj" value="0">
                        <input type="hidden" id="acc" class="span10" name="acc">
                        <input type="hidden" id="reject" class="span10" name="reject" >
                        <input type="hidden" id="remark" class="span10" name="remark">
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div>  
