<!-- Modal -->
<form action="{{ route('master_kode_kerja.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="inac" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="max-width:500px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>  
                    </div> 
                    <div class="row">
                        <div class="col-12 text-center">
                            <span class="title-18">Master Kode Kerja</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Kode Kerja</span>
                            <div class="field2 mt-2">
                                <input type="text" id="kode_kerja" name="kode_kerja" placeholder="Contoh (A001)" value="{{auth()->user()->branch}}-">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Jam Kerja</span>
                            <div class="field2 mt-2">
                                <input type="number" id="jam_kerja" name="jam_kerja" placeholder="Contoh (8 Jam)">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <span class="general-identity-title">Istirahat</span>
                            <div class="field2 mt-2">
                                <input type="number" id="istirahat" name="istirahat" placeholder="Masukan dalam satuan menit, Contoh (30  Menit)">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="branch" id="branch" value="{{auth()->user()->branch}}">
                    <input type="hidden" name="branchdetail" id="branchdetail" value="{{auth()->user()->branchdetail}}">
                    <div class="row py-4">
                        <div class="col-lg-12 justify-end">
                            <button type="submit" class="btn btn-blue">Save<i class="ml-3 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</form>

<!-- =============== -->
<form action="{{route('master_kode_kerja.update_hari_kerja')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="hari_kerja" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:360px">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 border-bottom pb-2 mb-2 justify-sb">
                            <span class="title-15">Upldate Hari Kerja</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-12">
                            <span class="title-sm">Jumlah Hari</span>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-icon"><i class="fas fa-pen-alt"></i></span>
                                </div>
                                <input type="hidden" name="id" id="id" value="{{$hari_kerja->id}}">
                                <input type="text" name="num1" id="num1" value="{{$hari_kerja->num1}}" class="form-control border-input" placeholder="masukan jumlah hari...">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn-blue btn-block">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>