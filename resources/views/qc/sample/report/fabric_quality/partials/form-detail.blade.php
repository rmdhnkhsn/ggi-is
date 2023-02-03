<div class="row">
    <div class="col-lg-9">
        <div class="container">
            <label for="fq"> FABRIC QUALITY </label>
            <table class="table table-bordered">
                <tr style="text-align:center;">
                    <th rowspan="2" style="padding-top:35px;">NO</th>
                    <th rowspan="2" style="padding-top:35px;">DESCRIPTION</th>
                    <th colspan="2">CONDITION</th>
                    <th rowspan="2" style="padding-top:35px;">REMARK</th>
                </tr>
                <tr style="text-align:center;">
                    <th>OK</th>
                    <th>NO</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>HANDFEEL</td>
                    <td>
                        <center>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="handfeel" value="1" value="1" {{ ($data->fabric_quality->handfeel == 1 && $data->fabric_quality->handfeel != null ) ? "checked" : "" }} disabled>
                                <label for="radioPrimary2"></label>
                            </div>
                        </center>
                    </td>
                    <td> 
                        <center>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="handfeel" value="0" {{ ($data->fabric_quality->handfeel == 0 && $data->fabric_quality->handfeel != null ) ? "checked" : "" }} disabled>
                                <label for="radioPrimary1"></label>
                            </div>
                        </center>
                    </td>
                    <td><input type="text" class="form-control" id="h_remark" name="h_remark" placeholder="Insert Remark" value="{{$data->fabric_quality->h_remark}}" disabled></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>MATERIAL QUALITY</td>
                    <td>
                        <center>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary3" name="material_quality" value="1" {{ ($data->fabric_quality->material_quality == 1 && $data->fabric_quality->material_quality != null) ? "checked" : "" }} disabled>
                                <label for="radioPrimary3"></label>
                            </div>
                        </center>
                    </td>
                    <td> 
                        <center>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary4" name="material_quality" value="0" {{ ($data->fabric_quality->material_quality == 0 && $data->fabric_quality->material_quality != null) ? "checked" : "" }} disabled>
                                <label for="radioPrimary4"></label>
                            </div>
                        </center>
                    </td>
                    <td><input type="text" class="form-control" id="mq_remark" name="mq_remark" placeholder="Insert Remark" value="{{$data->fabric_quality->mq_remark}}" disabled></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>MOTIF/COLOR</td>
                    <td>
                        <center>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary5" name="motif" value="1" {{ ($data->fabric_quality->motif == 1 && $data->fabric_quality->motif != null) ? "checked" : "" }} disabled>
                                <label for="radioPrimary5"></label>
                            </div>
                        </center>
                    </td>
                    <td> 
                        <center>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary6" name="motif" value="0" {{ ($data->fabric_quality->motif == 0 && $data->fabric_quality->motif != null) ? "checked" : "" }} disabled>
                                <label for="radioPrimary6"></label>
                            </div>
                        </center>
                    </td>
                    <td><input type="text" class="form-control" id="motif_remark" name="motif_remark" placeholder="Insert Remark" value="{{$data->fabric_quality->motif_remark}}" disabled></td>
                </tr>
                <tr>
                    <td rowspan="2">4</td>
                    <td rowspan="2">Weight</td>
                    <td>TARGET</td>
                    <td><center><input type="text" class="form-control" id="target" name="target" placeholder="Target" style="width:5em;" value="{{$data->fabric_quality->target}}" disabled></center></td>
                    <td rowspan="2"><center><textarea class="form-control" rows="3" placeholder="Insert Remark" id="weight_remark" name="weight_remark" disabled>{{$data->fabric_quality->weight_remark}}</textarea></center></td>
                </tr>
                <tr>
                    <td>ACTUAL</td>
                    <td><center><input type="text" class="form-control" id="actual" name="actual" placeholder="Actual" style="width:5em;" value="{{$data->fabric_quality->actual}}" disabled></center></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="container">
            <label for="fq"> RESULT </label>
            <table class="table table-bordered">
                <tr style="text-align:center;">
                    <th>OK</th>
                    <th>FAIL</th>
                </tr>
                <tr style="text-align:center;">
                    <td>
                        <center>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary7" name="result" value="1" {{ ($data->fabric_quality->result == 1 && $data->fabric_quality->result != null) ? "checked" : "" }} disabled>
                                <label for="radioPrimary7"></label>
                            </div>
                        </center>
                    </td>
                    <td> 
                        <center>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary8" name="result" value="0" {{ ($data->fabric_quality->result == 0 && $data->fabric_quality->result != null) ? "checked" : "" }} disabled>
                                <label for="radioPrimary8"></label>
                            </div>
                        </center>
                    </td>
                </tr>
            </table>
        </div>
        <div class="container">
            <label for="fq"> COMMENT RESULT </label>
            <textarea class="form-control" rows="3" placeholder="Insert Comment Result" name="comment_result" id="comment_result" disabled>{{$data->fabric_quality->comment_result}}</textarea>
        </div>
        <div class="container" style="padding-top:10px;">
            <div class="row">
                <div class="col-lg-6 col-6">
                    <a href="{{ route('fq.edit', $data->fabric_quality->id)}}" class="btn btn-block btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
                <div class="col-lg-6 col-6">
                    <a href="{{ route('fq.delete', $data->fabric_quality->id)}}" class="btn btn-block btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
