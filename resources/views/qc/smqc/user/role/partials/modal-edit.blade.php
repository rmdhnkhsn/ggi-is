<!-- Modal -->
<div class="modal fade" id="editRole{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:400px">
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
                    <span class="title-18">Edit Role</span>
                </div>
                <form action="{{route('role.update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$value->id}}">
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Role Code</span>
                            <div class="field2 mt-2">
                                <input type="text" id="kode_role" name="kode_role" value="{{$value->kode_role}}" placeholder="Insert Role Code">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Role Name</span>
                            <div class="field2 mt-2">
                                <input type="text" id="nama_role" name="nama_role" value="{{$value->nama_role}}" placeholder="Insert Role Name">
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
