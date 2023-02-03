<form action="{{route ('sample-updateDepartementTrecking') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="remark_cancel" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:550px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row px-4">
                    <div class="col-12 pt-2 justify-sb">
                        <div class="title-20">Add Remark Cancel</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-12 pt-1">
                        <span class="title-sm">Remark</span>
                        <div class="message mt-1">
                            <textarea placeholder="Write Something (Optional)." name="remark_cancel" id="remark_cancel"></textarea>
                            <i class="icon-comment far fa-comment-dots"></i>
                        </div>
                    </div>
                    <div class="col-12 pb-4 mt-2">
                        <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                        <input type="hidden" id="departement_trecking" name="departement_trecking" value="CANCEL">
                        <input type="hidden" id="result" name="result" value="CANCEL">
                        <button type="submit" class="btn-blue">Assign</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
