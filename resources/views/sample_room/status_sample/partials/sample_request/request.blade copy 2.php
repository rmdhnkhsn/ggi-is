    <div class="row">
        <div class="col-12 flex">
            <div class="title-24">Job List</div>
            <div class="ml-auto">
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
    <div class="row">
      <div class="col-12">
        <div class="cards-scroll scrollX" id="scroll-bar-sm">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable" class="table table-content tr-hover no-wrap py-2">
                <thead>
                    <tr>
                        <th width="30px">Initial</th>
                        <th width="30px">Code</th>
                        <th width="30px">Buyer</th>
                        <th width="160px">Style</th>
                        <th width="30px">Qty</th>
                        <th width="100px">Project In</th>
                        <th width="100px">Due Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="inactive">
                        <td>March</td>
                        <td>322122</td>
                        <td>FOCUS</td>
                        <td>GSCB-03 WANITA</td>
                        <td>33</td>
                        <td>24/06/2022</td>
                        <td>28/06/2022</td>
                        <td>
                            <div class="container-tbl-slide">
                                <a href="#" class="tbl-btn-info"><i class="fas fa-info"></i></a>
                                <a href="#" class="tbl-btn-assign" data-toggle="modal" data-target="#assign">Assign<i class="ml-2 fas fa-check"></i></a>
                                @include('sample_room.status_sample.partials.sample_request.modal.assign_request')
                            </div>
                        </td>
                    </tr>
                    <tr class="inactive">
                        <td>March</td>
                        <td>322122</td>
                        <td>FOCUS</td>
                        <td>GSCB-03 WANITA</td>
                        <td>2</td>
                        <td>24/03/2022</td>
                        <td>28/03/2022</td>
                        <td>
                            <div class="container-tbl-slide">
                                <a href="#" class="tbl-btn-info"><i class="fas fa-info"></i></a>
                                <a href="#" class="tbl-btn-assign" data-toggle="modal" data-target="#assign">Assign<i class="ml-2 fas fa-check"></i></a>
                                @include('sample_room.status_sample.partials.sample_request.modal.assign_request')
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
    
    <script>
        $('#DTtable tr.inactive').on("click",function(){
            $('#DTtable tr').removeClass("active");
            $('#DTtable tr').addClass("inactive");

            $(this).removeClass("inactive");
            $(this).addClass("active");
        });
    </script>
