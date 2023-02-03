
<div class="row">
    <div class="col-12 flexx mb-4">
        <div class="container-form">
            <input type="text" class="searchText search_interview" placeholder="Search..." required>
            <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
        </div>
        <div class="checkAll">
            <input type="checkbox" id="checkAll6" class="check1 checkAll6" />
            <label for="checkAll6" class="title-14">Select All</label>
        </div>
        <div class="buttonDelete">
            <button class="btn-merah-md no-wrap all_interview" data-url="">Disqualified Selected<i class="ml-2 fas fa-trash"></i></button>
        </div>
    </div>
</div>
<div class="row">
    @foreach($data_interview as $key => $value)
        <div class="col-md-6 coba_interview" id="interview{{$value['id']}}" nomor="{{$value['id']}}">
            <div class="cardEmployee6">
                <input type="checkbox" data-id="{{$value['id']}}" class="check1 subCheck checked6 cek_interview">
                <div class="containerContent">
                    <a href="{{ route('details_applicant-index', $value['id'])}}" class="content2">
                        <div class="judul text-truncate dokumen_interview">{{$value['nama']}}</div> 
                        <div class="approved-blue">{{$value['nama_ers']}}</div>
                        <div class="footerEmployee2">
                            <div class="justify-start text-truncate"> 
                                <i class="c-blue fas fa-calendar-alt"></i>
                                <div class="title-14 ml-2 c-grey text-truncate">Interview Date : {{$value['interview_date']}}</div>
                            </div>
                        </div>
                    </a>
                    <div class="btnEmployee2">
                        <div class="flex" style="gap:.4rem">
                            @if($value['psycho_cek'] == 0)
                            <a data-toggle="modal" data-target="#Psikotest-{{$value['id']}}" class="btn-simple-edit" style="width:37px;height:37px" data-trigger="hover" data-placement="top" data-content="Psikotest"><i class="fs-28 fa-solid fa-brain" style="font-size:22px"></i></a>
                            @include('hr_ga.job_vacancy.job_aplicant.partials.interview.modal-psikotest')
                            @endif
                            @if($value['skill_cek'] == 0)
                            <a data-toggle="modal" data-target="#TestSkills-{{$value['id']}}" class="btn-simple-edit" style="width:37px;height:37px" data-trigger="hover" data-placement="top" data-content="Test Skill"><i class="fa-solid fa-solid fa-users-gear" style="font-size:22px"></i></a>
                            @include('hr_ga.job_vacancy.job_aplicant.partials.interview.modal-skilltest')
                            @endif
                            @if($value['interview_user'] == 2 && $value['skill_cek'] != 0)
                            <a href="{{route('applicant-probation_update', $value['id'])}}" class="btn-simple-monitor promoteProbation" style="width:37px;height:37px" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Promote Probation"><i class="fas fa-check" style="font-size:26px"></i></a>
                            @else
                            <a href="{{route('details_applicant-index', $value['id'])}}" class="btn-simple-edit" style="width:37px;height:37px" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Add Score Interview"><i class="fa-solid fa-people-arrows-left-right" style="font-size:22px"></i></a>
                            @endif
                            <a href="{{ route('candidate-disqualification', $value['id'])}}" class="btn-simple-delete disqualification" style="width:37px;height:37px" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Disqualification"><i class="fs-18 fas fa-users-slash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- <div class="col-md-6">
        <div class="cardEmployee6">
            <input type="checkbox" class="check1 subCheck checked6 cek_interview">
            <div class="containerContent">
                <a href="" class="content2">
                    <div class="judul text-truncate dokumen_interview">agus</div> 
                    <div class="approved-blue">approved 2</div>
                    <div class="footerEmployee2">
                        <div class="justify-start text-truncate"> 
                            <i class="c-blue fas fa-calendar-alt"></i>
                            <div class="title-14 ml-2 c-grey text-truncate">Interview Date : 20-02-2021</div>
                        </div>
                    </div>
                </a>
                <div class="btnEmployee2">
                    <a href="" class="btn-simple-monitor promoteProbation" style="width:37px;height:37px"><i class="fas fa-check" style="font-size:26px"></i></a>
                    <a href="" class="btn-simple-delete disqualification" style="width:37px;height:37px"><i class="fs-18 fas fa-users-slash"></i></a>
                </div>
            </div>
        </div>
    </div> -->
</div>