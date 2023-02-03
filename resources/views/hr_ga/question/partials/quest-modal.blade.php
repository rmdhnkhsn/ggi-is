<div class="modal fade" id="create" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <form action="{{ route('job_orientation.modul-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" style="padding:18px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">New Question</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="borderlight"></div>
                    </div>
                    <input type="hidden" id="branch" name="branch" value="{{auth()->user()->branch}}">
                    <input type="hidden" id="branchdetail" name="branchdetail" value="{{auth()->user()->branchdetail}}">
                    <input type="hidden" id="created_by" name="created_by" value="{{auth()->user()->nik}}">
                    <input type="hidden" id="created_name" name="created_name" value="{{auth()->user()->nama}}">
                    <input type="hidden" id="tgl_input" name="tgl_input" value="{{$tanggal}}">
                    <div class="col-12 mb-4">
                        <span class="title-sm">Judul</span>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control border-input-10" id="judul" name="judul" placeholder="input judul..." required>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="title-sm">Select Departemen</span>
                        <div class="flex mt-1">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="padding:0 40px">Departemen</span>
                            </div>
                            <select class="form-control border-input-10 select2bs4_dept data_departement" style="width:100%" name="departemen" id="departemen">
                                <option selected disabled>Select Departemen</option>
                                <option value="All Departemen">All Departemen</option>
                                @foreach($data_departemen as $key => $value)
                                <option value="{{$value['departemen']}}">{{$value['departemen']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="title-sm">Select Division</span>
                        <div class="flex mt-1">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="padding:0 40px">Division</span>
                            </div>
                            <select class="form-control border-input-10 select2bs4_sub" style="width:100%" name="departemensubsub" id="departemensubsub">
                                <option selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="public" value="1" name="set_public">
                            <label class="custom-control-label pointer" for="public">Set Public</label>
                        </div>
                    </div>
                    <div class="col-12 justify-start">
                        <button type="submit" class="btn-blue-md saveQuest">Create New<i class="ml-3 fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>