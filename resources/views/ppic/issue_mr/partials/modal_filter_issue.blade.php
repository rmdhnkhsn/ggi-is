<div class="modal fade" id="buatPengeluaran" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('ppic.issue_mr.issue_report')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Filter</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-6">
                        <span class="general-identity-title">From</span>
                        <div class="input-group dates">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="from" id="from">
                        </div>
                    </div>
                    <div class="col-6">
                        <span class="general-identity-title">To</span>
                        <div class="input-group dates">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="to" id="to">
                        </div>
                    </div>
                    <input type="hidden" name="from_tanggal_direct_mr" id="from_tanggal_direct_mr" value="{{$from_tanggal_direct_list}}">
                    <input type="hidden" name="to_tanggal_direct_mr" id="to_tanggal_direct_mr" value="{{$to_tanggal_direct_list}}">
                    <div class="col-12" style="padding-top:20px;">
                        <button type="submit" class="btn-blue-md btn-block">Search<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal filter direct issue  -->
<div class="modal fade" id="IssueDirectSearch" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('ppic.issue_mr.issue_report')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Filter</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-6">
                        <span class="general-identity-title">From</span>
                        <div class="input-group dates">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="from_tanggal_direct_mr" id="from">
                        </div>
                    </div>
                    <div class="col-6">
                        <span class="general-identity-title">To</span>
                        <div class="input-group dates">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" name="to_tanggal_direct_mr" id="to">
                        </div>
                    </div>
                    <input type="hidden" id="from" value="{{$from_tanggal_issue_mr}}">
                    <input type="hidden" id="to" value="{{$to_tanggal_issue_mr}}">
                    <div class="col-12" style="padding-top:20px;">
                        <button type="submit" class="btn-blue-md btn-block">Search<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>