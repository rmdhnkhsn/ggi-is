    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-24">Job List</div>
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
            <table id="DTtable_sticky" class="table table-content tr-hover no-wrap">
                <thead>
                    <tr>
                        <th>Initial</th>
                        <th>Code</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Qty</th>
                        <th>Project In</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSampleRequest as $key =>$value)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($value['created_at'])->format('M') }}</td>
                        <td>{{ $value['sample_code'] }}</td>
                        <td>{{ $value['buyer'] }}</td>
                        <td>{{ $value['style'] }}</td>
                        <td>{{ $value['total_size'] }}</td>
                        <td>{{\Carbon\Carbon::parse($value['created_at'])->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($value['tanggal'])->format('d-m-Y') }}</td>
                        <td>
                            <form action="{{ route('sample.update1', $value['id'])}}" method="post" enctype="multipart/form-data">
                                <a href="{{ route('sample.detailDone',$value['id'])}}" class="tbl-btn-info"><i class="fas fa-info"></i></a>
                                <a href="javascript:void(0)"  class="tbl-btn-assign" data-toggle="modal" data-target="#assign{{$value['id']}}" >Assign<i class="ml-2 fas fa-check"></i></a>                                
                                @csrf
                                @include('sample_room.status_sample.partials.sample_request.modal.assign_request',['submit' => 'Submit'])
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>