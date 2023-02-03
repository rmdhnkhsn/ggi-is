<!-- Recomendation Applicant  -->
<div class="modal fade" id="doneApplicantRecommended{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:430px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 pt-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row p-4">
                <div class="col-12 text-center mb-4">
                    <div class="title-24">This employee is qualified..?</div>
                    <div class="title-14-dark mt-1">schedule a psychological test for 
                        <div style="font-weight:500">{{$value['nama']}}</div>
                    </div> 
                </div>
                <form action="{{ route('applicant-psyco_date_update')}}" method="post" enctype="multipart/form-data" style="width:100%">
                    @csrf
                    <div class="col-12">
                        <span class="title-sm">Psychological Date</span>
                        <div class="input-group mt-1">
                            <div class="input-group date">
                                <div class="input-group-append">
                                    <div class="custom-calendar px-3" style="border-radius:10px 0 0 10px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                                </div>
                                <input type="hidden" name="id" id="id" value="{{$value['id']}}">
                                <input type="datetime-local" class="form-control border-input" style="border-radius:0 10px 10px 0" name="psyco_date" value="" required/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="posisi" name="posisi" value="{{$value['nama_ers']}}">
                    <div class="col-12">
                        <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                            <div class="justify-start">
                                <div class="radioContainer">
                                    <input type="radio" name="psyco_location" id="radio1110" value="Online" class="radioCustomInput">
                                    <label for="radio1110" class="radioCustom"></label>
                                </div>
                                <label for="radio1110" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                            </div>
                            <div class="justify-start">
                                <div class="radioContainer">
                                    <input type="radio" name="psyco_location" id="radio222" value="Offline" class="radioCustomInput">
                                    <label for="radio222" class="radioCustom"></label>
                                </div>
                                <label for="radio222" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                            </div>
                        </div>
                    </div>          
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Done<i class="ml-2 fs-20 fas fa-check" style="font-size:20px"></i></button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>

<!-- Other Applicant  -->
<div class="modal fade" id="doneApplicantOther{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:430px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 pt-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row p-4">
                <div class="col-12 text-center mb-4">
                    <div class="title-24">This employee is qualified..?</div>
                    <div class="title-14-dark mt-1">schedule a psychological test for 
                        <div style="font-weight:500">{{$value['nama']}}</div>
                    </div> 
                </div>
                <form action="{{ route('applicant-psyco_date_update')}}" method="post" enctype="multipart/form-data" style="width:100%">
                    @csrf
                    <div class="col-12">
                        <span class="title-sm">Psychological Date</span>
                        <div class="input-group mt-1">
                            <div class="input-group date">
                                <div class="input-group-append">
                                    <div class="custom-calendar px-3" style="border-radius:10px 0 0 10px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                                </div>
                                <input type="hidden" name="id" id="id" value="{{$value['id']}}">
                                <input type="date" class="form-control border-input" style="border-radius:0 10px 10px 0" name="psyco_date" value="" required/>
                            </div>
                        </div>
                    </div>             
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Done<i class="ml-2 fs-20 fas fa-check" style="font-size:20px"></i></button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>