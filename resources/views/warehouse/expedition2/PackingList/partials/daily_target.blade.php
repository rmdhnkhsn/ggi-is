<div class="row">
    <div class="col-12">
        <div class="joblist-date">
            <div class="title-20 title-none">Daftar PL TO ekspedisi</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable2" class="table tbl-content-left">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>PO</th>
                        <th>OR</th>
                        <th>WO</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>QTY Size</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daily_target_pl as $key => $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tanggal2 }}</td>
                            <td>{{ $value->po }}</td>
                            <td>{{ $value->or_number }}</td>
                            <td>{{ $value->wo }}</td>
                            <td>{{ $value->buyer }}</td>
                            <td>{{ $value->style }}</td>
                            <td>{{ $value->qty2 }}</td>
                            <td>
                                <div class="flex" style="gap:.35rem;margin:-6px 0">
                                    <a href="{{route('data-details', $value->id)}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>