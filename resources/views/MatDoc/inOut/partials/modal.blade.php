<div class="modal fade" id="buatPengeluaran" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('in-out.barang')}}" method="get" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Filter</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">In Hand</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-stream"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="filter_in_hand" name="in_hand">
                            <option disabled selected>Choose One</option>
                                <option value="Mekanik">Mekanik</option>
                                <option value="Gudang">Gudang</option>
                                <option value="Ekspedisi">Ekspedisi</option>
                                <option value="Dokumen">Dokumen</option>
                                <option value="Finish">Finish</option>
                                <option value="UnFinish">UnFinish</option>
                                <option value="All">All</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Branch</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="filter_from_branchdetail" name="from_branchdetail">
                                <option disabled selected>Choose One</option>
                                @foreach($branch as $key => $value)
                                <option value="{{$value->branchdetail}}">{{$value->branchdetail}}</option>
                                @endforeach
                                <option value="All">All</option> 
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <div class="title-sm">Date BPB</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" id="filter_tanggal_trans" name="tanggal_trans">
                        </div>
                    </div>
                    <div class="col-12" style="padding-top:20px;">
                        <button type="submit" class="btn-blue-md btn-block">Kirim<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
