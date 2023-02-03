<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:600px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Filter Data</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" id="dateRange" class="form-control borderInput" name="daterange" value="" placeholder="Input Date" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Select Buyer</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-users"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                            <option selected disabled>Select Buyer</option>
                            <option name="Ajay Kapoor">Ajay Kapoor</option>    
                            <option name="Ajay Sugandi">Ajay Sugandi</option>    
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <a href="" class="btn-blue-md">Filter Data</a>
                </div>
            </div>
        </div>
    </div>
</div>