<?php

namespace App\Services\MoreProgram;

use App\Models\HRIS\ERS;
use App\Models\HR_GA\JobVacancy\ERSVacancy;
use App\Models\HR_GA\JobVacancy\ERSApplicant;
use App\Models\HR_GA\JobVacancy\ERSPsychoTestScore;
use App\Models\GGI_IS\V_GCC_USER;

class job_vacancy{
    public function request()
    {
        $data = ERS::whereNotNull('approve2')
                    ->where('num2', null)
                    ->get();
        // dD($data);

        $index = [];
        foreach ($data as $key => $value) {
            $index[] = [
                // 'nama_ers' => strtoupper($value->string2.' '.$value->string4),
                'nama_ers' => strtoupper($value->string4),
                'ers_id' => $value->ers_id,
                'modul' => $value->modul,
                'nikoriginator' => $value->nikoriginator,
                'tglinput' => $value->tglinput,
                'tglrequest' => $value->tglrequest,
                'tglaktual' => $value->tglaktual,
                'ers_id' => $value->ers_id,
                'string1' => $value->string1,
                'string2' => $value->string2,
                'string3' => $value->string3,
                'string4' => $value->string4,
                'string5' => $value->string5,
                'note1' => $value->note1,
                'note2' => $value->note2,
                'note3' => $value->note3,
                'note4' => $value->note4,
                'note5' => $value->note5,
                'note6' => $value->note6,
                'note7' => $value->note7,
                'note8' => $value->note8,
                'note9' => $value->note9,
                'date1' => $value->date1,
                'date2' => $value->date2,
                'date3' => $value->date3,
                'date4' => $value->date4,
                'date5' => $value->date5,
                'isapproval' => $value->isapproval,
                'nik1' => $value->nik1,
                'nik2' => $value->nik2,
                'nik3' => $value->nik3,
                'nik4' => $value->nik4,
                'nik5' => $value->nik5,
                'approve1' => $value->approve1,
                'approve2' => $value->approve2,
                'approve3' => $value->approve3,
                'approve4' => $value->approve4,
                'approve5' => $value->approve5,
                'current_approve' => $value->current_approve,
                'total_approve' => $value->total_approve,
                'isdisapprove' => $value->isdisapprove,
                'updated_at' => $value->updated_at,
            ];
        }
        // dd($index);
        return $index;
    }

    public function publish()
    {
        $data_publish = ERS::whereNotNull('approve2')
                        ->where('num2', 1)
                        ->get();
        $index = [];
        foreach ($data_publish as $key => $value) {
            $index[] = [
                // 'nama_ers' => strtoupper($value->string2.' '.$value->string4),
                'nama_ers' => strtoupper($value->string2.' '.$value->string4),
                'ers_id' => $value->ers_id,
                'modul' => $value->modul,
                'nikoriginator' => $value->nikoriginator,
                'tglinput' => $value->tglinput,
                'tglrequest' => $value->tglrequest,
                'tglaktual' => $value->tglaktual,
                'ers_id' => $value->ers_id,
                'string1' => $value->string1,
                'string2' => $value->string2,
                'string3' => $value->string3,
                'string4' => $value->string4,
                'string5' => $value->string5,
                'note1' => $value->note1,
                'note2' => $value->note2,
                'note3' => $value->note3,
                'note4' => $value->note4,
                'note5' => $value->note5,
                'note6' => $value->note6,
                'note7' => $value->note7,
                'note8' => $value->note8,
                'note9' => $value->note9,
                'date1' => $value->date1,
                'date2' => $value->date2,
                'date3' => $value->date3,
                'date4' => $value->date4,
                'date5' => $value->date5,
                'isapproval' => $value->isapproval,
                'nik1' => $value->nik1,
                'nik2' => $value->nik2,
                'nik3' => $value->nik3,
                'nik4' => $value->nik4,
                'nik5' => $value->nik5,
                'approve1' => $value->approve1,
                'approve2' => $value->approve2,
                'approve3' => $value->approve3,
                'approve4' => $value->approve4,
                'approve5' => $value->approve5,
                'current_approve' => $value->current_approve,
                'total_approve' => $value->total_approve,
                'isdisapprove' => $value->isdisapprove,
                'updated_at' => $value->updated_at,
            ];
        }
        return $index;
    }

    public function career()
    {
        $data_publish = ERS::whereNotNull('approve2')
                        ->where('num2', 1)
                        ->get();
        $index = [];
        foreach ($data_publish as $key => $value) {
            if ($value->ers_vacancy == null) {
                $penempatan = null;
            }else{
                $penempatan =  $value->ers_vacancy->penempatan;
            }
            $index[] = [
                // 'nama_ers' => strtoupper($value->string2.' '.$value->string4),
                'nama_ers' => strtoupper($value->string4),
                'ers_id' => $value->ers_id,
                'modul' => $value->modul,
                'nikoriginator' => $value->nikoriginator,
                'tglinput' => $value->tglinput,
                'tglrequest' => $value->tglrequest,
                'tglaktual' => $value->tglaktual,
                'ers_id' => $value->ers_id,
                'string1' => $value->string1,
                'string2' => $value->string2,
                'string3' => $value->string3,
                'string4' => strtoupper($value->string4),
                'string5' => $value->string5,
                'note1' => $value->note1,
                'note2' => $value->note2,
                'note3' => $value->note3,
                'note4' => $value->note4,
                'note5' => $value->note5,
                'note6' => $value->note6,
                'note7' => $value->note7,
                'note8' => $value->note8,
                'note9' => $value->note9,
                'date1' => $value->date1,
                'date2' => $value->date2,
                'date3' => $value->date3,
                'date4' => $value->date4,
                'date5' => $value->date5,
                'isapproval' => $value->isapproval,
                'nik1' => $value->nik1,
                'nik2' => $value->nik2,
                'nik3' => $value->nik3,
                'nik4' => $value->nik4,
                'nik5' => $value->nik5,
                'approve1' => $value->approve1,
                'approve2' => $value->approve2,
                'approve3' => $value->approve3,
                'approve4' => $value->approve4,
                'approve5' => $value->approve5,
                'current_approve' => $value->current_approve,
                'total_approve' => $value->total_approve,
                'isdisapprove' => $value->isdisapprove,
                'updated_at' => $value->updated_at,
                'penempatan' => strtoupper($penempatan),
            ];
        }
        // dd($index);
        return $index;
    }

    public function applicant($request)
    {
        // dd($request->all());
        // buat application letter 
        if ($request->application_letter != null) {
            $request->validate([
                'application_letter' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('application_letter');
            $input['application_letter'] = $file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/job_vacancy/application_letter/'),$file1->getClientOriginalName());

            $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }

        // Buat award 
        if ($request->award != null) {
            $request->validate([
                'award' => 'required',
            ]);
            $input = $request->all();
            $file2 = $request->file('award');
            $input['award'] = $file2->getClientOriginalName();
            $file2->move(storage_path('/app/public/job_vacancy/award/'),$file2->getClientOriginalName());

            $file2 = $file2->getClientOriginalName();
        }else {
            $file2 = null;
        }
        $tgl_input = date('Y-m-d');
        // dd($file2);
        $data = [
            '_token' => $request->_token,
            'ers_id' => $request->ers_id,
            'tgl_input' => $tgl_input,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'ttl' => $request->ttl,
            'address' => $request->address,
            'major' => $request->major,
            'education' => $request->education,
            'ipk' => $request->ipk,
            'email' => $request->email,
            'tlp' => $request->tlp,
            'short_resume' => $request->short_resume,
            'award1' => $request->award1,
            'award2' => $request->award2,
            'award3' => $request->award3,
            'award4' => $request->award4,
            'application_letter' => $file1,
            'award' => $file2
        ];

        return $data;
    }

    public function applicant_index()
    {
        $data = ERSApplicant::where('status', 'Apply')->where('process', null)->get();
        $index = [];
        foreach ($data as $key => $value) {
            $ers = ERS::where('ers_id', $value->ers_id)->first();
            $hasil_interview = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->count('id');
            if ($hasil_interview == 0) {
                $result_int = $value->interview_score;
            }else {
                $int = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->sum('interview_score');
                $result_int = round($int/2,2);
            }
            // dd($value->ipk);
            if($ers->ers_vacancy->pendidikan <= $value->education && $ers->ers_vacancy->ipk <= $value->ipk) {
                $type= 'recommended';
            }else {
                $type= 'other';
            }

            $file_psikotest = null;
            // dd($ers->ers_vacancy);
            $index[] = [
                'id' => $value->id,
                'ers_id' => $value->ers_id,
                // 'nama_ers' => strtoupper($ers->string2.' '.$ers->string4),
                'nama_ers' => strtoupper($ers->string4),
                'nik' => $value->nik,
                'nama' => strtoupper($value->nama),
                'gender' => $value->gender,
                'ttl' => $value->ttl,
                'address' => $value->address,
                'major' => $value->major,
                'education' => $value->education,
                'ipk' => $value->ipk,
                'email' => $value->email,
                'tlp' => $value->tlp,
                'short_resume' => $value->short_resume,
                'award1' => $value->award1,
                'award2' => $value->award2,
                'award3' => $value->award3,
                'award4' => $value->award4,
                'application_letter' => $value->application_letter,
                'award' => $value->award,
                'status' => $value->status,
                'psyco_date' => $value->psyco_date,
                'skill_date' => $value->skill_date,
                'interview_date' => $value->interview,
                'psyco_score' => $value->psyco_score,
                'skill_score' => $value->skill_score,
                'interview_score' => $result_int,
                'probation_start_date' => $value->probation_start_date,
                'probation_end_date' => $value->probation_end_date,
                'assign_date' => $value->assign_date,
                'file_psikotest' => $value->file_psikotest,
                '_token' => $value->_token,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'type' => $type
            ];
        }
        // dd($index);
        return $index;
    }

    public function psyco_index()
    {
        $data = ERSApplicant::where('status', 'Psychological Test')->where('process', null)->get();
        $index = [];
        foreach ($data as $key => $value) {
            $ers = ERS::where('ers_id', $value->ers_id)->first();
            $hasil_interview = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->count('id');
            if ($hasil_interview == 0) {
                $result_int = $value->interview_score;
            }else {
                $int = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->sum('interview_score');
                $result_int = round($int/2,2);
            }
            $file_psikotest = null;
            // dd($result_int);
            $index[] = [
                'id' => $value->id,
                'ers_id' => $value->ers_id,
                // 'nama_ers' => strtoupper($ers->string2.' '.$ers->string4),
                'nama_ers' => strtoupper($ers->string4),
                'nik' => $value->nik,
                'nama' => strtoupper($value->nama),
                'gender' => $value->gender,
                'ttl' => $value->ttl,
                'address' => $value->address,
                'major' => $value->major,
                'education' => $value->education,
                'ipk' => $value->ipk,
                'email' => $value->email,
                'tlp' => $value->tlp,
                'short_resume' => $value->short_resume,
                'award1' => $value->award1,
                'award2' => $value->award2,
                'award3' => $value->award3,
                'award4' => $value->award4,
                'application_letter' => $value->application_letter,
                'award' => $value->award,
                'status' => $value->status,
                'psyco_date' => $value->psyco_date,
                'skill_date' => $value->skill_date,
                'interview_date' => $value->interview,
                'probation_start_date' => $value->probation_start_date,
                'probation_end_date' => $value->probation_end_date,
                'psyco_score' => $value->psyco_score,
                'skill_score' => $value->skill_score,
                'interview_score' => $result_int,
                'double_test' => $value->double_test,
                'total_psikotes' => null,
                'total_skill' => null,
                'total_interview' => null,
                'assign_date' => $value->assign_date,
                'file_psikotest' => $file_psikotest,
                '_token' => $value->_token,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at
            ];
        }
        // dd($index);
        return $index;
    }

    public function skills_index()
    {
        $data = ERSApplicant::with('psychotest_score')->where('status', 'Technical Test')->where('process', null)->get();
        // dd($data);
        $index = [];
        foreach ($data as $key => $value) { 
            $ers = ERS::where('ers_id', $value->ers_id)->first();
            $hasil_interview = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->count('id');
            if ($hasil_interview == 0) {
                $result_int = $value->interview_score;
            }else {
                $int = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->sum('interview_score');
                $result_int = round($int/2,2);
            }
            $file = collect($value->psychotest_score)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->first();
            if($file == null){
                $file_psikotest = null;
            }else{
                $file_psikotest = $file->file;
            }
            // dd($file_psikotest);

            $index[] = [
                'id' => $value->id,
                'ers_id' => $value->ers_id,
                // 'nama_ers' => strtoupper($ers->string2.' '.$ers->string4),
                'nama_ers' => strtoupper($ers->string4),
                'departemen' => strtoupper($ers->string1),
                'bagian' => strtoupper($ers->string4),
                'jabatan' => strtoupper($ers->string2),
                'nik' => $value->nik,
                'nama' => strtoupper($value->nama),
                'gender' => $value->gender,
                'ttl' => $value->ttl,
                'address' => $value->address,
                'major' => $value->major,
                'education' => $value->education,
                'ipk' => $value->ipk,
                'email' => $value->email,
                'tlp' => $value->tlp,
                'short_resume' => $value->short_resume,
                'award1' => $value->award1,
                'award2' => $value->award2,
                'award3' => $value->award3,
                'award4' => $value->award4,
                'application_letter' => $value->application_letter,
                'award' => $value->award,
                'status' => $value->status,
                'psyco_date' => $value->psyco_date,
                'skill_date' => $value->skill_date,
                'interview_date' => $value->interview,
                'probation_start_date' => $value->probation_start_date,
                'probation_end_date' => $value->probation_end_date,
                'psyco_score' => $value->psyco_score,
                'skill_score' => $value->skill_score,
                'interview_score' => $result_int,
                'assign_date' => $value->assign_date,
                'file_psikotest'=> $file_psikotest,
                '_token' => $value->_token,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at
            ];
        }
        // dd($index);
        return $index;
    }

    public function interview_index()
    {
        $data = ERSApplicant::with('interview_result')->where('status', 'Interview')->where('process', null)->get();
        $tanggal = date('Y-m-d');
        $index = [];
        foreach ($data as $key => $value) {
            $ers = ERS::where('ers_id', $value->ers_id)->first();
            $hasil_interview = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->count('id');
            $skill_cek = collect($value->skilltest_score)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->count('id');
            $psycho_cek = collect($value->psychotest_score)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->count('id');
            if ($hasil_interview == 0) {
                $result_int = $value->interview_score;
            }else {
                $int = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->sum('interview_score');
                $result_int = round($int/2,2);
            }
            // dd($result_int);
            $file = collect($value->psychotest_score)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->first();
            if($file == null){
                $file_psikotest = null;
            }else{
                $file_psikotest = $file->file;
            }
            // dd($file_psikotest);

            // dd($ers);
            $index[] = [
                'id' => $value->id,
                'ers_id' => $value->ers_id,
                // 'nama_ers' => strtoupper($ers->string2.' '.$ers->string4),
                'nama_ers' => strtoupper($ers->string4),
                'departemen' => strtoupper($ers->string1),
                'bagian' => strtoupper($ers->string4),
                'jabatan' => strtoupper($ers->string2),
                'nik' => $value->nik,
                'nama' => strtoupper($value->nama),
                'gender' => $value->gender,
                'ttl' => $value->ttl,
                'address' => $value->address,
                'major' => $value->major,
                'education' => $value->education,
                'ipk' => $value->ipk,
                'email' => $value->email,
                'tlp' => $value->tlp,
                'short_resume' => $value->short_resume,
                'award1' => $value->award1,
                'award2' => $value->award2,
                'award3' => $value->award3,
                'award4' => $value->award4,
                'application_letter' => $value->application_letter,
                'award' => $value->award,
                'status' => $value->status,
                'psyco_date' => $value->psyco_date,
                'skill_date' => $value->skill_date,
                'interview_date' => $value->interview,
                'interview_user' => $hasil_interview,
                'probation_start_date' => $value->probation_start_date,
                'probation_end_date' => $value->probation_end_date,
                'psyco_score' => $value->psyco_score,
                'skill_score' => $value->skill_score,
                'interview_score' => $result_int,
                'assign_date' => $value->assign_date,
                '_token' => $value->_token,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'skill_cek' => $skill_cek,
                'psycho_cek' => $psycho_cek,
                'tanggal' => $tanggal,
                'file_psikotest' => $file_psikotest
            ];
        }
        // dd($index);
        return $index;
    }

    public function probation_index()
    {
        $data = ERSApplicant::with('psychotest_score')->where('status', 'Probation')->where('process', null)->get();
        $index = [];
        foreach ($data as $key => $value) {
            $ers = ERS::where('ers_id', $value->ers_id)->first();
            $hasil_interview = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->count('id');
            if ($hasil_interview == 0) {
                $result_int = $value->interview_score;
            }else {
                $int = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->sum('interview_score');
                $result_int = round($int/2,2);
            }
            $file = collect($value->psychotest_score)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->first();
            if($file == null){
                $file_psikotest = null;
            }else{
                $file_psikotest = $file->file;
            }
            // dd($result_int);
            // dd($ers);
            $index[] = [
                'id' => $value->id,
                'ers_id' => $value->ers_id,
                // 'nama_ers' => strtoupper($ers->string2.' '.$ers->string4),
                'nama_ers' => strtoupper($ers->string4),
                'departemen' => strtoupper($ers->string1),
                'bagian' => strtoupper($ers->string4),
                'jabatan' => strtoupper($ers->string2),
                'nik' => $value->nik,
                'nama' => strtoupper($value->nama),
                'gender' => $value->gender,
                'ttl' => $value->ttl,
                'address' => $value->address,
                'major' => $value->major,
                'education' => $value->education,
                'ipk' => $value->ipk,
                'email' => $value->email,
                'tlp' => $value->tlp,
                'short_resume' => $value->short_resume,
                'award1' => $value->award1,
                'award2' => $value->award2,
                'award3' => $value->award3,
                'award4' => $value->award4,
                'application_letter' => $value->application_letter,
                'award' => $value->award,
                'status' => $value->status,
                'psyco_date' => $value->psyco_date,
                'skill_date' => $value->skill_date,
                'interview_date' => $value->interview,
                'probation_start_date' => $value->probation_start_date,
                'probation_end_date' => $value->probation_end_date,
                'assign_date' => $value->assign_date,
                'psyco_score' => $value->psyco_score,
                'skill_score' => $value->skill_score,
                'file_psikotest' => $file_psikotest,
                'interview_score' => $result_int,
                '_token' => $value->_token,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at
            ];
        }
        // dd($index);
        return $index;
    }

    public function disqualification_index()
    {
        $data = ERSApplicant::where('status', 'Disqualification')->where('process', null)->get();
        // dd($data);
        $index = [];
        foreach ($data as $key => $value) {
            $tanggal = date('Y-m-d');
            $tiga_bulan = date('Y-m-d', strtotime($value->tgl_input. ' + 3 months'));
            if ($tanggal <= $tiga_bulan) {  
                $ers = ERS::where('ers_id', $value->ers_id)->first();
                $hasil_interview = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->count('id');
                if ($hasil_interview == 0) {
                    $result_int = $value->interview_score;
                }else {
                    $int = collect($value->interview_result)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->sum('interview_score');
                    $result_int = round($int/2,2);
                }
                $file = collect($value->psychotest_score)->where('ers_id', $ers->ers_id)->where('applicant_id', $value->id)->first();
                if($file == null){
                    $file_psikotest = null;
                }else{
                    $file_psikotest = $file->file;
                }
                // dd($ers);
                $index[] = [
                    'id' => $value->id,
                    'ers_id' => $value->ers_id,
                    'tgl_input' => $value->tgl_input,
                    // 'nama_ers' => strtoupper($ers->string2.' '.$ers->string4),
                    'nama_ers' => strtoupper($ers->string4),
                    'departemen' => strtoupper($ers->string1),
                    'bagian' => strtoupper($ers->string4),
                    'jabatan' => strtoupper($ers->string2),
                    'nik' => $value->nik,
                    'nama' => strtoupper($value->nama),
                    'gender' => $value->gender,
                    'ttl' => $value->ttl,
                    'address' => $value->address,
                    'major' => $value->major,
                    'education' => $value->education,
                    'ipk' => $value->ipk,
                    'email' => $value->email,
                    'tlp' => $value->tlp,
                    'short_resume' => $value->short_resume,
                    'award1' => $value->award1,
                    'award2' => $value->award2,
                    'award3' => $value->award3,
                    'award4' => $value->award4,
                    'application_letter' => $value->application_letter,
                    'award' => $value->award,
                    'status' => $value->status,
                    'psyco_date' => $value->psyco_date,
                    'skill_date' => $value->skill_date,
                    'interview_date' => $value->interview,
                    'psyco_score' => $value->psyco_score,
                    'skill_score' => $value->skill_score,
                    'interview_score' => $result_int,
                    'probation_start_date' => $value->probation_start_date,
                    'probation_end_date' => $value->probation_end_date,
                    'assign_date' => $value->assign_date,
                    'file_psikotest' => $value->file_psikotest,
                    '_token' => $value->_token,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at
                ];
            }
        }

        // dd($index);
        return $index;
    }

    public function store_psyco($request)
    {
        // dd($request->all());
        // Total Psikotest 
            if ($request->epps == null) {
                $epps = 0;
            }else {
                $epps = 1;
            }

            if ($request->tkd == null) {
                $tkd = 0;
            }else {
                $tkd = 1;
            }

            if ($request->disc == null) {
                $disc = 0;
            }else {
                $disc = 1;
            }

            if ($request->eas == null) {
                $eas = 0;
            }else {
                $eas = 1;
            }

            if ($request->paulin == null) {
                $paulin = 0;
            }else {
                $paulin = 1;
            }

            if ($request->tmc == null) {
                $tmc = 0;
            }else {
                $tmc = 1;
            }

            if ($request->score1 == null) {
                $score1 = 0;
            }else {
                $score1 = 1;
            }

            if ($request->score2 == null) {
                $score2 = 0;
            }else {
                $score2 = 1;
            }

            if ($request->score3 == null) {
                $score3 = 0;
            }else {
                $score3 = 1;
            }
        // End cek value 
        // dd($epps);
        $total = $request->epps + $request->tkd + $request->disc + $request->eas + $request->paulin + $request->tmc + $request->score1 + $request->score2 + $request->score3;
        $pembagi = $epps + $tkd + $disc + $eas + $paulin + $tmc + $score1 + $score2 + $score3;
        // dd($pembagi);
        if ($total != 0 && $pembagi != 0) {
            $total_psikotes = round($total/$pembagi,2);
        }else {
            $total_psikotes = 0;
        }
        if ($request->file != null) {
            $request->validate([
                'file' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('file');
            $input['file'] = $file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/job_vacancy/file_psikotest/'),$file1->getClientOriginalName());

            $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }

        $input = [
            '_token'=>$request->_token,
            'ers_id'=>$request->ers_id,
            'applicant_id'=>$request->applicant_id,
            'epps'=>$request->epps,
            'tkd'=>$request->tkd,
            'disc'=>$request->disc,
            'eas'=>$request->eas,
            'paulin'=>$request->paulin,
            'tmc'=>$request->tmc,
            'test1'=>$request->test1,
            'score1'=>$request->score1,
            'test2'=>$request->test2,
            'score2'=>$request->score2,
            'test3'=>$request->test3,
            'score3'=>$request->score3,
            'conclusion'=>$request->conclusion,
            'psyco_score' => $total_psikotes,
            'file' => $file1
        ];
        return $input;
    }

    public function skill_store($request)
    {
        // Cek value 
        if ($request->score_test == null) {
            $skill_te = 0;
        }else {
            $skill_te = 1;
        }

        if ($request->english_score == null) {
            $english = 0;
        }else {
            $english = 1;
        }

        if ($request->score1 == null) {
            $score1 = 0;
        }else {
            $score1 = 1;
        }

        if ($request->score2 == null) {
            $score2 = 0;
        }else {
            $score2 = 1;
        }

        if ($request->score3 == null) {
            $score3 = 0;
        }else {
            $score3 = 1;
        }
    
        $total_skills = $request->score_test + $request->english_score + $request->score1 + $request->score2 + $request->score3;
        $pembagi = $skill_te + $english + $score1 + $score2 + $score3;
        if ($total_skills != 0 && $pembagi != 0) {
            $total_skill = round($total_skills/$pembagi,2);
        }else {
            $total_skill = 0;
        }
        
        $input = [
            '_token' => $request->_token,
            'ers_id' => $request->ers_id,
            'applicant_id' => $request->applicant_id,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'jabatan' => $request->jabatan,
            'english_score' => $request->english_score,
            'skilltest_name' => $request->skilltest_name,
            'score_test' => $request->score_test,
            'test1' => $request->test1,
            'score1' => $request->score1,
            'test2' => $request->test2,
            'score2' => $request->score2,
            'test3' => $request->test3,
            'score3' => $request->score3,
            'conclusion' => $request->conclusion,
            'interview_date' => $request->interview_date,
            'interview_location' => $request->interview_location,
            'skill_score'=> $total_skill
        ];
        return $input;
    }

    public function interview_store($request)
    {
        // Total Interview 
        $penampilan = $request->penampilan;
        $pengetahuan = $request->pengetahuan;
        $motivasi = $request->motivasi;
        $ambisi = $request->ambisi;
        $inisiatif = $request->inisiatif;
        $komunikasi = $request->komunikasi;
        $berfikir = $request->berfikir;
        $teamwork = $request->teamwork;
        
        $total = $penampilan + $pengetahuan + $motivasi + $ambisi + $inisiatif + $komunikasi + $berfikir + $teamwork;
        if ($total != 0) {
            $total_interview = round($total/8,2);
        }else {
            $total_interview = 0;
        }
        
        $input = [
            '_token' => $request->_token,
            'penampilan' => $request->penampilan,
            'remark_penampilan' => $request->remark_penampilan,
            'pengetahuan' => $request->pengetahuan,
            'remark_pengetahuan' => $request->remark_pengetahuan,
            'motivasi' => $request->motivasi,
            'remark_motivasi' => $request->remark_motivasi,
            'ambisi' => $request->ambisi,
            'remark_ambisi' => $request->remark_ambisi,
            'inisiatif' => $request->inisiatif,
            'remark_inisiatif' => $request->remark_inisiatif,
            'komunikasi' => $request->komunikasi,
            'remark_komunikasi' => $request->remark_komunikasi,
            'berfikir' => $request->berfikir,
            'remark_berfikir' => $request->remark_berfikir,
            'teamwork' => $request->teamwork,
            'remark_teamwork' => $request->remark_teamwork,
            'user_kategory' => $request->user_kategory,
            'ers_id' => $request->ers_id,
            'applicant_id' => $request->applicant_id,
            'interviewer_name1' => $request->interviewer_name1,
            'conclusion1' => $request->conclusion1,
            'recomendation1' => $request->recomendation1,
            'interviewer_name2' => $request->interviewer_name2,
            'conclusion2' => $request->conclusion2,
            'recomendation2' => $request->recomendation2,
            'decision' => $request->decision,
            'interview_score' => $total_interview,
            'position' => $request->position,
            'come_to_work_date' => $request->come_to_work_date,
            'employee_status' => $request->employee_status,
            'facility_benefits' => $request->facility_benefits,
            'other_facility' => $request->other_facility,
            'salary' => $request->salary,
        ];
        // dd($input);
        return $input;
    }
}