<div class="modal fade" id="detailsDowntime-{{$d->nokartu}}-{{$d->no_proses}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <div class="sub-judul">{{$d->TotalTimeDowntime}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Count</div>
                        <div class="sub-judul">{{$d->t_downtime}}</div>
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

<!-- ================ -->

<div class="modal fade" id="detailsLost-{{$d->nokartu}}-{{$d->no_proses}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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

<!-- ================ -->

<div class="modal fade" id="detailsOverload-{{$d->nokartu}}-{{$d->no_proses}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <div class="sub-judul">{{$d->TotalOverload}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Count</div>
                        <div class="sub-judul">{{$d->t_overload}}</div>
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

<!-- ================ -->

<div class="modal fade" id="detailsBantuan-{{$d->nokartu}}-{{$d->no_proses}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <div class="sub-judul">{{$d->TotalCoaching}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Count</div>
                        <div class="sub-judul">{{$d->t_coach}}</div>
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

<!-- ================ -->

<div class="modal fade" id="detailsSupply-{{$d->nokartu}}-{{$d->no_proses}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <div class="sub-judul">{{$d->TotalSupply}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Count</div>
                        <div class="sub-judul">{{$d->t_problem}}</div>
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

<!-- ================ -->

<div class="modal fade" id="detailsRework-{{$d->nokartu}}-{{$d->no_proses}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <div class="sub-judul">{{$d->TotalPerbaikan}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Count</div>
                        <div class="sub-judul">{{$d->t_rework}}</div>
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
<!-- ================ -->

<div class="modal fade" id="detailsLayout-{{$d->nokartu}}-{{$d->no_proses}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                        <div class="sub-judul">{{$d->TotalLayout}}</div>
                    </div>
                    <div class="descModal">
                        <div class="judul">Count</div>
                        <div class="sub-judul">{{$d->t_change}}</div>
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