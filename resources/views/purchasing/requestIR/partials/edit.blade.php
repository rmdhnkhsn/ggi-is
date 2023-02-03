<div class="modal fade" id="frmedit" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <form action="{{route('requestIR.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control borderInput" id="edit_id" name="id" value="">

            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Update Issue IR</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Transaction Date</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" id="edit_tr_date" name="tr_date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">G/L Date</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" id="edit_gl_date" name="gl_date" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Item</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                            </div>
                            <select class="form-control select2bs4_item borderInput pointer" id="edit_item_number" name="item_no" required>
                                <option selected disabled>Select Item</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">To Branch/Plan</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                            </div>
                            <select class="form-control borderInput pointer" id="edit_to_branch" name="to_branch" required>
                                <option selected disabled>Select Item</option>
                                @foreach($branch as $v)
                                    @php
                                        $branch=str_replace(' ', '', $v->kode_jde);
                                    @endphp
                                    <option value="{{$branch}}">{{$branch}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Description</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="edit_item_desc" name="item_desc" placeholder="Input Description" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="title-sm">New OR</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="edit_new_or" name="new_or" placeholder="Input OR" required>
                    </div>
                    <div class="col-md-4">
                        <div class="title-sm">QTY</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="edit_qty" name="qty" placeholder="Input Qty" required>
                    </div>
                    <div class="col-md-4">
                        <div class="title-sm">UOM</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                            </div>
                            <input type="hidden" value="" name="uom" id="edit_uom"/>
                            <input type="hidden" value="" name="uom_need" id="text_edit_uom_need"/>
                            <select class="form-control borderInput pointer" id="edit_uom_need" required>
                                <option selected>Select UOM</option>
                                @foreach($masterunit as $d)
                                    @php
                                    $unit=str_replace(' ', '', $d->F0005_KY);
                                    @endphp
                                    <option value="{{$unit}}">{{$unit}}</option>    
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="title-sm">UOM</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="edit_uom2" name="uom" required>
                                <option selected disabled>Select UOM</option>
                                <option value="coba">coba</option>   

                            </select>
                        </div>
                    </div> -->
                    <div class="col-12 mt-3">
                        <!-- <a href="" class="btn-blue-md w-100">Save & Update</a> -->
                        <button type="submit" class="btn-blue-md w-100">Save & Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>