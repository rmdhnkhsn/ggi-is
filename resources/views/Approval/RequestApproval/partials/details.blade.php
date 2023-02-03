<div class="modal fade" id="details{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:620px">
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
                        <div class="title-16-dark mt-1">{{$value->nik}}</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Applicant</div>
                        <div class="title-16-dark mt-1">{{$value->nama}}</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Departement</div>
                        <div class="title-16-dark mt-1">{{$value->bagian}} </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Jenis Pencairan</div>
                        <div class="title-16-dark mt-1">{{$value->kategori}}</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Disbursement</div>
                        <div class="title-16-dark mt-1">{{$value->pencairan}}</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Amount</div>
                        <div class="title-16-dark mt-1">Rp. {{number_format($value->amount_rencana, 2, ",", ".")}}</div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title-14-dark">Description</div>
                        <div class="title-16-dark mt-1">{{$value->deskripsi}}</div>
                    </div>
                    <!-- <div class="col-12 mb-3">
                        <div class="title-14-dark">Cash Disbursement Type </div>
                        <div class="title-16-dark mt-1">Main & Rep Building</div>
                    </div> -->
                    <div class="col-md-6 mt-3">
                        <a href="{{route('tiket-approval-acc',[$value->id,0])}}" class="btn-red-md w-100 reject ">Reject <i class="fs-20 ml-3 fas fa-times"></i></a>
                    </div>
                    <div class="col-md-6 mt-3">
                        <a href="{{route('tiket-approval-acc',[$value->id,1])}}" class="btn-green-md w-100 approve">Approve <i class="fs-20 ml-3 fas fa-check"></i></a>
                    </div>
                </div>
            </div>
    </div>
</div>