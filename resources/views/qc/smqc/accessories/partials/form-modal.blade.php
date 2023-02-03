<!-- Modal -->
<div class="modal fade" id="inac" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:900px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="title-18">Create Report</span>
                    </div>
                    <br>
                    <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                        <div class="justify-start">
                            <div class="radioContainer">
                                <input type="radio" name="jenis_report" value="report_biasa" id="biasa" class="radioCustomInput">
                                <label for="biasa" class="radioCustom"></label>
                            </div>
                            <label for="biasa" class="title-16 pointer ml-1" style="margin-top:6px">Report Biasa</label>
                        </div>
                        <div class="justify-start">
                            <div class="radioContainer">
                                <input type="radio" name="jenis_report" value="report_manual" id="manual" class="radioCustomInput">
                                <label for="manual" class="radioCustom"></label>
                            </div>
                            <label for="manual" class="title-16 pointer ml-1" style="margin-top:6px">Report Manual</label>
                        </div>
                    </div>
                </div>
                <!-- Report Biasa  -->
                <?php 
                if ($report_terakhir == null) {
                    $supplier = null;
                    $po = null;
                    $item = null;
                    $buyer = null;
                    $date = null;
                    $item = null;
                }else {
                    $supplier = $report_terakhir->supplier;
                    $po = $report_terakhir->po;
                    $item = $report_terakhir->item;
                    $buyer = $report_terakhir->buyer;
                    $date = $report_terakhir->date;
                    $item = $report_terakhir->item;
                }
                ?>
                <div class="hide" id="showHide">
                    <form action="{{route('report_aksesoris.store')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Supplier</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="supplier" name="supplier" value="{{$supplier}}" placeholder="Insert supplier">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">PO</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="po" name="po" value="" placeholder="Insert PO" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Item</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="item" name="item" value="{{$item}}" placeholder="Insert Item">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="title-sm">Purchasing Name</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select">Purchasing</span>
                                    </div>
                                    <select class="form-control" name="buyer" id="buyer" required>
                                        <option selected></option>
                                        @foreach($prc as $key => $value)
                                        <option {{ $value->nama == $buyer ? 'selected' : ''}} value="{{  $value->nama }}">{{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Date</span>
                                <div class="field2 mt-2">
                                    <input type="date" id="date" name="date" value="{{$date}}" placeholder="Insert Date">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="title-sm">Standar</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select">Standar</span>
                                    </div>
                                    <select class="form-control" name="standar_id" id="standar_id">
                                        <option selected></option>
                                        @foreach($standar as $key => $value)
                                        <option value="{{$value->id}}">{{$value->from}}-{{$value->to}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Order Quantity</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="order_quan" name="order_quan" value="" placeholder="Insert Order Quantity">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">QTY Reject</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="qty_reject" name="qty_reject" value="" placeholder="Insert QTY Reject">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Inspector</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="inspector" name="inspector" placeholder="Insert Inspector" value="{{ auth()->user()->nama}}">
                                </div>
                            </div>
                            <input type="hidden" name="branch" id="branch" value="{{auth()->user()->branch}}">
                            <input type="hidden" name="branchdetail" id="branchdetail" value="{{auth()->user()->branchdetail}}">
                        </div>
                        <div class="row py-4">
                            <div class="col-lg-12 justify-end">
                                <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                            </div>
                        </div>
                    </form> 
                </div>

                <!-- Report Manual  -->
                <div class="hide" id="showHide2">
                    <form action="{{route('report_aksesoris.store')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <input type="hidden" name="standar_id" id="standar_id">
                            <div class="col-6 mt-3">
                                <span class="title-sm">Purchasing Name</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select">Purchasing</span>
                                    </div>
                                    <select class="form-control" name="buyer" id="buyer" required>
                                        <option selected></option>
                                        @foreach($prc as $key => $value)
                                        <option {{ $value->nama == $buyer ? 'selected' : ''}} value="{{  $value->nama }}">{{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Supplier</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="supplier" name="supplier" value="{{$supplier}}" placeholder="Insert supplier">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">PO</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="po" name="po" value="" placeholder="Insert PO" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Item</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="item" name="item" value="{{$item}}" placeholder="Insert Item">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Date</span>
                                <div class="field2 mt-2">
                                    <input type="date" id="date" name="date" value="{{$date}}" placeholder="Insert Date">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Inspector</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="inspector" name="inspector" placeholder="Insert Inspector" value="{{ auth()->user()->nama}}">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Order Quantity</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="order_quan" name="order_quan" value="" placeholder="Insert Order Quantity">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Check QC QTY</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="qc_qty" name="qc_qty" value="" placeholder="Insert QC QTY">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">QTY Reject</span>
                                <div class="field2 mt-2">
                                    <input type="text" id="qty_reject" name="qty_reject" value="" placeholder="Insert QTY Reject">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <span class="general-identity-title">Status</span>
                                <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                                    <div class="justify-start">
                                        <div class="radioContainer">
                                            <input type="radio" name="status_id" value="1" id="pass" class="radioCustomInput" required>
                                            <label for="pass" class="radioCustom"></label>
                                        </div>
                                        <label for="pass" class="title-16 pointer ml-1" style="margin-top:6px">Pass</label>
                                    </div>
                                    <div class="justify-start">
                                        <div class="radioContainer">
                                            <input type="radio" name="status_id" value="2" id="Fail" class="radioCustomInput">
                                            <label for="Fail" class="radioCustom"></label>
                                        </div>
                                        <label for="Fail" class="title-16 pointer ml-1" style="margin-top:6px">Fail</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="branch" id="branch" value="{{auth()->user()->branch}}">
                            <input type="hidden" name="branchdetail" id="branchdetail" value="{{auth()->user()->branchdetail}}">
                        </div>
                        <div class="row py-4">
                            <div class="col-lg-12 justify-end">
                                <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>  

<script>
    $("input[name=jenis_report]:radio").click(function(ev) {
        console.log(ev.currentTarget.value);
        if (ev.currentTarget.value == "") {
            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');

            $('#showHide2').removeClass('hide');
            $('#showHide2').addClass('hide');
        } else if (ev.currentTarget.value == "report_biasa") {
            $('#showHide2').removeClass('hide');
            $('#showHide2').addClass('hide');

            $('#showHide').addClass('hide');
            $('#showHide').removeClass('hide');
        }else if (ev.currentTarget.value == "report_manual") {
            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');

            $('#showHide2').addClass('hide');
            $('#showHide2').removeClass('hide');
        }
    });
</script>
