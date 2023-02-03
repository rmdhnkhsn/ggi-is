<!-- Modal -->
<div class="modal fade" id="editRole{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
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
                    <span class="title-18">Edit User Management</span>
                </div>
                <form action="{{route('usersmqc.update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$value->id}}">
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">NIK</span>
                            <div class="field2 mt-2">
                                <input type="text" name="nama" value="{{$value->nik}}" placeholder="Insert Employee Name">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Employee Name</span>
                            <div class="field2 mt-2">
                                <input type="text" name="nama" value="{{$value->nama}}" placeholder="Insert Employee Name">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Branch</span>
                            <div class="field2 mt-2">
                                <input type="text" name="branch" value="{{$value->branch}}" placeholder="Insert Branch">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">BranchDetail</span>
                            <div class="field2 mt-2">
                                <input type="text" name="branchdetail" value="{{$value->branchdetail}}" placeholder="Insert BranchDetail">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="general-identity-title">Email</span>
                            <div class="field2 mt-2">
                                <input type="text" name="email" value="{{$value->email}}" placeholder="Insert Email">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <span class="title-sm">Buyer</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select">Buyer</span>
                                </div>
                                <select class="form-control" name="buyer" id="buyer">
                                    <option selected></option>
                                    @foreach($buyer as $key2 => $value2)
                                    <option {{ $value->buyer == $value2->name ? 'selected' : ''}} value="{{  $value2->name }}">{{ $value2->name}}</option>
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
                                    @foreach($kategori as $key3 => $value3)
                                    <option {{ $value->kategori == $value3->nama_kategori ? 'selected' : ''}} value="{{  $value3->nama_kategori }}">{{ $value3->nama_kategori }}</option>
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
                                    @foreach($role as $key4 => $value4)
                                    <option {{ $value->role == $value4->kode_role ? 'selected' : ''}} value="{{  $value4->kode_role }}">{{ $value4->kode_role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12 justify-end">
                            <button type="submit" class="btn btn-blue">Update<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>  
</div>
