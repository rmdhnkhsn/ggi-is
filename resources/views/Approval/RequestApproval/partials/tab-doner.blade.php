<div class="row">
    <div class="col-12 justify-sb2">
        <div class="title-20 text-left">Asset List</div>
        <div class="filterSMV">
            <div class="flex gap-2">
                <div class="justify-start">
                    <div class="title-14 title-none w-140 text-right mr-2">Show : </div>
                    <div class="input-group dates w-100" id="filter_date_done">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" id="dateRange" class="form-control borderInput" name="daterange_filter" value="" placeholder="Input Date" />
                    </div>
                </div>
                <button class="btn-simple-monitor exportExcel1" onclick="excel(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                <button class="btn-simple-delete exportPdf1" onclick="pdf(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 pb-5">
        <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
        <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="DTtable" class="table tbl-content-left no-wrap">
                <thead>
                    <tr class="bg-thead">
                        <th>No</th>
                        <th>NIK</th>
                        <th>Applicant</th>
                        <th>Departement</th>
                        <th>Jenis Pencairan</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Cash Disbursement Type </th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no=0?>
                    @foreach($done as $key2=>$value2)
                    <?php $no++?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$value2->nik}}</td>
                        <td>{{$value2->nama}}</td>
                        <td>{{$value2->bagian}} </td>
                        <td>{{$value2->Transfer}}</td>
                        <td>Rp. {{number_format($value2->amount_rencana, 2, ",", ".")}}</td>
                        <td>{{$value2->deskripsi}}</td>
                        <td>{{$value2->Pencairan}}</td>
                        <td>{{$value2->status_tiket}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>