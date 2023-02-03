
<div class="row">
    <div class="col-12 flexx mb-4">
        <div class="container-form">
            <input type="text" class="searchText search_skill" placeholder="Search..." required>
            <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
        </div>
        <div class="checkAll">
            <input type="checkbox" id="checkAll5" class="check1 checkAll5" />
            <label for="checkAll5" class="title-14">Select All</label>
        </div>
        <div class="buttonDelete">
            <button class="btn-merah-md no-wrap all_skill" data-url="">Disqualified Selected<i class="ml-2 fas fa-trash"></i></button>
        </div>
    </div>
</div>
<div class="row">
    @foreach($data_skills as $key => $value)
        <div class="col-md-6 coba_skill testaja{{$value['id']}}" id="skill{{$value['id']}}" nomor="{{$value['id']}}">
            <div class="cardEmployee5">
                <input type="checkbox" data-id="{{$value['id']}}" class="check1 subCheck checked5 cek_skill">
                <div class="containerContent">
                    <a href="{{ route('details_applicant-index', $value['id'])}}" class="content2">
                        <div class="judul text-truncate dokumen_skill">{{$value['nama']}}</div> 
                        <div class="approved-blue">{{$value['nama_ers']}}</div>
                        <div class="footerEmployee2">
                            <div class="justify-start text-truncate"> 
                                <i class="c-blue fas fa-calendar-alt"></i>
                                <div class="title-14 ml-2 c-grey text-truncate">Skills Test Date : {{$value['skill_date']}}</div>
                            </div>
                        </div>
                    </a>
                    <div class="btnEmployee2">
                        <button data-toggle="modal" data-target="#doneTestSkills{{$value['id']}}" class="btn-simple-monitor" style="width:37px;height:37px"><i class="fas fa-check" style="font-size:26px"></i></button>
                        <a href="{{ route('candidate-disqualification', $value['id'])}}" class="btn-simple-delete disqualification" style="width:37px;height:37px"><i class="fs-18 fas fa-users-slash"></i></a>
                    </div>
                    @include('hr_ga.job_vacancy.job_aplicant.partials.test_skills.modal-done')
                </div>
            </div>
        </div>
    @endforeach
</div>