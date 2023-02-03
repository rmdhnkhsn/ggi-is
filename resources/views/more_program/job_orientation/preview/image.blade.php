<div class="modal fade" id="previewImages{{$value3->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:570px">
        <div class="modal-content" style="border-radius:10px;padding:16px 26px">
            <div class="row">
                <div class="col-12 justify-sb" style="gap:1.5rem">
                    <div class="flex text-truncate" style="gap:.8rem">
                        <img src="{{url('images/iconpack/job_orientation/jpg.svg')}}">
                        <div class="title-18 text-truncate">{{$value3->nama_dokumen}}</div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <img id="priviewImage{{$value3->id}}" src="#" class="imgResponsive">
                </div>
            </div>
        </div>
    </div>
</div>