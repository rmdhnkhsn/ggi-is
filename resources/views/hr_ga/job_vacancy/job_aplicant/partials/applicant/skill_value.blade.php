<?php
$data_skill = collect($applicant->skilltest_score)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->first();
?>
<!-- Test Skills  -->
<div class="col-12 mb-2">
    <div class="title-24">Fit & Propper Test</div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Departemen</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->departemen}}" placeholder="score of accounting" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Bagian</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->bagian}}" placeholder="score of it" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Jabatan</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->jabatan}}" placeholder="score of computer" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">English Language</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->english_score}}" placeholder="score of language" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Skill Test Name</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->skilltest_name}}" placeholder="score of sewing" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Score Test</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->score_test}}" placeholder="score of qc" required readonly/>
    </div>
</div>
@if($data_skill->test1 != null || $data_skill->test2 != null || $data_skill->test3 != null)
<div class="col-12 justify-center mb-3" style="gap:1.5rem">
    <div class="title-14 no-wrap">More Skills Test</div>
    <div class="borderlight"></div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Test Name 1</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->test1}}" placeholder="test name" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Value Test 1</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->score1}}" placeholder="score of test 1" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Test Name 2</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->test2}}" placeholder="test name" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Value Test 2</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->score2}}" placeholder="score of test 2" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Test Name 3</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->test3}}" placeholder="test name" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Value Test 3</span>
    <div class="input-group mt-1 mb-3">
    <input type="text" class="form-control border-input-10" name="" value="{{$data_skill->score3}}" placeholder="score of test 3" required readonly/>
    </div>
</div>
@endif
<div class="col-12 justify-center my-3">
    <div class="borderlight"></div>
</div>