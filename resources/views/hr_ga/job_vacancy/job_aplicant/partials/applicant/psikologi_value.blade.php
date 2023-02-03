<?php
$data_psikologi = collect($applicant->psychotest_score)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->first();
?>
<!-- Test Psikologi  -->
<div class="col-12 mb-2">
    <div class="title-24">Evaluation Psychological Test</div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Papikositik/EPPS</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->epps}}" placeholder="score of EPPS" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">TKD</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->tkd}}" placeholder="score of TKD" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">DISC</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->disc}}" placeholder="score of DISC" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">EAS</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->eas}}" placeholder="score of EAS" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Paulin/Kreplin</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->paulin}}" placeholder="score of paulin" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">TMC</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->tmc}}" placeholder="score of TMC" required readonly/>
    </div>
</div>
@if($data_psikologi->test1 != null || $data_psikologi->test2 != null || $data_psikologi->test3 != null)
<div class="col-12 justify-center mb-3" style="gap:1.5rem">
    <div class="title-14 no-wrap">More Psychological Test</div>
    <div class="borderlight"></div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Test Name 1</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->test1}}" placeholder="test name" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Value Test 1</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->score1}}" placeholder="score of test 1" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Test Name 2</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->test2}}" placeholder="test name" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Value Test 2</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->score2}}" placeholder="score of test 2" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Test Name 3</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->test3}}" placeholder="test name" required readonly/>
    </div>
</div>
<div class="col-lg-2">
    <span class="title-sm">Value Test 3</span>
    <div class="input-group mt-1 mb-3">
        <input type="text" class="form-control border-input-10" name="" value="{{$data_psikologi->score3}}" placeholder="score of test 3" required readonly/>
    </div>
</div>
@endif
<div class="col-12 justify-center my-3">
    <div class="borderlight"></div>
</div>
<!-- End test psikologi -->