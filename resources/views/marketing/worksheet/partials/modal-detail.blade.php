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
                                <td width="50%" style="font-weight:600">Description 1</td>
                                <td width="50%" style="font-weight:400">{{$value->material1}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Description 2</td>
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
                        <div class="col-md-6">
                            <div class="title-sm">Description 1</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="material1" name="material1" value="{{$value->material1}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Description 2</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="material2" name="material2" value="{{$value->material2}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Colorway</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="colorway" name="colorway" placeholder="Example (NG)" value="{{$value->colorway}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Consumption</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="consumption" name="consumption" placeholder="Example (07S01 Black)" value="{{$value->consumption}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Color</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="color" name="color" placeholder="Example (07S01 Black)" value="{{$value->color}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Part</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="port" name="port" placeholder="Example (main fabric)" value="{{$value->port}}" required>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Cutting way</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="cutting_way" name="cutting_way" placeholder="Example (main fabric)" value="{{$value->cutting_way}}">
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Additional Description</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="description" name="description" placeholder="Description..." value="{{$value->description}}" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 justify-end">
                            <button type="submit" class="btn-blue-md">Save<i class="ml-3 fs-18 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</form>