<div class="modal fade" id="update" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">New Shipment Date</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Select Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="date_ship_new" name="date_ship_new" placeholder="Enter New Shipdate" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Status</div>
                    <select class="form-control" name="tarikan" id="tarikan">
                        <option value="">(Blank)</option>
                        <option value="tarikan">Tarikan</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn-blue-md btn-block" onclick="updateFunction()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>