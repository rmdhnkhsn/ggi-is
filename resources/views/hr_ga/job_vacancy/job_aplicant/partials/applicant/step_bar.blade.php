
<div class="col-12 justify-center py-5">
    <div class="title-24">Applicant Details</div>
</div>
<div class="col-12">
    <div class="bg-tracking h-185">
    <div class="cards-scroll scrollX" id="scroll-bar2">
        <ul>
        <!-- Untuk Applicant  -->
        @if($applicant->status == 'Apply' || $applicant->psyco_date != null)
        <li class="progress-item-check">
            <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar">
        @elseif($applicant->status == 'Interview') 
        <li class="progress-item-check">
            <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar">
        @else
        <li class="progress-item">
            <img src="{{url('images/iconpack/job_vacancy/applicant.svg')}}" class="icon-stepbar">
        @endif
            <div class="stepbar one">
            <span>1</span>
            </div>
            <p class="title-stepbar">Applicant</p>
        </li>
        <!-- End  -->

        <!-- Untuk Cek  -->
        <?php 
        $psikotest = collect($applicant->psychotest_score)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->count('id');
        $skill_test = collect($applicant->skilltest_score)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->count('id');
        $cek_interview = collect($applicant->interview_result)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->count('id');
        ?>
        <!-- End Cek  -->
        <!-- Untuk psikotest  -->
        @if($psikotest != 0)
        <li class="progress-item-check">
            <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar"> 
        @else
        <li class="progress-item">
            <img src="{{url('images/iconpack/job_vacancy/psychotest.svg')}}" class="icon-stepbar">
        @endif
            <div class="stepbar two">
                <span>2</span>
            </div>
                <p class="title-stepbar">Psychotest</p>
        </li>
        <!-- End Psikotest  -->

        <!-- Untuk SKilltest  -->
        @if($skill_test != 0)
        <li class="progress-item-check">
            <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar"> 
        @else
        <li class="progress-item">
            <img src="{{url('images/iconpack/job_vacancy/test-skill.svg')}}" class="icon-stepbar">
        @endif
            <div class="stepbar two">
            <span>3</span>
            </div>
            <p class="title-stepbar">Test Skills</p>
        </li>
        <!-- End skill test  -->

        <!-- Untuk Interview  -->
        @if($cek_interview == 2)
        <li class="progress-item-check">
            <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar"> 
        @else
        <li class="progress-item">
            <img src="{{url('images/iconpack/job_vacancy/interview.svg')}}" class="icon-stepbar">
        @endif
            <div class="stepbar three">
            <span>4</span>
            </div>
            <p class="title-stepbar">Interview</p>
        </li>
        
        <!-- Untuk Probation  -->
        @if($applicant->probation_start_date != null)
        <li class="progress-item-check">
            <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar"> 
        @else
        <li class="progress-item">
            <img src="{{url('images/iconpack/job_vacancy/probation.svg')}}" class="icon-stepbar">
        @endif
            <div class="stepbar four">
            <span>5</span>
            </div>
            <p class="title-stepbar">Probation</p>
        </li>

        <!-- Untuk Disqualification  -->
        @if($applicant->status == 'Disqualification')
        <li class="progress-item-check">
            <img src="{{url('images/iconpack/job_vacancy/check.svg')}}" class="icon-stepbar"> 
        @else
        <li class="progress-item">
            <img src="{{url('images/iconpack/job_vacancy/disqualification.svg')}}" class="icon-stepbar">
        @endif
            <div class="stepbar six">
            <span>6</span>
            </div>
            <p class="title-stepbar">Disqualification</p>
        </li>
        <!-- End disqualification -->
        </ul>
    </div>
    </div>
</div>