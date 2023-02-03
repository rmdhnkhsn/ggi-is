<div class="modal fade" id="create" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <form action="{{route('requestIR.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control borderInput" id="created_by" name="created_by" value="{{Auth::user()->nik}}">

        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Create Issue IR</div>
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
                            <input type="date" class="form-control borderInput" id="tr_date" name="tr_date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">G/L Date</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" id="gl_date" name="gl_date" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="title-sm">Item</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 select2bs4_item pointer" id="item_no" name="item_no" required>
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
                            <select class="form-control borderInput select2bs4 pointer" id="to_branch" name="to_branch" required>
                                <option selected disabled>Select Item</option>
                                @foreach($branch as $v)
                                    <option value="{{$v->kode_jde}}">{{$v->kode_jde}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Description</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="item_desc" name="item_desc" placeholder="Input Description" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="title-sm">New OR</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="new_or" name="new_or" placeholder="Input OR" required>
                    </div>
                    <div class="col-md-4">
                        <div class="title-sm">QTY</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="qty" name="qty" placeholder="Input Qty" required>
                    
                    </div><input type="hidden" name="uom" id="uom">
                    <div class="col-md-4">
                        <div class="title-sm">UOM</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                            </div>
                            <!-- <input type="text" value="" name="uom_need" id="text_uom_need"/> -->
                            <select class="form-control borderInput pointer" name="uom_need" id="uom_need" required>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <!-- <a href="" class="btn-blue-md w-100">Create</a> -->
                        <button type="submit" class="btn-blue-md w-100">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>