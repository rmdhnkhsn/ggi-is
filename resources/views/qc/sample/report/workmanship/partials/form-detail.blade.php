<div class="row">
    <div class="col-lg-9">
        <div class="container">
            <label for="fq"> WORKMANSHIP </label>
            <table class="table table-bordered">
                <tr style="text-align:center;">
                    <th>NO</th>
                    <th>POSITION</th>
                    <th>PROBLEM</th>
                    <th>REMARK</th>
                </tr>
                <tr>
                    <td style="text-align:center">1</td>
                    <td><input type="text" class="form-control" placeholder="Insert Position" value="{{$data->workmanship->position_1}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Problem" value="{{$data->workmanship->problem_1}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Remark" value="{{$data->workmanship->remark_1}}" disabled></td>
                </tr>
                <tr>
                    <td style="text-align:center">2</td>
                    <td><input type="text" class="form-control" placeholder="Insert Position" value="{{$data->workmanship->position_2}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Problem" value="{{$data->workmanship->problem_2}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Remark" value="{{$data->workmanship->remark_2}}" disabled></td>
                </tr>
                <tr>
                    <td style="text-align:center">3</td>
                    <td><input type="text" class="form-control" placeholder="Insert Position" value="{{$data->workmanship->position_3}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Problem" value="{{$data->workmanship->problem_3}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Remark" value="{{$data->workmanship->remark_3}}" disabled></td>
                </tr>
                <tr>
                    <td style="text-align:center">4</td>
                    <td><input type="text" class="form-control" placeholder="Insert Position" value="{{$data->workmanship->position_4}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Problem" value="{{$data->workmanship->problem_4}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Remark" value="{{$data->workmanship->remark_4}}" disabled></td>
                </tr>
                <tr>
                    <td style="text-align:center">5</td>
                    <td><input type="text" class="form-control" placeholder="Insert Position" value="{{$data->workmanship->position_5}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Problem" value="{{$data->workmanship->problem_5}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Remark" value="{{$data->workmanship->remark_5}}" disabled></td>
                </tr>
                <tr>
                    <td style="text-align:center">6</td>
                     <td><input type="text" class="form-control" placeholder="Insert Position" value="{{$data->workmanship->position_6}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Problem" value="{{$data->workmanship->problem_6}}" disabled></td>
                    <td><input type="text" class="form-control" placeholder="Insert Remark" value="{{$data->workmanship->remark_6}}" disabled></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="container">
            <label for="fq"> FITTING </label>
            <div class="container">
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary7" name="fitting" value="1" {{ ($data->workmanship->fitting == 1 ) ? "checked" : "" }} disabled>
                    <label for="radioPrimary7">GOOD</label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary7" name="fitting" value="2" {{ ($data->workmanship->fitting == 2 ) ? "checked" : "" }} disabled>
                    <label for="radioPrimary7">FAIR</label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary7" name="fitting" value="2" {{ ($data->workmanship->fitting == 3 ) ? "checked" : "" }} disabled>
                    <label for="radioPrimary7">BAD</label>
                </div>
            </div>
        </div><br>
        <div class="container">
            <label for="fq"> COMMENT</label>
            <textarea class="form-control" rows="3" placeholder="Insert Comment Fitting" name="fitting_comment" id="fitting_comment" disabled>{{$data->workmanship->fitting_comment}}</textarea>
        </div>
        <div class="container" style="padding-top:10px;">
            <div class="row mb-2">
                <div class="col-lg-6 col-6">
                    <a href="{{ route('work.edit', $data->workmanship->id)}}" class="btn btn-block btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
                <div class="col-lg-6 col-6">
                    <a href="{{ route('work.delete', $data->workmanship->id)}}" class="btn btn-block btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
