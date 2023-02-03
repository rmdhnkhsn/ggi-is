<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form id="form_wo" action="{{route('accfin.costfactoryrpt.index')}}" method="get">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Filter Cost Factory Report</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3 mt-1">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Select Branch</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4 pointer" id="factory" name="factory">
                                <option value="" selected>All Factory</option>
                                @foreach($master_branch as $d)
                                    <option value="{{$d->kode_sewing}}">{{$d->nama_branch}}</option>  
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">OR</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-list-ol"></i></span>
                            </div>
                            <input type="text" class="form-control border-input-10" id="or_no" name="or_no" value="{{Request::get('or_no')}}" placeholder="Filter OR" style="height:38px">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">WO</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-list-ol"></i></span>
                            </div>
                            <input type="text" class="form-control border-input-10" id="wo_no" name="wo_no" value="{{Request::get('wo_no')}}" placeholder="Filter WO" style="height:38px">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Date Target From</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control border-input-10" id="dtfrom" name="dtfrom" value="{{Request::get('dtfrom')}}" style="height:38px">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Date Target To</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control border-input-10" id="dtto" name="dtto" value="{{Request::get('dtto')}}" style="height:38px">
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md btn-block">Filter <i class="fs-18 ml-2 fas fa-filter"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>