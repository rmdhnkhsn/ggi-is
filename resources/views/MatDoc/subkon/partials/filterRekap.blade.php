<div class="modal fade" id="filterRekap" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form name="custForm" action="{{route('subkon.rekapDetail.filter')}}" method="post" enctype="multipart/form-data">
                @csrf
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
                        <div class="title-sm">ITEM CODE</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="item_code" placeholder="Input item code">
                        <input type="hidden" class="form-control borderInput mt-1 mb-3"  name="no_kontrak" value="{{$no_kontrak}}" placeholder="Input item code">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">WO</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="no_wo" placeholder="Input wo">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
