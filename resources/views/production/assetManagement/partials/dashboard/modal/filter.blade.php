
<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.dashboard.index')}}" method="get" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Filter Data</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Company</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-building"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 livesearch" id="filter_company" name="coorigin">
                                <option value="" selected>Select Company</option>
                                @foreach($dataCompany as $d)
                                    <option value="{{$d->Code}}">{{$d->Code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Branch</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sitemap"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="filter_branch" name="brlokasi">
                                <option value="" selected>Select Branch</option> 
                                @foreach($dataBranch as $d)
                                    <option value="{{$d->branch_code}}">{{$d->branch_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Type</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-text-height"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="filter_tipe" name="tipe">
                                <option value="" selected>Select Type</option>
                                @foreach ($dataType as $d)
                                    <option name="tipe" value="{{$d->tipe}}">{{$d->tipe}}</option>  
                                @endforeach   
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-project-diagram"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="filter_jenis" name="jenis">
                                <option value="" selected>Select Category</option>
                                @foreach ($dataCategory as $d)
                                <option value="{{$d->jenis}}">{{$d->jenis}}</option>  
                                @endforeach     
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" id="save" class="btn-blue-md btn-block">Filter Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>