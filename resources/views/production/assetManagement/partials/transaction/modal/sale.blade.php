 {{-- <form  action="{{route('asset.master.storeAssetTransaction')}}" method="post" enctype="multipart/form-data">
    @csrf --}}
    <div class="modal fade" id="sale" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:740px">
            <div class="modal-content p-4" style="border-radius:10px">
                <form  action="{{route('asset.master.updateAssetTransaction')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                <div class="row">
                    <input type="hidden" name="id" value="{{ $id }}">
                     <input type="hidden" id="JmlRow" name="JmlRow" value="0">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Transaction Out</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12 mb-1">
                        <div class="title-sm">Transaction Category</div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrapperRadio mb-3">
                            <input type="radio" name="status" value="Sale" class="radioBlue" id="sale1">
                            <label for="sale1" class="optionBlue check">
                                <span class="descBlue">Sale</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrapperRadio mb-3">
                            <input type="radio" name="status" value="RentalFinished" class="radioGreen" id="rental1">
                            <label for="rental1" class="optionGreen check">
                                <span class="descGreen">Rental Finished</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrapperRadio mb-3">
                            <input type="radio" name="status" value="TrialFinished" class="radioOrange" id="trial1">
                            <label for="trial1" class="optionOrange check">
                                <span class="descOrange">Trial Finished</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Supplier</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                            </div>
                             <select class="form-control borderInput select2bs4 pointer" id="nama" name="supplier" required>
                                <option selected disabled>Select Supplier</option>
                                @foreach ($dataSupplier as $key => $value)
                                    <option name="supplier" value="{{ $value['nama'] }}">{{ $value['nama'] }}</option>
                                @endforeach
                            </select>
                            <input type="hidden"name="recipient" id="alamat">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Date</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control border-input-10 h-38" id="" name="date" required>
                        </div>
                    </div>

                    <div class="col-12 mt-2 mb-4">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12 justify-sb mb-3">
                        <div class="title-18">Item List</div>
                        <button id="addRowSale" type="button" class="btn-blue-md">Add<i class="fs-18 ml-2 fas fa-plus"></i> </button>
                    </div>
                    <div class="noItem" id="noItem">
                        <img src="{{url('images/iconpack/asset_management/no-item.svg')}}">
                    </div>
                </div>
                <div id="newRowSale"></div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <a href="" class="btn-outline-merah-md btn-block" data-dismiss="modal" aria-label="Close">Cancel<img src="{{url('images/iconpack/feedback/cancel.svg')}}" class="ml-2"></a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn-blue-md btn-block"> Save <i class="fs-18 ml-3 fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </form>