<!-- =================== -->
<form action="{{ route('proses_cutting.finish')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="finish-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row border-bottom pb-2">
                        <div class="col-12 justify-sb">
                            <span class="title-15">Menyelesaikan Prosess Cutting</span>
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
                                <?php
                                $data = collect($value->proses_cutting_user)->count('id');
                                $start_time = '';
                                if ($data != null) {
                                   $data = collect($value->proses_cutting_user)->first();
                                   $start_time = $data->start_time;
                                }
                                ?>
                                <input type="hidden" name="start_time" id="start_time" value="{{$start_time}}">
                                <input type="hidden" name="id" id="id" value="{{$value->id}}">
                                <input type="hidden" name="proses" id="proses" value="Proses Cutting">
                                <input type="hidden" name="sequence" id="sequence" value="30">
                                <select class="form-control select-wo select2bs4 input-data-fa" id="remark" name="remark" required>
                                    <option value="Tidak Istirahat">Tidak Istirahat</option>
                                    <option value="Istirahat">Istirahat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <center><button type="submit" class="btn-blue col-12">Assign</button></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>