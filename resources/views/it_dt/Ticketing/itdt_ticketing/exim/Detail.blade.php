@extends("layouts.app")
@section("title","Admin Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker2.css')}}">
@endpush
@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards p-4">
                    <div class="row" style="padding:20px 24px">
                        <div class="col-12">
                            <div class="title-20 text-left">Detail Ticket</div>
                            <div class="borderlight mb-3"></div>
                        </div>
                        <div class="col-md-6">
                            <table class="tables2 pdHeight">
                                <tr>
                                    <td width="40%" class="fw-500">Nomor Aju</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->no_aju}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Nomor BC23</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->no_bc23}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Tanggal</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->tanggal}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Vessel</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->vessel}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">ETD</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->etd}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">ETA JKT</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->eta_jkt}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">ETA GTX</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->eta_gtx}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Jumlah Kemasan</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->jum_kemasan}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Jenis Kemasan</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->jenis_kemasan}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="tables2 pdHeight">
                                <tr>
                                    <td width="40%" class="fw-500">Shipper</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->shipper}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Order</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->order_ticket}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">NO.BL/AWB</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->no_bl}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Berat</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->berat}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Nilai Import</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->mata_uang}} {{number_format($data->jum_devisa, 2, ",", ".")}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Nama Purchasing</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->nama}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Tanggal Create</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->tgl_pengajuan}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Forwader</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->forwader}}</td>
                                </tr>
                                <tr>
                                    <td width="40%" class="fw-500">Keterangan</td>
                                    <td width="60%"><span class="mr-2">:</span>{{$data->keterangan}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="cards p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-20 text-left">Documents</div>
                            <div class="borderlight mb-3"></div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                @if($data->packing_list != NULL)
                                    @if(substr($data->packing_list,-3)=='pdf')
                                    <div class="col-12" id="accordion1">
                                        <div class="title-sm mb-1">Packing List</div>
                                        <div class="cards">
                                            <div class="accordionPreviewRed justify-sb2">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                    <div class="title text-truncate">{{$data->packing_list}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->packing_list_terima==1)
                                                    <div class="justify-center gap-3">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                        <div class="txt-pased fs-14">Received</div>
                                                    </div>
                                                    @else
                                                    <div class="justify-center gap-3">
                                                        <i class="timesFailed fas fa-times-circle"></i>
                                                        <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                    </div>
                                                    @endif
                                                    <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                                <div class="cards-20 p-4"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->packing_list)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <div class="title-sm mb-1">Packing List</div>
                                        <div class="accordionPreviewBlue justify-sb2">
                                            <div class="name">
                                                <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                <div class="title text-truncate">{{$data->packing_list}}</div>
                                            </div>
                                            <div class="justify-center gap-6">
                                                @if($data->packing_list_terima==1)
                                                <div class="justify-center gap-3">
                                                    <i class="checkSuccess fas fa-check-circle"></i>
                                                    <div class="txt-pased fs-14">Received</div>
                                                </div>
                                                @else
                                                <div class="justify-center gap-3">
                                                    <i class="timesFailed fas fa-times-circle"></i>
                                                    <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                </div>
                                                @endif
                                                <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->packing_list)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                @if($data->invoice != NULL)
                                    @if(substr($data->invoice,-3)=='pdf')
                                    <div class="col-12" id="accordion2">
                                        <div class="title-sm mb-1">Invoice</div>
                                        <div class="cards">
                                            <div class="accordionPreviewRed justify-sb2">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                    <div class="title text-truncate">{{$data->invoice}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->invoice_terima==1)
                                                    <div class="justify-center gap-3">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                        <div class="txt-pased fs-14">Received</div>
                                                    </div>
                                                    @else
                                                    <div class="justify-center gap-3">
                                                        <i class="timesFailed fas fa-times-circle"></i>
                                                        <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                    </div>
                                                    @endif
                                                    <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion2">
                                                <div class="cards-20 p-4"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->invoice)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <div class="title-sm mb-1">Invoice</div>
                                        <div class="accordionPreviewBlue justify-sb2 w-100">
                                            <div class="name">
                                                <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                <div class="title text-truncate">{{$data->invoice}}</div>
                                            </div>
                                            <div class="justify-center gap-6">
                                                @if($data->invoice_terima==1)
                                                <div class="justify-center gap-3">
                                                    <i class="checkSuccess fas fa-check-circle"></i>
                                                    <div class="txt-pased fs-14">Received</div>
                                                </div>
                                                @else
                                                <div class="justify-center gap-3">
                                                    <i class="timesFailed fas fa-times-circle"></i>
                                                    <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                </div>
                                                @endif
                                                <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->invoice)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                @if($data->bl_doc != NULL)
                                    @if(substr($data->bl_doc,-3)=='pdf')
                                    <div class="col-12" id="accordion3">
                                        <div class="title-sm mb-1">BL Dari Supplier</div>
                                        <div class="cards">
                                            <div class="accordionPreviewRed justify-sb2">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                    <div class="title text-truncate">{{$data->bl_doc}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->bl_doc_terima==1)
                                                    <div class="justify-center gap-3">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                        <div class="txt-pased fs-14">Received</div>
                                                    </div>
                                                    @else
                                                    <div class="justify-center gap-3">
                                                        <i class="timesFailed fas fa-times-circle"></i>
                                                        <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                    </div>
                                                    @endif
                                                    <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion3">
                                                <div class="cards-20 p-4"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->bl_doc)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <div class="title-sm mb-1">BL Dari Supplier</div>
                                        <div class="accordionPreviewBlue justify-sb2">
                                            <div class="name">
                                                <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                <div class="title text-truncate">{{$data->bl_doc}}</div>
                                            </div>
                                            <div class="justify-center gap-6">
                                                @if($data->bl_doc_terima==1)
                                                <div class="justify-center gap-3">
                                                    <i class="checkSuccess fas fa-check-circle"></i>
                                                    <div class="txt-pased fs-14">Received</div>
                                                </div>
                                                @else
                                                <div class="justify-center gap-3">
                                                    <i class="timesFailed fas fa-times-circle"></i>
                                                    <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                </div>
                                                @endif
                                                <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->bl_doc)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                @if($data->doc_1 != NULL)
                                    @if(substr($data->doc_1,-3)=='pdf')
                                    <div class="col-12" id="accordion4">
                                        <div class="title-sm mb-1">Document Lainnya</div>
                                        <div class="cards">
                                            <div class="accordionPreviewRed justify-sb2">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                    <div class="title text-truncate">{{$data->doc_1}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->doc_1_terima==1)
                                                    <div class="justify-center gap-3">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                        <div class="txt-pased fs-14">Received</div>
                                                    </div>
                                                    @else
                                                    <div class="justify-center gap-3">
                                                        <i class="timesFailed fas fa-times-circle"></i>
                                                        <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                    </div>
                                                    @endif
                                                    <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion4">
                                                <div class="cards-20 p-4"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_1)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <div class="title-sm mb-1">Document Lainnya</div>
                                        <div class="accordionPreviewBlue justify-sb2 w-100">
                                            <div class="name">
                                                <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                <div class="title text-truncate">{{$data->doc_1}}</div>
                                            </div>
                                            <div class="justify-center gap-6">
                                                @if($data->doc_1_terima==1)
                                                <div class="justify-center gap-3">
                                                    <i class="checkSuccess fas fa-check-circle"></i>
                                                    <div class="txt-pased fs-14">Received</div>
                                                </div>
                                                @else
                                                <div class="justify-center gap-3">
                                                    <i class="timesFailed fas fa-times-circle"></i>
                                                    <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                </div>
                                                @endif
                                                <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->doc_1)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                @if($data->doc_2 != NULL)
                                    @if(substr($data->doc_2,-3)=='pdf')
                                    <div class="col-12" id="accordion5">
                                        <div class="cards">
                                            <div class="accordionPreviewRed justify-sb2">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                    <div class="title text-truncate">{{$data->doc_2}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->doc_2_terima==1)
                                                    <div class="justify-center gap-3">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                        <div class="txt-pased fs-14">Received</div>
                                                    </div>
                                                    @else
                                                    <div class="justify-center gap-3">
                                                        <i class="timesFailed fas fa-times-circle"></i>
                                                        <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                    </div>
                                                    @endif
                                                    <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion5">
                                                <div class="cards-20 p-4"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_2)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <div class="accordionPreviewBlue justify-sb2">
                                            <div class="name">
                                                <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                <div class="title text-truncate">{{$data->doc_2}}</div>
                                            </div>
                                            <div class="justify-center gap-6">
                                                @if($data->doc_2_terima==1)
                                                <div class="justify-center gap-3">
                                                    <i class="checkSuccess fas fa-check-circle"></i>
                                                    <div class="txt-pased fs-14">Received</div>
                                                </div>
                                                @else
                                                <div class="justify-center gap-3">
                                                    <i class="timesFailed fas fa-times-circle"></i>
                                                    <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                </div>
                                                @endif
                                                <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->doc_2)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                @if($data->doc_3 != NULL)
                                    @if(substr($data->doc_3,-3)=='pdf')
                                    <div class="col-12" id="accordion6">
                                        <div class="cards w-100">
                                            <div class="accordionPreviewRed justify-sb2">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                    <div class="title text-truncate">{{$data->doc_3}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->doc_3_terima==1)
                                                    <div class="justify-center gap-3">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                        <div class="txt-pased fs-14">Received</div>
                                                    </div>
                                                    @else
                                                    <div class="justify-center gap-3">
                                                        <i class="timesFailed fas fa-times-circle"></i>
                                                        <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                    </div>
                                                    @endif
                                                    <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo6" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion6">
                                                <div class="cards-20 p-4"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_3)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <div class="accordionPreviewBlue justify-sb2">
                                            <div class="name">
                                                <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                <div class="title text-truncate">{{$data->doc_3}}</div>
                                            </div>
                                            <div class="justify-center gap-6">
                                                @if($data->doc_3_terima==1)
                                                <div class="justify-center gap-3">
                                                    <i class="checkSuccess fas fa-check-circle"></i>
                                                    <div class="txt-pased fs-14">Received</div>
                                                </div>
                                                @else
                                                <div class="justify-center gap-3">
                                                    <i class="timesFailed fas fa-times-circle"></i>
                                                    <div class="txt-failed fs-14 no-wrap">Not Yet</div>
                                                </div>
                                                @endif
                                                <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->doc_3)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")

@endpush