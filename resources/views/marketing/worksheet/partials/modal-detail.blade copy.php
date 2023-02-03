<!-- Modal -->
<div class="modal fade" id="details_inac-{{$value->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <div class="col-12">
                        <table class="table table-bordered text-left">
                            <tr>
                                <td width="50%" style="font-weight:600">Part</td>
                                <td width="50%" style="font-weight:400" id="part2">{{$value->port}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Color</td>
                                <td width="50%" style="font-weight:400">{{$value->color}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Material 1 (Description 1)</td>
                                <td width="50%" style="font-weight:400">{{$value->material1}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Material 2 (Description 2)</td>
                                <td width="50%" style="font-weight:400">{{$value->material2}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Color Way</td>
                                <td width="50%" style="font-weight:400">{{$value->colorway}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Cutting Way</td>
                                <td width="50%" style="font-weight:400">{{$value->cutting_way}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Consumption</td>
                                <td width="50%" style="font-weight:400">{{$value->consumption}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Additional Description</td>
                                <td width="50%" style="font-weight:400">{{$value->description}}</td>
                            </tr>
                        </table>
                    </div>  
                </div> 
            </div>
        </div>
    </div>
</div>

<form action="{{ route('material_fabric.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$value->id}}">
    <input type="hidden" name="master_id" id="master_id" value="{{$value->master_id}}">
    <div class="modal fade" id="edit_detail-{{$value->id }}" role="dialog" aria-labelledby="myModalLabel" style="text-align:left;">
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
                            <span class="ms-add-title">Material Fabric</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <span class="general-identity-title">Material 1 (Decription1)</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-sewing" for="inputGroupSelect01">
                                        <i class="fas fa-tshirt fs-17 mr-3"></i>
                                        Part
                                    </span>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="material1">
                                    <option disabled selected>Example (Polyester100%)</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <span class="general-identity-title">Material 2 (Decription1)</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-sewing" for="inputGroupSelect02">
                                        <i class="fas fa-tshirt fs-17 mr-3"></i>
                                        Part
                                    </span>
                                </div>
                                <select class="custom-select" id="inputGroupSelect02" name="material2">
                                    <option disabled selected>Example (S4555W)</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span class="general-identity-title">Colorway</span>
                            <div class="field mt-2">
                                <input type="text" id="colorway" name="colorway" placeholder="Example (NG)" value="{{$value->colorway}}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <span class="general-identity-title">Cutting way</span>
                            <div class="field mt-2">
                                <input type="text" id="cutting_way" name="cutting_way" placeholder="Example (main fabric)" value="{{$value->cutting_way}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span class="general-identity-title">Part</span>
                            <div class="field mt-2">
                                <input type="text" id="port" name="port" placeholder="Example (main fabric)" value="{{$value->port}}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <span class="general-identity-title">Color</span>
                            <div class="field mt-2">
                                <input type="text" id="color" name="color" placeholder="Example (07S01 Black)" value="{{$value->color}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span class="general-identity-title">Consumption</span>
                            <div class="field mt-2">
                                <input type="text" id="consumption" name="consumption" placeholder="Example (07S01 Black)" value="{{$value->consumption}}"  required>
                            </div>
                        </div>
                        <div class="col-6">
                            <span class="general-identity-title">Additional Description</span>
                            <div class="field mt-2">
                                <input type="text" id="description" name="description" placeholder="Description..." value="{{$value->description}}"  required>
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