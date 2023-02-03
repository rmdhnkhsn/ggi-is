
<button type="button" class="btn-upload-smv uploadSMV" data-toggle="modal" data-target="#modal-import-smv">Upload SMV<i class="fs-18 ml-2 fas fa-upload"></i></button>

<div class="modal fade" id="modal-import-smv" role="dialog" >
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12">
                    <div class="title-20 text-left">Import Data Master SMV</div>
                    <div class="title-14 text-left" style="margin-top:-6px">Pastikan export/backup dulu data smv dari Aplikasi</div>
                </div>
                <div class="col-12 my-2">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12 my-2">
                    <form  action="{{route('mastersmv.import')}}" id="frm_import_smv" method="post" enctype="multipart/form-data">
                        <div class="title-sm">Upload file data SMV</div>
                        <div class="customFile mt-1 mb-3">
                            <input type="file" class="customFileInput" id="customFile" placeholder="Upload file" required/>
                            <label class="customFileLabelsBlue" for="customFile">
                                <span class="chooseFile"></span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="col-12 flex gap-3">
                    <button type="submit" class="btn-blue-md w-100" form="frm_import_smv">Create SMV</button>
                    <button type="button" class="btn-outline-grey-md w-100" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>