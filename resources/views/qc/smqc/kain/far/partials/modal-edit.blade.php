<!-- Modal -->
<div class="modal fade" id="EditFAR{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
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
                <form action="{{route('far.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="id" class="span10" name="id" value="{{ $value->id }}">
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Roll no</span>
                            <div class="field2 mt-2">
                                <input type="text" id="roll_no" name="roll_no" value="{{ $value->roll_no }}" placeholder="Insert Roll No">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Number Roll</span>
                            <div class="field2 mt-2">
                                <input type="text" id="number" name="number" value="{{ $value->number }}" placeholder="Insert Roll Number">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">LOT</span>
                            <div class="field2 mt-2">
                                <input type="text" id="lot" name="lot" value="{{ $value->lot }}" placeholder="Insert Number LOT">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Actual Width (Start)</span>
                            <div class="field2 mt-2">
                                <input type="text" id="ac_beg" name="ac_beg" value="{{ $value->ac_beg }}" placeholder="Insert Actual Width (Start)" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Actual Width (Mid)</span>
                            <div class="field2 mt-2">
                                <input type="text" id="ac_mid" name="ac_mid" value="{{ $value->ac_mid }}" placeholder="Insert Actual Width (Mid)" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Actual Width (End)</span>
                            <div class="field2 mt-2">
                                <input type="text" id="ac_end" name="ac_end" value="{{ $value->ac_end }}" placeholder="Insert Actual Width (End)" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">On Roll</span>
                            <div class="field2 mt-2">
                                <input type="text" id="on_roll" name="on_roll" value="{{ $value->on_roll }}" placeholder="Insert On Roll" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Actual</span>
                            <div class="field2 mt-2">
                                <input type="text" id="actual" name="actual" value="{{ $value->actual }}" placeholder="Insert Actual" required>
                            </div>
                        </div>
                        <div class="col-lg-12 justify-end" style="padding-top:20px;">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>  
