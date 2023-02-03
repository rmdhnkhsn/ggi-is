<div class="modal fade" id="detailFilesBagian-{{$value3->kategori}}-{{$value3->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content" style="border-radius:10px;padding:16px 26px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-20">Detail Files</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12">
                    <div class="borderlight"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 my-3 flex">
                    <div class="detailFiles">
                        <div class="icons">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="description">
                            <div class="title1">Created By</div>
                            <div class="titles">{{$value3->created_name}} ({{$value3->created_by}})</div>
                        </div>
                    </div>
                    <div class="detailFiles">
                        <div class="icons">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="description">
                            <div class="title1">Uploaded Date</div>
                            <div class="titles">{{$value3->created_at}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 flex">
                    <div class="detailFiles">
                        <div class="icons">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="description">
                            <div class="title1">Factory</div>
                            <div class="titles">{{$value3->branch}} - {{$value3->branchdetail}}</div>
                        </div>
                    </div>
                    <div class="detailFiles">
                        <div class="icons">
                            <i class="fas fa-file-archive"></i>
                        </div>
                        <div class="description">
                            <div class="title1">File Extension</div>
                            <div class="titles">{{$value3->kategori}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================ -->