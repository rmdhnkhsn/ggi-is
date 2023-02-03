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
                        <div class="title-sm">Next Step To</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" for=""><i class="fs-18 fas fa-forward"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" id="double_testA{{$value['id']}}" name="double_test" style="cursor:pointer" required>
                                <option selected disabled>Select Step</option>
                                <option value="No">Psychological Test</option> 
                                <option value="True">Psychological & Technical Test</option>    
                                <option value="True2">Interview</option>    
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$value['id']}}">
                    <input type="hidden" id="posisi" name="posisi" value="{{$value['nama_ers']}}">
                    <div class="col-12" id="digabung{{$value['id']}}">

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
                        <div class="title-sm">Next Step To</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" for=""><i class="fs-18 fas fa-forward"></i></span>
                            </div>
                            <select class="form-control border-input-10 select2bs4" id="double_testB{{$value['id']}}" name="double_test" style="cursor:pointer" required>
                                <option selected disabled>Select Step</option>
                                <option value="No">Psychological Test</option> 
                                <option value="True">Psychological & Technical Test</option>    
                                <option value="True2">Interview</option>    
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$value['id']}}">
                    <input type="hidden" id="posisi" name="posisi" value="{{$value['nama_ers']}}">
                    <div class="col-12" id="digabungB{{$value['id']}}">
                        
                    </div>      
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Done<i class="ml-2 fs-20 fas fa-check" style="font-size:20px"></i></button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>