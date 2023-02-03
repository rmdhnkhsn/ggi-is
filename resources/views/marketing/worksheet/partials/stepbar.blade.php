@php
$general_identity=0;
$material_fabric=0;
$material_sewing=0;
$measurement=0;
$packing=0;
$master_data->general_identity==null?:$general_identity=$master_data->general_identity->count();
$master_data->material_fabric==null?:$material_fabric=$master_data->material_fabric->count();
$master_data->material_sewing==null?:$material_sewing=$master_data->material_sewing->count();
$master_data->measurement==null?:$measurement=$master_data->measurement->count();
$master_data->packing==null?:$packing=$master_data->packing->count();
@endphp

<div class="containerStepbar">
    <div class="line"></div>
    <!-- <div class="line2"></div> -->
    <a href="{{route('worksheet.general', $master_data->id)}}" class="cardStepbar">
        @if($stepbar == "General Identity")
            <div class="containerNumber active">
                <div class="number active">1</div>
            </div>
            <div class="title active">General Identity</div>
            <div class="botLine"></div>
        @elseif($general_identity == 0)
            <div class="containerNumber">
                <div class="number">1</div>
            </div>
            <div class="title">General Identity</div>
        @else
            <div class="containerNumber check">
                <div class="number check"><i class="fas fa-check"></i></div>
            </div>
            <div class="title check">General Identity</div>
            <div class="complete">complete</div>
        @endif
    </a>

    @if($general_identity != 0)
      <a href="{{route('worksheet.breakdown', $master_data->id)}}" class="cardStepbar">
    @else
      <div class="cardStepbar">
    @endif
        @if($stepbar == "Breakdown")
            <div class="containerNumber active">
                <div class="number active">2</div>
            </div>
            <div class="title active">Breakdown</div>
            <div class="botLine"></div>
        @elseif($general_identity == 0)
            <div class="containerNumber">
                <div class="number">2</div>
            </div>
            <div class="title">Breakdown</div>
        @else
            <div class="containerNumber check">
                <div class="number check"><i class="fas fa-check"></i></div>
            </div>
            <div class="title check">Breakdown</div>
            <div class="complete">complete</div>
        @endif
    @if($general_identity != 0)
      </a>
    @else
      </div>
    @endif

    <a href="{{route('worksheet.material_pabric', $master_data->id)}}" class="cardStepbar">
        @if($stepbar == "Material Fabric")
            <div class="containerNumber active">
                <div class="number active">3</div>
            </div>
            <div class="title active">Material Fabric</div>
            <div class="botLine"></div>
        @elseif($material_fabric == 0 || $master_data->attention_cutting == null )
            <div class="containerNumber">
                <div class="number">3</div>
            </div>
            <div class="title">Material Fabric</div>
        @else
            <div class="containerNumber check">
                <div class="number check"><i class="fas fa-check"></i></div>
            </div>
            <div class="title check">Material Fabric</div>
            <div class="complete">complete</div>
        @endif
    </a>

    <a href="{{route('worksheet.material_sewing', $master_data->id)}}" class="cardStepbar">
        @if($stepbar == "Material Sewing")
            <div class="containerNumber active">
                <div class="number active">4</div>
            </div>
            <div class="title active">Material Sewing</div>
            <div class="botLine"></div>
        @elseif($material_sewing == 0)
            <div class="containerNumber">
                <div class="number">4</div>
            </div>
            <div class="title">Material Sewing</div>
        @else
            <div class="containerNumber check">
                <div class="number check"><i class="fas fa-check"></i></div>
            </div>
            <div class="title check">Material Sewing</div>
            <div class="complete">complete</div>
        @endif
    </a>

    <a href="{{route('worksheet.measurement', $master_data->id)}}" class="cardStepbar">
        @if($stepbar == "Measurement")
            <div class="containerNumber active">
                <div class="number active">5</div>
            </div>
            <div class="title active">Measurement</div>
            <div class="botLine"></div>
        @elseif($measurement != 0 || $master_data->file_measurement != null)
            <div class="containerNumber check">
                <div class="number check"><i class="fas fa-check"></i></div>
            </div>
            <div class="title check">Measurement</div>
            <div class="complete">complete</div>
        @else
            <div class="containerNumber">
                <div class="number">5</div>
            </div>
            <div class="title">Measurement</div>
        @endif
    </a>

    <a href="{{route('worksheet.packaging', $master_data->id)}}" class="cardStepbar">
        @if($stepbar == "Packing")
            <div class="containerNumber active">
                <div class="number active">6</div>
            </div>
            <div class="title active">Packing</div>
            <div class="botLine"></div>
        @elseif($packing == 0)
            <div class="containerNumber">
                <div class="number">6</div>
            </div>
            <div class="title">Packing</div>
        @else
            <div class="containerNumber check">
                <div class="number check"><i class="fas fa-check"></i></div>
            </div>
            <div class="title check">Packing</div>
            <div class="complete">complete</div>
        @endif
    </a>
</div>
<!-- <div class="card" style="margin-top:10px;">
    <div class="row">
        <a href="{{route('worksheet.general', $master_data->id)}}" class="col-lg-2 col-2">
            @if($stepbar == "General Identity")
                <div class="container kotak_biru_kiri">
                <div class="garis_bawah_kiri"></div>
            @else
                <div class="container kotak_putih">
            @endif
            
            @if($general_identity == 0)
                <div class="bulet_biru">
                    <span class="angka_putih">1</span>
                </div>
                <div class="garis_putus"></div>
                <span class="tulisan_biru">General Identity</span>
            @else
                <div class="bulet_ijo icon_ceklis_ijo">
                    <i class="fas fa-check ceklis_ijo"></i>
                </div>
                <div class="garis_ijo"></div>
                <span class="tulisan_item">General Identity</span>
                <span class="text_complete">Complete</span>
            @endif
            </div>
        </a>

        @if($general_identity != 0)
        <a href="{{route('worksheet.breakdown', $master_data->id)}}" class="col-lg-2 col-2">
        @else
        <div class="col-lg-2 col-2">
        @endif
            @if($stepbar == "Breakdown")
                <div class="container kotak_biru">
                <div class="garis_bawah"></div>
            @else
                <div class="container kotak_putih">
            @endif

            @if($general_identity == 0)
                <div class="bulet_biru">
                    <span class="angka_putih">2</span>
                </div>
                <div class="garis_putus"></div>
                <span class="tulisan_pendek_biru">Breakdown</span>
            @else
                <div class="bulet_ijo icon_ceklis_ijo">
                    <i class="fas fa-check ceklis_ijo"></i>
                </div>
                <div class="garis_ijo"></div>
                <span class="tulisan_pendek">Breakdown</span>
                <span class="text_complete">Complete</span>
            @endif
            </div>
        @if($general_identity != 0)
        </a>
        @else
        </div>
        @endif

        <a href="{{route('worksheet.material_pabric', $master_data->id)}}" class="col-lg-2 col-2">
            @if($stepbar == "Material Fabric")
                <div class="container kotak_biru">
                <div class="garis_bawah"></div>
            @else
                <div class="container kotak_putih">
            @endif

            @if($material_fabric == 0 || $master_data->attention_cutting == null )
                <div class="bulet_biru">
                    <span class="angka_putih">3</span>
                </div>
                <div class="garis_putus"></div>
                <span class="tulisan_biru">Material Fabric</span>
            @else
                <div class="bulet_ijo icon_ceklis_ijo">
                    <i class="fas fa-check ceklis_ijo"></i>
                </div>
                <div class="garis_ijo"></div>
                <span class="tulisan_item">Material Fabric</span>
                <span class="text_complete">Complete</span>
            @endif
            </div>
        </a>

        <a href="{{route('worksheet.material_sewing', $master_data->id)}}" class="col-lg-2 col-2">
            @if($stepbar == "Material Sewing")
                <div class="container kotak_biru">
                <div class="garis_bawah"></div>
            @else
                <div class="container kotak_putih">
            @endif
            
            @if($material_sewing == 0)
                <div class="bulet_biru">
                    <span class="angka_putih">4</span>
                </div>
                <div class="garis_putus"></div>
                <span class="tulisan_biru">Material Sewing</span>
            @else
                <div class="bulet_ijo icon_ceklis_ijo">
                    <i class="fas fa-check ceklis_ijo"></i>
                </div>
                <div class="garis_ijo"></div>
                <span class="tulisan_item">Material Sewing</span>
                <span class="text_complete">Complete</span>
            @endif
            </div>
        </a>


        <a href="{{route('worksheet.measurement', $master_data->id)}}" class="col-lg-2 col-2">

            @if($stepbar == "Measurement")
                <div class="container kotak_biru">
                <div class="garis_bawah"></div>
            @else
                <div class="container kotak_putih">
            @endif
            
            @if($measurement != 0 || $master_data->file_measurement != null)
                <div class="bulet_ijo icon_ceklis_ijo">
                    <i class="fas fa-check ceklis_ijo"></i>
                </div>
                <div class="garis_ijo"></div>
                <span class="measurement">Measurement</span>
                <span class="text_complete">Complete</span>    
            @else
                <div class="bulet_biru">
                    <span class="angka_putih">5</span>
                </div>
                <div class="garis_putus"></div>
                <span class="measurement_biru">Measurement</span>
            @endif
            </div>
        </a>


        <a href="{{route('worksheet.packaging', $master_data->id)}}" class="col-lg-2 col-2">
            @if($stepbar == "Packing")
                <div class="container kotak_biru">
                <div class="garis_bawah"></div>
            @else
                <div class="container kotak_putih">
            @endif
            
            @if($packing == 0)
                <div class="bulet_biru">
                    <span class="angka_putih">6</span>
                </div>
                <span class="measurement_biru">Packing</span>
            @else
                <div class="bulet_ijo icon_ceklis_ijo">
                    <i class="fas fa-check ceklis_ijo"></i>
                </div>
                <span class="measurement">Packing</span>
                <span class="text_complete">Complete</span>
            @endif
            </div>
        </a>
    </div>
</div> -->