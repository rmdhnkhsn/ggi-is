<div class="col-12 justify-sb2">
    <div class="title-20 text-left">Ticket All</div>
        <div class="filterSMV">
            <div class="flex gap-2">
                <button class="btn-simple-monitor exportExcel2" onclick="excel(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                <button class="btn-simple-delete exportPdf2" onclick="pdf(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
            </div>
        </div>
    </div>
<div class="col-12 pb-5">
    <div class="cards-scroll scrollX mt-approval" id="scroll-bar">
        <button id="btnSearch"><i class="fas fa-search"></i></button>  
        <table id="DTtable2" class="table tbl-content no-wrap">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>STATUS</th>
                    <th>NIK</th>
                    <th>NAME</th>
                    <th>DEPARTMENT</th>
                    <th>BRANCH</th>
                    <th>NIK APPROVE</th>
                    <th>NAME APPROVE</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tiket_all as $key =>$value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->status_tiket}}</td>
                    <td>{{$value->nik}}</td>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->bagian}}</td>
                    <td>{{$value->branchdetail}}</td>
                    <td>{{$value->nik_manager}}</td>
                    <td>{{$value->manager}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>