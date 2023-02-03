<div class="modal fade" id="EditIssueMR{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{route('rpa.issue_mr.done_request')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Finish Request</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-md-12">
                        <span class="general-identity-title">Remark</span>
                        <div class="mt-1 mb-3">
                            <input type="text" class="form-control borderInput" id="remark" name="remark" value="{{$value->remark}}" placeholder="Insert Wo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="id" name="id" value="{{$value->id}}">
                    <div class="col-12" style="padding-top:10px;">
                        <button type="submit" class="btn-blue-md btn-block">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
