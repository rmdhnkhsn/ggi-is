    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-24">Material Status</div>
                <div class="margin-date2">
                    <div class="input-group date" id="Date3" data-target-input="nearest">
                        <div class="input-group-append datepiker" data-target="#Date3" data-toggle="datetimepicker">
                            <div class="custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input border-input-grey" data-target="#Date3" placeholder="Select Date" style="width:125px"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar-sm">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable3" class="table tbl-content-left no-wrap">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>DATE.TRANS</th>
                        <th>CONTRACT.NO</th>
                        <th>BRANCH.TO</th>
                        <!-- <th>VENDOR</th> -->
                        <th>TOTAL.PACK</th>
                        <!-- <th>TOTAL.RCV</th> -->
                        <th>PACK.ANOMALI</th>
                        <th>ANOMALI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->where('status',3) as $k =>$v)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$v->tanggal_trans}}</td>
                            <td>{{ $v->list_subkon()}}</td>
                            <td>{{$v->to_branchdetail}}</td>
                            <!-- <td>{{ $v->to_desc }}</td> -->
                            <td>{{ $v->total_pack() }}</td>
                            <!-- <td>{{ $v->total_item_receipted() }}</td> -->
                            <td>{{ $v->total_item_anomali() }}</td>
                            <td>
                                <!-- <div class="container-tbl-btn3">
                                    <a href="{{ route('anomali-receiving',$v->id) }}" class="btn-simple-edit"><i class="fs-18 fas fa-pen-alt"></i></a>
                                </div> -->
                                <div class="container-tbl-btn3">
                                    <a href="{{ route('set-anomali-receiving',$v->id) }}" class="btn-simple-edit" title="set anomali"><i class="fs-18 fas fa-pen-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>