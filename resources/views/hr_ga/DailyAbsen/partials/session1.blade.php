
<div class="row">
    <div class="col-12 display mb-4">
        <div class="title-28 titleNone">Daily Abscence </div>
        <div class="filterSearch">
            <div class="container-form">
                <input type="text" id="SearchText" class="searchText" placeholder="search employee..." required>
                <button type="button" id="SearchBtn" class="iconSearch"><i class="fas fa-search"></i></button>
            </div>
            <div class="input-group" style="width:380px">
                <div class="input-group-prepend">
                    <span class="inputGroupBlue px-3" style="border-radius:10px 0 0 10px" for=""><i class="fs-20 fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control borderInput10">
            </div>
            <button type="button" class="btn-green-md exportCSV">CSV<i class="fs-18 ml-3 fas fa-file-excel"></i></button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12" style="padding-bottom:2.3rem">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="DTtable" class="table tbl-content-left">
                <thead>
                    <tr>
                        <th>NIK</th> 
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Phone</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k=>$d)
                        @foreach($d as $d1)
                        <tr>
                            <td>{{$d1->nik}}</td>
                            <td>{{$d1->nama}}</td>
                            <td>{{$d1->branch_group}}</td>
                            <td>{{$d1->departemensubsub}}</td>
                            <td class="no-wrap">{{$d1->tanggal}}</td>
                            <td class="no-wrap">{{$d1->nohp}}</td>
                            <td>{{$d1->kondisi}}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>