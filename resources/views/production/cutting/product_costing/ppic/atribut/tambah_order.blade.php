<div class="modal fade" id="tambahOrder" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
        <div class="modal-content" style="border-radius:10px">
            <form id="saveLink" action="{{ route('cutting.ppic.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row p-4">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Cutting Order</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">WO</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for="" style="height:38px;width:60px"><i class="fs-20 fas fa-list-ol"></i></span>
                            </div>
                            <input type="hidden" class="form-control border-input-10" id="nomor_wo" name="no_wo" value="">
                            <select class="form-control select2bs4_add" id="no_wo" name="no_wo">
                                <option selected>Select WO Number</option>
                                <option></option>
                            </select>
                            <!-- <input type="text" class="form-control border-input-10" id="" name="" placeholder="select wo number..." required> -->
                        </div>
                    </div>
                    <input type="hidden" name="style" id="style_wo" value="">
                    <input type="hidden" name="number_style" id="style_number" value="">
                    <input type="hidden" name="buyer" id="buyer_wo" value="">
                    <input type="hidden" name="item_number" id="item_number_wo" value="">
                    <input type="hidden" name="total_qty" id="total_qty_wo" value="">
                    <div class="col-12">
                        <div class="title-sm">Factory</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for="" style="height:40px !important;width:60px"><i class="fs-20 fas fa-building"></i></span>
                            </div>
                            <select class="form-control border-input-10 pointer" id="factory" name="factory">
                                <option  selected>Select Factory</option>
                                @foreach($address as $key => $value)
                                <option value="{{$value->id}}">{{$value->nama_branch}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 text-left">
                        <span class="title-sm">Start Date</span>
                        <div class="input-group mb-3 mt-2">
                            <div class="input-group date" id="start_date" data-target-input="nearest">
                                <div class="input-group-append " data-target="#start_date" data-toggle="datetimepicker">
                                    <div class="inputGroupBlue px-3" style="height:40px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input border-input-10" data-target="#start_date" id="start_date" name="production_date"  placeholder="Pilih Tanggal" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 text-left">
                        <span class="title-sm">Estimated Date Completed</span>
                        <div class="input-group mb-3 mt-2">
                            <div class="input-group date" id="estimate_date" data-target-input="nearest">
                                <div class="input-group-append " data-target="#estimate_date" data-toggle="datetimepicker">
                                    <div class="inputGroupBlue px-3" style="height:40px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input border-input-10" id="finish_date" data-target="#estimate_date" name="estimation_complete"  placeholder="Pilih Tanggal" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-left">
                        <span class="title-sm">Component</span>
                        <div class="input-group mb-3 mt-2">
                            <select class="form-control border-input-10" style="width:100%" id="multipleSelectExample" name="component[]" multiple="true" >

                            </select>
                        </div>
                    </div>
                    <div class="col-12 justify-end mt-4">
                        <button type="submit" class="btn-blue-md">Save<i class="fs-18 ml-2 fas fa-download"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>