
<div class="row">
    <div class="col-12 mb-4">
        <div class="container-form">
            <input type="text" id="SearchText" class="searchText" placeholder="Search..." required>
            <button type="button" id="SearchBtn" class="iconSearch"><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="DTtable1" class="table tbl-content-left">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Job Position</th>
                        <th>Probation Date</th>
                        <th>Psychology Score</th>
                        <th>Skill Score</th>
                        <th>Interview Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_probation as $key => $value)
                        <tr>
                            <td>{{$value['nama']}}</td>
                            <td>{{$value['nama_ers']}}</td>
                            <td>{{$value['probation_start_date']}}</td>
                            <td>{{$value['psyco_score']}}</td>
                            <td>{{$value['skill_score']}}</td>
                            <td>{{$value['interview_score']}}</td>
                            <td>
                                <div class="container-tbl-btn flex" style="gap:.3rem">
                                    <a href="{{route('candidate-end_probation', $value['id'])}}" class="btn-simple-monitor endProbation" style="width:37px;height:37px"><i class="fas fa-check" style="font-size:24px"></i></a>
                                    <a href="{{ route('details_applicant-index', $value['id'])}}" class="btn-simple-info" style="width:37px;height:37px;margin-left:1px"><img src="{{url('images/iconpack/info.svg')}}"> </a>
                                    <a href="{{ route('candidate-disqualification', $value['id'])}}" class="btn-simple-delete disqualification" style="width:37px;height:37px"><i class="fs-18 fas fa-users-slash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>