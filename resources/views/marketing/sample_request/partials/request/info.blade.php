<div class="modal fade" id="info{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row px-4">
                <div class="col-12">
                    <span class="title-sm">Buyer</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="" name="" value="{{ $value['buyer'] }}" disabled>
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Style</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="" name="" value="{{ $value['style'] }}" disabled>
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Quantity</span>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="" name="" value="{{ $value['nama_size1'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="" name="" value="{{ $value['qty_size1'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="" name="" value="{{ $value['nama_size2'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="" name="" value="{{ $value['qty_size2'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="" name="" value="{{ $value['nama_size3'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="" name="" value="{{ $value['qty_size3'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="" name="" value="{{ $value['nama_size4'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="" name="" value="{{ $value['qty_size4'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="" name="" value="{{ $value['nama_size5'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="" name="" value="{{ $value['qty_size5'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Due Date</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date" id="DueDate" data-target-input="nearest">
                            <div class="input-group-append " data-target="#DueDate" data-toggle="datetimepicker">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input input-data-fa" data-target="#DueDate" name="tanggal" value="{{ $value['tanggal'] }}" readonly/>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Sample Request Document </div>
                    <div class="custom-file mt-1 mb-3">
                        {{-- <input type="text" name="" id="" value="{{ $value['sample_doc'] }}"> --}}
                        <input type="text" class="custom-file-input" id="" name="" value="{{ $value['sample_doc'] }}" accept=".pdf" readonly>
                        <label class="custom-file-labels"   value="{{ $value['sample_doc'] }}"></label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Tech Pack Document </div>
                    <div class="custom-file mt-1 mb-3">
                        <input type="text" class="custom-file-input" id="" name="" value="{{ $value['techpack_doc'] }}" accept=".pdf" readonly>
                        <label class="custom-file-labels"  value="{{ $value['techpack_doc'] }}"></label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Image</div>
                    <div class="custom-file mt-1 mb-3">
                        <input type="text" class="custom-file-input" id="" name="" value="{{ $value['foto'] }}" accept="image/gif,image/jpeg" readonly>
                        <label class="custom-file-labels"  value="{{ $value['foto'] }}"></label>
                    </div>
                </div>
                <div class="col-12 mb-4 mt-2">
                    <button type="button" class="btn-blue btn-block">Save<i class="wp-icon-btn fas fa-download"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>