<div class="modal fade" id="order" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
        <div class="modal-content" style="border-radius:10px">
            <form id="saveLink" action="{{ route('cutting.ppic.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 pt-3 px-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row px-4">
                <div class="col-12 mb-3">
                    <span class="title-24">Order Cutting</span>
                </div>
                <div class="col-12 text-left">
                    <span class="title-sm">WO</span>
                    <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-select"><i class="fas fa-list"></i></span>
                        </div>
                        <input type="hidden" class="form-control" id="nomor_wo" name="no_wo" value="">
                        <select class="form-control select2bs4_add" id="no_wo" name="no_wo">
                            <option selected>Select WO Number</option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="style" id="style_wo" value="">
                <input type="hidden" name="buyer" id="buyer_wo" value="">
                <input type="hidden" name="item_number" id="item_number_wo" value="">
                <input type="hidden" name="total_qty" id="total_qty_wo" value="">
                <div class="col-12 text-left">
                    <span class="title-sm">Select Factory</span>
                    <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-select" for="F0101_ALPH">Factory</span>
                        </div>
                        <select class="form-control input-data-fa" id="factory" name="factory">
                            <option  selected> </option>
                            <option>a</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 text-left">
                    <span class="title-sm">Start Date</span>
                    <div class="input-group mb-3 mt-2">
                        <div class="input-group date" id="start_date" data-target-input="nearest">
                            <div class="input-group-append " data-target="#start_date" data-toggle="datetimepicker">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input input-data-fa" data-target="#start_date" id="start_date" name="production_date"  placeholder="Pilih Tanggal" style="border-radius: 0 5px 5px 0;" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 text-left">
                    <span class="title-sm">Estimated Date Completed</span>
                    <div class="input-group mb-3 mt-2">
                        <div class="input-group date" id="estimate_date" data-target-input="nearest">
                            <div class="input-group-append " data-target="#estimate_date" data-toggle="datetimepicker">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input input-data-fa" id="finish_date" data-target="#estimate_date" name="estimation_complete"  placeholder="Pilih Tanggal" style="border-radius: 0 5px 5px 0;" required/>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-left">
                    <span class="title-sm">Component</span>
                    <div class="input-group mb-3 mt-2">
                        <select class="form-control input-data-fa" style="width:100%" id="multipleSelectExample" name="component[]" multiple="true" >

                        </select>
                    </div>
                </div>
                    <div class="col-12 my-4">
                        <button type="submit" class="btn-blue btn-block" style="border-radius:10px">Save<i class="ml-2 fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>