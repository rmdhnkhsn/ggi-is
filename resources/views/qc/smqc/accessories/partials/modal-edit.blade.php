<!-- Modal Edit Report Biasa -->
<div class="modal fade" id="ReportBiasaEdit{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
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
                        <span class="title-18">Edit Report Biasa</span>
                    </div>
                </div>
                <form action="{{route('report_aksesoris.update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$value->id}}">
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Supplier</span>
                            <div class="field2 mt-2">
                                <input type="text" id="supplier" name="supplier" value="{{$value->supplier}}" placeholder="Insert supplier">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">PO</span>
                            <div class="field2 mt-2">
                                <input type="text" id="po" name="po" value="{{$value->po}}" placeholder="Insert PO">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Item</span>
                            <div class="field2 mt-2">
                                <input type="text" id="item" name="item" value="{{$value->item}}" placeholder="Insert Item">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="title-sm">Purchasing Name</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Purchasing</span>
                                </div>
                                <select class="form-control" name="buyer" id="buyer">
                                    @foreach($prc as $key2 => $value2)
                                    <option {{ strtoupper($value->buyer) == $value2->nama ? 'selected' : ''}} value="{{  $value2->nama }}">{{ $value2->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="title-sm">Standar</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Standar</span>
                                </div>
                                <select class="form-control" name="standar_id" id="standar_id">
                                    <option selected></option>
                                    @foreach($standar as $key3 => $value3)
                                    <option {{ $value->standar_id == $value3->id ? 'selected' : ''}} value="{{  $value3->id }}">{{$value3->from}}-{{$value3->to}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Date</span>
                            <div class="field2 mt-2">
                                <input type="date" id="date" name="date" value="{{$value->date}}" placeholder="Insert Date">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Order Quantity</span>
                            <div class="field2 mt-2">
                                <input type="text" id="order_quan" name="order_quan" value="{{$value->order_quan}}" placeholder="Insert Order Quantity">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">QTY Reject</span>
                            <div class="field2 mt-2">
                                <input type="text" id="qty_reject" name="qty_reject" value="{{$value->qty_reject}}" placeholder="Insert QTY Reject">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Inspector</span>
                            <div class="field2 mt-2">
                                <input type="text" id="inspector" name="inspector" placeholder="Insert Inspector" value="{{$value->inspector}}">
                            </div>
                        </div>
                        <input type="hidden" name="branch" id="branch" value="{{$value->branch}}">
                        <input type="hidden" name="branchdetail" id="branchdetail" value="{{$value->branchdetail}}">
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