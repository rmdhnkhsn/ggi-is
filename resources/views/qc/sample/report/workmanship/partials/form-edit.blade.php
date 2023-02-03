<div class="row">
    <div class="col-lg-9">
        <div class="container">
            <label for="fq"> EDIT WORKMANSHIP </label>
            <table class="table table-bordered">
                <tr style="text-align:center;">
                    <th>NO</th>
                    <th>POSITION</th>
                    <th>PROBLEM</th>
                    <th>REMARK</th>
                </tr>
                <tr>
                    <td style="text-align:center">1</td>
                    <td><input type="text" class="form-control" name="position_1" id="position_1" placeholder="Insert Position" value="{{$data->position_1}}"></td>
                    <td><input type="text" class="form-control" name="problem_1" id="problem_1" placeholder="Insert Problem" value="{{$data->problem_1}}"></td>
                    <td><input type="text" class="form-control" name="remark_1" id="remark_1" placeholder="Insert Remark" value="{{$data->remark_1}}"></td>
                </tr>
                <tr>
                    <td style="text-align:center">2</td>
                    <td><input type="text" class="form-control" name="position_2" id="position_2" placeholder="Insert Position" value="{{$data->position_2}}"></td>
                    <td><input type="text" class="form-control" name="problem_2" id="problem_2" placeholder="Insert Problem" value="{{$data->problem_2}}"></td>
                    <td><input type="text" class="form-control" name="remark_2" id="remark_2" placeholder="Insert Remark" value="{{$data->remark_2}}"></td>
                </tr>
                <tr>
                    <td style="text-align:center">3</td>
                    <td><input type="text" class="form-control" name="position_3" id="position_3" placeholder="Insert Position" value="{{$data->position_3}}"></td>
                    <td><input type="text" class="form-control" name="problem_3" id="problem_3" placeholder="Insert Problem" value="{{$data->problem_3}}"></td>
                    <td><input type="text" class="form-control" name="remark_3" id="remark_3" placeholder="Insert Remark" value="{{$data->remark_3}}"></td>
                </tr>
                <tr>
                    <td style="text-align:center">4</td>
                    <td><input type="text" class="form-control" name="position_4" id="position_4" placeholder="Insert Position" value="{{$data->position_4}}"></td>
                    <td><input type="text" class="form-control" name="problem_4" id="problem_4" placeholder="Insert Problem" value="{{$data->problem_4}}"></td>
                    <td><input type="text" class="form-control" name="remark_4" id="remark_4" placeholder="Insert Remark" value="{{$data->remark_4}}"></td>
                </tr>
                <tr>
                    <td style="text-align:center">5</td>
                    <td><input type="text" class="form-control" name="position_5" id="position_5" placeholder="Insert Position" value="{{$data->position_5}}"></td>
                    <td><input type="text" class="form-control" name="problem_5" id="problem_5" placeholder="Insert Problem" value="{{$data->problem_5}}"></td>
                    <td><input type="text" class="form-control" name="remark_5" id="remark_5" placeholder="Insert Remark" value="{{$data->remark_5}}"></td>
                </tr>
                <tr>
                    <td style="text-align:center">6</td>
                    <td><input type="text" class="form-control" name="position_6" id="position_6" placeholder="Insert Position" value="{{$data->position_6}}"></td>
                    <td><input type="text" class="form-control" name="problem_6" id="problem_6" placeholder="Insert Problem" value="{{$data->problem_6}}"></td>
                    <td><input type="text" class="form-control" name="remark_6" id="remark_6" placeholder="Insert Remark" value="{{$data->remark_6}}"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="container">
            <label for="fq"> FITTING </label>
            <div class="container">
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary7" name="fitting" value="1" {{ ($data->fitting == 1 && $data->fitting != null) ? "checked" : "" }}>
                    <label for="radioPrimary7">GOOD</label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary8" name="fitting" value="2" {{ ($data->fitting == 2 && $data->fitting != null) ? "checked" : "" }}>
                    <label for="radioPrimary8">FAIR</label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary9" name="fitting" value="3" {{ ($data->fitting == 3 && $data->fitting != null) ? "checked" : "" }}>
                    <label for="radioPrimary9">BAD</label>
                </div>
            </div>
        </div><br>
        <div class="container">
            <label for="fq"> COMMENT</label>
            <textarea class="form-control" rows="3" name="fitting_comment" id="fitting_comment" placeholder="Insert Comment Fitting" name="fitting_comment" id="fitting_comment">{{$data->fitting_comment}}</textarea>
        </div>
    </div>
</div>
<input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert Status">
<button type="submit" class="btn btn-success btn-block">{{$submit}}</button>

