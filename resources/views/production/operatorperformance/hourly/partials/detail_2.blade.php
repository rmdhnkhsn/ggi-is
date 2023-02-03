<div class="modal fade" id="detailsLost-{{$i}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:400px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row py-4 px-3">
                <div class="col-12 justify-sb">
                    <div class="title-16">Details</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mt-1 mb-3">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12">
                    <div class="descModal">
                        <div class="judul">Nama</div>
                        <div class="sub-judul">{{$d->nama}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Factory</div>
                        <div class="sub-judul">{{$d->fasilitas}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Line</div>
                        <div class="sub-judul">{{$d->line}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Elapsed Time</div>
                        <div class="sub-judul">{{$d->TotalLosttime}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Count</div>
                        <div class="sub-judul">{{$d->t_lost}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Process</div>
                        <div class="sub-judul">{{$d->proses}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>