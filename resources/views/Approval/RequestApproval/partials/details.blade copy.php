<div class="modal fade" id="details{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
        <form class="approve_form" action="{{route('tiket-approval-acc')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Detail Pengajuan</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">NIK</div>
                        <div class="title-16-dark mt-1">GC110080</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Applicant</div>
                        <div class="title-16-dark mt-1">Hendra Sugandi Mulyadi</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Departement</div>
                        <div class="title-16-dark mt-1">Digital Transformation </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Category</div>
                        <div class="title-16-dark mt-1">Cash Request</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Amount</div>
                        <div class="title-16-dark mt-1">Rp. 5.000.000,-</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Defrosting Type </div>
                        <div class="title-16-dark mt-1">Transfer</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Account Number </div>
                        <div class="title-16-dark mt-1">124****789</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Description</div>
                        <div class="title-16-dark mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum magni labore numquam quae magnam laudantium inventore nulla tempora, omnis incidunt.</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Cash Disbursement Type </div>
                        <div class="title-16-dark mt-1">Main & Rep Building</div>
                        <input type="hidden" value="{{$value->id}}" name="id">
                        <input type="hidden" class="app_rjc" value="" name="app_rjc" id="app_rjc">

                    </div>
                    <div class="col-md-6 mt-3">
                        <button type="button" class="btn-red-md w-100 reject ">Reject <i class="fs-20 ml-3 fas fa-times"></i></button>
                    </div>
                    <div class="col-md-6 mt-3">
                        <button type="button" class="btn-green-md w-100 approve">Approve <i class="fs-20 ml-3 fas fa-check"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>