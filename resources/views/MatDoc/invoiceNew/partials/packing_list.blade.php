<div class="row">
    <div class="col-12 justify-sb2">
        <div class="title-20 text-left">Packing List</div>
        <div class="filterSMV flexx gap-3">
            <div class="input-group">
                <div class="input-group date" id="Date" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker">
                        <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18 mr-2"></i><i class="fas fa-caret-down"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput w-140" data-target="#Date" placeholder="Select Date"/>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-18 fas fa-file-excel"></i></button>
                <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-18 fas fa-file-pdf"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                <thead>
                    <tr class="bg-thead2">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Buyer</th>
                        <th>Container Number</th>
                        <th>Seal No</th>
                        <th>Invoice No</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($packing_list_all as $key => $value)
                    <?php
                        // dd($value);
                        $TotalResult = collect($value)
                                    ->groupBy('no_seal')
                                    ->map(function ($item) {
                                        return array_merge(...$item->toArray());
                                    })->values()->toArray();
                    // dd($TotalResult);
                        $siDatanya = collect($TotalResult)->first();
                    ?>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siDatanya['tanggal_surat'] }}</td>
                        <td>{{ $siDatanya['buyer'] }}</td>
                        <td>{{ $siDatanya['no_kontainer'] }}</td>
                        <td>{{ $key }}</td>
                        <td>{{ $siDatanya['invoice'] }}</td>
                        <td>
                            <div class="container-tbl-btn">
                                @if ($siDatanya['status_invoice'] != '1')
                                <a href="{{ route('invoiceList.index', $siDatanya['kode_ekspedisi'])}}" class="btn-simple-info"><i class="fs-20 fas fa-file-invoice"></i></a>
                                @else
                                <!-- <a href="" class="btn-simple-info"><i class="fs-20 fas fa-file-invoice"></i></a> -->
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>