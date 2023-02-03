
<div class="modal fade" id="Psikotest-{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            @if($value['psyco_date'] != null)
            <form action="{{ route('applicant-psychotest_update')}}" method="post" enctype="multipart/form-data" style="width:100%">
                @csrf
                <div class="row">
                    <input type="hidden" name="ers_id" id="ers_id" value="{{$value['ers_id']}}">
                    <input type="hidden" name="applicant_id" id="applicant_id" value="{{$value['id']}}">
                    <input type="hidden" id="posisi" name="posisi" value="{{$value['nama_ers']}}">
                    <div class="col-12 text-center mb-5">
                        <div class="title-24">Psychological Test Score</div>
                        <div class="title-14-dark">Input score for <span style="font-weight:500">{{$value['nama']}}</span></div> 
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Papikositik/EPPS</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="epps" value="" placeholder="score of EPPS"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">TKD</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="tkd" value="" placeholder="score of TKD"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">DISC</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="disc" value="" placeholder="score of DISC"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">EAS</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="eas" value="" placeholder="score of EAS"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">Paulin/Kreplin</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="paulin" value="" placeholder="score of paulin"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="title-sm">TMC</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="number" step="0.01" class="form-control border-input-10" name="tmc" value="" placeholder="score of TMC"/>
                        </div>
                    </div>
                    <div class="col-12 justify-center mb-3" style="gap:1.5rem">
                        <div class="title-14 no-wrap">More Psychological Test</div>
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
                        <span class="title-sm">Your Document</span>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="customFile268" name="file" value="file" accept=".pdf">
                            <label class="customFileLabelsBlue" for="customFile268">
                            <span class="chooseFile"></span></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Conclusion</span>
                        <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                            <div class="justify-start">
                                <div class="radioContainer">
                                    <input type="radio" name="conclusion" id="radioFT158{{$value['id']}}" value="Qualify" class="radioCustomInput">
                                    <label for="radioFT158{{$value['id']}}" class="radioCustom"></label>
                                </div>
                                <label for="radioFT158{{$value['id']}}" class="title-16 pointer ml-1" style="margin-top:6px">Qualify</label>
                            </div>
                            <div class="justify-start">
                                <div class="radioContainer">
                                    <input type="radio" name="conclusion" id="radioFT238{{$value['id']}}" value="Disqualify" class="radioCustomInput">
                                    <label for="radioFT238{{$value['id']}}" class="radioCustom"></label>
                                </div>
                                <label for="radioFT238{{$value['id']}}" class="title-16 pointer ml-1" style="margin-top:6px">Disqualify</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Done<i class="ml-2 fs-20 fas fa-check" style="font-size:20px"></i></button>
                    </div>
                </div>
            </form>
            @else
            <form action="{{ route('applicant-psychotest_date')}}" method="post" enctype="multipart/form-data" style="width:100%">
                @csrf
                <span class="title-sm">Psychological Test Date</span>
                <div class="input-group mt-1">
                    <div class="inputGroupSelect"><i class="fas fa-calendar-alt mr-3 fs-18"></i> <span class="fs-16">Date</span></div>
                    <input type="datetime-local" class="form-control border-input-10" id="psyco_date" name="psyco_date" value="" />
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
                                <input type="radio" name="psyco_location" id="PS999-{{$value['ers_id']}}" value="Online" class="radioCustomInput">
                                <label for="PS999-{{$value['ers_id']}}" class="radioCustom"></label>
                            </div>
                            <label for="PS999-{{$value['ers_id']}}" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                        </div>
                        <div class="justify-start">
                            <div class="radioContainer">
                                <input type="radio" name="psyco_location" id="PS777-{{$value['ers_id']}}" value="Offline" class="radioCustomInput">
                                <label for="PS777-{{$value['ers_id']}}" class="radioCustom"></label>
                            </div>
                            <label for="PS777-{{$value['ers_id']}}" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
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