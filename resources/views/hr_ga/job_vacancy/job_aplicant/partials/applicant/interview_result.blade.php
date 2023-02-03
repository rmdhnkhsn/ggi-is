<!-- Hasil Interview -->
<?php
$short_by = collect($applicant->interview_result)->sortByDesc('user_kategory');
?>
@foreach($short_by as $key => $value)
    <?php 
    if ($value->user_kategory == 'HRD') {
        $pewawancara = $value->interviewer_name1;
        $conclusion = $value->conclusion1;
        $recomendation = $value->recomendation1;
    }else {
        $pewawancara = $value->interviewer_name2;
        $conclusion = $value->conclusion2;
        $recomendation = $value->recomendation2;
    }
    ?>
    <div class="row mt-4 px-2">
        <div class="col-12">
            <div class="cards-scroll scrollX" id="scroll-bar">
            <table class="table table-content">
                <thead>
                <tr>
                    <th class="text-center" colspan="2" rowspan="2"><div class="mb-4">INTERVIEW : ASSESSED ASPECTS</div></th>
                    <th class="text-center" colspan="3">{{$value->user_kategory}}</th>
                    <th style="width:280px" class="text-center" rowspan="2"><div class="mb-4">REMARK</div></th> 
                </tr>
                <tr>
                    <th style="width:90px" class="text-center">Baik</th>
                    <th style="width:90px" class="text-center">Cukup</th>
                    <th style="width:90px" class="text-center">Kurang</th>
                </tr>
                </thead>
                <tbody>
                <tr class="hoverBlue">
                    <td style="width:35px">A.</td> 
                    <td><b>Penampilan / Sikap</b> :  Rapih, PD, Sopan, Keadaan Fisik</td>
                    <td>
                    <div class="justify-center">
                        <input type="radio"  id="radioA1" class="radioCustomInput" {{ ($value->penampilan == '100' ) ? "checked" : "" }} disabled>
                        <label for="radioA1" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioA2" class="radioCustomInput" {{ ($value->penampilan == "66")? "checked" : "" }} disabled>
                        <label for="radioA2" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioA3" class="radioCustomInput" {{ ($value->penampilan == "34")? "checked" : "" }} disabled>
                        <label for="radioA3" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div style="margin:-6px">
                        <input type="text" class="form-control border-input-10" name="remark_penampilan" value="{{$value->remark_penampilan}}" placeholder="" readonly/>
                    </div>
                    </td>
                </tr>
                <tr class="hoverBlue">
                    <td style="width:35px">B.</td> 
                    <td><b> Pengetahuan pada bidangkerja </b> :   Kesesuaian pengetahuan dengan jawaban, memberi jawaban dengan logis</td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioB1" class="radioCustomInput" {{ ($value->pengetahuan=="100")? "checked" : "" }} disabled>
                        <label for="radioB1" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioB2" class="radioCustomInput" {{ ($value->pengetahuan=="66")? "checked" : "" }} disabled>
                        <label for="radioB2" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioB3" class="radioCustomInput" {{ ($value->pengetahuan=="34")? "checked" : "" }} disabled>
                        <label for="radioB3" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div style="margin:-6px">
                        <input type="text" class="form-control border-input-10" name="remark_pengetahuan" value="{{$value->remark_pengetahuan}}" placeholder="" readonly/>
                    </div>
                    </td>
                </tr>
                <tr class="hoverBlue">
                    <td style="width:35px">C.</td> 
                    <td><b> Motivasi </b> :  Alasan & minat melamar pekerjaan</td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioC1" class="radioCustomInput" {{ ($value->motivasi=="100")? "checked" : "" }} disabled>
                        <label for="radioC1" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioC2" class="radioCustomInput" {{ ($value->motivasi=="66")? "checked" : "" }} disabled>
                        <label for="radioC2" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioC3" class="radioCustomInput" {{ ($value->motivasi=="34")? "checked" : "" }} disabled>
                        <label for="radioC3" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div style="margin:-6px">
                        <input type="text" class="form-control border-input-10" name="remark_motivasi" value="{{$value->remark_motivasi}}" placeholder="" readonly/>
                    </div>
                    </td>
                </tr>
                <tr class="hoverBlue">
                    <td style="width:35px">D.</td> 
                    <td><b> Ambisi / Drive </b> : Semangat kerja, Energi, Keinginan, berprestasi</td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioD1" class="radioCustomInput" {{ ($value->ambisi=="100")? "checked" : "" }} disabled>
                        <label for="radioD1" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioD2" class="radioCustomInput" {{ ($value->ambisi=="66")? "checked" : "" }} disabled>
                        <label for="radioD2" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioD3" class="radioCustomInput" {{ ($value->ambisi=="34")? "checked" : "" }} disabled>
                        <label for="radioD3" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div style="margin:-6px">
                        <input type="text" class="form-control border-input-10" name="remark_ambisi" value="{{$value->remark_ambisi}}" placeholder="" readonly/>
                    </div>
                    </td>
                </tr>
                <tr class="hoverBlue">
                    <td style="width:35px">E.</td> 
                    <td><b> Inisiatif / Kreatifitas </b> : Kemauan memulai sesuatu, kelincahan dalam mencari solusi</td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioE1" class="radioCustomInput" {{ ($value->inisiatif=="100")? "checked" : "" }} disabled>
                        <label for="radioE1" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioE2" class="radioCustomInput" {{ ($value->inisiatif=="66")? "checked" : "" }} disabled>
                        <label for="radioE2" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioE3" class="radioCustomInput" {{ ($value->inisiatif=="34")? "checked" : "" }} disabled>
                        <label for="radioE3" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div style="margin:-6px">
                        <input type="text" class="form-control border-input-10" name="remark_inisiatif" value="{{$value->remark_inisiatif}}" placeholder="" readonly/>
                    </div>
                    </td>
                </tr>
                <tr class="hoverBlue">
                    <td style="width:35px">F.</td> 
                    <td><b> Komunikasi </b> : Dapat mengungkapkan ide & pemikiran secara jelas dan mudah dipahami</td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioF1" class="radioCustomInput" {{ ($value->komunikasi=="100")? "checked" : "" }} disabled>
                        <label for="radioF1" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioF2" class="radioCustomInput" {{ ($value->komunikasi=="66")? "checked" : "" }} disabled>
                        <label for="radioF2" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioF3" class="radioCustomInput" {{ ($value->komunikasi=="34")? "checked" : "" }} disabled>
                        <label for="radioF3" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div style="margin:-6px">
                        <input type="text" class="form-control border-input-10" name="remark_komunikasi" value="{{$value->remark_komunikasi}}" placeholder="" readonly/>
                    </div>
                    </td>
                </tr>
                <tr class="hoverBlue">
                    <td style="width:35px">G.</td> 
                    <td><b> Cara Berfikir </b> : Sistematis & Kemampuan menganalisa permasalahan</td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioG1" class="radioCustomInput" {{ ($value->berfikir=="100")? "checked" : "" }} disabled>
                        <label for="radioG1" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioG2" class="radioCustomInput" {{ ($value->berfikir=="66")? "checked" : "" }} disabled>
                        <label for="radioG2" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioG3" class="radioCustomInput" {{ ($value->berfikir=="34")? "checked" : "" }} disabled>
                        <label for="radioG3" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div style="margin:-6px">
                        <input type="text" class="form-control border-input-10" name="remark_berfikir" value="{{$value->remark_berfikir}}" placeholder="" readonly/>
                    </div>
                    </td>
                </tr>
                <tr class="hoverBlue">
                    <td style="width:35px">H.</td> 
                    <td><b> Team Work </b> : Berkoordinasi, Kerjasama dengan rekan sekerja, Atasan, atau Bawahan</td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioH1" class="radioCustomInput" {{ ($value->teamwork=="100")? "checked" : "" }} disabled>
                        <label for="radioH1" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioH2" class="radioCustomInput" {{ ($value->teamwork=="66")? "checked" : "" }} disabled>
                        <label for="radioH2" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div class="justify-center">
                        <input type="radio" id="radioH3" class="radioCustomInput" {{ ($value->teamwork=="34")? "checked" : "" }} disabled>
                        <label for="radioH3" class="radioCustom2"></label>
                    </div>
                    </td>
                    <td>
                    <div style="margin:-6px">
                        <input type="text" class="form-control border-input-10" name="remark_teamwork" value="{{$value->remark_teamwork}}" placeholder="" readonly/>
                    </div>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="row mt-3 px-2">
        <div class="col-lg-2">
            <div class="title-sm text-truncate">Interviewer name ({{$value->user_kategory}})</div>
            <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="interviewer_name2" value="{{$pewawancara}}" placeholder="input name" disabled/>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="title-sm">Conclusion</div>
            <div class="input-group mt-1 mb-3">
                <input type="text" class="form-control border-input-10" name="conclusion2" value="{{$conclusion}}" placeholder="input remark" disabled/>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="title-sm text-truncate">Recomendation</div>
            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
            <div class="justify-start">
                <div class="radioContainer">
                <input type="radio" id="yes2" class="radioCustomInput" {{ ($recomendation == 'Yes' ) ? "checked" : "" }} disabled>
                <label for="yes2" class="radioCustom2"></label>
                </div>
                <label for="yes2" class="title-16 pointer ml-1" style="margin-top:6px">Yes</label>
            </div>
            <div class="justify-start">
                <div class="radioContainer">
                <input type="radio"  id="no2" class="radioCustomInput" {{ ($recomendation == 'No' ) ? "checked" : "" }} disabled>
                <label for="no2" class="radioCustom2"></label>
                </div>
                <label for="no2" class="title-16 pointer ml-1" style="margin-top:6px">No</label>
            </div>
            </div>
        </div>
        @if($value->user_kategory == 'HRD' && auth()->user()->departemensubsub != 'RECRUITMENT')
            @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.approval_user')
        @endif
    <div>
    @if($value->user_kategory == 'HRD' && auth()->user()->departemensubsub == "RECRUITMENT")
    <div class="row mt-3 px-2">
        <div class="col-12 mb-2">
            <div class="title-24">Conclusion</div>
        </div>
        <div class="col-12">
            <div class="title-sm">Decision</div>
            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
            <div class="justify-start">
                <div class="radioContainer">
                <input type="radio" id="accepted" class="radioCustomInput" {{ ($value->decision == 'Accepted' ) ? "checked" : "" }} disabled>
                <label for="accepted" class="radioCustom2"></label>
                </div>
                <label for="accepted" class="title-15 pointer ml-1" style="margin-top:6px">Accepted</label>
            </div>
            <div class="justify-start">
                <div class="radioContainer">
                <input type="radio" id="considered" class="radioCustomInput" {{ ($value->decision == 'Considered' ) ? "checked" : "" }} disabled>
                <label for="considered" class="radioCustom2"></label>
                </div>
                <label for="considered" class="title-15 pointer ml-1" style="margin-top:6px">Considered</label>
            </div>
            <div class="justify-start">
                <div class="radioContainer">
                <input type="radio" id="rejected" class="radioCustomInput" {{ ($value->decision == 'Rejected' ) ? "checked" : "" }} disabled>
                <label for="rejected" class="radioCustom2"></label>
                </div>
                <label for="rejected" class="title-15 pointer ml-1" style="margin-top:6px">Rejected</label>
            </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="title-sm">Position</div>
            <div class="input-group mt-1 mb-3">
            <input type="text" class="form-control border-input-10" name="position" value="{{$value->position}}" placeholder="input position" readonly/>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="title-sm">Come to Work</div>
            <div class="input-group mt-1 mb-3">
            <div class="inputGroupSelect"><i class="fas fa-calendar-alt mr-3 fs-18"></i> <span class="fs-16">Date</span></div>
            <input type="date" class="form-control border-input-10" id="" name="come_to_work_date" value="{{$value->come_to_work_date}}" readonly/>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="title-sm">Employee Status</div>
            <div class="input-group flex mt-1 mb-3">
            <div class="input-group-prepend">
                <span class="inputGroupBlue px-4" for="">Status</span>
            </div>
            <select class="form-control border-input-10 select2bs4" id="" name="employee_status" style="cursor:pointer" required>
                <option name="Tetap" {{ ($value->employee_status == 'Tetap' ) ? "selected" : "" }} disabled>Tetap</option>    
                <option name="PKWT" {{ ($value->employee_status == 'PKWT' ) ? "selected" : "" }} disabled>PKWT</option>    
                <option name="Probation" {{ ($value->employee_status == 'Probation' ) ? "selected" : "" }} disabled>Probation</option>    
            </select>
            </div>
        </div>
        <?php 
        $values = array('Asuransi', 'JPK', 'Jamsostek', 'Makan','Jemputan');
        $zutaten = array($data_hrd->facility_benefits);
        ?>
        <div class="col-lg-6">
            <div class="title-sm">Facility & Benefits</div>
            <div class="flex mt-3" style="gap:1.6rem">
                @foreach ($values as $val) 
                <div class="checkB">
                    <input type="checkbox" class="check1" id="{{$val}}" value="{{$val}}" name="facility_benefits[]" {{in_array($val,json_decode($data_hrd->facility_benefits,true)) ? 'checked' : ''}}>
                    <label for="{{$val}}" class="label-checkbox2">{{$val}}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3">
            <div class="title-sm">Others Fasility & Benefits</div>
            <div class="input-group mt-1 mb-3">
            <input type="text" class="form-control border-input-10" name="other_facility" value="{{$value->other_facility}}" placeholder="input other Fasility & benefits" disabled/>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="title-sm">Salary</div>
            <div class="input-group mt-1 mb-3">
            <input type="text" class="form-control border-input-10" name="salary" value="Rp. {{number_format($value->salary, 2, ",", ".")}}" placeholder="Input salary" disabled/>
            </div>
        </div>
    </div>
    @endif
@endforeach
