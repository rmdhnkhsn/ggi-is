    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-24">Job List</div>
                <div class="margin-date">
                    <div class="input-group date" id="Date4" data-target-input="nearest">
                        <div class="input-group-append datepiker" data-target="#Date4" data-toggle="datetimepicker">
                            <div class="custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input border-input-grey" data-target="#Date4" placeholder="Select Date" style="width:125px"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable_sticky4" class="table table-content tr-hover no-wrap">
                <thead>
                    <tr>
                        <th width="30px">Initial</th>
                        <th width="30px">Code</th>
                        <th width="30px">Buyer</th>
                        <th width="160px">Style</th>
                        <th width="30px">Qty</th>
                        <th width="100px">Accept In</th>
                        <th width="100px">Due Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSampleSewing as $key => $value)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($value['created_at'])->format('M') }}</td>
                            <td>{{ $value['sample_code'] }}</td>
                            <td>{{ $value['buyer'] }}</td>
                            <td>{{ $value['style'] }}</td>
                            <td>{{ $value['total_size'] }}</td>
                            <td>{{\Carbon\Carbon::parse($value['Accepting_date'])->format('d-m-Y') }}</td>
                            <td>{{\Carbon\Carbon::parse($value['tanggal'])->format('d-m-Y') }}</td>
                            <td>
                                <form action="{{route ('sample-updateDepartementTrecking') }}" method="post" enctype="multipart/form-data">
                                    <a href="" class="tbl-btn-dailyUpdate" data-toggle="modal" data-target="#dailyUpdateSew"><i class="fs-20 fas fa-calendar-alt"></i></a>
                                    <a href="{{ route('sample.detailDone',$value['id'])}}" class="tbl-btn-info"><i class="fas fa-info"></i></a>
                                    <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                                    <input type="hidden" id="departement_trecking" name="departement_trecking" value="FINISH">
                                    <input type="hidden" id="status_schedule_pattern" name="status_schedule_pattern" value="WIP">
                                    <input type="hidden" id="status_schedule_cutting" name="status_schedule_cutting" value="WIP">
                                    <input type="hidden" id="status_schedule_sewing" name="status_schedule_sewing" value="WIP">
                                    @if ( $value['tanggal'] > $value['finish_date'])
                                    <input type="hidden" id="result" name="result" value="LATE">
                                    <input type="hidden" id="nik" name="nik" value="{{ $value['nik'] }}">
                                    <input type="hidden" id="buyer" name="buyer" value="{{ $value['buyer'] }}">
                                    <input type="hidden" id="style" name="style" value="{{ $value['style'] }}">
                                    @else
                                    <input type="hidden" id="result" name="result" value="DONE">
                                    <input type="hidden" id="nik" name="nik" value="{{ $value['nik'] }}">
                                    <input type="hidden" id="buyer" name="buyer" value="{{ $value['buyer'] }}">
                                    <input type="hidden" id="style" name="style" value="{{ $value['style'] }}">
                                    @endif
                                    <input type="hidden" id="finish_date" name="finish_date" value="{{ \Carbon\Carbon::now() }}">
                                    <button type="submit" class="tbl-btn-assign2">Assign<i class="ml-2 fas fa-check"></i></button>
                                    @csrf
                                </form>
                                @include('sample_room.status_sample.partials.sample_request.modal.assign_sewing')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>