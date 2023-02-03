
<div class="row">
    <div class="col-12 flexx mb-4">
        <div class="container-form">
            <form method="get" action="">
                <input type="text" class="searchText search_applicant" placeholder="Search..." required>
                <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="checkAll">
            <input type="checkbox" id="checkAll3" class="check1 checkAll3" />
            <label for="checkAll3" class="title-14">Select All</label>
        </div>
        <div class="buttonDelete">
            <button class="btn-merah-md no-wrap delete_semua" data-url="{{ url('disqualification-update_all') }}">Disqualified Selected<i class="ml-2 fas fa-trash"></i></button>
        </div>
    </div>
</div>
<?php 
$recommen = collect($data_applicant)->where('type', 'recommended');
$other = collect($data_applicant)->where('type', 'other');
?>
<div class="row">
    <div class="col-12 mb-3">
        <div class="title-20-dark">Recomendation</div>
        <div class="border-55"></div>
    </div>  
    @foreach($recommen as $key => $value)
    <div class="col-md-6 coba_applicant testajadulu{{$value['id']}}" id="applicant{{$value['id']}}" nomor="{{$value['id']}}">
        <div class="cardEmployee3">
            <input type="checkbox" data-id="{{$value['id']}}" class="check1 subCheck checked3 sub_cek">
            <div class="containerContent">
                <a href="{{ route('details_applicant-index', $value['id'])}}" class="content2">
                    <div class="judul text-truncate dokumen_applicant">{{$value['nama']}}</div> 
                    <div class="approved-blue">{{$value['nama_ers']}}</div>
                    <div class="footerEmployee2">
                        <div class="justify-start">
                            <i class="c-blue fas fa-university"></i>
                            @if($value['education'] == 1)
                                <div class="title-14 ml-2">SD</div>
                                @elseif($value['education'] == 2)
                                <div class="title-14 ml-2">SMP/SLTP</div>
                                @elseif($value['education'] == 3)
                                <div class="title-14 ml-2">SMA/SLTA</div>
                                @elseif($value['education'] == 4)
                                <div class="title-14 ml-2">D1</div>
                                @elseif($value['education'] == 5)
                                <div class="title-14 ml-2">D2</div>
                                @elseif($value['education'] == 6)
                                <div class="title-14 ml-2">D3</div>
                                @elseif($value['education'] == 7)
                                <div class="title-14 ml-2">S1</div>
                                @elseif($value['education'] == 8)
                                <div class="title-14 ml-2">S2</div>
                                @elseif($value['education'] == 9)
                                <div class="title-14 ml-2">S3</div>
                            @endif
                        </div>
                        <div class="justify-start">
                            <img src="{{ asset('/images/iconpack/job_vacancy/ranking-star.svg') }}" class="mb-1">
                            <div class="title-14 ml-2">{{$value['ipk']}}</div>
                        </div>
                        <div class="justify-start text-truncate"> 
                            <i class="c-blue fas fa-envelope"></i>
                            <div class="title-14 ml-2 email text-truncate">{{$value['email']}}</div>
                        </div>
                    </div>
                </a>
                <div class="btnEmployee2">
                    <button data-toggle="modal" data-target="#doneApplicantRecommended{{$value['id']}}" onClick="reply_click({{$value['id']}})" class="btn-simple-monitor" id="{{$value['id']}}" style="width:37px;height:37px"><i class="fas fa-check" style="font-size:26px"></i></button>
                    <a href="{{ route('candidate-disqualification', $value['id'])}}" class="btn-simple-delete disqualification_btn" style="width:37px;height:37px"><i class="fs-18 fas fa-users-slash"></i></a>
                </div>
                @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.modal-done')
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Other  -->
<div class="row mt-4">
    <div class="col-12 mb-3">
        <div class="title-20-dark">Other Candidate</div>
        <div class="border-55"></div>
    </div>
    @foreach($other as $key => $value)
    <div class="col-md-6 coba_applicant testajadulu{{$value['id']}}" id="applicant{{$value['id']}}" nomor="{{$value['id']}}">
        <div class="cardEmployee3">
            <input type="checkbox" data-id="{{$value['id']}}" class="check1 subCheck checked3 sub_cek">
            <div class="containerContent">
                <a href="{{ route('details_applicant-index', $value['id'])}}" class="content2">
                    <div class="judul text-truncate dokumen_applicant">{{$value['nama']}}</div> 
                    <div class="approved-blue">{{$value['nama_ers']}}</div>
                    <div class="footerEmployee2">
                        <div class="justify-start">
                            <i class="c-blue fas fa-university"></i>
                            @if($value['education'] == 1)
                                <div class="title-14 ml-2">SD</div>
                                @elseif($value['education'] == 2)
                                <div class="title-14 ml-2">SMP/SLTP</div>
                                @elseif($value['education'] == 3)
                                <div class="title-14 ml-2">SMA/SLTA</div>
                                @elseif($value['education'] == 4)
                                <div class="title-14 ml-2">D1</div>
                                @elseif($value['education'] == 5)
                                <div class="title-14 ml-2">D2</div>
                                @elseif($value['education'] == 6)
                                <div class="title-14 ml-2">D3</div>
                                @elseif($value['education'] == 7)
                                <div class="title-14 ml-2">S1</div>
                                @elseif($value['education'] == 8)
                                <div class="title-14 ml-2">S2</div>
                                @elseif($value['education'] == 9)
                                <div class="title-14 ml-2">S3</div>
                            @endif
                        </div>
                        <div class="justify-start">
                            <img src="{{ asset('/images/iconpack/job_vacancy/ranking-star.svg') }}" class="mb-1">
                            <div class="title-14 ml-2">{{$value['ipk']}}</div>
                        </div>
                        <div class="justify-start text-truncate"> 
                            <i class="c-blue fas fa-envelope"></i>
                            <div class="title-14 ml-2 email text-truncate">{{$value['email']}}</div>
                        </div>
                    </div>
                </a>
                <div class="btnEmployee2">
                    <button data-toggle="modal" data-target="#doneApplicantOther{{$value['id']}}" onClick="reply_clickB({{$value['id']}})" class="btn-simple-monitor" style="width:37px;height:37px"><i class="fas fa-check" style="font-size:26px"></i></button>
                    <a href="{{ route('candidate-disqualification', $value['id'])}}" class="btn-simple-delete disqualification_btn" style="width:37px;height:37px"><i class="fs-18 fas fa-users-slash"></i></a>
                </div>
                @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.modal-done')
            </div>
        </div>
    </div>
    @endforeach
</div>