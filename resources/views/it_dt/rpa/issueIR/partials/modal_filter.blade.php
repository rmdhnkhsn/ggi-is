<div class="modal fade" id="ReportIssueIR" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{route('rpa.issueIR.search_report')}}" method="post" enctype="multipart/form-data">
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
                    <div class="col-12" style="padding-top:20px;">
                        <button type="submit" class="btn-blue-md btn-block">Search<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
