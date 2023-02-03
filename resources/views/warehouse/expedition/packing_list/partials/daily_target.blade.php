    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-20 title-none">Packing List</div>
                <div class="flexx" style="margin-right:245px">
                    <div class="input-group flex" style="width:230px">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue px-3" for=""><i class="fs-20 fas fa-users"></i></span>
                        </div>
                        <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                            <option selected disabled>Select Buyer</option>
                            <option name="Adidas">Adidas</option>    
                            <option name="Erigo">Erigo</option>    
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
            <table id="DTtable2" class="table tbl-content-left">
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
                    <tr class="clickable-row" data-href="{{ route('detail-packing') }}">
                        <td>1</td>
                        <td>02/03/2022</td>
                        <td>176322</td>
                        <td>5152362</td>
                        <td>Adidas</td>
                        <td>332100185484548</td>
                        <td>PO099779687</td>
                        <td>18</td>
                        <td>PCE</td>
                    </tr>
                    <tr class="clickable-row" data-href="{{ route('detail-packing') }}">
                        <td>2</td>
                        <td>02/04/2022</td>
                        <td>176332</td>
                        <td>5152365</td>
                        <td>H & M</td>
                        <td>332100185484548</td>
                        <td>PO099779687</td>
                        <td>18</td>
                        <td>PCE</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>