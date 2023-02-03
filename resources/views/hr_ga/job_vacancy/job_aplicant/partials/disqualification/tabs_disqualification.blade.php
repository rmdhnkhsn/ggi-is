
<div class="row">
    <div class="col-12 mb-4">
        <div class="container-form">
            <input type="text" id="SearchText2" class="searchText" placeholder="Search..." required>
            <button type="button" id="SearchBtn2" class="iconSearch"><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="DTtable2" class="table tbl-content-left">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Job Position</th>
                        <th>Telphone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_disqualification as $key => $value)
                    <tr>
                        <td>{{$value['nama']}}</td>
                        <td>{{$value['nama_ers']}}</td>
                        <td>{{$value['tlp']}}</td>
                        <td>{{$value['email']}}</td>
                        <td>{{$value['status']}}</td>
                        <td>
                            <div class="container-tbl-btn flex" style="gap:.3rem">
                                <a href="{{route('details_applicant-index', $value['id'])}}" class="btn-simple-info" style="width:37px;height:37px;margin-left:1px"><img src="{{url('images/iconpack/info.svg')}}"> </a>
                                <a href="{{route('applicant-process_end', $value['id'])}}" class="btn-simple-delete deleteDisqualification" style="width:37px;height:37px"><i class="fs-18 fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>