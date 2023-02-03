<?php

namespace App\Http\Controllers\HR_GA\JobVacancy;

use Auth;
use DateTime;
use App\Branch;
use App\Models\HRIS\ERS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MoreProgram\job_vacancy;
use App\Models\HR_GA\JobVacancy\ERSVacancy;
use App\Models\HR_GA\JobVacancy\ERSApplicant;
use App\Models\HR_GA\JobVacancy\ERSInterview;
use App\Services\MoreProgram\job_orientation;
use App\Models\HR_GA\JobVacancy\ERSTestSkills;
use App\Services\HR_GA\JobVacancy\NotifPsikotest;
use App\Models\HR_GA\JobVacancy\ERSPsychoTestScore;
use App\Services\HR_GA\JobVacancy\NotifGagalRecruitment;

class JobVacancyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function employee_tracking()
    {
        $page = 'dashboard';

        $data = (new job_vacancy)->request();
        $data_publish = (new job_vacancy)->publish();
        $data_applicant = (new job_vacancy)->applicant_index();
        $data_psyco = (new job_vacancy)->psyco_index();
        $data_skills = (new job_vacancy)->skills_index();
        $data_interview = (new job_vacancy)->interview_index();
        $data_probation = (new job_vacancy)->probation_index();
        $data_disqualification = (new job_vacancy)->disqualification_index();
        $vacancy = ERSVacancy::all();
        // dd($data_disqualification);
        

        $count_request = collect($data)->count('ers_id');
        $count_publish = collect($data_publish)->count('ers_id');
        $count_applicant = collect($data_applicant)->count('ers_id');
        $count_psyco = collect($data_psyco)->count('ers_id');
        $count_skills = collect($data_skills)->count('ers_id');
        $count_interview = collect($data_interview)->count('ers_id');
        $count_probation = collect($data_probation)->count('ers_id');
        $count_disqualification = collect($data_disqualification)->count('ers_id');
        // dd($count_probation);

        return view('hr_ga.job_vacancy.job_aplicant.employee_tracking', compact('count_disqualification','data_disqualification','count_probation','data_probation','data_interview','count_interview','data_skills','count_skills','data_psyco','count_psyco','data_applicant','count_applicant','vacancy','count_publish','data_publish','count_request','page', 'data'));
    }
    
    public function request_description($id)
    {
        $data = ERS::with('ers_vacancy')->findorfail($id);
        $branch = Branch::all();
        $data_departemen= (new job_orientation)->semuaDepartemen();
        // dd($data);
        $page = 'dashboard';
        return view('hr_ga.job_vacancy.job_aplicant.partials.request.vacancy_desc', compact('data_departemen','branch','page', 'data'));
    }

    public function publish_description($id)
    {
        $page = 'dashboard';
        $data = ERS::with('ers_vacancy')->findorfail($id);
        $branch = Branch::all();
        // dd($branch);
        // dd($data);

        return view('hr_ga.job_vacancy.job_aplicant.partials.publish.vacancy_desc', compact('branch','data','page'));
    }

    public function desc_update(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $updateVacancy = [
            'ers_id' => $request->ers_id,
            'uraian_singkat' => $request->uraian_singkat,
            'jobdesk' => $request->jobdesk,
            'maximal_usia' => $request->maximal_usia,
            'ipk' => $request->ipk,
            'pendidikan' => $request->pendidikan,
            'penempatan' => $request->penempatan,
            'info_lainnya' => $request->info_lainnya,
            'minimal_salary' => $request->minimal_salary,
            'maximal_salary' => $request->maximal_salary,
            'other_benefit' => $request->other_benefit,
        ];
        // dd($updateVacancy);
        $data = ERS::with('ers_vacancy')->findorfail($request->ers_id);
        // dd($data->ers_vacancy);
        if ($data->ers_vacancy == null) {
            $show = ERSVacancy::create($updateVacancy);
        }else {
            $get = ERSVacancy::where('ers_id', $request->ers_id)->first();
            ERSVacancy::whereId($get->id)->update($updateVacancy);
        }
        ERS::where('ers_id', $data->ers_id)
            ->update([
                'string1' => $request->string1,
                'string2' => $request->string2,
                'string4' => $request->string4,
                'string5' => $request->string5,
                // 'note5' => $request->note5,
                'num1' => $request->num1,
                'note6' => $request->note6,
                'note9' => $request->note9,
                'note7' => $request->note7,
            ]);

        return redirect()->route('employee-tracking');
    }

    public function publish_update(Request $request)
    {
        ERS::where('ers_id', $request->ers_id)
            ->update([
                'num2' => $request->num2
            ]);
        return back();
    }

    public function request_search(Request $request)
    {
        $data = (new job_vacancy)->request();
        $title = strtoupper($request->title);
        $data_request = collect($data)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['nama_ers']);
        });

        return response()->json($data_request);
    }

    public function publish_search(Request $request)
    {
        $data = (new job_vacancy)->publish();
        $title = strtoupper($request->title);
        $data_request = collect($data)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['nama_ers']);
        });

        return response()->json($data_request);
    }

    public function applicant_search(Request $request)
    {
        $data = (new job_vacancy)->applicant_index();
        $title = strtoupper($request->title);
        $data_request = collect($data)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['nama']);
        });

        // dd($data_request);
        return response()->json($data_request);
    }

    public function psikologi_search(Request $request)
    {
        $data = (new job_vacancy)->psyco_index();
        $title = strtoupper($request->title);
        $data_request = collect($data)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['nama']);
        });

        // dd($data_request);
        return response()->json($data_request);
    }

    public function skill_search(Request $request)
    {
        $data = (new job_vacancy)->skills_index();
        $title = strtoupper($request->title);
        $data_request = collect($data)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['nama']);
        });

        // dd($data_request);
        return response()->json($data_request);
    }

    public function interview_search(Request $request)
    {
        $data = (new job_vacancy)->interview_index();
        $title = strtoupper($request->title);
        $data_request = collect($data)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['nama']);
        });

        // dd($data_request);
        return response()->json($data_request);
    }

    public function public_delete($id)
    {
        ERS::where('ers_id', $id)
        ->update([
            'num2' => 2
        ]);

        return back();
    }

    public function update_all(Request $request)
    {
        $ids = $request->ids;
        $update = [
            'num2' => 2
        ];
        ERS::whereIn('ers_id',explode(",",$ids))->update($update);
        return response()->json(['success'=>"Request Deleted successfully."]);
    }

    public function disqualification_all(Request $request)
    {
        $ids = $request->ids;
        // dd($ids);
        $update = [
            'status' => 'Disqualification'
        ];
        ERSApplicant::whereIn('id',explode(",",$ids))->update($update);
        return response()->json(['success'=>"Applicant Deleted successfully."]);
    }
    
    public function details()
    {
        $page = 'dashboard';
        return view('hr_ga.job_vacancy.job_aplicant.details_applicant', compact('page'));
    }

    public function applicant_detail($id)
    {
        // dd($id);
        $page = 'dashboard';
        // Cek status applicant 
        $applicant = ERSApplicant::with('psychotest_score', 'skilltest_score','interview_result')->findorfail($id);
        // dd($applicant);
        if ($applicant->status == "Apply") {
            $data_applicant = (new job_vacancy)->applicant_index();
            $data = collect($data_applicant)->where('id', $id)->first();
            // dd($data);
        }elseif ($applicant->status == "Psychological Test") {
            $data_psyco = (new job_vacancy)->psyco_index();
            $data = collect($data_psyco)->where('id', $id)->first();
        }elseif ($applicant->status == "Technical Test") {
            $data_skills = (new job_vacancy)->skills_index();
            $data = collect($data_skills)->where('id', $id)->first();
        }elseif ($applicant->status == "Interview") {
            $data_interview = (new job_vacancy)->interview_index();
            $data = collect($data_interview)->where('id', $id)->first();
        }elseif ($applicant->status == "Probation") {
            $data_probation = (new job_vacancy)->probation_index();
            $data = collect($data_probation)->where('id', $id)->first();
        }elseif ($applicant->status == "Interview") {
            $data_interview = (new job_vacancy)->interview_index();
            $data = collect($data_interview)->where('id', $id)->first();
        }elseif ($applicant->status == "Disqualification") {
            $data_disqualification = (new job_vacancy)->disqualification_index();
            $data = collect($data_disqualification)->where('id', $id)->first();
        }
        // dd($applicant->psychotest_score );
        
        // dd($data_applicant);
        return view('hr_ga.job_vacancy.job_aplicant.details_applicant', compact('applicant','data','page'));
    }

    public function disqualification($id)
    {
        // dd($id);
        $data = ERSApplicant::findorfail($id);
        $ers = ERS::where('ers_id', $data->ers_id)->first();
        // dd($ers);
        $tanggal = new DateTime();
        // dd($tanggal);
        $update = [
            'status' => 'Disqualification',
            'disqualification_date' => $tanggal
        ];
        $input = [
            'id' => $id,
            'status' => 'Disqualification',
            'posisi' => $ers->string4
        ];
        // dd($update);
        ERSApplicant::whereid($id)->update($update);
        NotifGagalRecruitment::runJob($input);
        return back();
    }

    public function psyco_date_update(Request $request)
    {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
        // dd($request->all());
        $data = ERSApplicant::findorfail($request->id);
        if ($request->double_test == 'No') {
            $tanggal = new DateTime($request->psyco_date);
            // dd($tanggal);
            $update = [
                'double_test' => 'No',
                'status' => 'Psychological Test',
                'psyco_date' => $request->psyco_date,
                'psyco_location' => $request->psyco_location
            ];
            // dd($update);
            $input = [
                'id' => $request->id,
                'status' => 'Psychological Test',
                'tanggal' => $tanggal->format('Y-m-d H:i:s'),
                'location' => $request->psyco_location,
                'posisi' => $request->posisi
            ];
            // dd($input);
            ERSApplicant::whereid($request->id)->update($update);
            NotifPsikotest::runJob($input);
        }elseif ($request->double_test == 'True2') {
            $tanggal = new DateTime($request->interview);
            // dd($tanggal);
            $update = [
                'double_test' => 'True2',
                'status' => 'Interview',
                'interview' => $request->interview,
                'interview_location' => $request->interview_location
            ];
            // dd($update);
            $input = [
                'id' => $request->id,
                'status' => 'Interview',
                'tanggal' => $tanggal->format('Y-m-d H:i:s'),
                'location' => $request->interview_location,
                'posisi' => $request->posisi
            ];
            // dd($input);
            ERSApplicant::whereid($request->id)->update($update);
            NotifPsikotest::runJob($input);
        }else {
            $tanggal = new DateTime($request->double_test_date);
            $update = [
                'double_test' => 'True',
                'status' => 'Psychological Test',
                'psyco_date' => $request->double_test_date,
                'psyco_location' => $request->double_test_location,
                'skill_date' => $request->double_test_date,
                'skill_location' => $request->double_test_location
            ];
            $input = [
                'id' => $request->id,
                'status' => 'Psychological Test',
                'tanggal' => $tanggal->format('Y-m-d H:i:s'),
                'location' => $request->double_test_location,
                'posisi' => $request->posisi
            ];
            // dd($input);
            ERSApplicant::whereid($request->id)->update($update);
            NotifPsikotest::runJob($input);
        }
        
        return back();
    }

    public function psychotest_score(Request $request)
    {
        // dd($request->all());
        $data_input = (new job_vacancy)->store_psyco($request);
        // dd($data_input);
        $id = $request->applicant_id;
        
        // Cek psychotest applicant apakah sudah terdaftar atau belum 
            $cek = ERSPsychoTestScore::where('ers_id', $request->ers_id)->where('applicant_id', $request->applicant_id)->count('id');
            if ($cek == 0) {
                ERSPsychoTestScore::create($data_input);
            }else {
                $data_update = ERSPsychoTestScore::where('ers_id', $request->ers_id)->where('applicant_id', $request->applicant_id)->first();
                ERSPsychoTestScore::whereid($data_update->id)->update($data_input);
            }
        // End cek 
        
        if ($request->next_step != null) { 
            // Dicek apakah test skill dulu atau interview dulu
            if ($request->next_step == 'Technical Test') {
            $tanggal = new DateTime($request->test_skill_date);
            // Kondisi applicant 
            if ($request->conclusion == 'Qualify') {
                $update = [
                    'status' => 'Technical Test',
                    'skill_date'=> $request->test_skill_date,
                    'skill_location' =>$request->skill_location,
                    'psyco_score' => $data_input['psyco_score']
                ];
                $input = [
                    'id' => $request->applicant_id,
                    'status' => 'Technical Test',
                    'tanggal' => $tanggal->format('Y-m-d H:i:s'),
                    'location' => $request->skill_location,
                    'posisi' => $request->posisi
                ];
                // dd($input);
                NotifPsikotest::runJob($input);
            }else {
                $update = [
                    'status' => 'Disqualification',
                    'psyco_score' => $data_input['psyco_score'],
                    'disqualification_date' => $tanggal
                ];
                $input = [
                    'id' => $id,
                    'status' => 'Disqualification',
                    'posisi' => $request->posisi
                ];
                // dd($update);
                NotifGagalRecruitment::runJob($input);
            }
            ERSApplicant::whereid($request->applicant_id)->update($update);
            }elseif ($request->next_step == 'Interview') {
                $tanggal = new DateTime($request->interview_date);
                if ($request->conclusion == 'Qualify') {
                    $update = [
                        'status' => 'Interview',
                        'interview'=> $request->interview_date,
                        'interview_location' =>$request->interview_location,
                        'psyco_score' => $data_input['psyco_score']
                    ];
                    $input = [
                        'id' => $request->applicant_id,
                        'status' => 'Interview',
                        'tanggal' => $tanggal->format('Y-m-d H:i:s'),
                        'location' => $request->interview_location,
                        'posisi' => $request->posisi
                    ];
                    // dd($input);
                    NotifPsikotest::runJob($input);
                }else {
                    $update = [
                        'status' => 'Disqualification',
                        'psyco_score' => $data_input['psyco_score'],
                        'disqualification_date' => $tanggal
                    ];
                    $input = [
                        'id' => $id,
                        'status' => 'Disqualification',
                        'posisi' => $request->posisi
                    ];
                    // dd($update);
                    NotifGagalRecruitment::runJob($input);
                }
                ERSApplicant::whereid($request->applicant_id)->update($update);
            }
        }else {
            $tanggal = new DateTime();

            if ($request->conclusion == 'Qualify') {
                $update = [
                    'status' => 'Technical Test',
                    'psyco_score' => $data_input['psyco_score']
                ];
            }else {
                $update = [
                    'status' => 'Disqualification',
                    'psyco_score' => $data_input['psyco_score'],
                    'disqualification_date' => $tanggal
                ];
                // $input = [
                //     'id' => $id,
                //     'status' => 'Disqualification',
                //     'psyco_score' => $data_input['psyco_score'],
                //     'posisi' => $request->posisi
                // ];
                // // dd($update);
                // NotifGagalRecruitment::runJob($input);
            }
            ERSApplicant::whereid($request->applicant_id)->update($update);
        }

        return back();
    }

    public function testskill_score(Request $request)
    {
        // dd($request->all());
        $data_input = (new job_vacancy)->skill_store($request);
        // dd($data_input);
        $tanggal = new DateTime($request->interview_date);
        $id = $request->applicant_id;

        // Cek applicant 
            $cek = ERSTestSkills::where('ers_id', $request->ers_id)->where('applicant_id', $request->applicant_id)->count('id');
            if ($cek == 0) {
                ERSTestSkills::create($data_input);
            }else {
                $data_update = ERSTestSkills::where('ers_id', $request->ers_id)->where('applicant_id', $request->applicant_id)->first();
                ERSTestSkills::whereid($data_update->id)->update($data_input);
            }
        // End Cek 
        
        // Cek kondisi applicant 
        if ($request->conclusion == 'Qualify') {
            $update = [
                'status' => 'Interview',
                'interview'=> $request->interview_date,
                'interview_location'=> $request->interview_location,
                'skill_score' => $data_input['skill_score']
            ];
            $input = [
                'id' => $request->applicant_id,
                'status' => 'Interview',
                'tanggal' => $tanggal->format('Y-m-d H:i:s'),
                'location' => $request->interview_location,
                'posisi' => $request->posisi
            ];
            // dd($input);
            NotifPsikotest::runJob($input);
        }else {
            $update = [
                'status' => 'Disqualification',
                'skill_score' => $data_input['skill_score'],
                'disqualification_date' => $tanggal
            ];
            $input = [
                'id' => $id,
                'status' => 'Disqualification',
                'posisi' => $request->posisi
            ];
            // dd($update);
            NotifGagalRecruitment::runJob($input);
        }
        ERSApplicant::whereid($request->applicant_id)->update($update);

        return back();
    }

    public function testskill_update(Request $request)
    {
        // dd($request->all());
        $data_input = (new job_vacancy)->skill_store($request);

        // Cek applicant 
            $cek = ERSTestSkills::where('ers_id', $request->ers_id)->where('applicant_id', $request->applicant_id)->count('id');
            if ($cek == 0) {
                ERSTestSkills::create($data_input);
            }else {
                $data_update = ERSTestSkills::where('ers_id', $request->ers_id)->where('applicant_id', $request->applicant_id)->first();
                ERSTestSkills::whereid($data_update->id)->update($data_input);
            }
        //End cek

        // Cek kondisi applicant 
        if ($request->conclusion == 'Qualify') {
            $update = [
                'skill_score' => $data_input['skill_score']
            ];
        }else {
            $update = [
                'status' => 'Disqualification',
                'skill_score' => $data_input['skill_score'],
                'disqualification_date' => $tanggal
            ];
            $input = [
                'id' => $id,
                'status' => 'Disqualification',
                'posisi' => $request->posisi
            ];
            // dd($update);
            NotifGagalRecruitment::runJob($input);
        }
        ERSApplicant::whereid($request->applicant_id)->update($update);
        return back();
    }
     
    public function psychotest_update(Request $request)
    {
        // dd($request->all());
        $data_input = (new job_vacancy)->store_psyco($request);
        // dd($data_input);
        $id = $request->applicant_id;
        
        // Cek psychotest applicant apakah sudah terdaftar atau belum 
            $cek = ERSPsychoTestScore::where('ers_id', $request->ers_id)->where('applicant_id', $request->applicant_id)->count('id');
            if ($cek == 0) {
                ERSPsychoTestScore::create($data_input);
            }else {
                $data_update = ERSPsychoTestScore::where('ers_id', $request->ers_id)->where('applicant_id', $request->applicant_id)->first();
                ERSPsychoTestScore::whereid($data_update->id)->update($data_input);
            }
        // End cek 
        
        if ($request->conclusion == 'Qualify') {
            $update = [
                'skill_location' =>$request->skill_location,
                'psyco_score' => $data_input['psyco_score']
            ];
        }else {
            $update = [
                'status' => 'Disqualification',
                'psyco_score' => $data_input['psyco_score'],
                'disqualification_date' => $tanggal
            ];
            $input = [
                'id' => $id,
                'status' => 'Disqualification',
                'posisi' => $request->posisi
            ];
            // dd($update);
            NotifGagalRecruitment::runJob($input);
        }
        ERSApplicant::whereid($request->applicant_id)->update($update);

        return back();
    }

    public function testskill_date(Request $request)
    {
        $tanggal = new DateTime($request->test_skill_date);
        $update = [
            'skill_date'=> $request->test_skill_date,
            'skill_location' =>$request->skill_location,
        ];
        $input = [
            'id' => $request->applicant_id,
            'status' => 'Technical Test',
            'tanggal' => $tanggal->format('Y-m-d H:i:s'),
            'location' => $request->skill_location,
            'posisi' => $request->posisi
        ];
        // dd($input);
        ERSApplicant::whereid($request->applicant_id)->update($update);
        NotifPsikotest::runJob($input);

        return back();
    }

    public function psychotest_date(Request $request)
    {
        // dd($request->all());
        $tanggal = new DateTime($request->psyco_date);
        $update = [
            'psyco_date'=> $request->psyco_date,
            'psyco_location' =>$request->psyco_location,
        ];
        $input = [
            'id' => $request->applicant_id,
            'status' => 'Psychological Test',
            'tanggal' => $tanggal->format('Y-m-d H:i:s'),
            'location' => $request->psyco_location,
            'posisi' => $request->posisi
        ];
        // dd($input);
        ERSApplicant::whereid($request->applicant_id)->update($update);
        NotifPsikotest::runJob($input);

        return back();
    }

    public function probation_update($id)
    {
        $tanggal =  date('Y-m-d');

        $update = [
            'status' => 'Probation',
            'probation_start_date' => $tanggal
        ];

        ERSApplicant::whereId($id)->update($update);
        // dd($update);

        return back();
    }

    public function interview_store(Request $request)
    {
        // dd($request->all());
        $data_input = (new job_vacancy)->interview_store($request);
        // dd($data_input);
        $cek = ERSInterview::where('ers_id', $request->ers_id)
                            ->where('applicant_id', $request->applicant_id)
                            ->where('user_kategory', $request->user_kategory)
                            ->count('id');
        // dd($cek);
        if ($cek == 0 && $request->user_kategory == 'USER') {
            ERSInterview::create($data_input);
        }else {
            ERSInterview::whereid($request->id)->update($data_input);
        }

        if ($cek == 0 && $request->user_kategory == 'HRD') {
            $data_input['facility_benefits'] = json_encode($request->facility_benefits);
            ERSInterview::create($data_input);
        }else {
            $data_input['facility_benefits'] = json_encode($request->facility_benefits);
            ERSInterview::whereid($request->id)->update($data_input);
        }
        return back();
    }

    public function end_probation($id)
    {
        $tanggal =  date('Y-m-d');

        $update = [
            'status' => 'Probation End',
            'probation_end_date' => $tanggal
        ];

        ERSApplicant::whereId($id)->update($update);
        // dd($update);

        return back();
    }

    public function process_end($id)
    {
        $tanggal =  date('Y-m-d');

        $update = [
            'process' => 'End',
            'end_date' => $tanggal
        ];

        ERSApplicant::whereId($id)->update($update);
        // dd($update);

        return back();
    }
}
