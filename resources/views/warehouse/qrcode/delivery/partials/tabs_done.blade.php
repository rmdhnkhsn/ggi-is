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
                        <th>NO</th>
                        <th>DATE.TRANS</th>
                        <th>CONTRACT.NO</th>
                        <th>BRANCH.TO</th>
                        <th>TOTAL.PACK</th>
                        <th>TOTAL.RCV</th>
                        <th>PACKINGLIST</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($data->where('status',4) as $k=>$v)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$v->tanggal_trans}}</td>
                            <td>{{$v->list_subkon()}}</td>
                            <td>{{$v->to_branchdetail}}</td>
                            <td>{{$v->total_pack()}}</td>
                            <td>{{ $v->total_item_receipted() }}</td>
                            <td>
                                <div class="container-tbl-btn">
                                    <a href="{{route('warehouse-delivery-packinglist',$v->id)}}" class="btn-simple-info"><i class="fs-18 fas fa-print"></i></a>
                                </div>
                            </td>
                        </tr>
                        @php
                            $i+=1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>