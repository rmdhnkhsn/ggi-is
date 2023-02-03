
<div class="modal fade" id="TestSkills-{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            @if($value['skill_date'] != null)
            <form action="{{ route('applicant-testskill_update')}}" method="post" enctype="multipart/form-data" style="width:100%">
                @csrf
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <div class="title-24">Fit & Propper Test</div>
                        <div class="title-14-dark">Input score for <span style="font-weight:500">{{$value['nama']}}</span></div> 
                    </div>
                    <input type="hidden" name="ers_id" id="ers_id" value="{{$value['ers_id']}}">
                    <input type="hidden" name="applicant_id" id="applicant_id" value="{{$value['id']}}">
                    <input type="hidden" class="form-control border-input-10" name="departemen" value="{{$value['departemen']}}" required/>
                    <input type="hidden" class="form-control border-input-10" name="bagian" value="{{$value['bagian']}}" required/>
                    <input type="hidden" class="form-control border-input-10" name="jabatan" value="{{$value['jabatan']}}" required/>

                    <div class="col-md-6">
                        <span class="title-sm">Departemen</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" value="{{$value['departemen']}}" required readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Bagian</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" value="{{$value['bagian']}}" required readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Jabatan</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" value="{{$value['jabatan']}}" required readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">English Language</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="english_score" value="" placeholder="score of languange" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Skill Test Name</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" name="skilltest_name" value="" placeholder="skill test name"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Score Test</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="score_test" value="" placeholder="score of test" />
                        </div>
                    </div>
                    <div class="col-12 justify-center mb-3" style="gap:1.5rem">
                        <div class="title-14 no-wrap">More Skills Test</div>
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Test Name 1</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" name="test1" value="" placeholder="test name 1"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Score 1</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="score1" value="" placeholder="score 1"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Test Name 2</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" name="test2" value="" placeholder="test name 2"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Score 2</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="score2" value="" placeholder="score 2"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Test Name 3</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input-10" name="test3" value="" placeholder="test name 3"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Score 3</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="score3" value="" placeholder="score 3"/>
                        </div>
                    </div>
                    <div class="col-12 justify-center mb-3" style="gap:1.5rem">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Conclusion</span>
                        <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                            <div class="justify-start">
                                <div class="radioContainer">
                                    <input type="radio" name="conclusion" value="Qualify" id="testQualify-{{$value['ers_id']}}" class="radioCustomInput">
                                    <label for="testQualify-{{$value['ers_id']}}" class="radioCustom"></label>
                                </div>
                                <label for="testQualify-{{$value['ers_id']}}" class="title-16 pointer ml-1" style="margin-top:6px">Qualify</label>
                            </div>
                            <div class="justify-start">
                                <div class="radioContainer">
                                    <input type="radio" name="conclusion" value="Disqualify" id="testDisqualify-{{$value['ers_id']}}" class="radioCustomInput">
                                    <label for="testDisqualify-{{$value['ers_id']}}" class="radioCustom"></label>
                                </div>
                                <label for="testDisqualify-{{$value['ers_id']}}" class="title-16 pointer ml-1" style="margin-top:6px">Disqualify</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="skill_date" id="skill_date" value="{{$value['tanggal']}}">
                    <input type="hidden" name="interview_date" id="interview_date" value="{{$value['interview_date']}}">
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Done<i class="ml-2 fs-20 fas fa-check" style="font-size:20px"></i></button>
                    </div>
                </div>
            </form>
            @else
            <form action="{{ route('applicant-testskill_date')}}" method="post" enctype="multipart/form-data" style="width:100%">
                @csrf
                <span class="title-sm">Skill Test Date</span>
                <div class="input-group mt-1">
                    <div class="inputGroupSelect"><i class="fas fa-calendar-alt mr-3 fs-18"></i> <span class="fs-16">Date</span></div>
                    <input type="datetime-local" class="form-control border-input-10" id="test_skill_date" name="test_skill_date" value="" />
                </div>
                <input type="hidden" name="ers_id" id="ers_id" value="{{$value['ers_id']}}">
                <input type="hidden" name="applicant_id" id="applicant_id" value="{{$value['id']}}">
                <input type="hidden" class="form-control border-input-10" name="departemen" value="{{$value['departemen']}}" required/>
                <input type="hidden" class="form-control border-input-10" name="bagian" value="{{$value['bagian']}}" required/>
                <input type="hidden" class="form-control border-input-10" name="jabatan" value="{{$value['jabatan']}}" required/>
                <input type="hidden" id="posisi" name="posisi" value="{{$value['nama_ers']}}">
                <div class="col-12">
                    <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                        <div class="justify-start">
                            <div class="radioContainer">
                                <input type="radio" name="skill_location" id="115-{{$value['ers_id']}}" value="Online" class="radioCustomInput">
                                <label for="115-{{$value['ers_id']}}" class="radioCustom"></label>
                            </div>
                            <label for="115-{{$value['ers_id']}}" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                        </div>
                        <div class="justify-start">
                            <div class="radioContainer">
                                <input type="radio" name="skill_location" id="255-{{$value['ers_id']}}" value="Offline" class="radioCustomInput">
                                <label for="255-{{$value['ers_id']}}" class="radioCustom"></label>
                            </div>
                            <label for="255-{{$value['ers_id']}}" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                        </div>
                    </div>
                </div>      
                <div class="col-12">
                    <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Done<i class="ml-2 fs-20 fas fa-check" style="font-size:20px"></i></button>
                </div>   
            </form>
            @endif
        </div>
    </div>
</div>