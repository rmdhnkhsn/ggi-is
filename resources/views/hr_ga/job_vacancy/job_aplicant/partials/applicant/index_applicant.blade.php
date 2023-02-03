<?php 
    $psikotest = collect($applicant->psychotest_score)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->count('id');
    $skill_test = collect($applicant->skilltest_score)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->count('id');
    $cek_interview = collect($applicant->interview_result)->where('ers_id', $data['ers_id'])->where('applicant_id', $data['id'])->count('id');
?>
<div class="col-12 mt-4">
    <table class="table table-bordered table-16 text-left mt-2">
        <tbody>
            <tr>
                <td width="28%" style="font-weight:600">NIK</td> 
                <td width="72%">{{$data['nik']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Apply Job</td> 
                <td width="72%">{{$data['nama_ers']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Name</td> 
                <td width="72%">{{$data['nama']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Gender</td> 
                <td width="72%">{{$data['gender']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Date Of Birth</td> 
                <td width="72%">{{$data['ttl']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Address</td> 
                <td width="72%">{{$data['address']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Major</td> 
                <td width="72%">{{$data['major']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Education</td> 
            @if($data['education'] == 1)
                <td width="72%">SD</td>
                @elseif($data['education'] == 2)
                <td width="72%">SMP/SLTP</td>
                @elseif($data['education'] == 3)
                <td width="72%">SMA/SLTA</td>
                @elseif($data['education'] == 4)
                <td width="72%">D1</td>
                @elseif($data['education'] == 5)
                <td width="72%">D2</td>
                @elseif($data['education'] == 6)
                <td width="72%">D3</td>
                @elseif($data['education'] == 7)
                <td width="72%">S1</td>
                @elseif($data['education'] == 8)
                <td width="72%">S2</td>
                @elseif($data['education'] == 9)
                <td width="72%">S3</td>
            @endif
            </tr>
            <!-- Psikotes date dan psikotest score  -->
            @if($data['psyco_date'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Psychological Test Date</td> 
                <td width="72%">{{$data['psyco_date']}}</td>
            </tr>
            @endif
            @if($data['psyco_score'] != 0)
            <tr>
                <td width="28%" style="font-weight:600">Psychological Score</td> 
                <td width="72%">{{$data['psyco_score']}}</td>
            </tr>
            @endif
            <!-- End  -->

            <!-- Test skill date dan test skill score  -->
            @if($data['skill_date'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Skills Test Date</td> 
                <td width="72%">{{$data['skill_date']}}</td>
            </tr>
            @endif

            @if($data['skill_score'] != 0)
            <tr>
                <td width="28%" style="font-weight:600">Skills Test Score</td> 
                <td width="72%">{{$data['skill_score']}}</td>
            </tr>
            @endif
            <!-- End  -->

            <!-- Interview date dan interview score  -->
            @if($data['interview_date'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Interview Date</td> 
                <td width="72%">{{$data['interview_date']}}</td>
            </tr>
            @endif

            @if($data['interview_score'] != 0)
            <tr>
                <td width="28%" style="font-weight:600">Interview Score</td> 
                <td width="72%">{{$data['interview_score']}}</td>
            </tr>
            @endif

            @if($data['probation_start_date'] != null || $data['probation_end_date'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Probation Date</td> 
                <td width="72%">Start {{$data['probation_start_date']}} / End {{$data['probation_end_date']}}</td>
            </tr>
            @endif

            @if($data['assign_date'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Assign Employee Date</td> 
                <td width="72%">{{$data['assign_date']}}</td>
            </tr>
            @endif

            <tr>
                <td width="28%" style="font-weight:600">Email</td> 
                <td width="72%">{{$data['email']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Telphone</td> 
                <td width="72%">{{$data['tlp']}}</td>
            </tr>
            <tr>
                <td width="28%" style="font-weight:600">Short Resume</td> 
                <td width="72%">{{$data['short_resume']}}</td>
            </tr>

            @if($data['award1'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Award 1</td> 
                <td width="72%">{{$data['award1']}}</td>
            </tr>
            @endif

            @if($data['award2'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Award 2</td> 
                <td width="72%">{{$data['award2']}}</td>
            </tr>
            @endif

            @if($data['award3'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Award 3</td> 
                <td width="72%">{{$data['award3']}}</td>
            </tr>
            @endif

            @if($data['award4'] != null)
            <tr>
                <td width="28%" style="font-weight:600">Award 4</td> 
                <td width="72%">{{$data['award4']}}</td>
            </tr>
            @endif
    </tbody>
    </table>
</div>