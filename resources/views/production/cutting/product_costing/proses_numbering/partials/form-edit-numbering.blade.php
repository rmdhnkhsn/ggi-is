<div class="modal fade" id="EditNumbering-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:610px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row pb-2">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                </div>
                <form action="{{ route('proses_bundling.update_rfid')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <span class="title-sm">No Ikat</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="hidden" name="id" id="id" value="{{$value->id}}">
                                <input type="text" class="form-control border-input" id="no_ikat" name="no_ikat" value="{{$value->no_ikat}}" placeholder="No Ikat...">
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">No Awal</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input" id="urut_awal" name="urut_awal" value="{{$value->urut_awal}}" placeholder="No Urut Awal...">
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">No Akhir</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input" id="urut_akhir" name="urut_akhir" value="{{$value->urut_akhir}}" placeholder="No Urut Akhir...">
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">RF ID</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input" id="rf_id" name="rf_id" value="{{$value->rf_id}}" placeholder="Scan RF ID...">
                            </div>
                        </div>
                        <div class="col-12 justify-start">
                            <button type="submit" class="btn-blue">Save<i class="ml-2 fs-20 fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>