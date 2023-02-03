<div class="cardPart">
    <div class="cardHead p-3">
        <div class="justify-sb3">
            <div class="title-24-grey no-wrap">Issue Done IR</div>
            <div class="endSide flexx gap-3">
                <div class="justify-center">
                    <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                    <div class="input-group flex" id="showDateDone" data-target-input="nearest">
                        <div class="input-group-append datepiker" data-target="#showDateDone" data-toggle="datetimepicker">
                            <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18"></i><i class="ml-2 fas fa-caret-down"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input borderInput w-135" id="filter_done_issue" data-target="#showDateDone" placeholder="Select Date"/>
                    </div>
                </div>
                <div class="flex gap-3">
                    <a href="" class="btn-icon-green exportExcel" id="btnDoneExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:37px;height:37px"><i class="fs-20 fas fa-file-excel"></i></a>
                    <a href="" class="btn-icon-red exportPdf" id="btnDonePdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:37px;height:37px"><i class="fs-20 fas fa-file-pdf"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="section"></div>
    <div class="cardBody p-3">
        @foreach($data_done as $v)
            <div class="accordionItems Done">            
                <header class="accordionHeaders">
                    <div class="item">
                        <div class="title-16-dark2">{{$v->item_no}}</div>
                        <div class="title-14-dark">{{$v->item_master->F4101_DSC1}}</div>
                    </div>
                    <div class="newOR">
                        <div class="title-12-grey">NEW OR</div>
                        <div class="sub-title-14">{{$v->new_or}}</div>
                    </div>
                    <div class="glDate">
                        <div class="title-12-grey">Transaction Date</div>
                        <div class="sub-title-14">{{$v->tr_date}}</div>
                    </div>
                    <div class="transaction">
                        <div class="title-12-grey">G/L DATE</div>
                        <div class="sub-title-14">{{$v->gl_date}}</div>
                    </div>
                    <div class="qty">
                        <div class="title-12-grey">QTY</div>
                        <div class="sub-title-14">{{$v->qty}} {{$v->uom}}</div>
                    </div>
                    <div class="qty">
                        <div class="title-12-grey">Selected</div>
                        <div class="sub-title-14">{{$v->from_qty??0}}</div>
                    </div>
                    <div class="qty">
                        <div class="title-12-grey">Balance</div>
                        <div class="sub-title-14">{{$v->qty-$v->from_qty??0}}</div>
                    </div>
                    <div>
                        @if($v->export_by_nik==null)
                            <a href="" onclick='event.preventDefault(); del_data(event,{{$v->id}})' class="btn-icon-red ml-auto"><i class="fas fa-minus-circle"></i></a>
                        @endif
                    </div>
                </header>
                <div class="accordionContents">
                        <div class="bodyContent">
                            @foreach($v->location as $d1)
                            <div class="row">
                                <div class="col-lg-2 col-md-6">
                                    <div class="title-sm">Branch</div>
                                    <input type="text" class="form-control borderInput mt-1" value="{{$d1->from_branch}}" readonly placeholder="Input Lot">
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="title-sm">Lot Number</div>
                                    <input type="text" class="form-control borderInput mt-1" value="{{$d1->from_lot}}" readonly placeholder="Input Lot">
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <div class="title-sm">Location</div>
                                    <input type="text" class="form-control borderInput mt-1" value="{{$d1->from_loc}}" readonly placeholder="Input Location">
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="title-sm">Qty</div>
                                    <input type="text" class="form-control borderInput mt-1" value="{{$d1->from_qty}}" readonly placeholder="Input Qty">
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <div class="title-sm">Uom</div>
                                    <input type="text" class="form-control borderInput mt-1" value="{{$d1->from_uom}}" readonly placeholder="Input Uom">
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                <div class="col-12 justify-sb mt-3">
                                    <div class="title">
                                        <span class="title-16-400">Request By : </span>
                                        <span class="title-16-500">{{$v->originator->nama}}</span>
                                    </div>
                                    <div class="flex gap-3">
                                        <!-- @if($v->export_by_nik==null)
                                            <a href="{{route('Warehouse.requestIR.delete',$v->id)}}" class="btn-red-md w-140">Delete</a>
                                            <button type="submit" class="btn-blue-md w-140">Save</button>
                                        @endif -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        @endforeach
    
    </div>
</div>

<div class="table-container d-none" id="tbDone">
    <table id="DTtableDone" class="table">
        <thead>
            <tr>
                <th>Item.Number</th>
                <th>Item.Desc</th>
                <th>New.OR</th>
                <th>Uom</th>
                <th>Qty</th>
                <th>Selected</th>
                <th>Balance</th>
                <th>Trans.Date</th>
                <th>GL.Date</th>
                <th>WH.User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_done as $v)
                @php
                $status='Waiting';
                if ($v->export_by_nik!==null) {
                    $status='RPA';
                } else if ($v->wh_by_nik!==null) {
                    $status='Warehouse';
                }
                
                @endphp
                <tr>
                    <td>{{$v->item_no}}</td>
                    <td>{{$v->item_master->F4101_DSC1}}</td>
                    <td>{{$v->new_or}}</td>
                    <td>{{$v->uom}}</td>
                    <td>{{$v->qty}}</td>
                    <td>{{$v->from_qty??0}}</td>
                    <td>{{$v->qty-$v->from_qty??0}}</td>
                    <td>{{$v->tr_date}}</td>
                    <td>{{$v->gl_date}}</td>
                    <td>{{$v->wh_by_name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>