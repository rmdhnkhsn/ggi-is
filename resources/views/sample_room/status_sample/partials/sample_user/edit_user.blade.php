<form action="{{ route('sample-updateUser', $value['id'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="edit_user{{$value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 pt-3 px-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-12 text-center mb-3">
                        <span class="title-20">Add User</span>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">NIK</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input" id="nik" name="nik" value="{{ $value['nik'] }}" placeholder="Input NIK...">
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Nama</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input" id="nama" name="nama" value="{{$value['nama'] }}" placeholder="Input Nama...">
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="title-sm">Jabatan</span>
                        <div class="input-group mt-1 mb-3">
                            <input type="text" class="form-control border-input" id="jabatan" name="jabatan" value="{{$value['jabatan'] }}" placeholder="Input Jabatan...">
                        </div>
                    </div>
                    <div class="col-12 mb-4 mt-2">
                        <button type="submit" class="btn-blue ml-auto">Save<i class="ml-2 fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>