<div class="modal fade" id="FormID" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <table class="table table-not-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="65%" class="text-left">List WO</th>
                                    <th width="35%">Total Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left">174548</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td class="text-left">174549</td>
                                    <td>80</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =================== -->
<form action="{{ route('proses_numbering.finish')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="finishNumbering-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row border-bottom pb-2">
                        <div class="col-12 justify-sb">
                            <span class="title-15">Menyelesaikan Prosess Numbering</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 text-left">
                            <span class="general-identity-title">Remark</span>
                            <div class="input-group mt-1 mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-GI">Remark</span>
                                </div>
                                <?php
                                $data = collect($value->proses_numbering_user)->count('id');
                                $start_time = '';
                                if ($data != null) {
                                   $data = collect($value->proses_numbering_user)->first();
                                   $start_time = $data->start_time;
                                }
                                ?>
                                <input type="hidden" name="start_time" id="start_time" value="{{$start_time}}">
                                <input type="hidden" name="id" id="id" value="{{$value->id}}">
                                <input type="hidden" name="proses" id="proses" value="Proses Numbering">
                                <input type="hidden" name="sequence" id="sequence" value="40">
                                <select class="form-control select-wo select2bs4 input-data-fa" id="remark" name="remark">
                                    <option value="Tidak Istirahat">Tidak Istirahat</option>
                                    <option value="Istirahat">Istirahat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-2 justify-start">
                            <input type="checkbox" id="check1"  value="pressing" name="pressing">
                            <label for="check1" class="label-checkbox">Proses Pressing</label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-blue btn-block">Assign</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('proses_pressing.finish')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="finishPressing-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row border-bottom pb-2">
                        <div class="col-12 justify-sb">
                            <span class="title-15">Menyelesaikan Prosess Pressing</span>
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
                                $data = collect($value->proses_pressing_user)->count('id');
                                $start_time = '';
                                if ($data != null) {
                                   $data = collect($value->proses_pressing_user)->first();
                                   $start_time = $data->start_time;
                                }
                                ?>
                                <input type="hidden" name="start_time" id="start_time" value="{{$start_time}}">
                                <input type="hidden" name="id" id="id" value="{{$value->id}}">
                                <input type="hidden" name="proses" id="proses" value="Proses Pressing">
                                <input type="hidden" name="sequence" id="sequence" value="50">
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