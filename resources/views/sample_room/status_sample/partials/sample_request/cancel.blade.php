    <div class="row">
        <div class="col-12">
            <div class="title-24">Job List</div>
        </div>
    </div>
    <div class="row">
      <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable_sticky5" class="table table-content tr-hover no-wrap py-2">
                <thead>
                    <tr>
                        <th width="30px">Initial</th>
                        <th width="30px">Code</th>
                        <th width="30px">Buyer</th>
                        <th width="160px">Style</th>
                        <th width="30px">Qty</th>
                        <th width="100px">Project In</th>
                        <th width="100px">Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSampleCancle as $key => $value)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($value['created_at'])->format('M') }}</td>
                            <td>{{ $value['sample_code'] }}</td>
                            <td>{{ $value['buyer'] }}</td>
                            <td>{{ $value['style'] }}</td>
                            <td>{{ $value['total_size'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($value['created_at'])->format('d-m-Y') }}</td>
                            <td>{{ $value['remark_cancel'] }}</td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>