<div class="modal fade" id="detailsIn{{ $row['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Details Asset</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <div class="title-14-dark">Transaction</div>
                        <div class="title-14-dark2">{{ $row['status'] }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Branch</div>
                        <div class="title-14-dark2">{{ $row['brOrigin'] }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Supplier</div>
                        <div class="title-14-dark2">{{ $row['supplier'] }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Date</div>
                        @if ($row['date'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['date'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Code</div>
                        @if ($row['code'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['code'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Type</div>
                        @if ($row['tipe'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['tipe'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Category</div>
                        @if ($row['jenis'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['jenis'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Brand</div>
                         @if ($row['merk'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['merk'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Serial No</div>
                        @if ($row['serialno'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['serialno'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Variant</div>
                        @if ($row['varian'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['varian'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Location</div>
                         @if ($row['lokasi'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['lokasi'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Qty</div>
                        @if ($row['qty'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $row['qty'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Price</div>
                        @if ($row['price'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">Rp. {{ $row['price'] }}</div>
                        @endif
                    </div>
                    {{-- <div class="mb-2">
                        <div class="title-14-dark">Machine</div>
                        <div class="title-14-dark2">{{ $value['machine'] }}</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editIn{{ $row['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.master.updateAssetTransaction' )}}" method="post" enctype="multipart/form-data">
            @csrf 
                <div class="row">
                    <input type="hidden" name="id" value="{{ $row['id'] }}">
                    <input type="hidden" name="id_machine" value="{{ $row['id_machine'] }}">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Edit Asset</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Transaction</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="status">
                                @if($row['status']==null)
                                <option value='' selected >Select Location Type</option>
                                @endif
                                @foreach ($dataTransaksi as $key21 => $value21)
                                <option {{ $row['status'] == $value21['transaction'] ? 'selected' : ''}} value="{{ $value21['transaction']}}">{{ $value21['transaction'] }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Branch</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="branch">
                                 @if($row['brOrigin']==null)
                                <option value='' selected >Select Branch</option>
                                @endif
                                @foreach ($dataAssetBranch as $key1 => $value1)
                                <option {{ $row['brOrigin'] == $value1['branch_code'] ? 'selected' : ''}} value="{{ $value1['branch_code']}}">{{ $value1['branch_code'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Supplier</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="supplier">
                                 @if($row['supplier']==null)
                                <option value='' selected >Select Supplier</option>
                                @endif
                                @foreach ($dataSupplier as $key11 => $value11)
                                <option {{ $row['supplier'] == $value11['nama'] ? 'selected' : ''}} value="{{ $value11['nama']}}">{{ $value11['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Date</div>
                        <input type="date" class="form-control borderInput mt-1 mb-3" id="" name="date" value="{{ $row['date'] }}">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Code</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="code" value="{{ $row['code'] }}">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Type</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="tipe">
                                <option selected>{{ $row['tipe'] }}</option>
                                   @foreach ($dataType as $key19 => $value19)
                                        <option value="{{ $value19['tipe'] }}">{{ $value19['tipe'] }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="jenis">
                                <option selected>{{ $row['jenis'] }}</option>
                                    @foreach ($dataCategory as $key99 => $value99)
                                    <option value="{{ $value99['jenis'] }}">{{ $value99['jenis'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Brand</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="merk">
                                <option selected>{{ $row['merk'] }}</option>
                                @foreach ($dataBrand as $key4 => $value4)
                                    <option value="{{ $value4['merk'] }}">{{ $value4['merk'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Serial No</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="serialno" value="{{ $row['serialno'] }}">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Variant</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="varian" value="{{ $row['varian'] }}">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Location</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="location">
                                <option selected>{{ $row['lokasi'] }}</option>
                                @foreach ($dataLocation as $key19 => $value19)
                                    <option value="{{ $value19['nama'] }}">{{ $value19['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Qty</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="qty" value="1">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Price</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="price" value="{{ $row['price'] }}">
                    </div>
                    {{-- <div class="col-12">
                        <div class="title-sm">Machine</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="machine">
                                <option selected>{{ $value['machine'] }}</option>
                                @foreach ($dataMachine as $key7 => $value7)
                                    <option value="{{ $value7['jenis'] }}">{{ $value7['jenis'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btn-block">Save Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>