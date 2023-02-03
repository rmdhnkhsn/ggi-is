
<form action="{{ route('worksheet.sewing_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="add_sewing_thread" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
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
                        <div class="col-12 text-center mb-4">
                            <span class="ms-add-title">Sewing - Thread</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <span class="general-identity-title">Material 1 (Decription1)</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-sewing" for="inputGroupSelect01">
                                        <i class="fas fa-tshirt fs-17 mr-3"></i>
                                        Part
                                    </span>
                                </div>
                                <select class="custom-select select2bs_sewing1" style="width:50%;" name="material1">
                                    <option disabled selected>Example (Polyester100%)</option>
                                    @foreach($sewing as $key => $value)
                                    <option value="{{$value->F4101_DSC1}}">{{$value->F4101_DSC1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <span class="general-identity-title">Material 2 (Decription1)</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-sewing" for="inputGroupSelect01">
                                        <i class="fas fa-tshirt fs-17 mr-3"></i>
                                        Part
                                    </span>
                                </div>
                                <select class="custom-select select2bs_sewing2" style="width:50%;" name="material2">
                                    <option disabled selected>Example (S4555W)</option>
                                    @foreach($sewing as $key => $value)
                                    <option value="{{$value->F4101_DSC2}}">{{$value->F4101_DSC2}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <span class="general-identity-title">Colorway</span>
                            <div class="field mt-2">
                                <input type="text" id="colorway" name="colorway" placeholder="Example (NG)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span class="general-identity-title">Part</span>
                            <div class="field mt-2">
                                <input type="text" id="port" name="port" placeholder="Example (main fabric)">
                            </div>
                        </div>
                        <div class="col-6">
                            <span class="general-identity-title">Color</span>
                            <div class="field mt-2">
                                <input type="text" id="color" name="color" placeholder="Example (07S01 Black)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span class="general-identity-title">Consumption</span>
                            <div class="field mt-2">
                                <input type="hidden" id="master_id" name="master_id" value="{{$master_data->id}}">
                                <input type="text" id="consumption" name="consumption" placeholder="Example (07S01 Black)">
                            </div>
                        </div>
                        <div class="col-6">
                            <span class="general-identity-title">Additional Description</span>
                            <div class="field mt-2">
                                <input type="text" id="description" name="description" placeholder="Description...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn ws-btn-save">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>