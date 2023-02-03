<!-- Modal -->
<div class="modal fade" id="notePurchasing{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:600px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <form action="{{route('accessories_prc.note')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$value->id}}">
                        <div class="col-12">
                            <span class="general-identity-title">Note</span>
                            <div class="fa-message my-2">
                                <textarea placeholder="Masukkan Note.." name="note" class="remark-name" id="note"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 justify-end">
                            <button type="submit" class="btn btn-blue">Approve</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
