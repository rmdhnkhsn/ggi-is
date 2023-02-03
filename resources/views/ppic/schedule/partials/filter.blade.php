<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{route('ppic.schedule.index')}}" method="get" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Filter WO</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">View Schedule</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" name="view_schedule" id="view_schedule">
                                <option value="oneline" selected>One Line</option>
                                <option value="detail">Detail</option>  
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">View By</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tshirt"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" name="view_mode" id="view_mode">
                                <option value="wo">WO</option>
                                <option value="buyer">Buyer</option>
                                <option value="style">Style</option>
                                <option value="ornumber">OR Number</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">View Line</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tshirt"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" name="view_line" id="view_line">
                                <option value="2021">All</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Branch</div>
                        <div class="mt-1 mb-3">
                            <select class="form-control borderInput pointer" name="branch_id[]" id="filter_branch" multiple="true" >
                                <option value="0" selected>All Branch</option>
                                @foreach($master_branch as $d)
                                    <option value="{{$d->id}}">{{$d->nama_branch}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">WO Number</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="filter_wo" name="wo_no" value="{{$filter_wo}}" placeholder="Search WO Number">
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn-blue-md btn-block">Filter <i class="fs-18 ml-3 fas fa-filter"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>