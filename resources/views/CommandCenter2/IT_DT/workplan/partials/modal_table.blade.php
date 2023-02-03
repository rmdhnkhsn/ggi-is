<div class="modal fade" id="modal-table{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-12">
                    <div class="container">
                        <div class="row fs-14">
                            <div class="col-6 border fw-600 py-2 px-3">No</div>
                            <div class="col-6 border py-2 px-3">{{$no}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">Project Name</div>
                            <div class="col-6 border py-2 px-3">{{$value['nama_projek']}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">PIC</div>
                            <div class="col-6 border py-2 px-3">{{$value['nama_programmer']}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">Estimate Duration</div>
                            <div class="col-6 border py-2 px-3">{{$value['estimasi_durasi']}} Day</div>
                            @if($value['status_work']== "Done")
                            <div class="col-6 border fw-600 py-2 px-3">Actual Duration</div>
                            <div class="col-6 border py-2 px-3">{{$value['aktual_durasi']}} Day</div>
                            @endif
                            <div class="col-6 border fw-600 py-2 px-3">Pending Status</div>
                            @if($value['tgl_pending']== null)
                            <div class="col-6 border py-2 px-3">Not Pending</div>
                            @else
                            <div class="col-6 border py-2 px-3">Pending {{$value['durasi_pending']}} Days</div>
                            @endif
                            <div class="col-6 border fw-600 py-2 px-3">Start Date</div>
                            <div class="col-6 border py-2 px-3">{{$value['tgl_mulai']}}</div>
                            @if($value['tgl_pending'] != null)
                            <div class="col-6 border fw-600 py-2 px-3">Pending Date</div>
                            <div class="col-6 border py-2 px-3">{{$value['tgl_pending']}} s/d {{$value['tgl_mulai_pending']}}</div>
                            @endif
                            <div class="col-6 border fw-600 py-2 px-3">Target Finish Date</div>
                            <div class="col-6 border py-2 px-3">{{$value['estimasi_tgl_selsai']}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">Actualy Finish Date</div>
                            <div class="col-6 border py-2 px-3">{{$value['aktual_tgl_selesai']}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">Status</div>
                            <div class="col-6 border py-2 px-3">{{$value['status_work']}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">Departement</div>
                            <div class="col-6 border py-2 px-3">{{$value['dept']}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">Category</div>
                            <div class="col-6 border py-2 px-3">{{$value['kategori']}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">Beneficiary</div>
                            <div class="col-6 border py-2 px-3">{{$value['benefit']}}</div>
                            <div class="col-6 border fw-600 py-2 px-3">Description</div>
                            <div class="col-6 border py-2 px-3">{{$value['remark']}}</div>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</div>