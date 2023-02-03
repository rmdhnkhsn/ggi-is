<div class="modal fade" id="StartNumb{{$value2->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:380px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row border-bottom pb-2">
                    <div class="col-12 justify-sb">
                        <span class="title-15">Prosess Bundling</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <form action="{{ route('proses_bundling.simpan_user')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="form_id" id="form_id" value="{{$value2->form_id}}">
                <input type="hidden" name="proses_id" id="proses_id" value="{{$value2->id}}">
                <div class="row">
                    <div class="col-12 px-1 py-2">
                        <div class="cards-0 p-3">
                            <div class="row">
                                <div class="col-12 text-left">
                                    <span class="title-sm">NIK 1</span>
                                    <div class="input-group mt-1 mb-3">
                                        <input type="text" class="form-control border-input" id="nik[]" name="nik[]" value="" placeholder="Input NIK...">
                                    </div>
                                </div>
                                <div class="col-12 text-left">
                                    <span class="title-sm">NIK 2</span>
                                    <div class="input-group mt-1 mb-3">
                                        <input type="text" class="form-control border-input" id="nik[]" name="nik[]" value="" placeholder="Input NIK...">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-blue btn-block">Mulai Bundling<i class="ml-2 fs-20 fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>