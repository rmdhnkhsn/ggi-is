<div class="row">
    <div class="col-12 justify-sb2">
        <div class="title-20 text-left">Invoice List</div>
        <div class="filterSMV flexx gap-3">
            <div class="input-group">
                <div class="input-group date" id="invoice" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#invoice" data-toggle="datetimepicker">
                        <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18 mr-2"></i><i class="fas fa-caret-down"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput w-140" data-target="#invoice" placeholder="Select Date"/>
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
            <table id="DTtable2" class="tables3 tbl-content-cost no-wrap">
                <thead>
                    <tr class="bg-thead2">
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Buyer</th>
                        <th>Invoice Number</th>
                        <th>Container No</th>
                        <th>Part Of Loading</th>
                        <th>Part Of Destination</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataInvoice as $key => $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value['date'] }}</td>
                        <td>{{ $value['buyer_detail'] }}</td>
                        <td>{{ $value['invoice_no'] }}</td>
                         @if(!empty($value['container_no']))
                         <td>{{ $value['container_no3'] }}</td>
                         @elseif (!empty($value['container_no2']))
                         <td>{{ $value['container_no2'] }}</td>
                         @else
                         <td>{{ $value['container_no3'] }}</td>
                         @endif
                        <td>{{ $value['partOfLoading'] }}</td>
                        <td>{{ $value['partOfDestination'] }}</td>
                        <td>
                            <div class="container-tbl-btn flex gap-2">
                                <a href="{{ route('invoiceList.detail','filter='.$value['invoice_final_id']) }}" class="btn-icon-blue" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Preview Invoice"><i class="fs-18 fas fa-file-invoice-dollar"></i></a>
                                <a href="{{ route('invoiceList.downloadpacking','filter='.$value['invoice_final_id']) }}" class="btn-icon-green" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Preview Packing List" style="width:35px;height:35px"><i class="fs-18 fas fa-paste"></i></a>
                                <a href="{{ route('invoiceList.edit' ,'filter='.$value['invoice_final_id']) }}" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Edit Invoice" class="btn-icon-yellow"><i class="fs-18 fas fa-pencil-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>