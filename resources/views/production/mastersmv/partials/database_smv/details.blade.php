<div class="modal fade" id="triggerDetailsSMV{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-20">Details SMV</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12">
                    <div class="containerDetailsSMV">
                        <div class="judul">Style</div>
                        <div class="sub-judul">{{ $value['style'] }}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">Item</div>
                        <div class="sub-judul">{{ $value['item'] }}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">Agent/ Buyer</div>
                        <div class="sub-judul">{{ $value['buyer'] }}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">Description</div>
                        <div class="sub-judul">{{ $value['desc']}}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">Date</div>
                        <div class="sub-judul">{{ $value['id'] }}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">Line</div>
                        <div class="sub-judul">{{ $value['line']}}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">Manpower</div>
                        <div class="sub-judul">{{ $value['manpower'] }}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">SMV</div>
                        <div class="sub-judul">{{round( $value['smv'],2) }}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">Target</div>
                        <div class="sub-judul">{{ round($value['targetSmv']) }}</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">Allowance</div>
                        <div class="sub-judul">{{ $value['allowance'] }}%</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">85%</div>
                        <div class="sub-judul">{{ floor($value['dataPersen']) }} Pcs/Hour</div>
                    </div>
                    <div class="containerDetailsSMV">
                        <div class="judul">75%</div>
                        <div class="sub-judul">{{ floor($value['dataPersen2']) }} Pcs/Hour</div>
                    </div>
                </div>
                <div class="col-12 flex gap-3">
                    
                    @if ($value['smv'] == 0)
                    <button type="button" class="btn-red-md w-100 pdfKosong">Download SMV PDF <i class="fs-20 ml-2 fas fa-file-pdf"></i></button>
                    <button type="button" class="btn-green-md w-100 excelkosong">Download SMV Excel <i class="fs-20 ml-2 fas fa-file-excel"></i></button>
                    @else
                    <a href="{{ route('mastersmv.databaseSmvPdf',$value['id']) }}" class="btn-red-md w-100">Download SMV PDF <i class="fs-20 ml-2 fas fa-file-pdf"></i></a>
                    <a href="{{ route('mastersmv.databaseSmvExcel',$value['id']) }}" class="btn-green-md w-100">Download SMV Excel <i class="fs-20 ml-2 fas fa-file-excel"></i></a>
                    @endif
                      
                </div>
            </div>
        </div>
    </div>
</div>