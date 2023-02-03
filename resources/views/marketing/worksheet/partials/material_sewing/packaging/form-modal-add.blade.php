
<form action="{{ route('worksheet.packaging_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="packaging_add" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center mb-4">
                            <span class="ms-add-title">Packaging</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-sewing" for="inputGroupSelect01">
                                        Item
                                    </span>
                                </div>
                                <select class="custom-select select2bs_packing1" style="width:50%;" name="item">
                                    <option disabled selected>Example (Norwegian Tab)</option>
                                    @foreach($packing as $key => $value)
                                    <option value="{{$value->F4101_DSC1}}">{{$value->F4101_DSC1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-sewing" for="inputGroupSelect01">
                                        Detail
                                    </span>
                                </div>
                                <select class="custom-select select2bs_packing2" style="width:50%;" name="detail">
                                    <option disabled selected>Example (HT-09 Plastic Ring, Clear)</option>
                                    @foreach($packing as $key => $value)
                                    <option value="{{$value->F4101_DSC2}}">{{$value->F4101_DSC2}}</option>
                                    @endforeach
                                </select>
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