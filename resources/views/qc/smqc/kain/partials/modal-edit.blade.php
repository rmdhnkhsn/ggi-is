<!-- Modal -->
<div class="modal fade" id="ReportFabric{{$row->id}}" role="dialog" aria-labelledby="myModalLabel">
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
                <form action="{{route('fabric.report_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="{{$row->id}}">
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Arrival Date</span>
                            <div class="field2 mt-2">
                                <input type="date" id="date" name="date" value="{{$row->date}}" placeholder="Insert Date">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="title-sm">Supplier</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Supplier</span>
                                </div>
                                <select class="form-control" name="supplier" id="supplier" required>
                                    <option selected></option>
                                    @foreach($supplier as $q)
                                        <option {{ $row->supplier == $q->name ? 'selected' : ''}} value="{{  $q->name }}">{{ $q->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="title-sm">Buyer</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Buyer</span>
                                </div>
                                <select class="form-control" name="buyer_id" id="buyer_id" required>
                                    <option selected></option>
                                    @foreach($buyer as $q)
                                        <option {{ $row->buyer_id == $q->id ? 'selected' : ''}} value="{{  $q->id }}">{{ $q->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="title-sm">Standar</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Standar</span>
                                </div>
                                <select class="form-control" name="standar_id" id="standar_id" required>
                                    <option selected></option>
                                    @foreach($standar as $q)
                                        <option {{ $row->standar_id == $q->id ? 'selected' : ''}} value="{{  $q->id }}">{{ $q->width }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Color</span>
                            <div class="field2 mt-2">
                                <input type="text" id="color" name="color" value="{{$row->color}}" placeholder="Insert Color">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Style</span>
                            <div class="field2 mt-2">
                                <input type="text" id="style" name="style" value="{{$row->style}}" placeholder="Insert Style">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 mt-3">
                            <span class="general-identity-title">Inspector</span>
                            <div class="field2 mt-2">
                                <input type="text" id="inspector" name="inspector" value="{{$row->inspector}}" placeholder="Insert Inspector">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="branch" id="branch" value="{{$row->branch}}">
                    <input type="hidden" name="branchdetail" id="branchdetail" value="{{$row->branchdetail}}">
                    <div class="col-lg-12 justify-end">
                        <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>  
