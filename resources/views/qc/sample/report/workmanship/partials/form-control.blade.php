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
                    <td><input type="text" class="form-control" id="position_1" name="position_1" placeholder="Insert Position"></td>
                    <td><input type="text" class="form-control" id="problem_1" name="problem_1" placeholder="Insert Problem"></td>
                    <td><input type="text" class="form-control" id="remark_1" name="remark_1" placeholder="Insert Remark"></td>
                </tr>
                <tr>
                    <td style="text-align:center">2</td>
                    <td><input type="text" class="form-control" id="position_2" name="position_2" placeholder="Insert Position"></td>
                    <td><input type="text" class="form-control" id="problem_2" name="problem_2" placeholder="Insert Problem"></td>
                    <td><input type="text" class="form-control" id="remark_2" name="remark_2" placeholder="Insert Remark"></td>
                </tr>
                <tr>
                    <td style="text-align:center">3</td>
                    <td><input type="text" class="form-control" id="position_3" name="position_3" placeholder="Insert Position"></td>
                    <td><input type="text" class="form-control" id="problem_3" name="problem_3" placeholder="Insert Problem"></td>
                    <td><input type="text" class="form-control" id="remark_3" name="remark_3" placeholder="Insert Remark"></td>
                </tr>
                <tr>
                    <td style="text-align:center">4</td>
                    <td><input type="text" class="form-control" id="position_4" name="position_4" placeholder="Insert Position"></td>
                    <td><input type="text" class="form-control" id="problem_4" name="problem_4" placeholder="Insert Problem"></td>
                    <td><input type="text" class="form-control" id="remark_4" name="remark_4" placeholder="Insert Remark"></td>
                </tr>
                <tr>
                    <td style="text-align:center">5</td>
                    <td><input type="text" class="form-control" id="position_5" name="position_5" placeholder="Insert Position"></td>
                    <td><input type="text" class="form-control" id="problem_5" name="problem_5" placeholder="Insert Problem"></td>
                    <td><input type="text" class="form-control" id="remark_5" name="remark_5" placeholder="Insert Remark"></td>
                </tr>
                <tr>
                    <td style="text-align:center">6</td>
                    <td><input type="text" class="form-control" id="position_6" name="position_6" placeholder="Insert Position"></td>
                    <td><input type="text" class="form-control" id="problem_6" name="problem_6" placeholder="Insert Problem"></td>
                    <td><input type="text" class="form-control" id="remark_6" name="remark_6" placeholder="Insert Remark"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="container">
            <label for="fq"> FITTING </label>
            <div class="container">
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary1" name="fitting" value="1">
                    <label for="radioPrimary1">GOOD</label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary2" name="fitting" value="2">
                    <label for="radioPrimary2">FAIR</label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary3" name="fitting" value="3">
                    <label for="radioPrimary3">BAD</label>
                </div>
            </div>
        </div><br>
        <div class="container">
            <label for="fq"> COMMENT</label>
            <textarea class="form-control" rows="3" placeholder="Insert Comment Fitting" name="fitting_comment" id="fitting_comment"></textarea>
        </div>
    </div>
</div>
<input type="hidden" class="form-control" id="report_id" name="report_id" value="{{$report_id}}" placeholder="Insert Status">
<button type="submit" class="btn btn-success btn-block">{{$submit}}</button>
