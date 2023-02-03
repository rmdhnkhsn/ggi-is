    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-20 title-none">Packing List</div>
                <div class="flexx" style="margin-right:245px;gap:.5rem">
                    <a href="" class="btn-blue-md" data-toggle="modal" data-target="#addPacking">Add <i class="ml-2 fs-18 fas fa-plus"></i></a>
                    @include('warehouse.expedition.packing_list.partials.modalAdd')
                    <div class="input-group flex w-230">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue px-3" for=""><i class="fs-20 fas fa-users"></i></span>
                        </div>
                        <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                            <option selected disabled>Select Buyer</option>
                            @foreach ($dataExpedisi as $key =>$value)
                            <option name="{{ $value['buyer'] }}">{{ $value['buyer'] }}</option>    
                                
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12 pb-5">
        <div class="cards-scroll scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable" class="table tbl-content-left">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>WO</th>
                        <th>Style</th>
                        <th>Buyer</th>
                        <th>NO Kontrak</th>
                        <th>NO PO</th>
                        <th>OFF CTN</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataExpedisi as $key =>$value)
                        
                    <tr class="clickable-row" data-href="{{ route('detail-packing') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value['tanggal'] }}</td>
                        <td>{{ $value['wo'] }}</td>
                        <td>{{ $value['style'] }}</td>
                        <td>{{ $value['buyer'] }}</td>
                        <td>{{ $value['no_kontrak'] }}</td>
                        <td>{{ $value['po'] }}</td>
                        <td>{{ $value['off_ctn'] }}</td>
                        <td>{{ $value['satuan'] }}</td>
                       
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
      </div>
    </div>