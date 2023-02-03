<form  action="{{route('asset.master.storeAssetUserAkses')}}" method="post" enctype="multipart/form-data">
   @csrf 
    <div class="modal fade" id="addData" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
            <div class="modal-content p-4" style="border-radius:10px">
                {{-- <form action=""> --}}
                    <div class="row">
                        <div class="col-12 justify-sb">
                            <div class="title-18">Add Data</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="borderlight2"></div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="title-sm mb-1">Company</div>
                            <select class="form-control borderInput pointer select2bs4" name="company" id="">
                                <option selected disabled>Select Company</option>
                                    <option value="GGI">GGI</option>
                                    <option value="CNJ">CNJ</option>
                                    <option value="CHAWAN">CHAWAN</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="title-sm mb-1">Branch</div>
                            <select class="form-control borderInput pointer select2bs4" name="branch" id="">
                                <option selected disabled>Select Branch</option>
                                @foreach ($dataAssetBranch as $key16 => $value16)
                                    <option value="{{ $value16['branch_code'] }}">{{ $value16['branch_code'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="title-sm mb-1">Nik</div>
                            <select class="form-control borderInput pointer select2bs4" name="nik" id="nik">
                                <option value="" selected>Select Nik</option>
                                    @foreach($userAdd as $row)
                                    <option name="nik" value="{{ $row->nik }}">{{ $row->nik }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Name</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="nama" name="fullname" placeholder="Input Company">
                        </div>
                        <div class="col-12 mb-3">
                            <div class="title-sm mb-1">Role</div>
                            <select class="form-control borderInput pointer select2bs4" name="role" id="">
                                <option selected disabled>Select Role</option>
                                <option value="Sys_Admin">Sys_Admin</option>
                                <option value="Mekanik">Mekanik</option>
                                <option value="Mekanik">Mekanik</option>
                                <option value="SPV">SPV</option>
                                <option value="Administrator">Administrator</option>
                            </select>
                        </div>
                        {{-- <div class="col-12">
                            <div class="title-sm">Company</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Company">
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Branch</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Branch">
                        </div> --}}


                        {{-- <div class="col-12">
                            <div class="title-sm">User Name</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="username" placeholder="Input User Name">
                        </div>
                        <div class="col-12">
                            <div class="title-sm">Full Name</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="fullname" placeholder="Input Full Name">
                        </div> --}}
                        {{-- <div class="col-12">
                            <div class="title-sm">User Role</div>
                            <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="role" placeholder="Input User Role">
                        </div> --}}
                        <div class="col-12">
                            <div class="title-sm">Status</div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrapperRadio mt-1">
                                <input type="radio" name="status" value="Aktif" class="radioGreen" id="Active">
                                <label for="Active" class="optionGreen check">
                                    <span class="descGreen">Active</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrapperRadio mt-1">
                                <input type="radio" name="status" value="NonAktif" class="radioOrange" id="NonActive">
                                <label for="NonActive" class="optionOrange check">
                                    <span class="descOrange">Non Active</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn-blue-md btn-block success">Save</button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</form>
