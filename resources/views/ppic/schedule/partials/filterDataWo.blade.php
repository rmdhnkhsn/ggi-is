<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:550px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Filter</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Branch</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                        </div>
                        <select class="form-control borderInput select2Branch pointer" id="branch_id" name="branch_id" required>
                            <option selected disabled>Select Branch</option>
                            @foreach ($branch as $d)
                                <option value="{{$d->branch_id}}" {{Request::get('branch_id')==$d->branch_id ? 'selected':''}}>{{$d->sub}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Line</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-project-diagram"></i></span>
                        </div>
                        <select class="form-control borderInput select2Line pointer" id="production_line_id" name="production_line_id" required>
                            <option selected disabled>Select Line</option>
                            @foreach ($prodline as $d)
                                <option value="{{$d->id}}" {{Request::get('production_line_id')==$d->id ? 'selected':''}}>{{$d->sub}} - {{$d->line}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">WO</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-list-ol"></i></span>
                        </div>
                        <input type="text" class="form-control borderInput" id="wo_no" name="wo_no" value="{{Request::get('wo_no')}}" placeholder="Input WO">
                    </div>
                </div>
                <div class="col-6">
                    <div class="title-sm">Start From</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="target_date_from" name="target_date_from" value="{{Request::get('target_date_from')}}" placeholder="From Date">
                    </div>
                    <div class="checkAll mt-3">
                        <input type="checkbox" id="check_all_data" name="check_all_data" class="check1 check_all_data">
                        <label for="check_all_data" class="title-14">All Data</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="title-sm">Start To</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="target_date_to" name="target_date_to" value="{{Request::get('target_date_to')}}" placeholder="To Date">
                    </div>
                </div>
                
                <div class="col-12 mt-3">
                    <button type="submit" class="btn-blue-md btn-block">Filter <i class="fs-20 ml-3 fas fa-filter"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>