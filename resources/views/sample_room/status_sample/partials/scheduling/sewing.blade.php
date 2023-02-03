    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-24">Job List Sewing</div>
                <div class="margin-date">
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
            <table id="DTtable_scheduling3" class="table table-content no-wrap py-2">
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
                    @foreach ($dataSampleSewing as $key =>$value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{\Carbon\Carbon::parse($value['created_at'])->format('M') }}</td>
                            <td>{{ $value['sample_code'] }}</td>
                            <td>{{ $value['buyer'] }}</td>
                            <td>{{ $value['style'] }}</td>
                            <td>{{ $value['sewing_start'] }}</td>
                            <td>{{ $value['sewing_finish'] }}</td>
                            <td>{{ $value['actual_date_sewing'] }}</td>
                            <td>
                                <div class="justify-start">
                                    @if (($value['status_schedule_sewing'] == 'WAITING'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-pink" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_sewing'] }} </a>
                                    @elseif(($value['status_schedule_sewing'] == 'WIP'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-blue" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_sewing'] }} </a>

                                    @elseif(($value['status_schedule_sewing'] == 'SEWING'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-yellow" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_sewing'] }} </a>

                                    @elseif(($value['status_schedule_sewing'] == 'FINISH'))
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-green" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_sewing'] }} </a>
                                    @else
                                    <a href="{{ route('sample.detailDone',$value['id'])}}"  class="badge-pink" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="click for detail">{{ $value['status_schedule_sewing'] }} </a> 
                                    @endif
                                </div>
                            </td>
                            <td>{{ $value['remark_sewing'] }}</td>
                            <td>
                                <form action="{{ route('sample-sewingPDF',$value['id'])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{$value['id']}}">
                                    <button type="submit" class="tbl-btn-kanban2" style="border:2px solid #FB5B5B">Kanban<i class="ml-2 fas fa-file-pdf"></i></button>
                                    <a href="#" class="tbl-btn-remark" data-toggle="modal" data-target="#remark_sewing{{$value['id']}}">Remark<i class="ml-2 fas fa-plus"></i></a>
                                </form>
                                @include('sample_room.status_sample.partials.scheduling.modal.remark_sewing')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>