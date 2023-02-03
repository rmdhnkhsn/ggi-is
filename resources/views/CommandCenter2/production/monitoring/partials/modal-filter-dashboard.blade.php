<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:500px">
        <div class="modal-content" style="border-radius:10px">
            <form action="{{route('operatorperformance.monitoring.filter')}}" method="post" enctype="multipart/form-data" class="flexx" style="gap:.7rem;width:100%">
                @csrf
                <div class="row p-4">
                    <div class="col-12 justify-sb">
                        <div class="title-24">Filter Chart</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Date</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control border-input-10" name="tanggal" style="height:38px" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Line</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                            </div>
                                <input type="text" class="form-control border-input-10" name="line" style="height:38px" placeholder="Line">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Style</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tshirt"></i></span>
                            </div>
                                <input type="text" class="form-control border-input-10" name="style" style="height:38px" placeholder="Style">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Buyer</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-users"></i></span>
                            </div>
                                <input type="text" class="form-control border-input-10" name="buyer" style="height:38px" placeholder="Buyer">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Item</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-box-open"></i></span>
                            </div>
                                <input type="text" class="form-control border-input-10" name="item" style="height:38px" placeholder="Item">
                        </div>
                    </div>
                
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md btn-block">Filter Cart <i class="fs-18 ml-2 fas fa-filter"></i></button>
                    </div>
                </div>
            </form>
           
        </div>
    </div>
</div>