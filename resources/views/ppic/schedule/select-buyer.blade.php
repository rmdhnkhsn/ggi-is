<div class="modal fade" id="modal-buyer" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:750px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{route('ppic.schedule.index')}}" id="frmBuyerSearch" method="get">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Open OR By Buyer</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Buyer</div>
                        <div class="flex mt-1 mb-3" id="select_cont">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tshirt"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" style="width:100%" name="or_buyer" id="or_buyer">
                                <option value="" selected>Select All Buyer</option>
                                @foreach ($master_or_buyer as $d)
                                    <option value="{{$d['buyer']}}">{{$d['buyer_desc'] ." / Open : ". $d['count']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btn-block">Select</button>
                        <!-- <button type="button" class="btn-blue-md btn-block" data-toggle="modal" data-target="#modal-xl" data-dismiss="modal" id="btnNext">Select</button> -->
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>