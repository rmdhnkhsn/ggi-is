<div class="modal fade" id="edit{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <input type="text" class="form-control border-input" id="buyer" name="buyer" value="{{ $value['buyer'] }}" placeholder="Input buyer...">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Style</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="style" name="style" value="{{ $value['style'] }}" placeholder="Input style...">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Quantity</span>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="nama_size1" name="nama_size1" value="{{ $value['nama_size1'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="qty_size1" name="qty_size1" value="{{ $value['qty_size1'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="nama_size2" name="nama_size2" value="{{ $value['nama_size2'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="qty_size2" name="qty_size2" value="{{ $value['qty_size2'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="nama_size3" name="nama_size3" value="{{ $value['nama_size3'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="qty_size3" name="qty_size3" value="{{ $value['qty_size3'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="nama_size4" name="nama_size4" value="{{ $value['nama_size4'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="qty_size4" name="qty_size4" value="{{ $value['qty_size4'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-qty">
                    <div class="input-group mb-3 mt-1">
                        <input id="center" type="text" class="form-control input1" id="nama_size5" name="nama_size5" value="{{ $value['nama_size5'] }}" placeholder="...">
                        <input id="center" type="text" class="form-control border-input size" id="qty_size5" name="qty_size5" value="{{ $value['qty_size5'] }}" placeholder="0">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">Due Date</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date" id="DueDate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#DueDate" data-toggle="datetimepicker">
                                <div class="custom-calendar px-3"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                            </div>
                            <input type="date" class="form-control datetimepicker-input input-data-fa" data-target="#DueDate" name="tanggal" value="{{ $value['tanggal'] }}" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Sample Request Document </div>
                    <div class="custom-file mt-1 mb-3">
                        <input type="file" class="custom-file-input" id="sample_doc" name="sample_doc" value="{{ $value['sample_doc'] }}" accept=".pdf">
                        <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Tech Pack Document </div>
                    <div class="custom-file mt-1 mb-3">
                        <input type="file" class="custom-file-input" id="techpack_doc" name="techpack_doc" value="" accept=".pdf">
                        <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Image</div>
                    <div class="custom-file mt-1 mb-3">
                        <input type="file" class="custom-file-input" id="foto" name="foto" value="{{ $value['foto'] }}" accept="image/gif,image/jpeg">
                        <label class="custom-file-labels" for="customFile"><span class="choose-file"></span></label>
                    </div>
                </div>
                <div class="col-12 mb-4 mt-2">
                    <button type="submit" class="btn-blue btn-block">{{ $submit }}<i class="wp-icon-btn fas fa-download"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>