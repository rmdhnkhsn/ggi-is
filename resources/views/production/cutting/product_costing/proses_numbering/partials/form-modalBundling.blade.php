<form action="{{ route('proses_bundling.finish')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="finishBundling-{{$value2->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row border-bottom pb-2">
                        <div class="col-12 justify-sb">
                            <span class="title-15">Menyelesaikan Prosess Bundling</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-left">
                            <span class="general-identity-title">Remark</span>
                            <div class="input-group my-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-GI">Remark</span>
                                </div>
                                <input type="hidden" name="form_id" id="form_id" value="{{$value2->form_id}}">
                                <input type="hidden" name="proses_id" id="proses_id" value="{{$value2->id}}">
                                <input type="hidden" name="start_time" id="start_time" value="{{$value2->start_time}}">
                                <input type="hidden" name="proses" id="proses" value="Proses Bundling">
                                <input type="hidden" name="sequence" id="sequence" value="60">
                                <select class="form-control select-wo select2bs4 input-data-fa" id="remark" name="remark">
                                    <option value="Tidak Istirahat">Tidak Istirahat</option>
                                    <option value="Istirahat">Istirahat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn-blue col-12">Assign</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>