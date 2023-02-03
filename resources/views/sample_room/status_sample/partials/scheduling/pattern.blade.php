    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-24">Job List Pattern</div>
                <div class="margin-date">
                    <div class="input-group date" id="Date" data-target-input="nearest">
                        <div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker">
                            <div class="custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input border-input-grey" data-target="#Date" placeholder="Select Date" style="width:125px"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar-sm">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable_scheduling" class="table table-content no-wrap py-2">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>INITIAL</th>
                        <th>SMP CODE</th>
                        <th>BUYER</th>
                        <th>STYLE</th>
                        <th>START DATE</th>
                        <th>FINISH DATE</th>
                        <th>ACTUAL DATE</th>
                        <th>STATUS</th>
                        <th>REMARK</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($dataSamplePattern as $key =>$value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{\Carbon\Carbon::parse($value['created_at'])->format('M') }}</td>
                            <td>{{ $value['sample_code'] }}</td>
                            <td>{{ $value['buyer'] }}</td>
                            <td>{{ $value['style'] }}</td>
                            <td>{{ $value['pattern_start'] }}</td>
                            <td>{{ $value['pattern_finish'] }}</td>
                            <td>{{ $value['actual_date_pattern'] }}</td>
                            <td>
                                <div class="justify-start">
                                    @if (($value['status_schedule_pattern'] == 'WAITING'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-pink" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_pattern'] }} </a>
                                    @elseif(($value['status_schedule_pattern'] == 'WIP'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-blue" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_pattern'] }} </a>
                                    @elseif(($value['status_schedule_pattern'] == 'SEWING'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-yellow" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_pattern'] }} </a>
                                    @elseif(($value['status_schedule_pattern'] == 'FINISH'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-green" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_pattern'] }} </a>
                                    @else
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-pink" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_pattern'] }} </a> 
                                    @endif
                                </div>
                            </td>
                            <td>{{  $value['remark']  }}</td>
                            <td>
                                <form action="{{ route('sample-sewingPDF',$value['id'])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{$value['id']}}">
                                    <button type="submit" class="tbl-btn-kanban2">Kanban<i class="ml-2 fas fa-file-pdf"></i></button>
                                    <a href="#" class="tbl-btn-remark" data-toggle="modal" data-target="#remark_pattern{{$value['id']}}">Remark<i class="ml-2 fas fa-plus"></i></a>
                                </form>
                                @include('sample_room.status_sample.partials.scheduling.modal.remark_pattern')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>