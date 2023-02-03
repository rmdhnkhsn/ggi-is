<!-- Modal -->
<div class="modal fade" id="packaging_detail-{{$value->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                <td width="50%" style="font-weight:600">Item</td>
                                <td width="50%" style="font-weight:400" id="part2">{{$value->item}}</td>
                            </tr>
                            <tr>
                                <td width="50%" style="font-weight:600">Detail</td>
                                <td width="50%" style="font-weight:400">{{$value->detail}}</td>
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

<form action="{{ route('worksheet.packaging_update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$value->id}}">
    <input type="hidden" name="master_id" id="master_id" value="{{$value->master_id}}">
    <div class="modal fade" id="packaging_edit-{{$value->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align:left;">
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
                            <div class="title-sm">Item</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="item" name="item" value="{{$value->item}}" placeholder="Example (Norwegian Tab)" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Detail</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="detail" name="detail" value="{{$value->detail}}" placeholder="Example (HT-09 Plastic Ring, Clear)" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Consumption</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="consumption" name="consumption" value="{{$value->consumption}}" placeholder="Example (07S01 Black)" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm">Additional Description</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="description" name="description" value="{{$value->description}}" placeholder="Description...">
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