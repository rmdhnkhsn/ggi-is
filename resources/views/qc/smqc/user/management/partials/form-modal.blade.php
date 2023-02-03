<!-- Modal -->
<div class="modal fade" id="inac" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:800px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="col-12 text-center">
                    <span class="title-18">Create User Management</span>
                </div>
                <form action="{{route('usersmqc.store')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" class="form-control border-input-10" id="nik_karyawan" name="nik" value="">
                        <div class="col-6 mt-3">
                            <span class="title-sm">NIK Employee</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">NIK</span>
                                </div>
                                <select class="form-control select2bs4_add" id="karyawan_nik">
                                    <option selected>Select NIK Employee</option>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Employee Name</span>
                            <div class="field2 mt-2">
                                <input type="text" id="nama_karyawan" name="nama" value="" placeholder="Insert Employee Name">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Branch</span>
                            <div class="field2 mt-2">
                                <input type="text" id="branch_karyawan" name="branch" value="" placeholder="Insert Branch">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">BranchDetail</span>
                            <div class="field2 mt-2">
                                <input type="text" id="branchdetail_karyawan" name="branchdetail" value="" placeholder="Insert BranchDetail">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Email</span>
                            <div class="field2 mt-2">
                                <input type="text" id="email_karyawan" name="email" value="" placeholder="Insert Email">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="title-sm">Buyer</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Buyer</span>
                                </div>
                                <select class="form-control select2bs4_buyer" name="buyer" id="buyer">
                                    <option selected></option>
                                    @foreach($buyer as $key => $value)
                                    <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="title-sm">Category</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Category</span>
                                </div>
                                <select class="form-control input-data-fa" name="kategori" id="kategori">
                                    <option selected></option>
                                    @foreach($kategori as $key => $value)
                                    <option value="{{$value->nama_kategori}}">{{$value->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="title-sm">Role</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Role</span>
                                </div>
                                <select class="form-control input-data-fa" name="role" id="role">
                                <option selected></option>
                                    @foreach($role as $key => $value)
                                    <option value="{{$value->kode_role}}">{{$value->kode_role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12 justify-end">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>  
</div>
