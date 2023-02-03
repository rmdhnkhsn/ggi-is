<div class="modal fade" id="editData{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('in-out.update_gudang')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Tambah Data</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">PO Subkon</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fas fa-file-invoice"></i></span>
                            </div>
                            <input type="hidden" class="form-control borderInput" id="id" name="id" value="{{$value->id}}">
                            <input type="text" class="form-control borderInput" id="no_po" name="no_po" value="{{$value->list_subkon()}}" placeholder="Masukkan No PO..." disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Jumlah Koli</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-boxes"></i></span>
                            </div>
                            <!-- <input type="text" class="form-control borderInput" id="qty_koli" name="qty_koli" value="{$qty_koli}" placeholder="Masukkan jumlah koli..." disabled> -->
                            <input type="text" class="form-control borderInput" id="qty_koli" name="qty_koli" value="" placeholder="Masukkan jumlah koli..." disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Detail</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-boxes"></i></span>
                            </div>
                            <!-- <input type="text" class="form-control borderInput" id="detail" name="detail" value="{$acc}{$fabric}" placeholder="Masukkan jumlah koli..." disabled> -->
                            <input type="text" class="form-control borderInput" id="detail" name="detail" value="" placeholder="Masukkan jumlah koli..." disabled>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Jumlah SJ</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-shipping-fast"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="jumlah_sj" name="jumlah_sj" value="{{$value->jumlah_sj}}" placeholder="Masukkan jumlah SJ...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Keterangan</div>
                        <textarea class="form-control borderInput mt-1 mb-3 py-2" name="keterangan" id="keterangan" placeholder="Masukkan keterangan...">{{$value->keterangan}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btn-block">Kirim<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="voidBpb{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{route('in-out.void-bpb')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control borderInput" id="id" name="id" value="{{$value->id}}">

                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Confirm Delete</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btn-block">Delete<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Kirim  -->
<div class="modal fade" id="kirimBarang{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('in-out.update_ekspedisi')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Tambah Surat Jalan</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Surat Jalan</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-file-invoice"></i></span>
                            </div>
                            <input type="hidden" class="form-control borderInput" id="id" name="id" value="{{$value->id}}">
                            <input type="text" class="form-control borderInput" id="surat_jalan" name="surat_jalan" value="{{$value->surat_jalan}}" placeholder="Masukkan surat jalan...">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btn-block kirimSJ">Kirim<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Kirim  -->
<div class="modal fade" id="noteDokumen{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('in-out.update_dokumen_note')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Isi Keterangan Delay Dokumen</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Note</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-file-invoice"></i></span>
                            </div>
                            <input type="hidden" class="form-control borderInput" id="id" name="id" value="{{$value->id}}">
                            <input type="text" class="form-control borderInput" id="dokumen_note" name="dokumen_note" value="{{$value->surat_jalan}}" placeholder="Masukkan keterangan...">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btn-block kirimSJ">Kirim<i class="fs-20 ml-3 fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail -->
<div class="modal fade" id="DetailReport{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Detail Report</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3 mt-1">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Tanggal</div>
                                    <div class="sub-judul">{{$tanggal}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Unit</div>
                                    <div class="sub-judul">{{$value->from_branch}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Jumlah SJ</div>
                                    <div class="sub-judul">
                                        @if($value->jumlah_sj == null)
                                        -
                                        @else
                                        {{$value->jumlah_sj}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">PO</div>
                                    <div class="sub-judul">{{$value->list_subkon()}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">SJ</div>
                                    <div class="sub-judul">
                                        @if($value->surat_jalan == null)
                                        -
                                        @else
                                        {{$value->surat_jalan}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Detail</div>
                                    <!-- <div class="sub-judul">{$acc}{$fabric}</div> -->
                                    <div class="sub-judul"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">QTY Koli</div>
                                    <!-- <div class="sub-judul">{$qty_koli}</div> -->
                                    <div class="sub-judul"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">Waktu</div>
                                    @if($value->status_barang == 'Gudang')
                                    <div class="sub-judul">{{date('H:i:s', strtotime($value->created_at))}}</div> 
                                    @elseif($value->status_barang == 'Ekspedisi')
                                    <div class="sub-judul">{{date('H:i:s', strtotime($value->in_ekspedisi))}}</div> 
                                    @elseif($value->status_barang == 'Dokumen')
                                    <div class="sub-judul">{{date('H:i:s', strtotime($value->in_dokumen))}}</div> 
                                    @elseif($value->status_barang == 'Finish')
                                    <div class="sub-judul">{{date('H:i:s', strtotime($value->finish))}}</div> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="containerDetailsSMV">
                                    <div class="judul">In Hand</div>
                                    <div class="sub-judul">{{$value->status_barang}}</div>
                                </div> 
                            </div>
                        </div>
                        @if($value->keterangan != null)
                        <div class="containerDetailsSMV">
                            <div class="judul">Keterangan</div>
                            <div class="sub-judul">{{$value->keterangan}}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>