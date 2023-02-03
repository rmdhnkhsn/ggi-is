<div class="modal fade" id="buatPengeluaran" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('contractwo.index')}}" method="get" enctype="multipart/form-data">
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
                        <span class="general-identity-title">Contract.No</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control" name="contract" id="contract">
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="general-identity-title">WO.No</span>
                        <div class="input-group mb-3 mt-2">
                            <input type="text" class="form-control" name="wo" id="wo">
                        </div>
                    </div>
                    <!-- <div class="col-12">
                        <div class="input-group dates">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="tanggal" id="tanggal">
                        </div>
                    </div> -->
                    <div class="col-12" style="padding-top:20px;">
                        <button type="submit" class="btn-blue-md btn-block">Filter<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
