
<div class="modal fade"  id="detailsOut{{ $value2['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Details Asset</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12">
                    <div class="borderlight mb-3"></div>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <div class="title-14-dark">Transaction</div>
                        <div class="title-14-dark2">{{ $value2['status'] }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Branch</div>
                        <div class="title-14-dark2">{{ $value2['brOrigin'] }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Recipient</div>
                         @if ($value2['supplier'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $value2['supplier'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Address</div>
                        @if ($value2['recipient'] == null)
                            <div class="title-14-dark2">-</div>
                            @else
                            <div class="title-14-dark2">{{ $value2['recipient'] }}</div>
                        @endif
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Date</div>
                        <div class="title-14-dark2">{{ $value2['date'] }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Category</div>
                        <div class="title-14-dark2">{{ $value2['jenis'] }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Qty</div>
                        <div class="title-14-dark2">{{ $value2['qty'] }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="title-14-dark">Price</div>
                        <div class="title-14-dark2">Rp. {{ $value2['price'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editOut{{ $value2['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.master.updateAssetTransaction')}}" method="post" enctype="multipart/form-data">
            @csrf 
                <div class="row">
                    <input type="hidden" name="id" value="{{ $value2['id'] }}">
                    <input type="hidden" name="id_machine" value="{{ $value2['id_machine'] }}">
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
                                <option selected>{{ $value2['status'] }}</option>
                                <option value="Sale">Sale</option>
                                <option value="TrialFinished">TrialFinished</option>
                                <option value="RentalFinished">RentalFinished</option>
                                {{-- @foreach ($dataTransaksi as $key21 => $value21)
                                    <option value="{{ $value21['transaction'] }}">{{ $value21['transaction'] }}</option>
                                @endforeach     --}}
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
                                 @if($value2['brOrigin']==null)
                                <option value='' selected >Select Branch</option>
                                @endif
                                @foreach ($dataAssetBranch as $key1 => $value1)
                                <option {{ $value2['brOrigin'] == $value1['branch_code'] ? 'selected' : ''}} value="{{ $value1['branch_code']}}">{{ $value1['branch_code'] }}</option>
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
                                <option selected>{{ $value2['supplier'] }}</option>
                                @foreach ($dataSupplier as $key11 => $value11)
                                    <option value="{{ $value11['nama'] }}">{{ $value11['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Date</div>
                        <input type="date" class="form-control borderInput mt-1 mb-3" id="" name="date" value="{{ $value2['date'] }}">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Qty</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="qty" value="{{ $value2['qty'] }}">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Price</div>
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="price" value="{{ $value2['price'] }}">
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Category</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="jenis">
                                <option selected>{{ $value2['jenis'] }}</option>
                                    @foreach ($dataCategory as $key99 => $value99)
                                    <option value="{{ $value99['jenis'] }}">{{ $value99['jenis'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="title-sm">Machine</div>
                        <div class="input-group flex relative mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="containerLeft"></span>
                                <div class="borderLeft2"></div>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="machine">
                                <option selected>{{ $value2['machine'] }}</option>
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