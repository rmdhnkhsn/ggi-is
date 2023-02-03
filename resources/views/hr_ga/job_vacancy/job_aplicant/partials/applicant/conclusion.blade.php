<div class="row mt-3 px-2">
    <div class="col-12 mb-2">
        <div class="title-24">Conclusion</div>
    </div>
    <div class="col-lg-3">
        <div class="title-sm text-truncate">Interviewer name (HRD)</div>
        <div class="mt-1 mb-3">
            <input type="hidden" name="user_kategory" id="user_kategory" value="HRD">
            <input type="hidden" name="ers_id" id="ers_id" value="{{$data['ers_id']}}">
            <input type="hidden" name="applicant_id" id="applicant_id" value="{{$data['id']}}">
            <input type="text" class="form-control border-input-10" name="interviewer_name1" value="{{auth()->user()->nama}}" placeholder="input name" />
        </div>
    </div>
    <div class="col-lg-7">
        <div class="title-sm">Conclusion</div>
        <div class="mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="conclusion1" value="" placeholder="input remark" />
        </div>
    </div>
    <div class="col-lg-2">
        <div class="title-sm text-truncate">Recomendation</div>
        <div class="input-group mt-1 mb-3" style="gap:1.4rem">
        <div class="justify-start">
            <div class="radioContainer">
            <input type="radio" name="recomendation1" id="yes" value="Yes" class="radioCustomInput">
            <label for="yes" class="radioCustom2"></label>
            </div>
            <label for="yes" class="title-16 pointer ml-1" style="margin-top:6px">Yes</label>
        </div>
        <div class="justify-start">
            <div class="radioContainer">
            <input type="radio" name="recomendation1" id="no" value="No" class="radioCustomInput">
            <label for="no" class="radioCustom2"></label>
            </div>
            <label for="no" class="title-16 pointer ml-1" style="margin-top:6px">No</label>
        </div>
        </div>
    </div>
    <div class="col-12">
        <div class="title-sm">Decision</div>
        <div class="input-group mt-1 mb-3" style="gap:1.4rem">
        <div class="justify-start">
            <div class="radioContainer">
            <input type="radio" name="decision" id="accepted" value="Accepted" class="radioCustomInput">
            <label for="accepted" class="radioCustom2"></label>
            </div>
            <label for="accepted" class="title-15 pointer ml-1" style="margin-top:6px">Accepted</label>
        </div>
        <div class="justify-start">
            <div class="radioContainer">
            <input type="radio" name="decision" id="considered" value="Considered" class="radioCustomInput">
            <label for="considered" class="radioCustom2"></label>
            </div>
            <label for="considered" class="title-15 pointer ml-1" style="margin-top:6px">Considered</label>
        </div>
        <div class="justify-start">
            <div class="radioContainer">
            <input type="radio" name="decision" id="rejected" value="Rejected" class="radioCustomInput">
            <label for="rejected" class="radioCustom2"></label>
            </div>
            <label for="rejected" class="title-15 pointer ml-1" style="margin-top:6px">Rejected</label>
        </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="title-sm">Position</div>
        <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="position" value="" placeholder="input position" />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="title-sm">Come to Work</div>
        <div class="input-group mt-1 mb-3">
        <div class="inputGroupSelect"><i class="fas fa-calendar-alt mr-3 fs-18"></i> <span class="fs-16">Date</span></div>
        <input type="date" class="form-control border-input-10" id="" name="come_to_work_date" value="" />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="title-sm">Employee Status</div>
        <div class="input-group flex mt-1 mb-3">
        <div class="input-group-prepend">
            <span class="inputGroupBlue px-4" for="">Status</span>
        </div>
        <select class="form-control border-input-10 select2bs4" id="" name="employee_status" style="cursor:pointer" required>
            <option selected disabled>Select Status</option>
            <option name="Tetap">Tetap</option>    
            <option name="PKWT">PKWT</option>    
            <option name="Probation">Probation</option>    
        </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="title-sm">Facility & Benefits</div>
        <div class="flex mt-3" style="gap:1.6rem">
        <div class="checkA">
            <input type="checkbox" class="check1" id="asuransi" value="Asuransi" name="facility_benefits[]">
            <label for="asuransi" class="label-checkbox2">Asuransi</label>
        </div>
        <div class="checkB">
            <input type="checkbox" class="check1" id="jpk" value="JPK" name="facility_benefits[]">
            <label for="jpk" class="label-checkbox2">JPK</label>
        </div>
        <div class="checkC">
            <input type="checkbox" class="check1" id="jamsostek" value="Jamsostek" name="facility_benefits[]">
            <label for="jamsostek" class="label-checkbox2">Jamsostek</label>
        </div>
        <div class="checkD">
            <input type="checkbox" class="check1" id="makan" value="Makan" name="facility_benefits[]">
            <label for="makan" class="label-checkbox2">Makan</label>
        </div>
        <div class="checkE">
            <input type="checkbox" class="check1" id="jemputan" value="Jemputan" name="facility_benefits[]">
            <label for="jemputan" class="label-checkbox2">Jemputan</label>
        </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="title-sm">Others Fasility & Benefits</div>
        <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="other_facility" value="" placeholder="input other Fasility & benefits" />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="title-sm">Salary</div>
        <div class="input-group mt-1 mb-3">
        <input type="number" step="0.01" class="form-control border-input-10" name="salary" value="" placeholder="Input salary" />
        </div>
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn-blue btn-block" style="border-radius:10px;float:right !important;">Save<i class="ml-2 fas fa-save"></i></button>
    </div>
</div>