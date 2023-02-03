    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-24">Material Status</div>
                <div class="margin-date">
                    <div class="input-group date" id="Date2" data-target-input="nearest">
                        <div class="input-group-append datepiker" data-target="#Date2" data-toggle="datetimepicker">
                            <div class="custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input border-input-grey" data-target="#Date2" placeholder="Select Date" style="width:125px"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar-sm">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable2" class="table tbl-content-left no-wrap">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>ID BARCODE</th>
                        <th>BUYER</th>
                        {{-- <th>REMARK</th> --}}
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($reportDone as $key =>$value)
                        <tr>
                            <td>{{($value['tanggal']) }}</td>
                            <td>{{ $value['id_barcode'] }}</td>
                            <td>{{ $value['buyer'] }}</td>
                            {{-- <td>{{ $value['remark'] }}</td> --}}
                            <td>
                                <div class="container-tbl-btn3">
                                    <a href="#" class="btn-simple-edit" data-toggle="modal" data-target="#addRemark{{ $value['id_barcode'] }}"><i class="fs-18 fas fa-pen-alt"></i></a>
                                @include('warehouse.qrcode.delivery.modal.add_remark')
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>